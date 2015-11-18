<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <?= \Fuel\Core\Html::img((!is_null($model->logo)) ? "files/{$model->logo->small}" : 'assets/img/default.png', array('class' => 'profile-user-img img-responsive img-circle')); ?>
              <h3 class="profile-username text-center"><?= $model->title;?></h3>

              <p class="text-muted text-center"><?= $model->description;?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item clearfix">
                  <b class="col-xs-6">Вес</b> <a class="col-xs-6 text-right"><?= $model->weight;?></a>
                </li>
                <li class="list-group-item clearfix">
                  <b class="col-xs-6">Обновлена</b> <a class="col-xs-6 text-right"><?= Date::forge($model->created_at)->format("%d/%m/%Y %H:%M");?></a>
                </li>
                <li class="list-group-item clearfix">
                  <b class="col-xs-6">Создана</b> <a class="col-xs-6 text-right"><?= Date::forge($model->updated_at)->format("%d/%m/%Y %H:%M");?></a>
                </li>
              </ul>

              <a href="/admin/link/edit/<?= $model->id;?>" class="btn btn-primary btn-block btn-flat"><b>Редатировать</b></a>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Категория</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
                <? $kmodel = $model->category; ?>
                <div class="box-body box-profile">
                    <?= \Fuel\Core\Html::img((!is_null($kmodel->logo)) ? "files/{$kmodel->logo->small}" : 'assets/img/default.png', array('class' => 'profile-user-img img-responsive img-circle')); ?>
                    <h3 class="profile-username text-center"><?= $kmodel->title;?></h3>

                    <p class="text-muted text-center"><?= $kmodel->page_title;?></p>

                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item clearfix">
                          <b class="col-xs-6">Alias</b> <a class="col-xs-6 text-right"><?= $kmodel->alias;?></a>
                      </li>
                      <li class="list-group-item clearfix">
                        <b class="col-xs-6">Заголовок для всего контента</b> <a class="col-xs-6 text-right"><?= $kmodel->all_caption;?></a>
                      </li>
                      <li class="list-group-item clearfix">
                        <b class="col-xs-6">Обновлена</b> <a class="col-xs-6 text-right"><?= Date::forge($kmodel->created_at)->format("%d/%m/%Y %H:%M");?></a>
                      </li>
                      <li class="list-group-item clearfix">
                        <b class="col-xs-6">Создана</b> <a class="col-xs-6 text-right"><?= Date::forge($kmodel->updated_at)->format("%d/%m/%Y %H:%M");?></a>
                      </li>
                      <li class="list-group-item clearfix">
                        <b class="col-xs-6">Связанных категорий</b> <a class="col-xs-6 text-right"><?= count($kmodel->related_category); ?></a>
                      </li>
                      <li class="list-group-item clearfix">
                        <b class="col-xs-6">Пренадлежит категориям</b> <a class="col-xs-6 text-right"><?= count($kmodel->master_category); ?></a>
                      </li>
                      <li class="list-group-item clearfix">
                        <b class="col-xs-6">Всего контента</b> <a class="col-xs-6 text-right">13,287</a>
                      </li>
                    </ul>

              <a href="/admin/category/view/<?= $kmodel->id;?>" class="btn btn-primary btn-block btn-flat"><b>Просмотр</b></a>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>

