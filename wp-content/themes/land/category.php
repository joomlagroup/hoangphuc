
<?php /* Template Name: News */

global $wp_query;
$query_obj = $wp_query->get_queried_object();
$current_catid = $query_obj->term_taxonomy_id;

$option_posts_per_page = get_option('posts_per_page');

$page_id = $post->ID;
$page     = get_query_var('paged') ? get_query_var('paged') : 1;

$categories = get_categories( array(
    //'orderby' => 'name',
    //'order'   => 'ASC',
    'exclude' => '1'
) );

$category_name = $query_obj->name;

if(!$current_catid) {
    $current_catid = $categories[0]->term_taxonomy_id;
    $category_name = $categories[0]->name;
}

$posts_per_page =30;

$args = array(
    'cat' => $current_catid,
    'posts_per_page' => $posts_per_page
);

$news = new WP_Query($args);

//echo '<pre>'; print_r($news); echo '</pre>'; die();

?>

<?php include 'header.php' ?>

<div class="page-content">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="box-category-wrapper ">
                    <div class="box-categorysub">
                        <ul>
                            <?php if($categories): ?>
                            <?php foreach ($categories as $category): ?>
                                <li class="<?php echo $current_catid==$category->term_id ? 'active':''; ?>"><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name ?></a></li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="page-branch-title">
                    <h1 id="lblTitle" class="title line-title"><?php echo $category_name ?></h1>
                </div>
            </div>
            <div class="col-md-12 hidden ">
                <div class="hot-news-content">

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="news-content">
                    <div class="main-content">
                        <div class="content home-new">
                            <div class="row news-list">
                                <?php if($news->have_posts()): ?>
                                <?php while($news->have_posts()) : $news->the_post();
                                $title = get_the_title();
                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
                                $url = get_the_permalink();
                                ?>
                                <div class="col-xs-6 col-sm-4 item">
                                    <a class="col-md-12 news-thumbnail" href="<?php echo $url ?>" style="background-image:url('<?php echo $featured_img_url ?>');">
                                        <div class="date-time"><?php the_time('d/m/Y') ?></div>
                                    </a>
                                    <div class="col-xs-12 news-info">
                                        <div class="title"><a href="<?php echo $url ?>"><?php echo $title ?></a></div>
                                        <div class="description">
                                            <a href="<?php echo $url ?>">
                                                <?php the_excerpt(); ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <?php endwhile; ?>
                                <?php endif; ?>
                                <div class="clearfix"></div>
                            </div>
                            <div class="footer tin-tuc-nav">
                                <div class="paging button-nav-group">

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="pagination">
                            <div class="">
                                <?php if (function_exists('devvn_wp_corenavi') and ($option_posts_per_page <= $posts_per_page)) devvn_wp_corenavi($news); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php include 'footer.php' ?>