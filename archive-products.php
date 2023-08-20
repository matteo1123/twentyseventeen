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

	get_header();
	?>
<?php if(debug()) { ?>
	<h1>archive-products.php</h1>
	<h2><?php echo(get_permalink()); ?></h2>
<?php } ?>
	<div class='container'>
		<div style="width:100vw; margin:10px;" class=" row">
			<div class="col-xl-10">
			<?php
			if ( have_posts() ) {?>
				<?php while(have_posts()) {
					the_post();?>
							<a class="no-underline" href="<?php echo the_permalink(); ?>">
								<div style="min-height:300px; display:flex; margin-bottom:20px;" class="btn btn-outline-dark container-fluid row">
									<div class="col-xl-8 dont-underline">
										<h2 class="text-left pt-5 font-weight-bold"><?php echo the_title(); ?></h2>
										<h3 class="py-5 my-5"><?php echo the_field('preview_text', get_the_ID());?></h3>
										<h2 class="text-right font-weight-bold"><?php echo the_field('price', get_the_ID());?></h2>
									</div>
									<div class="col-xl-4">
										<?php if(get_the_post_thumbnail_url()){ ?>
											<img style="height:100%;"" src="<?php echo get_the_post_thumbnail_url()?>"/>
										<?Php } else { ?>
											<img style="height:100%;"src="/wp-content/uploads/2023/05/lovebutter1.jpg">
										<?php }; ?>
									</div>
								</div>
							</a>
				<?php }; ?>
			<?php }; ?>

			</div>
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div><!-- .wrap -->

	<?php
	get_footer();

?>
