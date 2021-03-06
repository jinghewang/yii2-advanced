<?php

namespace frontend\controllers;

use frontend\behaviors\MyBehavior;
use frontend\events\Developer;
use frontend\events\Dog;
use frontend\events\MessageEvent;
use frontend\interfaces\DanceEventInterface;
use Woodw\Utils\Helpers\UtilsHelper;
use Woodw\Utils\Utils;
use Yii;
use frontend\models\Person;
use frontend\models\PersonSearch;
use yii\base\Event;
use yii\db\ActiveRecord;
use yii\helpers\StringHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonController implements the CRUD actions for Person model.
 */
class PersonController extends Controller
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
            'myBehavior' => [
                'class' => MyBehavior::className(),
                'prop1' => 'value1',
                'prop2' => 'value2',
            ]
        ];
    }

    /**
     * Lists all Person models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Person model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Displays a single Person model.
     * @param string $id
     * @return mixed
     */
    public function actionTest($id=null)
    {
        /*$posts = Yii::$app->db->createCommand('select * from person')
            ->queryOne();
        UtilsHelper::print_p($posts);*/

        var_dump(Yii::$app->user);

        die;


        $code2 = '11';

        $posts = Yii::$app->db->createCommand('select * from person where code=:code or code=:code2')
            ->bindValues([':code' => 'RU'])
            ->bindParam(':code2', $code2)
            ->queryAll();

        UtilsHelper::print_p($posts);

        //--
        $session = Yii::$app->session;
        $session->setFlash('postDeleted', 'You have successfully deleted your post.');
        return $this->render('test', ['session' => $session]);
    }


    /**
     * Creates a new Person model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Person();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->code]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Person model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->code]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Person model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Person model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Person the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
