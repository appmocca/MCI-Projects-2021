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
            $count  = $obj->join("left join teacher on gproject.gpThrId = teacher.thrId")->where($where)->Count();// Query the total number of records meeting the requirements
            $Page   = new \Think\Page($count,10);// Instantiate the total number of incoming records and the number of records displayed per page of the paging class (10)
            $show   = $Page->show();//Paging display output//Paging data query Note that the parameters of the limit method should use the attributes of the Page class
            $bsList = $obj->join("left join teacher on gproject.gpThrId = teacher.thrId")->field("gproject.*, teacher.thrRealName")->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
            var_dump($bsList);die;
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

                $obj = M('gproject');
                if($obj->where($where)->save($data)){
                    $this->success('examine success');
                }else{
                    $this->error('examine failure');
                }
            }
        }
    }
?>