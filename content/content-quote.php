                <article class="post-4 format-quote">
                    <header class="quote-header">
                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                        <h3 class="quote-author"><?php echo __(' - By ','blocatg').rwmb_meta(MB_PREFIX.'quote_writer'); ?></h3>
                        <div class="clear"></div>
                    </header>
                    <p class="the-quote"><i class="fa fa-quote-right" aria-hidden="true"></i> <?php echo rwmb_meta(MB_PREFIX.'quote_content'); ?></p>
                     <div class="content">
                         <p><?php echo get_the_excerpt(); ?></p>
                     </div>
                    <div class="read-more">
                        <a href="<?php the_permalink(); ?>"><?php echo __('Wanna read more !' ,'blocatg') ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </article>