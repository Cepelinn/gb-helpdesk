<?php

use yii\db\Migration;

/**
 * Class m191128_191120_add_manager_role
 */
class m191128_191120_add_manager_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $rbac = Yii::$app->authManager;

        $manager = $rbac->createRole('manager');
        $manager->description = 'Тот кто разбирает задачи';
        $rbac->add($manager);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $roleManager = Yii::$app->authManager;

        $manager = Yii::$app->authManager->getRole('manager');

        $roleManager->remove($manager);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191128_191120_add_manager_role cannot be reverted.\n";

        return false;
    }
    */
}
