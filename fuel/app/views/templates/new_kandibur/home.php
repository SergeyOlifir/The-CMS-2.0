<? $current_page = Controller_Application::$current_page; ?>
<? $template = "new_kandibur"; ?>
<!DOCTYPE html>
<html lang="<?= Config::get('language'); ?>">
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
        <?= Asset::css('font-awesome.min.css'); ?>
        <?= TCCore\TCTheme::add_css("carusel.css"); ?>

        <?= Asset::js('jQuery-2.1.4.min.js'); ?>
        <?= Asset::js('bootstrap.min.js'); ?>
        <?= Asset::js('bower_components/angular/angular.min.js'); ?>
        <?= Asset::js('bower_components/angular-resource/angular-resource.min.js'); ?>
        <?= Asset::js('comments.js'); ?>
        <?= TCCore\TCTheme::add_js('application.js'); ?>
        <?= Asset::render('javascripts'); ?>
        
        <meta property="og:title" content="zhitnitsa" />
		<meta property="og:type" content="company" />
		<meta property="og:url" content="http://zhitnitsa.com.ua/" />
		<meta property="og:image" content="" />
		<meta property="og:site_name" content="&#x416;&#x438;&#x442;&#x43d;&#x438;&#x446;&#x430;" />
		<meta property="fb:admins" content="100005100901584" />
                <meta name='yandex-verification' content='5e759fa812b2e0eb' />

                <script src="http://api-maps.yandex.ru/1.1/index.xml?key=AK2LZ1IBAAAAVGoMJQMAegt_yZa1aAz9rRo10aqv4RSD150AAAAAAAAAAABj7Jy0EjAYdb6aeY0S8z_BS8KOdw==~AODmaFIBAAAALWvHEwIAOB1fs4s5fZ0KgscYeHLTCRruMpQAAAAAAAAAAABZJXvwPHFlmLn8vdT10GQIULOqeA=="
                type="text/javascript"></script>

                <!-- Rating@Mail.ru counter -->
                    <script type="text/javascript">//<![CDATA[
                    var _tmr = _tmr || [];
                    _tmr.push({id: "2416610", type: "pageView", start: (new Date()).getTime()});
                    (function (d, w) {
                    var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true;
                    ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
                    var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
                    if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
                    })(document, window);
                    //]]></script><noscript><div style="position:absolute;left:-10000px;">
                    <img src="//top-fwz1.mail.ru/counter?id=2416610;js=na" style="border:0;" height="1" width="1" alt="Рейтинг@Mail.ru" />
                    </div></noscript>
                <!-- //Rating@Mail.ru counter -->
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
      </body>
</html>
