






<?php

/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row mt-2">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Products Tables</h3>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Tables start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <?= Html::a('Create Product', ['/product/create'], ['class' => 'btn btn-success']) ?>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                      
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Ttile</th>
                                                    <th>Photo</th>
                                                    <th>Price</th>
                                                    <th>Category Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach($products as $product):
                                                ?>
                                             
                                                <tr>
                                                    <td scope="row"><?=$product->id?></td>
                                                    <td ><?= $product->name  ?></td>
                                                    <td ><img src="<?= $product->formatImageUrl()  ?>" style="width: 100px;height:70px" /></td>
                                                    <td ><?=  $product->price ?></td>
                                                    <td ><?= $product->category->name  ?></td>
                                                    <td><?= Html::a('<i class="ft-edit"></i></a>', ['update', 'id' => $product->id], ['class' => 'btn btn-warning']) ?></td>
                                                </tr>
                                              

                                                <?php endforeach; ?>

                                            </tbody>

                                          
                                        </table>

                                      
                                       
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic Tables end -->
            </div>
        </div>
    </div>


