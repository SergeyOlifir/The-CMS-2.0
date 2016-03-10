<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Прочтите отзыв</h3>
        <div class="box-tools pull-right">
            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
    <div class="box-body no-padding">
        <div class="mailbox-read-info">
            <h3><?= $model->user_name; ?></h3>
            <h5>Почта: <?= $model->user_email; ?>
                <span class="mailbox-read-time pull-right"><?= Date::forge($model->created_at)->format("%d/%m/%Y %H:%M"); ?></span>
            </h5>
        </div>
        <div class="mailbox-controls with-border text-center">
            <div class="btn-group">
                <a onclick="confirm('Вы уверены?')" href="/admin/feedback/remove/<?= $model->id ;?>/true" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                    <i class="fa fa-trash-o"></i>
                </a>
            </div>
        </div>
        <div class="mailbox-read-message">
            <p class="lead"><?= $model->text; ?></p> 
        </div>
        <div class="box-footer">
            <a onclick="confirm('Вы уверены?')" href="/admin/feedback/remove/<?= $model->id ;?>/true" class="btn btn-default"><i class="fa fa-trash-o"></i> Удалить</a>
            <a href="/admin/feedback/index" class="btn btn-default"> К списку</a>
        </div>
    </div>
</div>