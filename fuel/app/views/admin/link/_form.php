    <div class="box-body">
        <div class="form-group <?= ((isset($errors) and isset($errors['image'])) ? 'has-error' : '') ?> <?= ((isset($errors) and !isset($errors['image'])) ? 'has-success' : '') ?>">
            <div class="clearfix">
                <?= \Fuel\Core\Html::img((isset($model) && !is_null($model->logo)) ? "files/{$model->logo->small}" : 'assets/img/default.png', array('class' => 'img-responsive img-bordered-sm img-circle img-lg')); ?>
            </div>
            <?= Fuel\Core\Form::label('Логотип', 'image'); ?>
            <?= Fuel\Core\Form::file( 'image'); ?>
            <p class="help-block">Логотип категории</p>
        </div>
        <div class="form-group <?= ((isset($errors) and isset($errors['title'])) ? 'has-error' : '') ?> <?= ((isset($errors) and !isset($errors['title'])) ? 'has-success' : '') ?>">
            <?= Fuel\Core\Form::label('Заголовок', 'title'); ?>
            <?= Fuel\Core\Form::input('title', (isset($model) ? $model->title : ''), array('class' => 'form-control', 'placeholder' => 'Заголовок')); ?>
            <p class="help-block">Заголовок ссылки</p>
        </div>

        <div class="form-group <?= ((isset($errors) and isset($errors['description'])) ? 'has-error' : '') ?> <?= ((isset($errors) and !isset($errors['description'])) ? 'has-success' : '') ?>">
            <?= Fuel\Core\Form::label('Описание', 'description'); ?>
            <?= Fuel\Core\Form::textarea('description', (isset($model) ? $model->description : ''), array('class' => 'form-control', 'placeholder' => 'Описание', 'rows' => 6)); ?>
            <p class="help-block">Встречающий текст ссылки</p>
        </div>

        <div class="form-group <?= ((isset($errors) and isset($errors['category_id'])) ? 'has-error' : '') ?> <?= ((isset($errors) and !isset($errors['category_id'])) ? 'has-success' : '') ?>">
            <?= Fuel\Core\Form::label('Категория', 'category_id'); ?>
            <?= Fuel\Core\Form::select('category_id', (isset($model) ? $model->category_id : 1), $categories_id, array('class' => 'form-control')); ?>
            <p class="help-block">Категория, на которую указывает ссылка</p>
        </div>
        <div class="form-group <?= ((isset($errors) and isset($errors['weight'])) ? 'has-error' : '') ?> <?= ((isset($errors) and !isset($errors['weight'])) ? 'has-success' : '') ?>">
            <?= Fuel\Core\Form::label('Вес', 'weight'); ?>
            <?= Fuel\Core\Form::select('weight', (isset($model) ? $model->weight : 1), range(1, 50), array('class' => 'form-control')); ?>
            <p class="help-block">Порядок ссылки в меню</p>
        </div>
    </div>
    