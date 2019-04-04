
</div>

<?php global $tp_options; ?>
<footer>
    <div class="footer-coppyright">
        <div class="container">
            <div class="row">
                <div class="item item1 col-xs-12 col-sm-6 col-md-3" style="height: 83px;">
                    <?php if($tp_options['footer_address_contact_title']): ?>
                    <span><?php echo $tp_options['footer_address_contact_title'] ?></span>
                    <?php endif; ?>
                    <p><?php echo $tp_options['footer_address_contact_text'] ?></p>
                </div>
                <div class="item item2 col-xs-12 col-sm-6 col-md-3" style="height: 83px;">
                    <span><?php echo $tp_options['footer_phone_title'] ?></span>
                    <?php echo $tp_options['footer_phone_text'] ?>
                </div>
                <div class="item item3 col-xs-12 col-sm-6 col-md-3" style="height: 83px;">
                    <span><?php echo $tp_options['footer_email_title'] ?></span>
                    <p><a href="mailto:<?php echo $tp_options['footer_email_text'] ?>"><?php echo $tp_options['footer_email_text'] ?></a></p>

                </div>
                <div class="item item4 letter col-xs-12 col-sm-6 col-md-3" style="height: 83px;">
                    <span>Đăng ký nhận tin</span>

                    <div class="send-letter">
                        <?php echo do_shortcode('[contact-form-7 id="371" title="Đăng Kí Nhận Tin"]'); ?>
                        <div class="clearfix"></div>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="col-md-12 last">
                    <ul class="ls-social">
                        <?php if($tp_options['social_facebook']): ?>
                        <li><a class="bt-facebook" href="<?php echo $tp_options['social_facebook'] ?>" target="_blank">Facebook</a></li>
                        <?php endif; ?>
                        <?php if($tp_options['social_youtube']): ?>
                        <li><a class="bt-youtube" href="<?php echo $tp_options['social_youtube'] ?>" target="_blank">Youtube</a></li>
                        <?php endif; ?>
                    </ul>
                    <div class="clearfix"></div>
                    <?php if($tp_options['copyright']): ?>
                    <div class="info"><?php echo $tp_options['copyright'] ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="top"></div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<?php wp_footer(); ?>
</body>
</html>
