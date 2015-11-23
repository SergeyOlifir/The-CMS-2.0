
    <div class="box-body box-profile">
        <?= \Fuel\Core\Html::img((!is_null($cmodel->logo)) ? "files/{$cmodel->logo->small}" : 'assets/img/default.png', array('class' => 'profile-user-img img-responsive')); ?>
      <h3 class="profile-username text-center"><?= $cmodel->title;?></h3>

      <p class="text-muted text-center"><?= $cmodel->page_title;?></p>

      <ul class="list-group list-group-unbordered">
        <li class="list-group-item clearfix">
          <b class="col-xs-6">Обновлена</b> <a class="col-xs-6 text-right"><?= Date::forge($cmodel->created_at)->format("%d/%m/%Y %H:%M");?></a>
        </li>
        <li class="list-group-item clearfix">
          <b class="col-xs-6">Создана</b> <a class="col-xs-6 text-right"><?= Date::forge($cmodel->updated_at)->format("%d/%m/%Y %H:%M");?></a>
        </li>
        <li class="list-group-item clearfix">
          <b class="col-xs-6">Связанных категорий</b> <a class="col-xs-6 text-right"><?= ''; //count($cmodel->subsidiary_category); ?></a>
        </li>
        <li class="list-group-item clearfix">
          <b class="col-xs-6">Пренадлежит категориям</b> <a class="col-xs-6 text-right"><?= count($cmodel->master_categories); ?></a>
        </li>
      </ul>

      
    </div>
        <!-- /.box-body -->