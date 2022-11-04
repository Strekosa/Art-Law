<?php
/**
 * Template Name: Login
 */
get_header(); ?>


    <script>
        $(document).ready(function(){
            jQuery("#user_login").attr("placeholder", "Please enter your name or email");
            jQuery("#user_pass").attr("placeholder", "Please enter your password");
            jQuery(".login-remember label").append('<span>');
        });
    </script>

    <main id="primary" class="site-main">
        <div class="login wrapper">
            <div class="login-main container-boxed  flex ">

                <?php if (has_post_thumbnail()): ?>
                    <div class="login-img">
                        <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                    </div>
                <?php endif; ?>

                <div class="login-form">
                    <div class="login-form-wrap flex column">
                        <h2 class="general">Login</h2>
                        <p class="subtitle">Don’t have an account yet? <a href="#">Become a member</a></p>
                        <?php wp_login_form($args); ?>
                        <a href="#" class="lost-password">Lost Password?</a>
                    </div>
                </div>

            </div>
        </div>
    </main>
<?php
get_footer();