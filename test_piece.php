<?php

try {
  $dbh = new PDO(
    'mysql:host=localhost;dbname=surface;charset=utf8',
    'root',
    '',
    array(PDO::ATTR_PERSISTENT => true)
  );


// parametres de definition
function creatPiece($nomPiece, $longPiece, $largPiece)
{
  global $dbh;

  $IdCreat= 0;

  // Prepare SQL statement
  $pdostat = $dbh->prepare("INSERT INTO piece (pce_id, log_id, pce_nom, pce_long, pce_larg) VALUES (NULL, NULL, :pce_nom, :pce_long, :pce_larg) ");
  $pdostat->bindValue(':pce_nom', $nompiece, PDO::PARAM_STR);
  $pdostat->bindValue(':pce_long', $longpiece, PDO::PARAM_STR);
  $pdostat->bindValue(':pce_larg', $largpiece, PDO::PARAM_STR);
  if ( $pdostat->execute() ) {
    // recuperation de l'ID de la ligne crée
    $IdCreat = $dbh->lastInsertId();
  } else {
  }

  return($IdCreat);
}

function readPiece($Id)
{
  global $dbh;

  $piece = array();

  echo "ID:$Id\n";

  $pdostat = $dbh->prepare("SELECT * FROM piece WHERE pce_id = :pce_id ");
  $pdostat->bindValue(':pce_id', $Id, PDO::PARAM_INT);
  if ( $pdostat->execute() ) {
    while ($aRow = $pdostat->fetch(PDO::FETCH_ASSOC)) {
        $piece = $aRow;
        }
  } else {
  }

  return($piece);
}

function updatePiece($Id, $nomPiece, $longPiece, $largPiece)
{

  global $dbh;
  $pdostat = $dbh->prepare("UPDATE piece SET pce_nom = :pce_nom, pce_long = :pce_long, pce_larg = :pce_larg WHERE pce_id = :pce_id");
  $pdostat->bindValue(':pce_nom', $nompiece, PDO::PARAM_STR);
  $pdostat->bindValue(':pce_long', $longPiece, PDO::PARAM_STR);
  $pdostat->bindValue(':pce_larg', $largPiece, PDO::PARAM_STR);
  $pdostat->bindValue(':pce_id', $Id, PDO::PARAM_INT);
  if ( $pdostat->execute() ) {
  //  echo "Update réussi\n";
  } else {
  //    echo "Update échoué\n";
  }
  echo "ID:$Id\n";
}

// Fonction ressemble beaucoup a readUser
function existPiece($Id)
{
  global $dbh;

  $bExiste = array();

  //echo "ID:$iId\n";

  $pdostat = $dbh->prepare("SELECT * FROM piece WHERE pce_id = :pce_id ");
  $pdostat->bindValue(':pce_id', $Id, PDO::PARAM_INT);
  if ( $pdostat->execute() ) {
    $bExiste = true;
  } else {
  }

  return($bExiste);
}


function deletePiece($iId)
{
  global $dbh;

  $pdostat = $dbh->prepare("DELETE FROM piece WHERE pce_id = :pce_id ");
  $pdostat->bindValue(':pce_id', $Id, PDO::PARAM_INT);
  if ( $pdostat->execute() ) {
//    echo "L'effacement est réussi\n";
  } else {
//    echo "L'effacement est échoué\n";
  }

}

function indexUser()
{
  global $dbh;

  $piece = array();

  $pdostat = $dbh->prepare("SELECT * FROM piece");
  if ( $pdostat->execute() ) {
    while ($aRow = $pdostat->fetch(PDO::FETCH_ASSOC)) {
        $piece[] = $aRow;
        }
  }

  return($piece);
}
} catch (PDOException $e) {
  echo "Erreur PDO: " . $e->getMessage() . "\n";
  exit();
}