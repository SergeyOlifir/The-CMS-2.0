<div class="box">
    <div class="box-header">
        <h3 class="box-title">Все языки</h3>
    </div>
    <div class="box-body">
        <div class="dataTables_wrapper form-inline dt-bootstrap">
            <table id="example1" class="table table-bordered table-striped table-data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Код</th>
                        <th>Дата Создания</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <? foreach($models as $model): ?>
                        <tr>
                            <td><?= $model->id; ?></td>
                            <td><?= \Fuel\Core\Html::img((!is_null($model->logo)) ? "files/{$model->logo->small}" : '/assets/img/default_lang.png', array('class' => 'lang-img')); ?><?= $model->name; ?></td>
                            <td><?= $model->code; ?></td>
                            <td><?= Date::forge($model->created_at)->format("%d/%m/%Y %H:%M"); ?></td>
                            <td>
                                <div class="dropdown">
                                    <a id="drop1" href="#" class="dropdown-toggle btn btn-block btn-default btn-flat" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                      Действия
                                      <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="drop1">
                                      <li><a href="/admin/language/view/<?= $model->id ;?>">Просмотреть</a></li>
                                      <li><a href="/admin/language/edit/<?= $model->id ;?>">Редактировать</a></li>
                                      <li><a onclick="confirm('Вы уверены?')" href="/admin/language/delete/<?= $model->id ;?>">Удалить</a></li>
                                      
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

