<?php

    class TypeModel{

        private $db;

        function __construct(){
            $this->db=new PDO('mysql:host=localhost;'.'dbname=cerveceria;charset=utf8', 'root', '');
        }

        public function getCategories(){
            $query=$this->db->prepare("SELECT * from tipo"); 
            $query->execute();
            $category=$query->fetchAll(PDO::FETCH_OBJ);
            return $category;
        }

        public function getCategoryById($id){
            $query=$this->db->prepare("SELECT * FROM tipo WHERE id_tipo=?");
            $query->execute(array($id));
            $cat=$query->fetch(PDO::FETCH_OBJ);
            return $cat;
        }
        
        public function getBeersByCategory($id){
            $query=$this->db->prepare("SELECT nombre FROM tipo INNER JOIN cerveza ON tipo.id_tipo=cerveza.idtipo WHERE id_tipo=?");
            $query->execute(array($id));
            $beers=$query->fetchAll(PDO::FETCH_OBJ);
            return $beers;
        }

        public function deleteCategory($id){
            $query=$this->db->prepare("DELETE FROM tipo WHERE id_tipo=? ");
            $query->execute(array($id));
        }

        public function addType($name,$summary){
            $query=$this->db->prepare("INSERT INTO tipo (tipo,descripcion) VALUES(?,?)");
            $query->execute(array($name,$summary));
            return $this->db->lastInsertId();
        }

        public function updateType($id,$name,$summary){
            $query=$this->db->prepare("UPDATE tipo SET tipo=?, descripcion=? WHERE id_tipo=?");
            $query->execute(array($name,$summary,$id));
        }


    }