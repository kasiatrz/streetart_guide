<?php get_header(); ?>
    
    <main id="error">
        <div class="text">
            <h1>Oops!</h1>
            <h2>We can't seem to find the
                page you're looking for.</h2>
            
            <p>error code: 404</p>
            <p>Maybe try to use our main navigation. 
            Enjoy your street art exploring! </p>
        </div>
        
        <!-- sad image -->
        <img  src="<?php bloginfo('template_directory'); ?>/assets/404_error.svg" alt="">
        
    </main>
  
    <?php get_footer(); ?>