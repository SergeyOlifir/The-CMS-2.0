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
                <?= \Fuel\Core\Html::img('/assets/img/templates/marengo/logo.png'); ?>
            </a>
        </div>
        <div class="collapse navbar-collapse pull-left" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><?= Controller_Application::$current_page == "Home" ? \Fuel\Core\Html::anchor("/" . TCLocal::getCurrentLang(), "Главная", array('class' => 'active')) :  \Fuel\Core\Html::anchor("/" . TCLocal::getCurrentLang(), "Главная"); ?></li>
                <?php foreach ($links as $link): ?>
                    <li>
                        <? $utl = TCRouter::get('view_category', array('lang' => TCLocal::getCurrentLang(), 'alias' => $link->category->alias)); //Fuel\Core\Uri::base() . "home/pages/view/{$link->category->alias}"; ?>
                        <?= \Fuel\Core\Html::anchor($utl, $link->title, array('class' => ($utl == Controller_Application::$current_page) ? "active" : "")); ?>
                    </li>
                <?php endforeach; ?>
                <?php foreach (Model_Language::find('all') as $lang): ?>
                    <li>
                        <? $route_params['named_params']['lang'] = $lang->code; ?>
                        <? //var_dump($route_params); ?>
                        <a href="<?= Fuel\Core\Router::get(str_replace('_with_lang', '', $route_params['name']) . '_with_lang', $route_params['named_params']) ;?>">
                            <img src="<?= $lang->get_logo('small') ?>" style="max-width: 30px; height: 15px;" class="lang-img" />
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>