<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\tables\Ticket;
use app\models\user\UserRecord;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

class TicketController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [],
                        'roles' => ['@'],
                        'allow' => true
                    ]
                ]
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
        return $this->render('index');
    }

    /**
     * Add ticket action
     *
     */
    public function actionAdd()
    {
        $model = new Ticket();

        if ($model->load(Yii::$app->request->post())) {
            $model->status_id = 1;
            $model->save();


            $user = UserRecord::find()
                    ->select(['id', 'email'])
                    ->where(['id' => $model->author_id])
                    ->one();

            @$body = "A new ticket request was opend
                    Title: ${$model->title}
                    Description: ${$model->description}";
                
            Yii::$app->mailer->compose()
                    ->setTo(['service@yii.unu.local' => 'Service desc'])
                    ->setFrom(['service@yii.unu.local' => 'Service desc'])
                    ->setSubject('New ticket')
                    ->setTextBody($body)
                    ->send();

            return $this->render('ticketsadd');
        }

        return $this->render('addticket', [
            'model' => $model,
        ]);
    }






    public function actionView($id){
        $model = $this->findModel($id);
        if(Yii::$app->user->id == $model->author_id){
            return $this->render('view', [
            'model' => $model,
        ]);
        }
        return $this->redirect(['my-tickets']);   
    }




    public function actionMyTickets(){
        $query = Ticket::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query
                ->where(['author_id' => Yii::$app->user->id]),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);
        return $this->render('my_tickets', ['dataProvider' => $dataProvider]);
    }




    protected function findModel($id)
    {
        if (($model = Ticket::findOne($id)) !== null) {
            return $model;
        }
        //throw new NotFoundHttpException('The requested page does not exist.');
    } 
}
