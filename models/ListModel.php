<?php

class ListModel
{
  public $id;
  public $title;
  public $ordering;

  // Active record
  public function save()
  {
    $db = Database::getDB();

    // On créé la requête d'ajout/modification
    $sql = 'REPLACE INTO `lists` (id, title) VALUES (:id, :title)';

    // On prépare la requête
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
    $statement->bindValue(':title', $this->title, PDO::PARAM_STR);

    // On éxécute la requête
    $statement->execute();
  }

  // Permet de créer une nouvelle liste
  // public function create($title)
  // {
  //   $db = Database::getDB();
  //
  //   $sql = 'INSERT INTO `lists` (id, title) VALUES (NULL, :title)';
  //
  //   // On prépare la requête
  //   $statement = $db->prepare($sql);
  //   $statement->bindValue(':title', $title, PDO::PARAM_STR);
  //
  //   // On éxécute la requête
  //   $statement->execute();
  // }
}
