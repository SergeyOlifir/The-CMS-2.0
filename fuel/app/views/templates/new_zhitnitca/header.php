<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <?= \Fuel\Core\Html::img('/assets/img/templates/new_zhitnitca/logo.png'); ?>
            </a>
        </div>
        <div class="collapse navbar-collapse pull-left" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><?= Controller_Application::$current_page == "Home" ? \Fuel\Core\Html::anchor("/", "Главная", array('class' => 'active')) :  \Fuel\Core\Html::anchor("/", "Главная"); ?></li>
                <?php foreach ($links as $link): ?>
                    <li>
                        <? $utl = TCRouter::get('view_category', array('alias' => $link->category->alias)); //Fuel\Core\Uri::base() . "home/pages/view/{$link->category->alias}"; ?>
                        <?= \Fuel\Core\Html::anchor($utl, $link->title, array('class' => ($utl == Controller_Application::$current_page) ? "active" : "")); ?>
                    </li>
                <?php endforeach; ?>
                <?php foreach (Model_Language::find('all') as $lang): ?>
                    <li>
                        <a href="javascript:void(0);">
                            <img src="<?= $lang->get_logo('small') ?>" style="max-width: 30px; height: 15px; display: none;" class="lang-img" />
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>