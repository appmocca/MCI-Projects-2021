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
    <form method="post" class="form-x" action="<?php echo U('Teacher/updateGp');?>" enctype="multipart/form-data">
         <div class="form-group">
            <div class="label"><label for="title">Proposal topic</label></div>
            <div class="field">
                <input type="text" class="input" name="title" size="50" placeholder="Proposal topic" data-validate="required:Please fill in the completed questions" value="<?php echo ($gpDetail['gpTitle']); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="aim">Proposal purpose</label></div>
            <div class="field">
                <textarea class="input" name="aim" rows="3" cols="30" placeholder="Proposal purpose" data-validate="required:Please fill in the completed questions" ><?php echo ($gpDetail['gpAim']); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="content">Proposal content</label></div>
            <div class="field">
                <textarea class="input" name="content" rows="3" cols="30" placeholder="Proposal content" data-validate="required:Please fill in the completed questions" ><?php echo ($gpDetail['gpContent']); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="request">Proposal outcomes</label></div>
            <div class="field">
                <textarea class="input" name="request" rows="3" cols="30" placeholder="Proposal outcomes" data-validate="required:Please fill in the completed questions" ><?php echo ($gpDetail['gpRequest']); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="must">Essential knowledge</label></div>
            <div class="field">
                <textarea class="input" name="must" rows="3" cols="30" placeholder="Essential knowledge" data-validate="required:Please fill in the completed questions" ><?php echo ($gpDetail['gpMust']); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="formal">Submission form(optional)</label></div>
            <div class="field">
                <input type="text" class="input" name="formal" size="50" placeholder="Submission form(optional)" value="<?php echo ($gpDetail['gpFormal']); ?>"  />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="formal">Upload file</label></div>
            <div class="field">
                <input type="file" name="upfile" id="inputfile">

                <?php if(!empty($gpDetail['filePath'])): ?><input  readonly name="file" class="input" value="<?php echo ($gpDetail['filePath']); ?>"><?php endif; ?>
            </div>

        </div>
        <div class="form-group">
            <div class="label"><label for="others">comment</label></div>
            <div class="field">
                <textarea class="input" name="others" rows="3" cols="30" placeholder="comment"><?php echo ($gpDetail['gpOthers']); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label>Subject direction</label></div>
            <div class="field">
                <div class="button-group radio"> 
                    <p><label class="label_input"></label>
                        <select style="width:283px; height:28px;">
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 1104" ? 'selected="selected"' : '' ;?> value ="COMP SCI 1104"> COMP SCI 1104 Grand Challenges in Computer Science</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 2008" ? 'selected="selected"' : '' ;?> value ="COMP SCI 2008"> COMP SCI 2008 Topics in Computer Science</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 3020" ? 'selected="selected"' : '' ;?> value ="COMP SCI 3020"> COMP SCI 3020 Advanced Topics in Computer Science</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 3006" ? 'selected="selected"' : '' ;?> value ="COMP SCI 3006"> COMP SCI 3006 Software Engineering & Project</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 3310" ? 'selected="selected"' : '' ;?> value ="COMP SCI 3310"> COMP SCI 3310 Software Engineering & Project (Artificial Intelligence)</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 3311" ? 'selected="selected"' : '' ;?> value ="COMP SCI 3311" > COMP SCI 3311 Software Engineering & Project (Data Science)</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 3312" ? 'selected="selected"' : '' ;?> value ="COMP SCI 3312" > COMP SCI 3312 Software Engineering & Project (Cybersecurity)</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 3313" ? 'selected="selected"' : '' ;?> value ="COMP SCI 3313" > COMP SCI 3313 Software Engineering & Project (Distributed Systems & Networking)</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 4015A/B" ? 'selected="selected"' : '' ;?> value ="COMP SCI 4015A/B" > COMP SCI 4015A/B Computer Science Honours Research Project Part A</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 4414A/B" ? 'selected="selected"' : '' ;?> value ="COMP SCI 4414A/B" > COMP SCI 4414A/B Software Engineering Honours Research Project A</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 7015" ? 'selected="selected"' : '' ;?> value ="COMP SCI 7015"> COMP SCI 7015 Software Engineering & Project</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 7096A/B" ? 'selected="selected"' : '' ;?> value ="COMP SCI 7096A/B"> COMP SCI 7096A/B Master of Software Engineering Project Part A/B</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 7098" ? 'selected="selected"' : '' ;?> value ="COMP SCI 7098"> COMP SCI 7098 Master of Computing & Innovation Project</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 7099A/B" ? 'selected="selected"' : '' ;?> value ="COMP SCI 7099A/B"> COMP SCI 7099A/B Master Computer Science Research Project - Part A/B</option>
                            <option <?php echo $gpDetail['gpSHState'] == "COMP SCI 7097A/B" ? 'selected="selected"' : '' ;?> value ="COMP SCI 7097A/B"> COMP SCI 7097A/B Master Data Science Research Project Part A/B </option>
                            <option <?php echo $gpDetail['gpSHState'] == "Unsure" ? 'selected="selected"' : '' ;?> value ="Unsure"> Unsure </option>
                    </select>
                    </p>
                </div>
            </div>
        </div>
        <div class="form-button">
            <input type="hidden" value="<?php echo ($gpDetail['gpId']); ?>" name="id" />
            <button class="button bg-main" type="submit">modify</button>
            <a class="button bg-yellow " href="javascript:history.go(-1);">retreat</a>  
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