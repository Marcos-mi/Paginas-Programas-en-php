<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);


class Persona{
    protected $dni;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;
    
    public function setDni($dni){ $this->dni = $dni; }
    public function getDni(){ return $this->dni; }
    
    public function setNombre($nombre){ $this->nombre = $nombre;}
    public function getNombre(){ return $this->nombre; }
    
    public function setNacionalidad($nacionalidad){ $this->nacionalidad = $nacionalidad; }
    public function getNacionalidad(){ return $this->nacionalidad; }
    
    public function setEdad($edad){ $this->edad = $edad; }
    public function getEdad(){ return $this->edad; }
    
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
    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    
    }
class Docente extends Persona{
    private $especialidad;
    const ESPECIALIDAD_WP = "Wordpress";
    const ESPECIALIDAD_ECO = "Economía aplicada";
    const ESPECIALIDAD_BBDD = "Base de datos";
    public function __destruct()
    {
        echo "Destruyendo el objeto " . $this ->nombre ."<br>"; 
    }

    public function imprimir(){
        echo "Nombre del docente: " . $this -> nombre . "<br>";
    }

    
    public function imprimirEspecialidadesHabilitadas(){
        echo "Un docente puede tener las siguientes especialidades: <br>";
        echo "Especialidad 1: ". self::ESPECIALIDAD_WP ."<br>";
        echo "Especialidad 2: ". self::ESPECIALIDAD_ECO ."<br>";
        echo "Especialidad 3: ". self::ESPECIALIDAD_BBDD . "<br>";

    }
    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

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


$docente1 = new Docente();
$docente1 -> nombre = "Peska";
$docente1 -> imprimir();
$docente1 -> imprimirEspecialidadesHabilitadas();
?>