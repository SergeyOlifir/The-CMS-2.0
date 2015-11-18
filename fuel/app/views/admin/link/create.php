<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Новая cсылка для главного меню</h3>
    </div>
    <?= Fuel\Core\Form::open(); ?>
        <?= render('admin/link/_form'); ?>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-flat">Создать</button>
        </div>
    <?= Fuel\Core\Form::close(); ?>
</div>
