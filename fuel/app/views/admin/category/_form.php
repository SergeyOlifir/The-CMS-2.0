    
    <div class="box-body">
        <?= TCForm::File(array(
            'errors' => isset($errors) ? $errors : null,
            'model' => isset($model) ? $model : null,
            'field' => 'image',
            'image_field' => 'logo',
            'label' => 'Логотип',
            'description' => 'Логотип категории'
        )); ?>
        
        <?= TCForm::Input(array(
            'errors' => isset($errors) ? $errors : null,
            'model' => isset($model) ? $model : null,
            'field' => 'alias',
            'label' => 'Алиас',
            'placeholder' => 'Алиас',
            'description' => 'Алиас категории. Обязательный и уникальный'
        )); ?>
        
        <?= TCForm::Input(array(
            'errors' => isset($errors) ? $errors : null,
            'model' => isset($model) ? $model : null,
            'field' => 'all_caption',
            'label' => 'Заголовок для всего контента',
            'placeholder' => 'Menu text',
            'description' => 'Текст на кнопке для показа всего контента'
        )); ?>
        
        <?= TCForm::Input(array(
            'errors' => isset($errors) ? $errors : null,
            'model' => isset($model) ? $model : null,
            'field' => 'page_title',
            'label' => 'Заголовок Страницы',
            'placeholder' => 'Заголовок Страницы',
            'description' => 'Заголовок, который будет показан на табе.'
        )); ?>
        
        <?= TCForm::Input(array(
            'errors' => isset($errors) ? $errors : null,
            'model' => isset($model) ? $model : null,
            'field' => 'title',
            'label' => 'Заголовок',
            'placeholder' => 'Заголовок',
            'description' => 'Заголовок категории.'
        )); ?>
        
        <?= TCForm::Textarea(array(
            'errors' => isset($errors) ? $errors : null,
            'model' => isset($model) ? $model : null,
            'field' => 'description',
            'label' => 'Описание',
            'placeholder' => 'Описание',
            'description' => 'Встречающий текст категории.'
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
    