    //filter
    $(document).ready(function(){
        $("#filter").click(function(){
            $(".filter_toggle").slideToggle(400);
        });
    });

//only for width max 1100px
    //artist
     $(document).ready(function(){
        $(".filter_artist h2").click(function(){
            $(".filter_artist ul li").slideToggle(400);
        });
    });

    //borough
     $(document).ready(function(){
        $(".filter_borough h2").click(function(){
            $(".filter_borough ul li").slideToggle(400);
        });
    });

    //London and Lodz
     $(document).ready(function(){
        $(".filter_borough h2").click(function(){
            $(".filter_borough h3").slideToggle(400);
        });
    });

    //city
     $(document).ready(function(){
        $(".filter_city h2").click(function(){
            $(".filter_city ul li").slideToggle(400);
        });
    });


 