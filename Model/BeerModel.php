<?php

    class BeerModel{

        private $db;

        function __construct(){
            $this->db= new PDO('mysql:host=localhost;'.'dbname=cerveceria;charset=utf8', 'root', '');
        }

        public function getBeersC(){
            $query=$this->db->prepare("SELECT * FROM cerveza LEFT JOIN tipo ON cerveza.idtipo = tipo.id_tipo ");
            $query->execute();
            $beers= $query->fetchAll(PDO::FETCH_OBJ);
            return $beers;
        }

        public function addBeer($name,$summary,$price,$idtype){
            $query=$this->db->prepare("INSERT INTO cerveza(idtipo,nombre,resumen,precio) VALUES(?,?,?,?) ");
            $query->execute(array($idtype,$name,$summary,$price));
            return $this->db->lastInsertId();
        }

        public function getBeerById($id){
            $query=$this->db->prepare("SELECT * FROM cerveza LEFT JOIN tipo ON cerveza.idtipo = tipo.id_tipo WHERE id_cerveza=?");
            $query->execute(array($id));
            $beer=$query->fetch(PDO::FETCH_OBJ);
            return $beer;
        }

        public function deleteBeer($id){
            $query=$this->db->prepare("DELETE FROM cerveza WHERE id_cerveza=? ");
            $query->execute(array($id));
        }

        public function updateBeer($id,$name,$summary,$price,$idtipo){
            $query=$this->db->prepare("UPDATE cerveza SET nombre=?, resumen=?, precio=?, idtipo=? WHERE id_cerveza=?");
            $query->execute(array($name,$summary,$price,$idtipo,$id));
        }

        public function beersOrderAsc($col){
            $query = $this->db->prepare("SELECT * FROM cerveza ORDER BY $col ASC");
            $query->execute();
            $beers = $query->fetchall(PDO::FETCH_OBJ);
            return $beers;
        }

        public function beersOrderDesc($col){
            $query = $this->db->prepare("SELECT * FROM cerveza ORDER BY $col DESC");
            $query->execute();
            $beers = $query->fetchall(PDO::FETCH_OBJ);
            return $beers;
        }

    }