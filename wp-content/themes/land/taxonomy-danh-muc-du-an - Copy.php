<?php
/* Template Name: Danh Muc Du An */


if (is_post_type_archive('du-an')) {
    $is_cat = 0;

}else {
    global $wp_query;
    $query_obj = $wp_query->get_queried_object();
    $current_catid = $query_obj->term_taxonomy_id;
    $is_cat = 1;
}
?>

<?php
$page_id = $post->ID;
$page     = get_query_var('paged') ? get_query_var('paged') : 1;

$args = array(
        'post_type' => 'du-an',
        'orderby' => 'date',
        'order'   => 'DESC',
        'paged' => $page
);

if($current_catid){
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'danh-muc-du-an',
            'terms' => $current_catid,
            'field' => 'term_id',
        )
    );
}

$projects = new WP_Query($args);


$args = array(
    'taxonomy' => 'danh-muc-du-an',
    'orderby' => 'name',
    'order'   => 'ASC'
);

$cats = get_categories($args);


?>

<?php include 'header.php' ?>

<div class="page-project">

    <div class="container">

        <div class="library-nav">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-category-wrapper">
                        <div class="box-categorysub box-category-fixed">
                            <ul>
                                <li class="library-item library-video <?php if(!$is_cat) echo 'active'; ?>"><a href="<?php echo home_url('/du-an') ?>">Tất Cả </a></li>
                                <?php if($cats): ?>
                                <?php foreach ($cats as $category):?>
                                <li class="library-item library-album <?php echo $category->term_id==$current_catid ? 'active':''; ?>"><a href="<?php echo get_category_link( $category->term_id ) ?>"><?php echo $category->name; ?></a></li>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($projects->have_posts()): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="page-branch-title text-center">
                        <div class="title small-title line-title">
                            <?php
                            if($is_cat){
                                echo $query_obj->name;
                            }else{
                                echo 'Dự án đầu tư';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="row ls-project">
                        <?php while($projects->have_posts()) : $projects->the_post();
                            $terms =  wp_get_object_terms( $id, 'danh-muc-du-an', array('fields'=>'names'));
                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'featuredImageProject');
                            $title = get_the_title();
                        ?>
                        <div class="col-xs-12 col-sm-4">
                            <a class="item" href="<?php the_permalink() ?>">
                                <?php if($featured_img_url): ?>
                                <div class="wrap-thumbnail">
                                    <img class="img-responsive" src="<?php echo $featured_img_url ?>" alt="<?php echo $title ?>" title="<?php echo $title ?>">
                                    <div class="overlay"></div>
                                </div>
                                <?php endif; ?>
                                <div class="title">
                                    <?php
                                    if($terms){
                                        foreach ($terms as $category){
                                            ?>
                                            <span><?php echo $category ?></span>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <?php echo $title ?>
                                </div>
                            </a>
                        </div>
                        <?php endwhile; ?>
                        <div class="clearfix"></div>
                    </div>
                    <div class="pagination">
                        <div class="pull-right">
                            <?php
                            if (function_exists('devvn_wp_corenavi')) devvn_wp_corenavi($projects);
                            ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
    </div>

</div>

<?php include 'footer.php' ?>