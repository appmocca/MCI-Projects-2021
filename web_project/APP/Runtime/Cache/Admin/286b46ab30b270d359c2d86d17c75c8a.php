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
          <!--   <div class="panel-head">
                <input type="button" class="button button-small border-blue" value="回收站" onclick="javascript:window.location.href='<?php echo U('Design/recycle');?>'" />
            </div> -->
            <div class="padding border-bottom">
                <form action="<?php echo U('Design/index');?>" class="form-inline">
                    <div class="form-group">
                        <div class="label"><label for="gpThrId">Supervised professor</label></div>
                        <div class="field">
                            <input type="text" class="input" id="gpThrId" name="gpThrId" size="12" value="<?php echo isset($seachData['gpThrId']) && !empty($seachData['gpThrId']) ? $seachData['gpThrId'] : '';?>" placeholder="Supervised professor" />
                        </div>
                    </div>
                    &nbsp;
                    <div class="form-group">
                        <div class="label"><label for="gpContent">Key Words</label></div>
                        <div class="field">
                            <input type="text" class="input" id="gpContent" name="gpContent" size="12" value="<?php echo isset($seachData['gpContent']) && !empty($seachData['gpContent']) ? $seachData['gpContent'] : '';?>" placeholder="Key Words" />
                        </div>
                    </div>
                    &nbsp;
                    <div class="form-group">
                        <div class="label"><label for="state">Proposal Status</label></div>
                        <div class="field">
                            <select class="input" name="state" id="state">
                                <option value="">Please choose</option>
                                <option <?php echo $seachData['state'] == -1 ? 'selected="selected"' : '' ;?> value="-1">Wait for examining</option>
                                <option <?php echo $seachData['state'] == 1 ? 'selected="selected"' : '' ;?> value="1">Examined</option>
                                <option <?php echo $seachData['state'] == 3 ? 'selected="selected"' : '' ;?> value="3">Assigned</option>
                            </select>
                        </div>
                    </div>
                    &nbsp;
                    <div class="form-group">
                        <div class="label"><label for="gpSHState">Proposal Direct</label></div>
                        <div class="field">
                            <select class="input" name="gpSHState" id="gpSHState">
                                <option value="">Please choose</option>
                                <option <?php echo $seachData['gpSHState'] == 1 ? 'selected="selected"' : '' ;?> value="1">Software Direacion</option>
                                <option <?php echo $seachData['gpSHState'] == 2 ? 'selected="selected"' : '' ;?> value="2">Hardware Direction</option>
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
                    <th width="80">Proposal ID</th>
                    <th width="110">Name of Proposal</th>
                    <th width="*">Proposal Content</th>
                    <th width="160">Required knowledge</th>
                    <th width="140">Proposal Status</th>
                    <th width="80">Supervised professor</th>
                    <th width="140">Operation</th>
                </tr>
                <?php if(is_array($bsList)): $i = 0; $__LIST__ = $bsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($index["gpId"]); ?></td>
                    <td><?php echo ($index["gpTitle"]); ?></td>
                    <td><?php echo ($index["gpContent"]); ?></td>
                    <td><?php echo ($index["gpMust"]); ?></td>
                    <td>
                        <?php if($index["state"] == 0): ?>Wait for examining
                         <?php elseif($index["state"] == 1): ?>
                            Passed exmination
                        <?php elseif($index["state"] == 2): ?>
                            Passed exmination
                        <?php elseif($index["state"] == 3): ?>
                            Confirmed
                         <?php elseif($index["state"] == -1): ?>
                            Didn't passed exmination<?php endif; ?> 
                    </td>
                    <td><?php echo ($index["thrRealName"]); ?></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo ($index["gpId"]); ?>"/>
                        <a class="button border-blue button-little dialogs" name="check" href="#" data-toggle="click" data-target="#checkdialog" data-mask="1" data-width="50%">View</a>
                        <?php if($index["state"] == 0): ?><a class="button border-red button-little dialogs" name="shenhe" href="#" data-toggle="click" data-target="#myshenhe" data-mask="1" data-width="30%">Examnation</a>
                        <a class="button border-green button-little dialogs" name="delete" href="#" data-toggle="click" data-target="#mydialog" data-mask="1" data-width="30%">Delete</a><?php endif; ?>
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

     <div id="checkdialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>Proposal Details</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group">
                    <p>Proposal ID:  <a class="gpId" href="#"></a></p>
                    <p>Proposal Content:  <a class="gpContent" href="#"></a></p>
                    <p>Proposal Intention:  <a class="gpAim" href="#"></a></p>
                    <p>Proposal outcomes:  <a class="gpRequest" href="#"></a></p>
                    <p>Required knowledge:  <a class="gpMust" href="#"></a></p>
                    <p>Form of Submittion(optional):  <a class="gpFormal" href="#"></a></p>
                    <p>Proposal Direct:  <a class="gpSHState" href="#"></a></p>
                    <p>Others:  <a class="gpOthers" href="#"></a></p>
                    <p>Supervised professor:  <a class="thrRealName" href="#"></a></p>
                </div>
            </div> 
        </div> 
    </div>

    <div id="mydialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>Proposal Operation</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group">
                    <p>Comfirming to delete proposal</p>
                    <p>O(∩_∩)O~~(Restorable)</p>
                </div>
                <input type="button" class="button bg-main" value="delete" onclick="javascript:del();" />
                <button class="button bg-yellow" type="reset">regret</button>
            </div> 
        </div> 
    </div>

    <div id="myshenhe"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>Proposal Examnation</strong> 
            </div> 
            <div class="dialog-body">
                    <div class="form-group">
                        <p>This proposal has not been examined，please examine:</p>
                    </div>
                    <br/>
                    <br/>
                    <div class="form-button">
                        <input type="button" class="button bg-main" value="Examnation passed" onclick="javascript:shenhe(1);" />
                        <input type="button" class="button bg-blue" value="Didn't passed exmination" onclick="javascript:shenhe(-1);" />
                        <button class="button bg-yellow" type="reset">Rethink</button>
                    </div>
            </div> 
        </div> 
    </div>
        

    <script>
        var ID = null;
        function del(){
            window.location.href = "<?php echo U('Design/cycGP/id/" + ID +"');?>";
        }
        function shenhe(flag){
            window.location.href = "<?php echo U('Design/SH/id/" + ID +"/flag/" + flag + "');?>";
        }
        $(function(){
            $(".table a[name='check']").click(function(){
                ID = $(this).parent().find("input[name='id']").val();
               
                $.ajax({
                    url: "<?php echo U('Design/checkGP');?>",
                    data: {
                        id: ID,
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(data){
                        if(data.state == true){
                            for(var x in data.detail){
                                if(x == 'gpSHState'){
                                    $(".dialog ." + x + "").html(data.detail[x] == 1 ? 'Software Direacion' : 'Hardware Direction');
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

            $(".table a[name='delete']").click(function(){
                var id = $(this).parent().find("input[name='id']").val();
                ID = id;
            });
            $(".table a[name='shenhe']").click(function(){
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