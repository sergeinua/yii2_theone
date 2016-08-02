<?php

use yii\db\Migration;

class m160217_114732_professionals_view_counter extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%professional_view_count}}', [
            'professional_id'            => $this->bigInteger(),
            'session_id'                 => $this->string(255),
            'time'                       => $this->bigInteger(),

        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('professional_view_count');

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
