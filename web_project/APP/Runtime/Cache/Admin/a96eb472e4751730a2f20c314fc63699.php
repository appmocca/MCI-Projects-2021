<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en-AU">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>Admin</title>
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
 
<div class="adminme">
    <form role="form" method="post" class="form-x" action="<?php echo U('Design/updateGp');?>" enctype="multipart/form-data">
         <div class="form-group">
            <div class="label"><label for="title">Proposal topic</label></div>
            <div class="field">
                <input type="text" class="input" name="title" size="50" placeholder="Proposal topic" data-validate="required:Please fill in the completed questions" value="<?php echo ($gpDetail['gpTitle']); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="aim">Proposal purpose</label></div>
            <div class="field">
                <textarea class="input" name="aim" rows="3" cols="30" placeholder="Proposal purpose" data-validate="required:Please fill in the completed questions" ><?php echo ($gpDetail['gpAim']); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="content">Proposal content</label></div>
            <div class="field">
                <textarea class="input" name="content" rows="3" cols="30" placeholder="Proposal content" data-validate="required:Please fill in the completed questions" ><?php echo ($gpDetail['gpContent']); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="request">Proposal outcomes</label></div>
            <div class="field">
                <textarea class="input" name="request" rows="3" cols="30" placeholder="Proposal outcomes" data-validate="required:Please fill in the completed questions" ><?php echo ($gpDetail['gpRequest']); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="must">Essential knowledge</label></div>
            <div class="field">
                <textarea class="input" name="must" rows="3" cols="30" placeholder="Essential knowledge" data-validate="required:Please fill in the completed questions" ><?php echo ($gpDetail['gpMust']); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="formal">Submission form(optional)</label></div>
            <div class="field">
                <input type="text" class="input" name="formal" size="50" placeholder="Submission form(optional)" value="<?php echo ($gpDetail['gpFormal']); ?>"  />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="formal">Upload file</label></div>
            <div class="field">
                <input type="file" name="upfile" id="upfile">
              
                <?php if(!empty($gpDetail.filePath)): ?><!--<a class="button" href="/Public/.<?php echo ($gpDetail['filePath']); ?>">下载文件</a>-->
                    <input  readonly name="file" class="input" value="<?php echo ($gpDetail['filePath']); ?>"><?php endif; ?>

            </div>

        </div>
        <div class="form-group">
            <div class="label"><label for="comment">comment</label></div>
            <div class="field">
                <textarea class="input" name="others" rows="3" cols="30" placeholder="others"><?php echo ($gpDetail['gpOthers']); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label>Subject direction</label></div>
            <div class="field">
                <div class="button-group radio"> 
                    <p><label class="label_input"></label>
                        <select name="SHState" style="width:283px; height:28px;">
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 1104" ? 'selected="selected"' : '' ;?> value ="COMP SCI 1104" > COMP SCI 1104 Grand Challenges in Computer Science</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 2008" ? 'selected="selected"' : '' ;?> value ="COMP SCI 2008" > COMP SCI 2008 Topics in Computer Science</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 3020" ? 'selected="selected"' : '' ;?> value ="COMP SCI 3020" > COMP SCI 3020 Advanced Topics in Computer Science</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 3006" ? 'selected="selected"' : '' ;?> value ="COMP SCI 3006" > COMP SCI 3006 Software Engineering & Project</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 3310" ? 'selected="selected"' : '' ;?> value ="COMP SCI 3310" > COMP SCI 3310 Software Engineering & Project (Artificial Intelligence)</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 3311" ? 'selected="selected"' : '' ;?> value ="COMP SCI 3311" > COMP SCI 3311 Software Engineering & Project (Data Science)</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 3312" ? 'selected="selected"' : '' ;?> value ="COMP SCI 3312" > COMP SCI 3312 Software Engineering & Project (Cybersecurity)</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 3313" ? 'selected="selected"' : '' ;?> value ="COMP SCI 3313" > COMP SCI 3313 Software Engineering & Project (Distributed Systems & Networking)</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 4015A/B" ? 'selected="selected"' : '' ;?> value ="COMP SCI 4015A/B" > COMP SCI 4015A/B Computer Science Honours Research Project Part A</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 4414A/B" ? 'selected="selected"' : '' ;?> value ="COMP SCI 4414A/B" > COMP SCI 4414A/B Software Engineering Honours Research Project A</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 7015" ? 'selected="selected"' : '' ;?> value ="COMP SCI 7015" > COMP SCI 7015 Software Engineering & Project</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 7096A/B" ? 'selected="selected"' : '' ;?> value ="COMP SCI 7096A/B" > COMP SCI 7096A/B Master of Software Engineering Project Part A/B</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 7098" ? 'selected="selected"' : '' ;?> value ="COMP SCI 7098" > COMP SCI 7098 Master of Computing & Innovation Project</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 7099A/B" ? 'selected="selected"' : '' ;?> value ="COMP SCI 7099A/B"> COMP SCI 7099A/B Master Computer Science Research Project - Part A/B</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 7097A/B" ? 'selected="selected"' : '' ;?> value ="COMP SCI 7097A/B"> COMP SCI 7097A/B Master Data Science Research Project Part A/B </option>
                    </select>
                    </p>
                </div>
            </div>
        </div>
        <div class="form-button">
            <input type="hidden" value="<?php echo ($gpDetail['gpId']); ?>" name="id" />
            <button class="button bg-main" type="submit">modify</button>
            <a class="button bg-yellow " href="javascript:history.go(-1);">retreat</a>  
        </div>                
    </form>   
    <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build   </p>
</div>
    
</section>

    <footer>
        
    </footer>


</body>
</html>