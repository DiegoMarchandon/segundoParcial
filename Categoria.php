<?php
class Categoria{
	private $idcategoria;
	private $descripcion;
	 

	public function __construct($idcategoria, $descripcion ){
		$this->idcategoria=$idcategoria;
		$this->descripcion= $descripcion;
	}
  public function setidcategoria($idcategoria){
         $this->idcategoria= $idcategoria;
    }

    public function getidcategoria(){
        return $this->idcategoria;
    }

    public function setDescripcion($descripcion){
         $this->descripcion= $descripcion;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }


    public function __toString(){
        //string $cadena
        $cadena = "IdCategori: ".$this->getidcategoria()."\n";
        $cadena = $cadena. "descripcion: ".$this->getDescripcion()."\n";
    }
}
?>
