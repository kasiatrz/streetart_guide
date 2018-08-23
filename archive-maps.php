<?php get_header(); ?>
    
<main id="maps">
        <!--ARTISTS -->
        <h2 class="artists_head">Maps</h2>
        <div class="artists">  
            
        <!-- start the loop -->
        <?php if(have_posts()):?>
            <?php while  (have_posts()):the_post(); ?>
            <!-- artist -->
                <div>
                    <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                    <div>
                        <h2><?php the_title(); ?></h2>
                    </div>
                    </a>
                </div>
            <!-- END artist -->
            
            <?php endwhile; ?>
            <?php else:  ?>
            <h2>No posts to display</h2>
        <?php endif; ?>
        <!-- finish the loop -->  
        </div>
        <!-- END ARTISTS -->
    
        <!-- pagination -->
        <div class="pagination">
            <?php generatePagination(get_query_var('paged'));?>
        </div>
        <!-- END pagination -->
</main>    
  
<?php get_footer(); ?>