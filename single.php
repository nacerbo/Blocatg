<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
get_header(); ?>

    <section class="col-3 bio-sidebar">
        <div class="avatar">
            <a href="<?php bloginfo('url')?>">
            <?php
                if ( function_exists( 'the_custom_logo' ) ) {
                    the_custom_logo();
                }
            ?>
        </a>
        </div>
        <h2 class="bio-name">KittenCaso</h2>
        <div class="bio-text">
            <p><?php bloginfo('description'); ?></p>
        </div>
        <!--<div class="social-networks">
            <ul>
                <li>
                    <a href="#">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>-->
    </section>
    <section class="col-8 content-loop col-offset-1">
        <?php
            if ( have_posts() ) :

                /* Start the Loop */
                while ( have_posts() ) : the_post();
                    ?>
                        <article class="post-5 format-<?php echo get_post_format() ?>">

                    <?php
                    switch(get_post_format()){
                        case 'audio':
                        ?>
                            <a href="<?php the_permalink(); ?>"><h1><?php the_title();?></h1></a>
                            <div class="soundcloud-embed">
                                <?php echo (preg_replace( '/(width|height)=\"\d*\"\s/', "", rwmb_meta(MB_PREFIX.'oembed') ));?> 
                            </div>
                        <?php 
                            break;
                        case 'gallery':
                        ?>
                            <div class="title">
                                <a href="<?php the_permalink(); ?>">
                                    <h1><?php the_title();?></h1>
                                </a>
                            </div>
                            <div class="owl-carousel">
                                <?php
                                    $images = rwmb_meta( MB_PREFIX.'gallery_img', 'size=bc-slide' );
                                    if ( !empty( $images ) ) {
                                        foreach ( $images as $image ) {
                                            echo "<img src='{$image['url']}' alt='{$image['alt']}' />";
                                        }
                                    }
                                ?>
                            </div>
                        <?php
                            break;
                        case 'quote':
                        ?>
                            <header class="quote-header">
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                                <h3 class="quote-author"><?php echo __(' - By ','blocatg').rwmb_meta(MB_PREFIX.'quote_writer'); ?></h3>
                                <div class="clear"></div>
                            </header>
                            <p class="the-quote"><i class="fa fa-quote-right" aria-hidden="true"></i> <?php echo rwmb_meta(MB_PREFIX.'quote_content'); ?></p>
                        <?php
                            break;
                        default:
                        ?>
                            <a href="<?php the_permalink(); ?>"><h1><?php the_title();?></h1></a>
                            <?php if(has_post_thumbnail()):?>
                            <div class="thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                     <?php the_post_thumbnail( 'bc-slide' ); ?>
                                </a>
                            </div>
                            <?php endif; ?> 
                        <?php
                            break;
                    }
                    ?>
                    <div class="post-meta">
                        <div class="author-ava">
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), '60' ); ?></a>
                        </div>
                        <span class="author-name"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author() ?></a></span>
                        <ul>
                            <li><a href="<?php comments_link(); ?>"><i class="fa fa-comment" aria-hidden="true"></i> <?php comments_number( __("No Comments","blocatg"), get_comments_number().__(" Comment","blocatg"), get_comments_number().__(" Comments","blocatg"));?></a></li>
                            <!--<li><i class="fa fa-eye" aria-hidden="true"></i> 123456 Views</li>-->
                        </ul>
                    </div>
                    <div class="content">
                        <?php
                            the_content();
                        ?>
                    </div>
                    <?php 
                    // If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

                endwhile;
                ?>
                <?php

            else :

                get_template_part( 'content/content', 'none' );

            endif;
        ?>
                                </article>

    </section>

<?php 
get_footer();