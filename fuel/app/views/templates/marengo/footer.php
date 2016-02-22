<div class="container">
    <a class="bn-big" href="#"><img src="/assets/img/templates/marengo/banner_01.jpg"/></a>
</div>
<div class="container">
    <div class="info-wrp">
        <?= $main_page_model->footer_content; ?>
    </div>
    <!--<nav class="clearfix hidden-xs hidden-sm hidden-md">
        <div class="second-menu-wrp">
            <ul class="menu-row">
                <li>
                    <? $links = Model_Link::query()->order_by('weight')->get(); ?>
                    <?= Controller_Application::$current_page == "Home" ? \Fuel\Core\Html::anchor("/", "Главная", array('class' => 'active')) :  \Fuel\Core\Html::anchor("/", "Главная"); ?>
                    <ul class="sub-menu-wrp home">
                        <?php foreach ($links as $link): ?>
                            <li>
                                <? $utl = Router::get('view_category', array('alias' => $link->category->alias)); ?>
                                <?= \Fuel\Core\Html::anchor($utl, $link->title, array('class' => ($utl . '.html' == Controller_Application::$current_page) ? "active" : "")); ?>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </li>
                
                <?php foreach ($links as $link): ?>
                    <li>
                        <? $utl = Router::get('view_category', array('alias' => $link->category->alias)); ?>
                        <?= \Fuel\Core\Html::anchor($utl, $link->title, array('class' => ($utl . '.html' == Controller_Application::$current_page) ? "active" : "")); ?>
                        <ul class="sub-menu-wrp">
                            <?php foreach ($link->category->subsidiary_category as $cat): ?>
                                <? $ul = Router::get('view_category', array('alias' => $cat->alias)); ?>
                                <li><?= \Fuel\Core\Html::anchor($ul, $cat->title, array('class' => ($ul . '.html' == Controller_Application::$current_page) ? "active" : "")); ?></li>
                            <?php endforeach;?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>-->
</div>

