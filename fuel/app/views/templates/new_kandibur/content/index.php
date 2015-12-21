<section class="submenu">
	<h2>Portfolio</h2>
	<?= \Fuel\Core\Html::anchor("home/content/change/tile/{$category}", "Tile", array('class' => 'tile')); ?>
	<?= \Fuel\Core\Html::anchor("home/content/change/list/{$category}", "List", array('class' => 'list')); ?>
</section>
<? if (Session::get('tile')): ?>
    <?= TCTheme::render("content/tiles", array('content' => $content)); ?>
<? else: ?>
    <?= TCTheme::render("content/list", array('content' => $content)); ?>
<? endif;?>

<?= $pagination; ?>
	