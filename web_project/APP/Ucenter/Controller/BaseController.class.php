<?php
	namespace Ucenter\Controller;
	use Think\Controller;
	class BaseController extends Controller {
    
    function _initialize(){
    	
		$flag = session('FLAG') ? true : false;
		if(!$flag){
			$this->error("Please login first", U('Index/index'));
		}else{
			$this->assign('usrName', session('NAME'));
			
		}

		


    }
}