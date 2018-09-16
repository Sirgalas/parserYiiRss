<?php

namespace app\modules\admin\controllers;

use app\forms\NewsForm;
use app\services\admin\NewsService;
use Yii;
use app\entities\News;
use app\modules\admin\search\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    public $service;

    public function __construct(string $id, $module,NewsService $service, array $config = [])
    {
    parent::__construct($id, $module, $config);
    $this->service=$service;
    }

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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $form = new NewsForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try{
                $news=$this->service->create($form);
                return $this->redirect(['view', 'id' => $news->id]);
            }catch (\RuntimeException $e){
                Yii::error($e);
                Yii::$app->session->setFlash('error','Новость не создалась');
            }
        }
        return $this->render('create', [
            'model' => $form,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $news = $this->findModel($id);
        $form = new NewsForm($news);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try{
                $news=$this->service->create($form);
                return $this->redirect(['view', 'id' => $news->id]);
            }catch (\RuntimeException $e){
                Yii::error($e);
                Yii::$app->session->setFlash('error','Изменения  не сохранились');
            }
        }
        return $this->renderAjax('update', [
            'model' => $form,
            'news'=>$news
        ]);
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->service->remove($id);
        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
