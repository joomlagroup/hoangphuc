
<?php
global $wp_query;
$query_obj = $wp_query->get_queried_object();

$array_current_cat = wp_get_post_terms( get_the_ID(), 'danh-muc-du-an', array('fields' => 'ids') );

$args = array(
    'taxonomy' => 'danh-muc-du-an',
    'orderby' => 'name',
    'order'   => 'ASC'
);
$cats = get_categories($args);

$page_id  = $post->ID;
$project_heading_1 = get_field('project_heading_1', $page_id);
$project_sub_heading_1 = get_field('project_sub_heading_1', $page_id);

$project_heading_2 = get_field('project_heading_2', $page_id);
$project_sub_heading_2 = get_field('project_sub_heading_2', $page_id);

$project_scope = get_field('project_scope', $page_id);
$project_position = get_field('project_position', $page_id);
$project_featured = get_field('project_featured', $page_id);
$project_opportunity = get_field('project_opportunity', $page_id);
$project_design = get_field('project_design', $page_id);
$project_position_education = get_field('project_position_education', $page_id);
$project_position_hospital = get_field('project_position_hospital', $page_id);
$project_position_market = get_field('project_position_market', $page_id);
$project_position_shopping_entertainment = get_field('project_position_shopping_entertainment', $page_id);
$project_utilities = get_field('project_utilities', $page_id);
$project_partner = get_field('project_partner', $page_id);

$featured_img_url = get_the_post_thumbnail_url(get_the_ID());

?>

<?php include 'header.php' ?>

<div class="page-project-detail">
    <div class="container">
        <div class="library-nav">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-category-wrapper">
                        <div class="box-categorysub box-category-fixed">
                            <ul>
                                <?php if($cats): ?>
                                    <?php foreach ($cats as $category):?>
                                        <li class="<?php if($array_current_cat){ echo in_array($category->term_id, $array_current_cat) ? 'active':''; } ?>"><a href="<?php echo get_category_link( $category->term_id ) ?>"><?php echo $category->name; ?></a></li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="divPostContent">
            <div class="project-overview">
                <?php if($project_heading_1 or $project_sub_heading_1): ?>
                <div class="page-branch-title">
                    <h1 class="title line-title">
                        <?php echo $project_heading_1 ?>
                        <span><?php echo $project_sub_heading_1 ?></span>
                    </h1>
                </div>
                <?php endif; ?>
                <div class="text-center">
                    <?php if($featured_img_url): ?>
                    <img alt="<?php echo get_the_title(); ?>" class="img-responsive inline-block" src="<?php echo $featured_img_url ?>">
                    <?php endif; ?>


                    <div class="page-branch-title ">
                        <h1 class="title small-title">
                           <?php echo $project_heading_2 ?>
                            <span><?php echo $project_sub_heading_2 ?></span>
                        </h1>
                    </div>


                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6 text-justify">

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
                    <div class="col-xs-12 col-md-6 col-lg-offset-1 col-lg-5">
                        <div class="box-project text-justify">
                            <div class="title">Quy mô dự án</div>
                            <?php echo $project_scope ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="project-location">

                <?php if($project_position): ?>
                <div class="text-center">
                    <div class="page-branch-title ">
                        <h3 class="title small-title">Vị trí dự án</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-justify">
                        <?php echo $project_position ?>
                    </div>
                </div>
                <?php endif; ?>

                <div class="row">
                    <?php if($project_position_education): ?>
                        <div class="col-xs-12 col-sm-6 col-md-3 ls-location">
                            <span class="title"><img alt="Giáo dục" class="img-responsive" src="<?php echo get_template_directory_uri() ?>/images/ico-giao-duc.svg">Giáo dục</span>
                            <ul class="ls-num">
                                <?php foreach ($project_position_education as $key=> $item): ?>
                                    <li><span><?php echo $key+1 ?></span><?php echo $item['item'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if($project_position_hospital): ?>
                        <div class="col-xs-12 col-sm-6 col-md-3 ls-location">
                            <span class="title"><img alt="Giáo dục" class="img-responsive" src="<?php echo get_template_directory_uri() ?>/images/ico-y-te.svg">Y Tế</span>
                            <ul class="ls-num">
                                <?php foreach ($project_position_hospital as $key=> $item): ?>
                                    <li><span><?php echo $key+1 ?></span><?php echo $item['item'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if($project_position_market): ?>
                        <div class="col-xs-12 col-sm-6 col-md-3 ls-location">
                            <span class="title"><img alt="Giáo dục" class="img-responsive" src="<?php echo get_template_directory_uri() ?>/images/ico-cho.svg">Chợ & Siêu thị</span>
                            <ul class="ls-num">
                                <?php foreach ($project_position_market as $key=> $item): ?>
                                    <li><span><?php echo $key+1 ?></span><?php echo $item['item'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if($project_position_shopping_entertainment): ?>
                        <div class="col-xs-12 col-sm-6 col-md-3 ls-location">
                            <span class="title"><img alt="Giáo dục" class="img-responsive" src="<?php echo get_template_directory_uri() ?>/images/ico-mua-sam.svg">Mua sắm & giải trí</span>
                            <ul class="ls-num">
                                <?php foreach ($project_position_shopping_entertainment as $key=> $item): ?>
                                    <li><span><?php echo $key+1 ?></span><?php echo $item['item'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if($project_design): ?>
            <div class="project-design">
                <div class="row">
                    <div class="col-md-12  text-center">
                        <div class="page-branch-title">
                            <h4 class="title small-title coloryellow">
                                THIẾT KẾ TỔNG THỂ</h4>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="box-invest text-justify">
                            <?php echo $project_design ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($project_opportunity): ?>
            <div class="project-invest">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="page-branch-title">
                            <h4 class="title small-title coloryellow">
                                CƠ HỘI ĐẦU TƯ</h4>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <img alt="CƠ HỘI ĐẦU TƯ" class="img-responsive inline-block" src="<?php echo home_url() ?>/wp-content/uploads/2019/03/invert-rosena.jpg">
                        <div class="box-invest text-justify">
                            <?php echo $project_opportunity ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($project_utilities): ?>
            <div class="project-utilities">
                <div class="text-center">
                    <div class="page-branch-title ">
                        <h3 class="title small-title">Tiện ích</h3>
                    </div>
                </div>

                <div class="">
                    <?php echo $project_utilities; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if($project_partner): ?>
            <div class="project-partner">
                <div id="divShortdesc"><div class="text-center">
                        <div class="page-branch-title ">
                            <h3 class="title small-title">
                                <span>ĐƠN VỊ HỢP TÁC DỰ ÁN</span></h3>
                        </div>
                    </div>
                    <div class="wrap-intro">
                        <?php echo $project_partner; ?>
                    </div>
                    <br>
                </div>
            </div>
            <?php endif; ?>

        </div>

        <div>
            <div class="list-share">
                <span>Chia sẻ:</span>
                <a target="_blank" href="http://www.facebook.com/share.php?u=<?php echo get_permalink(); ?>" class="bt-share bt-share-facebook">&nbsp;</a>
                <a target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" class="bt-share bt-share-google">&nbsp;</a>
            </div>
        </div>

        <?php
        $args = array('post_type' => 'du-an','post__not_in' => array(get_the_ID()),'orderby' => 'rand','posts_per_page' => 3);
        if($array_current_cat[0]){
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'danh-muc-du-an',
                    'terms' => $array_current_cat[0],
                    'field' => 'term_id',
                )
            );
        }

        $relative_projects = new WP_Query($args);
        if($relative_projects->have_posts()):
        ?>
        <div class="">
            <div class="page-branch-title">
                <h3 class="title line-title small-title">Dự án tương tự</h3>
            </div>
            <div class="ls-project row">
                <?php
                while($relative_projects->have_posts()) : $relative_projects->the_post();
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
        </div>
        <?php endif; ?>

        <br>
    </div>

</div>

<?php include 'footer.php' ?>