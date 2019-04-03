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
                    <div class="page-branch-title ">
                        <h3 class="title line-title small-title">lĩnh vực hoạt động</h3>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-offset-1 col-lg-10 marginbottom30">
                    <p>Bảo Long Land  đang từng bước đầu tư và phát triển các dự án trên tinh thần thận trọng, chuyên nghiệp, không ngừng học hỏi. Khi phát triển các dự án bất động sản Bảo Long Land  tuân thủ, thực hiện, triển khai đầu tư theo đúng 5 tiêu chí: An toàn; Kỹ thuật và chất lượng; Tiến độ; Hiệu quả đầu tư và Tính thẩm mỹ. Mong muốn lớn nhất của Bảo Long Land  là tạo ra những giá trị bền vững theo thời gian.</p>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <img alt="Xây dựng dự án bđs" class="img-responsive inline-block" src="http://baolongland.com.vn/assets/uploads/myfiles/images/aboutus/ico-xay-dung.svg">
                    <span>xây dựng<br>dự án bđs</span>
                    <p>Xây dựng các dự án BĐS theo 5 tiêu chí: An toàn; Kỹ thuật và chất lượng; Tiến độ; Hiệu quả đầu tư và Tính thẩm mỹ.</p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <img alt="Đầu tư &amp; phát triển dự án" class="img-responsive inline-block" src="http://baolongland.com.vn/assets/uploads/myfiles/images/aboutus/ico-dau-tu.svg">
                    <span>Đầu tư &amp;<br>phát triển dự án</span>
                    <p>Đầu tư và phát triển các dự án trên tinh thần thận trọng, chuyên nghiệp, khoa học và không ngừng học hỏi.</p>
                </div>
                <div class="clearfix visible-sm"></div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <img alt="Kinh doanh bất động sản" class="img-responsive inline-block" src="http://baolongland.com.vn/assets/uploads/myfiles/images/aboutus/ico-kinh-doanh.svg">
                    <span>Kinh doanh<br>bất động sản</span>
                    <p>Bảo Long Land  tập trung vào việc đáp ứng được nhu cầu thực tế của thị trường và của khách hàng.</p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <img alt="Thương mại &amp; dịch vụ" class="img-responsive inline-block" src="http://baolongland.com.vn/assets/uploads/myfiles/images/aboutus/ico-thuong-mai.svg">
                    <span>Thương mại<br>&amp; dịch vụ</span>
                    <p>Phối hợp với đối tác để triển khai các dịch vụ, khai thác dự án nhằm đem lại hiệu quả tốt nhất cho khách hàng.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="wrap-value">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 pull-right">
                    <div class="page-branch-title">
                        <h3 class="title line-title small-title">Giá trị cốt lõi</h3>
                    </div>
                    <p>Các sản phẩm bất động sản của Bảo Long Land  tập trung vào việc đáp ứng được nhu cầu thực tế của thị trường, của khách hàng. Một sản phẩm bất động sản do Bảo Long Land  đầu tư và phát triển sẽ đem đến cho khách hàng ba giá trị cốt lõi: Giá trị sử dụng, giá trị khai thác và giá trị bền vững.</p>
                    <a href="#">Xem thêm</a>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <img alt="Giá trị cốt lõi" class="img-responsive inline-block margintop30" src="http://baolongland.com.vn/assets/uploads/myfiles/images/home/gia-tri-cot-loi.jpg">
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="wrap-partner">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="title title-color">Chủ đầu tư &amp; phát triển dự án:</h3>
                    <img alt="New City Group" class="img-responsive img-logo marginright30" src="http://baolongland.com.vn/assets/uploads/myfiles/images/home/logo-new-city-group.svg">
                    <img alt="Bảo Long Land" class="img-responsive img-logo" src="http://baolongland.com.vn/assets/uploads/myfiles/images/home/logo-bao-long-land.svg">
                </div>
                <div class="col-md-8">
                    <h3 class="title title-color">Đối tác chiến lược:</h3>
                    <ul class="ls-partners">
                        <li class="info" style="height: 100px;">
                            <img alt="Dark Horse" class="img-responsive img-logo" src="http://baolongland.com.vn/assets/uploads/myfiles/images/home/logo-dark-horse.svg">
                        </li>
                        <li class="info" style="height: 100px;">
                            <img alt="IVB" class="img-responsive img-logo" src="http://baolongland.com.vn/assets/uploads/myfiles/images/home/logo-ivb.svg">
                        </li>
                        <li class="info" style="height: 100px;">
                            <img alt="Vietcombank" class="img-responsive img-logo" src="http://baolongland.com.vn/assets/uploads/myfiles/images/home/logo-vietcombank.svg">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include 'footer.php' ?>
