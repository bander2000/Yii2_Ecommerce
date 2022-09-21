<?php 

namespace frontend\base;


use common\models\Product;

/**
 * Class Controller
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package frontend\base
 */
class Controller extends \yii\web\Controller
{
    public function beforeAction($action)
    {

        $this->view->params['cartItemCount'] = Product::getTotalQuantityForUser();
        return parent::beforeAction($action);
    }
}