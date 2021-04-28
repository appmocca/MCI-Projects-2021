<?php
    namespace Admin\Controller;
    use Think\Controller;
    class UsrController extends BaseController {
        function __construct(){
            parent::__construct();
        }

        /*
         *  21 Apr 2021 22:18:06
         *  back-end manage centre - user list
         */
        public function index(){
            $titles = array();
            $titles['prt'] = "user";
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "user list";
            $this->assign("titles", $titles);

            $obj = M('admin');
            // $where['state'] = 1;
            $usrList = $obj->field('adminId, adminName, adminRealName, adminSex, adminPhone, adminEmail, state')->where($where)->select();
            $this->assign("usrList", $usrList);
            
            $this->display();
        }

        /*
         *  21 Apr 2021 22:18:22
         *  back-end manage centre - assing user
         */
        public function add(){
            $titles = array();
            $titles['prt'] = "user";
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "assing user";
            $this->assign("titles", $titles);

            $this->display();
        }

        /*
         *  21 Apr 2021 22:18:43
         *  back-end manage centre - trash
         */
        public function recycle(){
            $titles = array();
            $titles['prt'] = "user";
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "trash";
            $this->assign("titles", $titles);

            $obj = M('admin');
            $where['state'] = -1;
            $usrList = $obj->field('adminId, adminName, adminRealName, adminSex, adminPhone, adminEmail')->where($where)->select();
            $this->assign("usrList", $usrList);

            $this->display();
        }


        /*
         *  21 Apr 2021 10:35:49
         *  assing user，write into library
         */
        public function addusr(){

            if(IS_POST){
                $data = array();
                $data['adminName']      = I('post.name');
                $data['adminPwd']       = md5(I('post.pwd'));
                $data['adminRealName']  = I('post.realname');
                $data['adminSex']       = I('post.sex');
                $data['adminAge']       = I('post.age');
                $data['adminPhone']     = I('post.phone') ? I('post.phone') : null;
                $data['adminEmail']     = I('post.email') ? I('post.email') : null;
                $data['adminAddress']   = I('post.address') ? I('post.address') : null;
                $tmpTime = time();
                $data['createTime']     = $tmpTime;
                $data['updateTime']     = $tmpTime;
                $data['state']          = I("post.state");

                $obj = M('admin');
                $flag = $obj->add($data);
                if($flag){
                    $this->success("new user adding success");
                }else{
                    $this->error("user adding failure, please check your actions");
                }
            }
        }

        /*
         *  21 Apr 2021 10:35:49
         *  reset user passwrod
         */
        public function reset($id = 0){
            if($id == 0){
                $this->error('change failure, please check your actions');
            }else{
                $obj = M('admin');
                $where['adminId'] = $id;

                $data['adminPwd'] = md5(123456);

                $flag = $obj->where($where)->save($data);
                if($flag){
                    $this->success('user password reset success');
                }else{
                    $this->error('user password reset failure, please check your actions');
                }
            }
        }

        /*
         *  21 Apr 2021 13:34:25
         *  move user account to trash
         */
        public function toRecycle($id = 0){
            if($id == 0){
                $this->error('change failure, please check your actions');
            }else{
                $obj = M('admin');
                $where['adminId'] = $id;

                //for now，user class only has admin level
                $data['state'] = -1;

                $flag = $obj->where($where)->save($data);
                if($flag){
                    $this->success('delete success，moved user account to trash');
                }else{
                    $this->error('delete failure, please check your actions');
                }
            }
        }

        /*
         *  21 Apr 2021 14:13:23
         *  user status restoration
         */
        public function recoverOne($id = 0){
            if($id == 0){
                $this->error('change failure, please check your actions');
            }else{
                $obj = M('admin');
                $where['adminId'] = $id;

                //for now，user class only has admin level
                $data['state'] = 1;

                $flag = $obj->where($where)->save($data);
                if($flag){
                    $this->success('restore success，user status restored success');
                }else{
                    $this->error('restore failure, please check your actions');
                }
            }
        }

        /*
         *  21 Apr 2021 14:14:12
         *  clear user account
         */
        public function clearOne($id = 0){
            if($id == 0){
                $this->error('change failure, please check your actions');
            }else{
                $obj = M('admin');
                $where['adminId'] = $id;

                $flag = $obj->where($where)->delete();
                if($flag){
                    $this->success('clear success');
                }else{
                    $this->error('clear failure, please check your actions');
                }
            }
        }

        /*
         *  21 Apr 2021 14:35:33
         *  view user details
         */
        public function checkDetail(){
            if(IS_POST){
                $id = I('post.id');
                $where['adminId'] = isset($id) ? $id : 0;

                $obj = M('admin');
                $usrDetail = $obj->field('adminId, adminName, adminRealName, adminSex, adminAge, adminPhone, adminEmail, adminAddress, state')->where($where)->find();
                if(is_array($usrDetail) && !empty($usrDetail)){
                    echo json_encode(array('state' => true, 'detail' => $usrDetail));
                }else{
                    echo json_encode(array('state' => false, 'detail' => array()));
                }
            }
        }
    }