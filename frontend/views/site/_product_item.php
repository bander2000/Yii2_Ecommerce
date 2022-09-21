<?php
/**
 * User: TheCodeholic
 * Date: 12/12/2020
 * Time: 11:53 AM
 */

use yii\helpers\Html;
use yii\helpers\Url;

/** @var \common\models\Product $model */
?>
    <div class="card h-100">
        <a href="#" class="img-wrapper">
            <img style="height:250px;width:100%" class="card-img-top" src="<?php echo $model->formatImageUrl() ?>" alt="">
        </a>
        <div class="card-body">
            <h5 class="card-title">

                <a href="<?php echo Url::to('product/view?id='.$model->id) ?>" 
                class="text-dark">Product Name: <?php echo \yii\helpers\StringHelper::truncateWords($model->name, 20) ?></a>
            </h5>
            <h5>Price: <?php echo $model->price .' $'?></h5>
            <div class="card-text">
                Category Name: 
                <?php echo $model->category->name ?>
            </div>
        </div>
  
    </div>