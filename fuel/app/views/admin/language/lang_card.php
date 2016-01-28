
    <div class="box-body box-profile">
        <?= \Fuel\Core\Html::img((!is_null($cmodel->logo)) ? "files/{$cmodel->logo->small}" : '/assets/img/default_lang.png', array('class' => 'profile-user-img img-responsive')); ?>
      <h3 class="profile-username text-center"><?= $cmodel->name;?></h3>

      <ul class="list-group list-group-unbordered">
        <li class="list-group-item clearfix">
            <b class="col-xs-6">Имя</b> <a class="col-xs-6 text-right"><?= $cmodel->name;?></a>
        </li>
        <li class="list-group-item clearfix">
          <b class="col-xs-6">Код</b> <a class="col-xs-6 text-right"><?= $cmodel->code;?></a>
        </li>
        <li class="list-group-item clearfix">
          <b class="col-xs-6">Обновлен</b> <a class="col-xs-6 text-right"><?= Date::forge($cmodel->created_at)->format("%d/%m/%Y %H:%M");?></a>
        </li>
        <li class="list-group-item clearfix">
          <b class="col-xs-6">Создан</b> <a class="col-xs-6 text-right"><?= Date::forge($cmodel->updated_at)->format("%d/%m/%Y %H:%M");?></a>
        </li>
      </ul>
    </div>
        <!-- /.box-body -->