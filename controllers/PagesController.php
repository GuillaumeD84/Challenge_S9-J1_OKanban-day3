<?php

class PagesController
{
  // Affiche la page passée en paramètre ($template = STRING)
  private function render($template)
  {
    require_once 'views/header.php';
    require_once 'views/'.$template.'.php';
    require_once 'views/footer.php';
  }

  // Affiche la page de contact
  public function contact()
  {
    $this->render('pages/contact');
  }

  // Affiche les CGU
  public function cgu()
  {
    $this->render('pages/cgu');
  }
}
