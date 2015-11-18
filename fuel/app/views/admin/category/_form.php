
    <div class="box-body">
        <div class="form-group <?= ((isset($errors) and isset($errors['alias'])) ? 'has-error' : '') ?> <?= ((isset($errors) and !isset($errors['alias'])) ? 'has-success' : '') ?>">
            <?= Fuel\Core\Form::label('Alias', 'alias'); ?>
            <?= Fuel\Core\Form::input('alias', (isset($model) ? $model->alias : ''), array('class' => 'form-control', 'placeholder' => 'Alias')); ?>
            <p class="help-block">Алиас категории. Обязательный и уникальный</p>
        </div>

        <div class="form-group <?= ((isset($errors) and isset($errors['all_caption'])) ? 'has-error' : '') ?> <?= ((isset($errors) and !isset($errors['all_caption'])) ? 'has-success' : '') ?>">
            <?= Fuel\Core\Form::label('Заголовок для всего контента', 'all_caption'); ?>
            <?= Fuel\Core\Form::input('all_caption', (isset($model) ? $model->alias : ''), array('class' => 'form-control', 'placeholder' => 'Menu text')); ?>
            <p class="help-block">Текст на кнопке для показа всего контента</p>
        </div>

        <div class="form-group <?= ((isset($errors) and isset($errors['page_title'])) ? 'has-error' : '') ?> <?= ((isset($errors) and !isset($errors['page_title'])) ? 'has-success' : '') ?>">
            <?= Fuel\Core\Form::label('Заголовок Страницы', 'page_title'); ?>
            <?= Fuel\Core\Form::input('page_title', (isset($model) ? $model->page_title : ''), array('class' => 'form-control', 'placeholder' => 'Заголовок Страницы')); ?>
            <p class="help-block">Заголовок, который будет показан на табе.</p>
        </div>

        <div class="form-group <?= ((isset($errors) and isset($errors['title'])) ? 'has-error' : '') ?> <?= ((isset($errors) and !isset($errors['title'])) ? 'has-success' : '') ?>">
            <?= Fuel\Core\Form::label('Заголовок', 'title'); ?>
            <?= Fuel\Core\Form::input('title', (isset($model) ? $model->title : ''), array('class' => 'form-control', 'placeholder' => 'Заголовок')); ?>
            <p class="help-block">Заголовок категории</p>
        </div>

        <div class="form-group <?= ((isset($errors) and isset($errors['description'])) ? 'has-error' : '') ?> <?= ((isset($errors) and !isset($errors['description'])) ? 'has-success' : '') ?>">
            <?= Fuel\Core\Form::label('Описание', 'description'); ?>
            <?= Fuel\Core\Form::textarea('description', (isset($model) ? $model->description : ''), array('class' => 'form-control', 'placeholder' => 'Описание', 'rows' => 6)); ?>
            <p class="help-block">Встречающий текст категории</p>
        </div>

        <div class="form-group <?= ((isset($errors) and isset($errors['meta'])) ? 'has-error' : '') ?> <?= ((isset($errors) and !isset($errors['meta'])) ? 'has-success' : '') ?>">
            <?= Fuel\Core\Form::label('Meta', 'meta'); ?>
            <?= Fuel\Core\Form::textarea('meta', (isset($model) ? $model->meta : ''), array('class' => 'form-control', 'placeholder' => 'Meta', 'rows' => 6)); ?>
            <p class="help-block">Ключевые поисковые слова и словосочетания…</p>
        </div>
    </div>
    