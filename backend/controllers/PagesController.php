<?php

namespace backend\controllers;

use Yii;
use common\models\Pages;
use common\models\PagesSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PagesController implements the CRUD actions for Pages model.
 */
class PagesController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Pages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagesSearch();
       // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $pagesId=Yii::$app->request->get('pagesId');
        $parentId=Yii::$app->request->get('parentId');
        $query = Pages::find()->where(['parent_id' => '0']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,

        ]);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'pagesId' => $pagesId,
                'parentId' => $parentId,
            ]);


    }

    /**
     * Displays a single Pages model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {


        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionParent($id)
    {

        $searchModel = new PagesSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams)->;

        $parentId=Yii::$app->request->get('id');
        $query = Pages::find()->where(['parent_id' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,

        ]);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'parentId' => $parentId,

            ]);


       /*
        return $this->render('parent', [
            'model' => $this->findModel($id),
        ]);*/
    }

    /**
     * Creates a new Pages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pages();
               $parentId=Yii::$app->request->get('parentId');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/pages']);
        }

        return $this->render('create', [
            'model' => $model,
            'parentId' => $parentId,
        ]);
    }

    /**
     * Updates an existing Pages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $parentId=Yii::$app->request->get('parentId');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/pages']);
        }

        return $this->render('update', [
            'model' => $model,
            'parentId' => $parentId,

        ]);
    }

    /**
     * Deletes an existing Pages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
