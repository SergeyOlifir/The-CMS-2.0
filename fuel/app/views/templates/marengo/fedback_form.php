<div class="feedback-form" data-ng-app="feedback" data-ng-controller="feedback">
    <div class="panel panel-default">
        <div class="panel-heading" data-ng-click="toggleHeight()">
          <h3 class="panel-title">Задайте вопрос</h3>
        </div>
        <div class="panel-body" data-ng-class="{opened: expanded, closed: !expanded}" >
            <div data-ng-class="{hidden: !sucsAlert}" class="alert alert-success alert-dismissable">Спасибо за вопрос!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <div data-ng-class="{hidden: !dungAlert}" class="alert alert-danger alert-dismissable">Ошибка!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <p class="lead">Ответы на все Ваши вопросы по отдыху и недвижимости в Черногории...</p>
            <form data-ng-submit="send()">
                <div class="form-group" data-ng-class="{'has-error': errors['user_name']}">
                    <input required="required" type="name" data-ng-model="name" class="form-control" id="exampleInputEmail1" placeholder="Ваше имя *">
                </div>
                <div class="form-group" data-ng-class="{'has-error': errors['user_email']}">
                    <input required="required" type="password" data-ng-model="mail" class="form-control" id="exampleInputPassword1" placeholder="Ваша почта *">
                </div>
                <div class="form-group" data-ng-class="{'has-error': errors['text']}">
                    <textarea required="required" type="password"  data-ng-model="text" class="form-control" id="exampleInputPassword1" placeholder="Текст вопроса *"></textarea>
                    <p class="help-block">Сообщение не более 500 символов</p>
                </div>
                <div class="clearfix">
                    <button type="submit" class="btn btn-success pull-right">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>