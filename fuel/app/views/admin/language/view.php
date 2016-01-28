<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?= render('admin/language/lang_card', array('cmodel' => $model)); ?>
            <div class="box-footer">
                <a href="/admin/language/edit/<?= $model->id;?>" class="btn btn-primary btn-block btn-flat"><b>Редатировать</b></a>
            </div>
        </div>
    </div>
</div>
