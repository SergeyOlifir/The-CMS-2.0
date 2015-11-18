<?= Fuel\Core\Form::open("admin/category/set/{$model->id}"); ?>
    <div class="modal fade" id="reladet_categiry_form">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Связанные категории</h4>
          </div>
          <div class="modal-body">
              <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <table id="example1" class="table table-bordered table-striped table-data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Алиас</th>
                                <th>Заголовок</th>
                                <th>Дата Создания</th>
                                <th>Выбор</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach($models as $rmodel): ?>
                                <? if(!in_array($rmodel, $model->related_category) && $rmodel->id !== $model->id) : ?>
                                    <tr>
                                        <td><?= $rmodel->id; ?></td>
                                        <td><?= $rmodel->alias; ?></td>
                                        <td><?= $rmodel->title; ?></td>
                                        <td><?= Date::forge($rmodel->created_at)->format("%d/%m/%Y %H:%M"); ?></td>
                                        <td>
                                            <?= Form::checkbox('relations[]', $rmodel->id, false);  ?>
                                        </td>
                                    </tr>
                                <? endif;?>
                            <? endforeach; ?>
                        </tbody>
                    </table>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
            <button type="submit" class="btn btn-primary">Сохранить</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?= Fuel\Core\Form::close(); ?>