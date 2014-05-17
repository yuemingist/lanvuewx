<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh-CN">

<head>
	<meta charset="utf-8" />
	<title><?php echo ($metaTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
	<meta name="format-detection" content="telephone=no" />
	<link type="text/css" rel="stylesheet" href="http://weixinguanjia.cn/admin2/tpl/Wap/default/common/css/product/css/style.css" />
	<script src="http://weixinguanjia.cn/admin2/tpl/Wap/default/common/css/product/js/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://weixinguanjia.cn/admin2/tpl/Wap/default/common/css/product/js/main.js"></script>
</head>

<body>
	<!--头部-->
	<header class="ts1">
		<a class="u_back fl" href="javascript:history.go(-1)"></a>
		<ul class="topbar fr">
			<li>
				<a class="icon_user" href="<?php echo U('Product/my',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dining'=>$isDining));?>"> <i></i>
					我的
				</a>
			</li>
			<li>
				<a class="icon_shopping" href="<?php echo U('Product/cart',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dining'=>$isDining));?>"> <i></i>
					购物车
				</a>
			</li>
			<li>
				<a class="icon_class" href="<?php echo U('Product/cats',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dining'=>$isDining));?>">
					<i></i>
					分类
				</a>
			</li>
			<li>
				<a class="icon_index" href="<?php echo U('Product/index',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dining'=>$isDining));?>">
					<i></i>
					主页
				</a>
			</li>
		</ul>
	</header><!--主体-->
	<div class="p_floatbox">
    <div class="f_list_car p_buy clearfix" id="p_buy">
    	<span class="all_price">总价格：<font id="all_price">￥<?php echo ($totalProductFee); ?></font></span>
    	<span>总共<font id="all_numb"><?php echo ($totalProductCount); ?></font>件商品</span>
    	<a href="<?php echo U('Product/cart',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dining'=>$isDining));?>" class="p_btn_buy"><span class="ts1">进入购物车</span></a>
    </div>
</div>
<section class="h_list clearfix">
	<ul>
	  <?php if($shopOpen == 1): ?><li><a class="icon_1" href="<?php echo U('Product/cats',array('token'=>$token,'wecha_id'=>$wecha_id));?>">购物</a></li><?php endif; ?>
		<?php if($diningOpen == 1): ?><li><a class="icon_2" href="<?php echo U('Product/dining',array('token'=>$token,'wecha_id'=>$wecha_id,'dining'=>1));?>">订餐</a></li><?php endif; ?>
		<?php if($grouponOpen == 1): ?><li><a class="icon_3" href="<?php echo U('Groupon/grouponIndex',array('token'=>$token,'wecha_id'=>$wecha_id));?>">团购</a></li><?php endif; ?>
		<li><a class="icon_6" href="<?php echo U('Product/my',array('token'=>$token,'wecha_id'=>$wecha_id));?>">我的</a></li>
	</ul>
</section>
<div class="mfooter" id="wxgjfooter" style="text-align: center;width: 100%;height: 20px;line-height: 20px;margin-top:10px;">
<span class="sp2"><a href="http://www.weibaifen.com/weiweb/6/" style="color: #5e5e5e;font-size: 12px;">技术支持：智能微企</a></span>
</div>
<div style="width: 0px;height: 0px;overflow: hidden;">

</div>
<script>
/**
$(function(){
	if($('body').height()<$(window).height()){
		$('body').height($(window).height());
		$('#wxgjfooter').css('position','fixed').css('bottom','0px');
	}
});
**/
</script>   
</body>
</html>