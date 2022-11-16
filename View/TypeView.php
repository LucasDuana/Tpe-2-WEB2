<?php
    require_once('./libs/smarty-4.2.1/libs/Smarty.class.php');
    class Typeview{

        private $smarty;
        

        function __construct(){
            $this->smarty=new Smarty();
            $this->smarty->assign('props',Helper::props());
        }

        public function showCategories($categories){
            $this->smarty->assign('categories',$categories);
            $this->smarty->display('templates/header.tpl');
            $this->smarty->display('templates/typelist.tpl');
            $this->smarty->display('templates/footer.tpl');
        }

        public function showBeersByCategory($cat,$beers){
            $this->smarty->display('templates/header.tpl');
            $this->smarty->assign('categoria',$cat);
            $this->smarty->assign('beers',$beers);
            $this->smarty->display('templates/itemsbycategory.tpl');
            $this->smarty->display('templates/footer.tpl');
        }

        public function showTypeLocation(){
            header("Location: ". BASE_URL."tipos");
        }

        public function showFormAddType($id){
            $this->smarty->assign('id',$id);
            $this->smarty->display('formaddtype.tpl');
        }

        public function showFormUpdateType($id){
            $this->smarty->assign('id',$id);
            $this->smarty->display('formupdatetype.tpl');
        }



    }