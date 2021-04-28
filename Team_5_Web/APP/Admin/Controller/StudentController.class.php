<?php
    namespace Admin\Controller;
    use Think\Controller;
    class StudentController extends BaseController {
        function __construct(){
            parent::__construct();
        }

        /*
         *  21 Apr 2021 22:14:22
         *  back-end manage centre -adding teacher
         */
        public function index($stuCard = null, $stuName = null, $stuSex = null, $stuMajor = null){
            $titles = array();
            $titles['prt'] = "student ";
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "student list";
            $this->assign("titles", $titles);

            $obj = M("major");
            $majorList = $obj->select();
            $this->assign("majorList", $majorList);

            $where = array();
            $where['state'] = 1;
            $seachData['stuCard'] = $stuCard;
            if(isset($stuCard) && !empty($stuCard)){
                $where['stuCard'] = array("like", "%{$stuCard}%");
            }
            $seachData['stuName'] = $stuName;
            if(isset($stuName) && !empty($stuName)){
                $where['stuRealName'] = $stuName;
            }
            $seachData['stuSex'] = $stuSex;
            if(isset($stuSex) && !empty($stuSex)){
                $where['stuSex'] = $stuSex;
            }
            $seachData['stuMajor'] = $stuMajor;
            if(isset($stuMajor) && !empty($stuMajor)){
                $where['major.majorId'] = $stuMajor;
            }
            $this->assign("seachData", $seachData);
            
            $obj    = M('student'); // Instantiate the User object
            $count  = $obj->where($where)->Count();// Query the total number of records meeting the requirements
            $Page   = new \Think\Page($count,10);// Instantiate the total number of incoming records and the number of records displayed per page of the paging class (25)
            $show   = $Page->show();// Paging display output//Paging data query Note that the parameters of the limit method should use the attributes of the Page class
            $usrList = $obj->join('left join major on student.stuMajor = major.majorId')->field('stuId, stuCard, stuRealName, stuSex, stuPhone, major.majorName')->order('stuCard asc')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('usrList', $usrList);// Assigned data set
            $this->assign('page',$show);// Assignment paging output
            $this->display(); // Output template
        }

        /*
         *  21 Apr 2021 22:14:57
         *  back-end manage centre -adding student 
         */
        public function add(){
            $titles = array();
            $titles['prt'] = "student ";
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "adding student ";
            $this->assign("titles", $titles);

            $this->display();
        }

        /*
         *  21 Apr 2021 22:15:02
         *  back-end manage centre -trash
         */
        public function recycle(){
            $titles = array();
            $titles['prt'] = "student ";
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "trash";
            $this->assign("titles", $titles);

            $obj = M('student');
            $usrList = $obj->join('left join major on student.stuMajor = major.majorId')->field('stuId, stuCard, stuRealName, stuSex, stuPhone, major.majorName')->order('stuCard asc')->where(array('state' => -1))->select();
            $this->assign('usrList', $usrList);

            $this->display();
        }

        /*
         *  21 Apr 2021 15:49:35
         *  back-end manage centre - library insert student data
         */
        public function addUsr(){
            if(IS_POST){
                $flag = I("post.account");
                if($flag == 'single'){
                    $account = I("post.singleAccount");
                    if(!is_numeric($account)){
                        $this->error('login account is student ID in digits, please check your input');
                        return ;
                    }


                    $data['stuCard'] = $account;
                    $pwd = I("post.pwd");
                    $data['stuPwd'] = isset($pwd) && $pwd != "" ? md5($pwd) : md5(666666);
                    $data['stuRealName'] = I("post.name");
                    $data['stuSex'] = I("post.sex");
                    $data['state'] = 1;
                    $time = time();
                    $data['updateTime'] = $time;
                    $data['createTime'] = $time;

                    $obj = M('student');
                    if($obj->where(array('stuCard' => $account))->Count() == 1){
                        $this->error('This account has already stored in the library, cannot add');
                        return;
                    }


                    $flag = $obj->add($data);
                    if($flag){
                        $this->success("student adding success");
                    }else{
                        $this->error("student adding failure");
                    }
                }else{
                    $account = I("post.mulAccount");
                    $cardArray = explode("-", $account);

                    if(count($cardArray) == 2 && is_numeric($cardArray[0]) && is_numeric($cardArray[1]) && $cardArray[1] - $cardArray[0] <= 200){
                        $pwd = I("post.pwd");
                        $data['stuPwd'] = isset($pwd) && $pwd != "" ? md5($pwd) : md5(666666);
                        $data['stuSex'] = I("post.sex");
                        $data['state'] = 1;

                        $repeatCount = 0;
                        $state = true;
                        $obj = M('student');
                        $obj->startTrans();
                        for($i = $cardArray[0]; $i <= $cardArray[1]; $i++){
                            $data['stuCard'] = $i;
                            $time = time();
                            $data['updateTime'] = $time;
                            $data['createTime'] = $time;

                            if($obj->where(array('stuCard' => $i))->Count() == 1){
                                $repeatCount++;
                                continue;
                            }

                            $flag = $obj->add($data);
                            if(!$flag){
                                $state = false;
                            }
                        }

                        if($state){
                            $obj->commit();
                            $this->success("bulk adding student success, repet number is {$repeatCount}, has jumped");
                        }else{
                            $obj->rollback();
                            $this->error("bulk adding student failure");
                        }

                    }else{
                        $this->error("login account format or range is wrong, please check your input");
                    }
                }
            }
        }

        /*
         *  21 Apr 2021 14:35:33
         *  view student details
         */
        public function checkDetail(){
            if(IS_POST){
                $id = I('post.id');
                $where['stuId'] = isset($id) ? $id : 0;

                $obj = M('student');
                $usrDetail = $obj->join('left join major on student.stuMajor = major.majorId')->field('stuCard, stuRealName, major.majorName, stuSex, stuAge, stuPhone, stuEmail')->where($where)->find();
                if(is_array($usrDetail) && !empty($usrDetail)){
                    echo json_encode(array('state' => true, 'detail' => $usrDetail));
                }else{
                    echo json_encode(array('state' => false, 'detail' => array()));
                }
            }
        }

        /*
         *  21 Apr 2021 10:35:49
         *  reset student password
         */
        public function reset($id = 0){
            if($id == 0){
                $this->error('fail to change, please check your actions');
            }else{
                $obj = M('student');
                $where['stuId'] = $id;

                $data['stuPwd'] = md5(666666);

                $flag = $obj->where($where)->save($data);
                if($flag){
                    $this->success('student password reset success');
                }else{
                    $this->error('student password reset failure, please your actions');
                }
            }
        }

        /*
         *  21 Apr 2021 13:34:25
         *  move student account  to trash
         */
        public function toRecycle($id = 0){
            if($id == 0){
                $this->error('fail to change, please check your actions');
            }else{
                $obj = M('student');
                $where['stuId'] = $id;

                $data['state'] = -1;

                $flag = $obj->where($where)->save($data);
                if($flag){
                    $this->success('delete success, student account has been moved to trsh');
                }else{
                    $this->error('delete failure, please your actions');
                }
            }
        }

        /*
         *  21 Apr 2021 14:13:23
         *  restore student status
         */
        public function recoverOne($id = 0){
            if($id == 0){
                $this->error('fail to change, please check your actions');
            }else{
                $obj = M('student');
                $where['stuId'] = $id;

                $data['state'] = 1;

                $flag = $obj->where($where)->save($data);
                if($flag){
                    $this->success('resore success, the student resore has been done');
                }else{
                    $this->error('resore failure, please your actions');
                }
            }
        }

        /*
         *  21 Apr 2021 14:14:12
         *  delete student account
         */
        public function clearOne($id = 0){
            if($id == 0){
                $this->error('fail to change, please check your actions');
            }else{
                $obj = M('student');
                $where['stuId'] = $id;

                $flag = $obj->where($where)->delete();
                if($flag){
                    $this->success('cleae success');
                }else{
                    $this->error('cleae failure, please your actions');
                }
            }
        }
    }