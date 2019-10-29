<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\tables\Ticket;
use app\models\tables\Users;

class TicketController extends Controller
{
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

            $user = Users::find()
                    ->select(['id', 'email'])
                    ->where(['id' => $model->author_id])
                    ->one();

            $body = "A new ticket request was opend
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
}
