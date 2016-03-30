<div class="wrapper">

    <?= render('admin/main/header'); ?>
      
    <?= render('admin/main/sidebar'); ?>

    <?= render('admin/main/content', array(
        'header' => (isset($header) ? $header : ''), 
        'description' => (isset($description) ? $description : ''), 
        'content' => (isset($content) ? $content : ''))
    ); ?>

    <?= render('admin/main/footer'); ?>
    
    <?= render('admin/main/controlsidebar'); ?>
      
</div>

