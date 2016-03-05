<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <?= render('admin/content/profile_card', array('cmodel' => $model)); ?>
            <div class="box-footer">
                <a href="/admin/content/edit/<?= $model->id;?>" class="btn btn-primary btn-block btn-flat"><b>Редатировать</b></a>
            </div>
        </div>
        <? if(count($model->master_categories) > 0): ?>
            <? foreach($model->master_categories as $cmodel): ?>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Пренадлежит категории</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                        <?= render('admin/category/profile_card', array('cmodel' => $cmodel)); ?>
                    <div class="box-footer">
                      <a href="/admin/category/view/<?= $cmodel->id;?>" class="btn btn-primary btn-block btn-flat"><b>Просмотр</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
            <? endforeach;?>
        <? endif;?>
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-body">
                <strong><i class="fa fa-file-text-o margin-r-5"></i>Мета теги</strong>
                <p><?= $model->meta; ?></p>
                <hr>
                <strong><i class="fa fa-file-text-o margin-r-5"></i>Описание</strong>
                <?= $model->description; ?>
                <hr>
                <strong><i class="fa fa-file-text-o margin-r-5"></i>Контент</strong>
                <?= $model->content; ?>
            </div>
            
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Связанный контент</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <? if(count($model->related_content) > 0): ?>
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <table id="example1" class="table table-bordered table-striped table-data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Заголовок</th>
                                <th>Дата Создания</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach($model->related_content as $rmodel): ?>
                                <tr>
                                    <td><?= $rmodel->id; ?></td>
                                    <td><?= $rmodel->title; ?></td>
                                    <td><?= Date::forge($rmodel->created_at)->format("%d/%m/%Y %H:%M"); ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a id="drop1" href="#" class="dropdown-toggle btn btn-block btn-default btn-flat" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                              Действия
                                              <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="drop1">
                                              <li><a href="/admin/content/view/<?= $rmodel->id ;?>">Просмотреть</a></li>
                                              <li><a href="/admin/content/edit/<?= $rmodel->id ;?>">Редактировать</a></li>
                                              <li><a onclick="confirm('Вы уверены?')" href="/admin/content/unset/<?= $model->id ;?>/<?= $rmodel->id ;?>">Отвязать</a></li>

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
                <button data-toggle="modal" data-target="#reladet_content_form" class="btn btn-primary btn-block btn-flat"><b>Добавить</b></button>
            </div>
        </div>
        
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Является связанной для контента</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <? if(count($model->related_to_content) > 0): ?>
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <table id="example1" class="table table-bordered table-striped table-data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Заголовок</th>
                                <th>Дата Создания</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach($model->related_to_content as $rmodel): ?>
                                <tr>
                                    <td><?= $rmodel->id; ?></td>
                                    <td><?= $rmodel->title; ?></td>
                                    <td><?= Date::forge($rmodel->created_at)->format("%d/%m/%Y %H:%M"); ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a id="drop1" href="#" class="dropdown-toggle btn btn-block btn-default btn-flat" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                              Действия
                                              <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="drop1">
                                              <li><a href="/admin/content/view/<?= $rmodel->id ;?>">Просмотреть</a></li>
                                              <li><a href="/admin/content/edit/<?= $rmodel->id ;?>">Редактировать</a></li>
                                              <li><a onclick="confirm('Вы уверены?')" href="/admin/content/unset/<?= $rmodel->id ;?>/<?= $model->id ;?>">Отвязать</a></li>

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
                <button data-toggle="modal" data-target="#related_to_content_form" class="btn btn-primary btn-block btn-flat"><b>Привязать</b></button>
            </div>
        </div>
        
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
                                              <li><a onclick="confirm('Вы уверены?')" href="/admin/content/drop_promo/<?= $model->id ;?>/<?= $rmodel->id ;?>">Отвязать</a></li>

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
                            <?= Fuel\Core\Html::anchor('/admin/content/remove_image/' . $image->id, 'x', array('class' => 'btn-remove')); ?>
                        </div>
                    <? endforeach;?>
                <? else: ?>
                    <p class="text-center img-lg">Пока ничего нет</p>
                <? endif;?>
                
            </div>
            <div class="box-footer">
                <?= \Fuel\Core\Form::open(array('action' => '/admin/content/add_image/' . $model->id, 'enctype'=>'multipart/form-data')); ?>
                    <a class="btn btn-primary btn-block btn-flat position-relative">
                        <b>Добавить</b>
                        <?= \Fuel\Core\Form::file('image', array('class' => 'transparent autosubmit')); ?>
                    </a>
                <?= \Fuel\Core\Form::close(); ?>
            </div>
    </div>
    <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Коментарии</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <? if(count($model->comments) > 0): ?>
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <table id="example1" class="table table-bordered table-striped table-data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя пользователя</th>
                                <th>Почта пользователя</th>
                                <th>Текст коментария</th>
                                <th>Статус</th>
                                <th>Дата добавления</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach($model->comments as $rmodel): ?>
                                <tr class="">
                                    <td><?= $rmodel->id; ?></td>
                                    <td><?= $rmodel->user_name; ?></td>
                                    <td><?= $rmodel->user_email; ?></td>
                                    <td><?= $rmodel->text; ?></td>
                                    <td><span class="label label-<?= $rmodel->validated == 0 ? 'warning' : '';?><?= $rmodel->validated == 1 ? 'danger' : '';?><?= $rmodel->validated == 2 ? 'success' : '';?>"><?= $rmodel->get_status(); ?></span></td>
                                    <td><?= Date::forge($rmodel->created_at)->format("%d/%m/%Y %H:%M"); ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a id="drop1" href="#" class="dropdown-toggle btn btn-block btn-default btn-flat" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                              Действия
                                              <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="drop1">
                                              <li><a href="/admin/comment/approve/<?= $rmodel->id ;?>">Пропустить</a></li>
                                              <li><a href="/admin/comment/reject/<?= $rmodel->id ;?>">Отклонить</a></li>
                                              <li><a onclick="confirm('Вы уверены?')" href="/admin/comment/remove/<?= $rmodel->id ;?>">Удалить</a></li>

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
</div>

<?= render('admin/content/reladet_categiry_form', array(
    'relations' => $model->related_content,
    'action' => "admin/content/set/{$model->id}",
    'popup_id' => 'reladet_content_form'
)); ?>

<?= render('admin/content/reladet_categiry_form', array(
    'relations' => $model->related_to_content,
    'action' => "admin/content/setto/{$model->id}",
    'popup_id' => 'related_to_content_form'
)); ?>

<?= render('admin/content/promo_category_form', array(
    'relations' => $model->promoted_category,
    'action' => "admin/content/add_promo/{$model->id}",
    'popup_id' => 'promo_categiry_form',
    'models' => Model_Category::find('all')
)); ?>


