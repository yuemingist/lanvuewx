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
                            <div class="span10">
                                <h3><i class="icon-edit"></i>修改密码</h3>
                            </div>
                            <div class="span2">
                                <a class="btn" href="javascript:window.history.go(-1);">返回</a>
                            </div>
                        </div>
                        <div class="box-content">
                        <?php if (Session::get('upc')=='0'){ ?>
                        <div class="alert">
                        <strong>温馨提示</strong>：系统检测您的密码过于简单，请更新密码后继续使用！！
                        </div>
                        <?php } ?>
                            <form action="/wechat/modifypwd" method="post" class="form-horizontal form-validate">
                                <div class="control-group">
                                    <label class="control-label" for="old_password">原始密码</label>
                                    <div class="controls">
                                        <input type="password" name="mypwd" id="mypwd" data-rule-required="true" data-rule-rangelength="[1,16]" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="new_password">设置密码</label>
                                    <div class="controls">
                                        <input type="password" name="newpwd" id="newpwd" data-rule-required="true" data-rule-rangelength="[6,16]" />
                                        <span class="maroon">*</span><span class="help-inline">长度为6~16位字符</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="repassword">确认密码</label>
                                    <div class="controls">
                                        <input type="password" name="renewpwd" id="renewpwd" data-rule-required="true" data-rule-equalto="#new_password">
                                    </div>
                                </div>
                                <div class="form-actions" id="btn_box">
                                    <button id="submit-btn" type="button" data-loading-text="提交中..." class="btn btn-primary">保存</button>
                                    <button class="btn" type="button" onclick="javascript:window.history.go(-1);">取消</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script type="text/javascript">
$(function(){
	 
  $("#submit-btn").click(function(){
	  var opwd   = $("#mypwd").val();
	  var pwd   = $("#newpwd").val();
	  var pwd1 = $("#renewpwd").val();
	  var id       = $("#id").val();
	  if(pwd == '' || pwd1 == '' || opwd == ''){
		  tusi('请填写完整。');
		  return false;
	  }
	  if(pwd!= pwd1){
		  tusi('两次密码不一致!');
		  return false;
	  }
	  if(opwd == pwd){
		  tusi('新旧密码不能相同!');
		  return false;
	  }
	  ajax('updatePwd-'+id+'.html',{ opwd:opwd,pwd:pwd,pwd1:pwd1},function(data){
		  if(data == 0){
			  tusi('两次密码不一致!');
			  return false;
		  }else if(data == 2){
			  tusi('不能为空');
			  return false;
		  }else{
			  tusi(data);
			  setTimeout(function(){
				  location.href=location.href;
			  },1500); 
		  }
		  
	  });
  });
});


</script>
<br/><br/><br/></body>
</html>