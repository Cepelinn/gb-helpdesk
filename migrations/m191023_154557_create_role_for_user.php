<?php

use app\models\user\UserRecord;
use yii\db\Migration;

/**
 * Class m191023_154557_create_role_for_user
 */
class m191023_154557_create_role_for_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $rbac = Yii::$app->authManager;

        $guest = $rbac->createRole('guest');
        $guest->description = 'Гость';
        $rbac->add($guest);

        $user = $rbac->createRole('user');
        $user->description = 'Использует пользовательский интерфейс';
        $rbac->add($user);

        $admin = $rbac->createRole('admin');
        $admin->description = 'Полубог, обладатель всех прав';
        $rbac->add($admin);

        $rbac->addChild($admin, $user);
        $rbac->addChild($user, $guest);

        $rbac->assign(
            $user,
            UserRecord::findOne(['username' => 'user'])->id
        );

        $rbac->assign(
            $admin,
            UserRecord::findOne(['username' => 'admin'])->id
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $manager = Yii::$app->authManager;
        $manager->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191023_154557_create_role_for_user cannot be reverted.\n";

        return false;
    }
    */
}
