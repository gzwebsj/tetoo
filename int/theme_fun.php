<?php
/*定义全局常量*/
define("key",'theme_Lenmo_');

/*添加自定义菜单*/
add_action('admin_menu','theme_display_menu');

/*菜单项目*/
function theme_display_menu(){
	add_menu_page('冷漠主题设置','冷漠主题设置','edit_themes','theme_options','theme_ad_page','',50,'get_theme_set');
}

/*全局的请求函数*/
function theme_set(){
	register_setting('admin_user','theme_options');
}

/*加载后台样式表*/
function admin_style(){
	wp_enqueue_style('theme_style',get_template_directory_uri().'/int/ui/admin.css');
	wp_enqueue_style('theme_style_db',get_template_directory_uri().'/int/ui/layui.css');
}
	add_action('admin_init','admin_style');

/*加载后台JavaScript*/
function admin_script(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('theme_script',get_template_directory_uri().'/int/ui/admin.js');
	wp_enqueue_script('theme_script_db',get_template_directory_uri().'/int/ui/layui.js');
}
	add_action('admin_init','admin_script');

/*后台全局加载*/
function theme_options(){
	$options = array(

	/*选卡按钮加载*/
		array('id'=> key.'Common','name' => '常规设置', 'title' => '主题的常规设置', 'attr' => 'on','type' => 'but', 'num' => '1','set' => 'on'),  //选卡按钮

		array('id'=> key.'Index','name' => '首页设置', 'title' => '主题首页综合设置', 'attr' => 'off','type' => 'but', 'num' => '3'),  //选卡按钮

		array('id'=> key.'Notice','name' => '公告设置', 'title' => '主题公告内容设置', 'attr' => 'off','type' => 'but', 'num' => '4'),  //选卡按钮

		array('id'=> key.'Adver','name' => '广告设置', 'title' => '主题广告位内容设置', 'attr' => 'off','type' => 'but', 'num' => '5'),  //选卡按钮

	/*选卡代码加载结束*/

	/*主体内容加载*/
		array('id'=> key .'Logo','name' => '网站标志：','title' => '点击上传标志文件，或者填入标志文件路劲。','type' => 'upload','num' => '1','class'=>'theme_Lenmo_Common'),

		array('id'=> key .'favicon','name' => 'favicon小图标：','title' => '点击上传网站小图标（浏览器选卡中显示）','type' => 'upload','num' => '2','class'=>'theme_Lenmo_Common'),

		array('id' => key .'logoset','name' => '标志设置:','title' => '设置标志文件显示与隐藏','type' => 'cheackbox','num' => '3','display' => 'yes','class'=>'theme_Lenmo_Common'),
		
		array('id' => key .'jztime','name' => '建站时间:','title' => '选择网站的建立时间（显示在主题页面上）','type' => 'time','num' => '4','display' => 'yes','class'=>'theme_Lenmo_Common'),

		array('id' => key .'wzgg','name' => '网站公告：','title' => '填写需要显示的网站公告内容（不限制字符大小）','type' => 'text','num' => '5','class'=>'theme_Lenmo_Common'),

		array('id' => key .'wzggset','name' => '网站公告设置：','title' => '设置公告显示与隐藏功能','type' => 'cheackbox','num' => '6','display' => 'yes','class'=>'theme_Lenmo_Common'),

		array('id' => key .'description','name' => '网站描述:','title' => '填写网站基本描述内容（推荐80字符内容）','type' => 'textarea','num' => '7','class'=>'theme_Lenmo_Common'),

		array('id' => key .'keywords','name' => '网站关键字:','title' => '填写网站搜索关键字内容（推荐200字符内容，影响搜索引擎收录。）','type' => 'text','num' => '8','class'=>'theme_Lenmo_Common'),

		array('id' => key .'wzxsts','name' => '网站加速功能：','title' => '去除Google字体，将Wordpress自动加速。','type' => 'cheackbox','num' => '9','display' => 'yes','class'=>'theme_Lenmo_Common'),

		array('id' => key .'jquery','name' => '开启本地jquery：','title' => '选择是否开始本地jquery','type' => 'cheackbox','num' => '10','display' => '显示','hidden' =>'隐藏','display' => 'yes','class'=>'theme_Lenmo_Common'),

		array('id' => key .'touxiang','name' => '评论头像缓存：','title' => '缓存头像有利于头像加载和防备Gravatar头像','type' => 'cheackbox','num' => '11','display' => 'yes','class'=>'theme_Lenmo_Common'),

		array('id' => key .'liul','name' => '流量统计代码：','title' => '统计网站流量，推荐使用百度统计，国内比较优秀且速度快；还可使用Google统计、CNZZ等（这里推荐百度统计）','type' => 'textarea','num' => '12','class'=>'theme_Lenmo_Common'),

		array('id' => key .'footcode','name' => '底部公共代码：','title' => ' 同上，但是在全站页面底部出现','type' => 'textarea','num' => '13','class'=>'theme_Lenmo_Common'),

		array('id' => key .'buju','name' => '首页版式布局：','title' => ' 设置首页版式布局（双栏显示或单栏显示）','type' => 'cheackbox','num' => '1','class'=>'theme_Lenmo_Index'),

		array('id' => key .'silder','name' => '幻灯片设置：','title' => ' 幻灯片开启与关闭','type' => 'cheackbox','num' => '2','class'=>'theme_Lenmo_Index'),

		array('id' => key .'shehuihua','name' => '社会化开启与关闭：','title' => '社会化图标显示与隐藏设置','type' => 'cheackbox','num' => '3','class'=>'theme_Lenmo_Index'),

		array('id' => key .'qqck','name' => '腾讯图标设置：','title' => '社会化图标显示与隐藏设置','type' => 'cheackbox','num' => '4','class'=>'theme_Lenmo_Index'),

		array('id' => key .'qqup','name' => '腾讯图标上传：','title' => '腾讯图标图片显示与隐藏','type' => 'upload','num' => '5','class'=>'theme_Lenmo_Index'),

		array('id' => key .'qqlj','name' => '腾讯链接地址：','title' => '腾讯图标链接的url地址','type' => 'text','num' => '6','class'=>'theme_Lenmo_Index'),

		array('id' => key .'sinack','name' => '新浪图标设置：','title' => '腾讯图标图片上传','type' => 'cheackbox','num' => '7','class'=>'theme_Lenmo_Index'),

		array('id' => key .'sinaup','name' => '新浪图标上传：','title' => '新浪图标图片显示与隐藏','type' => 'upload','num' => '8','class'=>'theme_Lenmo_Index'),

		array('id' => key .'sinalj','name' => '新浪链接地址：','title' => '新浪图标链接的url地址','type' => 'text','num' => '9','class'=>'theme_Lenmo_Index'),

		array('id' => key .'weixin','name' => '微信图标设置：','title' => '微信图标图片显示与隐藏','type' => 'cheackbox','num' => '10','class'=>'theme_Lenmo_Index'),

		array('id' => key .'weixinup','name' => '微信图标上传：','title' => '微信图标图片显示与隐藏','type' => 'upload','num' => '11','class'=>'theme_Lenmo_Index'),

		array('id' => key .'weixinlj','name' => '微信链接地址：','title' => '微信图标链接的url地址','type' => 'text','num' => '12','class'=>'theme_Lenmo_Index'),

		array('id' => key .'sinack','name' => '新浪图标设置：','title' => '腾讯图标图片上传','type' => 'cheackbox','num' => '7','class'=>'theme_Lenmo_Index'),

	/*主体内容加载结束*/
	);
			/*循环排序控制*/
        	usort($options, function ($arr, $arrb) {
            return $arr['num'] - $arrb['num'];
        });

        /* 更新 | 重置 */
        foreach($options as $option){
            $key = $option['id'];
            $value = $_REQUEST[$key];
            if('save' == isset($_REQUEST['save'])){
                update_option($key,$value);
            }elseif('reset' == isset($_REQUEST['reset'])){
                delete_option($key,$value);
            }
        }

        return $options; /*返回*/
}

?>