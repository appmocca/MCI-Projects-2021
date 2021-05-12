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
        <div class="panel admin-panel">
          <div class="panel-head">
                <a class="button button-small border-green dialogs disabled" name="addmsg" href="#" data-toggle="click" data-target="#mymsgdialog" data-mask="1" data-width="50%">Sending Message</a>
            </div>
            <div class="padding border-bottom">
                <form action="<?php echo U('Msg/index');?>" class="form-inline">
                    <div class="form-group">
                        <div class="label"><label for="keys">Keywords</label></div>
                        <div class="field">
                            <input type="text" class="input" id="keys" name="keys" size="12" value="<?php echo isset($seachData['keys']) && !empty($seachData['keys']) ? $seachData['keys'] : '';?>" placeholder="Keywords" />
                        </div>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div class="form-group">
                        <div class="label"><label for="receive">Sender</label></div>
                        <div class="field">
                            <select class="input" name="receive" id="receive">
                                <option value="">Select</option>
                                <option <?php echo $seachData['receive'] == 1 ? 'selected="selected"' : '' ;?> value="1">Admin</option>
                                <option <?php echo $seachData['receive'] == 2 ? 'selected="selected"' : '' ;?> value="2">Supervised Professor</option>
                                <option <?php echo $seachData['receive'] == 3 ? 'selected="selected"' : '' ;?> value="3">Student</option>
                            </select>
                        </div>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div class="form-button">
                        <button class="button bg-green" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <table class="table table-hover">
                <tr>
                    <th width="80">Message ID</th>
                    <th width="100">Sender</th>
                    <th width="100">Receiver</th>
                    <th width="*">Message Content</th>
                    <th width="140">Sending Time</th>
                    <th width="80">Operation</th>
                </tr>
                <?php if(is_array($List)): $i = 0; $__LIST__ = $List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($index["msgId"]); ?></td>
                    <td><?php echo ($index["msgFromId"]); ?></td>
                    <td><?php echo ($index["msgAccessId"]); ?></td>
                    <td><?php echo ($index["msgContent"]); ?></td>
                    <td><?php echo (date("m-d i:m:s",$index["createTime"])); ?></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo ($index["msgId"]); ?>"/>
                        <a class="button border-green button-little dialogs" name="delete" href="#" data-toggle="click" data-target="#mydialog" data-mask="1" data-width="30%">Delete</a>
                        </if>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            <div class="panel-foot text-center">
                <div class ="green-black"><?php echo ($page); ?></div>
            </div>
        </div>
        <br />
        <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build   </p>
    </div>

    <div id="mydialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>Proposal Operation</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group">
                    <p>Do you want to delete this message？</p>
                    <p>O(∩_∩)O~~(This is unrecoverable)</p>
                </div>
                <input type="button" class="button bg-main" value="delete" onclick="javascript:del();" />
                <button class="button bg-yellow" type="reset">Regret</button>
            </div> 
        </div> 
    </div>

    <div id="mymsgdialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>Sending Message</strong> 
            </div> 
            <div class="dialog-body">
                <form action="<?php echo U('Msg/addMsg');?>" method="post">
                    <div class="form-group">
                        <div class="label"><label for="receive">Receiver：</label></div>
                        <div class="field">
                            <select class="input" name="receive" id="receive">
                                <option value="1">All</option>
                                <option value="2">All Profossor</option>
                                <option value="3">All Student</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="content">Message Content:</label></div>
                        <div class="field">
                            <textarea class="input" rows="3" name="content" id="content" cols="30" placeholder="messageContent"></textarea>
                        </div>
                    </div>
                    <div class="form-button">
                        <input type="submit" class="button bg-main" value="Send ..." />
                        <button class="button bg-yellow" type="reset">Refresh</button>
                    </div>
                </form>
            </div> 
        </div> 
    </div>

    <script>
        var ID = null;
        function del(){
            window.location.href = "<?php echo U('Msg/delMsg/id/" + ID +"');?>";
        }
        $(function(){

            $(".table a[name='delete']").click(function(){
                var id = $(this).parent().find("input[name='id']").val();
                ID = id;
            });
        });
    </script>
</section>

    <footer>
        
    </footer>


</body>
</html>