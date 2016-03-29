<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Коментарии</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <? if(count($models) > 0): ?>
            <div class="dataTables_wrapper form-inline dt-bootstrap">
            <table id="example1" class="table table-bordered table-striped table-data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Контент</th>
                        <th>Имя пользователя</th>
                        <th>Почта пользователя</th>
                        <th>Текст коментария</th>
                        <th>Статус</th>
                        <th>Дата добавления</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <? foreach($models as $rmodel): ?>
                        <tr class="">
                            <td><?= $rmodel->id; ?></td>
                            <td><?= $rmodel->content->title; ?></td>
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
                                        <li><a href="/admin/content/view/<?= $rmodel->content->id ;?>">Контент</a></li>
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
