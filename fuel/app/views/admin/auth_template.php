<!DOCTYPE html>
<html>
    <head>
        <title>Boroda</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= \Fuel\Core\Asset::css('bootstrap.min.css'); ?>
        <?= \Fuel\Core\Asset::css('admin.css'); ?>
    </head>
    <body>
        <?= render('_messages'); ?>
        <?php if(isset($content)): ?>
            <?= $content; ?>
        <?php endif; ?>
    </body>
</html>