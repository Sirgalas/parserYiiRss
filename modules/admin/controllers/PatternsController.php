<?php

namespace app\modules\admin\controllers;

use app\forms\PatternForm;
use app\services\admin\PatternsService;
use Yii;
use app\entities\Patterns;
use app\modules\admin\search\PatternsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaternsController implements the CRUD actions for Paterns model.
 */
class PatternsController extends Controller
{

    public $service;

    public function __construct(string $id, $module,PatternsService $service, array $config = [])
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
     * Lists all Paterns models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatternsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Paterns model.
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
     * Creates a new Paterns model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $form = new PatternForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try{
                $pattern=$this->service->create($form);
                return $this->redirect(['view', 'id' => $pattern->id]);
            }catch (\RuntimeException  $e){
                Yii::error($e);
                Yii::$app->session->setFlash('error','Шаблон не сохранился');
            }
        }
        return $this->render('create', [
            'model' => $form,
        ]);
    }

    /**
     * Updates an existing Paterns model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $pattern = $this->findModel($id);
        $form=new PatternForm($pattern);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try{
                $this->service->edit($pattern,$form);
                return $this->redirect(['view', 'id' => $form->id]);
            }catch (\RuntimeException $e) {
                Yii::error($e);
                Yii::$app->session->setFlash('error','Изменения не применились');
            }
        }
        return $this->render('update', [
            'model' => $form,
            'pattern'=>$pattern
        ]);
    }

    /**
     * Deletes an existing Paterns model.
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
     * Finds the Paterns model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Patterns the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patterns::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
