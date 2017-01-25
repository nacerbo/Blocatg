<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div class="... content-block">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header class="container row">
            <div class="col-1 social-networks">
                <!--<div class="toggle-social">
                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                </div>
                <ul class="hidden-droplist">
                    <li class="single-network row">
                        <a href="#">
                            <dt class="col-1"><i class="fa fa-facebook" aria-hidden="true"></i></dt>
                            <dd class="col-11">Facebook</dd>
                        </a>
                    </li>
                    <li class="single-network row">
                        <a href="#">
                            <dt class="col-1"><i class="fa fa-facebook" aria-hidden="true"></i></dt>
                            <dd class="col-11">Facebook</dd>
                        </a>
                    </li>
                    <div class="clear"></div>
                </ul>-->
            </div>
            <div class="col-2 col-offset-4 logo">
                <a href="<?php bloginfo('url')?>">
                    <?php
                        if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();
                        }
                    ?>
                </a>
            </div>
            <div class="col-1 col-offset-4 search-bar">
                <div class="toggle-search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div>
                <form action="<?php echo get_bloginfo('url'); ?>" class="drop-search row">
                    <input type="text" class="col-12 search-inpu" name="s" placeholder="Search me!">
                </form>
            </div>
        </header>
        <nav class="container main-menu">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'primary-menu',
                    ) );
            ?>
        </nav>
        <div class="container row content-block">