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
    <link rel="stylesheet" href="/Public/Styles/css/me.css">
    <script src="/Public/Styles/js/jquery.js"></script>
    <script src="/Public/Styles/js/pintuer.js"></script>
    <script src="/Public/Styles/js/respond.js"></script>

    <style>
        
    </style>

</head>
<body>
    <header>
        <div class="layout layout_top bg22 fixed-top">

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

        <div class="line">
            
            <div class="xm2 bg22 contBox">
                <aside>
                <ul class="nav">
                    <li><a href="<?php echo U('Teacher/index');?>" class="lls <?php echo $state == 'index' ? 'active' : '';?>">Login Information</a></li>
                    <li><a href="<?php echo U('Teacher/person');?>" class="lls <?php echo $state == 'person' ? 'active' : '';?>">Personal Information</a></li>
                    <li><a href="<?php echo U('Teacher/add');?>" class="lls <?php echo $state == 'add' ? 'active' : '';?>">Adding Proposal</a></li>
                    <li><a href="<?php echo U('Teacher/bslist');?>" class="lls <?php echo $state == 'bslist' ? 'active' : '';?>">Proposal List</a></li>
                    <li><a href="<?php echo U('Teacher/msg');?>" class="lls <?php echo $state == 'msg' ? 'active' : '';?>">Message Management</a></li>
                    <li><a href="<?php echo U('Teacher/plan');?>" class="lls <?php echo $state == 'plan' ? 'active' : '';?>">Progress Management</a></li>
                </ul>
                </aside>
            </div>
       
        
            <div class="xm10 contBox">
                <div class="bread-me">
                    <ul class="bread bg">
                      <li><a href="<?php echo U('Teacher/index');?>" class="icon-home"> Index</a></li>
                      <li><?php echo ($title); ?></li>
                    </ul>
                </div>

<div class="adminme">
    <div class="panel admin-panel">
        <div class="panel-head"><strong>Content list</strong></div>
        <div class="padding border-bottom">
            <a class="button button-small border-green dialogs disabled" <?php echo count($ff) > 0 ? '' : 'disabled="disabled"';?> name="addmsg" href="#" data-toggle="click" data-target="#mymsgdialog" data-mask="1" data-width="50%">Add new message</a>
        </div>
        <table class="table table-hover">
            <tr>
                <th width="60">number</th>
                <th width="140">Information time</th>
                <th width="120">sender of a letter</th>
                <th width="120">addressee</th>
                <th width="*">message content</th>
                <th width="100">operate</th>
            </tr>
            <?php if(is_array($adminList)): $i = 0; $__LIST__ = $adminList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr class="red">
                <td><?php echo ($index["msgId"]); ?></td>
                <td><?php echo (date("m-d i:m:s",$index["createTime"])); ?></td>
                <td>administrator</td>
                <td>All teachers</td>
                <td><?php echo ($index["msgContent"]); ?></td>
                <td>
                    <!-- <input type="hidden" name="id" value="<?php echo ($index["msgId"]); ?>"/> -->
                    <!-- <a class="button border-red button-little dialogs" name="del" href="#" data-toggle="click" data-target="#mydeldialog" data-mask="1" data-width="30%">删除</a> -->
                    no-operation
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <!-- Upstairs is the news of the administrator -->
            <?php if(is_array($List)): $i = 0; $__LIST__ = $List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($index["msgId"]); ?></td>
                <td><?php echo (date("m-d i:m:s",$index["createTime"])); ?></td>
                <td>
                    <?php
 if($index['state'] == -1){ echo $usrName; }else{ foreach($ff as $v){ if($v['stuId'] == $index['msgFromId']){ $t = $v['stuRealName']; } } echo $t; } ?>
                </td>
                <td>
                    <?php
 if($index['state'] == 1){ echo $usrName; }else{ foreach($ff as $v){ if($v['stuId'] == $index['msgAccessId']){ $t = $v['stuRealName']; } } echo $t; } ?>
                </td>
                <td><?php echo ($index["msgContent"]); ?></td>
                <td>
                    <input type="hidden" name="id" value="<?php echo ($index["msgId"]); ?>"/>
                    <a class="button border-green button-little dialogs" name="del" href="#" data-toggle="click" data-target="#mydeldialog" data-mask="1" data-width="30%">delete</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
        <div class="panel-foot text-center">
            <?php echo ($page); ?>
        </div>
    </div>
    <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build   </p>
</div>


<div id="mymsgdialog"> 
    <div class="dialog"> 
        <div class="dialog-head"> 
            <span class="close rotate-hover"></span> 
            <strong>Add new message</strong> 
        </div> 
        <div class="dialog-body">
            <form action="<?php echo U('Teacher/addMsg');?>" method="post">
                <div class="form-group">
                    <div class="label"><label for="receive">addressee：</label></div>
                    <div class="field">
                        <select class="input" name="receive" id="receive">
                            <option value="-1">All students</option>
                            <?php if(is_array($ff)): $i = 0; $__LIST__ = $ff;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><option value="<?php echo ($index["stuId"]); ?>"><?php echo ($index["stuRealName"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="content">message content：</label></div>
                    <div class="field">
                        <textarea class="input" rows="3" name="content" id="content" cols="30" placeholder="message content"></textarea>
                    </div>
                </div>
                <div class="form-button">
                    <input type="submit" class="button bg-main" value="Send ..." />
                    <button class="button bg-yellow" type="reset">renovate</button>
                </div>
            </form>
        </div> 
    </div> 
</div>
<div id="mydeldialog"> 
    <div class="dialog"> 
        <div class="dialog-head"> 
            <span class="close rotate-hover"></span> 
            <strong>Message operation</strong> 
        </div> 
        <div class="dialog-body">
            <div class="form-group">
                <p>Are you sure you want to delete this message?</p>
            </div>
            <input type="button" class="button bg-main" value="果断的选择" onclick="javascript:del();" />
            <button class="button bg-yellow" type="reset">Think again</button>
        </div> 
    </div> 
</div>



<script>
    var ID = null;
    function del(){
        window.location.href = "<?php echo U('Teacher/delMsg/id/" + ID + "');?>";
    }
    $(function(){
        $(".table a[name='del']").click(function(){
            ID = $(this).parent().find("input[name='id']").val();
        });

    });
</script>

 </div>
    </section>

    <footer>
        
    </footer>
</body>
</html>