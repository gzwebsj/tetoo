<?php
function theme_ad_page(){
	$theme_option = theme_options();
	wp_enqueue_media();
	wp_enqueue_style('thickbox');
?>
	<div class="wrcn">
		<div class="container">
			<div class="a-page">
			</div>
		</div>
	</div>

	<!--主体布局-->

	<div class="t_reg l">
		<div class="copyright r">
			<div class="leftbox">
				<div class="logo l" id="page">
					<div class="respage">
						<form method="post">
							<input name="reset" type="submit" formnovalidate class="saves-button sub-bt r" value="<?php _e('重设数据') ?>" />
						</form>
					</div>
					<span>
						<a href="http://www.85blog.com" title="购买此主题联系QQ:8413708">冷漠原创WordPress主题</a>
					</span>
				<div class="choice">

					<!-- 选卡按钮布局 -->
					<?php
					foreach($theme_option as $value) {
						if ($value['type'] !== 'but') continue;
						echo '<a href="http://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ."&id=".$value['id'] . '"><li title="'.$value['title'].'"><lable for="' . $value['id'] . '">' . $value['name'] . '</lable></li></a>';
						//var_dump($theme_option);
					}
					?>
				</div>
				<!-- Code End -->
					<div class="savepage-but">
						<form method="post">
							<input name="save" type="submit" class="save-button sub-bt l" value="<?php _e('保存设置'); ?>"/>
							<input type="hidden" name="action" value="save" />
						</div>
					<div id="jianjie">
					<span class="jjie"></span>
						<p>本主题由：冷漠原创制作，购买此主题请联系QQ:8413708</p>
					</div>
					</div>
				</div>
				<table id="tb">
					<?php
					$one_option = reset($theme_option);
					if($_GET['id'] == ''){
						$_GET['id'] = $one_option['class'];
					}
					foreach($theme_option as $value) {
					if($value['class'] == $_GET['id']){
						if($value['type'] =='textarea' ){
							echo '<tr><td><label> ' . $value['name'] . ' </label></td>  '.
							'<td><div class="tabletextarea"><textarea name="' . $value['id'] . '" id="' . $value['id'] . '" type="' . $value['type'] . '">'.get_option($value["id"]).'</textarea></div></td>'.
							'<td style="color:#B3B3B3;">' .$value['title']. '</td></tr>';
						}

						else if($value['type'] =='time'){
							$imgurl = get_bloginfo('template_directory');
							echo '<tr><td><label> ' . $value['name'] . ' </label></td>  '.
							'<td><ul><li class="layui-form-li admin-li"><div class="admin-form-label admin-input" id="input"><label>日期</label><input type="text" name="' . $value['id'] . '" id="' . $value['id'] . '" class="layui-laydate-input" value="'.get_option($value["id"]).'"><img src="'.$imgurl.'/int/ui/img/icon.png"></div></li></ul>'.'</td>'.'<td style="color:#B3B3B3;">' .$value['title']. '</td></tr>';
						}

						else if($value['type'] =='text'){
							echo '<tr><td><label> ' . $value['name'] . ' </label></td>  '.
							'<td><div class="tabletext"><input name="' . $value['id'] . '" id="' . $value['id'] . '" type="text" value="'.get_option($value["id"]).'">'.'</div></td>'.
							'<td style="color:#B3B3B3;">' .$value['title']. '</td></tr>';
						}


						else if($value['type'] =='cheackbox'){
							get_option($value["display"]);
							if( get_option($value["id"]) == 'yes'){ $checked = "checked=\"checked\""; }else{ $checked = "";}
							echo '<tr><td><label> ' . $value['name'] . ' </label></td>  '.
							'<td style="max-width:500px"> <input type="checkbox" style="margin-left:10px;margin-right:10px;width:10px;" name="' . $value['id'] . '" value="'.$value["display"].'"'.$checked.'/>'.$value['title'].'</td>'.'</tr>';
						}

						else if($value['type'] =='upload'){
							echo '<tr><td><label> ' . $value['name'] . ' </label></td>  '.
							'<td><div><input class="uploadtext" name="' . $value['id'] . '" id="' . $value['id'] . '" type="text" value="'.get_option($value["id"]).'">'.'<a class="button upload" href="" id="' . $value['id'] . '">上传</a>'.'</div></td>'.
							'<td style="color:#B3B3B3;">' .$value['title']. '</td></tr>';
						}
					 }
					}
					?>

				</table>
			</form>

		</div>
		<div class="footcp">
			<span><h4>购买主题请联系qq：8413708 | 主题官网：<a href="www.wp38.com">wp旺铺主题网</h4></span>
		</div>
	</div>


	<?php
	if(isset($_REQUEST['save'])) {
		echo "<div class=save id=setsave>保存成功</div>";
	}
	if(isset($_REQUEST['reset'])) {
		echo "<div class=reset id=setreset>重置成功</div>";
	}
}
?>