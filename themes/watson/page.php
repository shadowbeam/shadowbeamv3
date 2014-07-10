<?php theme_include('header'); ?>



<?php while(menu_items()): ?>
	<section id="section-<?php echo  menu_name();?>" class='section'>
	<?php if(!hide_jumbo()) { ?>
		<div class="jumbotron full-width">

			<h1><?php echo menu_title();?></h1>
			<p><?php section_intro(); ?></p>

		</div>
	<?php }?>

		<?php echo Registry::prop('menu_item', 'content'); ?>
	</section>
<?php endwhile; ?>

<?php theme_include('footer'); ?>