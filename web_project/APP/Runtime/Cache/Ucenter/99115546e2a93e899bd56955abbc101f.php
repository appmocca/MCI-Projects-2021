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
        body:nth-child(2) {
            background-image: url("/Public/Images/bg.jpg");
            background-size: 100vw 100vh;
            background-repeat: no-repeat;
        }
        
        #header {
            color: white;
            text-align: center;
            padding: 30px;
        }
        
        .loginBox {
            width: 400px;
            margin: 10% auto;
            border: 1px dotted #ebedf3;
            padding: 16px 10px 16px 10px;
            background-color: rgba(148, 185, 185, 0.5);
            border-radius: 5px;
        }
        
        .loginBox>h2 {
            text-align: center;
            color: white;
        }
        
        body label {
            color: white;
        }
        
        body .button:hover,
        body .button:active,
        .button.active {
            background-color: lightgrey;
        }
    </style>
</head>

<body>
    <div id="header">
        <h1>Tapping into community-lead</h1>
    </div>



    <div class="container">
        <div class="loginBox">
            <h2>Proposal Section System Login</h2>
            <br>
            <form action="<?php echo U('Index/doLogin');?>" class="form-x" method="post">
                <div class="form-group">
                    <label class="label" style="width:30%;">Account:</label>
                    <div class="field field-icon" style="width:65%;">
                        <span class="icon icon-user"></span>
                        <input style="width:215px;" type="text" class="input input-auto" id="usrname" name="usrname" size="30" placeholder="loginAcc" data-validate="required:Please input login account" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" style="width:30%;">Password:</label>
                    <div class="field field-icon" style="width:65%;">
                        <span class="icon icon-key"></span>
                        <input style="width:215px;" type="password" class="input input-auto" id="usrpwd" name="usrpwd" size="30" placeholder="loginPwd" data-validate="required:please input login password,length#>4:at least 4 characters" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" style="width: 30%;">Type:</label>
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
                    <button type="submit" class="button bg-green" style="margin-left: 48px;">Login</button> &nbsp;&nbsp;
                    <button type="reset" class="button bg-mix" style="margin-left: 48px;">Reset</button>
                </div>
                <div class="form-group">
                    <label class="label" style="width:50%;"> don't have account?</label>
                </div>
                <input type="button" class="button bg-green" style="margin-left: 48px;" value="register now" onclick="javascript:window.location.href='<?php echo U('Index/register');?>';" />
            </form>

        </div>
    </div>

</body>

</html>