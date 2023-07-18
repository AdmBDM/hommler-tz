<?php

	use yii\helpers\Html;
	use yii\web\View;

	/* @var $this View */
	/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->params['app_title'] . '</span>', '', ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation" style="justify-content: flex-end;">
		<div class="navbar-custom-menu">
			<div class="pull-left"  role="button">
				<?= Html::a(
					'Выход',
					['/site/logout'],
					['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
				) ?>
			</div>
		</div>
	</nav>
</header>
