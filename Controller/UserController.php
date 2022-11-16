<?php
    require_once('View/UserView.php');
    require_once('Model/UserModel.php');
    require_once('helper/Helper.php');


    class UserController{
        private $userModel;
        private $userView;

        public function __construct(){
            $this->userModel=new UserModel();
            $this->userView=new UserView();

        }

        public function showMenuLogin(){
            $this->userView->showLogin();

        }

        public function validate(){
            $email=$_POST['email'];
            $password=$_POST['password'];


            $user=$this->userModel->getUserByUserName($email);
            if ($user && password_verify($password, $user->contraseña)){
                session_start();
                $_SESSION['login']=true;
                Helper::redirect("home");
            } else{
                $this->userView->showLogin();
            }

        }

        public function showregister(){

            $this->userView->showregister();
        }

        public function register(){
        
            if (isset($_POST['username'],$_POST['password'], $_POST['email'])){
                $username=$_POST['username'];
                $email=$_POST['email'];
                $password=$_POST['password'];
                $this->userModel->insertUser($username,$email,$password);
            }
            Helper::redirect("home");
        }

        public function logout(){
            session_start();
            session_destroy();
            Helper::redirect("home");
        }






    }