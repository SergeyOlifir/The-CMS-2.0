<div class="box-body box-profile">
    <?= \Fuel\Core\Html::img((!is_null($lmodel->logo)) ? "files/{$lmodel->logo->small}" : 'assets/img/default.png', array('class' => 'profile-user-img img-responsive ')); ?>
    <h3 class="profile-username text-center"><?= $lmodel->title;?></h3>

    <p class="text-muted text-center"><?= $lmodel->description;?></p>

    <ul class="list-group list-group-unbordered">
      <li class="list-group-item clearfix">
        <b class="col-xs-6">Вес</b> <a class="col-xs-6 text-right"><?= $lmodel->weight;?></a>
      </li>
      <? if (!is_null($lmodel->language_id)): ?>
          <li class="list-group-item clearfix">
            <b class="col-xs-6">Язык</b> <a class="col-xs-6 text-right"><?= $lmodel->language->name; ?></a>
          </li>
      <? endif; ?>
      <li class="list-group-item clearfix">
        <b class="col-xs-6">Обновлена</b> <a class="col-xs-6 text-right"><?= Date::forge($lmodel->created_at)->format("%d/%m/%Y %H:%M");?></a>
      </li>
      <li class="list-group-item clearfix">
        <b class="col-xs-6">Создана</b> <a class="col-xs-6 text-right"><?= Date::forge($lmodel->updated_at)->format("%d/%m/%Y %H:%M");?></a>
      </li>
    </ul>
</div>