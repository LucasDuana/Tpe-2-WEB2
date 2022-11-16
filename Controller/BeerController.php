<?php 
require_once('Model/BeerModel.php');
require_once('View/BeerView.php');
require_once('Model/TypeModel.php');
require_once('helper/Helper.php');
class BeerController{

    private $beerModel;
    private $typeModel;
    private $beerView;

    function __construct(){
        $this->beerModel= new BeerModel();
        $this->beerView= new BeerView();
        $this->typeModel=new TypeModel();
        
    }

    public function showHome(){
        $beers=$this->beerModel->getBeersC();
        $categories=$this->typeModel->getCategories();
        $this->beerView->showHome($beers,$categories);
    }

    public function infoBeer($id){
        if ((!isset($id)) || (empty($id)))
            $this->beerView->renderErrorBeer();
        else{
            $beer=$this->beerModel->getBeerById($id);
            $this->beerView->renderBeerinfo($beer);
        }
    }

    public function deleteBeer($id){
        if (Helper::isLogged())
            $this->beerModel->deleteBeer($id);
        $this->beerView->showHomeLocation();
    }

    public function createBeer(){
        if (Helper::isLogged()){
            $this->beerModel->addBeer($_POST['name'] ,$_POST['summary'] ,$_POST['price'] ,$_POST['idtype'] );
            $this->beerView->showHomeLocation();
        }
    }

    public function updatebeer($id){
        if (Helper::isLogged()){
            $this->infoBeer($id);
            $categories=$this->typeModel->getCategories();
            $this->beerView->showFormBeerUpdate($id,$categories);
        }

    }

    public function changeBeer($id){
        $this->beerModel->updateBeer($id,$_POST['name'],$_POST['summary'],$_POST['price']);
        $this->beerView->showHomeLocation();
    }



        
    






}