<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\user\UserRecord;
use app\models\user\UserSearchModel;
use app\models\user\PasswordChangeFormAdmin;
use app\models\tables\AuthAssignment;
use app\models\tables\AuthItem;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AdminUserController implements the CRUD actions for UserRecord model.
 */
class AdminUserController extends Controller
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
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserRecord models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserRecord model.
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
     * Creates a new UserRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserRecord();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $postt = Yii::$app->request->post("UserRecord");

            $auth = Yii::$app->authManager;
            $auth->assign($auth->getRole($postt["roleName"]), $model->id);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create_form', [
            'model' => $model,
            'roleList' => AuthItem::getRoleList(),
        ]);
    }

    /**
     * Updates an existing UserRecord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelRole = AuthAssignment::find($id)
            ->where(['user_id' => $id])
            ->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $postt = Yii::$app->request->post("AuthAssignment");
            $modelRole->item_name = $postt["item_name"];
            $modelRole->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'roleList' => AuthItem::getRoleList(),
        ]);
    }

    /**
     * Deletes an existing UserRecord model.
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

    public function actionPasswordChange($id)
    {
        $user = $this->findModel($id);
        $model = new PasswordChangeFormAdmin($user);
 
        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('passwordChange', [
                'model' => $model,
                'username' => $user->username,
                'userId' => $user->id
            ]);
        }
    }







    /**
     * Finds the UserRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserRecord::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
