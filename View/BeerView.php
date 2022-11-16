<?php
    require_once('./libs/smarty-4.2.1/libs/Smarty.class.php');

    class BeerView{

        private $smarty;

        function __construct(){

            $this->smarty=new Smarty();
            $this->smarty->assign('props',Helper::props());

        }

        public function showHome($beers,$categories){
            $this->smarty->display('templates/header.tpl');
            $this->smarty->assign('beers', $beers);
            $this->smarty->assign('categories', $categories);
            $this->smarty->display('templates/beertable.tpl');
            $this->smarty->display('templates/footer.tpl');   
        }

        public function renderErrorBeer(){
            $this->smarty->display('errorBeer.tpl');
        }

        public function renderBeerInfo($beer){
            $this->smarty->assign('beer',$beer);
            $this->smarty->display('beerinfo.tpl');
        }

        public function showHomeLocation(){
            HELPER::redirect("home");
        }

        public function showFormAdd(){
            $this->smarty->display('formaddbeer.tpl');
        }

        function showFormBeerUpdate($id,$categories){
            $this->smarty->assign('id',$id);
            $this->smarty->assign('categories',$categories);
            $this->smarty->display('formupdatebeer.tpl');
        }
    }