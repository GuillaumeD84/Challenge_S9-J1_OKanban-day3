<?php

class Application
{
  private $router;

  public function __construct()
  {
    // On instancie la class AltoRouteur
    $this->router = new AltoRouter();
    // On indique la partie de l'URL à ne pas utiliser
    $this->router->setBasePath(str_replace($_SERVER['DOCUMENT_ROOT'], '', getcwd()));

    // On lance directement la déclaration des routes depuis le constructeur
    $this->defineRoutes();
  }

  private function defineRoutes()
  {
    // On déclare nos routes
    $this->router->map( 'GET', '/', ['MainController', 'home'], 'home' );
    $this->router->map( 'GET', '/infos', ['MainController', 'infos'], 'infos' );
    $this->router->map( 'GET', '/list/create', ['ListController', 'create'], 'listCreate' );
    $this->router->map( 'GET', '/list/[i:id]/delete', ['ListController', 'delete'], 'listDelete' );

    $this->router->map( 'GET', '/contact', ['PagesController', 'contact'], 'contact' );
    $this->router->map( 'GET', '/cgu', ['PagesController', 'cgu'], 'cgu' );
  }

  public function run()
  {
    // Permet de tester l'URL actuelle et retourne un tableau associatif contenant les 3 clés suivantes : target (mixed), params (array) et name (string) si une map() a été trouvée.
    $match = $this->router->match();

    // On récupère les infos retournées par la méthode match()
    $controllerName = $match['target'][0];
    $actionName = $match['target'][1];
    $params = $match['params'];

    // On inclu le bon controller
    require_once 'controllers/'.$controllerName.'.php';
    // On instancie le controller récupéré de $match['target'][0]
    $controller = new $controllerName();
    // On appelle la méthode obtenue de $match['target'][1]
    $controller->$actionName($params);
  }
}
