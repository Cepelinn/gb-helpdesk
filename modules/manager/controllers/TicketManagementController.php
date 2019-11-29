<?php

namespace app\modules\manager\controllers;

use Yii;
use app\models\tables\Ticket;
use app\models\tables\TicketSearch;
use app\models\tables\TicketStatus;
use app\models\user\UserRecord;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * TicketManagementController implements the CRUD actions for Ticket model.
 */
class TicketManagementController extends Controller
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
     * Lists all Ticket models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $search = new TicketSearch();

        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // $rows = (new \yii\db\Query())
        // ->select(['id', 'title'])
        // ->from('ticket')
        // ->where(['responsible_id' => 71])
        // ->all();


        // $dataProvider = $searchModel->search($rows);

        $query = Ticket::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query
                ->where(['responsible_id' => Yii::$app->user->id]),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ticket model.
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
     * Updates an existing Ticket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        //var_dump(Yii::$app->request->post());

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        } 

        return $this->render('update', [
            'model' => $model,
            'statusList' => TicketStatus::getStatusList(),
            'userList' => UserRecord::getUserList(),
        ]);
    }

    /**
     * Finds the Ticket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ticket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ticket::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
