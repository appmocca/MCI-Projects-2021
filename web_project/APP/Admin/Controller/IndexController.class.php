<?php
namespace Admin\Controller;
use Think\Controller;
//$conn = mysqli_connect('localhost','root','123456','gproject') or die('fail to connect');
class IndexController extends Controller {
    public function index(){
    	$this->display("login");
    }

    /*
     *  21 Apr 2021 22:10:47
     *  User login actions
     */
    public function doLogin(){
        $where = array();
    	$where['adminName'] == I("post.usrname");
    	$where['adminPwd'] == md5(I("post.usrpwd"));

        $obj = M("admin");
        $info = $obj->field("adminRealName, state")->where($where)->find();
    	if(is_array($info) && isset($info)){
    		session("flag", true);
            session("NAME", $info['adminRealName']);
            session("state", $info['state']);

    		$this->redirect("Admin/index");
    	}else{
    		$this->error("Wrong password or username");
    	}
    }
}