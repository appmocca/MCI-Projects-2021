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
    <form method="post">
        <div class="panel admin-panel">
            <div class="panel-head"><strong>Content list</strong></div>
            <div class="padding border-bottom">
                <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="selectall" />
                <input type="button" class="button button-small border-yellow dialogs" value="bulkrestore" name="recoverallbtn" href="#" data-toggle="click" data-target="#recoversdialog" data-mask="1" data-width="30%" />
                <input type="button" class="button button-small border-blue dialogs" value="bulkclear" name="clearallbtn" href="#" data-toggle="click" data-target="#clearsdialog" data-mask="1" data-width="30%" />
                <div id="recoversdialog">
                    <div class="dialog">
                        <div class="dialog-head">
                            <span class="close rotate-hover"></span>
                            <strong>User batch recovery</strong>
                        </div>
                        <div class="dialog-body">
                            <p>Are you sure you want to restore to select users?</p>

                            <input type="button" class="button bg-main" value="restoreall" onclick="javascript:recoverall();" />
                        </div>
                    </div>
                </div>
                <div id="clearsdialog">
                    <div class="dialog">
                        <div class="dialog-head">
                            <span class="close rotate-hover"></span>
                            <strong>User batch clearing</strong>
                        </div>
                        <div class="dialog-body">
                            <p>Are you sure you want to clear to select users?</p>
                            <p>:( (Delete as unrecoverable)</p>

                            <input type="button" class="button bg-main" value="clearall" onclick="javascript:clearall();" />
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-hover">
                <tr>
                    <th width="45">select</th>
                    <th width="120">Login account</th>
                    <th width="140">Real name</th>
                    <th width="140">Teacher gender</th>
                    <th width="140">contact way</th>
                    <th width="*">research field</th>
                    <th width="180">operate</th>
                </tr>
                <?php if(is_array($usrList)): $i = 0; $__LIST__ = $usrList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                        <td>
                            <input type="checkbox" name="id" value="<?php echo ($index["thrId"]); ?>" />
                        </td>
                        <td><?php echo ($index["thrName"]); ?></td>
                        <td><?php echo ($index["thrRealName"]); ?></td>
                        <td>
                            <?php echo $index['thrSex'] == 1 ? '男' : '女'; ?>
                        </td>
                        <td><?php echo ($index["thrPhone"]); ?></td>
                        <td><?php echo ($index["thrthrdy"]); ?></td>
                        <td>
                            <input name='thrid' type="hidden" value="<?php echo ($index["thrId"]); ?>" />
                            <a class="button border-blue button-little dialogs" name="recover" href="#" data-toggle="click" data-target="#recoverdialog" data-mask="1" data-width="30%">recover</a>
                            <a class="button border-yellow button-little dialogs" name="clear" href="#" data-toggle="click" data-target="#cleardialog" data-mask="1" data-width="30%">clear away</a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <div class="panel-foot text-center">
                page
            </div>
        </div>
    </form>
    <br />
    <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build </p>
</div>

<div id="cleardialog">
    <div class="dialog">
        <div class="dialog-head">
            <span class="close rotate-hover"></span>
            <strong>Teacher's operation</strong>
        </div>
        <div class="dialog-body">
            <div class="form-group">
                <p>Are you sure you want to clear this teacher?</p>
            </div>

            <input type="button" class="button bg-main" value="Delete" onclick="javascript:clearr();" />
            <button class="button bg-yellow" type="reset">Reject</button>
        </div>
    </div>
</div>
<div id="recoverdialog">
    <div class="dialog">
        <div class="dialog-head">
            <span class="close rotate-hover"></span>
            <strong>Teacher's operation</strong>
        </div>
        <div class="dialog-body">
            <div class="form-group">
                <p>Are you sure you want to restore this teacher?</p>
                <p>O(∩_∩)O~~(You can think about it)</p>
            </div>

            <input type="button" class="button bg-main" value="restore" onclick="javascript:recover();" />
            <button class="button bg-yellow" type="reset">Think again</button>
        </div>
    </div>
</div>

<script>
    var ID = null;

    function recover() {
        window.location.href = "<?php echo U('Teacher/recoverOne/id/" + ID + "');?>";
    }

    function clearr() {
        window.location.href = "<?php echo U('Teacher/clearOne/id/" + ID + "');?>";
    }

    $(function() {
        $(".table a[name='recover']").click(function() {
            ID = $(this).parent().find("input[name='thrid']").val();
        });

        $(".table a[name='clear']").click(function() {
            ID = $(this).parent().find("input[name='thrid']").val();
        });
    });
</script>
</section>

    <footer>
        
    </footer>


</body>
</html>