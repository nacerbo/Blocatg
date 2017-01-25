                <article class="post-3 format-image">
                    <div class="title">
                        <a href="<?php the_permalink(); ?>">
                            <h1><?php the_title();?></h1>
                        </a>
                    </div>
                    <div class="thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'bc-slide' ); ?>
                        </a>
                    </div>
                    <p><?php echo get_the_excerpt(); ?></p>
                    <div class="read-more">
                        <a href="<?php the_permalink(); ?>"><?php echo __('Wanna read more !' ,'blocatg') ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </article>