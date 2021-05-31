<?php
namespace Ucenter\Controller;
use Think\Controller;
class AddController extends Controller {

    public function register(){
        if(IS_POST){
            // $data['thrId'] = I('post.id');
            $data['thrName'] = I('post.name');
            $data['thrRealName'] = I('post.realName');
            $data['thrSex'] = I('post.sex');

            // $pwd = I('post.pwd');
            $obj = M('teacher');

            if($obj->where($data)->Count() == 1){
                $this->error("found same account details, insertion failure");
                return ;
            }
            $data['thrPwd'] = I('post.pwd');
            $time = time();
            $data['updateTime'] = $time;
            $data['createTime'] = $time;
           
            

           
                //throw new \Exception("haha");
            $res = $obj->add($data);
            
            if($res){
                $this->success("teacher infomation adding success", U('Index/login'));
            }else{
                $this->error(3,"teacher infomation adding failure, please check your actions");
            }
            
     
            
        }
    }

}