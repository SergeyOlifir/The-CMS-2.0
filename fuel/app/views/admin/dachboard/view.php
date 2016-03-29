<div class="row">
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="info-box bg-red ">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Непросмотренные комментарии</span>
                <span class="info-box-number"><?= $unwotched_comments_count; ?></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description small-box">
                    <?= \Fuel\Core\Html::anchor('/admin/comment/index/unread', 'Просмотреть все', array('class' => 'small-box-footer')); ?>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="info-box bg-green-gradient ">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Комментариев сегодня</span>
                <span class="info-box-number"><?= $new_comments_count; ?></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description small-box">
                    <?= \Fuel\Core\Html::anchor('/admin/comment/index/new', 'Просмотреть все', array('class' => 'small-box-footer')); ?>
                </span>
            </div>
        </div>
    </div>
</div>
