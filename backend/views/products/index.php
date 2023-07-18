<?php

use common\models\Products;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Товары');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="products-index">
<!--	--><?php //= myDebug($dataProvider); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Создать'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Выбрать столбцы'), ['order'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<?php $order = [];
			$order[] = [
// колонка действий
			'class' => ActionColumn::class,
			'urlCreator' => function ($action, Products $model, $key, $index, $column) {
				return Url::toRoute([$action, 'id' => $model->id]);
			},
			'options' => ['width' => '100px'],
		];
		foreach ($searchModel->columnsOrders() as $col) {
			$order[] = [
				'attribute' => $col['attribute'],
				'options' => $col['options'],
			];
		}
// пустая колонка для выравнивания
		$order[] = [
			'label' => '',
			'format' => 'text',
			'contentOptions' => ['style'=>'white-space: normal;'],
			'value' => function() {return '';},
		];
	?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $order,
    ]); ?>

    <?php Pjax::end(); ?>

</div>
