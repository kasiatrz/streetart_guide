<?php get_header(); ?>
    
    <main>
        <!-- main heading -->
        <div class="heading">
            <h1>streetart.guide<br/>
            <span>art is everywhere...</span></h1>
        </div>
        <!-- city panorama_sprite -->
        <img class="panorama" id="img_change" src="<?php bloginfo('template_directory'); ?>/assets/01.svg" alt="">
        <!-- ABOUT US -->
        <div class="about">
            <div class="text">
                <h2>About us</h2>
                <p>Hello,<br/>
                We are Street Art Guide. We want you to the see street art as we do.
                Museums and galleries are not the only places
                where you can find art...
                <br/><br/>
                Just go outside and look around!
                <br/><br/><br/><br/>
                <!-- send us your photo_text -->
                We would be also incredabily happy if you share your
                street art experience with  us. Do you have your favourite
                artists? Or mayby you have some amazing pics?
                <br/><br/>
                Don’t hesitate anymore and contact us!
                </p>
                <!-- send us your photo_button -->
                <a href="<?php echo get_permalink( get_page_by_path( 'upload-image' )); ?>">
                <button type="button" >send us your photo</button>
                </a>
            </div>
            <img src="<?php bloginfo('template_directory'); ?>/assets/homepage_stik.svg" alt="stik_img">
        </div>
        <!-- END ABOUT US -->
        
        <!-- NEW WORKS -->        
        <h2 class="works_head">New works</h2>
        <p><a href="<?php echo get_post_type_archive_link( 'works' ); ?>">view all &gt;&gt;</a></p>
        <div class="works">
            <!-- work -->
            <?php 
            $query_works = new WP_Query( array( 
                'post_type' => 'works',
                'posts_per_page' => 3
            
            ) );                  
            while ( $query_works->have_posts() ) : $query_works->the_post();?> 
                <div>
                    <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                        <div>
                            <h2><?php the_title(); ?></h2>
                            <h3>
                            <?php echo ct_get_child_terms( $post->ID, 'cities', array( 'fields' => 'all' ) ); ?>
                            </h3>
                        </div>
                    </a>
                </div>
           <?php endwhile; wp_reset_postdata(); ?> 
        </div>
        <!-- END NEW WORKS -->
   
        <!--NEW ARTISTS -->
        <div class="artists_back">
         <h2 class="artists_head">New artists</h2>
            <p>
                <a href="<?php echo get_post_type_archive_link( 'artists' ); ?>">view all &gt;&gt;</a>
            </p>
            <div class="artists"> 
            <!-- we enter artists loop -->

                <?php 
                $query = new WP_Query( array( 
                    'post_type' => 'artists',
                    'posts_per_page' => 3

                ) );                  

                 while ( $query->have_posts() ) : $query->the_post(); ?>  
                    <!-- artist -->
                    <div>
                        <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                            <div>
                                <h2><?php the_title(); ?></h2>
                            </div>
                        </a>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
        <!-- END ARTISTS -->
       
        
    </main>
  
    <?php get_footer(); ?>