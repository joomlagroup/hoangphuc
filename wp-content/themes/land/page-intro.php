<?php /* Template Name: Intro */
$page_id = $post->ID;

$intro_title_page = get_field('intro_title_page',$page_id );
$intro_title_desc = get_field('intro_title_desc',$page_id );
$intro_quocte = get_field('intro_quocte',$page_id );
$intro_quocte_img = get_field('intro_quocte_img',$page_id );
$intro_year_created = get_field('intro_year_created',$page_id );
$intro_year_created_text = get_field('intro_year_created_text',$page_id );
$intro_number_employer =  get_field('intro_number_employer',$page_id );
$intro_number_employer_text =  get_field('intro_number_employer_text',$page_id );
$intro_number_district =  get_field('intro_number_district',$page_id );
$intro_number_district_text =  get_field('intro_number_district_text',$page_id );
$intro_number_project =  get_field('intro_number_project',$page_id );
$intro_number_project_text =  get_field('intro_number_project_text',$page_id );

$intro_title_about_company = get_field('intro_title_about_company',$page_id );
$intro_title_about_company_img = get_field('intro_title_about_company_img',$page_id );
$intro_title_about_company_desc = get_field('intro_title_about_company_desc',$page_id );
$intro_title_field_company = get_field('intro_title_field_company',$page_id );
$intro_title_field_company_text = get_field('intro_title_field_company_text',$page_id );

$intro_field_block_1_title = get_field('intro_field_block_1_title',$page_id );
$intro_field_block_1_desc = get_field('intro_field_block_1_desc',$page_id );
$intro_field_block_1_img = get_field('intro_field_block_1_img',$page_id );
$intro_field_block_2_title = get_field('intro_field_block_2_title',$page_id );
$intro_field_block_2_desc = get_field('intro_field_block_2_desc',$page_id );
$intro_field_block_2_img = get_field('intro_field_block_2_img',$page_id );
$intro_field_block_3_title = get_field('intro_field_block_3_title',$page_id );
$intro_field_block_3_desc = get_field('intro_field_block_3_desc',$page_id );
$intro_field_block_3_img = get_field('intro_field_block_3_img',$page_id );
$intro_field_block_4_title = get_field('intro_field_block_4_title',$page_id );
$intro_field_block_4_desc = get_field('intro_field_block_4_desc',$page_id );
$intro_field_block_4_img = get_field('intro_field_block_4_img',$page_id );

$intro_value_title = get_field('intro_value_title',$page_id );
$intro_value_text = get_field('intro_value_text',$page_id );

$intro_value_block_1_title = get_field('intro_value_block_1_title',$page_id );
$intro_value_block_1_desc = get_field('intro_value_block_1_desc',$page_id );
$intro_value_block_1_img = get_field('intro_value_block_1_img',$page_id );

$intro_value_block_2_title = get_field('intro_value_block_2_title',$page_id );
$intro_value_block_2_desc = get_field('intro_value_block_2_desc',$page_id );
$intro_value_block_2_img = get_field('intro_value_block_2_img',$page_id );

$intro_value_block_3_title = get_field('intro_value_block_3_title',$page_id );
$intro_value_block_3_desc = get_field('intro_value_block_3_desc',$page_id );
$intro_value_block_3_img = get_field('intro_value_block_3_img',$page_id );

?>
<?php include 'header.php' ?>
<div class="page-content">

    <div id="divContent" class="content"><div class="animatedParent animateOnce">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($intro_title_page): ?>
                        <div class="page-branch-title">
                            <h1 class="title line-title coloryellow"><?php echo $intro_title_page ?></h1>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12 offset-lg-1 col-lg-10">
                        <?php if($intro_title_page): ?>
                        <p class="text-center"><?php echo $intro_title_desc ?></p>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-7 col-md-6 no-pading fadeInLeftShort animated delay-250  go">
                               <?php if($intro_quocte): ?>
                                <div class="box-note text-justify">
                                    <?php echo $intro_quocte ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-xs-12 col-sm-5 col-md-6 no-pading fadeInRightShort animated delay-250  go">
                                <?php if($intro_quocte_img): ?>
                                <img alt="Lời ngõ" class="img-responsive inline-block" src="<?php echo $intro_quocte_img ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        &nbsp;</div>
                </div>
            </div>
            <div class="wrap-overview">
                <div class="container content-overview">
                    <div class="row">
                        <?php if($intro_year_created): ?>
                        <div class="col-xs-6 col-sm-3">
                            <span class="title"><?php echo $intro_year_created ?></span> <?php echo $intro_year_created_text ?>
                        </div>
                        <?php endif; ?>
                        <?php if($intro_number_employer): ?>
                        <div class="col-xs-6 col-sm-3">
                            <span class="title"><?php echo $intro_number_employer ?></span> <?php echo $intro_number_employer_text ?>
                        </div>
                        <?php endif; ?>
                        <?php if($intro_number_district): ?>
                            <div class="col-xs-6 col-sm-3">
                                <span class="title"><?php echo $intro_number_district ?></span> <?php echo $intro_number_district_text ?>
                            </div>
                        <?php endif; ?>
                        <?php if($intro_number_project): ?>
                            <div class="col-xs-6 col-sm-3">
                                <span class="title"><?php echo $intro_number_project ?></span> <?php echo $intro_number_project_text ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($intro_title_about_company): ?>
                        <div class="page-branch-title ">
                            <h3 class="title line-title small-title">
                                <span><?php echo $intro_title_about_company ?></span>
                            </h3>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <?php if($intro_title_about_company_img): ?>
                        <img alt="Về Bảo long Land" class="img-responsive inline-block" src="<?php echo $intro_title_about_company_img ?>">
                        <?php endif; ?>
                    </div>
                    <div class="col-xs-12 col-md-6 text-justify">
                        <?php if($intro_title_about_company_desc): ?>
                        <?php echo $intro_title_about_company_desc ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="wrap-fieldwork">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if($intro_title_field_company): ?>
                            <div class="page-branch-title ">
                                <h3 class="title line-title small-title"><?php echo $intro_title_field_company ?></h3>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php if($intro_title_field_company_text): ?>
                        <div class="col-md-12 offset-lg-1 col-lg-10 marginbottom30">
                            <p><?php echo $intro_title_field_company_text ?></p>
                        </div>
                        <?php endif; ?>
                        <div class="clearfix">&nbsp;</div>


                        <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                            <img alt="Xây dựng dự án bđs" class="img-responsive inline-block" src="<?php echo $intro_field_block_1_img ?>">
                            <span><?php echo $intro_field_block_1_title ?></span>
                            <p><?php echo $intro_field_block_1_desc ?></p>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                            <img alt="<?php echo $intro_field_block_2_title ?>" class="img-responsive inline-block" src="<?php echo $intro_field_block_2_img ?>">
                            <span><?php echo $intro_field_block_2_title ?></span>
                            <p><?php echo $intro_field_block_2_desc ?></p>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                            <img alt="<?php echo $intro_field_block_3_title ?>" class="img-responsive inline-block" src="<?php echo $intro_field_block_3_img ?>">
                            <span><?php echo $intro_field_block_3_title ?></span>
                            <p><?php echo $intro_field_block_3_desc ?></p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                            <img alt="<?php echo $intro_field_block_4_title ?>" class="img-responsive inline-block" src="<?php echo $intro_field_block_4_img ?>">
                            <span><?php echo $intro_field_block_4_title ?></span>
                            <p><?php echo $intro_field_block_4_desc ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-value">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if($intro_value_title): ?>
                            <div class="page-branch-title">
                                <h3 class="title line-title small-title"><?php echo $intro_value_title ?></h3>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php if($intro_value_text): ?>
                        <div class="col-md-12 offset-lg-1 col-lg-10">
                            <p class="text-center"><?php echo $intro_value_text ?></p>
                        </div>
                        <?php endif; ?>
                        <div class="col-xs-12 col-md-4 text-center">
                            <div class="wrap-thumbnail">
                                <img alt="" class="img-responsive inline-block" src="<?php echo $intro_value_block_1_img ?>">
                                <span><?php echo $intro_value_block_1_title ?></span>
                            </div>
                            <p><?php echo $intro_value_block_1_desc ?></p>
                        </div>
                        <div class="col-xs-12 col-md-4 text-center">
                            <div class="wrap-thumbnail">
                                <img alt="" class="img-responsive inline-block" src="<?php echo $intro_value_block_2_img ?>">
                                <span><?php echo $intro_value_block_2_title ?></span>
                            </div>
                            <p><?php echo $intro_value_block_3_desc ?></p>
                        </div>
                        <div class="col-xs-12 col-md-4 text-center">
                            <div class="wrap-thumbnail">
                                <img alt="" class="img-responsive inline-block" src="<?php echo $intro_value_block_3_img ?>">
                                <span><?php echo $intro_value_block_3_title ?></span>
                            </div>
                            <p><?php echo $intro_value_block_3_desc ?></p>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="clearfix"></div></div>



    <div class="clearfix"></div>
</div>
<?php include 'footer.php' ?>
