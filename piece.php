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

