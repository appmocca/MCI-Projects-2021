<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<head>

    <style>
        body:nth-child(2) {
            background-image: url("/Public/Images/2.jpg");
            background-size: 100vw 100vh;
            background-repeat: no-repeat;
        }
        
        #login_frame {
            width: 400px;
            height: 300px;
            padding: 13px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -200px;
            margin-top: -200px;
            background-color: rgba(9, 58, 58, 0.5);
            border-radius: 10px;
        }
        
        #header {
            font-size: 20px;
            color: rgb(25, 46, 66);
            text-align: center;
            padding: 5px;
        }
        
        #btn_login {
            font-size: 28px;
            font-family: Arial;
            width: 250px;
            height: 28px;
            line-height: 28px;
            text-align: center;
            border-radius: 6px;
            border: 0;
            float: center;
        }
    </style>
</head>

<body>
    <div id="header">
        <h1>Register for external users</h1>
    </div>
    <div class="admin" id="login_frame">
        <form method="post" class="form-x" action="<?php echo U('Add/register');?>">
            <!-- <div class="form-group" >
                    <div class="label"><label for="name">ID</label></div>
                    <div class="field">
                        <input type="text" class="input" id="id" name="id" size="50" placeholder="ID" data-validate="required:Please fill the user id" />
                    </div>
                </div> -->
            <div class="form-group">
                <div class="label"><label for="name">Account name</label></div>
                <div class="field">
                    <input type="text" class="input" id="name" name="name" size="50" placeholder="Login account" data-validate="required:Please fill the username" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="pwd">Account password</label></div>
                <div class="field">
                    <input type="password" class="input" name="pwd" size="50" placeholder="please fill the password" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="name"> Realname</label></div>
                <div class="field">
                    <input type="text" class="input" id="realName" name="realName" size="50" placeholder="Teacher's name" data-validate="required:Please fill the realname" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label>Gender</label></div>
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
            <div class="form-button" id="btn_login">
                <button class="button bg-main" type="submit">submit </button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="button bg-yellow form-reset " type="reset">Reset</button>
            </div>
        </form>
        <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build</p>
    </div>
</body>

</html>