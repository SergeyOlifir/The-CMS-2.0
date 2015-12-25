<div class="posts-count-section">
    <div class="container">
        <h5>
            <?php 
                $count = (string)Model_Content::count();
                $str = strlen($count); 
            ?>
            <?php if ($str < 4): ?>
                <?php for($i = 0; $i < 4 - $str; $i++): ?>
                    <?php $count = "0" . $count;?>
                <?php endfor; ?>
            <?php endif; ?>
            <?php for($i = 0; $i < strlen($count); $i++): ?>
                <?php if(strlen($count) - $i > 3): ?>
                    <i class="th"><?php echo $count[$i]; ?></i>
                <?php else: ?>
                    <i><?php echo $count[$i]; ?></i>
                <?php endif; ?>
            <?php endfor; ?>
            <span>количество постов на сайте</span>
        </h5>
    </div>
</div>


<div class="container">
    <div class="info-wrp">
        <div class="row">
            
            
            <div class="col-sm-4">
                <h3>Контакты</h3>
                <p><strong>ТМ «Кандибур»</strong></br>
                    Украина. г. Днепропетровск<br>
                    пр. Карла Маркса 111-а, 3 этаж<br>
                </p>
                <h3>Контактные телефоны</h3>
                <p>
                    гор. тел. +38 056 788-69-37<br>
                    моб. тел. +38 097 699-43-57<br> 
                </p>
            </div>
            <div class="col-sm-4 hidden-xs">
                <h3>Карта проезда</h3>
            </div>
            <div class="col-sm-4">
                <h3>Филиалы детского центра:</h3>
                <p>Д.Ц. Мультидом<br>
                    г. Новомосковск ул. Советская, 50<br>
                    тел.: + 38 097 363-60-75; +38 095 703-69-69<br>
                </p>
                <p>Д.Ц. Звездочка<br>
                    г. Днепропетровск<br>
                    бульвар Звездный 1, район ТРЦ Дафи<br>
                    гор. тел.: +38 056 785-88-70<br>
                </p>
            </div>
        </div>
    </div>
    <nav class="clearfix hidden-xs hidden-sm">
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
    </nav>
</div>

