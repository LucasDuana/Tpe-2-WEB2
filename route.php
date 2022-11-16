<?php
    require_once('Controller/BeerController.php');
    require_once('Controller/TypeController.php');
    require_once('Controller/UserController.php'); 
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $action="home";
    // lee la acción
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'home'; // acción por defecto si no envían
    }

    
    $params = explode('/', $action);

    
    // determina que camino seguir según la acción
    switch ($params[0]) {
        case 'home': //muestra el home con las cervezas y el form para agregar una nueva
            $beerController= new BeerController();
            $beerController->showHome();
            break;
        //relacionado a cervezas
        case 'beerInfo': //informacion de una birra en especifico
            $beerController=new BeerController();
            $beerController->infoBeer($params[1]);
            break;

        case 'createBeer': //se quiere agregar una cerveza
            $beerController=new BeerController();
            $beerController->createBeer();
            break;

        case 'deleteBeer'://se quiere borrar una birra
            $beerController=new BeerController();
            $beerController->deleteBeer($params[1]);
            break;

        case 'updateBeer':
            $beerController=new BeerController();
            $beerController->updateBeer($params[1]);
            break;

        case 'changeBeer':
            $beerController=new BeerController();
            $beerController->changeBeer($params[1]);
            break;

        //relacionado a los tipos
        case 'tipos': //se quiere ver la lista de tipos
            $typeController=new TypeController();
            $typeController->showCategories();
            break;

        case 'deleteType': //borra tipo de cerveza
            $typeController=new TypeController();
            $typeController->deleteCategory($params[1]);
            break;

        case 'tipo': //se quiere ver un tipo en especial con sus items
            $typeController=new TypeController();
            $typeController->showCategory($params[1]);
            break;

        case 'createType':
            $typeController=new TypeController();
            $typeController->createType();
            break;
        case 'updateType':
            $typeController=new TypeController();
            $typeController->updateType($params[1]);        
            break;

        case 'menulogin': //relacionado al usuario
            $userController=new UserController();
            $userController->showMenuLogin();
            break;

        case 'validatelogin':
            $userController=new UserController();
            $userController->validate();
            break;

        case 'logout':  
            $userController=new UserController();
            $userController->logout(); 
            break;

        case 'register': //relacionado a registrarse
            $userController=new UserController();
            $userController->showregister();
            break;

        case 'registeruser':
            $userController=new UserController();
            $userController->register();
            break;
 

    }
