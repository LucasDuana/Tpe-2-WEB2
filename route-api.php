<?php

    require_once('libs/Router.php');
    require_once('Controller/BeerApiController.php');
    require_once('Controller/TypeApiController.php'); 

    //instancio el router
    $router=new Router();

    //defino la tabla de ruteo
    //defino los get
    $router->addRoute('beer','GET','BeerApiController','getBeers'); //trae todas las cervezas 
    $router->addRoute('beer/:ID','GET','BeerApiController','getBeer');//trae la cerveza con el id indicado
    
    //defino los delete
    $router->addRoute('beer/:ID','DELETE','BeerApiController','deleteBeer');

    //defino post
    $router->addRoute('beer','POST','BeerApiController','insertBeer');

    //defino el put para actualizar
    $router->addRoute('beer/:ID','PUT','BeerApiController','updateBeer');

    //defino la tabla de ruteo para los tipos
    //defino los get
    $router->addRoute('type','GET','TypeApiController','getTypes');
    $router->addRoute('type/:ID','GET','TypeApiController','getType');

    //defino el post
    $router->addRoute('type','POST','TypeApiController','insertType');

    //defino el delete
    $router->addRoute('type/:ID','DELETE','TypeApiController','deleteType');

    $router->addRoute('type/:ID','PUT','TypeApiController','updateType');

    //rutea
    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
  