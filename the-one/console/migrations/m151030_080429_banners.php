<?php

use yii\db\Schema;
use yii\db\Migration;

class m151030_080429_banners extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        //Banners
        $this->createTable('{{%banner}}', [
            'id'                    => $this->primaryKey(),
            'route'                 => $this->string(255)->notNull(),
            'banner'                => $this->text(),
            'size'                  => $this->integer(),
            'position'              => $this->string(32),
            'url'                   => $this->string(255)
        ], $tableOptions);

        //Route to banner

    }

    public function down()
    {

        $this->dropTable('{{%banner}}');
        $this->dropTable('{{%route_to_banner}}');
        $this->dropTable('{{%route}}');
        echo "m151030_080429_banners cannot be reverted.\n";

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
