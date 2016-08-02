<?php

use yii\db\Schema;
use yii\db\Migration;

class m151030_073255_all_the_articles_migrations extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        //Articles
        $this->createTable('{{%article}}', [
            'id'                    => $this->primaryKey(),
            'title'                 => $this->string(255)->notNull(),
            'slug'                  => $this->string(128),
            'thumbnail'             => $this->string(255),
            'shortdesc'             => $this->string(500),
            'content'               => $this->text(),
            'created'               => $this->bigInteger(),
            'updated'               => $this->bigInteger(),
            'type'                  => $this->string(64),
            'meta_title'            => $this->string(255),
            'meta_description'      => $this->string(255),
            'meta_keyword'          => $this->string(255),
            'category_id'           =>$this->integer(),
            'watch'                 =>$this->integer(),
            'status'                 =>$this->smallInteger(2),
            'video_frame'            =>$this->text(),
            'tags'                   =>$this->string(255)
        ], $tableOptions);

        //Term groups
        $this->createTable('{{%term_group}}',[
            'id'                    => $this->primaryKey(),
            'slug'                  => $this->string(255),
            'name'                  => $this->string(255),
            'parent_id'             => $this->integer(),


        ],$tableOptions);

        //Terms
        $this->createTable('{{%term}}',[
            'id'                    => $this->primaryKey(),
            'term_group_id'         => $this->integer(),
            'parent'                => $this->integer(),
            'name'                  => $this->string(255),
            'description'           => $this->text(),
            'slug'                  => $this->string(128)
        ],$tableOptions);

        $this->createTable('{{%article_category}}',[
            'id'                    => $this->primaryKey(),
            'name'                   => $this->string(255),
            'description'           => $this->text(),
            'slug'                  => $this->string(128),
            'label_color'           => $this->string(12)
        ],$tableOptions);



        $this->addForeignKey('termFK_term_group','term','term_group_id',"term_group","id");
//        $this->addForeignKey('termFK_parent_term','term','parent',"term","id");

        //Term to article connection
        $this->createTable('{{%term_to_article}}',[
            'term_id'               => $this->integer(),
            'article_id'            => $this->integer(),
        ],$tableOptions);

        $this->addForeignKey('term_to_articleFK_term','term_to_article','term_id',"term","id");
        $this->addForeignKey('term_to_articleFK_article','term_to_article','article_id',"article","id");

        $this->createTable('{{%user_to_fav_article}}',[
            'article_id'            => $this->integer(),
            'user_id'               => $this->integer()
        ],$tableOptions);

        $this->createTable('{{%article_to_related_article}}',[
            'article_id'                        => $this->integer(),
            'related_article_id'               => $this->integer()
        ],$tableOptions);

        $this->addForeignKey('user_to_fav_articlesFK_article','user_to_fav_article','article_id',"article","id");
        $this->addForeignKey('user_to_fav_articlesFK_user','user_to_fav_article','user_id',"user","id");


    }

    public function down()
    {
        $this->dropTable('{{%article}}');
        $this->dropTable('{{%term_group}}');
        $this->dropTable('{{%term}}');
        $this->dropTable('{{%term_to_article}}');
        $this->dropTable('{{%user_to_fav_article}}');
        echo "m151030_073255_all_the_articles_migrations cannot be reverted.\n";

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
