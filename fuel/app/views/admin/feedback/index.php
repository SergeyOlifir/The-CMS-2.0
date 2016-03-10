<div class="box">
    <div class="box-header">
        <h3 class="box-title">Все отзывы</h3>
    </div>
    <div class="box-body">
        <div class="dataTables_wrapper form-inline dt-bootstrap">
            <table id="example1" class="table table-bordered table-striped table-data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя пользователя</th>
                                <th>Почта пользователя</th>
                                <th>Текст отзыва</th>
                                <th>Статус</th>
                                <th>Дата добавления</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach($models as $rmodel): ?>
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
                                              <li><a href="/admin/feedback/view/<?= $rmodel->id ;?>">Просмотреть</a></li>
                                              <li><a onclick="confirm('Вы уверены?')" href="/admin/feedback/remove/<?= $rmodel->id ;?>">Удалить</a></li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
        </div>
    </div>
</div>

