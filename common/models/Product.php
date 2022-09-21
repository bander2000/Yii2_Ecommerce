<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;


/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property float $price
 * @property string $image
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{

    public $imageFile;
    const SESSION_KEY = 'CART_ITEMS';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        if(Yii::$app->request->isPut)
        {
            var_dump('bander');
            exit;
        }
    
        return [
            [['category_id', 'name', 'price'], 'required'],
            [['category_id'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['imageFile'], 'image', 'extensions' => 'png, jpg, jpeg, webp', 'maxSize' => 10 * 1024 * 1024,],
            [['image'], 'string', 'max' => 2000],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'image' => 'Image',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function formatImageUrl()
    {
            return Yii::$app->params['frontendUrl'] . '/storage' . $this->image;
        
    }

    public static function getTotalQuantityForUser()
    {
       
            $cartItems = \Yii::$app->session->get(self::SESSION_KEY, []);
            $sum = 0;
            foreach ($cartItems as $cartItem) {
                $sum += $cartItem['quantity'];
            }
         

        return $sum;
    }

    public static function getTotalPriceForItemForUser($productId)
    {
        
            $cartItems = \Yii::$app->session->get(self::SESSION_KEY, []);
            $sum = 0;
            foreach ($cartItems as $cartItem) {
                if ($cartItem['id'] == $productId) {
                    $sum += $cartItem['quantity'] * $cartItem['price'];
                }
            }
        

        return $sum;
    }


}
