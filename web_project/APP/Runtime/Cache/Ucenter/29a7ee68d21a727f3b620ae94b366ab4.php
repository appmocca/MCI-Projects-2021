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
    <form method="post" class="form-x" action="<?php echo U('Teacher/addDesign');?>">
         <div class="form-group">
            <div class="label"><label for="title">Proposal topic</label></div>
            <div class="field">
                <input type="text" class="input" name="title" size="50" placeholder="Proposal topic" data-validate="required:Please fill in the completed questions" value="" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="aim">Proposal purpose</label></div>
            <div class="field">
                <textarea class="input" name="aim" rows="3" cols="30" placeholder="Proposal purpose" data-validate="required:Please fill in the completed questions" ></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="content">Proposal content</label></div>
            <div class="field">
                <textarea class="input" name="content" rows="3" cols="30" placeholder="Proposal content" data-validate="required:Please fill in the completed questions" ></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="request">Proposal outcomes</label></div>
            <div class="field">
                <textarea class="input" name="request" rows="3" cols="30" placeholder="Proposal outcomes" data-validate="required:Please fill in the completed questions" ></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="must">Essential knowledge</label></div>
            <div class="field">
                <textarea class="input" name="must" rows="3" cols="30" placeholder="Essential knowledge" data-validate="required:Please fill in the completed questions" ></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="formal">Submission form(optional)</label></div>
            <div class="field">
                <input type="text" class="input" name="formal" size="50" placeholder="Submission form(optional)" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="other">others</label></div>
            <div class="field">
                <textarea class="input" name="other" rows="3" cols="30" placeholder="other"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label>Subject direction</label></div>
            <div class="field">
                <div class="button-group radio"> 
                    <p><label class="label_input"></label><select style="width:283px; height:28px;">
                        <option value ="COMP"> COMP SCI 1104 </option>
                        <option value ="2"> COMP SCI 2008 </option>
                        <option value ="3"> COMP SCI 3020 </option>
                        <option value ="4"> COMP SCI 3006</option>
                        <option value ="5"> COMP SCI 3310 </option>
                        <option value ="6"> COMP SCI 3311 </option>
                        <option value ="7"> COMP SCI 3312 </option>
                        <option value ="8"> COMP SCI 3313 </option>
                        <option value ="9"> COMP SCI 4015 A/B </option>
                        <option value ="10"> COMP SCI 4414A/B </option>
                        <option value ="11"> COMP SCI 7015 </option>
                        <option value ="12"> COMP SCI 7096A/B </option>
                        <option value ="13"> COMP SCI 7098 </option>
                        <option value ="14"> COMP SCI 7099 A/B </option>
                        <option value ="15"> COMP SCI 7097 A/B </option>
                    </select></p>
                </div>
            </div>
        </div>
        <div class="form-button">
            <button class="button bg-main" type="submit">submit</button>
            <button class="button bg-yellow form-reset " type="reset">retreat</button>  
        </div>                
    </form>   
    <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build   </p>
</div>
    
 </div>
    </section>

    <footer>
        
    </footer>
</body>
</html>