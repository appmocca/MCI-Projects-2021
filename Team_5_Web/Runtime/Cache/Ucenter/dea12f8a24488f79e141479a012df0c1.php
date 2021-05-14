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
    <form method="post">
        <div class="panel admin-panel">
            <table class="table table-hover">
                <tr>
                    <th width="60">number</th>
                    <th width="120">Subject direction</th>
                    <th width="140">Topic title</th>
                    <th width="*">Subject content</th>
                    <th width="140">adviser</th>
                    <th width="120">operate</th>
                </tr>
                <?php if(is_array($meGpList)): $i = 0; $__LIST__ = $meGpList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($index["gpId"]); ?></td>
                    <td>
                        <?php echo $index['gpSHState'] == 1 ? 'Software direction' : 'Hardware direction'; ?>
                    </td>
                    <td><?php echo ($index["gpTitle"]); ?></td>
                    <td><?php echo ($index["gpContent"]); ?></td>
                    <td><?php echo ($index["thrRealName"]); ?></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo ($index["gpId"]); ?>"/>
                        <?php if($index['sstate'] == 1): ?><a class="button border-green button-little dialogs" name="tuixuan" href="#" data-toggle="click" data-target="#mydialog" data-mask="1" data-width="30%">Withdraw from election</a>
                        <?php elseif($index['sstate'] == 2): ?>
                        <a class="button border-green button-little" href="javascript:window.location.href='<?php echo U('Student/detail');?>'">Has been determined</a>
                        <?php elseif($index['sstate'] == 3): ?>
                        <a class="button border-red button-little dialogs" name="shanchu" href="#" data-toggle="click" data-target="#myshanchudialog" data-mask="1" data-width="30%">Delete (abandoned)</a><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
           <!--  <div class="panel-foot text-center">
                page
            </div> -->
        </div>
    </form>  
    <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build   </p>
</div>

<div id="mydialog"> 
    <div class="dialog"> 
        <div class="dialog-head"> 
            <span class="close rotate-hover"></span> 
            <strong>Proposal operation</strong> 
        </div> 
        <div class="dialog-body">
            <div class="form-group">
                <p>Are you sure you want to withdraw from this topic？</p>
                <p>O(∩_∩)O~~</p>
            </div>
            <input type="button" class="button bg-main" value="choose" onclick="javascript:tuixuan();" />
            <button class="button bg-yellow" type="reset">Think again</button>
        </div> 
    </div> 
</div>
<div id="myshanchudialog"> 
    <div class="dialog"> 
        <div class="dialog-head"> 
            <span class="close rotate-hover"></span> 
            <strong>Proposal operation</strong> 
        </div> 
        <div class="dialog-body">
            <div class="form-group">
                <p>Do you want to delete the subject?</p>
                <p>O(∩_∩)O~~</p>
            </div>
            <input type="button" class="button bg-main" value="delete" onclick="javascript:shanchu();" />
            <button class="button bg-yellow" type="reset">Think again</button>
        </div> 
    </div> 
</div>
<script>
    var ID = null;
    function tuixuan(){
        window.location.href = "<?php echo U('Student/tuixuan/id/" + ID + "');?>";
    }
    function shanchu(){
        window.location.href = "<?php echo U('Student/shanchu/id/" + ID + "');?>";
    }
    $(function(){
        $(".table a[name='tuixuan']").click(function(){
            ID = $(this).parent().find("input[name='id']").val();
        });
        $(".table a[name='shanchu']").click(function(){
            ID = $(this).parent().find("input[name='id']").val();
        });
    });
</script>

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