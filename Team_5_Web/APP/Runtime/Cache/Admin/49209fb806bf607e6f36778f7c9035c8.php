<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en-AU">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title><?php echo ($titles['prt']); ?>-<?php echo ($titles['son']); ?></title>
    <meta name="keywords" content="keywords" />
    <meta name="description" content="description" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Public/Styles/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Styles/css/admin.css">
    <link rel="stylesheet" href="/Public/Styles/css/page.css">
    <script src="/Public/Styles/js/jquery.js"></script>
    <script src="/Public/Styles/js/pintuer.js"></script>
    <script src="/Public/Styles/js/respond.js"></script>
</head>

<body>
    <header>
    <div class="lefter">
        <div class="logo"><a href="<?php echo U('Admin/index');?>"><img src="/Public/Images/logo.gif" style="height:50px;" alt="后台管理系统" /></a></div>
    </div>
    <div class="righter nav-navicon" id="admin-nav">
        <div class="mainer">
            <div class="admin-navbar">
                <span class="float-right">
                	<a class="button button-little bg-main" href="<?php echo U('Admin/index');?>" target="_blank">Front desk homepage</a>
                    <a class="button button-little bg-yellow" href="<?php echo U('Admin/loginout');?>">Log off login</a>
                </span>
                <ul class="nav nav-inline admin-nav">
                    <li class="<?php echo $flag['prt'] == 'admin' ? 'active' : '';?>">
                        <a href="<?php echo U('Admin/index');?>" class="icon-home"> begin</a>
                        <ul>
                            <li class="<?php echo $flag['son'] == 'admin_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Admin/index');?>">Login information</a>
                            </li>
                            <?php if(session("state") != 3): ?>
                            <li class="<?php echo $flag['son'] == 'teacher_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Teacher/index');?>">Teacher management</a>
                            </li>
                            <?php endif; ?>
                            <?php if(session("state") != 2): ?>
                            <li class="<?php echo $flag['son'] == 'student_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Student/index');?>">Student management</a>
                            </li>
                            <?php endif; ?>
                            <?php if(session("state") == 1): ?>
                            <li class="<?php echo $flag['son'] == 'desgin_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Design/index');?>">Proposal management</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'msg_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Msg/index');?>">Message management</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'usr_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Usr/index');?>">user management</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php if(session("state") != 3): ?>
                    <li class="<?php echo $flag['prt'] == 'teacher' ? 'active' : '';?>">
                        <a href="<?php echo U('Teacher/index');?>" class="icon-user"> teacher</a>
                        <ul>
                            <li class="<?php echo $flag['son'] == 'teacher_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Teacher/index');?>">Teacher list</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'teacher_add' ? 'active' : '';?>">
                                <a href="<?php echo U('Teacher/add');?>">New teachers</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'teacher_recycle' ? 'active' : '';?>">
                                <a href="<?php echo U('Teacher/recycle');?>">recycle bin</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(session("state") != 2): ?>
                    <li class="<?php echo $flag['prt'] == 'student' ? 'active' : '';?>">
                        <a href="<?php echo U('Student/index');?>" class="icon-file-text"> student</a>
                        <ul>
                            <li class="<?php echo $flag['son'] == 'student_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Student/index');?>">Student list</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'student_add' ? 'active' : '';?>">
                                <a href="<?php echo U('Student/add');?>">Add new students</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'student_recycle' ? 'active' : '';?>">
                                <a href="<?php echo U('Student/recycle');?>">recycle bin</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(session("state") == 1): ?>
                    <li class="<?php echo $flag['prt'] == 'design' ? 'active' : '';?>">
                        <a href="<?php echo U('Design/index');?>" class="icon-file"> proposal</a>
                        <ul>
                            <li class="<?php echo $flag['son'] == 'design_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Design/index');?>">proposal list</a>
                            </li>
                            <!-- <li class="<?php echo $flag['son'] == 'design_recycle' ? 'active' : '';?>">
                                <a href="<?php echo U('Design/recycle');?>">recycle bin</a>
                            </li> -->
                        </ul>
                    </li>
                    <li class="<?php echo $flag['prt'] == 'msg' ? 'active' : '';?>">
                        <a href="<?php echo U('Msg/index');?>" class="icon-cog"> message</a>
                        <ul>
                            <li class="<?php echo $flag['son'] == 'msg_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Msg/index');?>">message list</a>
                            </li>
                            <!-- <li class="<?php echo $flag['son'] == 'msg_recycle' ? 'active' : '';?>">
                                <a href="<?php echo U('Msg/recycle');?>">recycle bin</a>
                            </li> -->
                        </ul>
                    </li>
                    <li class="<?php echo $flag['prt'] == 'usr' ? 'active' : '';?>">
                        <a href="<?php echo U('Usr/index');?>" class="icon-th-list"> user</a>
                        <ul>
                            <li class="<?php echo $flag['son'] == 'usr_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Usr/index');?>">User list</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'usr_add' ? 'active' : '';?>">
                                <a href="<?php echo U('Usr/add');?>">Add users</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'usr_recycle' ? 'active' : '';?>">
                                <a href="<?php echo U('Usr/recycle');?>">recycle bin</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="admin-bread">
                <span>Hello,<?php echo session("NAME");?>(
                    <?php  if(session("state") == 1){ $t = "Super administrator"; }else if(session("state") == 2){ $t = "Teacher administrator"; }else if(session("state") == 3){ $t = "Student administrator"; } echo $t;?>)&nbsp;&nbsp;&nbsp;&nbsp;Welcome your presence.</span>
                <ul class="bread">
                    <li><a href="<?php echo U('Admin/index');?>" class="icon-home"> begin</a></li>
                    <?php if($titles['prt'] == null): else: ?>    
                    <li><a href="/bs/admin.php/<?php echo ($titles['prtLink']); ?>/index.html"><?php echo ($titles['prt']); ?></a></li><?php endif; ?>
                    <li><?php echo ($titles['son']); ?></li>
                </ul>
            </div>
        </div>
    </div>
    </header>
    
    <section>
<div class="admin">
    <div class="line-big">
        <div class="xm3">
            <div class="panel border-back">
                <div class="panel-body text-center">
                    <img src="/Public/Images/sex_a.jpg" width="120" class="radius-circle" /><br />
                    admin
                </div>
                <div class="panel-foot bg-back border-back">&nbsp;<br/>Hi，<?php echo session("NAME"); ?><br/>&nbsp;</div>
            </div>
            <br />
            <div class="panel">
                <div class="panel-head"><strong>Site statistics</strong></div>
                <ul class="list-group">
                    <li><span class="float-right badge bg-red"><?php echo ($CLists["usr"]); ?></span><span class="icon-user"></span> User</li>
                    <li><span class="float-right badge bg-main"><?php echo ($CLists["teacher"]); ?></span><span class="icon-file"></span> Teacher</li>
                    <li><span class="float-right badge bg-main"><?php echo ($CLists["student"]); ?></span><span class="icon-shopping-cart"></span> Student</li>
                    <li><span class="float-right badge bg-main"><?php echo ($CLists["message"]); ?></span><span class="icon-file-text"></span> Message</li>
                    <li><span class="float-right badge bg-main"><?php echo ($CLists["gp"]); ?></span><span class="icon-database"></span> project of Team05</li>
                </ul>
            </div>
            <br />
        </div>
        <div class="xm9">
            <div class="alert alert-yellow"><span class="close"></span><strong>Attention：</strong>You have 0 unread messages，<a href="#">click to view</a>。</div>
            <div class="alert">
                <h4>proposal manage system introduction</h4>
                <p class="text-gray padding-top">proposal manage system，dynamic website technology<br/>Gathering teacher infomation、student infomation、proposal infomation and relavant date，方便 admin manage data quickly </p>
                <?php if(session("state") != 3): ?>
                <a target="_blank" class="button bg-dot icon-user" href="<?php echo U('Teacher/index');?>"> Teacher manage </a> 
                <?php endif; ?>
                <?php if(session("state") != 2): ?>
                <a target="_blank" class="button bg-main icon-file-text" href="<?php echo U('Student/index');?>"> Student manage </a>
                <?php endif; ?>
                <?php if(session("state") == 1): ?>
                <a target="_blank" class="button border-main icon-code" href="<?php echo U('Design/index');?>"> Proposal manage </a>
                <?php endif; ?>
            </div>
            <div class="panel">
                <div class="panel-head"><strong>system infomation</strong></div>
                <table class="table">
                    <tr><th colspan="2"> Servers infomation</th><th colspan="2">system infomation</th></tr>
                    <tr>
                        <td width="120" align="right">Operating system：</td>
                        <td><?php echo ($system['os']); ?></td>
                        <td width="120" align="right">Web Servers：</td>
                        <td><?php echo ($system['web_os']); ?></td>
                    </tr>
                    <tr>
                        <td align="right">Index：</td>
                        <td><a href="#" target="_blank"><?php echo ($system['domainname']); ?></a></td>
                        <td align="right">IP：</td>
                        <td><?php echo ($system['ip']); ?></td>
                    </tr>
                    <tr>
                        <td align="right">Progamming Language：</td>
                        <td><?php echo ($system['language']); ?></td>
                        <td align="right">Language：</td>
                        <td><a href="#" target="_blank"><?php echo ($system['php_version']); ?></a></td>
                    </tr>
                    <tr>
                        <td align="right">Data form：</td>
                        <td><?php echo ($system['db_os']); ?></td>
                        <td align="right">Library version：</td>
                        <td><?php echo ($system['db_version']); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build   </p>
</div>
</section>

    <footer>
        
    </footer>


</body>
</html>