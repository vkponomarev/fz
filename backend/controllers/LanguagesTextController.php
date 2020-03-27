<?php

namespace backend\controllers;

use Yii;
use common\models\LanguagesText;
use common\models\LanguagesTextSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LanguagesTextController implements the CRUD actions for LanguagesText model.
 */
class LanguagesTextController extends Controller
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
     * Lists all LanguagesText models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LanguagesTextSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LanguagesText model.
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

    /**
     * Creates a new LanguagesText model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LanguagesText();
        $languages=Yii::$app->request->get('languages');
        $languages_trans=Yii::$app->request->get('languages_trans');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/languages']);
        }

        return $this->render('create', [
            'model' => $model,
            'languages' => $languages,
            'languages_trans' => $languages_trans,
        ]);
    }

    /**
     * Updates an existing LanguagesText model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $languages=Yii::$app->request->get('languages');
        $languages_trans=Yii::$app->request->get('languages_trans');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/languages']);
        }

        return $this->render('update', [
            'model' => $model,
            'languages' => $languages,
            'languages_trans' => $languages_trans,
        ]);
    }

    /**
     * Deletes an existing LanguagesText model.
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
     * Finds the LanguagesText model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LanguagesText the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LanguagesText::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
