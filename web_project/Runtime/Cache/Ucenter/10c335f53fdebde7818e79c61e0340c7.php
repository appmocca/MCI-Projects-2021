<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en-AU">
<head>
    <title><?php echo ($title); ?></title>
    <meta name="keywords" content="关键词" />
    <meta name="description" content="描述" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Public/Styles/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Styles/css/admin.css">
    <link rel="stylesheet" href="/Public/Styles/css/me.css">
    <link rel="stylesheet" href="/Public/Styles/css/page.css">
    <script src="/Public/Styles/js/jquery.js"></script>
    <script src="/Public/Styles/js/pintuer.js"></script>
    <script src="/Public/Styles/js/respond.js"></script>

</head>
<body>
    <header>
        <div class="layout layout_top bg22 fixed-top">
            <p class="nav-p">
                Welcome，<?php echo ($usrName); ?>
                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                <a href="<?php echo U('Student/loginout');?>">Logout</a>
                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                <a href="<?php echo U('Student/index');?>">Index</a>
            </p>
        </div>
    </header>

    <section>
        <div class="line">
            <div class="xm2 bg22 contBox">
                <aside>
                <ul class="nav">
                    <li><a href="<?php echo U('Student/index');?>" class="lls <?php echo $state == 'index' ? 'active' : '';?>">Login Information</a></li>
                    <li><a href="<?php echo U('Student/person');?>" class="lls <?php echo $state == 'person' ? 'active' : '';?>">Personal Information</a></li>
                    <li><a href="<?php echo U('Student/bslist');?>" class="lls <?php echo $state == 'bslist' ? 'active' : '';?>">Proposal List</a></li>
                    <li><a href="<?php echo U('Student/detail');?>" class="lls <?php echo $state == 'detail' ? 'active' : '';?>">Proposal Details</a></li>
                    <li><a href="<?php echo U('Student/msg');?>" class="lls <?php echo $state == 'msg' ? 'active' : '';?>">Message Managament</a></li>
                    <li><a href="<?php echo U('Student/plan');?>" class="lls <?php echo $state == 'plan' ? 'active' : '';?>">Proposal Progress</a></li>
                    <li><a href="<?php echo U('Student/choose');?>" class="lls <?php echo $state == 'choose' ? 'active' : '';?>">Proposal Selection</a></li>
                </ul>
                </aside>
            </div>
            <div class="xm10 contBox">
                <div class="bread-me">
                    <ul class="bread bg">
                      <li><a href="<?php echo U('Student/index');?>" class="icon-home"> Index</a></li>
                      <li><?php echo ($title); ?></li>
                    </ul>
                </div>
<div class="adminme">
    <div class="line-big">
        <div class="xm3">
            <div class="panel border-back">
                <div class="panel-body text-center">
                    <img src="/Public/Images/sex_<?php echo session("SEX") == 1 ? 'a' : 'n';?>.jpg" width="120" class="radius-circle" /><br /><?php echo ($usrName); ?>
                </div>
                <div class="panel-foot bg-back border-back">&nbsp;<br/>Welcome，<?php echo ($usrName); ?> <br>&nbsp;</div>
            </div>
            <br />
            <div class="panel">
                <div class="panel-head"><strong>Site statistics</strong></div>
                <ul class="list-group">
                    <li><span class="float-right badge bg-red">1</span><span class="icon-user"></span> User</li>
                    <li><span class="float-right badge bg-main"><?php echo ($msgCount); ?></span><span class="icon-file"></span> Message</li>
                </ul>
            </div>
            <br />
        </div>
        <div class="xm9">
            <div class="alert alert-yellow"><span class="close"></span><strong>Attention:</strong>You have<?php echo ($msgCount); ?>Messages，<a href="<?php echo U('Student/msg');?>">Click to view</a>。</div>
            <div class="alert">
                <h4>Student Proposal Management System</h4>
                <p class="text-gray padding-top">Project management system, dynamic website technology<br/>Collect student information, subject information and other related data to facilitate students to manage data in real time</p>
                <a target="_blank" class="button bg-dot icon-user" href="<?php echo U('Student/person');?>">Personal Information</a> 
                <a target="_blank" class="button bg-main icon-file-text" href="<?php echo U('Student/bslist');?>"> Proposal management</a> 
            </div>
        </div>
    </div>
    <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build   </p>
</div>

            </div>
        </div>
    </section>

    <footer>
        
    </footer>

    <script>
    	$(function(){
    		var tHeight = $("body").height();
    		$("section > .line .contBox").css('height', tHeight + 'px');
    	});
    </script>
</body>
</html>