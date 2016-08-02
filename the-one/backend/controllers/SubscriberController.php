<?php

namespace backend\controllers;

use common\models\User;
use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Subscriber;

/**
 * SubscriberController implements the CRUD actions for Subscriber model.
 */
class SubscriberController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Subscriber models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubscriberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subscriber model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Subscriber model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Subscriber();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Subscriber model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Subscriber model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Subscriber model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Subscriber the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subscriber::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Generates xls for all existing subscribers
     * @return $this
     * @throws \PHPExcel_Exception
     * @throws \PHPExcel_Reader_Exception
     */
    public function actionExport()
    {
        $user = User::find()->all();
        $subscriber = Subscriber::find()->all();
        $model = [];
        $i = 0;
        foreach($user as $item) :
            $model[$i]['name'] = $item->first_name . ' ' . $item->last_name;
            $model[$i]['email'] = $item->email;
            $item->phone = str_replace('[', '', $item->phone);
            $item->phone = str_replace(']', '', $item->phone);
            $item->phone = str_replace('"', '', $item->phone);
            $model[$i]['phone'] = $item->phone;
        $i++;
        endforeach;
        // getting all these data together
        $i = count($model) - 1;
        foreach($subscriber as $item) :
            $model[$i]['name'] = $item->name;
            $model[$i]['email'] = $item->email;
            $model[$i]['phone'] = $item->telephone;
            $i++;
        endforeach;
        $objPHPExcel = new \PHPExcel();
        $sheet=0;
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
        $objPHPExcel->getActiveSheet()->setTitle('Подписчики')
            ->setCellValue('A1', 'Имя')
            ->setCellValue('B1', 'email')
            ->setCellValue('C1', 'Телефон');
        $i=2;
        foreach($model as $item) :
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $item['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $item['email']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $item['phone']);
            $i++;
        endforeach;
        $filename = "MyExcelReport_".date("d-m-Y-His").".xls";
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $fileName = Yii::getAlias('@app/web/download/'.$filename);
        $objWriter->save($fileName);
        return Yii::$app->getResponse()->sendFile($fileName);
    }
}
