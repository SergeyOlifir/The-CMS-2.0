    
    <div class="box-body">
        <?= TCForm::File(array(
            'errors' => isset($errors) ? $errors : null,
            'model' => isset($model) ? $model : null,
            'field' => 'image',
            'image_field' => 'logo',
            'label' => 'Логотип',
            'description' => 'Логотип языка'
        )); ?>
        
        <?= TCForm::Input(array(
            'errors' => isset($errors) ? $errors : null,
            'model' => isset($model) ? $model : null,
            'field' => 'name',
            'label' => 'Имя',
            'placeholder' => 'Имя',
            'description' => 'Имя языка. Обязательное поле.'
        )); ?>
        
        <?= TCForm::Input(array(
            'errors' => isset($errors) ? $errors : null,
            'model' => isset($model) ? $model : null,
            'field' => 'code',
            'label' => 'Код',
            'placeholder' => 'Код языка',
            'description' => 'Код языка (двухсимвольный, в нижнем регистре)'
        )); ?>
        
        <?= TCForm::Input(array(
            'errors' => isset($errors) ? $errors : null,
            'model' => isset($model) ? $model : null,
            'field' => 'match',
            'label' => 'Соответствия',
            'placeholder' => 'Соответствия для языка',
            'description' => 'Соответствия для языка (двухсимвольные, в нижнем регистре, через запятую)'
        )); ?>
    </div>
    