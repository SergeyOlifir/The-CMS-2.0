<div class="form-group <?= ((isset($errors) and isset($errors[$field])) ? 'has-error' : '') ?> <?= ((isset($errors) and !isset($errors[$field])) ? 'has-success' : '') ?>">
    <?= Fuel\Core\Form::label($label, $field); ?>
    <?= Fuel\Core\Form::textarea($field, (isset($model) ? $model->get($field) : ''), array('class' => 'form-control', 'placeholder' => $placeholder, 'rows' => 6)); ?>
    <p class="help-block"><?= $description;?></p>
</div>