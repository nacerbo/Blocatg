                <article class="post-2 format-gallery">
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
                    <p><?php echo get_the_excerpt(); ?></p>
                    <div class="read-more">
                        <a href="<?php the_permalink(); ?>"><?php echo __('Wanna read more !' ,'blocatg') ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </article>