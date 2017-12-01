<?php

class MainController
{
  // Affiche la page passée en paramètre ($template = STRING)
  private function render($template)
  {
    require_once 'views/header.php';
    require_once 'views/'.$template.'.php';
    require_once 'views/footer.php';
  }

  // Affiche la page principale du site
  public function home()
  {
    $this->render('home/content');
  }

  // Affiche la page infos
  public function infos()
  {
    $this->render('home/infos');
  }
}
