<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<base target="mainFrame" />
<link rel="stylesheet" type="text/css" href="<?php echo $CSS; ?>wm/index.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $CSS; ?>wm/bootstrap_min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $CSS; ?>wm/bootstrap_responsive_min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $CSS; ?>wm/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $CSS; ?>wm/themes.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $CSS; ?>wm/todc_bootstrap.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $CSS; ?>wm/inside.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $CSS; ?>wm/album.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $CSS; ?>wm/uploadify_t.css" media="all" />
<title><?php echo $_SERVER['WEB_NAME']; ?>—国内最大的微信公众服务平台</title><script type="text/javascript">var yyuc_jspath = "/@system/";</script><script type="text/javascript" src="/@system/js/jquery.js"></script><script type="text/javascript" src="/@system/js/yyucadapter.js"></script>
<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body class="<?php echo Session::get('maintheme'); ?>">
	<div id="main">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-title">
							<div class="span12">
								<h3><i class="icon-cog"></i>添加音乐</h3>
							</div>
						</div>
						<div class="box-content">
							<form action="" method="post" id="transform" class="form-horizontal form-validate"><?php echo tk();  echo $m->hidden('id'); ?>
								<div class="control-group">
									<label for="name" class="control-label">音乐名称：</label>
									<div class="controls">
									   <?php echo $m->text('name','class="input-large"  required="required"'); ?>
										<span class="maroon">*</span>
										<span class="help-inline">尽量简单，不要超过20字</span>
									</div>
								</div>
								<div class="control-group">
									<label for="category_id" class="control-label">所属列表：</label>
									<div class="controls">
										<?php echo $m->select($list1,'zid','class="input-large"'); ?>
										<span class="help-inline">如为空 请先设置列表</span>
									</div>
								</div>
							<div class="control-group">
									<label for="floor_num" class="control-label">音乐链接：</label>
									<div class="controls">
										<?php echo $m->textarea('pic','class="input-large"  required="required"'); ?>
										<span class="maroon">*</span>
										<span class="help-inline">请尽量以mp3 wmv等音乐格式为后缀！</span>
									</div>
								</div>
								

								
								<div class="form-actions">
									<button type="submit" id="bsubmit" data-loading-text="提交中..." class="btn btn-primary">保存</button>
									<button type="button" class="btn" onclick="window.history.go(-1);">取消</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<br/><br/><br/></body>
<script type="text/javascript" src="<?php echo $JS; ?>/comm.js"></script>
<script type="text/template" id="picdemo">
<li class="imgbox" style="list-type:none">
<a class="item_close" href="javascript:void(0)" onclick="$(this).parent().remove();" title="删除">
</a>
<span class="item_box">
    <img src="" style="max-height:100%;">
</span>
<span class="item_input">
    <textarea class="bewrite" cols="3" rows="4" style="resize: none" placeholder="图片描述..." onfocus="$(this).parent().addClass('on');" onblur="$(this).parent().removeClass('on');">
    </textarea>
    <i class="shadow hc">
    </i>
</span>
</li>
</script>
<script>		
		//上传图片
		function addmorepic(){
			window.piccbk = function(m,n){
				addoneing(m,n);
				window.piccbk = null;
			}
			window.curpic = null;
			openpicset();	
		}
		function addoneing(m,n){
			n = n.split(',');
			n = n[0];
			$('#fileList').append($('#picdemo').html());
			var li = $('#fileList').children('li:last');
			li.find('img').attr('src',m);
			li.find('textarea').val(n);
		}
		$(function(){
			$('#transform').submit(function(){
				var pics = [];
				$('#fileList').find('li').each(function(){
					var msg = {};
					var img = $(this).find('img');
					msg.src = img.attr('src');
					msg.txt = $.trim($(this).find('textarea').val());
					var w = img.width();
					var h = img.height();
					w = parseInt(450*w/h);
					msg.w = w;
					msg.h = 450;
					pics[pics.length] = msg;
				});
				$('#micro_music_typepic').val($.toJSON(pics));
			});
			var val = $('#micro_music_typepic').val();
			if($.trim(val)==''){
				val = '[]';
			}
			var data = $.evalJSON(val);
			for(var i=0;i<data.length;i++){
				var msg = data[i];
				addoneing(msg.src,msg.txt);
			}
		});
	</script>
<script type="text/javascript">


$(function(){
	 $("#bsubmit").submit(function(){
			var cansv= true;
			$(this).find('input[type="text"],select,textarea').filter('[required="required"]').each(function(){
				if($.trim($(this).val())==''){
					cansv = false;
					$(this).css('backgroundColor','yellow');
					$(this).one('focus',function(){
						$(this).css('backgroundColor','transparent');
					});
				}
			});
			if(!cansv){
				tusi('请将信息填写完整');
			}
	    	return cansv;
	    });
	
	
	
});
</script>
<script>
		window.document.onkeydown = function(e) {
			if ('' == document.activeElement.id) {
				var e=e || event;
　 				var currKey=e.keyCode || e.which || e.charCode;
				if (8 == currKey) {
					return false;
				}
			}
		};
	</script>
</html>