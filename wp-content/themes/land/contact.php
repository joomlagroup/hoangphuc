
<?php /* Template Name: Contact */
$page_id = $post->ID;
$contact_heading = get_field('contact_heading',$page_id );
$contact_company_name = get_field('contact_company_name',$page_id );
$contact_company_address = get_field('contact_company_address',$page_id );
$contact_company_address = get_field('contact_company_address',$page_id );
$contact_company_phone = get_field('contact_company_phone',$page_id );
$contact_company_hotline = get_field('contact_company_hotline',$page_id );
$contact_company_email = get_field('contact_company_email',$page_id );
$contact_heading_form = get_field('contact_heading_form',$page_id );
$contact_heading_form_desc = get_field('contact_heading_form_desc',$page_id );
$contact_iframe_map = get_field('contact_iframe_map',$page_id );
?>

<?php include 'header.php' ?>

<div class="page-info">
    <div class="container">
        <div id="divContent" class="row">
            <div class="col-md-12">
                <div class="page-branch-title"><h1 class="title line-title"><?php echo $contact_heading ?></h1></div>
            </div>
            <div class="col-sx-12 col-md-5 marginbottom50">
                <div class="wrap-intro">
                    <div class="title"><?php echo $contact_company_name ?></div>
                    <p>
                        <?php if($contact_company_address): ?>
                            ĐC: <?php echo $contact_company_address ?><br>
                        <?php endif; ?>

                        <?php if($contact_company_phone): ?>
                            ĐT: <?php echo $contact_company_phone ?><br>
                        <?php endif; ?>

                        <?php if($contact_company_hotline): ?>
                            HOTLINE: <?php echo $contact_company_hotline ?><br>
                        <?php endif; ?>

                        <?php if($contact_company_email): ?>
                            Email: <a href="mailto:<?php echo $contact_company_email ?>"><?php echo $contact_company_email ?></a>
                        <?php endif; ?>

                    </p>
                    <p class="line-break"></p>

                </div>
                <div class="contact-form">
                    <div class="page-branch-title"><h3 class="title colorblue"><?php echo $contact_heading_form ?></h3></div>
                    <p><?php echo $contact_heading_form_desc ?></p>

                    <?php echo do_shortcode('[contact-form-7 id="224" title="Liên Hệ"]'); ?>
                </div>
            </div>
            <div class="col-xs-12 offset-md-1 col-md-6 ">
                <?php echo $contact_iframe_map ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>


