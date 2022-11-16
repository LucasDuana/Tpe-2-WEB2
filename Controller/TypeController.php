<?php
    require_once('Model/TypeModel.php');
    require_once('View/TypeView.php');
    require_once('helper/Helper.php');
    class TypeController{

        private $typeModel;
        private $typeView;

        function __construct(){
            $this->typeModel=new TypeModel();
            $this->typeView=new TypeView();
        }

        public function showCategories($params = null){
            $categories=$this->typeModel->getCategories();
            $this->typeView->showCategories($categories);
        }

        public function createType(){
            if ((isset($_POST['name'])) && (isset($_POST['summary'])))
                if (Helper::isLogged())
                    $this->typeModel->addType($_POST['name'],$_POST['summary']);
            Helper::redirect("tipos");
        }

        public function updateType($id){
            if (Helper::isLogged())
                $this->typeModel->updateType($id,$_POST['name'],$_POST['summary']);
            Helper::redirect("tipos");
        }

        public function showCategory($id){
            $beers=$this->typeModel->getBeersByCategory($id);
            $cat= $this->typeModel->getCategoryById($id);
            $this->typeView->showBeersByCategory($cat,$beers);
            $this->typeView->showFormUpdateType($id);

        }

        public function deleteCategory($id){
            if (Helper::isLogged())
                $this->typeModel->deleteCategory($id);
            $this->typeView->showTypeLocation();
        }




    }