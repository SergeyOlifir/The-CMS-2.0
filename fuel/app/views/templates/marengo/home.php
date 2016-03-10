<? $current_page = Controller_Application::$current_page; ?>
<? $template = "marengo"; ?>
<!DOCTYPE html>
<html lang="<?= TCLocal::getCurrentLang(); ?>">
    <head>
        <title><?= isset($title) ? $title : '' ?></title>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <? if(isset($meta_keywrd)): ?>
            <meta name="keywords" content="<?= $meta_keywrd;?>">
        <? endif; ?>
        <link rel="shortcut icon" href="/assets/img/templates/<?= $template; ?>/favicon.png" type="image/png">
        <?= Asset::css('bootstrap.min.css'); ?>
        <?= TCCore\TCTheme::add_css("carusel.css"); ?>

        <?= Asset::js('jQuery-2.1.4.min.js'); ?>
        <?= Asset::js('bootstrap.min.js'); ?>
        <?= Asset::js('bower_components/angular/angular.min.js'); ?>
        <?= Asset::js('bower_components/angular-resource/angular-resource.min.js'); ?>
        <?= Asset::js('comments.js'); ?>
        <?= Asset::js('feedback.js'); ?>
        <?= TCCore\TCTheme::add_js('application.js'); ?>
        <?= Asset::render('javascripts'); ?>
    </head>

    <body>
        <header id="header">
            <?= TCCore\TCTheme::render("header",array()); ?>
        </header>
        
        <content class="all-wrapper">
          <? if(isset($content)): ?>
                  <?= $content; ?>
          <? endif; ?>
        </content>
        <footer id="footer">
            <?= TCCore\TCTheme::render("footer", array(), false); ?>
        </footer>
        <?= \TCCore\TCTheme::load_view('fedback_form'); ?>
      </body>
</html>
