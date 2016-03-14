/** layui-v0.0.2 跨设备模块化前端框架@LGPL http://www.layui.com/ By 贤心 */
;!function(){var e=layui.jquery;layui.addcss("pc/layer/layer.ext.css",function(){layer.layui_layer_layerextjs=!0},"skinlayerextcss");var a=layer.cache||{},i=function(e){return a.skin?" "+a.skin+" "+a.skin+"-"+e:""};layer.prompt=function(a,n){a=a||{},"function"==typeof a&&(n=a);var t,l=2==a.formType?'<textarea class="layui-layer-input">'+(a.value||"")+"</textarea>":function(){return'<input type="'+(1==a.formType?"password":"text")+'" class="layui-layer-input" value="'+(a.value||"")+'">'}();return layer.open(e.extend({btn:["&#x786E;&#x5B9A;","&#x53D6;&#x6D88;"],content:l,skin:"layui-layer-prompt"+i("prompt"),success:function(e){t=e.find(".layui-layer-input"),t.focus()},yes:function(e){var i=t.val();""===i?t.focus():i.length>(a.maxlength||500)?layer.tips("&#x6700;&#x591A;&#x8F93;&#x5165;"+(a.maxlength||500)+"&#x4E2A;&#x5B57;&#x6570;",t,{tips:1}):n&&n(i,e,t)}},a))},layer.tab=function(a){a=a||{};var n=a.tab||{};return layer.open(e.extend({type:1,skin:"layui-layer-tab"+i("tab"),title:function(){var e=n.length,a=1,i="";if(e>0)for(i='<span class="layui-layer-tabnow">'+n[0].title+"</span>";e>a;a++)i+="<span>"+n[a].title+"</span>";return i}(),content:'<ul class="layui-layer-tabmain">'+function(){var e=n.length,a=1,i="";if(e>0)for(i='<li class="layui-layer-tabli xubox_tab_layer">'+(n[0].content||"no content")+"</li>";e>a;a++)i+='<li class="layui-layer-tabli">'+(n[a].content||"no  content")+"</li>";return i}()+"</ul>",success:function(a){var i=a.find(".layui-layer-title").children(),n=a.find(".layui-layer-tabmain").children();i.on("mousedown",function(a){a.stopPropagation?a.stopPropagation():a.cancelBubble=!0;var i=e(this),t=i.index();i.addClass("layui-layer-tabnow").siblings().removeClass("layui-layer-tabnow"),n.eq(t).show().siblings().hide()})}},a))},layer.photos=function(a,n,t){function l(e,a,i){var n=new Image;n.onload=function(){n.onload=null,a(n)},n.onerror=function(e){n.onerror=null,i(e)},n.src=e}var r={};if(a=a||{},a.photos){var o=a.photos.constructor===Object,s=o?a.photos:{},u=s.data||[],y=s.start||0;if(r.imgIndex=y+1,o){if(0===u.length)return void layer.msg("&#x6CA1;&#x6709;&#x56FE;&#x7247;")}else{var c=e(a.photos),p=c.find(a.img||"img");if(0===p.length)return;if(n||p.each(function(i){var n=e(this);u.push({alt:n.attr("alt"),pid:n.attr("layer-pid"),src:n.attr("layer-src")||n.attr("src"),thumb:n.attr("src")}),n.on("click",function(){layer.photos(e.extend(a,{photos:{start:i,data:u,tab:a.tab},full:a.full}),!0)})}),!n)return}r.imgprev=function(e){r.imgIndex--,r.imgIndex<1&&(r.imgIndex=u.length),r.tabimg(e)},r.imgnext=function(e,a){r.imgIndex++,r.imgIndex>u.length&&(r.imgIndex=1,a)||r.tabimg(e)},r.keyup=function(e){if(!r.end){var a=e.keyCode;e.preventDefault(),37===a?r.imgprev(!0):39===a?r.imgnext(!0):27===a&&layer.close(r.index)}},r.tabimg=function(e){u.length<=1||(s.start=r.imgIndex-1,layer.close(r.index),layer.photos(a,!0,e))},r.event=function(){r.bigimg.hover(function(){r.imgsee.show()},function(){r.imgsee.hide()}),r.bigimg.find(".layui-layer-imgprev").on("click",function(e){e.preventDefault(),r.imgprev()}),r.bigimg.find(".layui-layer-imgnext").on("click",function(e){e.preventDefault(),r.imgnext()}),e(document).on("keyup",r.keyup)},r.loadi=layer.load(1,{shade:"shade"in a?!1:.9,scrollbar:!1}),l(u[y].src,function(n){layer.close(r.loadi),r.index=layer.open(e.extend({type:1,area:function(){var i=[n.width,n.height],t=[e(window).width()-100,e(window).height()-100];return!a.full&&i[0]>t[0]&&(i[0]=t[0],i[1]=i[0]*t[1]/i[0]),[i[0]+"px",i[1]+"px"]}(),title:!1,shade:.9,shadeClose:!0,closeBtn:!1,move:".layui-layer-phimg img",moveType:1,scrollbar:!1,moveOut:!0,shift:5*Math.random()|0,skin:"layui-layer-photos"+i("photos"),content:'<div class="layui-layer-phimg"><img src="'+u[y].src+'" alt="'+(u[y].alt||"")+'" layer-pid="'+u[y].pid+'"><div class="layui-layer-imgsee">'+(u.length>1?'<span class="layui-layer-imguide"><a href="javascript:;" class="layui-layer-iconext layui-layer-imgprev"></a><a href="javascript:;" class="layui-layer-iconext layui-layer-imgnext"></a></span>':"")+'<div class="layui-layer-imgbar" style="display:'+(t?"block":"")+'"><span class="layui-layer-imgtit"><a href="javascript:;">'+(u[y].alt||"")+"</a><em>"+r.imgIndex+"/"+u.length+"</em></span></div></div></div>",success:function(e,i){r.bigimg=e.find(".layui-layer-phimg"),r.imgsee=e.find(".layui-layer-imguide,.layui-layer-imgbar"),r.event(e),a.tab&&a.tab(u[y],e)},end:function(){r.end=!0,e(document).off("keyup",r.keyup)}},a))},function(){layer.close(r.loadi),layer.msg("&#x5F53;&#x524D;&#x56FE;&#x7247;&#x5730;&#x5740;&#x5F02;&#x5E38;<br>&#x662F;&#x5426;&#x7EE7;&#x7EED;&#x67E5;&#x770B;&#x4E0B;&#x4E00;&#x5F20;&#xFF1F;",{time:3e4,btn:["下一张","不看了"],yes:function(){u.length>1&&r.imgnext(!0,!0)}})})}}}();