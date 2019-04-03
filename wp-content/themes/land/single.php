
<?php
global $post;

$cat = get_the_category($post->ID);
if($cat){
    $current_catid = $cat[0]->term_taxonomy_id;
}

$categories = get_categories( array(
    //'orderby' => 'name',
    //'order'   => 'ASC',
    'exclude' => '1'
) );


?>
<?php include 'header.php' ?>
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-category-wrapper">
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
                <div class="news-content">
                    <div class="main-content">
                        <div class="content post-detail">
                            <div class="page-branch-title">
                                <h1 id="lblTitle" class="title line-title small-title colorblue"><?php the_title() ?></h1>

                                <span id="postDateTime" class="date-time"><?php the_time('d/m/Y') ?></span>
                            </div>
                            <div id="divPostContent" class="description content-wrapper">
                                <?php
                                if ( have_posts() ):
                                    while ( have_posts() ): the_post();
                                        ?>
                                        <?php the_content(); ?>
                                    <?php
                                    endwhile;
                                endif;
                                ?>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="list-share">
                    <span>Chia sẻ:</span>
                    <a target="_blank" href="http://www.facebook.com/share.php?u=<?php echo get_permalink(); ?>" class="bt-share bt-share-facebook">&nbsp;</a>
                    <a target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" class="bt-share bt-share-google">&nbsp;</a>
                </div>
            </div>
            <div class="clearfix"></div>

            <?php
            $args = array(
                'cat' => $current_catid,
                'post__not_in' => array(get_the_ID()),
                'orderby' => 'rand',
                'posts_per_page' => 3
            );

            $relative_news = new WP_Query($args);
            if($relative_news->have_posts()):
            ?>

            <div class="col-md-12 list-order">
                <div class="post-other">
                    <div class="page-branch-title">
                        <h3 class="title line-title kanit other-title">Tin tức khác</h3>
                    </div>
                    <div class="main-content row">
                        <?php while($relative_news->have_posts()) : $relative_news->the_post();
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
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php include 'footer.php' ?>
