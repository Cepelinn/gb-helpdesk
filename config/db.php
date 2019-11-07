<?php
if (\Yii::$app->request->serverName == "localhost") {
	return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=yii2basic',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        // Schema cache options (for production environment)
        //'enableSchemaCache' => true,
        //'schemaCacheDuration' => 60,
        //'schemaCache' => 'cache',
    ];
} else {
	return [
        'class' => 'yii\db\Connection',
        'dsn' => "mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_98cc072d7c5b980",
        'username' => "bb36c253c13329",
        'password' => "1c318e28",
        'charset' => 'utf8',
    ];
}
