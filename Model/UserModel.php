<?php

    class UserModel{

        private $db;

        function __construct(){
            $this->db= new PDO('mysql:host=localhost;'.'dbname=cerveceria;charset=utf8', 'root', '');


        }

        public function insertUser($username,$email,$password){
            $userpassword=password_hash($password, PASSWORD_BCRYPT);
            $query=$this->db->prepare("INSERT INTO usuario (username,email,contraseña) VALUES(?,?,?)");
            $query->execute(array($username,$email,$userpassword));
            
        }


        public function getUserByUserName($email){
            $query=$this->db->prepare("SELECT * FROM usuario WHERE usuario.email=?");
            $query->execute(array($email));
            $user=$query->fetch(PDO::FETCH_OBJ);
            return $user;
        }




    }