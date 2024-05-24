<?php

class PartidoBasquetbol extends Partido{

    private $cantInfracciones;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$cantInfracciones)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->cantInfracciones;
    }
    
    /**
     * Get the value of cantInfracciones
     */ 
    public function getCantInfracciones()
    {
        return $this->cantInfracciones;
    }

    /**
     * Set the value of cantInfracciones
     *
     * @return  self
     */ 
    public function setCantInfracciones($cantInfracciones)
    {
        $this->cantInfracciones = $cantInfracciones;

    }

    /* 
    si se trata de un partido de basquetbol  se almacena 
    la cantidad de infracciones de manera tal que al coeficiente base 
    se debe restar un coeficiente de penalización, cuyo valor por defecto es: 
    0.75, * (por) la cantidad de infracciones. Es decir:
    coef  = coeficiente_base_partido  - (coef_penalización*cant_infracciones);

    */
    public function coeficientePartido(){
        $cantG = $this->getCantGolesE1() + $this->getCantGolesE2();
        $cantJ = $this->getObjEquipo1()->getCantJugadores(); + $this->getObjEquipo2()->getCantJugadores();
        $coef = $this->getCoefBase() - (0.75 * $this->getCantInfracciones());
        
        $coeficiente = $cantG * $cantJ * $coef;

        return $coeficiente;
    }


    public function __toString()
    {
        return parent::__toString()."\n".
        "cantidad de infracciones: ".$this->getCantInfracciones();
    }

    
}