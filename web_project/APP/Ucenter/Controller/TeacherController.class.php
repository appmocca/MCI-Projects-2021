<?php
    namespace Ucenter\Controller;
    use Think\Controller;
    class TeacherController extends BaseController {
    	function __construct(){
    		parent::__construct();

    		layout('Public/tplTLayout');
	    	$this->assign('state', strtolower(ACTION_NAME));
    	}

        private function chkUsrInfo(){
            $where['thrId'] = session("ID");
            $info = M('teacher')->where($where)->find();

            if($info['thrAge'] != null && $info['createTime'] != null && $info['updateTime']){
                return true;
            }else{
                return false;
            }
        }

    	/*
    	 *	2015年3月8日19:43:41
    	 *	教师管理中心首页
    	 */
        public function index(){
            $where['showThr'] = 1;
            $id = session("ID");
            $where['_string'] = '(msgFromId = ' . $id . ' and state = -1) OR (msgAccessId = ' . $id . ' and state = 1) ';
            $this->assign("msgCount", M('message')->where($where)->Count() + M('message')->where(array('state' => -2))->Count());
            $this->assign("gpCount", M('gproject')->where(array('gpThrId' => session("ID")))->Count());

            $this->assign('usrSex', session('SEX'));
            
        	$this->assign("title", "login information");
            $this->display();
        }

        /*
    	 *	2015年3月8日19:43:51
    	 *	教师管理中心个人信息
    	 */
        public function person(){
        	$this->assign("title", "Personal management");

            $obj = M('teacher');
            $usrDetail = $obj->where(array('thrId' => session('ID')))->find();
            $this->assign('usrDetail', $usrDetail);

            $this->display();
        }

        /*
    	 *	2015年3月8日19:44:04
    	 *	教师管理中心毕设列表1
    	 */
        public function bslist(){
            /* if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Teacher/person'));
                return false;
            }
 */
        	$this->assign("title", "list of proposals");

            $obj = M("gproject");
            $bsList = $obj->field("gpId, gpTitle, gpContent, gpOthers,gpMust, state")->where(array('gpThrId' => session("ID")))->select();
            
            $obj = M("stlinks");
            foreach($bsList as &$v){
                $v['count'] = $obj->where(array("stlSpId" => $v['gpId']))->Count();
            }
            $this->assign('bsList', $bsList);
            
            $this->display();
        }

        /*
    	 *	2015年3月8日19:45:05
    	 *	教师管理中心新增毕设
    	 */
        public function add(){
           /*  if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Teacher/person'));
                return false;
            } */

        	$this->assign("title", "add proposal");
            $this->display();
        }

        /*
    	 *	2015年3月8日19:44:21
    	 *	教师管理中心消息管理
    	 */
        public function msg(){
            /* if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Teacher/person'));
                return false;
            } */

        	$this->assign("title", "message");

            $obj = M('stlinks');
            $data = array();
            $data = $obj->join("left join student on stlinks.stlStuId = student.stuId")->field("stuId, stuRealName")->where(array('stlThrId' => session("ID"), 'stlinks.state' => 2))->select();
            $this->assign("ff", $data);

            unset($obj);
            $where['showThr'] = 1;
            $id = session("ID");
            $where['_string'] = '(msgFromId = ' . $id . ' and state = -1) OR (msgAccessId = ' . $id . ' and state = 1) ';

            $obj    = M('message'); // 实例化User对象
            $count  = $obj->where($where)->Count();// 查询满足要求的总记录数
            $Page   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show   = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $List = $obj->field('msgId, msgFromId, msgAccessId, msgContent, createTime, state')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('List', $List);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出

            unset($where);
            $where['state'] = -2;
            $this->assign("adminList", $obj->field('msgId, msgFromId, msgAccessId, msgContent, createTime, state')->where($where)->select());

            $this->display();
        }

        /*
    	 *	2015年3月8日19:44:33
    	 *	教师管理中心毕设进度
    	 */
        public function plan(){
            /* if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Teacher/person'));
                return false;
            }
 */
        	$this->assign("title", "progress of proposal");

            $obj = M("plan");
            $where['plnThrId'] = session("ID");
            $stuList = $obj->join("left join student on plan.plnStuId = student.stuId")->join("left join stlinks on stlinks.stlSpId = plan.plnGpId")->join("left join gproject on gproject.gpId = plan.plnGpId")->field('plan.*, student.stuRealName, stlinks.updateTime, gproject.gpTitle')->where($where)->select();
            $this->assign("stuPlans", $stuList);

            $this->display();
        }   

        /*
         *  2015年3月11日12:17:57 
         *  教师管理中心个人信息修改
         */
        public function modifyInfo(){
            if(IS_POST){
                $oldPwd = I("post.oldpwd");
                $newPwd = I("post.newpwd");
                $data['thrRealName'] = I("post.realName");
                $data['thrAge'] = I("post.age");
                $data['thrSex'] = I("post.sex");
                $data['thrPhone'] = I("post.Phone");
                $data['thrEmail'] = I("post.Email");
                $data['thrAddress'] = I("post.Address");
                $data['thrStudy'] = I("post.Study");
                $data['updateTime'] = time();

                $tPhone = I("post.chkPhone");
                $tEmail = I("post.chkEmail");
                $tAddress = I("post.chkAddress");
                $tStudy = I("post.chkStudy");
                $data['showState'] = ($tPhone != "" ? $tPhone : "0") . ($tEmail != "" ? $tEmail : "0") . ($tAddress != "" ? $tAddress : "0") . ($tStudy != "" ? $tStudy : "0");

                $where['thrId'] = I('post.usrId');
                if($oldpwd != $newpwd){
                    $data['thrPwd'] = md5($newpwd);
                    $where['thrPwd'] = md5($oldpwd);
                }
                // var_dump($data);var_dump($where);exit;
                $obj = M("teacher");
                if($obj->where($where)->save($data)){
                    $this->success("User information is successfully modified, please log in again", U("Teacher/loginout"));
                }else{
                    $this->error("User information modification failed, please check");
                }
            }
        }

        /*
         *  2015年3月11日15:05:24
         *  教师管理中心新增毕设
         */
        public function addDesign(){
            $files = $_FILES['upfile'];

            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('pdf','docx','doc','jpg','png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     'Public'; // 设置附件上传根目录
            $upload->savePath  =     '/upload/'; // 设置附件上传（子）目录
            // 上传文件
            $info   =   $upload->uploadOne($files);

            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功
                $infoPath = $info['savepath'].$info['savename'];
            }
            if(IS_POST){
                $data['gpThrId'] = session('ID');
                $data['gpTitle'] = I("post.title");
                $data['gpContent'] = I("post.content");
                $data['gpAim'] = I("post.aim");
                $data['gpRequest'] = I("post.request");
                $data['gpMust'] = I("post.must");
                $data['gpFormal'] = I("post.formal");
                $data['gpOthers'] = I("post.other");
                /*$gpSHState = I("post.SHState");
                $data['gpSHState'] = $gpSHState == 2 ? $gpSHState : 1;
                */
                $data['gpSHState'] = I("post.SHState");
                $data['state'] = 0;
                $data['filePath'] = $infoPath;

                $time = time();
                $data['updateTime'] = $time;
                $data['createTime'] = $time;

                $obj = M("gproject");
                if($obj->add($data)){
                    $this->success("Topic added successfully", U('Teacher/bsList'));
                }else{
                    $this->error("Failed to add topic, please check");
                }
            }
        }

        /*
         *  2015年3月11日15:05:24
         *  教师管理中心新增毕设
         */
        public function modifyGP($id = 0){
            if($id != 0){
                $where["gpId"] = $id;

                $obj = M("gproject");
                $GpDetail = $obj->where($where)->find();

                if(is_array($GpDetail) && !empty($GpDetail)){
                    $this->assign("gpDetail", $GpDetail);
                    $this->assign("title", "modify proposal");

                    $this->display("edit");
                }else{
                    $this->error("Operation error, please check");
                }
            }else{
                $this->error("Operation error, please check");
            }
        }

        /*
         *  2015年3月18日13:36:20
         *  教师管理中心课题详情
         */
        public function checkGP(){
            if(IS_POST){
                $where["gpId"] = I("post.id");

                $obj = M("gproject");
                $GpDetail = $obj->where($where)->find();

                if(is_array($GpDetail) && !empty($GpDetail)){
//                    $GpDetail['filePath'] = $GpDetail['filePath'];
                    echo json_encode(array("state" => true, "detail" => $GpDetail));
                }
            }else{
                echo json_encode(array("state" => false, "detail" => array()));
            }
        }

        /*
         *  2015年3月18日13:29:09
         *  教师管理中心修改毕设
         */
        public function updateGp(){
            $files = $_FILES['upfile'];
            if(!empty($files['tmp_name'])){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('pdf','docx','doc','jpg','png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =     'Public'; // 设置附件上传根目录
                $upload->savePath  =     '/upload/'; // 设置附件上传（子）目录
                // 上传文件
                $info   =   $upload->uploadOne($files);

                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功
                    $infoPath = $info['savepath'].$info['savename'];
                    $data['filePath'] = $infoPath;
                }
            }


            if(IS_POST){

                $where['gpId'] = I("post.id");

                $data['gpThrId'] = session('ID');
                $data['gpTitle'] = I("post.title");
                $data['gpContent'] = I("post.content");
                $data['gpAim'] = I("post.aim");
                $data['gpRequest'] = I("post.request");
                $data['gpMust'] = I("post.must");
                $data['gpFormal'] = I("post.formal");
                $data['gpOthers'] = I("post.others");
                $data['gpSHState'] = I("post.SHState") == 2 ? 2 : 1;
                $obj = M("gproject");
                $admin_state = $obj->where($where)->getField('admin_state');
                if($admin_state == '0'){
                    $data['state'] = 0;
                }else{
                    $data['state'] = 1;
                }

                $time = time();
                $data['updateTime'] = $time;


                if($obj->where($where)->save($data)){
                    $this->success("The subject was successfully modified", U('Teacher/bslist'));
                }else{
                    $this->error("Subject modification failed, please check");
                }
            }
        }

        /*
         *  2015年3月18日17:00:18
         *  教师管理中心删除课题
         */
        public function delGP($id = 0){
            if($id != 0){
                $where["gpId"] = $id;

                $obj = M("gproject");
                $flag = $obj->where($where)->delete();
                if($flag){
                    $this->success("proposal deleted successfully");
                }else{
                    $this->error("proposal deletion failed");
                }
            }else{
                $this->error("Operation failed, please check");
            }
        }

        /*
         *  2015年3月22日15:08:55
         *  教师管理中心学生课题选择
         */
        public function checkStuList(){
            if(IS_POST){
                $where['stlSpId'] = I("post.id");

                $obj = M("stlinks");
                $stuList = $obj->join("left join student on stlinks.stlStuId = student.stuId")->join("left join major on student.stuMajor = major.majorId")->field("stuRealName, stuPhone, stuEmail, majorName, stlinks.createTime, stlId")->where($where)->select();
                if(is_array($stuList) && !empty($stuList)){
                    foreach($stuList as &$v){
                        $v['createTime'] = date("Y-m-d H:i", $v['createTime']);
                    }
                    echo json_encode(array("state" => true, "stuList" => $stuList));
                }else{
                    echo json_encode(array("state" => false, "stuList" => array()));
                }
            }else{
                echo json_encode(array("state" => false, "stuList" => array()));
            }
            
        }

        /*
         *  2015年3月22日16:10:12
         *  教师管理中心确定课题
         */
        public function confirm($id = 0){
            if($id >= 0){
                $obj = M("stlinks");
                $GpInfo = $obj->field("stlSpId, stlStuId")->where(array("stlId" => $id))->find();

                $flag = true;
                $obj->startTrans();
                if(!$obj->where(array("stlSpId" => $GpInfo['stlSpId']))->save(array("state" => 3))){
                    $flag = true;
                }
                if(!$obj->where(array("stlId" => $id))->save(array("state" => 2, 'updateTime' => time()))){
                    $flag = true;
                }
                if(!M("gproject")->where(array("gpId" => $GpInfo['stlSpId']))->save(array("state" => 3))){
                    $flag = true;
                }
                /*if(!$obj->where(array('stlStuId' => $GpInfo['stlStuId'], 'state' => array("in", array(1, 3))))->delete()){
                    $flag = false;
                }
                */

                if($flag){
                    $obj->commit();
                    $this->updateGPState();
                    $this->success("proposal confirmed successfully");
                }else{
                    $obj->rollback();
                    $this->success("proposal confirmation failed, please check");
                }

            }else{  
                $this->error("Operation error, please check");
            }
        }

        /*
         *  2015年3月22日16:54:21
         *  教师管理中心学生详情
         */
        public function chkStuInfo(){
            if(IS_POST){
                $where['stlSpId'] = I("post.id");
                $where['state'] = 2;

                $obj = M("stlinks");
                $stuID = $obj->field("stlStuId")->where($where)->find();
                unset($where);

                $where['stuId'] = $stuID['stlStuId'];
                $o = M('student');
                $usrDetail = $o->join('left join major on student.stuMajor = major.majorId')->field('stuCard, stuRealName, major.majorName, stuSex, stuAge, stuPhone, stuEmail')->where($where)->find();
                if(is_array($usrDetail) && !empty($usrDetail)){
                    echo json_encode(array('state' => true, 'detail' => $usrDetail));
                }else{
                    echo json_encode(array('state' => false, 'detail' => array()));
                }
            }
        }

        /*
         *  2015年3月18日17:04:04
         *  教师管理中心注销
         */
        public function loginout(){
            session(null);
            $this->redirect("Index/index");
        }

        /*
         *  2015年4月17日18:07:48
         *  更新gproject state
         */
        public function updateGPState(){
            $obj = M('gproject');

            $idArray = $obj->field('gpId')->where(array('state' => 2))->select();
            foreach($idArray as $v){
                if(M('stlinks')->where(array('stlSpId' => $v['gpId']))->Count() == 0){
                    $obj->where(array('gpId' => $v['gpId']))->save(array('state' => 1));
                }
            }
        }

        /*
         *  2015年4月18日14:43:00
         *  新增消息
         */
        public function addMsg(){
            if(IS_POST){
                $data['msgParentId'] = 0;
                $data['msgFromId'] = session("ID");
                $f = I("post.receive");
                $data['msgContent'] = I("post.content");
                $data['createTime'] = time();
                $data['state'] = -1;
                $data['showStu'] = 1;
                $data['showThr'] = 1;

                $obj = M('message');
                if($f == -1){
                    $thrs = M('stlinks')->field("stlStuId")->where(array('stlThrId' => session("ID"), 'stlinks.state' => 2))->select();
                    
                    $flag = true;
                    $obj->startTrans();
                    foreach($thrs as $v){
                        $data['msgAccessId'] = $v['stlStuId'];
                        if(!$obj->add($data)){
                            $flag = false;
                        }
                    }

                    if($flag){
                        $obj->commit();
                    }else{
                        $obj->rollback();
                    }

                }else{
                    $data['msgAccessId'] = $f;
                    $flag = $obj->add($data);
                }

                if($flag){
                    $this->success("message sent");
                }else{
                    $this->error("message sending failed");
                }
            }
        }

        /*
         *  2015年4月18日15:51:17
         *  删除消息 学生操作
         */
        public function delMsg($id = 0){
            if($id == 0 || intval($id) <= 0){
                $this->error("Parameter error, please check");
                return false;
            }

            $obj = M('message');
            if($obj->where(array('msgId' => $id))->save(array('showThr' => -1))){
                $this->success("message deleted successful");
            }else{
                $this->error("message deleted failed");
            }

        }
    }
?>