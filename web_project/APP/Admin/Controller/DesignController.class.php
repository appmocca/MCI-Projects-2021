<?php
    namespace Admin\Controller;
    use Think\Controller;
    class DesignController extends BaseController {
        function __construct(){
            parent::__construct();
        }

        /*
         *  21 Apr 2021 22:15:54
         *  back-end managae centre - project list
         */
        public function index($gpThrId = null, $gpContent = null, $state = null, $gpSHState = null){
            $titles = array();
            $titles['prt'] = "project of Team05";
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "login info";
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

            $obj    = M('gproject'); // Instantiate the User object
            $count  = $obj->join("left join teacher on gproject.gpThrId = teacher.thrId")
                ->where($where)->Count();// Query the total number of records meeting the requirements
            $Page   = new \Think\Page($count,10);// Instantiate the total number of incoming records and the number of records displayed per page of the paging class (10)
            $show   = $Page->show();//Paging display output//Paging data query Note that the parameters of the limit method should use the attributes of the Page class
            $bsList = $obj->join("left join teacher on gproject.gpThrId = teacher.thrId")
                ->field("gproject.*, teacher.thrRealName")
                ->where($where)->limit($Page->firstRow.','.$Page->listRows)
                ->select();
           
            $this->assign('bsList', $bsList);//assign data set
            $this->assign('page',$show);//Assign paging output

            $this->display();
        }

        /*
         *  21 Apr 2021 22:16:09
         *  back-end managae centre - trash
         */
        public function recycle(){
            $titles = array();
            $titles['prt'] = "project of Team05";
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "login info";
            $this->assign("titles", $titles);

            $obj = M("gproject");
            $bsList = $obj->join("left join teacher on gproject.gpThrId = teacher.thrId")->field("gproject.*, teacher.thrRealName")->where(array("gproject.state" => -1))->select();
            $this->assign("bsList", $bsList);
            var_dump($bsList);die;
            $this->display();
        }

        /*
         *  21 Apr 2021 17:34:47
         *  centre projects details
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
         *  21 Apr 2021 17:34:59
         *  centre delete projects
         */
        public function cycGP($id = 0){
            if($id != 0){
                $where["gpId"] = $id;

                $obj = M("gproject");
                $flag = $obj->where($where)->delete();
                if($flag){
                    $this->success("project delete successful");
                }else{
                    $this->error("project fail to delete");
                }
            }else{
                $this->error("action failure, please check your actions");
            }
        }

        /*
         *  21 Apr 2021 17:42:52
         *  restore project status
         */
        public function recoverOne($id = 0){
            if($id == 0){
                $this->error('action failure, please check');
            }else{
                $obj = M('gproject');
                $where['gpId'] = $id;

                $data['state'] = 1;

                $flag = $obj->where($where)->save($data);
                if($flag){
                    $this->success('restore success, the project has been recovered');
                }else{
                    $this->error('resrore failure, please check the actions');
                }
            }
        }

        /*
         *  21 Apr 2021 17:42:58
         *  clear proposal
         */
        public function clearOne($id = 0){
            if($id == 0){
                $this->error('action failure, please check you actions');
            }else{
                $obj = M('gp ');
                $where['gpId'] = $id;

                $flag = $obj->where($where)->delete();
                if($flag){
                    $this->success('clear proposal success');
                }else{
                    $this->error('clear proposal failure, please check your actions');
                }
            }
        }

        /*
        *   21 Apr 2021 14:56:10
        *   admin examine proposal
        */
        public function SH($id = 0, $flag = 0){
            if($id == 0 || $flag == 0){
                $this->error('parameter wrong, please check your input');
            }else{
                $where['gpId'] = $id;
                $data['state'] = $flag;
                $data['admin_state'] = $flag;

                $obj = M('gproject');
                if($obj->where($where)->save($data)){
                    $this->success('examine success');
                }else{
                    $this->error('examine failure');
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
                $data['state'] = 1;

                $time = time();
                $data['updateTime'] = $time;

                $obj = M("gproject");
                if($obj->where($where)->save($data)){
                    $this->success("The subject was successfully modified", U('Design/index'));
                }else{
                    $this->error("Subject modification failed, please check");
                }
            }
        }
    }
?>