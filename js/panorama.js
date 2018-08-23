var start = 1;

function set_time(){
     //this method will apply time interval for 1 second.
    setInterval('image_show();',1000); 
}
//getting url directory
var url = window.location.href; 

function image_show(){
    var img_data;
    if(start==1){
        img_data= "wp-content/themes/streetart/assets/02.svg";
    } else if (start==2){
        img_data="wp-content/themes/streetart/assets/02.svg";
    } else if (start==3){
        img_data="wp-content/themes/streetart/assets/03.svg";
    } else if (start==4){
        img_data="wp-content/themes/streetart/assets/04.svg";
    } else if (start==5){
        img_data="wp-content/themes/streetart/assets/05.svg";
    } else {
        start=1;
        img_data="wp-content/themes/streetart/assets/01.svg";
        
    }
    
document.getElementById('img_change').src=url+img_data;
start++;
}

