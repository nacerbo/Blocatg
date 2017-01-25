                <article class="post-1 format-standard">
                    <a href="<?php the_permalink(); ?>"><h1><?php the_title();?></h1></a>
                    <p><?php echo get_the_excerpt(); ?></p>
                    <div class="read-more">
                        <a href="<?php the_permalink(); ?>"><?php echo __('Wanna read more !' ,'blocatg') ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </article>
