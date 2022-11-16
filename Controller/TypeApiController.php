<?php
    require_once('Model/TypeModel.php');
    require_once('Model/BeerModel.php');
    require_once('View/ApiView.php');

    class TypeApiController{
        private $model;
        private $view;

        private $data;
        private $atributes;

        function __construct(){
            $this->model=new TypeModel();
            $this->view=new ApiView();
            $this->atributes=array("tipo","descripcion");
            $this->data = file_get_contents("php://input");
        }

        private function getData(){
            return json_decode($this->data);
        }
        
        public function getTypes($params=null){
            if ((isset($_GET["order"]) && isset($_GET["atribute"]))){
                $order=$_GET["order"];
                $atribute=$_GET["atribute"];
                if (in_array($atribute,$this->atributes)){
                    if ($order==="asc"){
                        $types=$this->model->typesOrderAsc($atribute);
                        return $this->view->response($types,200);
                    }
                    else {
                        if ($order==="desc"){
                        $types=$this->model->typesOrderDesc($atribute);
                        return $this->view->response($types,200);
                        }
                    }
                }
            }
            $types=$this->model->getCategories();
            if($types)
                return $this->view->response($types,200);  
            else 
                return $this->view->response("No content",204);
            
        }

        private function typeExist($id){ // verifica si existe la categoria
            $type = $this->model->getCategoryById($id);
            if ($type)
                return true;
            else
                return false;
        }

        public function getType($params=null){
            $id=$params[":ID"];
            if ($this->typeExist($id)){
                $type=$this->model->getCategoryById($id);
                return $this->view->response($type,200);
            }else
                return $this->view->response("No existe tal tipo de cerveza en el sistema",404);
        }

        private function emptyFieldType($type){
            if ((empty($type->tipo)) || (empty($type->descripcion)))
                return true;
            else
                return false;
        }

        public function insertType($params=null){
            $type=$this->getData();
            if ($this->emptyFieldType($type))
                return $this->view->response("Campos incompletos",400);
            else{
                $id=$this->model->addType($type->tipo,$type->descripcion);
                $type=$this->model->getCategoryById($id);
                $this->view->response($type,200);
            }
        }

        public function deleteType($params=null){
            $id=$params[":ID"];
            
            if ($this->typeExist($id)){
                $this->model->deleteCategory($id);
                $this->view->response("El tipo de cerveza se ha eliminado del sistema",200);
            }else //retorna un 404
                $this->view->response("El tipo de cerveza no se encuentra en el sistema",404);
        }

        public function updateType($params=null){
            $id=$params[":ID"];
            $type=$this->getData();
            if($this->typeExist($id)){
                $this->model->updateType($id,$type->tipo,$type->descripcion);
                $this->view->response("El tipo de cerveza se actualizó correctamente",200);
            }else
                return $this->view->response("Type not found",404);
        }





    }
 

    