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
                        <div class="pull-left img-bg" style="background-image: url('<?= "/files/" . $image->small; ?>')">
                            <?= Fuel\Core\Html::anchor('/admin/mainpage/remove_image/' . $image->id, 'x', array('class' => 'btn-remove')); ?>
                            <a href="" class="btn-edit" data-toggle="modal" data-target="#image_label_form" data-pass="<?= $image->id ?>">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
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
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Реклама категорий первого типа</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <? if(count($model->get_featured_categories('1')) > 0): ?>
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <table id="example1" class="table table-bordered table-striped table-data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Алиас</th>
                                <th>Заголовок</th>
                                <th>Дата Создания</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach($model->get_featured_categories('1') as $rmodel): ?>
                                <tr>
                                    <td><?= $rmodel->id; ?></td>
                                    <td><?= $rmodel->alias; ?></td>
                                    <td><?= $rmodel->title; ?></td>
                                    <td><?= Date::forge($rmodel->created_at)->format("%d/%m/%Y %H:%M"); ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a id="drop1" href="#" class="dropdown-toggle btn btn-block btn-default btn-flat" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                              Действия
                                              <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="drop1">
                                              <li><a href="/admin/category/view/<?= $rmodel->id ;?>">Просмотреть</a></li>
                                              <li><a href="/admin/category/edit/<?= $rmodel->id ;?>">Редактировать</a></li>
                                              <li><a onclick="confirm('Вы уверены?')" href="/admin/mainpage/remove_featured/1/<?= $rmodel->id ;?>">Отвязать</a></li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <? else: ?>
                    <p class="text-center">Пока ничего нет</p>
                <? endif;?>
            </div>
            <div class="box-footer">
                <button data-toggle="modal" data-target="#featured_categiry_form_type_1" class="btn btn-primary btn-block btn-flat"><b>Добавить</b></button>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Реклама категорий второго типа</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <? if(count($model->get_featured_categories('2')) > 0): ?>
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <table id="example1" class="table table-bordered table-striped table-data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Алиас</th>
                                <th>Заголовок</th>
                                <th>Дата Создания</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach($model->get_featured_categories('2') as $rmodel): ?>
                                <tr>
                                    <td><?= $rmodel->id; ?></td>
                                    <td><?= $rmodel->alias; ?></td>
                                    <td><?= $rmodel->title; ?></td>
                                    <td><?= Date::forge($rmodel->created_at)->format("%d/%m/%Y %H:%M"); ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a id="drop1" href="#" class="dropdown-toggle btn btn-block btn-default btn-flat" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                              Действия
                                              <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="drop1">
                                              <li><a href="/admin/category/view/<?= $rmodel->id ;?>">Просмотреть</a></li>
                                              <li><a href="/admin/category/edit/<?= $rmodel->id ;?>">Редактировать</a></li>
                                              <li><a onclick="confirm('Вы уверены?')" href="/admin/mainpage/remove_featured/2/<?= $rmodel->id ;?>">Отвязать</a></li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <? else: ?>
                    <p class="text-center">Пока ничего нет</p>
                <? endif;?>
            </div>
            <div class="box-footer">
                <button data-toggle="modal" data-target="#featured_categiry_form_type_2" class="btn btn-primary btn-block btn-flat"><b>Добавить</b></button>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Анонсы категорий</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <? if(count($model->promoted_category) > 0): ?>
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <table id="example1" class="table table-bordered table-striped table-data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Алиас</th>
                                <th>Заголовок</th>
                                <th>Дата Создания</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach($model->promoted_category as $rmodel): ?>
                                <tr>
                                    <td><?= $rmodel->id; ?></td>
                                    <td><?= $rmodel->alias; ?></td>
                                    <td><?= $rmodel->title; ?></td>
                                    <td><?= Date::forge($rmodel->created_at)->format("%d/%m/%Y %H:%M"); ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a id="drop1" href="#" class="dropdown-toggle btn btn-block btn-default btn-flat" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                              Действия
                                              <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="drop1">
                                              <li><a href="/admin/category/view/<?= $rmodel->id ;?>">Просмотреть</a></li>
                                              <li><a href="/admin/category/edit/<?= $rmodel->id ;?>">Редактировать</a></li>
                                              <li><a onclick="confirm('Вы уверены?')" href="/admin/mainpage/drop_promo/<?= $model->id ;?>/<?= $rmodel->id ;?>">Отвязать</a></li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <? else: ?>
                    <p class="text-center">Пока ничего нет</p>
                <? endif;?>
            </div>
            <div class="box-footer">
                <button data-toggle="modal" data-target="#promo_categiry_form" class="btn btn-primary btn-block btn-flat"><b>Добавить</b></button>
            </div>
        </div>
    </div>
</div>

<?= render('admin/mainpage/promo_category_form', array(
    'relations' => $model->promoted_category,
    'action' => "admin/mainpage/add_promo/{$model->id}",
    'popup_id' => 'promo_categiry_form',
    'models' => Model_Category::find('all')
)); ?>

<?= render('admin/mainpage/promo_category_form', array(
    'relations' => $model->get_featured_categories('1'),
    'action' => "admin/mainpage/add_featured/{$model->id}/1",
    'popup_id' => 'featured_categiry_form_type_1',
    'models' => Model_Category::find('all')
)); ?>

<?= render('admin/mainpage/promo_category_form', array(
    'relations' => $model->get_featured_categories('2'),
    'action' => "admin/mainpage/add_featured/{$model->id}/2",
    'popup_id' => 'featured_categiry_form_type_2',
    'models' => Model_Category::find('all')
)); ?>

<?= render('admin/mainpage/image_label_form', array(
    'action' => "admin/mainpage/edit_image_label",
    'popup_id' => 'image_label_form'
)); ?>