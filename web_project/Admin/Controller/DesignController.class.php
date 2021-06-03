<?php
    namespace Admin\Controller;
    use Think\Controller;
    class DesignController extends BaseController {
        function __construct(){
            parent::__construct();
        }

        /*
         *  2015年3月8日22:15:54
         *  后台管理中心-毕设列表
         */
        public function index($gpThrId = null, $gpContent = null, $state = null, $gpSHState = null){
            $titles = array();
            $titles['prt'] = "projects";
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "login information";
            $this->assign("titles", $titles);

            $where = array();
            $seachData['gpContent'] = $gpContent;
            if(isset($gpContent) && !empty($gpContent)){
                $where['gpContent'] = array("like", "%{$gpContent}%");
            }
            $seachData['state'] = $state;
            if(isset($state) && !empty($state)){
                switch ($state) {
                    case -1:
                        $where['gproject.state'] = 0;
                        break;
                    case 3:
                        $where['gproject.state'] = 3;
                        break;
                    default:
                        $where['gproject.state'] = array("in", array(-1, 1, 2));
                        break;
                }
            }
            $seachData['gpSHState'] = $gpSHState;
            if(isset($gpSHState) && !empty($gpSHState)){
                $where['gpSHState'] = $gpSHState;
            }
            $seachData['gpThrId'] = $gpThrId;
            if(isset($gpThrId) && !empty($gpThrId)){
                $where['thrRealName'] = $gpThrId;
            }
            $this->assign("seachData", $seachData);

            $obj    = M('gproject'); // 实例化User对象
            $count  = $obj->join("left join teacher on gproject.gpThrId = teacher.thrId")->where($where)->Count();// 查询满足要求的总记录数
            $Page   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show   = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $bsList = $obj->join("left join teacher on gproject.gpThrId = teacher.thrId")->field("gproject.*, teacher.thrRealName")->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('bsList', $bsList);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出

            $this->display();
        }

        /*
         *  2015年3月8日22:16:09
         *  后台管理中心-回收站
         */
        public function recycle(){
            $titles = array();
            $titles['prt'] = "projects";
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "login information";
            $this->assign("titles", $titles);

            $obj = M("gproject");
            $bsList = $obj->join("left join teacher on gproject.gpThrId = teacher.thrId")->field("gproject.*, teacher.thrRealName")->where(array("gproject.state" => -1))->select();
            $this->assign("bsList", $bsList);

            $this->display();
        }

        /*
         *  2015年3月18日17:34:47
         *  中心课题详情
         */
        public function checkGP($id = 0){
            if($id != 0){
                $where["gpId"] = $id;

                $obj = M("gproject");
                $GpDetail =$obj->join("left join teacher on gproject.gpThrId = teacher.thrId")->field("gproject.*, teacher.thrRealName")->where($where)->find();

                if(is_array($GpDetail) && !empty($GpDetail)){
                    echo json_encode(array("state" => true, "detail" => $GpDetail));
                }
            }else{
                echo json_encode(array("state" => false, "detail" => array()));
            }
        }


        /*
         *  2015年3月18日17:34:59
         *  中心删除课题
         */
        public function cycGP($id = 0){
            if($id != 0){
                $where["gpId"] = $id;

                $obj = M("gproject");
                $flag = $obj->where($where)->delete();
                if($flag){
                    $this->success("project delete successful");
                }else{
                    $this->error("project delete fail");
                }
            }else{
                $this->error("check you operation and do it again");
            }
        }

        /*
         *  2015年3月18日17:42:52
         *  将课题状态恢复
         */
        public function recoverOne($id = 0){
            if($id == 0){
                $this->error('check you operation and do it again');
            }else{
                $obj = M('gproject');
                $where['gpId'] = $id;

                $data['state'] = 1;

                $flag = $obj->where($where)->save($data);
                if($flag){
                    $this->success('recover successful');
                }else{
                    $this->error('recover fail');
                }
            }
        }

        /*
         *  2015年3月18日17:42:58
         *  将课题物理删除
         */
        public function clearOne($id = 0){
            if($id == 0){
                $this->error('check you operation and do it again');
            }else{
                $obj = M('gp ');
                $where['gpId'] = $id;

                $flag = $obj->where($where)->delete();
                if($flag){
                    $this->success('delete successful');
                }else{
                    $this->error('delete fail');
                }
            }
        }

        /*
        *   2015年4月17日14:56:10
        *   管理员审核课题
        */
        public function SH($id = 0, $flag = 0){
            if($id == 0 || $flag == 0){
                $this->error('data wrong');
            }else{
                $where['gpId'] = $id;
                $data['state'] = $flag;

                $obj = M('gproject');
                if($obj->where($where)->save($data)){
                    $this->success('examination passed');
                }else{
                    $this->error('examination fail');
                }
            }
        }

         /*
         修改页
        */
        public function editGP($id = 0){
            if($id != 0){
                $where["gpId"] = $id;

                $obj = M("gproject");
                $GpDetail = $obj->where($where)->find();


                if(is_array($GpDetail) && !empty($GpDetail)){
                    $this->assign("gpDetail", $GpDetail);
                    $this->assign("title", "modify proposal");
                    $this->assign("host",$_SERVER['SERVER_NAME']);

                    $this->display("edit");
                }else{
                    $this->error("Operation error, please check");
                }

            }else{
                $this->error("Operation error, please check");
            }
        }

        /*

         *  提交修改毕设
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
                }else{
                    // 上传成功
                    $infopath = $info['savepath'].$info['savename'];
                    $data['filePath'] = $infopath;
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
                if($admin_state == '-1' || $admin_state == 0){
                    $data['state'] = 0;
                }else{
                    $data['state'] = 1;
                }


                $time = time();
                $data['updateTime'] = $time;


                if($obj->where($where)->save($data)){
                    $this->success("The subject was successfully modified", U('Design/index'));
                }else{
                    $this->error("Subject modification failed, please check");
                }
            }
        }
    }
?>