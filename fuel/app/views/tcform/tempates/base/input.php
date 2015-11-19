<div class="form-group <?= ((isset($errors) and isset($errors[$field])) ? 'has-error' : '') ?> <?= ((isset($errors) and !isset($errors[$field])) ? 'has-success' : '') ?>">
    <?= Fuel\Core\Form::label($label, $field); ?>
    <?= Fuel\Core\Form::input($field, (isset($model) ? $model->get($field) : ''), array('class' => 'form-control', 'placeholder' => $placeholder)); ?>
    <p class="help-block"><?= $description;?></p>
</div>