<?php

	use yii\grid\GridView;
	use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var $orders */
/** @var $dataProvider */

$this->title = Yii::t('app', 'Порядок вывода');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
	]); ?>

</div>
