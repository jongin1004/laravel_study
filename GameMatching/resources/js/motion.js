setInterval("scroll()",0);
function scroll(){

   if( $(window).scrollTop()>1000 ){
      $("#container>p").fadeIn(200);
     }else{ $("#container>p").fadeOut(200); }
};




$(function(){ 

   $("dd").hide();
   $(".example1 dt").click(function(){
      $(this).next().slideDown(200); 
   });
   
   $(".example2 dt").click(function(){
      
      if($(this).next().css("display") == "none"){
         $(this).next().slideDown(200);
         $(this).css({background:"url(images/close_img.png) no-repeat 750px center #020532"})
      }else{
         $(this).next().slideUp(200);
         $(this).css({background:"url(images/open_img.png) no-repeat 750px center #020532"})
      }
      
   });
   
   
   //--------------top_btn효과--------------
   
   $("#container>p").hide();
   $("#container>p").click(function(){
      $("html,body").animate({ scrollTop:0});
   });

});