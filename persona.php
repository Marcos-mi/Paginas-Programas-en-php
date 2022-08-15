<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);


class Persona{
    public $dni;
    public $nombre;
    public $edad;
    public $nacionalidad;
    public function imprimir(){

    }
}

class  Alumno extends Persona{
    public $legajo;
    public function __construct()
    {
        $this ->notaPortfolio = 0.0;
        $this ->notaPhp = 0.0;
        $this ->notaProyecto = 0.0;
    }
    public  function imprimir(){
        echo "DNI: " . $this -> dni . "<br>";
        echo "Nombre: " . $this -> nombre . "<br>";
        echo "Nota PHP: " . $this -> notaPhp . "<br>";
        echo "Nota Proyecto: " . $this -> notaProyecto . "<br>";
        echo "Nota Portfolio: " . $this -> notaPortfolio . "<br>";
        echo "Promedio del alumno: " . number_format($this -> calcularPromedio(), 2, ",", ".") . "<br><br>";
    }
    public  function calcularPromedio(){
        $promedio = 0;
        $promedio = ($this-> notaPhp + $this->notaProyecto + $this-> notaPortfolio) / 3;
        return $promedio;
    }
    
    }
class Docente extends Persona{
    public $especialidad;
    public function imprimir(){}
    public function imprimirEspecialidadesHabilitadas(){}
}

$alumno1 = new Alumno();
$alumno1 -> dni = "44508416";
$alumno1 -> nombre = "Marcos";
$alumno1 -> notaPhp = 8;
$alumno1 -> notaPortfolio = 7;
$alumno1 -> notaProyecto = 10;
$alumno1 -> imprimir();

$alumno2 = new Alumno();
$alumno2 -> dni = "39929732";
$alumno2 -> nombre = "Cristian";
$alumno2 -> notaPhp = 10;
$alumno2 -> notaPortfolio = 9;
$alumno2-> notaProyecto = 6;
$alumno2 -> imprimir();
?>