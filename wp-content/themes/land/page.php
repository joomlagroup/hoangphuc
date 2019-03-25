
<?php
global $wp_query;
$query_obj = $wp_query->get_queried_object();
$page_id  = $post->ID;

?>
<?php include 'header.php' ?>
<div class="wrap-page container">
    <?php
    if ( have_posts() ) : ?>
        <?php
        // The Loop
        while ( have_posts() ) : the_post();
            ?>
            <div class="">
                <div class="media_entry">
                    <?php the_content(); ?>
                </div>

            </div>
        <?php endwhile; // End Loop

    else: ?>
        <p>Sorry, no posts matched your criteria.</p>
    <?php endif; ?>
</div>
<?php include 'footer.php' ?>
