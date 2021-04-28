<?php
    namespace Admin\Controller;
    use Think\Controller;
    class TeacherController extends BaseController {
        function __construct(){
            parent::__construct();
        }

        /*
         *  21 Apr 2021 22:11:36
         *  back-end manage centre -teacher list
         */
        public function index($thrCard = null, $thrName = null, $thrSex = null, $thrMajor = null){
            $titles = array();
            $titles['prt'] = "teacher ";
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "teacher list";
            $this->assign("titles", $titles);

            $obj = M("major");
            $majorList = $obj->select();
            $this->assign("majorList", $majorList);

            $where = array();
            $where['state'] = 1;
            $seachData['thrCard'] = $thrCard;
            if(isset($thrCard) && !empty($thrCard)){
                $where['thrName'] = array("like", "%{$thrCard}%");
            }
            $seachData['thrName'] = $thrName;
            if(isset($thrName) && !empty($thrName)){
                $where['thrRealName'] = $thrName;
            }
            $seachData['thrSex'] = $thrSex;
            if(isset($thrSex) && !empty($thrSex)){
                $where['thrSex'] = $thrSex;
            }
            $this->assign("seachData", $seachData);
            
            $obj    = M('teacher'); // Instantiate the User object
            $count  = $obj->where($where)->Count();// Query the total number of records meeting the requirements
            $Page   = new \Think\Page($count,10);// Instantiate the total number of incoming records and the number of records displayed per page of the paging class (25)
            $show   = $Page->show();// Paging display output//Paging data query Note that the parameters of the limit method should use the attributes of the Page class
            $usrList = $obj->field('thrId, thrName, thrRealName, thrSex, thrStudy, thrPhone')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();// Assigned data set
            $this->assign('usrList', $usrList);/// Assignment paging output
            $this->assign('page',$show); // Output template

            $this->display();
        }

        /*
         *  21 Apr 2021 22:10:47
         *  back-end manage centre -adding teacher 
         */
        public function add(){
            $titles = array();
            $titles['prt'] = "teacher ";
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "adding teacher ";
            $this->assign("titles", $titles);

            $this->display();
        }

        /*
         *  21 Apr 2021 22:10:47
         *  back-end manage centre -teacher data trash
         */
        public function recycle(){
            $titles = array();
            $titles['prt'] = "teacher ";
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "trash";
            $this->assign("titles", $titles);

            $obj = M('teacher');
            $usrList = $obj->field('thrId, thrName, thrRealName, thrSex, thrStudy, thrPhone')->where(array('state' => -1))->select();
            $this->assign('usrList', $usrList);


            $this->display();
        }

        /*
         *  21 Apr 2021 9:54:13
         *  back-end manage centre -library insert teacher data 
         */
        public function addUsr(){
            if(IS_POST){
                $data['thrName'] = I('post.name');
                $data['thrRealName'] = I('post.realName');
                $data['thrSex'] = I('post.sex');

                $pwd = I('post.pwd');
                $obj = M('teacher');

                if($obj->where($data)->Count() == 1){
                    $this->error("found same account details, insertion failure");
                    return ;
                }
                $data['thrPwd'] = isset($pwd) && $pwd != "" ? md5($pwd) : md5(888888);
                $time = time();
                $data['updateTime'] = $time;
                $data['createTime'] = $time;

                if($obj->add($data)){
                    $this->success("teacher infomation adding success");
                }else{
                    $this->error("teacher infomation adding failure, please check your actions");
                }
            }
        }

        /*
         *  21 Apr 2021 14:35:33
         *  view teacher details
         */
        public function checkDetail(){
            if(IS_POST){
                $id = I('post.id');
                $where['thrId'] = isset($id) ? $id : 0;

                $obj = M('teacher');
                $usrDetail = $obj->field('thrId, thrName, thrRealName, thrSex, thrAge, thrStudy, thrPhone, thrEmail, thrAddress')->where($where)->find();
                if(is_array($usrDetail) && !empty($usrDetail)){
                    echo json_encode(array('state' => true, 'detail' => $usrDetail));
                }else{
                    echo json_encode(array('state' => false, 'detail' => array()));
                }
            }
        }

        /*
         *  21 Apr 2021 10:35:49
         *  reset teacher password
         */
        public function reset($id = 0){
            if($id == 0){
                $this->error('change failure, please check your actions');
            }else{
                $obj = M('teacher');
                $where['thrId'] = $id;

                $data['thrPwd'] = md5(888888);

                $flag = $obj->where($where)->save($data);
                if($flag){
                    $this->success('teacher password reset success');
                }else{
                    $this->error('teacher password reset failure, please check your actions');
                }
            }
        }

        /*
         *  21 Apr 2021 13:34:25
         *  move teacher account to trash
         */
        public function toRecycle($id = 0){
            if($id == 0){
                $this->error('change failure, please check your actions');
            }else{
                $obj = M('teacher');
                $where['thrId'] = $id;

                $data['state'] = -1;

                $flag = $obj->where($where)->save($data);
                if($flag){
                    $this->success('detele success，already moved teacher account to trash');
                }else{
                    $this->error('detele failure, please check your actions');
                }
            }
        }

        /*
         *  21 Apr 2021 14:13:23
         *  restore teacher status
         */
        public function recoverOne($id = 0){
            if($id == 0){
                $this->error('change failure, please check your actions');
            }else{
                $obj = M('teacher');
                $where['thrId'] = $id;

                $data['state'] = 1;

                $flag = $obj->where($where)->save($data);
                if($flag){
                    $this->success('restore success，teacher status restore success');
                }else{
                    $this->error('restore failure, please check your actions');
                }
            }
        }

        /*
         *  21 Apr 2021 14:14:12
         *  delete teacher account
         */
        public function clearOne($id = 0){
            if($id == 0){
                $this->error('change failure, please check your actions');
            }else{
                $obj = M('teacher');
                $where['thrId'] = $id;

                $flag = $obj->where($where)->delete();
                if($flag){
                    $this->success('detele success');
                }else{
                    $this->error('detele failure, please check your actions');
                }
            }
        }
    }