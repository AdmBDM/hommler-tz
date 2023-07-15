<?php

use yii\db\Migration;

/**
 * Class m230715_092429_products
 */
class m230715_092429_products extends Migration
{
	/**
	 * @return false|mixed|void
	 */
    public function safeUp()
    {
		$this->createTable('products', [
				'id' => $this->primaryKey(),
				'image' => $this->integer(),
				'sku' => $this->string(32)->notNull(),
				'product_name' => $this->string(255)->notNull(),
				'product_type' => $this->string(255)->notNull(),
				'quantity' => $this->integer()->notNull()->defaultValue(0),
		]);

    }

	/**
	 * @return false|mixed|void
	 */
    public function safeDown()
    {
		$this->dropTable('products');
    }
}
