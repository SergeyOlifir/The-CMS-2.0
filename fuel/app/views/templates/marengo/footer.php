<div class="container">
    <a href="#"><img src="/assets/img/templates/marengo/logo_footer.png"</a>
</div>

<div class="container">
    <div class="info-wrp">
        <div class="row">
            <h4 class="footer-sub-logo">Marengo Tour</h4>
            <div class="col-sm-6">
                <p>
                    <a href="#" class="footer-map"></a>
                </p>
            </div>
            <div class="col-sm-6">
                <p>тел. в С-Петербурге +7.911.921-53-02<br>
                    г. С-Петербург ул. <br>
                    тел. в Черногории      +382.69.90-18-20<br>
                    г. Будва ул. <br>
                </p>
                
            </div>
            
        </div>
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

