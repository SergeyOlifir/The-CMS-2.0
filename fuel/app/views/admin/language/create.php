<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Новый Язык</h3>
    </div>
    <?= Fuel\Core\Form::open(array('enctype'=>'multipart/form-data')); ?>
        <?= render('admin/language/_form'); ?>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-flat">Создать</button>
        </div>
    <?= Fuel\Core\Form::close(); ?>
</div>
