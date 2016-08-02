<?php

use yii\db\Migration;

class m160309_125822_populate_settings extends Migration
{
    public function up()
    {
        $this->execute(file_get_contents(dirname(__DIR__).'/sql/setting.sql'));
    }

    public function down()
    {
        echo "m160309_125822_populate_settings cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
