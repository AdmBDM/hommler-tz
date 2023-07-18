<?php

namespace common\models;

use yii\db\ActiveRecord;

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
class Products extends ActiveRecord
{
	const FIELD_SORT = 'order';

	private $userIdCookie;


	public function __construct($config = [])
	{
		$this->userIdCookie = 'htz' . (\Yii::$app->user->id ?: 0);
		if (!isset($_COOKIE[$this->userIdCookie])) {
			setcookie($this->userIdCookie, json_encode($this->columnsOrdersInit()), time() + 3600 * 24 * 365, '/');
		}
		parent::__construct($config);
	}

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
            'product_name' => 'Наименование',
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
//		$orders = $this->columnsOrdersInit();

		if (isset($_COOKIE[$this->userIdCookie])) {
			$orders = json_decode($_COOKIE[$this->userIdCookie], true);
		} else {
			$orders = $this->columnsOrdersInit();
			setcookie($this->userIdCookie, json_encode($orders), time() + 3600 * 24 * 365, '/');
		}

		uasort($orders, build_sorter_asc(self::FIELD_SORT));

		return $orders;
	}
}
