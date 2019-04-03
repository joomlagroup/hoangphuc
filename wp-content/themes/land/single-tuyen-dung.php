
<?php /* Template Name: Tuyen Dung */
$page_id = $post->ID;

$args = array('post_type' => 'tuyen-dung');
$careers = new WP_Query($args);

if (is_post_type_archive('tuyen-dung')) {
    $first_post            =  $careers->posts[0];
    $first_post_id         = $first_post->ID;

}else {
    if($careers->posts){
        $found_key = array_search($post->ID, array_column($careers->posts, 'ID'));
        $first_post = $careers->posts[$found_key];
    }
}

if($first_post){
    $first_post_id         = $first_post->ID;
}

//$term_desc = term_description( $term_id, $term_name );

?>

<?php include 'header.php' ?>

<div class="page-careers">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-category-wrapper ">
                    <div class="box-categorysub">
                        <ul>
                            <?php
                            if ( $careers->have_posts() ):
                                while ( $careers->have_posts() ): $careers->the_post();
                                    ?>
                                    <li class="<?php echo get_the_ID()==$first_post_id ? 'active':''; ?>"><a href="<?php echo permalink_link(); ?>"><?php the_title() ?></a></li>
                                <?php
                                endwhile;
                            endif;
                            ?>

                        </ul>
                    </div>
                </div>
            </div>

            <?php if($first_post): ?>
            <div class="col-md-12">
                <div class="page-branch-title">
                    <h1 id="lblTitle" class="title small-title line-title"><?php echo $first_post->post_title; ?></h1>
                </div>


                <div id="divContent" class="content">
                    <?php
                    $content_post = get_post($first_post_id);
                    $content = $content_post->post_content;
                    $content = apply_filters('the_content', $content);
                    $content = str_replace(']]>', ']]&gt;', $content);
                    echo $content;
                    ?>
                </div>

               <div class="clearfix"></div>
               <br>
            </div>
            <?php endif; ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php include 'footer.php' ?>