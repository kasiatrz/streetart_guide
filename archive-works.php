<?php get_header(); ?>
    
<main id="works">
         <!-- WORKS -->        
    <h2 class="works_head"><a href="<?php echo get_post_type_archive_link( 'works' ); ?>">Works</a> <span id="filter">filter</span></h2>
        <!-- filter list toggle -->
            <div class="filter_toggle">
                
                <!-- taxonomy filter PLUGIN -->
           
                 <?php echo do_shortcode( ' [searchandfilter id="130"]' ); ?>
                
          
                
                
                
                
                
                
                
                
             
            </div>
       <!--END filter_toggle -->
  
    
     <div class="works">
            
            <!-- start the loop -->
            <?php if(have_posts()):?>
            <?php while  (have_posts()):the_post(); ?>
             <!-- work-->
            <div>
                <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
                    <div>
                        <h2><?php the_title(); ?></h2>
                        <h3><?php echo ct_get_child_terms( $post->ID, 'cities', array( 'fields' => 'all' ) ); ?></h3>
                    </div>
                </a>
            </div>
            
         <?php endwhile; ?>
                <?php else:  ?>
                <h2>No posts to display</h2>
        <?php endif; ?>
        <!-- finish the loop -->      
        </div>
        <!-- END NEW WORKS -->

        <!-- pagination -->
        <div class="pagination">
            <?php generatePagination(get_query_var('paged'));?>
        </div>
        <!-- END pagination -->
    </main>  
  
<?php get_footer(); ?>