<script>
    let unit_amount = <?php echo the_field('price', get_the_ID());?>;
    let image = "<?php echo the_post_thumbnail_url(); ?>"
    if(!image) image = window.location.origin + '/wp-content/uploads/2021/07/cropped-music-images-6-scaled-4.jpg' ;
    let title = "<?php echo the_title(); ?>";
    let cancel_url = "<?php echo get_permalink(); ?>"
    let success_url = "<?php echo get_permalink(); ?>" + "?purchase=true"
</script>
