<?php  

if(post_password_required()){
    return;
}

?>

<div id="comments" class="comments-area">
    
   <?php if (have_comments()): 
    //have_comments
    ?>
    <div class="comments-list"> 
    
    <?php 
     $args = array(
         'max_depth' => '',
         'style' => 'div',
         'callback' => 'format_comment',
         'type' => 'all',
         'reply_text' => '',
         'avatar_size' => 0,
         'format'=>'html5',
         'short_ping'=> false,
        'echo'=> true
     ); 
        
        
    wp_list_comments($args); 
    ?> 
    <!-- pagination previous and next -->
    <?php previous_comments_link('<< previous'); ?>
    <?php next_comments_link('next >>'); ?>
 
    </div>             
   
   
    
    
    
    
    
    
    <?php if (!comments_open() && get_comments_number()):
    ?>
    
    <p class="no-comments"><?php esc_html_e('Comments are closed.','streetart') ?></p>
    
    <?php endif; ?>
    <?php endif; ?>
    
    
    <?php comment_form(array(
    'title_reply' => 'Add your comment',
    'id_form' => 'commentform'

)); ?>
    

 
     
</div><!-- comments area -->


<!-- RED BORDER FOR COMMENT FORM  -->
<!-- script - I cant enqueue it in functions.php  -->
<script>
jQuery( ".form-submit" ).click(function(event) {
    if( !jQuery("input[name='author']").val() ) {
          event.preventDefault();
          jQuery("#author").css({"border-color": "red", "border-style": "solid", "border-width": "2px"});
    }
});
jQuery( ".form-submit" ).click(function(event) {
    if( !jQuery("textarea[name='comment']").val() ) {
          event.preventDefault();
          jQuery("#comment").css({"border-color": "red", "border-style": "solid", "border-width": "2px"});
    }
});
</script>