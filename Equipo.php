<?php
class Equipo{
	private $nombre;
	private $capitan;
	private $cantJugadores;
	private $objCategoria;

	public function __construct($nombre, $capitan,$cantJugadores,$objCategoria){
		$this->nombre=$nombre;
		$this->capitan= $capitan;
		$this->cantJugadores=$cantJugadores;
		$this->objCategoria=$objCategoria;
	}
  public function setNombre($nombre){
         $this->nombre= $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }


     public function setCapitan($capitan){
         $this->capitan= $capitan;
    }

    public function getCapitan(){
        return $this->capitan;
    }



 public function setCantJugadores($cantJugadores){
         $this->cantJugadores= $cantJugadores;
    }

    public function getCantJugadores(){
        return $this->cantJugadores;
    }

     public function setObjCategoria($objCategoria){
         $this->objCategoria= $objCategoria;
    }

    public function getObjCategoria(){
        return $this->objCategoria;
    }

public function __toString(){
        //string $cadena
        $cadena = "Nombre: ".$this->getNombre()."\n";
        $cadena = $cadena. "capitan: ".$this->getCapitan()."\n";
         $cadena = $cadena. "Categoria: ".$this->getObjCategoria()->getDescripcion()."\n";
        $cadena = $cadena. "Cant. Jugadores: ".$this->getCantJugadores()."\n";
        return $cadena;
         }
     }
?>