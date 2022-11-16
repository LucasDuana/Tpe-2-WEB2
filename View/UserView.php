<?php

    class UserView{
        private $smarty;

        function __construct(){
            $this->smarty=new Smarty();
            $this->smarty->assign('props',Helper::props());

        }

        public function showLogin(){
            $this->smarty->display('templates/header.tpl');
            $this->smarty->display('templates/formLogin.tpl');
            $this->smarty->display('templates/footer.tpl');

        }



        public function showregister(){
            $this->smarty->display('templates/header.tpl');
            $this->smarty->display('templates/formRegister.tpl');
            $this->smarty->display('templates/footer.tpl');
        }



    }