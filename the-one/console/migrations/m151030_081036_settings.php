<?php

use yii\db\Schema;
use yii\db\Migration;

class m151030_081036_settings extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        //Banners
        $this->createTable('{{%setting}}', [
            'id'                    => $this->primaryKey(),
            'key'                 => $this->string(255)->notNull(),
            'value'                => $this->text(),
            'group'                => $this->integer(2)
        ], $tableOptions);

//        $this->createIndex('settings_value','setting','value');


    }

    public function down()
    {
        $this->dropTable('settings');
        echo "...settings is down,repeat,settings is down!...\n";

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
