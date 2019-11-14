<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Person;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonController implements the CRUD actions for Person model.
 */
class PersonController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $enableCsrfValidation = false;
    
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
     * Lists all Person models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Person::find(),
        ]);
        $model = Person::find()->where(['userid' => Yii::$app->user->identity->id])->one();
        $UserDb = User::find()->where(['id' => Yii::$app->user->identity->id])->one();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
            'UserDb' => $UserDb,
        ]);
    }

    /**
     * Displays a single Person model.
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
    
     public function actionUpdateProfile()
    {
        if(Yii::$app->request->post('email')){
            $model = Person::find()->where(['userid' => Yii::$app->user->identity->id])->one();
            $UserDb = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
            $model->telephone = Yii::$app->request->post('telephone');
            $model->address = Yii::$app->request->post('address');
            $model->occupation = Yii::$app->request->post('occupation');
            $model->zip = Yii::$app->request->post('zip');
            $model->Bio = Yii::$app->request->post('bio');
            $UserDb->email = Yii::$app->request->post('email');
            if($model->save() && $UserDb->save()){
                return 'Updated Successfully!';
            } else {
                return 'Something went wrong. Try again';
            }
            
        }
    }

    /**
     * Creates a new Person model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Person();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Person model.
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
     * Deletes an existing Person model.
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
     * Finds the Person model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Person the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
