<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Example
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#83303A">
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

    <!-- NOSCRIPT -->
    <noscript>
        Your Browser Does Not Support JavaScript. Please Update Your Browser and reload page. Have a nice day!
    </noscript>
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

    <header id="masthead" class="site-header wrapper flex column">
        <div class="header-main">
            <div class="flex container-boxed justify-between  md-align-end wrap">
                <!-- .site-branding -->
                <div class="site-branding flex align-center">
                    <?php the_custom_logo(); ?>
                </div>

                <div class="flex align-end medium-aligne-center">
                    <button class="nav-tgl show-medium-down" type="button" aria-label="toggle menu">
                        <!-- Three dividers in the hamburger button--><span aria-hidden="true"></span>
                    </button>
                    <nav class="header-menu">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'menu_class' => 'menu flex',

                        )); ?>
                    </nav>
                    <div class="header-search flex">
                        <div class="user pos-rel">
                            <button class="user-toggle flex align-center justify-center">

                                <svg class="login-open" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M12 3C9.51472 3 7.5 5.01472 7.5 7.5C7.5 9.98528 9.51472 12 12 12C14.4853 12 16.5 9.98528 16.5 7.5C16.5 5.01472 14.4853 3 12 3ZM5.5 7.5C5.5 3.91015 8.41015 1 12 1C15.5899 1 18.5 3.91015 18.5 7.5C18.5 11.0899 15.5899 14 12 14C8.41015 14 5.5 11.0899 5.5 7.5Z"
                                          fill="#83303A"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M12 14C7.635 14 4.0913 16.7424 3.21318 20.2615C3.16875 20.4395 3.21323 20.5945 3.34054 20.732C3.4799 20.8824 3.71721 21 3.99998 21H20C20.2828 21 20.5201 20.8824 20.6594 20.732C20.7867 20.5945 20.8312 20.4395 20.7868 20.2615C19.9087 16.7424 16.365 14 12 14ZM1.27268 19.7772C2.39966 15.2609 6.83149 12 12 12C17.1685 12 21.6003 15.2609 22.7273 19.7772C23.1948 21.6507 21.567 23 20 23H3.99998C2.43292 23 0.805185 21.6507 1.27268 19.7772Z"
                                          fill="#83303A"/>
                                </svg>

                                <svg class="login-close" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M12 3C9.51472 3 7.5 5.01472 7.5 7.5C7.5 9.98528 9.51472 12 12 12C14.4853 12 16.5 9.98528 16.5 7.5C16.5 5.01472 14.4853 3 12 3ZM5.5 7.5C5.5 3.91015 8.41015 1 12 1C15.5899 1 18.5 3.91015 18.5 7.5C18.5 11.0899 15.5899 14 12 14C8.41015 14 5.5 11.0899 5.5 7.5Z"
                                          fill="white"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M12 14C7.635 14 4.0913 16.7424 3.21318 20.2615C3.16875 20.4395 3.21323 20.5945 3.34054 20.732C3.4799 20.8824 3.71721 21 3.99998 21H20C20.2828 21 20.5201 20.8824 20.6594 20.732C20.7867 20.5945 20.8312 20.4395 20.7868 20.2615C19.9087 16.7424 16.365 14 12 14ZM1.27268 19.7772C2.39966 15.2609 6.83149 12 12 12C17.1685 12 21.6003 15.2609 22.7273 19.7772C23.1948 21.6507 21.567 23 20 23H3.99998C2.43292 23 0.805185 21.6507 1.27268 19.7772Z"
                                          fill="white"/>
                                </svg>

                            </button>

                            <form method="get" class="user-form flex column" action="">
                                <a href="https://itlawstaging.altumagency.com/login/">Login</a>
                                <a href="">Become a Member</a>
                            </form>
                        </div>
                        <div class="search pos-rel">
                            <button class="search-toggle flex align-center justify-center ">

                                <svg class="search-open" width="21" height="22" viewBox="0 0 21 22" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M15.2727 8.8C15.2727 12.2715 12.4236 15.0857 8.90909 15.0857C5.39455 15.0857 2.54545 12.2715 2.54545 8.8C2.54545 5.3285 5.39455 2.51429 8.90909 2.51429C12.4236 2.51429 15.2727 5.3285 15.2727 8.8ZM13.4833 16.3531C12.1462 17.1449 10.5815 17.6 8.90909 17.6C3.98874 17.6 0 13.6601 0 8.8C0 3.93989 3.98874 0 8.90909 0C13.8294 0 17.8182 3.93989 17.8182 8.8C17.8182 11.0976 16.9268 13.1895 15.4669 14.7567L20.6272 19.8539C21.1243 20.3449 21.1243 21.1409 20.6272 21.6318C20.1302 22.1227 19.3243 22.1227 18.8273 21.6318L13.4833 16.3531Z"
                                          fill="#83303A"/>
                                </svg>
                                <svg class="search-close" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.29167 2L16 16M16 2L2 16" stroke="white" stroke-width="2.1"
                                          stroke-linecap="round"/>
                                </svg>
                            </button>
                            <?php echo get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
