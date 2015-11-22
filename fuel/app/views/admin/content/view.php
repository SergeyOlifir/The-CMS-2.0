<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <?= render('admin/content/profile_card', array('cmodel' => $model)); ?>
            <div class="box-footer">
                <a href="/admin/content/edit/<?= $model->id;?>" class="btn btn-primary btn-block btn-flat"><b>Редатировать</b></a>
            </div>
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
                <hr>
                <strong><i class="fa fa-file-text-o margin-r-5"></i>Контент</strong>
                <p><?= $model->content; ?></p>
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
                <button data-toggle="modal" data-target="#reladet_content_form" class="btn btn-primary btn-block btn-flat"><b>Добавить</b></botton>
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
                <button data-toggle="modal" data-target="#related_to_content_form" class="btn btn-primary btn-block btn-flat"><b>Привязать</b></botton>
            </div>
        </div>
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


