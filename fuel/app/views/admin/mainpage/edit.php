<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Редакрирование главной</h3>
    </div>
    <?= Fuel\Core\Form::open(array('enctype'=>'multipart/form-data')); ?>
        <?= render('admin/mainpage/_form'); ?>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-flat">Обновить</button>
        </div>
    <?= Fuel\Core\Form::close(); ?>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Галерея</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <? $images = $model->get_images(); ?>
                <? if(count($images) > 0): ?>
                    <? foreach($images as $image): ?>
                        <div class="pull-left">
                            <?= Fuel\Core\Html::img('files/' . $image->small, array('class' => 'img-responsive img-bordered img-lg')); ?>
                        </div>
                    <? endforeach;?>
                <? else: ?>
                    <p class="text-center img-lg">Пока ничего нет</p>
                <? endif;?>

            </div>
            <div class="box-footer">
                <?= \Fuel\Core\Form::open(array('action' => '/admin/mainpage/add_image/' . $model->id, 'enctype'=>'multipart/form-data')); ?>
                    <a class="btn btn-primary btn-block btn-flat position-relative">
                        <b>Добавить</b>
                        <?= \Fuel\Core\Form::file('image', array('class' => 'transparent autosubmit')); ?>
                    </a>
                <?= \Fuel\Core\Form::close(); ?>
            </div>
    </div>
</div>