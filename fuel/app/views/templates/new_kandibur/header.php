<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= TCRouter::get('root', array()); ?>">
                <?= \Fuel\Core\Html::img('/assets/img/templates/new_kandibur/logo.png'); ?>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                
                <li><?= Controller_Application::$current_page == "Home" ? \Fuel\Core\Html::anchor("/" . TCLocal::getCurrentLang(), __("template.main_caption"), array('class' => 'active')) :  \Fuel\Core\Html::anchor("/" . TCLocal::getCurrentLang(), __("template.main_caption")); ?></li>
                <?php foreach ($links as $link): ?>
                    <li>
                        <? $utl = TCRouter::get('view_category', array('lang' => TCLocal::getCurrentLang(), 'alias' => $link->category->alias)); //Fuel\Core\Uri::base() . "home/pages/view/{$link->category->alias}"; ?>
                        <?= \Fuel\Core\Html::anchor($utl, $link->title, array('class' => ($utl == Controller_Application::$current_page) ? "active" : "")); ?>
                    </li>
                <?php endforeach; ?>
                
            </ul>
            <? if(Model_Language::query()->count() > 1):?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= TCLocal::getCurrentLangModel()->name; ?> <i class="glyphicon glyphicon-cog"></i></a>
                        <ul class="dropdown-menu">
                            <?php foreach (Model_Language::find('all') as $lang): ?>
                                <? $route_params['named_params']['lang'] = $lang->code; ?>
                                <li><a href="<?= Fuel\Core\Router::get(str_replace('_with_lang', '', $route_params['name']) . '_with_lang', $route_params['named_params']) ;?>"><?= $lang->name; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            <? endif; ?>
        </div>
    </div>
</nav>