<?php

namespace app\modules\admin\controllers;

use app\forms\CategoryForm;
use app\services\admin\CategoryService;
use Yii;
use app\entities\Category;
use app\modules\admin\search\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{

    public $service;

    public function __construct(string $id, $module,CategoryService $service,  array $config = [])
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
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $form= new CategoryForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
           try{
               $user=$this->service->create($form);
               return $this->redirect(['view', 'id' => $user->id]);
           }catch (\RuntimeException $e){
               Yii::error($e);
               Yii::$app->session->setFlash('error','Произошла ошибка сохранения');
           }
        }
        return $this->render('create', [
            'model' => $form,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $category = $this->findModel($id);
        $form= new CategoryForm($category);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try{
                $this->service->edit($category,$form);
                return $this->redirect(['view', 'id' => $category->id]);
            }catch (\RuntimeException $e){
                Yii::error($e);
                Yii::$app->session->setFlash('error','Изменения не применились');
            }
        }
        return $this->render('update', [
            'model' => $form,
            'category'=>$category
        ]);
    }

    /**
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
