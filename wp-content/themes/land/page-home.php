<?php /* Template Name: Home */
$page_id = $post->ID;

$home_year_created = get_field('home_year_created',$page_id );
$home_year_created_text = get_field('home_year_created_text',$page_id );
$home_number_employer =  get_field('home_number_employer',$page_id );
$home_number_employer_text =  get_field('home_number_employer_text',$page_id );
$home_number_district =  get_field('home_number_district',$page_id );
$home_number_district_text =  get_field('home_number_district_text',$page_id );
$home_number_project =  get_field('home_number_project',$page_id );
$home_number_project_text =  get_field('home_number_project_text',$page_id );

$home_field_block_1_title = get_field('home_field_block_1_title',$page_id );
$home_field_block_1_desc = get_field('home_field_block_1_desc',$page_id );
$home_field_block_1_img = get_field('home_field_block_1_img',$page_id );
$home_field_block_2_title = get_field('home_field_block_2_title',$page_id );
$home_field_block_2_desc = get_field('home_field_block_2_desc',$page_id );
$home_field_block_2_img = get_field('home_field_block_2_img',$page_id );
$home_field_block_3_title = get_field('home_field_block_3_title',$page_id );
$home_field_block_3_desc = get_field('home_field_block_3_desc',$page_id );
$home_field_block_3_img = get_field('home_field_block_3_img',$page_id );
$home_field_block_4_title = get_field('home_field_block_4_title',$page_id );
$home_field_block_4_desc = get_field('home_field_block_4_desc',$page_id );
$home_field_block_4_img = get_field('home_field_block_4_img',$page_id );

$home_value_title = get_field('home_value_title',$page_id );
$home_value_text = get_field('home_value_text',$page_id );
$home_value_img = get_field('home_value_img',$page_id );

$home_investor_title = get_field('home_investor_title',$page_id );
$home_list_partners_title = get_field('home_list_partners_title',$page_id );
?>
<?php include 'header.php' ?>

<div class="homepage">

    <div class="setionSliders">
        <?php
        $banners_slider = get_field('hompage_sliders',$page_id );
        if($banners_slider):
        ?>
        <div class="slideHome">
            <?php
            foreach ($banners_slider as $banner):
            $image_url          = $banner['img'];
            $title              = $banner['title'];
            $description        = $banner['description'];
            //get_template_directory_uri()
            ?>
            <div class="item">
                <img src="<?php echo $image_url ?>">
                <div class="slide-content animatedParent ">
                    <div class="doanimation fadeInRightShort delay-1000 wrap-slidehome animated go">
                        <?php if($title): ?>
                        <span><?php echo $title ?></span>
                        <?php endif; ?>
                        <?php if($description): ?>
                        <p><?php echo $description ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <?php
        $hompage_featured_project = get_field('hompage_featured_project',$page_id );
        if($hompage_featured_project){
            $arr_hompage_featured_project = explode(',',$hompage_featured_project);
            $args = array('post_type' => 'du-an','post__in' => $arr_hompage_featured_project,'posts_per_page' => 3);
            $projects = new WP_Query($args);
        }
        ?>

        <?php if($projects->have_posts()): ?>
        <div class="wrap-home-links">
            <div class="container">
                <ul class="ls-home-links row">
                    <?php
                    while($projects->have_posts()) : $projects->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'featuredImageProject');
                    $title = get_the_title();
                    ?>
                    <li class="fadeInUpShort animated delay-250 go item col-xs-6 col-sm-4">
                        <a href="<?php the_permalink(); ?>">
                            <?php if($featured_img_url): ?>
                            <img alt="<?php echo $title ?>" class="img-responsive inline-block" src="<?php echo $featured_img_url ?>">
                            <?php endif; ?>
                            <span class="title"><?php echo $title ?></span>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>
    </div>


    <div class="wrap-overview">
        <div class="container content-overview">
            <div class="row">
                <?php if($home_year_created): ?>
                    <div class="col-xs-6 col-sm-3">
                        <span class="title"><?php echo $home_year_created ?></span> <?php echo $home_year_created_text ?>
                    </div>
                <?php endif; ?>
                <?php if($home_number_employer): ?>
                    <div class="col-xs-6 col-sm-3">
                        <span class="title"><?php echo $home_number_employer ?></span> <?php echo $home_number_employer_text ?>
                    </div>
                <?php endif; ?>
                <?php if($home_number_district): ?>
                    <div class="col-xs-6 col-sm-3">
                        <span class="title"><?php echo $home_number_district ?></span> <?php echo $home_number_district_text ?>
                    </div>
                <?php endif; ?>
                <?php if($home_number_project): ?>
                    <div class="col-xs-6 col-sm-3">
                        <span class="title"><?php echo $home_number_project ?></span> <?php echo $home_number_project_text ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="wrap-video">
        <?php
        $array = array('post_type'=>'video','posts_per_page' => 4);
        $youtube_videos = new WP_Query($array);
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="page-branch-title text-center">
                        <div class="title small-title line-title">Video clip</div>
                    </div>
                </div>

                <?php if($youtube_videos->have_posts()): ?>
                <?php
                $first_post            =  $youtube_videos->posts[0];
                $first_post_id         = $first_post->ID;
                $first_post_url        = get_field('youtube_url',$first_post_id );
                $first_post_video_id   = get_youtube_video_ID($first_post_url);

                ?>
                <div class="col-xs-12 col-md-8">
                    <div id="lblVideo" class="w-video"><iframe src="https://www.youtube.com/embed/<?php echo $first_post_video_id ?>?loop=0&amp;modestbranding=1&amp;controls=1&amp;showinfo=0;autoplay=0&amp;cc_load_policy=0;&amp;controls=0&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;version=3&amp;playerapiid=mbYTP_id_1442377998983&amp;origin=http%3A%2F%2Ftemplate.ridianur.com&amp;allowfullscreen=true&amp;wmode=transparent&amp;autohide=1;iv_load_policy=3&amp;color=#8AC007;html5=1;player_id=player1"></iframe></div>
                    <h3 id="lblVideoTitle" class="small-title"><?php echo $first_post->post_title; ?></h3>
                </div>
                <div class="col-xs-12 col-md-4 ls-video">
                    <?php while($youtube_videos->have_posts()) : $youtube_videos->the_post();
                          $title       = get_the_title();
                          $id          = get_the_ID();
                           $video_url  = get_field('youtube_url',$id );
                           $video_id   = get_youtube_video_ID($video_url);
                           $video_date  = get_field('youtube_date',$id );
                    ?>

                    <div class="item"><a href="<?php the_permalink() ?>">
                            <div class="row">
                                <div class="col-6 box-item">
                                    <img class="img-responsive" src="https://i1.ytimg.com/vi/<?php echo $video_id ?>/mqdefault.jpg" alt="<?php echo $title ?>" title="<?php echo $title ?>">
                                    <div class="bg-play"></div>
                                </div>
                                <div class="col-6"><span><?php echo $title ?></span>
                                    <p><?php echo $video_date ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php
    $args = array(
        'orderby' => 'desc',
        'posts_per_page' => 3
    );

    $news = new WP_Query($args);
    if($news->have_posts()):
    ?>

    <div class="wrap-news">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-branch-title"><h3 class="title line-title">Tin tức - sự kiện</h3></div>
                </div>

                <div class="col-md-12">
                    <div class="news-content row">
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
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="wrap-project">
        <div class="container content-project">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-branch-title"><h3 class="title line-title line-w">Dự án đầu tư</h3></div>
                </div>
                <div class="block_project col-md-12">
                    <div class="content">
                        <div class="list_project">
                            <?php
                            $posts_per_page = 30;
                            $args = array('post_type' => 'du-an','posts_per_page' => 20);
                            $projects = new WP_Query($args);

                            $count = 0;
                            $column = 2;
                            while($projects->have_posts()) : $projects->the_post();
                                $id = get_the_ID();
                                $title = get_the_title();
                                $featured_img_url = get_the_post_thumbnail_url($id,'featuredImageProject');
                                $logo = get_field('project_logo',$id );
                                if($count % $column == 0) { echo '<div><div class="row">'; }
                                echo '<div class="col-6">'; // always open column
                                ?>
                                <a class="item" href="<?php the_permalink() ?>">
                                    <div class="box-item">
                                        <img class="img-responsive" src="<?php echo $featured_img_url ?>" alt="<?php echo $title ?>">
                                        <?php if($logo): ?>
                                        <div class="bg-project" style="background-image:url(<?php echo $logo ?>)"></div>
                                        <?php endif; ?>
                                    </div>
                                    <span><?php echo $title ?></span>
                                </a>
                                <?php
                                echo '</div>'; // always close column

                                // close .form-group and .row every two loops?
                                if($count % $column != 0) { echo '</div></div>'; }

                                $count++;
                            endwhile;
                            if ($count % $column != 0) {
                                // close last DIV if an odd number of fields
                                echo '</div></div>';
                            }
                            ?>
                        </div>
                        <div class="text-center">
                            <a href="javascript:;" class="prev_project_slider"></a>
                            <a href="javascript:;" class="next_project_slider"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wrap-fieldwork">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if($home_title_field_company): ?>
                        <div class="page-branch-title ">
                            <h3 class="title line-title small-title"><?php echo $home_title_field_company ?></h3>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if($home_title_field_company_text): ?>
                    <div class="col-md-12 offset-lg-1 col-lg-10 marginbottom30">
                        <p><?php echo $home_title_field_company_text ?></p>
                    </div>
                <?php endif; ?>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <img alt="<?php echo $home_field_block_1_title ?>" class="img-responsive inline-block" src="<?php echo $home_field_block_1_img ?>">
                    <span><?php echo $home_field_block_1_title ?></span>
                    <p><?php echo $home_field_block_1_desc ?></p>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <img alt="<?php echo $home_field_block_2_title ?>" class="img-responsive inline-block" src="<?php echo $home_field_block_2_img ?>">
                    <span><?php echo $home_field_block_2_title ?></span>
                    <p><?php echo $home_field_block_2_desc ?></p>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <img alt="<?php echo $home_field_block_3_title ?>" class="img-responsive inline-block" src="<?php echo $home_field_block_3_img ?>">
                    <span><?php echo $home_field_block_3_title ?></span>
                    <p><?php echo $home_field_block_3_desc ?></p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <img alt="<?php echo $home_field_block_4_title ?>" class="img-responsive inline-block" src="<?php echo $home_field_block_4_img ?>">
                    <span><?php echo $home_field_block_4_title ?></span>
                    <p><?php echo $home_field_block_4_desc ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="wrap-value">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 pull-right">
                    <?php if($home_value_title): ?>
                    <div class="page-branch-title">
                        <h3 class="title line-title small-title"><?php echo $home_value_title ?></h3>
                    </div>
                    <?php endif; ?>
                    <?php if($home_value_text): ?>
                    <p><?php echo $home_value_text ?></p>
                    <a href="<?php echo home_url('gioi-thieu'); ?>">Xem thêm</a>
                    <?php endif; ?>

                </div>
                <div class="col-xs-12 col-sm-6">
                    <?php if($home_value_img): ?>
                    <img alt="Giá trị cốt lõi" class="img-responsive inline-block margintop30" src="<?php echo $home_value_img ?>">
                    <?php endif; ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="wrap-partner">
        <div class="container">
            <div class="row">
                <?php
                $home_investor_sliders = get_field('home_investor_sliders',$page_id );
                if($home_investor_sliders):
                ?>
                <div class="col-md-4">
                    <?php if($home_investor_title): ?>
                    <h3 class="title title-color"><?php echo $home_investor_title ?></h3>
                    <?php endif; ?>

                    <?php
                    $count = count($home_investor_sliders);
                    foreach ($home_investor_sliders as $key=> $banner):
                    $image_url          = $banner['img'];
                    ?>
                    <img alt="" class="img-responsive img-logo <?php if($count!=$key) echo 'marginright30'; ?> " src="<?php echo $image_url ?>">
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <div class="col-md-8">
                    <?php if($home_list_partners_title): ?>
                    <h3 class="title title-color">Đối tác chiến lược:</h3>
                    <?php endif; ?>

                    <?php
                    $home_list_partners_sliders = get_field('home_list_partners_sliders',$page_id );
                    if($home_list_partners_sliders):
                    ?>
                    <ul class="ls-partners">
                        <?php
                        $count = count($home_list_partners_sliders);
                        foreach ($home_list_partners_sliders as $key=> $banner):
                        $image_url          = $banner['img'];
                        ?>
                        <li class="info" style="height: 100px;">
                            <img alt="" class="img-responsive img-logo" src="<?php echo $image_url ?>">
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include 'footer.php' ?>
