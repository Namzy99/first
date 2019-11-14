<?php
namespace backend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\SignupForm;
use backend\models\Person;
use backend\models\ErrorMsg;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['signup'],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    
    public $enableCsrfValidation = false;
    
    
    public function actionIndex()
    {
        if(!\Yii::$app->user->isGuest){
            $dataProvider = new ActiveDataProvider([
            'query' => Person::find(),
            ]);

            return $this->render('index',[
                'dataProvider'=>$dataProvider
            ]);
        } else {
            return $this->redirect(['site/login']);
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
        return $this->goHome();
   }

   $model = new LoginForm();
       if ($model->load(Yii::$app->request->post()) && $model->loginAdmin()) {
          return $this->goBack();
       } else {
           return $this->render('login', [
              'model' => $model,
           ]);
       }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionCustomEmail()
    {
        if(Yii::$app->request->post('email')){
          $message = Yii::$app->mailer->compose(['html' => 'custom-email'],
                [
                    'text'  => Yii::$app->request->post('message'),
                    'name'  => Yii::$app->request->post('name'),
                    'subject'  => Yii::$app->request->post('subject'),
                ]);
           $message->getSwiftMessage()->getHeaders()->addTextHeader('name', 'value');
           $message->setFrom(['support@rockettrade.org' => 'Rocket Trade']);
           $message->setTo(Yii::$app->request->post('email'));
           $message->setSubject(Yii::$app->request->post('subject'));
           if($message->send()){
               return 'Email sent successfully!';
           } else {
               return 'Sorry there was an error. please try again';
           }
        }
        return $this->render('email');
    }
    
    public function actionUpdateStatus(){
        $person = Person::find()->where(['userid'=>Yii::$app->request->post('id')])->one();
        if($person->transferStatus == 1){
            $person->transferStatus = 0;
        } else {
            $person->transferStatus = 1;
        }
        $person->save();
        return $person->transferStatus;
        
    }
    
    public function actionPages($id){
        $name = Person::find()->where(['userid'=>$id])->one();
        $model = ErrorMsg::find()->where(['userid'=>$id])->one();
        if(!empty($model)){
            $message = $model->message;
        } else {
            $message = '';
        }
        return $this->render('errormsg',[
            'id'=>$id,
            'firstname'=>$name->firstname,
            'lastname'=>$name->lastname,
            'message'=>$message
        ]);
    }
    
    public function actionErrorMsg(){
        $model = ErrorMsg::find()->where(['userid'=>Yii::$app->request->post('id')])->one();
        if(!empty($model) || $model !== NULL){
            $model->message = Yii::$app->request->post('message');
            if($model->save()){
                return 'Saved Successfully';
            }
        } else {
            $new = new ErrorMsg();
            $new->userid = Yii::$app->request->post('id');
            $new->message = Yii::$app->request->post('message');
            if($new->save()){
                return 'Saved Successfully';
            }
        }
    }
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        $person = new Person();
        if ($model->load(Yii::$app->request->post())) {
            
            $data = Yii::$app->request->post();
            $person->userid = $model->signup();
            $person->firstname = $data['Person']['firstname'];
            $person->lastname = $data['Person']['lastname'];
            $person->address = $data['Person']['address'];
            $person->accountNo = $data['Person']['accountNo'];
            $person->balance = $data['Person']['balance'];
            $person->telephone = $data['Person']['telephone'];
            $person->nationality = $data['Person']['nationality'];
            $person->sex = $data['Person']['sex'];
            $person->maritalStatus = $data['Person']['maritalStatus'];
            $person->occupation = $data['Person']['occupation'];
            $person->zip = $data['Person']['zip'];
            $person->dateOfBirth = $data['Person']['dateOfBirth'];
            $person->Bio = $data['Person']['Bio'];
            $person->profilePicture = UploadedFile::getInstance($person, 'profilePicture');
            $fileName = $person->firstname.rand(1, 4000) . '.' . $person->profilePicture->extension;
            $filePath = 'images/'.$fileName;
            $person->profilePicture->saveAs($filePath);
            $person->profilePicture = $filePath;
            
            if($person->save(false)){
                Yii::$app->session->setFlash('success', 'You registered a new user. Please let user check his/her inbox for verification email.');
                return $this->goHome();
            }
            
        }

        return $this->render('signup', [
            'model' => $model,
            'person' => $person,
        ]);
    }
    
    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->redirect(Yii::$app->urlManagerBackend->createUrl(['site/index']));
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->redirect(Yii::$app->urlManagerBackend->createUrl(['site/index']));
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
