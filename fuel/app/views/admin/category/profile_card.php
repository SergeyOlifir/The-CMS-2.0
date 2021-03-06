
    <div class="box-body box-profile">
        <?= \Fuel\Core\Html::img((!is_null($cmodel->logo)) ? "files/{$cmodel->logo->small}" : 'assets/img/default.png', array('class' => 'profile-user-img img-responsive')); ?>
      <h3 class="profile-username text-center"><?= $cmodel->title;?></h3>

      <p class="text-muted text-center"><?= $cmodel->page_title;?></p>

      <ul class="list-group list-group-unbordered">
        <? if (!is_null($cmodel->language_id)): ?>
              <li class="list-group-item clearfix">
                  <b class="col-xs-6">Язык</b> <a class="col-xs-6 text-right"><?= $cmodel->language->name; ?></a>
              </li>
        <? endif; ?>
        <li class="list-group-item clearfix">
            <b class="col-xs-6">Alias</b> <a class="col-xs-6 text-right"><?= $cmodel->alias;?></a>
        </li>
        <li class="list-group-item clearfix">
          <b class="col-xs-6">Заголовок для всего контента</b> <a class="col-xs-6 text-right"><?= $cmodel->all_caption;?></a>
        </li>
        <li class="list-group-item clearfix">
          <b class="col-xs-6">Обновлена</b> <a class="col-xs-6 text-right"><?= Date::forge($cmodel->created_at)->format("%d/%m/%Y %H:%M");?></a>
        </li>
        <li class="list-group-item clearfix">
          <b class="col-xs-6">Создана</b> <a class="col-xs-6 text-right"><?= Date::forge($cmodel->updated_at)->format("%d/%m/%Y %H:%M");?></a>
        </li>
        <li class="list-group-item clearfix">
          <b class="col-xs-6">Связанных категорий</b> <a class="col-xs-6 text-right"><?= count($cmodel->subsidiary_category); ?></a>
        </li>
        <li class="list-group-item clearfix">
          <b class="col-xs-6">Пренадлежит категориям</b> <a class="col-xs-6 text-right"><?= count($cmodel->master_category); ?></a>
        </li>
        <li class="list-group-item clearfix">
          <b class="col-xs-6">Ссылки</b> <a class="col-xs-6 text-right"><?= count($cmodel->links); ?></a>
        </li>
        <li class="list-group-item clearfix">
          <b class="col-xs-6">Всего контента</b> <a class="col-xs-6 text-right"><?= count($cmodel->content);?></a>
        </li>
      </ul>

      
    </div>
        <!-- /.box-body -->