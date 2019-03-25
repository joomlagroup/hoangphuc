
<?php
$page_id = $post->ID;

$args = array('post_type' => 'video');
$youtube_videos = new WP_Query($args);

if (is_post_type_archive('video')) {
    $first_post            =  $youtube_videos->posts[0];

}else {
    $found_key = array_search($post->ID, array_column($youtube_videos->posts, 'ID'));
    if($found_key)
    {
        $first_post = $youtube_videos->posts[$found_key];
    }
}

if($first_post){
    $first_post_id         = $first_post->ID;
    $first_post_url        = get_field('youtube_url',$first_post_id );
    $first_post_video_id   = get_youtube_video_ID($first_post_url);
}

?>

<?php include 'header.php' ?>

<div class="page-video">

    <div class="container">

        <div class="library-nav">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-category-wrapper">
                        <div class="box-categorysub box-category-fixed">
                            <ul>
                                <li class="library-item library-video active"><a href="<?php echo home_url('/video') ?>">Video </a></li>
                                <li class="library-item library-album"><a href="<?php echo home_url('/album-hinh') ?>">Album hình</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($youtube_videos->have_posts()): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="page-branch-title text-center">
                    <div class="title small-title line-title">Video clip</div>
                </div>
                <div id="lblVideo" class="w-video"><iframe src="https://www.youtube.com/embed/<?php echo $first_post_video_id ?>?loop=0&amp;modestbranding=1&amp;controls=1&amp;showinfo=0;autoplay=1&amp;cc_load_policy=0;&amp;controls=0&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;version=3&amp;playerapiid=mbYTP_id_1442377998983&amp;origin=http%3A%2F%2Ftemplate.ridianur.com&amp;allowfullscreen=true&amp;wmode=transparent&amp;autohide=1;iv_load_policy=3&amp;color=#8AC007;html5=1;player_id=player1" __idm_id__="250617857"></iframe></div>
                <div class="text-center">
                    <h1 id="lblTitle" class="title"><?php echo $first_post->post_title; ?></h1>
                </div>


                <div class="main_slider_video">
                    <div class="video-content">

                        <?php while($youtube_videos->have_posts()) : $youtube_videos->the_post();
                        $title       = get_the_title();
                        $id          = get_the_ID();
                        $video_url  = get_field('youtube_url',$id );
                        $video_id   = get_youtube_video_ID($video_url);
                        $video_date  = get_field('youtube_date',$id );
                        ?>
                        <div class="item <?php echo ($id==$first_post_id) ? 'active':''; ?>">
                            <a href="<?php the_permalink() ?>">
                                <div class="box-item">
                                    <img class="img-responsive" src="https://i1.ytimg.com/vi/<?php echo $video_id ?>/mqdefault.jpg" alt="<?php echo $title ?>" title="<?php echo $title ?>">
                                    <div class="bg-play"></div>
                                </div>
                                <span><?php echo $title ?></span>
                            </a>
                        </div>
                        <?php endwhile; ?>
                    </div>

                    <div class="text-center">
                        <a href="javascript:void(0);" class="prev_video_slider"></a>
                        <a href="javascript:void(0);" class="next_video_slider"></a>
                    </div>
                </div>



            </div>
            <div class="clearfix"></div>
        </div>
        <?php endif; ?>
    </div>

</div>

<?php include 'footer.php' ?>