<!DOCTYPE html>
<html>
    <head>
        <title>THE CMS</title>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
        <?= \Fuel\Core\Asset::css('bootstrap.min.css'); ?>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <?= \Fuel\Core\Asset::css('admin/AdminLTE.min.css'); ?>
        <?= \Fuel\Core\Asset::css('plugins/datatables/dataTables.bootstrap.css'); ?>
        <?= \Fuel\Core\Asset::css('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <?= \Fuel\Core\Asset::css('admin/skin-blue.min.css'); ?>
        <?= \Fuel\Core\Asset::css('admin.css'); ?>
        
        <?= \Fuel\Core\Asset::js('jQuery-2.1.4.min.js'); ?>
        <?= \Fuel\Core\Asset::js('bootstrap.min.js'); ?>
        <?= \Fuel\Core\Asset::js('plugins/slimScroll/jquery.slimscroll.min.js'); ?>
        <?= \Fuel\Core\Asset::js('plugins/datatables/jquery.dataTables.min.js'); ?>
        <?= \Fuel\Core\Asset::js('plugins/datatables/dataTables.bootstrap.min.js'); ?>
        <?= \Fuel\Core\Asset::js('plugins/ckeditor/ckeditor.js'); ?>
        <?= \Fuel\Core\Asset::js('admin/app.min.js'); ?>
        <?= \Fuel\Core\Asset::js('admin/admin.js'); ?>
        <script type="text/javascript">
            var extraCss = new Array();
            <? foreach(Controller_Admin::$extraCSS as $css): ?>
                extraCss.push('<?= $css; ?>');
            <? endforeach ?>
        </script>
    </head>
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <?= render('_messages'); ?>
        <?= render('admin/main/main', array(
            'header' => (isset($header) ? $header : ''), 
            'description' => (isset($description) ? $description : ''), 
            'content' => (isset($content) ? $content : ''))
        ); ?>
    </body>
</html>