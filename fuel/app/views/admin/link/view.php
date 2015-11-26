<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <?= render('admin/link/profile_card', array('lmodel' => $model)); ?>
            <div class="box-footer">
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
            <? if(!is_null($model->category)): ?> 
                <? $kmodel = $model->category; ?>
                <?= render('admin/category/profile_card', array('cmodel' => $kmodel)); ?>
                <div class="box-footer">
                    <a href="/admin/category/view/<?= $kmodel->id;?>" class="btn btn-primary btn-block btn-flat"><b>Просмотр</b></a>
                </div>
            <? else: ?>
                <p class="text-center">Ничего нет</p>
            <? endif;?>
            
            <!-- /.box-body -->
        </div>
    </div>
</div>

