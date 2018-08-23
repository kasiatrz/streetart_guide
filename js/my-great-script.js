jQuery( ".form-submit" ).click(function(event) {
    if( !jQuery("input[name='author']").val() ) {
          event.preventDefault();
          jQuery("#author").css({"border-color": "red", "border-style": "solid", "border-width": "2px"});
    }
});

  