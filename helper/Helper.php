<?php

    class Helper{

        function __construct(){


        }

        public static function redirect($lugar){
            header("Location: " . BASE_URL."$lugar");
        }

        public static function props(){
            session_start();
            $props=[];
            $props['login']= isset($_SESSION['login']);
            session_abort();
            return $props;
        }

        public static function isLogged() {
            session_start();
            if ( isset($_SESSION['login'])){
                session_abort(); 
                return true;
            }
                else {  
                    session_abort();
                    return false;
                }
        }

       



    }