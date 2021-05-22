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
    <form method="post" class="form-x" action="<?php echo U('Student/modifyInfo');?>">
        <div class="form-group">
            <div class="label"><label for="name">user account</label></div>
            <div class="field">
                <input type="text" class="input" id="name" name="name" size="50" placeholder="name of user" data-validate="required:请Fill in the new user name" value="<?php echo ($usrInfo['stuCard']); ?>" disabled="disabled" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="pwd">user password</label></div>
            <div class="field fieldme">
                <div class="input-group">
                    <span class="addon"><input name="chkPwd" type="checkbox" value="1" /></span>
                    <input type="password" class="input" name="pwd" size="50" value="<?php echo ($usrInfo['stuPwd']); ?>" placeholder="Please enter the original password" disabled="disabled" />
                </div>
            </div>
        </div>
        <div class="pwdPanel" style="padding-bottom: 10px; display:none;">
            <div class="form-group">
                <div class="label"><label for="pwd">New password</label></div>
                <div class="field">
                    <input type="password" class="input" name="newpwd" size="50" value=" " placeholder="请Enter a new login password with no less than 5 digits" 
                    data-validate="required:Please fill in the password,length#>=5:Password length does not meet the requirements (>5)"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="confirmpwd">Confirm password</label></div>
                <div class="field">
                    <input type="password" class="input" name="confirmpwd" size="50" value=" " placeholder="Confirm the new login password again"
                    data-validate="required:Please fill in the confirmation password,repeat#newpwd:The passwords entered twice are inconsistent" />
                </div>
            </div>  
        </div>
        <div class="form-group">
            <div class="label"><label for="realName">User name</label></div>
            <div class="field">
                <input type="text" class="input" id="realName" name="realName" size="50" placeholder="User name" data-validate="required:Please fill in the user name" value="<?php echo ($usrInfo['stuRealName']); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">User age</label></div>
            <div class="field">
                <input type="text" class="input" id="age" name="age" size="50" placeholder="User age" data-validate="required:Please fill in the user age,number:User age must be an integer" value="<?php echo ($usrInfo['stuAge']); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label>User gender</label></div>
            <div class="field">
                <div class="button-group radio"> 
                    <label class="button active">
                        <input name="sex" value="1" <?php echo $usrInfo['stuSex'] == 1 ? 'checked="checked"' : null; ?> type="radio"><span class="icon icon-male"></span> Male
                    </label> 
                    <label class="button ">
                        <input name="sex" value="2" <?php echo $usrInfo['stuSex'] == 2 ? 'checked="checked"' : null; ?> type="radio"><span class="icon icon-female"></span> Female
                    </label> 
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="phone">contact way</label></div>
            <div class="field">
                <input type="text" class="input" id="phone" name="phone" size="50" placeholder="contact way" data-validate="required:Please fill in the user contact information,number:Please fill in the correct contact information" value="<?php echo ($usrInfo['stuPhone']); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="email">e-mail address</label></div>
            <div class="field">
                <input type="text" class="input" id="email" name="email" size="50" placeholder="e-mail address" data-validate="required:Please fill in the email address,email:Please fill in the correct email address" value="<?php echo ($usrInfo['stuEmail']); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="usr_lvl">major field</label></div>
            <div class="field">
                <select class="input" name="usr_lvl" id="usr_lvl" data-validate="required:Please select a user group">
                    <option value="">Please choose</option> 
                    <?php if(is_array($majorList)): $i = 0; $__LIST__ = $majorList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><option value="<?php echo ($index["majorId"]); ?>" <?php echo $index['majorId'] == $usrInfo['stuMajor'] ? 'selected="selected"' : null;?> ><?php echo ($index["majorName"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div> 
        
        <div class="form-button">
            <input type="hidden" name="usr_id" value="<?php echo ($usrInfo[stuId]); ?>"/> 
            <button class="button bg-main" type="submit">submit</button>
            <button class="button bg-yellow form-reset " type="reset">retreat</button>  
        </div>                
    </form>   
    <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build   </p>
</div>

<script>
    $(function(){
        var t = $("input[name='pwd']").val();
        $(".pwdPanel input[name='newpwd']").val(t);
        $(".pwdPanel input[name='confirmpwd']").val(t);
        function monitor(mythis){
            
            if(mythis.is(':checked')){
                $(".pwd").html('Modify password');
                $("input[name='pwd']").val("");
                $("input[name='pwd']").attr('disabled', false);
                $(".pwdPanel").show();
                $(".pwdPanel input[name='newpwd']").val("");
                $(".pwdPanel input[name='confirmpwd']").val("");
            }else{
                $(".pwd").html('Login password');
                $("input[name='pwd']").val(t);
                $("input[name='pwd']").attr('disabled', true);
                $(".pwdPanel").hide();
                $(".pwdPanel input[name='newpwd']").val(t);
                $(".pwdPanel input[name='confirmpwd']").val(t);
            }
        }

        $(".fieldme input[type='checkbox']").click(function(){
            monitor($(this));
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