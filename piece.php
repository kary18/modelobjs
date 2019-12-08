<?php
require_once("test_piece.php");
class Piece
{
  private $nomPiece;
  private $longPiece;
  private $largPiece;

  function __construct($nomPiece, $longPiece, $largPiece) {
        
    $this->nomPiece = $nomPiece;
    
    $this->longPiece = $longPiece;
    
    $this->larggPiece = $largPiece;
}
function getall() {
        
  return $this->nomPiece." salon ".$this->longPiece." 10 ".$this->largPiece." 7 ";
}
}


  /*public function getDateConnexion()
  {
      return($this->date_connexion);
  }
  public function toArray()
  {
    $aReturn = [
      "email" => $this->email,
      "password_hash" => $this->password_hash,
      "date_connexion" => $this->date_connexion
    ];
    return($aReturn);
  }
}*/