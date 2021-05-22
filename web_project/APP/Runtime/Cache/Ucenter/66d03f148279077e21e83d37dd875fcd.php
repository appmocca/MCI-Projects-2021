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
    <form method="post" class="form-x" action="#">
         <div class="form-group">
            <div class="label"><label for="name">Proposal ID</label></div>
            <div class="field">
                <input type="text" class="input" size="50" placeholder="Proposal Hao"  value="<?php echo ($meDetail["gpId"]); ?>" disabled="disabled" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="name">Proposal topic</label></div>
            <div class="field">
                <input type="text" class="input" size="50" placeholder="Proposal topic" value="<?php echo ($meDetail["gpTitle"]); ?>" disabled="disabled" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="pwd">Proposal purpose</label></div>
            <div class="field">
                <textarea class="input" rows="3" cols="30" placeholder="Proposal purpose" disabled="disabled"><?php echo ($meDetail["gpAim"]); ?> </textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">Proposal content</label></div>
            <div class="field">
                <textarea class="input" rows="3" cols="30" placeholder="Proposal content" disabled="disabled"><?php echo ($meDetail["gpContent"]); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">Proposal outcomes</label></div>
            <div class="field">
                <textarea class="input" rows="3" cols="30" placeholder="Proposal outcomes"disabled="disabled"><?php echo ($meDetail["gpRequest"]); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">Essential knowledge</label></div>
            <div class="field">
                <textarea class="input" rows="3" cols="30" placeholder="Essential knowledge"disabled="disabled"><?php echo ($meDetail["gpMust"]); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">other</label></div>
            <div class="field">
                <textarea class="input" rows="3" cols="30" placeholder="other"disabled="disabled"><?php echo ($meDetail["gpOthers"]); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">Submission form(optional)</label></div>
            <div class="field">
                <textarea type="text" class="input" size="50" placeholder="Submission form(optional)" disabled="disabled" ><?php echo ($meDetail["gpFormal"]); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="phone">adviser</label></div>
            <div class="field">
                <input type="text" class="input" size="50" placeholder="adviser"  disabled="disabled" value="<?php echo ($meDetail["thrRealName"]); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="email">contact way</label></div>
            <div class="field">
                <input type="text" class="input" size="50" placeholder="contact way"  disabled="disabled" value="<?php echo ($meDetail["thrPhone"]); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">e-mail address</label></div>
            <div class="field">
                <input type="text" class="input" size="50" placeholder="e-mail address"  disabled="disabled" value="<?php echo ($meDetail["thrEmail"]); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="address">office address</label></div>
            <div class="field">
                <input type="text" class="input" size="50" placeholder="office space"  disabled="disabled" value="<?php echo ($meDetail["thrAddress"]); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">research field</label></div>
            <div class="field">
                <input type="text" class="input" size="50" placeholder="research field"  disabled="disabled"value="<?php echo ($meDetail["thrStudy"]); ?>" />
            </div>
        </div>

                      
    </form>   
    <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build  </p>
</div>


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