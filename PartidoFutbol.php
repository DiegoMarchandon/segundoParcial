<?php

class PartidoFutbol extends Partido{


    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
    }

    /* 
    Si se trata de un partido de fútbol, se deben gestionar 
    el valor de 3 coeficientes que serán aplicados según la categoría 
    del partido (coef_Menores,coef_juveniles,coef_Mayores)
    */
    public function coeficientePartido(){
        $coeficiente = parent::coeficientePartido();
        
        if(($this->getObjEquipo1()->getObjCategoria()->getDescripcion()) == $this->getObjEquipo2()->getObjCategoria()->getDescripcion()){
            $categoria = $this->getObjEquipo1()->getObjCategoria()->getDescripcion();
            if(strcmp($categoria, "menores") == 0){
                $coeficiente = $coeficiente * 0.13;
            }elseif(strcmp($categoria,"juveniles") == 0){
                $coeficiente = $coeficiente = $coeficiente * 0.19;
            }else{ # mayores
                $coeficiente = $coeficiente * 0.27;
            }
        
        return $coeficiente;
        }   
    }

    public function __toString()
    {
        return parent::__toString();
    }
}