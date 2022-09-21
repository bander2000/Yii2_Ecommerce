<?php

namespace frontend\controllers;

use common\models\product;
use frontend\base\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritDoc
     */
   
    public function actionView($id)
    {
        return $this->render('view', [
            'product' => product::find()->where(['id' => $id]) -> one(),
        ]);
    }

}
