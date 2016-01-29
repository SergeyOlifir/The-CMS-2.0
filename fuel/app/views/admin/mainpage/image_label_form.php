<?= Fuel\Core\Form::open($action); ?>
    <div class="modal fade modal-with-param" id="<?= $popup_id; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Описание картинки</h4>
          </div>
          <div class="modal-body">
              <input type="hidden" name="imageID" class="param-input" data-target-index="1" />
              <input type="text" name="title" class="form-control param-input" data-target-index="2" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
            <button type="submit" class="btn btn-primary">Сохранить</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?= Fuel\Core\Form::close(); ?>