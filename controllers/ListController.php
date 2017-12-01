<?php

class ListController
{

  // Création d'une nouvelle liste
  public function create()
  {
    echo 'LIST/CREATE';

    // On créé une nouvelle liste
    $title = 'test de titre';

    // Active record
    $row = new ListModel();
    $row->title = $title;
    $row->ordering = 1;
    // ...
    $row->save();
  }

  // Modification d'une liste existante
  public function update()
  {
    echo 'LIST/UPDATE';
  }

  // Suppression d'une liste existante
  public function delete($params)
  {
    // Id de la liste à supprimer = $params['id']
    echo $params['id'].' : LIST/DELETE';
  }
}
