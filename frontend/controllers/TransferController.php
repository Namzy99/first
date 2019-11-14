<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Transfer;
use frontend\models\TransferBy;
use frontend\models\Transactions;
use frontend\models\Person;
use frontend\models\ErrorMsg;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use frontend\models\Otp;

/**
 * TransferController implements the CRUD actions for Transfer model.
 */
class TransferController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Transfer models.
     * @return mixed
     */
    public $enableCsrfValidation = false;
    
    
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Transfer::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transfer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Transfer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Transfer();
        $modelTransaction = new Transactions();
        $modelPerson = Person::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
        $modelErr = ErrorMsg::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
        if(!empty($modelErr) || $modelErr !== NULL){
            $message = $modelErr->message;
        } else {
            $message = 'Sorry! You have exceeded the maximum transfer limit your account was configured for per month.For further enquiries on how to activate your transfer access,please contact email: accountservices@trado.com.'
        }

        if (Yii::$app->request->post('accountName')) {
            $model->userid = Yii::$app->user->identity->id;
            $model->amount = Yii::$app->request->post('amount');
            $model->name = Yii::$app->request->post('accountName');
            $model->bank = Yii::$app->request->post('bankName');
            $model->accountNumber = Yii::$app->request->post('accountNumber');
            $model->routingNumber = Yii::$app->request->post('swift');
            $model->country = Yii::$app->request->post('country');
            $model->message = Yii::$app->request->post('q6_notes');
            
            if($model->save()){
                $modelTransaction->userid = Yii::$app->user->identity->id;
                $modelTransaction->transactionType = 0;
                $modelTransaction->transactionId = $model->id;
                $modelTransaction->name = $model->name;
                $modelTransaction->amount = $model->amount;
                $modelTransaction->save();
                return $model->id;
            }
            
        }

        return $this->render('create', [
            'model' => $model,
            'transferStatus' => $modelPerson->transferStatus,
            'balance' => $modelPerson->balance,
            'message' => $modelErr->message,
        ]);
    }
    
    public function actionTransferBy()
    {
        $model = new TransferBy();

        if (Yii::$app->request->post('transferId')) {
            $model->userid = Yii::$app->user->identity->id;
            $model->firstname = Yii::$app->request->post('firstname');
            $model->lastname = Yii::$app->request->post('lastname');
            $model->email = Yii::$app->request->post('senderEmail');
            $model->telephone = Yii::$app->request->post('telephone');
            $model->address = Yii::$app->request->post('address');
            $model->transferId = Yii::$app->request->post('transferId');
            $model->save();
            return $model->id;
        }
    }
    
    public function actionMail()
    {
        $otpVal = $this->generateNumericOTP(4);
        $otp = new Otp();
        $otp->userid = Yii::$app->user->identity->id;
        $otp->otp = $otpVal;
        if($otp->save()){
           $otp->sendEmail($otpVal, Yii::$app->request->post('email'));
           return $otpVal; 
        }
        
    }
    
    public function actionFinishmail()
    {
        
        
    }
    
    public function actionComplete()
    {
        $model = Person::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
        $accountName =  Yii::$app->request->post('accountName');
        $accountNumber =  Yii::$app->request->post('accountNumber');
        $bankName =  Yii::$app->request->post('bankName');
        $swift =  Yii::$app->request->post('swift');
        $country =  Yii::$app->request->post('country');
        $transferAmount = Yii::$app->request->post('amount');
        $transferby = Yii::$app->request->post('email');
        $newBal = $model->balance - (int)$transferAmount;
        $model->balance = $newBal;
        if($model->save()){
           $message = Yii::$app->mailer->compose( ['html' => 'finish-mail'],
                [
                    'balance' => $model->balance,
                    'amount' => $transferAmount,
                    'accountName' => $accountName,
                    'accountNumber' => $accountNumber,
                    'bankName' => $bankName,
                    'swift' => $swift,
                    'country' => $country,
                    'name' => $model->firstname
                ]);
           $message->getSwiftMessage()->getHeaders()->addTextHeader('name', 'value');
           $message->setFrom(['support@rockettrade.org' => 'Rocket Trade']);
           $message->setTo($transferby);
           $message->setSubject('Successfull wire transfer');
           $message->send();
           return $this->renderAjax('complete');
        }
        
        
    }
    
    public function actionValidate()
    {
        $otpVal = Yii::$app->request->post('value');
        $otps = Otp::find()->where(['userid'=>Yii::$app->user->identity->id, 'status'=>0])->all();
        $true = 0;
        foreach($otps as $otp){
            if($otp->otp == (int)$otpVal){
                $otp->status = 1;
                $otp->save();
                $true = 1; //true
            }
        }
        
        return $true;
        
    }
    
    public function generateNumericOTP($n) { 
      
    // Take a generator string which consist of 
    // all numeric digits 
    $generator = "1357902468"; 
  
    // Iterate for n-times and pick a single character 
    // from generator and append it to $result 
      
    // Login for generating a random character from generator 
    //     ---generate a random number 
    //     ---take modulus of same with length of generator (say i) 
    //     ---append the character at place (i) from generator to result 
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
    // Return result 
    return $result; 
    } 
  
    /**
     * Updates an existing Transfer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Transfer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Transfer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transfer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transfer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
