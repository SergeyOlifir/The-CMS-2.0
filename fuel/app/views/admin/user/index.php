<div class="box">
    <div class="box-header">
        <h3 class="box-title">Все категории</h3>
    </div>
    <div class="box-body">
        <div class="dataTables_wrapper form-inline dt-bootstrap">
            <table id="example1" class="table table-bordered table-striped table-data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Группа</th>
                        <th>Дата Создания</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <? foreach($models as $model): ?>
                        <tr>
                            <td><?= $model->id; ?></td>
                            <td><?= $model->username; ?></td>
                            <td><?= $model->group_id; ?></td>
                            <td><?= Date::forge($model->created_at)->format("%d/%m/%Y %H:%M"); ?></td>
                            <td>
                                <div class="dropdown">
                                    <a id="drop1" href="#" class="dropdown-toggle btn btn-block btn-default btn-flat" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        Действия
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="drop1">
                                        <li>
                                            <? if($model->group_id == 6): ?>
                                                <a onclick="confirm('Вы уверены?')" href="/admin/user/unsetadmin/<?= $model->id ;?>">Не админ</a>
                                            <? else: ?>
                                                <a onclick="confirm('Вы уверены?')" href="/admin/user/setadmin/<?= $model->id ;?>">Админ</a>
                                            <? endif; ?>
                                        </li>
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