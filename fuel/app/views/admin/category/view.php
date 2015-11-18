<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <?= \Fuel\Core\Html::img('assets/img/default.png', array('class' => 'profile-user-img img-responsive img-circle')); ?>
              <h3 class="profile-username text-center"><?= $model->title;?></h3>

              <p class="text-muted text-center"><?= $model->page_title;?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item clearfix">
                    <b class="col-xs-6">Alias</b> <a class="col-xs-6 text-right"><?= $model->alias;?></a>
                </li>
                <li class="list-group-item clearfix">
                  <b class="col-xs-6">Заголовок для всего контента</b> <a class="col-xs-6 text-right"><?= $model->all_caption;?></a>
                </li>
                <li class="list-group-item clearfix">
                  <b class="col-xs-6">Обновлена</b> <a class="col-xs-6 text-right"><?= Date::forge($model->created_at)->format("%d/%m/%Y %H:%M");?></a>
                </li>
                <li class="list-group-item clearfix">
                  <b class="col-xs-6">Создана</b> <a class="col-xs-6 text-right"><?= Date::forge($model->updated_at)->format("%d/%m/%Y %H:%M");?></a>
                </li>
                <li class="list-group-item clearfix">
                  <b class="col-xs-6">Связанных категорий</b> <a class="col-xs-6 text-right"><?= count($model->related_category); ?></a>
                </li>
                <li class="list-group-item clearfix">
                  <b class="col-xs-6">Пренадлежит категориям</b> <a class="col-xs-6 text-right"><?= count($model->master_category); ?></a>
                </li>
                <li class="list-group-item clearfix">
                  <b class="col-xs-6">Всего контента</b> <a class="col-xs-6 text-right">13,287</a>
                </li>
              </ul>

              <a href="/admin/category/edit/<?= $model->id;?>" class="btn btn-primary btn-block btn-flat"><b>Редатировать</b></a>
              <a href="/admin/category/edit/<?= $model->id;?>" class="btn btn-primary btn-block btn-flat"><b>Привязать контент</b></a>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-body">
                <strong><i class="fa fa-file-text-o margin-r-5"></i>Мета теги</strong>
                <p><?= $model->meta; ?></p>
                <hr>
                <strong><i class="fa fa-file-text-o margin-r-5"></i>Описание</strong>
                <p><?= $model->description; ?></p>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Связанные категории</h3>
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
                <button data-toggle="modal" data-target="#reladet_categiry_form" class="btn btn-primary btn-block btn-flat"><b>Добавить</b></botton>
            </div>
        </div>
    </div>
</div>

<?= render('admin/category/reladet_categiry_form'); ?>
