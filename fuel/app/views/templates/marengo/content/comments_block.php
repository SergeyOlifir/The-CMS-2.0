<div class="commetnts-wrp" data-ng-app="comments" data-ng-controller="comment" data-content-id="<?= $content->id;?>">
    <h5 data-ng-click="toggleHeight()"><?= __('template.comments.label'); ?> ({{count}}) <i class="glyphicon glyphicon-chevron-down"></i></h5>
    <div data-ng-class="{close: collapsed}">
        
        <div class="comments" >
            <!--<div class="comment_item" data-ng-repeat="comment in comments_list ">
                <h5>{{comment.user_name}} {{(comment.created_at * 1000) | date:'HH:mm yyyy-MM-dd'}}</h5>
                <p>{{comment.text}}</p>
            </div>-->
            <div class="media" data-ng-repeat="comment in comments_list"> 
                <div class="media-left"> 
                    <a href="#"> 
                        <img class="media-object"  alt="64x64" src="/assets/img/templates/new_zhitnitca/users_sm.png" data-holder-rendered="true" style="width: 64px; height: 64px;"> 
                    </a> 
                </div> 
                <div class="media-body"> 
                    <h4 class="media-heading">{{comment.user_name}}</h4>{{comment.text}}
                    <time >{{(comment.created_at * 1000) | date:'dd.MM.yyyy'}}</time>
                </div> 
            </div>
        </div>
        
        <div class="fotm-wrp comment-form" >
            <div class="form-group" data-ng-class="{'has-error' : errors['comment-name']}" >
                <label for="comment-name"><?= __('template.comments.form.name'); ?></label>
                <input id="comment-name" class="comment-name form-control" placeholder="<?= __('template.comments.form.name_placeholder') ;?>" data-ng-model="user_name" />
                <p class="help-block"><?= __('template.comments.form.name_help') ;?></p>
            </div>
            <div class="form-group" data-ng-class="{'has-error' : errors['comment-email']}" >
                <label for="comment-email"><?= __('template.comments.form.email'); ?></label>
                <input id="comment-email" class="comment-email form-control" placeholder="<?= __('template.comments.form.email_placeholder'); ?>" data-ng-model="user_email" />
                <p class="help-block"><?= __('template.comments.form.email_help'); ?></p>
            </div>
            <div class="form-group" data-ng-class="{'has-error' : errors['comment-email']}" >
                <textarea class="comment-field form-control" placeholder="<?= __('template.comments.form.text_placeholder'); ?>" data-ng-model="comment_text"></textarea>
                <p class="help-block"><?= __('template.comments.form.text_help'); ?></p>
            </div>
            <div class="row form-group" data-ng-class="{'has-error' : errors['capcha']}">
                <div class="col-md-6">
                    <span class="capcha">{{capcha_numbers.first}} + {{capcha_numbers.second}} = </span>
                    <input data-ng-model="capcha" class="capcha-result" type="text" />
                </div>
                <div class="col-md-6 ">
                    <button data-ng-class="{disabled: capcha == ''}" class="btn btn-success btn-lg pull-right " data-ng-click="addComment(user_name, user_email, comment_text)"><?= __('template.comments.form.button'); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>