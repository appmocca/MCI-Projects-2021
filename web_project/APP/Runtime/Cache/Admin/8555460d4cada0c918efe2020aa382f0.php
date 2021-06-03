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
            <div class="logo">
                <a href="<?php echo U('Admin/index');?>"><img src="/Public/Images/logo.gif" style="height:50px;" alt="后台管理系统" /></a>
            </div>
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
                <input type="button" class="button button-small border-green" value="Add users" onclick="javascript:window.location.href='<?php echo U('Usr/add');?>';" />
                <input type="button" class="button button-small border-blue" value="recycle bin" onclick="javascript:window.location.href='<?php echo U('Usr/recycle');?>'" />
            </div>

            <table class="table table-hover">
                <tr>
                    <th width="80">User number</th>
                    <th width="110">name of user</th>
                    <th width="110">Real name</th>
                    <th width="110">User gender</th>
                    <th width="120">contact way</th>
                    <th width="*">e-mail address</th>
                    <th width="140">user group</th>
                    <th width="180">operate</th>
                </tr>
                <?php if(is_array($usrList)): $i = 0; $__LIST__ = $usrList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($index["adminId"]); ?></td>
                    <td><?php echo ($index["adminName"]); ?></td>
                    <td><?php echo ($index["adminRealName"]); ?></td>
                    <td>
                        <?php echo $index['adminSex'] == 1 ? 'male' : 'female'; ?>
                    </td>
                    <td><?php echo ($index["adminPhone"]); ?></td>
                    <td><?php echo ($index["adminEmail"]); ?></td>
                    <td>
                        <?php switch($index['state']){ case 1: echo "system administrator"; break; case 2: echo "Teacher administrator"; break; case 3: echo "Student administrator"; break; break; } ?> 
                    </td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo ($index["adminId"]); ?>"/>
                        <a class="button border-yellow button-little dialogs" name="check" href="#" data-toggle="click" data-target="#checkdialog" data-mask="1" data-width="30%">examine</a>
                        <a class="button border-blue button-little" name="reset" href="#">Reset password</a>
                        <a class="button border-green button-little dialogs" name="delete" href="#" data-toggle="click" data-target="#mydialog" data-mask="1" data-width="30%">delete</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <div class="panel-foot text-center">
                page
            </div>
        </div>
        </form>
        <br />
        <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build   </p>
    </div>

    <div id="checkdialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>User details</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group">
                    <p>User number：  <a class="adminId" href="#"></a></p>
                    <p>user account：  <a class="adminName" href="#"></a></p>
                    <p>Real name：  <a class="adminRealName" href="#"></a></p>
                    <p>User gender：  <a class="adminSex" href="#"></a></p>
                    <p>User age：  <a class="adminAge" href="#"></a></p>
                    <p>contact way：  <a class="adminPhone" href="#"></a></p>
                    <p>e-mail address：  <a class="adminEmail" href="#"></a></p>
                    <p>home address：  <a class="adminAddress" href="#"></a></p>
                </div>
            </div> 
        </div> 
    </div>

    <div id="mydialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>User operation</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group">
                    <p>Are you sure you want to delete this user?</p>
                    <p>O(∩_∩)O~~(Is a recoverable deletion)</p>
                </div>
        
                <input type="button" class="button bg-main" value="delete" onclick="javascript:recycle();" />
                <button class="button bg-yellow" type="reset">regret</button>
            </div> 
        </div> 
    </div>

    <script>
        var ID = null;
        function recycle(){
            window.location.href = "<?php echo U('Usr/toRecycle/id/" + ID +"');?>";
        }
        $(function(){
            $(".table a[name='check']").click(function(){
                ID = $(this).parent().find("input[name='id']").val();
               
                $.ajax({
                    url: "<?php echo U('Usr/checkDetail');?>",
                    data: {
                        id: ID,
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(data){
                        if(data.state == true){
                            for(var x in data.detail){
                                if(x == 'adminSex'){
                                    $(".dialog ." + x + "").html(data.detail[x] == 1 ? 'male' : 'female');
                                }else{
                                    $(".dialog ." + x + "").html(data.detail[x]);
                                }
                            }
                        }else{
                            return ;
                        }
                    }
                }); 
            });

            $(".table a[name='reset']").click(function(){
                var id = $(this).parent().find("input[name='id']").val();
                window.location.href = "<?php echo U('Usr/reset/id/" + id +"');?>";
            });

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