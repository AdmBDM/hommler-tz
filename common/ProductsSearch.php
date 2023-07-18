<?php

namespace common;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `common\models\Products`.
 */
class ProductsSearch extends Products
{
	/**
	 * @return array[]
	 */
    public function rules(): array
    {
        return [
            [['id', 'quantity'], 'integer'],
            [['image', 'sku', 'product_name', 'product_type'], 'safe'],
        ];
    }

	/**
	 * @return array|array[]
	 */
    public function scenarios(): array
	{
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider
	{
        $query = Products::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'quantity' => $this->quantity,
        ]);

//        $query->andFilterWhere(['ilike', 'image', $this->image])
        $query->andFilterWhere(['ilike', 'sku', $this->sku])
            ->andFilterWhere(['ilike', 'product_name', $this->product_name])
//            ->andFilterWhere(['ilike', 'product_type', $this->product_type])
			;

        return $dataProvider;
    }
}
