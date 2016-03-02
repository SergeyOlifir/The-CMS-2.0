    <div class="box-body">
        <?= TCForm::File(array(
            'errors' => isset($errors) ? $errors : null,
            'model' => isset($model) ? $model : null,
            'field' => 'image',
            'image_field' => 'logo',
            'label' => 'Логотип',
            'description' => 'Логотип ссылки'
        )); ?>
        
        <?= TCForm::Input(array(
            'errors' => isset($errors) ? $errors : null,
            'model' => isset($model) ? $model : null,
            'field' => 'title',
            'label' => 'Заголовок',
            'placeholder' => 'Заголовок',
            'description' => 'Заголовок ссылки'
        )); ?>
        
        <?= TCForm::Textarea(array(
            'errors' => isset($errors) ? $errors : null,
            'model' => isset($model) ? $model : null,
            'field' => 'description',
            'label' => 'Описание',
            'placeholder' => 'Описание',
            'description' => 'Встречающий текст ссылки.'
        )); ?>
        
        <?= TCForm::Select(array(
            'errors' => isset($errors) ? $errors : null,
            'model' => isset($model) ? $model : null,
            'field' => 'category_id',
            'label' => 'Категория',
            'options' => $categories_id,
            'description' => 'Категория, на которую указывает ссылка.'
        )); ?>
        
        <?= TCForm::Select(array(
            'errors' => isset($errors) ? $errors : null,
            'model' => isset($model) ? $model : null,
            'field' => 'weight',
            'label' => 'Вес',
            'options' => range(1, 50),
            'description' => 'Порядок ссылки в меню.'
        )); ?>

        <? if (Model_Language::query()->count() > 0): ?>
            <?= TCForm::Select(array(
                'errors' => isset($errors) ? $errors : null,
                'model' => isset($model) ? $model : null,
                'field' => 'language_id',
                'label' => 'Язык',
                'options' => Model_Language::to_array_for_dropdown('id', 'name'),
                'description' => 'Язык, для которого будет отображаться ссылка'
            )); ?>
        <? endif; ?>
    </div>
    