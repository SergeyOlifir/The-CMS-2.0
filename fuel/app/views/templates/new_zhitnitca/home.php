<? $current_page = Controller_Application::$current_page; ?>
<? $template = "new_zhitnitca"; ?>
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
        
        <meta name='yandex-verification' content='4bee6e3f36f25284' />
        <meta name='wmail-verification' content='5622ced4bad4660a' />
            <!-- Yandex.Metrika counter -->
            <script type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter22608880 = new Ya.Metrika({id:22608880,
                                clickmap:true,
                                trackLinks:true,
                                accurateTrackBounce: true});
                        } catch (e) {
                        }
                    });

                    var n = d.getElementsByTagName("script")[0],
                            s = d.createElement("script"),
                            f = function() {
                        n.parentNode.insertBefore(s, n);
                    };
                    s.type = "text/javascript";
                    s.async = true;
                    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

                    if (w.opera == "[object Opera]") {
                        d.addEventListener("DOMContentLoaded", f, false);
                    } else {
                        f();
                    }
                })(document, window, "yandex_metrika_callbacks");
            </script>
        <noscript><div><img src="//mc.yandex.ru/watch/22608880" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
        <meta property="og:title" content="zhitnitsa" />
        <meta property="og:type" content="company" />
        <meta property="og:url" content="http://zhitnitsa.com.ua/" />
        <meta property="og:image" content="" />
        <meta property="og:site_name" content="&#x416;&#x438;&#x442;&#x43d;&#x438;&#x446;&#x430;" />
        <meta property="fb:admins" content="100005100901584" />
        
        <?= Asset::css('bootstrap.min.css'); ?>
        <?= TCCore\TCTheme::add_css("carusel.css"); ?>

        <?= Asset::js('jQuery-2.1.4.min.js'); ?>
        <?= Asset::js('bootstrap.min.js'); ?>
        <?= Asset::js('bower_components/angular/angular.min.js'); ?>
        <?= Asset::js('bower_components/angular-resource/angular-resource.min.js'); ?>
        <?= Asset::js('comments.js'); ?>
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
      </body>
</html>
