//加载顶部图标动画
window.onload = function(){
    $("#loading").stop().animate({'top':'-141px','left':'-145px'},800)

  }

//导航Jquery
$("#menu").ready(function(){
$("#menu li>a").hover(function(){
  var li_height = $(".menu>li").height();
  var li_width = $(".menu>li").width();

$(".menu>li").hover(function(){
  var link_width = $(".menu>li>a").width();
},

function(){
 $(this).find("span").remove();
 $(this).removeAttr("style");
})
  $(this).animate({'top':'30px','font-size':'18px'});
},

function(){
  $(this).animate({'font-size':'16px'},800);
});
$("#menu .menu li ").mouseover(function() {
      $(this).find("ul").hasClass("sub-menu")
      $(this).find(".sub-menu").stop().fadeIn(500);
})

        $(this).mouseout(function(){
          $(this).find("ul").hasClass("sub-menu")
        $(this).find(".sub-menu").stop().fadeOut(300);
        
        })
          
          $(this).mousemove(function() {
            $(this).find("ul").hasClass("sub-menu");
            $(this).stop().css({'display':'none'});
          })
      
    });

// 顶部微信/新浪/RSS/<显示/隐藏>
$(document).ready(function(){
  var hoverTimer;
  var shhli = $("#shh").find('li').width()+5;
  $(".shehuihua li").each(function(){
  $(this).hover(function(){
      clearTimeout(hoverTimer);
shehui=$(this).attr("shuihua");
  $("#inputbox").fadeIn(800).animate({'top':'10px','left': shhli + "px"},300);
            $("#shehuihuad").html(""+shehui+"");
    },
    function(){
      hoverTimer = setTimeout(function(){
      $("#inputbox").fadeOut(1000).removeAttr("style");
      
      },200);
  })
   }) 
  $("#inputbox").hover(function(){
  clearTimeout(hoverTimer);
  },function(){
    $()
  $("#inputbox").fadeOut(1000);
  })   
  });
//图标 THE END