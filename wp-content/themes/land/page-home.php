<?php /* Template Name: Home */
$page_id = $post->ID;

?>
<?php include 'header.php' ?>

<div class="homepage">

    <div class="setionSliders">
        <div class="slideHome">
            <div class="item">
                <img src="http://baolongland.com.vn/assets/uploads/myfiles/images/home/slide/HomeSlide-Vogue-Restaurant.jpg">
                <div class="slide-content animatedParent ">
                    <div class="doanimation fadeInRightShort delay-1000 wrap-slidehome animated go">
                        <span>BIỆT THỰ TẠI VOGUE RESORT</span>
                        <p>
                            Sở hữu một căn biệt thự đó là sở hữu một tác phẩm có kiến trúc và thiết kế độc đáo. Chắc chắn sẽ đem đến cho chủ sở hữu cơ hội nghỉ dưỡng và cơ hội đầu tư tuyệt vời.
                        </p>
                    </div>
                </div>
            </div>

            <div class="item">
                <img src="http://baolongland.com.vn/assets/uploads/myfiles/images/home/slide/HomeSlide-Vogue-Spa.jpg">
                <div class="slide-content animatedParent ">
                    <div class="doanimation fadeInRightShort delay-1000 wrap-slidehome animated go">
                        <span>VOGUE RESORT POOLBAR</span>
                    </div>
                </div>
            </div>

            <div class="item">
                <img src="http://baolongland.com.vn/assets/uploads/myfiles/images/home/slide/HomeSlide-Vogue-MasterBedroom.jpg">
                <div class="slide-content animatedParent ">
                    <div class="doanimation fadeInRightShort delay-1000 wrap-slidehome animated go">
                        <span>VOGUE RESORT RESTAURANT</span>
                        <p>
                            Sở hữu một căn biệt thự đó là sở hữu một tác phẩm có kiến trúc và thiết kế độc đáo. Chắc chắn sẽ đem đến cho chủ sở hữu cơ hội nghỉ dưỡng và cơ hội đầu tư tuyệt vời.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-home-links">

            <div class="container">
                <ul class="ls-home-links row">
                    <li class="item col-xs-6 col-sm-4">
                        <a href="#">
                            <img alt="Vogue Resort - Villas &amp; Hotel" class="img-responsive inline-block" src="http://baolongland.com.vn/assets/uploads/myfiles/images/home/01-Vogue-Resort-Villas-Hotel.jpg">
                            <span class="title">Vogue Resort - Villas &amp; Hotel</span>
                        </a>
                    </li>
                    <li class="item col-xs-6 col-sm-4">
                        <a href="#">
                            <img alt="Rosena - Căn hộ cao cấp" class="img-responsive inline-block" src="http://baolongland.com.vn/assets/uploads/myfiles/images/home/01-Vogue-Resort-Villas-Hotel.jpg">
                            <span class="title">Rosena - Căn hộ cao cấp</span>
                        </a>
                    </li>
                    <li class="item col-xs-6 col-sm-4">
                        <a href="#" target="_bank">
                            <img alt="Sân Golf Cửa Lò - Nghệ An" class="img-responsive inline-block" src="http://baolongland.com.vn/assets/uploads/myfiles/images/home/03-Golf-CuaLo.jpg">
                            <span class="title">Sân Golf Cửa Lò - Nghệ An</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>


    <div class="wrap-overview">
        <div class="container content-overview">
            <div class="row">
                <div class="col-xs-6 col-sm-3">
                    <span class="title">1989</span>
                    Năm thành lập
                </div>
                <div class="col-xs-6 col-sm-3">
                    <span class="title">500+</span>
                    Cán bộ công nhân viên
                </div>
                <div class="col-xs-6 col-sm-3">
                    <span class="title">5+</span>
                    Tỉnh thành hiện diện
                </div>
                <div class="col-xs-6 col-sm-3">
                    <span class="title">7+</span>
                    Dự án đang và sẽ triển khai
                </div>
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

</div>

<?php include 'footer.php' ?>
