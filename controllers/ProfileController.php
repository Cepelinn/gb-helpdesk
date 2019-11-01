<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\user\UserRecord;
use app\models\user\ProfileUpdateForm;
use app\models\user\PasswordChangeForm;
use app\models\tables\Ticket;

class ProfileController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [],
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = $this->findModel(Yii::$app->user->id);
        return $this->render('view',[
            'model' => $model,
        ]);
    }


    public function actionUpdate()
    {
        $user = $this->findModel(Yii::$app->user->id);
        $model = new ProfileUpdateForm($user);

        if ($model->load(Yii::$app->request->post()) && $model->update()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionPasswordChange()
    {
        $user = $this->findModel(Yii::$app->user->id);
        $model = new PasswordChangeForm($user);
 
        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('passwordChange', [
                'model' => $model,
            ]);
        }
    }
    
    protected function findModel($id)
    {
        if (($model = UserRecord::findOne($id)) !== null) {
            return $model;
        }
        //throw new NotFoundHttpException('The requested page does not exist.');
    }
 
}