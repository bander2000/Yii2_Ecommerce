<div class="product-section container" style="display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 120px;
    padding: 100px 0 120px;">
        <div>
            <div class="product-section-image" style=" display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #979797;
    padding: 30px;
    text-align: center;
    height: 400px;">
                <img src="<?php echo $product->formatImageUrl() ?>" style="width: 100%;height:100%;" alt="product" />
            </div>
            
        </div>
        <div class="product-section-information">
            <h1 class="product-section-title">Product Name: <?php  echo $product->name   ?></h1>


           
            <div class="product-section-price">Price: <?php  echo $product->price  ?></div>



            <p>
                Category Name: 
                <?php  echo $product->category->name   ?>
            </p>

            <a href="<?php echo \yii\helpers\Url::to(['/cart/add']) ?>" data-id="<?php echo $product->id ?>" class="btn btn-primary btn-add-to-cart">
                Add to Cart
            </a>

         
        </div>
    </div> <!-- end product-section -->
