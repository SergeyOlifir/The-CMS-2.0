<div class="box-body">
    <?= TCForm::Input(array(
        'errors' => isset($errors) ? $errors : null,
        'model' => isset($model) ? $model : null,
        'field' => 'title',
        'label' => 'Заголовок Страницы',
        'placeholder' => 'Заголовок Страницы',
        'description' => 'Заголовок, который будет показан на табе.'
    )); ?>
    
    <?= TCForm::Textarea(array(
        'errors' => isset($errors) ? $errors : null,
        'model' => isset($model) ? $model : null,
        'field' => 'meta',
        'label' => 'Meta',
        'placeholder' => 'Meta',
        'description' => 'Ключевые поисковые слова и словосочетания…'
    )); ?>
</div>