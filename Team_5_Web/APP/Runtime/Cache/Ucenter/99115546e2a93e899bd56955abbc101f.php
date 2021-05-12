<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en-AU">
<head>
    <title>User Login</title>
    <meta name="keywords" content="keywords" />
    <meta name="description" content="description" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Public/Styles/css/pintuer.css">
    <script src="/Public/Styles/js/jquery.js"></script>
    <script src="/Public/Styles/js/pintuer.js"></script>
    <script src="/Public/Styles/js/respond.js"></script>

    <style>
        body{background-image: url("/Public/Images/ubg.jpg");}
        .loginBox{width: 380px; position: absolute; left: 60%; top: 40%; border: 1px dotted #bcbcbc; padding:16px 0px 16px 32px; background-color: #ffffff; border-radius: 5px;}
        .loginBox > h2{text-align: center;}
    </style>
</head>
<body>
    <div class="container">
        <div class="loginBox">
            <h2>Proposal Section System Login</h2>
            <br>
            <form action="<?php echo U('Index/doLogin');?>"  class="form-x" method="post">
                <div class="form-group">
                    <label class="label">Account:</label>
                    <div class="field field-icon">
                        <span class="icon icon-user"></span>
                        <input type="text" class="input input-auto" id="usrname" name="usrname" size="30" placeholder="loginAcc" data-validate="required:Please input login account" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="label">Password:</label>
                    <div class="field field-icon">
                        <span class="icon icon-key"></span>
                        <input type="password" class="input input-auto" id="usrpwd" name="usrpwd" size="30" placeholder="loginPwd" data-validate="required:please input login password,length#>4:at least 4 characters" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="label">Type:</label>
                    <div class="button-group radio">
                        <label class="button active">
                            <input name="flag" value="s" checked="checked" type="radio">
                            <span class="icon icon-check text-green"></span> Student
                        </label> 
                        <label class="button">
                            <input name="flag" value="t" type="radio">
                            <span class="icon icon-check text-blue"></span> Teacher
                        </label> 
                    </div>
                </div>
                <div class="form-button">
                    <button type="submit" class="button bg-green">Login</button>
                    &nbsp;&nbsp;
                    <button type="reset" class="button bg-mix">Reset</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>