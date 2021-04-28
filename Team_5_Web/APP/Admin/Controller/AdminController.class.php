<?php
    namespace Admin\Controller;
    use Think\Controller;
    class AdminController extends BaseController {
        function __construct(){
            parent::__construct();
            layout("Public/tplLayout");

                $flag = array();
                $flag['prt'] = strtolower(CONTROLLER_NAME);
                $flag['son'] = strtolower(CONTROLLER_NAME) . '_' . strtolower(ACTION_NAME);
                $this->assign('flag', $flag);
        }

        /*
         *  21 Apr 2021 22:13:36
         *  back-end managae centre - index page
         */
        public function index(){
            $Data = array();
            $Data['os']         = php_uname('s');
            $Data['web_os'] = $_SERVER["SERVER_NAME"];
            $Data['php_version']    = PHP_VERSION;
            $Data['ip']     = GetHostByName($_SERVER['SERVER_NAME']);
            $Data['language']   = 'PHP';
            $Data['db_os']      = 'MYSQL';
            $Data['db_version'] = mysql_get_server_info();
            $Data['domainname'] = $_SERVER["HTTP_HOST"];
            $this->assign('system', $Data);
            
            $titles = array();
            $titles['prt'] = null;
            $titles['prtLink'] = CONTROLLER_NAME;
            $titles['son'] = "Login info";
            $this->assign("titles", $titles);

            $countList['usr'] = M('admin')->Count();
            $countList['student'] = M('student')->Count();
            $countList['teacher'] = M('teacher')->Count();
            $countList['message'] = M('message')->Count();
            $countList['gp'] = M('gproject')->Count();
            $this->assign("CLists", $countList);

            $this->display();
        }

        /*
         *  21 Apr 2021 22:13:36
         *  back-end managae centre - logout
         */
        public function loginout(){
            session(null);

            $this->redirect("Index/index");
        }
    }