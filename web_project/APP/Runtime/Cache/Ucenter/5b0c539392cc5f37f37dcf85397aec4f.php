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
    <form method="post">
        <div class="panel admin-panel">
            <div class="panel-head"><strong>Content list</strong></div>
            <div class="padding border-bottom">
                <input type="button" class="button button-small border-green" value="Add finish design" onclick="javascript:window.location.href='<?php echo U('Teacher/add');?>';" />
            </div>
            <table class="table table-hover">
                <tr>
                    <th width="80">Subject number</th>
                    <th width="110">Subject name</th>
                    <th width="*">Subject content</th>
                    <th width="*">Others</th>
                    <th width="160">Essential knowledge</th>
                    <th width="140">operate</th>
                    <th width="90">condition</th>
                </tr>
                <?php if(is_array($bsList)): $i = 0; $__LIST__ = $bsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($index["gpId"]); ?></td>
                        <td><?php echo ($index["gpTitle"]); ?></td>
                        <td><?php echo ($index["gpContent"]); ?></td>
                        <td><?php echo ($index["gpOthers"]); ?></td>
                        <td><?php echo ($index["gpMust"]); ?></td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo ($index["gpId"]); ?>" />
                            <a class="button border-yellow button-little dialogs" name="check" href="#" data-toggle="click" data-target="#checkdialog" data-mask="1" data-width="50%">view</a>
                            <?php if($index["state"] < 2): ?><a class="button border-blue button-little" name="modify" href="#">modify</a>
                                <a class="button border-green button-little dialogs" name="delete" href="#" data-toggle="click" data-target="#mydialog" data-mask="1" data-width="30%">delete</a><?php endif; ?>
                        </td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo ($index["gpId"]); ?>" />
                            <?php if($index["state"] == -1): ?><a class="button border-black button-little dialogs" name="result" href="#" data-toggle="click" data-target="#resultdialog" data-mask="1" data-width="50%">Not through</a>
                                <?php elseif($index["state"] == 0): ?>
                                <a class="button border-black button-little">Pending review</a>
                                <?php elseif($index["state"] == 1): ?>
                                <a class="button border-black button-little">Has passed</a>
                                <?php elseif($index["state"] == 2): ?>
                                <a class="button border-black button-little badge-corner dialogs" name="detail" href="#" data-toggle="click" data-target="#detaildialog" data-mask="1" data-width="60%">details<span class="badge bg-red"><?php echo ($index["count"]); ?></span></a>
                                <?php elseif($index["state"] == 3): ?>
                                <a class="button border-yellow button-little dialogs" name="chkusr" href="#" data-toggle="click" data-target="#chkusrdialog" data-mask="1" data-width="30%">Confirmed</a><?php endif; ?>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <div class="panel-foot text-center">
                <!-- paginate -->
            </div>
        </div>
    </form>
    <p class="text-right text-gray">Based on<a class="text-gray" target="_blank" href="#">Team05</a>build </p>
</div>

<div id="checkdialog">
    <div class="dialog">
        <div class="dialog-head">
            <span class="close rotate-hover"></span>
            <strong>Project details</strong>
        </div>
        <div class="dialog-body">
            <div class="form-group">
                <p>Subject number：
                    <a class="gpId" href="#"></a>
                </p>
                <p>Subject content：
                    <a class="gpContent" href="#"></a>
                </p>
                <p>Purpose of the project：
                    <a class="gpAim" href="#"></a>
                </p>
                <p>Project outcomes：
                    <a class="gpRequest" href="#"></a>
                </p>
                <p>Essential knowledge：
                    <a class="gpMust" href="#"></a>
                </p>
                <p>Submission form(optional)：
                    <a class="gpFormal" href="#"></a>
                </p>
                <p>Comment：
                    <a class="gpOthers" href="#"></a>
                </p>
                <p>Subject direction：
                    <a class="gpSHState" href="#"></a>
                </p>
            </div>
        </div>
    </div>
</div>

<div id="resultdialog">
    <div class="dialog">
        <div class="dialog-head">
            <span class="close rotate-hover"></span>
            <strong>Project details</strong>
        </div>
        <div class="dialog-body">
            <div class="form-group">
                <p>Comment：
                    <a class="gpOthers" href="#"></a>
                </p>
                <div>DownLoad File：
                    <a class="button filePath" href="">DownLoad File</a>
                </div>
            </div>
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
                <p>Are you sure you want to delete the subject？</p>
                <p>O(∩_∩)O~~(Contact administrator for recoverable deletion and recovery)</p>
            </div>
            <input type="button" class="button bg-main" value="delete" onclick="javascript:del();" />
            <button class="button bg-yellow" type="reset">Regret</button>
        </div>
    </div>
</div>

<div id="chkusrdialog">
    <div class="dialog">
        <div class="dialog-head">
            <span class="close rotate-hover"></span>
            <strong>Student details</strong>
        </div>
        <div class="dialog-body">
            <div class="form-group form-me">
                <p>Student student number：
                    <a class="stuCard" href="#"></a>
                </p>
                <p>Real name：
                    <a class="stuRealName" href="#"></a>
                </p>
                <p>Student specialty：
                    <a class="majorName" href="#"></a>
                </p>
                <p>Student gender：
                    <a class="stuSex" href="#"></a>
                </p>
                <p>Age of students：
                    <a class="stuAge" href="#"></a>
                </p>
                <p>contact way：
                    <a class="stuPhone" href="#"></a>
                </p>
                <p>e-mail address：
                    <a class="stuEmail" href="#"></a>
                </p>
            </div>
        </div>
    </div>
</div>

<div id="detaildialog">
    <div class="dialog">
        <div class="dialog-head">
            <span class="close rotate-hover"></span>
            <strong>Project details</strong>
        </div>
        <div class="dialog-body">
            <div class="form-group">
                <table class="table tableme">
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var ID = null;

    function del() {
        window.location.href = "<?php echo U('Teacher/delGP/id/" + ID + "');?>";
    }

    function confirm(stlId) {
        window.location.href = "<?php echo U('Teacher/confirm/id/" + stlId + "');?>";
    }
    $(function() {
        $(".table a[name='check']").click(function() {
            ID = $(this).parent().find("input[name='id']").val();

            $.ajax({
                url: "<?php echo U('Teacher/checkGP');?>",
                data: {
                    id: ID,
                },
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data.state == true) {
                        for (var x in data.detail) {
                            $(".dialog ." + x + "").html(data.detail[x]);
                        }
                    } else {
                        return;
                    }
                }
            });
        });

        $(".table a[name='result']").click(function() {
            ID = $(this).parent().find("input[name='id']").val();

            $.ajax({
                url: "<?php echo U('Teacher/checkGP');?>",
                data: {
                    id: ID,
                },
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log(data)
                    if (data.state == true) {
                        for (var x in data.detail) {
                            console.log(x)
                            if(x == 'filePath'){

                                var value = '/Public'+data.detail[x];
                                console.log(value)
                                $(".filePath").attr('href',value)
                            }else{
                                $(".dialog ." + x + "").html(data.detail[x]);
                            }

                        }
                    } else {
                        return;
                    }
                }
            });
        });

        $(".table a[name='chkusr']").click(function() {
            ID = $(this).parent().find("input[name='id']").val();

            $.ajax({
                url: "<?php echo U('Teacher/chkStuInfo');?>",
                data: {
                    id: ID,
                },
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data.state == true) {
                        for (var x in data.detail) {
                            if (x == 'stuSex') {
                                $(".form-me ." + x + "").html(data.detail[x] == 1 ? 'male' : 'female');
                            } else {
                                $(".form-me ." + x + "").html(data.detail[x]);
                            }
                        }
                    } else {
                        return;
                    }
                }
            });
        });

        $(".table a[name='detail']").click(function() {
            ID = $(this).parent().find("input[name='id']").val();

            $.ajax({
                url: "<?php echo U('Teacher/checkStuList');?>",
                data: {
                    id: ID,
                },
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data.state == true) {

                        var str = "<tr><th>Student name</th><th>contact way</th><th>e-mail address</th><th>major field</th><th>Selected time</th><th>operate</th></tr><tr>";
                        for (var x in data.stuList) {
                            var tmp = data.stuList[x];
                            var stlId = null;
                            str = "<tr>" + str;
                            for (var y in tmp) {
                                if (y == "stlId") {
                                    stlId = tmp[y];
                                } else {
                                    str += "<td>" + tmp[y] + "</td>";
                                }
                            }
                            str = str + "<td><a class='button border-blue button-little' name='modify' href='javascript:confirm(" + stlId + ")'>confirm</a></td></tr>";
                        }
                        $(".tableme").html(str);
                        str = "";

                    } else {
                        $(".tableme").html("<tr><th style='text-align:center;'>There is no student choice for this subject</th></tr>");
                        return;
                    }
                }
            });
        });

        $(".table a[name='modify']").click(function() {
            var id = $(this).parent().find("input[name='id']").val();
            window.location.href = "<?php echo U('Teacher/modifyGP/id/" + id + "');?>";
        });

        $(".table a[name='delete']").click(function() {
            var id = $(this).parent().find("input[name='id']").val();
            ID = id;
        });

    });
</script>
 </div>
    </section>

    <footer>
        
    </footer>
</body>
</html>