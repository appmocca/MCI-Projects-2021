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
                $to = 'appmocca@qq.com';
                $title = 'Proposal has been reviewed';
                $content = 'Please login to check proposal state';
                $this->sendMail($to,$title,$content);
                $obj = M('gproject');
                if($obj->where($where)->save($data)){
                    $this->success('Action Success');
                }else{
                    $this->error('Action Failure');
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
                $upload = new \Think\Upload();
                $upload->maxSize   =     3145728 ;// set upload file max size
                $upload->exts      =     array('pdf','docx','doc','jpg','png', 'jpeg');// set upload type
                $upload->rootPath  =     'Public'; // set upload file root dir
                $upload->savePath  =     '/upload/'; // set upload file child dir
                // upload file
                $info   =   $upload->uploadOne($files);

                if(!$info) {// display errors
                    $this->error($upload->getError());
                }else{
                    // upload success
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
                $data['state'] = 0;

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
        public function sendMail($to,$title,$content)
        // public function sendMail()
        {
            
            // $to = '394247123@qq.com';
            // $title = 'title';
            // $content = 'content';
            require('./ThinkPHP/Library/Vendor/phpmailer/class.phpmailer.php');
            try {
                $mail = new \PHPMailer(true);
                $mail->IsSMTP();
                $mail->SMTPSecure = 'ssl';
                $mail->CharSet = 'UTF-8';
                $mail->SMTPAuth = true; //Open auth
                $mail->Port = 465;    //Netmail is 25
                $mail->Host = "smtp.qq.com";
                $mail->Username = "394247123@qq.com";    //login usr name
                $mail->Password = "yxdiljnbhyhobjdb"; //SMTP login pwd
                $mail->AddReplyTo("394247123@qq.com", "first");//Replay address
                $mail->From = "394247123@qq.com";
                $mail->FromName = 'Admin';
                $mail->AddAddress($to);
                $mail->Subject = $title;
                $mail->Body = $content;
                $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //When email does not eupport html
                $mail->WordWrap = 80; // set the length of each line
                //$mail->AddAttachment("f:/test.png"); //could upload files
                $mail->IsHTML(true);
                $mail->Send();
                echo 'send successfully';
            } catch (\Exception $e) {

                $this->error('send failure：'.$e->getMessage());
            }
        }
    }
?>