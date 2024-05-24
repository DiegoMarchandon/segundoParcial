<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("PartidoFutbol.php");
include_once("PartidoBasquetbol.php");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

// Crear un objeto de la clase Torneo donde el importe base del premio es de: 100.000. 

$torneo = new Torneo([],100000);

// Completar el script testTorneo.php 
// crear 3 objetos partidos de Básquet  con la siguiente información:
$partido1 = new PartidoBasquetbol(11, '2024-05-05',$objE7,80,$objE8,120,7);
$partido2 = new PartidoBasquetbol(12,'2024-05-06',$objE9,81,$objE10,110,8);
$partido3 = new PartidoBasquetbol(13,'2024-05-07',$objE11,115,$objE12,85,9);

// Crear 3 objetos partidos de Fútbol con la siguiente información

$partido4 = new PartidoFutbol(14,'2024-05-07',$objE1,3,$objE2,2);
$partido5 = new PartidoFutbol(15,'2024-05-08',$objE3,0,$objE4,1);
$partido6 = new PartidoFutbol(16,'2024-05-09',$objE5,2,$objE6,3);


/* 
echo "ingresarPartido(objE5, objE11, '2024-05-23', 'Futbol')"."\n".
*/
$torneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol');
/* 
 echo "ingresarPartido(objE11, objE11, '2024-05-23', 'basquetbol')\n".
 */
$torneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol');
/* 
echo "ingresarPartido(objE9, objE10, '2024-05-25', 'basquetbol');"."\n".
*/ 
$torneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol');

/* 
darGanadores(‘basquet’) y visualizar el resultado.
darGanadores(‘futbol’) y visualizar el resultado.
calcularPremioPartido con cada uno de los partidos obtenidos en a,b,c.
*/
/* 
echo "darGanadores(basquet)"."\n".
$torneo->darGanadores("basquet"); */

echo "darGanadores(futbol)"."\n".
$torneo->darGanadores("futbol");

$torneo->calcularPremioPartido($partido1);

$torneo->calcularPremioPartido($partido2);

$torneo->calcularPremioPartido($partido3);

$torneo->calcularPremioPartido($partido4);

$torneo->calcularPremioPartido($partido5);

$torneo->calcularPremioPartido($partido6);

// Realizar un echo del objeto  Torneo creado en (1).
// echo $torneo;




?>
