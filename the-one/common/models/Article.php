<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
//use yii\web\User;
use Zelenin\yii\behaviors\Slug;

/**
 * This is the model class for table "article". Articles is a similar information units that has similar structrure.
 * They related to-
 *  * Terms - an atributes that used in filter
 *  * Term Groups - groups of terms
 *  * Article Categories - categories of articles
 *  * Colors - Optional parameter of color that can be attached to article
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $thumbnail
 * @property string $content
 * @property string $created
 * @property string $type
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keyword
 *
 * @property TermToArticle[] $termToArticles
 * @property UserToFavArticle[] $userToFavArticles
 */
class Article extends \yii\db\ActiveRecord
{

    protected $_thumbnail;
    protected $_termIDs;
    protected $_colorIDs;
    protected $_category_slug;

    const STATUS_UNPUBLISHED =0;
    const STATUS_PUBLISHED = 10;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
                'value' => new Expression('UNIX_TIMESTAMP(NOW())'),
            ],
            //TODO:SERGEY придумать что сделать со слагом
            /*[
                'class'=>SluggableBehavior::className(),
                'attribute'=>'title',
                'slugAttribute'=>'slug',
                'uniqueSlugGenerator' => function ($baseSlug, $iteration, $model)
                {
                    dump($baseSlug);
                    die;
                }
            ]*/
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'meta_title', 'slug'], 'required'],
            [['content'], 'string'],
            [['created','video_frame'], 'safe'],
            [['thumbnail'], 'file', 'extensions' => ['png', 'jpg', 'gif', 'jpeg'], 'skipOnEmpty' => true, 'maxSize' => 10 * 1024 * 1024],
            [['title', 'meta_title', 'meta_description', 'meta_keyword'], 'string', 'max' => 255],
            [['slug'], 'string', 'max' => 128],
            [['shortdesc'], 'string', 'max' => 500],
            [['type'], 'string', 'max' => 64],
            ['slug', 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'slug' => 'Slug',
            'thumbnail' => 'Изображение',
            'content' => 'содержание',
            'created' => 'Дата создания',
            'type' => 'Тип',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keyword' => 'Meta Keyword',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTermToArticles()
    {
        return $this->hasMany(TermToArticle::className(), ['article_id' => 'id']);
    }

    /**
     *
     * @return $this
     */
    public function getTerms()
    {
        return $this->hasMany(Term::className(), ['id' => 'term_id'])->via('termToArticles');
    }

    /*    public function getTermGroups(){
            return $this->hasOne(TermGroup::className(),['id'=>'term_group_id'])->via('terms');
        }*/

    /**
     * Get related category
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {

        return $this->hasOne(ArticleCategory::className(), ['id' => 'category_id']);

    }

    /**
     * Get users who like article
     * @return $this
     */
    public function getLikedUsers()
    {
        return $this->hasMany(\common\models\User::className(), ['id' => 'user_id'])->viaTable('user_to_fav_article', ['article_id' => 'id']);
    }


    public function getCategorySlug()
    {
//        return $this->getCategory()->slug;
    }

    /**
     * Get related colors
     * @return $this
     */
    public function getColors()
    {

        return $this->hasMany(Color::className(), ['id' => 'color_id'])->viaTable('color_to_article', ['article_id' => 'id']);
    }

    /**
     * Set category id
     * @param $category_slug
     */
    public function setCategory($category_slug)
    {
        $category = ArticleCategory::find()->where(['=', 'slug', $category_slug])->one();
        $this->category_id = $category->id;
    }

    /**
     * Remove all terms that attached to article
     */
    public function dropTerms()
    {
        TermToArticle::deleteAll(['article_id' => $this->id]);
    }

    /**
     * Set term for article
     * @param $term_id
     * @throws \yii\db\Exception
     */
    public function setTerm($term_id)
    {
        Yii::$app->getDb()->createCommand()->insert('{{%term_to_article}}', [
            'term_id' => $term_id,
            'article_id' => $this->id
        ])->execute();
    }

    /**
     * Set related article
     * @param $article_id
     */
    public function setRelatedArticle($article_id)
    {
        Yii::$app->getDb()->createCommand()->insert('{{%article_to_related_article}}', [
            'related_article_id' => $article_id,
            'article_id' => $this->id
        ])->execute();
    }

    /**
     * Get all related articles
     * @return $this
     */
    public function getRelatedArticles()
    {
        return $this->hasMany(Article::className(), ['id' => 'related_article_id'])->viaTable('article_to_related_article', ['article_id' => 'id']);
    }

    /**
     * Drop all relations between current article
     */
    public function dropRelatedArticles()
    {
        Yii::$app->getDb()->createCommand()->delete('{{%article_to_related_article}}', 'article_id = :article_id',
            [':article_id' => $this->id]
        )->execute();
    }

    /**
     * Set relation to article from color
     * @param $color_id
     * @throws \yii\db\Exception
     */
    public function setColor($color_id)
    {
        Yii::$app->getDb()->createCommand()->insert('{{%color_to_article}}', [
            'color_id' => $color_id,
            'article_id' => $this->id
        ])->execute();
    }

    /**
     * Remove all related articles
     * @throws \yii\db\Exception
     */
    public function dropColors()
    {

        Yii::$app->getDb()->createCommand()->delete('{{%color_to_article}}', 'article_id = :article_id',
            [':article_id' => $this->id]
        )->execute();
    }

    /**
     * Delete image from server
     *
     */
    public function dropThumbnail()
    {
        $file = Yii::$app->params['imgPath'] . $this->thumbnail;
        if (file_exists($file) && !is_dir($file)) {
            unlink($file);
        }
    }

    /**
     * Get formatted date of creation of article
     * @return bool|string
     */
    public function getCreatedDate()
    {
        return date('d.m.Y', $this->created);
    }

    /**
     * Check if article liked by logged user
     * @return bool
     */
    public function getIsLikedByCurrentUser()
    {
        if(!Yii::$app->user->isGuest){
            return in_array(Yii::$app->user->identity->id, ArrayHelper::getColumn($this->likedUsers, 'id'));
        }
        return false;
    }

    /**
     *
     */
    public function saveThumbnail()
    {
        $file = UploadedFile::getInstance($this, 'thumbnail');
    }

    /**
     * Like/dislike article
     * @param $articleId
     * @return bool
     * @throws \yii\db\Exception
     */
    public static function toggleLike($articleId)
    {
        $userId = Yii::$app->user->identity->id;
        $currently = Yii::$app->db->createCommand(
            "SELECT * from `user_to_fav_article`
              where `article_id`={$articleId}
              and `user_id`= {$userId}"
        )->queryAll();
        $command = Yii::$app->db->createCommand();
        if (!empty($currently)) {
            $command->delete('user_to_fav_article', ['and', ['=', 'article_id', $articleId], ['=', 'user_id', $userId]])
                ->execute();
            return false;
        } else {
            $command->insert('user_to_fav_article', ['article_id' => $articleId, 'user_id' => $userId])
                ->execute();
            return true;
        }
    }

    /**
     * There are lotta things to do before delete.
     * We shoul purge the following recordings
     * @return bool
     */
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * A function that returns data sorted for select2 element
     * @return array
     */
    public static function getSelect2RelatedArticlesData()
    {
        //Было сложно получить необходимые мне данные с помощью моделей.
        //Для того чтобы всего лишь получить данные для заполнения селектов мне нужно только три поля.
        //Поэтому пришлось сделать так.
        $return = Yii::$app->db
            ->createCommand("SELECT
                              `article`.`id`,
                              `article`.`title`,
                              `article_category`.`name` as `category`
                              FROM `article`
                              LEFT JOIN `article_category`
                              ON `article`.`category_id` = `article_category`.`id`")->queryAll();
        //TODO:Некрасиво получилось.
        $sorted = ArrayHelper::map($return, 'id', 'title', 'category');
        $data = [];
        foreach ($sorted as $k => $v) {
            $children = [];
            foreach ($v as $kChild => $child) {
                $children[] = [
                    'id' => $kChild,
                    'text' => $child
                ];
            }
            $data[] = [
                'text' => $k,
                'children' => $children
            ];
        }
        return $data;
    }

    public static function getCategoryFeeds(){
        return self::findBySql('
            select `article`.*
            from `article`
            inner join (
                select category_id,
                       MAX(created) max_created
                from article
                where category_id!=8 and status = 10
                group by category_id) b
             on `article`.`category_id`=`b`.`category_id`
             and `article`.`created` = `b`.`max_created`')->all();
    }
}
