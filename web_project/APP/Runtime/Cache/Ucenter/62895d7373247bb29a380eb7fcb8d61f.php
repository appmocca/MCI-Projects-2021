<?php if (!defined('THINK_PATH')) exit();?>
    <div class="admin">
        <form method="post" class="form-x" action="<?php echo U('Index/addusr');?>">
            <div class="form-group">
                <div class="label"><label for="name">user account</label></div>
                <div class="field">
                    <input type="text" class="input" id="name" name="name" size="50" placeholder="name of user" data-validate="required:Please fill in the new user name" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="pwd">user password</label></div>
                <div class="field">
                    <input type="password" class="input" id="pwd" name="pwd" size="50" placeholder="User password, with digits no less than 5" data-validate="required:Please fill in the password,length#>=5:Password length does not meet the requirements (>5)" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="comfirmpwd">Confirm password</label></div>
                <div class="field">
                    <input type="password" class="input" id="comfirmpwd" name="comfirmpwd" size="50" placeholder="User password, with digits no less than 5" data-validate="required:Please fill in the confirmation password,repeat#pwd:The passwords entered twice are inconsistent" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="name">Real name</label></div>
                <div class="field">
                    <input type="text" class="input" id="realname" name="realname" size="50" placeholder="Real name" data-validate="required:Please fill in the real name of the user" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label>User gender</label></div>
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
            <div class="form-group">
                <div class="label"><label for="age">User age</label></div>
                <div class="field">
                    <input type="text" class="input" id="age" name="age" size="50" placeholder="User age" data-validate="required:Please fill in the user age,number:User age must be an integer" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="phone">contact way</label></div>
                <div class="field">
                    <input type="text" class="input" id="phone" name="phone" size="50" placeholder="contact way" data-validate="number:Please fill in the correct contact information" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="email">e-mail address</label></div>
                <div class="field">
                    <input type="text" class="input" id="email" name="email" size="50" placeholder="Please fill in the email address" data-validate="email:Please fill in the correct email address" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="address">home address</label></div>
                <div class="field">
                    <input type="text" class="input" id="address" name="address" size="50" placeholder="Please fill in the user's address, which is recommended to be within 20 words"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label>User group</label></div>
                <div class="field">
                    <select class="input" name="state" id="state" data-validate="required:Please fill in and select the correct user group">
                        <option value="">Please choose</option> 
                        <option value="1">Super administrator</option>
                        <option value="2">Teacher administrator</option>
                        <option value="3">Student administrator</option>
                    </select>
                </div>
            </div>
            <div class="form-button">
                <button class="button bg-main" type="submit">submit</button>
                <button class="button bg-yellow form-reset " type="reset">Reset</button>
            </div>
        </form>  
        <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build   </p>
    </div>