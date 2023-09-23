<?php
/**
 * The template for displaying courses for sale as well as courses already purchased
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */
	$new_owned = get_posts(array(
		'numberposts'	=> -1,
		'post_type'		=> 'coursesowned',
		'meta_key'		=> 'user_id',
		'meta_value'	=> get_current_user_id()
	));
	if($new_owned) {
		$owned = get_field('course_id', $new_owned[0]->ID);
	}
	get_header();
	get_template_part( 'template-parts/page/purchase');
	try {
		$purchase = isset($_GET["purchase"]);
	}catch (Exception $e){

	}
	if(!$purchase) {
	?>
		<div class="row">
			<div class="col-2"></div>
			<?php
				echo '<div class="col-xl-4 mobile-align">';
				echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
				echo '</div><!-- .single-featured-image-header -->';
			?>
			<div class="col-xl-4 mobile-padding" style="margin:auto;">
				<h2 class="text-left font-weight-bold"><?php echo the_title(); ?></h2>
				<h2 class="text-left pt-0 font-weight-bold"><?php echo the_field('price', get_the_ID());?></h2>
				<?php echo the_field('product_description', get_the_ID());?>
				<button type="button" class="buy-now-button btn btn-outline-dark">Buy Now</button>
			</div>
			<div class="col-2"></div>
		</div>
		<div class="pt-5 mt-5 row">
			<div class="col-2"></div>
			<div class="col-8"><?php echo the_field('extra_content_', get_the_ID());?></div>
			<div class="col-2"></div>
		</div>
	<?php } else { ?>
				<div class="row">
				<div class="col-2"></div>
				<?php
					echo '<div class="col-xl-4 mobile-align">';
					echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
					echo '</div><!-- .single-featured-image-header -->';
				?>
				<div class="col-xl-4 mobile-padding" style="margin:auto;">
					<?php echo("Thank you for purchasing one " . get_the_title()); ?>
					<br>
					You have been charged <?php echo(the_field('price', get_the_ID()));?> and we will be shipping your item soon.
				</div>
				<div class="col-2"></div>
			</div>
	<?php }
	if(debug()) { ?>
	<h1>single-products.php</h1>
	<h2><?php echo(get_permalink()); ?></h2>
<?php } ?>

	<?php
	get_footer();

?>
