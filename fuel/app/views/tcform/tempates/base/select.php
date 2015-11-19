<div class="form-group <?= ((isset($errors) and isset($errors[$field])) ? 'has-error' : '') ?> <?= ((isset($errors) and !isset($errors[$field])) ? 'has-success' : '') ?>">
    <?= Fuel\Core\Form::label($label, $field); ?>
    <?= Fuel\Core\Form::select($field, (isset($model) ? $model->get($field) : array_keys($options)[0]), $options, array('class' => 'form-control')); ?>
    <p class="help-block"><?= $description;?></p>
</div>