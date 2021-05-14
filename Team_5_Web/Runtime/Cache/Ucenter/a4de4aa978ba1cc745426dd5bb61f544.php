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
    <link rel="stylesheet" href="/Public/Styles/css/adminme.css">
    <script src="/Public/Styles/js/jquery.js"></script>
    <script src="/Public/Styles/js/pintuer.js"></script>
    <script src="/Public/Styles/js/respond.js"></script>

    <style>
        
    </style>

</head>
<body>
    <header>
        <div class="layout layout_top bg22 fixed-top">
            <div class="navbar navbar-big radius navbarme">
                <div class="navbar-head">
                </div>
                <div class="navbar-body">
                    <ul class="nav nav-inline nav-menu nav-tabs nav-big">
                        <li><a href="<?php echo U('Teacher/index');?>" class="lls <?php echo $state == 'index' ? 'active' : '';?>">Login Information</a></li>
                        <li><a href="<?php echo U('Teacher/person');?>" class="lls <?php echo $state == 'person' ? 'active' : '';?>">Persional Information</a></li>
                        <li><a href="<?php echo U('Teacher/add');?>" class="lls <?php echo $state == 'add' ? 'active' : '';?>">Adding Proposal</a></li>
                        <li><a href="<?php echo U('Teacher/bslist');?>" class="lls <?php echo $state == 'bslist' ? 'active' : '';?>">Proposal List</a></li>
                        <li><a href="<?php echo U('Teacher/msg');?>" class="lls <?php echo $state == 'msg' ? 'active' : '';?>">Message Management</a></li>
                        <li><a href="<?php echo U('Teacher/plan');?>" class="lls <?php echo $state == 'plan' ? 'active' : '';?>">Progress Management</a></li>
                    </ul>
                </div>
            </div>
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
        <div class="container">
            <div class="bread-me">
                <ul class="bread bg-green bg-inverse">
                    <li><a href="<?php echo U('Teacher/index');?>" class="icon-home"> Index</a></li>
                    <li><?php echo ($title); ?></li>
                </ul>
            </div>
<div class="tab">
  	<div class="tab-head text-right">
    	<strong>Student progress list</strong>
    	<span class="tab-more"></span>
    	<ul class="tab-nav">
    		<?php if(count($stuPlans) == 0): ?>
			<li class="active"><a href="#tab-no">Tips</a></li>
			<?php else: ?>
			<?php foreach($stuPlans as $k => $v): ?>
      		<li <?php echo $k == 0 ? 'class="active"' : '';?>><a href="#tab-<?php echo $v['planId'];?>"><?php echo $v['stuRealName'];?></a></li>
			<?php endforeach;?>
      		<?php endif; ?>
    	</ul>
  	</div>
  	<div class="tab-body">
  		<div class="tab-panel <?php echo count($stuPlans) == 0 ? 'active' : '';?>" id="tab-no">
			<p>No students have submitted the schedule for the time being</p>
  		</div>
  		<?php foreach($stuPlans as $k => $v): ?>
    	<div class="tab-panel <?php echo $k == 0 ? 'active' : '';?>" id="tab-<?php echo $v['planId'];?>">
    		<ul class="list-group">
    			<li>Subject name：<?php echo $v['gpTitle'];?></li>
			  	<li>Selected students：<?php echo $v['stuRealName']; ?></li>
			  	<li>schedule：<?php echo date("Y-m-d h:i", $v['updateTime']); ?></li>
			  	<li>&nbsp;</li>
			  	<li style="text-align:center; color: red; ">scheduling</li>
			  	<?php if($v['title1'] != "" && $v['endtime1'] != ""): ?>
			  	<li>Time arrangement[①] ：Selection of topics&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['endtime1']; ?></li>
			  	<li>Arrangement name[①] ：<?php echo $v['title1']; ?></li>
			  	<li>Schedule notes[①] ：<?php echo $v['other1']; ?></li>
			  	<?php endif;?>
			  	<?php if($v['title2'] != "" && $v['endtime2'] != ""): ?>
			  	<li>Time arrangement[②] ：<?php echo $v['endtime1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['endtime2']; ?></li>
			  	<li>Arrangement name[②] ：<?php echo $v['title2']; ?></li>
			  	<li>Schedule notes[②] ：<?php echo $v['other2']; ?></li>
			  	<?php endif;?>
			  	<?php if($v['title3'] != "" && $v['endtime3'] != ""): ?>
			  	<li>Time arrangement[③] ：<?php echo $v['endtime2']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['endtime3']; ?></li>
			  	<li>Arrangement name[③] ：<?php echo $v['title3']; ?></li>
			  	<li>Schedule notes[③] ：<?php echo $v['other3']; ?></li>
			  	<?php endif;?>
			  	<?php if($v['title4'] != "" && $v['endtime4'] != ""): ?>
			  	<li>Time arrangement[④] ：<?php echo $v['endtime3']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['endtime1']; ?></li>
			  	<li>Arrangement name[④] ：<?php echo $v['title4']; ?></li>
			  	<li>Schedule notes[④] ：<?php echo $v['other4']; ?></li>
			  	<?php endif;?>
			  	<?php if($v['title5'] != "" && $v['endtime5'] != ""): ?>
			  	<li>Time arrangement[⑤] ：<?php echo $v['endtime4']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['endtime5']; ?></li>
			  	<li>Arrangement name[⑤] ：<?php echo $v['title5']; ?></li>
			  	<li>Schedule notes[⑤] ：<?php echo $v['other5']; ?></li>
			  	<?php endif;?>
			  	<?php if($v['title6'] != "" && $v['endtime6'] != ""): ?>
			  	<li>Time arrangement[⑥] ：<?php echo $v['endtime5']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['endtime6']; ?></li>
			  	<li>Arrangement name[⑥] ：<?php echo $v['title6']; ?></li>
			  	<li>Schedule notes[⑥] ：<?php echo $v['other6']; ?></li>
			  	<?php endif;?>
			  	<?php if($v['title7'] != "" && $v['endtime7'] != ""): ?>
			  	<li>Time arrangement[⑦] ：<?php echo $v['endtime6']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['endtime7']; ?></li>
			  	<li>Arrangement name[⑦] ：<?php echo $v['title7']; ?></li>
			  	<li>Schedule notes[⑦] ：<?php echo $v['other7']; ?></li>
			  	<?php endif;?>
			</ul>
    	</div>
    <?php endforeach;?>
  	</div>
</div>
<br/>
<br/>
 </div>
    </section>

    <footer>
        
    </footer>
</body>
</html>