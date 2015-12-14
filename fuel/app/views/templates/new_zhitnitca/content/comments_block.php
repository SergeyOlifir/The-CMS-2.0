<div class="commetnts-wrp" data-ng-app="comments" data-ng-controller="comment">
    <h5 data-ng-click="toggleHeight()">Комментарии ({{comments_list.length}}) <i class="glyphicon glyphicon-chevron-down"></i></h5>
    <div data-ng-class="{close: collapsed}">
        <div class="fotm-wrp comment-form" >
            <div class="form-group" data-ng-class="{'has-error' : errors['comment-name']}" >
                <label for="comment-name">Имя</label>
                <input id="comment-name" class="comment-name form-control" placeholder="Введите ваше имя" data-ng-model="user_name" />
                <p class="help-block">Обязательно для заполнения</p>
            </div>
            <div class="form-group" data-ng-class="{'has-error' : errors['comment-email']}" >
                <label for="comment-email">Почта</label>
                <input id="comment-email" class="comment-email form-control" placeholder="Введите вашу почту" data-ng-model="user_email" />
                <p class="help-block">Обязательно для заполнения</p>
            </div>
            <div class="form-group" data-ng-class="{'has-error' : errors['comment-email']}" >
                <textarea class="comment-field form-control" placeholder="Введите текст коментария" data-ng-model="comment_text"></textarea>
                <p class="help-block">Обязательно для заполнения</p>
            </div>
            <div class="row form-group" data-ng-class="{'has-error' : errors['capcha']}">
                <div class="col-md-6">
                    <span class="capcha">{{capcha_numbers.first}} + {{capcha_numbers.second}} = </span>
                    <input data-ng-model="capcha" class="capcha-result" type="text" />
                </div>
                <div class="col-md-6 ">
                    <button data-ng-class="{disabled: capcha == ''}" class="btn btn-success btn-lg pull-right " data-ng-click="addComment(user_name, user_email, comment_text)">Отправить</button>
                </div>
            </div>
        </div>
        <div class="comments" >
            <div class="comment_item" data-ng-repeat="comment in comments_list">
                <h5>{{comment.user_name}} {{comment.date | date:'HH:mm yyyy-MM-dd'}}</h5>
                <p>{{comment.content}}</p>
            </div>
        </div>
    </div>
</div>