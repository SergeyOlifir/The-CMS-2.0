<? $current_page = Controller_Application::$current_page; ?>
<? $template = "new_zhitnitca"; ?>
<!DOCTYPE html>
<html lang="<?= Config::get('language'); ?>">
    <head>
        <title><?= isset($title) ? $title : '' ?></title>
        <meta charset="utf-8"/>
        <link rel="shortcut icon" href="assets/img/templates/<?= $template; ?>/favicon.png" type="image/png">
        <?= Asset::css('bootstrap.min.css'); ?>
        <?= TCCore\TCTheme::add_css("carusel.css"); ?>

        <?= Asset::js('jQuery-2.1.4.min.js'); ?>
        <?= Asset::js('bootstrap.min.js'); ?>
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
            <?= TCCore\TCTheme::render("footer"); ?>
        </footer>
      </body>
</html>
