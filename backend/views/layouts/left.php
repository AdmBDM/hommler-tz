<?php ?>

<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    [
                        'label' => 'Тестовое задание',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Товары', 'icon' => 'file-code-o', 'url' => ['/products'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
