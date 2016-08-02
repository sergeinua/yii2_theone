<?php
namespace frontend\controllers;

use common\models\Article;
use common\models\Place;
use common\models\Poster;
use common\models\PosterSearch;
use common\models\search\ArticleSearch;
use common\models\search\Magazine;
use common\models\search\ProfessionalGroup;
use common\models\Setting;
use common\models\Tag;
use common\models\User;
use frontend\components\Instagram;
use frontend\components\OneController;
use frontend\components\OneNotify;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\HttpException;
use Zelenin\Slugifier\Slugifier;
use Zelenin\yii\behaviors\Slug;
use backend\models\Subscriber;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\data\ArrayDataProvider;

/**
 * Site controller
 */
class SiteController extends OneController
{
    public $layout = "new/main";
    /**
     * @inheritdoc
     */

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        //Пригодицца
//        $prof_groups = 'accessories,car-rent,banquet-halls,floristics,wedding,video-shooting,photo,music,visiting-ceremony,catering,registry-offices,makeup,stag-party,honeymoon,photosession-place,mens-suits,underwear,wedding-rings,wedding-decoration,gifts,bride-image,beauty-salons,wedding-agencies,wedding-dress,wedding-dance,wedding-abroad,family-counseling,special-effects,special-leading,confectionery,restaurants,shows-artists,new-chips
//';

        $signUp= new SignupForm();
        $mainPageSettings = Setting::find()->select(['key','value'])->where(['=','group',Setting::$groups['main_page']])->asArray()->all();
        $mainPageSettings = ArrayHelper::map($mainPageSettings,'key','value');
        //Не,ну а как?!
        $feeds = Article::getCategoryFeeds() ;
        //fixing dates
        $feeds = array_reverse($feeds);
        $magazines =  Magazine::find()->all();

        return $this->render('index',[
            'mainPageSettings'=>$mainPageSettings,
            'feeds'=>$feeds,
            'signUp'=>$signUp,
            'magazines'=>$magazines,
            'model'=>$magazines,
        ]);

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {

        $contactSettings = Setting::findByGroup('contacts');
        $contactSettings['contactPlace']=Place::findOne(['place_id',$contactSettings['contact_place_id']]);
        $form = new ContactForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            if ($form->sendEmail(Yii::$app->params['adminEmail'])) {
                OneNotify::prepareNotify('information','Спасибо,мы обязательно свяжемся с вами в ближайшее время');
            } else {
                OneNotify::prepareNotify('error', 'Произошла ошибка при отправке сообщения');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'form' => $form,
                'contactSettings'=>$contactSettings
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $model = ArrayHelper::index(Setting::find()->where(['=','group',Setting::$groups['about_magazine']])->all(),'key');
        $lastOneMagazine = \common\models\Magazine::find()->orderBy('created desc')->one();
        return $this->render('about',[
            'model'=>$model,
            'lastOneMagazine'=>$lastOneMagazine
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                OneNotify::prepareNotify('success','Проверьте вашу почту.');
                //return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Простите,но мы не можем восстановить ваш пароль');
            }
        }
        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }
    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            OneNotify::prepareNotify('success','Новый пароль сохранён');
            return $this->goHome();
        }
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Saves new subscriber
     * @return string
     */
    public function actionSubscribe()
    {
        $request = Yii::$app->getRequest()->post();
        if(!Subscriber::find()->where(['email' => $request['customer_email']])->exists())
            (new Subscriber([
                'created_at' => date('U'),
                'name' => $request['customer_name'],
                'email' => $request['customer_email'],
                'telephone' => $request['customer_tel'],
                'status' => 1
            ]))->save();
        else return 'Вы уже подписаны';

        return 'Спасибо, что подписались на нашу рассылку. Обещаем делиться только самыми интересными
                новостями. Ваш The One';
    }

    /**
     * Search results: searches in the `title` & `shortdesc` of the Poster & Article models
     */
    public function actionSearch()
    {
        $data = Yii::$app->request->get('search-field');

        $posters = Poster::find()
            ->select(["concat('/poster/', slug) as id, title, shortdesc, created, slug"])
            ->filterWhere(['like', 'title', $data])
            ->orFilterWhere(['like', 'shortdesc', $data])
            ->all();

        $articles = Article::find()
            ->select(["concat('/poster/', slug) as id, title, shortdesc, created, slug"])
            ->filterWhere(['like', 'title', $data])
            ->orFilterWhere(['like', 'shortdesc', $data])
            ->all();
        //links for poster models
        foreach($posters as $poster) :
            $poster->id = '/poster/' . $poster->slug;
        endforeach;
        //links for article models
        foreach($articles as $article) :
            $article->id = '/article/' . $article->slug;
        endforeach;

        $models = array_merge($posters, $articles);
        $pagination = new Pagination(['totalCount' => count($models), 'pageSize' => 10]);
        $total_results = count($models);
        //applying selection for the search results
        foreach($models as $model) :
            $length = strlen($data);
            $start_pos = stripos(mb_strtolower($model->title, 'utf-8'), mb_strtolower($data, 'utf-8'));
            if($start_pos > -1) :
                $text_before = substr($model->title, 0, $start_pos);
                $text_after = substr($model->title, $start_pos + $length, strlen($model->title));
                $model->title = $text_before . '<span class="search-result-word">' . $data . '</span>' . $text_after;
            endif;
            $start_pos = stripos(mb_strtolower($model->shortdesc, 'utf-8'), mb_strtolower($data, 'utf-8'));
            if($start_pos > -1) :
                $text_before = substr($model->shortdesc, 0, $start_pos);
                $text_after = substr($model->shortdesc, $start_pos + $length, strlen($model->shortdesc));
                $model->shortdesc = $text_before . '<span class="search-result-word">' . $data . '</span>' . $text_after;
            endif;
        endforeach;

        return $this->render('search-results', [
            'models' => array_chunk($models, 10),
            'pagination' => $pagination,
            'data' => $data,
            'total_results' => $total_results,
        ]);
    }

    /**
     * Displays search results for the existing tags in the Article model
     */
    public function actionTag()
    {
        $data = Yii::$app->request->get('tag');
        $tag_model = Tag::find()->all();
        $needed_ids = [];
        //getting tags
        foreach($tag_model as $item) :
            $item->text = str_replace(' ', '', $item->text);
            $tags = explode(',', $item->text);
            foreach($tags as $tag) :
                if($tag == $data) :
                    array_push($needed_ids, $item->article_id);
                endif;
            endforeach;
        endforeach;
        $models = Article::find()->where(['id' => $needed_ids])->all();
        $total_results = count($models);
        $pagination = new Pagination(['totalCount' => count($models), 'pageSize' => 10]);
        $models = array_chunk($models, 10);

        return $this->render('search-tags', [
            'models' => $models,
            'total_results' => $total_results,
            'data' => $data,
            'pagination' => $pagination
        ]);
    }
}
