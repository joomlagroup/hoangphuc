
<?php /* Template Name: Tuyen Dung */
$page_id = $post->ID;

$args = array('post_type' => 'album-hinh');
$album_hinh = new WP_Query($args);


?>

<?php include 'header.php' ?>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="library-nav">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-category-wrapper">
                                <div class="box-categorysub box-category-fixed">
                                    <ul>
                                        <li class="library-item library-video"><a href="<?php echo home_url('/video') ?>">Video </a></li>
                                        <li class="library-item library-album active"><a href="<?php echo home_url('/album-hinh') ?>">Album hình</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="page-branch-title">
                    <h1 id="lblTitle" class="title small-title line-title">Album hình</h1>
                </div>
                <div class="row list-album">
                    <?php if($album_hinh->have_posts()): ?>

                    <?php while($album_hinh->have_posts()) : $album_hinh->the_post();
                    $album_images = get_field('album_images',get_the_ID());
                    $title = get_the_title();
                    ?>
                    <div class="col-xs-12 col-sm-4">
                        <a class="item" data-id="<?php the_ID(); ?>" data-href="http://baolongland.com.vn/album-hinh/vogue-resort-su-kien-ngay-24-12-2016.html">
                            <div class="wrap-thumbnail"><img class="img-responsive" src="<?php echo $album_images[0]['img'] ?>" alt="<?php echo $title ?>" title="<?php echo $title ?>">
                                <div class="overlay"></div>
                            </div>
                            <div class="title"><?php echo $title ?></div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>


<script>

    jQuery.noConflict();
    jQuery(document).ready(function($){
        'use strict';

        $(".list-album .item").click(function () {
            var post_id = $(this).data("id");
            var nonce = '<?php echo wp_create_nonce("check_security_ajax") ?>';
            $.ajax({
                type : "post",
                dataType : "json",
                url : ajaxurl,
                data : {
                    action: "loadpost", //Tên action
                    post_id : post_id,
                    nonce: nonce,
                },
                context: this,
                beforeSend: function(){
                    //do anyting
                },
                success: function(response) {
                    if(response.success) {

                       // console.log(response.data);
                        $("#fancy_content").html(response.data);
                        $("#fancy_content a").fancybox({
                            openEffect: 'none',
                            closeEffect: 'none',
                            padding: 0,
                            prevEffect: 'fade',
                            nextEffect: 'fade',
                            'titlePosition': 'over',
                            'titleFormat': function (title, currentArray, currentIndex, currentOpts) {
                                return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
                            }
                        });
                        if ($("#fancy_content a").length > 0) {
                            $("#fancy_content a:first").trigger("click");
                        }
                    }
                    else {
                        console.log('error');
                    }
                },
                error: function( jqXHR, textStatus, errorThrown ){
                    console.log( 'The following error occured: ' + textStatus, errorThrown );
                }
            })
            return false;





            /*
            $.ajax({
                type: "GET",
                cache: false,
                url: "/AJAX.aspx",
                data: "func=GETGALLERYSLIDE&module=projectimage&id=" + dataid,
                dataType: "html",
                success: function (msg) {
                    $("#fancy_content").html(msg);
                    $("#fancy_content a").fancybox({
                        openEffect: 'none',
                        closeEffect: 'none',
                        padding: 0,
                        prevEffect: 'fade',
                        nextEffect: 'fade',
                        'titlePosition': 'over',
                        'titleFormat': function (title, currentArray, currentIndex, currentOpts) {
                            return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
                        }
                    });
                    if ($("#fancy_content a").length > 0) {
                        $("#fancy_content a:first").trigger("click");
                    }
                },
                error: function (msg) {
                    bootbox.alert(msg);
                }
            });
            */
        });
    })

</script>


<div id="fancy_content" class="hide"></div>

<?php include 'footer.php' ?>