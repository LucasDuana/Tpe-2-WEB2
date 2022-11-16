<?php
    require_once('Model/BeerModel.php');
    require_once('Model/TypeModel.php');
    require_once('View/ApiView.php');

    
    class BeerApiController{

        private $model;
        private $modelC;
        private $view;

        private $data;
        private $atributes; //aca guardo los atributos por los cuales se puede ordenar.

        public function __construct(){
            $this->model=new BeerModel();
            $this->modelC=new TypeModel();
            $this->view=new ApiView();
            $this->atributes= array("nombre","precio","resumen");

            // lee el body del request
            $this->data = file_get_contents("php://input");
    
        }

        private function getData(){
            return json_decode($this->data);
        }

        public function getBeers($params=null){
            if ((isset($_GET["order"]) && isset($_GET["atribute"]))){
                $order=$_GET["order"];
                $atribute=$_GET["atribute"];
                if (in_array($atribute,$this->atributes)){
                    if ($order==="asc"){
                        $beers=$this->model->beersOrderAsc($atribute);
                        return $this->view->response($beers,200);
                    }
                    else {
                        if ($order==="desc"){
                        $beers=$this->model->beersOrderDesc($atribute);
                        return $this->view->response($beers,200);
                        }
                    }  
                }  
            $beers = $this->model->getBeersC();
            return $this->view->response($beers,200);
        }
    }

        public function getBeer($params=null){ //retorna una cervezaen especifica
            $id=$params[":ID"];
            if($this->beerExist($id)){ //fue exitoso y retorno 200
                $beer=$this->model->getBeerById($id);
                return $this->view->response($beer,200);
            }else    //retorno 404
                return $this->view->response("La cerveza con la  id -> $id no existe en el sistema",404);
        }

        private function columnExists($column){ //lo uso para verificar si una columna existe,para cuando necesite ordenar o filtrar
            if (in_array($column,$this->atributes))
                return true;
            return false; 
        }

        private function typeExist($id){ // verifica si existe la categoria
            $type = $this->modelC->getCategoryById($id);
            if ($type)
                return true;
            else
                return false;
        }

        private function beerExist($id){ //verifica si existe la cerveza
            $beer=$this->model->getBeerById($id);
            if ($beer)
                return true;
            else
                return false;
        }

        private function emptyFieldBeer($beer){
            if (empty($beer->nombre) || empty($beer->resumen) || empty($beer->precio) || empty($beer->idtipo))
                return true;
            else
                return false;
        }

        public function deleteBeer($params=null){ //borrar cerveza dado id
            $id=$params[":ID"];
            //$beer=$this->model->geetBeerById($id);
            if($this->beerExist($id)){
                $this->model->deleteBeer($id);
                return $this->view->response("La cerveza con el id fue eliminada con exito del sistema",200); 
            }else
                return $this->view->response("La cerveza con el id -> $id no existe en el sistema",404);
            
        }

        public function insertBeer($params = null) {
            $beer = $this->getData();
            if ($this->emptyFieldBeer($beer)) { //si alguno de los campos esta vacio
                $this->view->response("Complete los datos para crear una nueva cerveza en el sistema", 400);
            } else {
                if ($this->typeExist($beer->idtipo)){ //validacion,tiene que existir el tipo de cerveza
                    $id = $this->model->addBeer($beer->nombre, $beer->resumen, $beer->precio, $beer->idtipo);
                    $beerN = $this->model->getBeerById($id);
                    return $this->view->response($beerN, 201);
                }else //no existe el tipo de birra indicado para clasificar a la cerveza
                    return $this->view->response("No existe el tipo de cerveza para la indicada en el sistema",400);   
            }
        }

        public function updateBeer($params=null){
            $id=$params[":ID"];
            $beer = $this->getData();
            if ($this->emptyFieldBeer($beer))
                return $this->view->response("Complete los datos para poder actualizar una cerveza en el sistema",400);
            else{
                if ($this->typeExist($beer->idtipo)){
                    $beerN= $this->model->getBeerById($id);
                    if($beerN){
                        $this->model->updateBeer($id,$beer->nombre,$beer->resumen,$beer->precio,$beer->idtipo);
                        return $this->view->response("Se actualizó el item correctamente",200);
                    }
                    else    
                        return $this->view->response("No existe la cerveza en el sistema",404);
                }
                else{
                    return $this->view->respone("No existe el tipo de cerveza a actualizar",404);
                }
            }
        }



    }