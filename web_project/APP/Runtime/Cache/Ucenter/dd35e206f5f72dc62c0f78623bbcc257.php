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
        <form method="post" class="form-x" action="<?php echo U('Teacher/modifyInfo');?>">
            <div class="form-group">
                <div class="label"><label for="name">Login account</label></div>
                <div class="field">
                    <input type="text" class="input" name="usrname" size="50" value="<?php echo ($usrDetail['thrName']); ?>" disabled="disabled" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label class="oldpwd" for="oldpwd">Login password</label></div>
                <div class="field fieldme">
                    <div class="input-group">
                        <span class="addon"><input name="chkPwd" type="checkbox" value="1" /></span>
                        <input type="password" class="input" name="oldpwd" size="50" value="<?php echo ($usrDetail['thrPwd']); ?>" placeholder="Please enter the original password" disabled="disabled" />
                    </div>
                </div>
            </div>
            <div class="pwdPanel" style="padding-bottom: 10px; display:none;">
                <div class="form-group">
                    <div class="label"><label for="pwd">New password</label></div>
                    <div class="field">
                        <input type="password" class="input" name="newpwd" size="50" value=" " placeholder="Please enter a new login password with no less than 5 digits" 
                        data-validate="required:Please fill in the password,length#>=5:Password length does not meet the requirements (>5)"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="pwd">Confirm password</label></div>
                    <div class="field">
                        <input type="password" class="input" name="confirmpwd" size="50" value=" " placeholder="Confirm the new login password again"
                        data-validate="required:Please fill in the confirmation password,repeat#newpwd:The passwords entered twice are inconsistent" />
                    </div>
                </div>  
            </div>
            <div class="form-group">
                <div class="label"><label for="age">Real name</label></div>
                <div class="field">
                    <input type="text" class="input" name="realName" size="50" placeholder="Real name" data-validate="required:Please fill in your real name" value="<?php echo ($usrDetail['thrRealName']); ?>" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="age">User age</label></div>
                <div class="field">
                    <input type="text" class="input" name="age" size="50" placeholder="User age" data-validate="required:Please fill in the user age,number:User age must be an integer" value="<?php echo ($usrDetail['thrAge']); ?>" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label>User gender</label></div>
                <div class="field">
                    <div class="button-group radio"> 
                        <label class="button active">
                            <input name="sex" value="1" <?php echo $usrDetail['thrSex'] == 1 ? 'checked="checked"' : null; ?> type="radio"><span class="icon icon-male"></span> male
                        </label> 
                        <label class="button ">
                            <input name="sex" value="2" <?php echo $usrDetail['thrSex'] == 2 ? 'checked="checked"' : null; ?> type="radio"><span class="icon icon-female"></span> female
                        </label> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="phone">contact way</label></div>
                <div class="form-group">
                    <div class="field">
                      <div class="input-group">
                        <span class="addon"><input name="chkPhone" type="checkbox" value="1"  <?php echo $usrDetail['showState'][0] == 1 ? 'checked="checked"' : null; ?>/></span>
                        <input type="text" class="input" name="Phone" size="50" placeholder="Contact information, if checked, students can see it" value="<?php echo ($usrDetail['thrPhone']); ?>" data-validate="required:Please fill in the contact information" />
                      </div>
                    </div>
                </div>
            <div class="form-group">
                <div class="label"><label for="email">e-mail address</label></div>
                <div class="form-group">
                    <div class="field">
                      <div class="input-group">
                        <span class="addon"><input name="chkEmail" type="checkbox" value="1"  <?php echo $usrDetail['showState'][1] == 1 ? 'checked="checked"' : null; ?> /></span>
                        <input type="text" class="input" name="Email" size="50" placeholder="Email address, if checked, students can see it" value="<?php echo ($usrDetail['thrEmail']); ?>"
                        data-validate="required:Please fill in the email address"/>
                      </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="address">business address</label></div>
                <div class="form-group">
                    <div class="field">
                      <div class="input-group">
                        <span class="addon"><input name="chkAddress" type="checkbox" value="1"  <?php echo $usrDetail['showState'][2] == 1 ? 'checked="checked"' : null; ?> /></span>
                        <input type="text" class="input" name="Address" size="50" placeholder="Office address, if checked, students can see it" value="<?php echo ($usrDetail['thrAddress']); ?>" data-validate="required:Please fill in the office address" />
                      </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="usr_lvl">research field</label></div>
                <div class="form-group">
                    <div class="field">
                      <div class="input-group">
                        <span class="addon"><input name="chkStudy" type="checkbox" value="1"  <?php echo $usrDetail['showState'][3] == 1 ? 'checked="checked"' : null; ?> /></span>
                        <input type="text" class="input" name="Study" size="50" placeholder="Research direction, if checked, students can see it" value="<?php echo ($usrDetail['thrStudy']); ?>" data-validate="required:Please fill in the research direction"/>
                      </div>
                    </div>
                </div>
            </div> 
            
            <div class="form-button">
                <input type="hidden" name="usrId" value="<?php echo ($usrDetail['thrId']); ?>"/> 
                <button class="button bg-main" type="submit">submit</button>
                <button class="button bg-yellow " type="button">retreat</button>  
            </div>                
        </form>   
        <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build   </p>
</div>
        
    <script>
        $(function(){
            var t = $("input[name='oldpwd']").val();
            $(".pwdPanel input[name='newpwd']").val(t);
            $(".pwdPanel input[name='confirmpwd']").val(t);
            function monitor(mythis){
                
                if(mythis.is(':checked')){
                    $(".oldpwd").html('修改密码');
                    $("input[name='oldpwd']").val("");
                    $("input[name='oldpwd']").attr('disabled', false);
                    $(".pwdPanel").show();
                    $(".pwdPanel input[name='newpwd']").val("");
                    $(".pwdPanel input[name='confirmpwd']").val("");
                }else{
                    $(".oldpwd").html('登陆密码');
                    $("input[name='oldpwd']").val(t);
                    $("input[name='oldpwd']").attr('disabled', true);
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
    </section>

    <footer>
        
    </footer>
</body>
</html>