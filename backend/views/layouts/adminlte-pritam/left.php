<aside class="main-sidebar">

    <section class="sidebar">

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    [
                        'label' => 'CV',
//                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Create/Update CV', 'icon' => 'far fa-user-circle', 'url' => ['personal-data/create']],
                            ['label' => 'View CV', 'icon' => 'fas fa-eye', 'url' => ['cv/view']],

                        ]
                    ],


                    [
                        'label' => 'Forms',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Personal Info', 'icon' => 'fas fa-user', 'url' => ['/personal-data']],
                            ['label' => 'Education', 'icon' => 'fas fa-graduation-cap', 'url' => ['/education']],
                            ['label' => 'Experience', 'icon' => 'fas fa-briefcase', 'url' => ['/experience']],
                            ['label' => 'Certification', 'icon' => 'fas fa-certificate', 'url' => ['/certification']],
                            ['label' => 'Achievement', 'icon' => 'fas fa-trophy', 'url' => ['/achievement']],
                            ['label' => 'Training', 'icon' => 'fas fa-wrench', 'url' => ['/training']],
                            ['label' => 'Skill', 'icon' => 'fas fa-cogs', 'url' => ['/skill']],
                            ['label' => 'Language', 'icon' => 'fas fa-language', 'url' => ['/language']],
                            ['label' => 'Project', 'icon' => 'fas fa-puzzle-piece', 'url' => ['/project']],
                            ['label' => 'Reference', 'icon' => 'fas fa-users', 'url' => ['/reference']],
                        ]
                    ]






//                    [
//                        'label' => 'Some tools',
//                        'icon' => 'share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
