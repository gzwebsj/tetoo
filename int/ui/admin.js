// 滚动状态
jQuery(document).ready(function () {
	jQuery(window).scroll(function(){
		var top = jQuery(window).scrollTop()+0;
		var tb = jQuery("div.wrcn").height();
		jQuery("#page").css({top:top + "px"});
		if(jQuery(this).scrollTop() <tb){
			jQuery("div.logo").css({"top":"52px"});
		}
	});
});

// 建站时间input
jQuery(document).ready(function(){
	layui.use('laydate', function(){
  var laydate = layui.laydate;
  var ss = jQuery(".layui-laydate-input").attr("id");
  laydate({
    elem:'#' + ss
  });
  });
});
	jQuery(document).ready(function(){
		var upload_frame;
		var value_id;
		jQuery('.upload').live('click',function(event){
				value_id =jQuery( this ).attr('id');
				(value_id)
				event.preventDefault();
				if( upload_frame ){
					upload_frame.open();
					return;
				}
				upload_frame = wp.media({
					title: '设置图片',
					button: {
						text: '设置图片',
					},
					multiple: false
				});
				upload_frame.on('select',function(){
					attachment = upload_frame.state().get('selection').first().toJSON();
					jQuery('input[name='+value_id+']').val(attachment.url); //返回数据
				});
				upload_frame.open();
		});

	});


//购买信息
jQuery(document).ready(function() {
	jQuery(window).load(function() {
		jQuery("#jianjie").fadeIn().animate({'left':'243px','top':'-53px'},300);
	});
    jQuery("#tb").click(function() {
    	jQuery("#jianjie").fadeOut();
    });
});

// //tab选卡
// jQuery(document).ready(function()){

// }