<?php

namespace common\models;

use Yii;
use yii\grid\ActionColumn;
use yii\helpers\Url;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $image
 * @property string $sku
 * @property string $product_name
 * @property string $product_type
 * @property int $quantity
 */
class Products extends \yii\db\ActiveRecord
{
	const FIELD_SORT = 'order';

	/**
	 * @return string
	 */
    public static function tableName(): string
	{
        return 'products';
    }

	/**
	 * @return array
	 */
    public function rules(): array
	{
        return [
            [['image'], 'string'],
            [['quantity'], 'integer'],
            [['quantity'], 'default', 'value' => 0],
            [['sku'], 'string', 'max' => 50],
            [['product_name', 'product_type'], 'string', 'max' => 255],
//            [['product_type'], 'default', 'value' => ''],
        ];
    }

	/**
	 * @return string[]
	 */
    public function attributeLabels(): array
	{
        return [
            'id' => 'ID',
            'image' => 'Фото',
            'sku' => 'СКУ',
            'product_name' => 'Наиенование',
            'product_type' => 'Тип',
            'quantity' => 'Кол-во',
        ];
    }

	/**
	 * @return array[]
	 */
	public function columnsOrdersInit(): array
	{
		return [
			[
				'attribute' => 'id',
				'options' => ['style' => 'width: 50px;'],
				'order' => 10,
				'on' => true,
			],
			[
				'attribute' => 'image',
				'options' => ['style' => 'width: 200px;'],
				'order' => 20,
				'on' => true,
			],
			[
				'attribute' => 'sku',
				'options' => ['style' => 'width: 200px;'],
				'order' => 30,
				'on' => true,
			],
			[
				'attribute' => 'product_name',
				'options' => ['style' => 'width: 300px;'],
				'order' => 40,
				'on' => true,
			],
			[
				'attribute' => 'product_type',
				'options' => ['style' => 'width: 100px;'],
				'order' => 50,
				'on' => true,
			],
			[
				'attribute' => 'quantity',
				'options' => ['style' => 'width: 70px;'],
				'order' => 60,
				'on' => true,
			],
		];
	}

	/**
	 * @return array[]
	 */
	public function columnsOrders(): array
	{
		$orders = $this->columnsOrdersInit();
		uasort($orders, build_sorter_asc(self::FIELD_SORT));

		return $orders;
	}
}
