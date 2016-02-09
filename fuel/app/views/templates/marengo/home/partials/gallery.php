<? if(isset($main_page_model)): ?>
    <? if(count($main_page_model->get_images()) > 0): ?>
        <section id="main-carousel" class="carousel slide">
            <ol class="carousel-indicators">
                <? $i = 0; ?>
                <? foreach($main_page_model->get_images() as $image): ?>
                    <li data-target="#main-carousel" class="<?= ($i === 0) ? 'active' : ''; ?>" data-slide-to="<?= $i++; ?>"></li>
                <? endforeach; ?>
            </ol>
            <div class="carousel-inner">
                <? $i = 0; ?>
                <? foreach($main_page_model->get_images() as $image): ?>
                    <div class="item <?= ($i++ === 0) ? 'active' : ''; ?>" style="background-image: url('<?= '/files/' . $image->origin ;?>')">
                        <? if ((!is_null($image->title) and $image->title != '')): ?>
                            <span class="image-title"><?= $image->title ?></span>
                        <? endif; ?>
                    </div>
                <? endforeach; ?>
            </div>
        </section>
        <script>$('#main-carousel').carousel();</script>
    <? endif; ?>
<? endif; ?>
