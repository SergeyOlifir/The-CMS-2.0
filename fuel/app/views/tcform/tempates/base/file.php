<div class="form-group <?= ((isset($errors) and isset($errors[$field])) ? 'has-error' : '') ?> <?= ((isset($errors) and !isset($errors[$field])) ? 'has-success' : '') ?>">
    <div class="clearfix">
        <?= \Fuel\Core\Html::img((isset($model) && !is_null($model->get($image_field))) ? "files/{$model->get($image_field)->small}" : 'assets/img/default.png', array('class' => 'img-responsive img-bordered-sm img-circle img-lg')); ?>
    </div>
    <?= Fuel\Core\Form::label($label, $field); ?>
    <?= Fuel\Core\Form::file( $field); ?>
    <p class="help-block"><?= $description;?></p>
</div>

