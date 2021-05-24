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
        <form method="post" class="form-x" action="<?php echo U('Usr/addusr');?>">
            <div class="form-group">
                <div class="label"><label for="name">user account</label></div>
                <div class="field">
                    <input type="text" class="input" id="name" name="name" size="50" placeholder="name of user" data-validate="required:Please fill in the new user name" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="pwd">user password</label></div>
                <div class="field">
                    <input type="password" class="input" id="pwd" name="pwd" size="50" placeholder="User password, with digits no less than 5" data-validate="required:Please fill in the password,length#>=5:Password length does not meet the requirements (>5)" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="comfirmpwd">Confirm password</label></div>
                <div class="field">
                    <input type="password" class="input" id="comfirmpwd" name="comfirmpwd" size="50" placeholder="User password, with digits no less than 5" data-validate="required:Please fill in the confirmation password,repeat#pwd:The passwords entered twice are inconsistent" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="name">Real name</label></div>
                <div class="field">
                    <input type="text" class="input" id="realname" name="realname" size="50" placeholder="Real name" data-validate="required:Please fill in the real name of the user" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label>User gender</label></div>
                <div class="field">
                    <div class="button-group radio"> 
                        <label class="button active">
                            <input name="sex" value="1" checked="checked" type="radio"> male
                        </label> 
                        <label class="button">
                            <input name="sex" value="2" type="radio"> female
                        </label> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="age">User age</label></div>
                <div class="field">
                    <input type="text" class="input" id="age" name="age" size="50" placeholder="User age" data-validate="required:Please fill in the user age,number:User age must be an integer" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="phone">contact way</label></div>
                <div class="field">
                    <input type="text" class="input" id="phone" name="phone" size="50" placeholder="contact way" data-validate="number:Please fill in the correct contact information" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="email">e-mail address</label></div>
                <div class="field">
                    <input type="text" class="input" id="email" name="email" size="50" placeholder="Please fill in the email address" data-validate="email:Please fill in the correct email address" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="address">home address</label></div>
                <div class="field">
                    <input type="text" class="input" id="address" name="address" size="50" placeholder="Please fill in the user's address, which is recommended to be within 20 words"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label>User group</label></div>
                <div class="field">
                    <select class="input" name="state" id="state" data-validate="required:Please fill in and select the correct user group">
                        <option value="">Please choose</option> 
                        <option value="1">Super administrator</option>
                        <option value="2">Teacher administrator</option>
                        <option value="3">Student administrator</option>
                    </select>
                </div>
            </div>
            <div class="form-button">
                <button class="button bg-main" type="submit">submit</button>
                <button class="button bg-yellow form-reset " type="reset">Reset</button>
            </div>
        </form>  
        <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build   </p>
    </div>
</section>

    <footer>
        
    </footer>


</body>
</html>