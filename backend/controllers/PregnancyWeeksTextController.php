<?php

namespace backend\controllers;

use Yii;
use common\models\PregnancyWeeksText;
use common\models\PregnancyWeeksTextSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PregnancyWeeksTextController implements the CRUD actions for PregnancyWeeksText model.
 */
class PregnancyWeeksTextController extends Controller
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
     * Lists all PregnancyWeeksText models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PregnancyWeeksTextSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PregnancyWeeksText model.
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
     * Creates a new PregnancyWeeksText model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PregnancyWeeksText();
        $languages=Yii::$app->request->get('languages');
        $pregnancyWeeks=Yii::$app->request->get('pregnancyWeeks');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/pregnancy-weeks', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'pregnancyWeeks' => $pregnancyWeeks,
            'languages' => $languages,

        ]);
    }

    /**
     * Updates an existing PregnancyWeeksText model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $languages=Yii::$app->request->get('languages');
        $pregnancyWeeks=Yii::$app->request->get('pregnancyWeeks');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/pregnancy-weeks', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'pregnancyWeeks' => $pregnancyWeeks,
            'languages' => $languages,
        ]);
    }

    /**
     * Deletes an existing PregnancyWeeksText model.
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
     * Finds the PregnancyWeeksText model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PregnancyWeeksText the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PregnancyWeeksText::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
