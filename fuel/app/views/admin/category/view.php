<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <?= render('admin/category/profile_card', array('cmodel' => $model)); ?>
            <div class="box-footer">
                <a href="/admin/category/edit/<?= $model->id;?>" class="btn btn-primary btn-block btn-flat"><b>Редатировать</b></a>
                <button data-toggle="modal" data-target="#add_content_form" class="btn btn-primary btn-block btn-flat"><b>Добавить</b></button>
            </div>
        </div>
        <? if(count($model->links) > 0): ?>
            <? foreach($model->links as $lmodel): ?>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ссылка</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <?= render('admin/link/profile_card', array('lmodel' => $lmodel)); ?>
                    <div class="box-footer">
                        <a href="/admin/link/view/<?= $lmodel->id;?>" class="btn btn-primary btn-block btn-flat"><b>Просмотр</b></a>
                    </div>
                </div>
            <? endforeach;?>
        <? endif; ?>
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-body">
                <strong><i class="fa fa-file-text-o margin-r-5"></i>Мета теги</strong>
                <p><?= $model->meta; ?></p>
                <hr>
                <strong><i class="fa fa-file-text-o margin-r-5"></i>Описание</strong>
                <?= $model->description; ?>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Дочерние категории</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <? if(count($model->subsidiary_category) > 0): ?>
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
                            <? foreach($model->subsidiary_category as $rmodel): ?>
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
                                              <li><a onclick="confirm('Вы уверены?')" href="/admin/category/unset/<?= $model->id ;?>/<?= $rmodel->id ;?>">Отвязать</a></li>

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
                <button data-toggle="modal" data-target="#reladet_categiry_form" class="btn btn-primary btn-block btn-flat"><b>Добавить</b></button>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Пренадлежит категориям</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <? if(count($model->master_category) > 0): ?>
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
                            <? foreach($model->master_category as $rmodel): ?>
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
                                              <li><a onclick="confirm('Вы уверены?')" href="/admin/category/unset/<?= $rmodel->id ;?>/<?= $model->id ;?>">Отвязать</a></li>

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
                <button data-toggle="modal" data-target="#master_categiry_form" class="btn btn-primary btn-block btn-flat"><b>Привязать</b></button>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Cвязанные категории</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <? if(count($model->related_category) > 0): ?>
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
                            <? foreach($model->related_category as $rmodel): ?>
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
                                              <li><a onclick="confirm('Вы уверены?')" href="/admin/category/unsetrelation/<?= $model->id ;?>/<?= $rmodel->id ;?>">Отвязать</a></li>
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
                <button data-toggle="modal" data-target="#reladet_related_categiry_form" class="btn btn-primary btn-block btn-flat"><b>Добавить</b></button>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Связанная для категорий</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <? if(count($model->related_to_category) > 0): ?>
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
                            <? foreach($model->related_to_category as $rmodel): ?>
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
                                              <li><a onclick="confirm('Вы уверены?')" href="/admin/category/unsetrelation/<?= $rmodel->id ;?>/<?= $model->id ;?>">Отвязать</a></li>

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
                <button data-toggle="modal" data-target="#reladet_related_to_categiry_form" class="btn btn-primary btn-block btn-flat"><b>Привязать</b></button>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Контент</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <? if(count($model->content) > 0): ?>
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <table id="example1" class="table table-bordered table-striped table-data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Заголовок</th>
                                    <th>Встречающий текст</th>
                                    <th>Дата Создания</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                <? foreach($model->content as $rmodel): ?>
                                    <tr>
                                        <td><?= $rmodel->id; ?></td>
                                        <td><?= $rmodel->title; ?></td>
                                        <td><?= $rmodel->description; ?></td>
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
                                                  <li><a onclick="confirm('Вы уверены?')" href="/admin/category/drop_content/<?= $model->id ;?>/<?= $rmodel->id ;?>">Отвязать</a></li>

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
                <button data-toggle="modal" data-target="#add_content_form" class="btn btn-primary btn-block btn-flat"><b>Добавить</b></button>
            </div>
        </div>
    </div>
</div>

<?= render('admin/category/add_content', array(
    'relations' => $model->content,
    'action' => "admin/category/add_content/{$model->id}",
    'popup_id' => 'add_content_form', 
    'models' => Model_Content::query()->where('language_id', '=', $model->language_id)->get()
)); ?>

<?= render('admin/category/reladet_categiry_form', array(
    'relations' => $model->subsidiary_category,
    'action' => "admin/category/set/{$model->id}",
    'popup_id' => 'reladet_categiry_form'
)); ?>

<?= render('admin/category/reladet_categiry_form', array(
    'relations' => $model->master_category,
    'action' => "admin/category/setto/{$model->id}",
    'popup_id' => 'master_categiry_form'
)); ?>

<?= render('admin/category/reladet_categiry_form', array(
    'relations' => $model->related_category,
    'action' => "admin/category/setrelation/{$model->id}",
    'popup_id' => 'reladet_related_categiry_form'
)); ?>

<?= render('admin/category/reladet_categiry_form', array(
    'relations' => $model->related_to_category,
    'action' => "admin/category/setrelationto/{$model->id}",
    'popup_id' => 'reladet_related_to_categiry_form'
)); ?>
