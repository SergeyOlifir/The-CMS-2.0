<div id="fedback" class="feedback-form"  data-ng-controller="feedback">
    <div class="panel panel-default">
        <div class="panel-heading" data-ng-click="toggleHeight()">
            <h3 class="panel-title"><?= __('template.feedback.header'); ?><i class="glyphicon glyphicon-comment pull-right"></i></h3>
        </div>
        <div class="panel-body" data-ng-class="{opened: expanded, closed: !expanded}" >
            <div data-ng-class="{hidden: !sucsAlert}" class="alert alert-success alert-dismissable"><?= __('template.feedback.messages.success'); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <div data-ng-class="{hidden: !dungAlert}" class="alert alert-danger alert-dismissable"><?= __('template.feedback.messages.danger'); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <p class="lead"><?= __('template.feedback.form.header'); ?></p>
            <form data-ng-submit="send()">
                <div class="form-group" data-ng-class="{'has-error': errors['user_name']}">
                    <input required="required" type="text" data-ng-model="name" class="form-control" placeholder="<?= __('template.feedback.form.user_name_placeholder'); ?>">
                </div>
                <div class="form-group" data-ng-class="{'has-error': errors['user_email']}">
                    <input required="required" type="email" data-ng-model="mail" class="form-control" placeholder="<?= __('template.feedback.form.user_email_placeholder'); ?>">
                </div>
                <div class="form-group" data-ng-class="{'has-error': errors['text']}">
                    <textarea required="required" data-ng-model="text" class="form-control" placeholder="<?= __('template.feedback.form.text_placeholder'); ?>"></textarea>
                    <p class="help-block"><?= __('template.feedback.form.text_help_block'); ?></p>
                </div>
                <div class="clearfix">
                    <button type="submit" class="btn btn-success pull-right"><?= __('template.feedback.form.button_caption'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>