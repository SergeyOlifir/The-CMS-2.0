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

    <?= TCForm::Textarea(array(
        'errors' => isset($errors) ? $errors : null,
        'model' => isset($model) ? $model : null,
        'field' => 'footer_content',
        'label' => 'Контент футера',
        'placeholder' => 'Текст',
        'description' => 'Контент для отображения внутри футера',
        'editor' => true,
    )); ?>
</div>