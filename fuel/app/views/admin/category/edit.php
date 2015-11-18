<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Редакрирование категории <?= $model->title; ?></h3>
    </div>
    <?= Fuel\Core\Form::open(); ?>
        <?= render('admin/category/_form'); ?>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-flat">Обновить</button>
        </div>
    <?= Fuel\Core\Form::close(); ?>
</div>