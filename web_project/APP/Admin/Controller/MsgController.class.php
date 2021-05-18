<?php
    namespace Admin\Controller;
    use Think\Controller;
    class MsgController extends BaseController {
        function __construct(){
            parent::__construct();
        }

        /*
         *  21 Apr 2021 22:16:30
         *  back-end manage centre - message list 
         */
        public function index($keys = null, $receive = null){
            $titles = array();
            $titles['prt'] = "message ";
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "message list";
            $this->assign("titles", $titles);

            $where = array();
            $seachData['keys'] = $keys;
            if(isset($keys) && !empty($keys)){
                $where['msgContent'] = array("like", "%{$keys}%");
            }
            $seachData['receive'] = $receive;
            if(isset($receive) && !empty($receive)){
                switch ($receive) {
                    case 1:
                        $where['message.state'] = array("in", array(2, -2));
                        break;
                    case 2:
                        $where['message.state'] = -1;
                        break;
                    case 3:
                        $where['message.state'] = 1;
                        break;
                }
            }
            $this->assign("seachData", $seachData);

            $obj    = M('message'); // instantiate user object
            $count  = $obj->where($where)->Count();// enquare satisfied the number of all records
            $Page   = new \Think\Page($count,10);// Instantiate the total number of incoming records and the number of records displayed per page of the paging class (25)
            $show   = $Page->show();// Paging display output//Paging data query Note that the parameters of the limit method should use the attributes of the Page class
            $List = $obj->field('msgId, msgFromId, msgAccessId, msgContent, createTime, state')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
           
            foreach ($List as &$v) {
                if($v['state'] == 2){
                    $v['msgFromId'] = "admin";
                    $v['msgAccessId'] = "all students";
                }else if($v['state'] == -2){
                    $v['msgFromId'] = "admin";
                    $v['msgAccessId'] = "all teachers";
                }else if($v['state'] == 1){
                    unset($info);
                    $info = $obj->join("left join teacher on teacher.thrId = message.msgAccessId")->join("left join student on student.stuId = message.msgFromId")->field("thrRealName, stuRealName")->where(array('msgId' => $v['msgId']))->find();
                    $v['msgFromId'] = $info['stuRealName'];
                    $v['msgAccessId'] = $info['thrRealName'];
                }else if($v['state'] == -1){
                    unset($info);
                    $info = $obj->join("left join teacher on teacher.thrId = message.msgFromId")->join("left join student on student.stuId = message.msgAccessId")->field("thrRealName, stuRealName")->where(array('msgId' => $v['msgId']))->find();
                    $v['msgFromId'] = $info['thrRealName'];
                    $v['msgAccessId'] = $info['stuRealName'];
                }
            }

            $this->assign('List', $List);// assigning value to info list
            $this->assign('page',$show);// assigning value to pages & output

            $this->display();
        }

        /*
         *  21 Apr 2021 22:10:47
         *  back-end manage centre -trash
         */
        public function recycle(){
            $titles = array();
            $titles['prt'] = "message ";
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "trash";
            $this->assign("titles", $titles);

            $this->display();
        }


        /*
         *  21 Apr 2021 17:37:16
         *  adding message 
         */
        public function addMsg(){
            if(IS_POST){
                $data['msgParentId'] = 0;
                $data['msgFromId'] = -999;
                $data['msgAccessId'] = -999;
                $f = I("post.receive");
                $data['msgContent'] = I("post.content");
                $data['createTime'] = time();
                $data['showStu'] = 1;
                $data['showThr'] = 1;

                $obj = M('message');
                if($f == 1){
                    $data['state'] = -2;
                    if($obj->add($data)){
                        $data['state'] = 2;
                        $flag = $obj->add($data);
                    }else{
                        $flag = false;
                    }
                }else if($f == 2){
                    $data['state'] = -2;
                    $flag = $obj->add($data);
                }else if($f == 3){
                    $data['state'] = 2;
                    $flag = $obj->add($data);

                }

                if($flag){
                    $this->success("message send success");
                }else{
                    $this->error("message send failure");
                }
            }
        }

        /*
         *  21 Apr 2021 18:32:39
         *  centre delete message 
         */
        public function delMsg($id = 0){
            if($id != 0){
                $where["msgId"] = $id;

                $obj = M("message");
                $flag = $obj->where($where)->delete();
                if($flag){
                    $this->success("message delete success");
                }else{
                    $this->error("message delete failure");
                }
            }else{
                $this->error("action failure，please check your actions");
            }
        }
    }