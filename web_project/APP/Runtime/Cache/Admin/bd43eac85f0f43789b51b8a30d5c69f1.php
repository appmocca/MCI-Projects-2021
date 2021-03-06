<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>Back-end Admin Login</title>
    <link rel="stylesheet" href="/Public/Styles/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Styles/css/admin.css">
    <script src="/Public/Styles/js/jquery.js"></script>
    <script src="/Public/Styles/js/pintuer.js"></script>
    <script src="/Public/Styles/js/respond.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>

<body>
<div class="container">
    <div class="line">
        <div class="xs6 xm4 xs3-move xm4-move">
            <br /><br />
            <div class="media media-y">
                <a href="#" target="_blank"><img src="/Public/Images/sex_a.jpg" style="width:150px; height:150px;" class="radius" alt="后台管理系统" /></a>
            </div>
            <br /><br />
            <form action="<?php echo U('Index/doLogin');?>" method="post">
            <div class="panel">
                <div class="panel-head"><strong>Back-end System</strong></div>
                <div class="panel-body" style="padding:30px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input" name="usrname" placeholder="LoginAccount" data-validate="required:please input account,length#>=1:account to short (> 1)" />
                            <span class="icon icon-user"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input" name="usrpwd" placeholder="LoginPassword" data-validate="required:please input password,length#>=3:password too short (>3)" />
                            <span class="icon icon-key"></span>
                        </div>
                    </div>
                </div>
                <div class="panel-foot text-center"><button class="button button-block bg-main text-big">Login Back-end System immediately</button></div>
            </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>