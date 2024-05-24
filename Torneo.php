<?php


class Torneo{
    private $colObjPartidos;
    private $importe; #premio
    
    public function __construct($colObjPartidos,$importe)
    {
        $this->colObjPartidos = $colObjPartidos;
        $this->importe = $importe;
    }

    /* GETTESR Y SETTERS */

    /**
     * Get the value of colObjPartidos
     */ 
    public function getColObjPartidos()
    {
        return $this->colObjPartidos;
    }

    /**
     * Set the value of colObjPartidos
     *
     * @return  self
     */ 
    public function setColObjPartidos($colObjPartidos)
    {
        $this->colObjPartidos = $colObjPartidos;

         
    }

    /**
     * Get the value of importe
     */ 
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set the value of importe
     *
     * @return  self
     */ 
    public function setImporte($importe)
    {
        $this->importe = $importe;

         
    }

    /* debe crear y retornar la instancia de la clase Partido que corresponda 
    y almacenarla en la colección de partidos del Torneo. 
    Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores,
     caso contrario no podrá ser registrado ese partido en el torneo.  
    */
    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido){
        
        $equipo1categoria = $OBJEquipo1->getObjCategoria();
        $equipo2categoria = $OBJEquipo2->getObjCategoria();
    
        
        if(strcmp($tipoPartido, "futbol") == 0){
            $nuevoPartido = new PartidoFutbol(null, $fecha,null, null,null,null);
        }else{
            $nuevoPartido = new PartidoBasquetbol(null, $fecha,null, null,null,null,null);
        }

        if(($equipo1categoria->getDescripcion() == $equipo2categoria->getDescripcion()) &&
        ($OBJEquipo1->getCantJugadores() == $OBJEquipo2->getCantJugadores())){
        $nuevoPartido->setObjEquipo1($OBJEquipo1);
        $nuevoPartido->setObjEquipo2($OBJEquipo2);
        }

        $colPartidos = $this->getColObjPartidos();
        $colPartidos[] = $nuevoPartido;
        $this->setColObjPartidos($colPartidos);
        return $nuevoPartido;
    }

    /* metodo para convertir la coleccion de partidos en un string */
    public function arrayToString($coleccion){
        $string = "";
        foreach($coleccion as $elem){
            if (is_array($elem)) {
                // si hay un array, lo convierto con print_r
                $string .= print_r($elem, true) . "\n";
                
            }else{

                $string .= $elem . "\n";
            }
        }
        return $string;
    }

    /* 
        recibe por parámetro si se trata de un partido de fútbol o de básquetbol 
        y en  base  al parámetro busca entre esos partidos los equipos ganadores 
        ( equipo con mayor cantidad de goles). El método retorna una colección 
        con los objetos de los equipos encontrados.
    */
    public function darGanadores($deporte){
        $equiposGanadores = [];
        foreach($this->getColObjPartidos() as $partido){
            if($deporte == "futbol"){
                if($partido instanceof PartidoFutbol){
                    $equiposGanadores[] = $partido->darEquipoGanador();
                }
            }else{
                $equiposGanadores[] = $partido->darEquipoGanador();
            }
        }
        
        return $this->arrayToString($equiposGanadores);
    }

    /* 
    debe retornar un arreglo asociativo donde una de sus claves es ‘equipoGanador’  
    y contiene la referencia al equipo ganador; y la otra clave es ‘premioPartido’ 
    que contiene el valor obtenido del coeficiente del Partido por el importe 
    configurado para el torneo.
    */
    public function calcularPremioPartido($OBJpartido){
        $premio = $OBJpartido->coeficientePartido() * $this->getImporte();
        $arrAsoc = ["equipoGanador"=> $OBJpartido->darEquipoGanador(),
         "premioPartido"=> $premio];

        return $arrAsoc;
    }

    

    public function __toString()
    {
        return "coleccion de partidos: \n".$this->arrayToString($this->getColObjPartidos())."\n".
        "premio: ".$this->getImporte();
    }
}