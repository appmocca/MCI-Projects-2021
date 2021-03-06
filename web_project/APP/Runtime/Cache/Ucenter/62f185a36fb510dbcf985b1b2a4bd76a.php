<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en-AU">
<head>
    <title>HTML template of jigsaw puzzle front-end frame</title>
    <meta name="keywords" content="keywords" />
    <meta name="description" content="description" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Public/Styles/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Styles/css/admin.css">
    <link rel="stylesheet" href="/Public/Styles/css/page.css">
    <script src="/Public/Styles/js/jquery.js"></script>
    <script src="/Public/Styles/js/pintuer.js"></script>
    <script src="/Public/Styles/js/respond.js"></script>

    <style>
        body{padding-top: 48px;}
        .bg22{background-color: #222222;}
        header > .layout_top{height: 48px; z-index: 9999;}
        .layout_top .nav-p{color: #bcbcbc; display: inline-block; float: right; margin-top: 20px; margin-right: 60px;}
        .layout_top .nav-p a{color: #bcbcbc;}
        .layout_top .nav-p a:hover{color: #ffffff;}
        
        section > .line .contBox{min-height: 600px;}
        .contBox .lls{height: 50px; line-height: 50px; width: 100%; display: block; color: #9C9895; text-indent: 20px; border-top: 1px solid #080808;}
        .contBox .lls:hover, .contBox .active{background-color: #080808; color: #ffffff;}
        .contBox .bread-me{}
        .contBox .adminme{padding: 20px;}
        section .lineme{min-width: 100%;}
        .lineme .xm2me{width: 16.6667%; position: absolute; top: 48px; left: -16.6667%; z-index: 100;}
        .lineme .xm10me{width: 80%; min-width: 800px; margin: 0px auto; padding: 0px 8px; }
    </style>

</head>
<body>
    <header>
        <div class="layout layout_top bg22 fixed-top">
            <p class="nav-p">
                Welcome，<?php echo ($usrName); ?>
                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                <a href="<?php echo U('Student/loginout');?>">cancel</a>
                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                <a href="<?php echo U('Student/index');?>">home page</a>
            </p>
        </div>
    </header>

    <section>
        <div class="lineme">
            <div class="xm2me bg22 contBox" style="height:100%;">
                <aside>
                <ul class="nav">
                    <li><a href="<?php echo U('Student/index');?>" class="lls">Login information</a></li>
                    <li><a href="<?php echo U('Student/person');?>" class="lls">Personal management</a></li>
                    <li><a href="<?php echo U('Student/bslist');?>" class="lls">Proposal list</a></li>
                    <li><a href="<?php echo U('Student/detail');?>" class="lls">Proposal details</a></li>
                    <li><a href="<?php echo U('Student/msg');?>" class="lls">Message management</a></li>
                    <li><a href="<?php echo U('Student/plan');?>" class="lls">Finish the schedule</a></li>
                    <li><a href="<?php echo U('Student/choose');?>" class="lls active">Proposal topic selection</a></li>
                </ul>
                </aside>
            </div>
            <div class="xm10me contBox">
                <div class="bread-me">
                    <ul class="bread bg">
                      <li><a href="<?php echo U('Student/index');?>" class="icon-home"> home page</a></li>
                      <li><?php echo ($title); ?></li>
                    </ul>
                </div>
                <div class="admin-me">
                    <div class="panel admin-panel">
                        <div class="panel-head">
                            <form action="#" class="form-inline">
                                <div class="form-group">
                                    <div class="label"><label for="GPName">Search Proposal &nbsp </label></div>
                                    <div class="field">
                                        <input type="text" class="input" id="GPName" name="GPName" style="width:200px; height:30px;" value="<?php echo isset($seachData['GPName']) && !empty($seachData['GPName']) ? $seachData['GPName'] : '';?>" placeholder="Proposal name" />
                                    </div>
                                </div>
                                &nbsp;
                                <div class="form-group">
                                    <div class="label"><label for="GPKey">keywords  &nbsp</label></div>
                                    <div class="field">
                                        <input type="text" class="input" id="GPKey" name="GPKey" style="width:200px; height:30px;" value="<?php echo isset($seachData['GPKey']) && !empty($seachData['GPKey']) ? $seachData['GPKey'] : '';?>" placeholder="keywords" />
                                    </div>
                                </div>
                                &nbsp;
                                <div class="form-group">
                                    <div class="label"><label for="GPThrName">Supervised Professor  &nbsp</label></div>
                                    <div class="field">
                                        <select class="input" name="GPThrName" id="GPThrName" style="width:200px; height:30px;">
                                            <option value="">Select</option> 
                                            <?php if(is_array($thrList)): $i = 0; $__LIST__ = $thrList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><option value="<?php echo ($index["gpThrId"]); ?>" <?php echo $index['gpThrId'] == $seachData['GPThrName'] ? "selected='selected'" : "";?>><?php echo ($index["thrRealName"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                &nbsp;
                                <div class="form-group">
                                    <div class="label"><label for="GPState">Proposal Status  &nbsp</label></div>
                                    <div class="field">
                                        <select class="input" name="GPState" id="GPState" style="width:200px; height:30px;">
                                            <option value="">Select</option> 
                                            <option <?php echo $seachData['GPState'] == 1 ? 'selected="selected"' : '' ;?> value="1">Not selected</option>
                                            <option <?php echo $seachData['GPState'] == 2 ? 'selected="selected"' : '' ;?> value="2">Has been determined</option>
                                        </select>
                                    </div>
                                </div>
                                &nbsp;
                                <div class="form-group">
                                    <div class="label"><label for="GPSH">Proposal Direction &nbsp</label></div>
                                    <div class="field">
                                        <select class="input" name="GPSH" id="GPSH" style="width:200px; height:30px;">
                                            <option value="">Select</option> 
                                            <option <?php echo $seachData['GPSH'] == 1 ? 'selected="selected"' : '' ;?> value="COMP SCI 1104">COMP SCI 1104 Grand Challenges in Computer Science</option>
                                            <option <?php echo $seachData['GPSH'] == 2 ? 'selected="selected"' : '' ;?> value="COMP SCI 2008">COMP SCI 2008 Topics in Computer Science</option>
                                            <option <?php echo $seachData['GPSH'] == 3 ? 'selected="selected"' : '' ;?> value="COMP SCI 3020">COMP SCI 3020 Advanced Topics in Computer Science</option>
                                            <option <?php echo $seachData['GPSH'] == 4 ? 'selected="selected"' : '' ;?> value="COMP SCI 3006 ">COMP SCI 3006 Software Engineering & Project</option>
                                            <option <?php echo $seachData['GPSH'] == 5 ? 'selected="selected"' : '' ;?> value="COMP SCI 3310">COMP SCI 3310 Software Engineering & Project (Artificial Intelligence)</option>
                                            <option <?php echo $seachData['GPSH'] == 6 ? 'selected="selected"' : '' ;?> value="COMP SCI 3311">COMP SCI 3311 Software Engineering & Project (Data Science)</option>
                                            <option <?php echo $seachData['GPSH'] == 7 ? 'selected="selected"' : '' ;?> value="COMP SCI 3312">COMP SCI 3312 Software Engineering & Project (Cybersecurity)</option>
                                            <option <?php echo $seachData['GPSH'] == 8 ? 'selected="selected"' : '' ;?> value="COMP SCI 3313">COMP SCI 3313 Software Engineering & Project (Distributed Systems & Networking)</option>
                                            <option <?php echo $seachData['GPSH'] == 9 ? 'selected="selected"' : '' ;?> value="COMP SCI 4015">COMP SCI 4015 A/B Computer Science Honours Research Project Part A</option>
                                            <option <?php echo $seachData['GPSH'] == 10 ? 'selected="selected"' : '' ;?> value="COMP SCI 4414A/B">COMP SCI 4414A/B Software Engineering Honours Research Project A</option>
                                            <option <?php echo $seachData['GPSH'] == 11 ? 'selected="selected"' : '' ;?> value="COMP SCI 7015">COMP SCI 7015 Software Engineering & Project</option>
                                            <option <?php echo $seachData['GPSH'] == 12 ? 'selected="selected"' : '' ;?> value="COMP SCI 7096A/B">COMP SCI 7096A/B Master of Software Engineering Project Part A/B</option>
                                            <option <?php echo $seachData['GPSH'] == 13 ? 'selected="selected"' : '' ;?> value="COMP SCI 7098">COMP SCI 7098 Master of Computing & Innovation Project</option>
                                            <option <?php echo $seachData['GPSH'] == 14 ? 'selected="selected"' : '' ;?> value="COMP SCI 7099 A/B">COMP SCI 7099 A/B Master Computer Science Research Project - Part A/B</option>
                                            <option <?php echo $seachData['GPSH'] == 15 ? 'selected="selected"' : '' ;?> value="COMP SCI 7097 A/B">COMP SCI 7097 A/B Master Data Science Research Project Part A/B</option>

                                        </select>
                                    </div>
                                </div>
                                &nbsp;
                                &nbsp;
                                <div class="form-button">
                                    <button class="button bg-green" type="submit" style="width:100px; height:30px ;background-color:rgb(127, 127, 189);">search</button>
                                </div>
                            </form>
                        </div>
                        <br />
                        <br />
                        <table class="table table-hover table-striped table-bordered">
                            <tr>
                                <th width="60">number</th>
                                <th width="120">Proposal direction</th>
                                <th width="140">Topic title</th>
                                <th width="*">Proposal content</th>
                                <th width="120">adviser</th>
                                <th width="150">operate</th>
                            </tr>
                            <?php if(is_array($gpList)): $i = 0; $__LIST__ = $gpList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($index["gpId"]); ?></td>
                                <td>
                                    <?php echo ($index["gpSHState"]); ?>
                                </td>
                                <td><?php echo ($index["gpTitle"]); ?></td>
                                <td><?php echo ($index["gpContent"]); ?></td>
                                <td><?php echo ($index["thrRealName"]); ?></td>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo ($index["gpId"]); ?>"/>
                                    <input type="hidden" name="thrId" value="<?php echo ($index["gpThrId"]); ?>"/>
                                    <a class="button border-yellow button-little dialogs" name="check" href="#" data-toggle="click" data-target="#checkdialog" data-mask="1" data-width="60%">View</a>
                                    <?php
 $Fflag = false; for($i = 0; $i < count($choseIds); $i++){ if($choseIds[$i]['stlSpId'] == $index['gpId']){ $Fflag = true; } } ?>
                                    <?php if($Fflag == true): ?><!-- <a class="button border-black button-little">Selected</a> -->
                                    <?php else: ?>
                                    <?php if($FF == false): ?><a class="button border-green button-little dialogs" name="choose" href="#" data-toggle="click" data-target="#mydialog" data-mask="1" data-width="30%">Choose Topic</a><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                                </td>
                            </tr>
                            </volist>
                            </table>
                        <div class="panel-foot text-center">
                            <div class ="green-black"><?php echo ($page); ?></div>
                        </div>
                    </div>
                <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build   </p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        
    </footer>
    <div id="checkdialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>Project details</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group form-group-me">
                    <p>Subject number：  <a class="gpId" href="#"></a></p>
                    <p>Topic title：  <a class="gpTitle" href="#"></a></p>
                    <p>Subject direction：  <a class="gpSHState" href="#"></a></p>
                    <p>Subject content：  <a class="gpContent" href="#"></a></p>
                    <p>Purpose of the project：  <a class="gpAim" href="#"></a></p>
                    <p>Project outcomes：  <a class="gpRequest" href="#"></a></p>
                    <p>Essential knowledge：  <a class="gpMust" href="#"></a></p>
                    <p>Submission form(optional)：  <a class="gpFormal" href="#"></a></p>
                    <p>Other things：  <a class="gpOthers" href="#"></a></p>
                    <p>adviser：  <a class="thrRealName" href="#"></a></p>
                    <p>research field：  <a class="thrStudy" href="#"></a></p>
                    <p>contact way：  <a class="thrPhone" href="#"></a></p>
                    <p>e-mail address：  <a class="thrEmail" href="#"></a></p>
                    <p>business address：  <a class="thrAddress" href="#"></a></p>
                </div>
                <style>
                    .form-group-me p{margin-bottom: 5px;}
                </style>
            </div> 
        </div> 
    </div>

    <div id="mydialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>Subject operation</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group">
                    <p>Are you sure you want to select this topic?</p>
                    <p>O(∩_∩)O~~</p>
                </div>
                <input type="button" class="button bg-main" value="choose" onclick="javascript:choose();" />
                <button class="button bg-yellow" type="reset">Think again</button>
            </div> 
        </div> 
    </div>
    


    <script>
        var ID = null;
        var ThrId = null;
        function choose(){
            window.location.href = "<?php echo U('Student/chooseGP/id/" + ID +"/thrid/" + ThrId + "');?>";
        }
        $(function(){
            $(".table a[name='check']").click(function(){
                ID = $(this).parent().find("input[name='id']").val();
               
                $.ajax({
                    url: "<?php echo U('Student/checkGPDetail');?>",
                    data: {
                        id: ID,
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(data){
                        if(data.state == true){
                            for(var x in data.detail){
                                $(".dialog ." + x + "").html(data.detail[x]);
                            }
                        }else{
                            return ;
                        }
                    }
                }); 
            });

            $(".table a[name='choose']").click(function(){
                ID = $(this).parent().find("input[name='id']").val();
                ThrId = $(this).parent().find("input[name='thrId']").val();
            });

        });


        $(function(){

            $(document).mousemove(function(e){
                var screen_X = $(window).width();
                var screen_Y = $(window).height();

                var mouse_x = e.pageX;
                if(mouse_x >= 0 && mouse_x <= screen_X * 0.166667){
                    $(".xm2me").css('left', 0);
                }else{
                    $(".xm2me").css('left', -screen_X * 0.166667);
                }
            });
        });
    </script>
</body>
</html>