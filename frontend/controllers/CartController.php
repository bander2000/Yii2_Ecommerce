<?php

namespace frontend\controllers;

use common\models\Product;
use frontend\base\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\filters\ContentNegotiator;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;
use yii\web\Response;

class CartController extends Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => ContentNegotiator::class,
                'only' => ['add',  'change-quantity'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST', 'DELETE'],
                    'create-order' => ['POST'],
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $cartItems =\Yii::$app->session->get(Product::SESSION_KEY, []);;

        return $this->render('index', [
            'items' => $cartItems
        ]);
    }

    public function actionAdd()
    {
        $id = \Yii::$app->request->post('id');

        $product = Product::find()->where(['id' => $id])->one();


        if (!$product) {
            throw new NotFoundHttpException("Product does not exist");
        }

            $cartItems = \Yii::$app->session->get(Product::SESSION_KEY, []);
            $found = false;
            foreach ($cartItems as &$item) {
                if ($item['id'] == $id) {
                    $item['quantity']++;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $cartItem = [
                    'id' => $id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'price' => $product->price,
                    'quantity' => 1,
                    'total_price' => $product->price
                ];
                $cartItems[] = $cartItem;
            }


            \Yii::$app->session->set(Product::SESSION_KEY, $cartItems);
    }

    public function actionDelete($id)
    {
      
            $cartItems = \Yii::$app->session->get(Product::SESSION_KEY, []);
            foreach ($cartItems as $i => $cartItem) {
                if ($cartItem['id'] == $id) {
                    array_splice($cartItems, $i, 1);
                    break;
                }
            }
            \Yii::$app->session->set(Product::SESSION_KEY, $cartItems);
        

        return $this->redirect(['index']);
    }

    public function actionChangeQuantity()
    {
        $id = \Yii::$app->request->post('id');
        $product = Product::find()->where(['id' => $id])->one();
        if (!$product) {
            throw new NotFoundHttpException("Product does not exist");
        }


        $quantity = \Yii::$app->request->post('quantity');

      
      
        
            $cartItems = \Yii::$app->session->get(Product::SESSION_KEY, []);
            foreach ($cartItems as &$cartItem) {
                if ($cartItem['id'] === $id) {
                    $cartItem['quantity'] = $quantity;
                    break;
                }
            }
            \Yii::$app->session->set(Product::SESSION_KEY, $cartItems);

        
            return [
                'quantity' => Product::getTotalQuantityForUser(),
                'price' => Product::getTotalPriceForItemForUser($id)
            ];
        
    }

}
