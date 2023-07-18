<?php

	/* @var $content */

	use yii\widgets\Breadcrumbs;
	use dmstr\widgets\Alert;

?>
<div class="content-wrapper">
    <section class="content-header">
		<h1 class="lead">Страничка администрирования.</h1>
        <?= Breadcrumbs::widget(
		[
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			])
		?>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer"><strong>&copy; 2023 Jim7.</strong></footer>
<div class='control-sidebar-bg'></div>