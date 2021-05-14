<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en-AU">
<head>
    <title><?php echo ($title); ?></title>
    <meta name="keywords" content="keywords" />
    <meta name="description" content="description" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Public/Styles/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Styles/css/admin.css">
    <link rel="stylesheet" href="/Public/Styles/css/page.css">
    <link rel="stylesheet" href="/Public/Styles/css/adminme.css">
    <script src="/Public/Styles/js/jquery.js"></script>
    <script src="/Public/Styles/js/pintuer.js"></script>
    <script src="/Public/Styles/js/respond.js"></script>

    <style>
        
    </style>

</head>
<body>
    <header>
        <div class="layout layout_top bg22 fixed-top">
            <div class="navbar navbar-big radius navbarme">
                <div class="navbar-head">
                </div>
                <div class="navbar-body">
                    <ul class="nav nav-inline nav-menu nav-tabs nav-big">
                        <li><a href="<?php echo U('Teacher/index');?>" class="lls <?php echo $state == 'index' ? 'active' : '';?>">Login Information</a></li>
                        <li><a href="<?php echo U('Teacher/person');?>" class="lls <?php echo $state == 'person' ? 'active' : '';?>">Persional Information</a></li>
                        <li><a href="<?php echo U('Teacher/add');?>" class="lls <?php echo $state == 'add' ? 'active' : '';?>">Adding Proposal</a></li>
                        <li><a href="<?php echo U('Teacher/bslist');?>" class="lls <?php echo $state == 'bslist' ? 'active' : '';?>">Proposal List</a></li>
                        <li><a href="<?php echo U('Teacher/msg');?>" class="lls <?php echo $state == 'msg' ? 'active' : '';?>">Message Management</a></li>
                        <li><a href="<?php echo U('Teacher/plan');?>" class="lls <?php echo $state == 'plan' ? 'active' : '';?>">Progress Management</a></li>
                    </ul>
                </div>
            </div>
            <p class="nav-p">
                Welcome，<?php echo ($usrName); ?>
                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                <a href="<?php echo U('Teacher/loginout');?>">Logout</a>
                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                <a href="<?php echo U('Teacher/index');?>">Index</a>
            </p>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="bread-me">
                <ul class="bread bg-green bg-inverse">
                    <li><a href="<?php echo U('Teacher/index');?>" class="icon-home"> Index</a></li>
                    <li><?php echo ($title); ?></li>
                </ul>
            </div>
<div class="adminme">
    <div class="line-big">
        <div class="xm3">
            <div class="panel border-back">
                <div class="panel-body text-center">
                    <img src="/Public/Images/sex_<?php echo $usrSex == 1 ? 'a' : 'v'; ?>.jpg" width="120" class="radius-circle" /><br />
                    <?php echo ($usrName); ?>
                </div>
                <div class="panel-foot bg-back border-back">&nbsp;<br/>howdy，<?php echo ($usrName); ?> <br>&nbsp;</div>
            </div>
            <br />
            <div class="panel">
                <div class="panel-head"><strong>Site statistics</strong></div>
                <ul class="list-group">
                    <li><span class="float-right badge bg-red">1</span><span class="icon-user"></span>user</li>
                    <li><span class="float-right badge bg-main"><?php echo ($msgCount); ?></span><span class="icon-file"></span> message</li>
                    <li><span class="float-right badge bg-main"><?php echo ($gpCount); ?></span><span class="icon-shopping-cart"></span> Proposal</li>
                </ul>
            </div>
            <br />
        </div>
        <div class="xm9">
            <div class="alert alert-yellow"><span class="close"></span><strong>pay attention to：</strong>You have<?php echo ($msgCount); ?>Pieces of information，<a href="<?php echo U('Teacher/msg');?>">Click to view</a>。</div>
            <div class="alert">
                <h4>Teacher project management system</h4>
                <p class="text-gray padding-top">Project management system, dynamic website technology<br/>Collect teacher information, subject information and other related data to facilitate teachers to manage data in real time</p>
                <a target="_blank" class="button bg-dot icon-user" href="<?php echo U('Teacher/person');?>"> Personal management</a> 
                <a target="_blank" class="button bg-main icon-file-text" href="<?php echo U('Teacher/bslist');?>"> Proposal management</a> 
            </div>
        </div>
    </div>
    <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build   </p>
</div>
 </div>
    </section>

    <footer>
        
    </footer>
</body>
</html>