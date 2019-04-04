<?php
//session_start();
global $tp_options;
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="<?php echo $tp_options['favicon-image']['url'] ?>"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto+Slab:400,700&amp;subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animations.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/fancybox/jquery.fancybox.css">
    <title><?php wp_title(''); ?><?php if (wp_title('', false)) {
            echo ' :';
        } ?><?php bloginfo('name'); ?></title>
    <script>
        var ajax_link = "<?php echo home_url()."/wp-admin/admin-ajax.php" ?>";
        var home = '<?php echo home_url() ?>';
        var ajaxurl = "<?php echo admin_url('admin-ajax.php') ?>";

    </script>

    <?php wp_head(); ?>
</head>
<body <?php echo body_class() ?>>

<header>
    <div class="container row_top">
        <div class="flex-row">
            <div class="flex-col flex-left logo">
                <a href="<?php echo home_url(); ?>"><img src="<?php echo $tp_options['logo']['url'] ?>"></a>
            </div>

            <div class="flex-col flex-right mobile-menu-block">

                <nav class="navbar navbar-expand-lg">
                    <div class="collapse navbar-collapse" id="Toogle">
                        <i class="fa fa-close close_menu" aria-hidden="true"></i>
                        <?php wp_nav_menu(array('theme_location' => 'main-nav','menu_class' => 'navbar-nav')); ?>
                    </div>
                </nav>
            </div>

            <button class="navbar-toggler flex-right" type="button" data-toggle="collapse" data-target="#Toogle" aria-controls="Toogle" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars mx-auto" aria-hidden="true"></i></span>
            </button>
        </div>
    </div>
</header>


<?php if(!is_front_page()):
     $horizon_banner   = get_field('horizon_banner','option' );
?>
<div class="horizon_banner" style="background:url('<?php echo $horizon_banner ?>')  no-repeat center top;">
</div>
<?php endif; ?>

<div class="content site-content">