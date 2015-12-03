<div class="commetnts-wrp" data-ng-app="comments">
    <div data-ng-controller="comment">
        <div class="fotm-wrp" >
            <input class="comment-name form-control" placeholder="Введите ваше имя" data-ng-model="user_name" />
            <input class="comment-email form-control" placeholder="Введите вашу почту" data-ng-model="user_email" />
            <textarea class="comment-field form-control" placeholder="Введите текст коментария" data-ng-model="comment_text"></textarea>
            <button class="btn btn-success btn-lg" data-ng-click="addComment(user_name, user_email, comment_text)">Отправить</button>
        </div>
        <div class="comments" >
            <div class="comment_item" data-ng-repeat="comment in comments_list">
                <h5>{{comment.user_name}} {{comment.date | date:'HH:mm yyyy-MM-dd'}}</h5>
                <p>{{comment.content}}</p>
            </div>
        </div>
    </div>
</div>