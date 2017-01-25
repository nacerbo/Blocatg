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
        <div class="social-networks">
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
        </div>
    </section>
    <section class="col-8 content-loop col-offset-1">
        <?php if ( have_posts() ) : ?>
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'blocatg' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', 'blocatg' ); ?></h1>
		<?php endif; ?>
        <?php
            if ( have_posts() ) :

                /* Start the Loop */
                while ( have_posts() ) : the_post();

                    /*
                    * Include the Post-Format-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                    */
                    get_template_part( 'content/content', get_post_format() );

                endwhile;
                ?>
                    <div class="pagination row">
                        <div class="col-6 prev-posts"><span></span>
                            <?php 
                                if( get_previous_posts_link() ) :

                                    previous_posts_link( __('<i class="fa fa-arrow-left" aria-hidden="true"></i><span>Newer Posts</span>','blocatg') );

                                endif;
                            ?>
                        </div>
                        <div class="col-6 next-posts">
                            <?php 
                                if( get_next_posts_link() ) :

                                    next_posts_link( __('<span>Old Posts</span><i class="fa fa-arrow-right" aria-hidden="true"></i>','blocatg') );

                                endif;
                            ?>
                        </div>
                    </div>
                <?php

            else : ?>

			    <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'blocatg' ); ?></p>
			<?php
            endif;
            ?>
    </section>

<?php 
get_footer();