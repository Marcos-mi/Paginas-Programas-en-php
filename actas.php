<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);


function promediar($aNumeros){
    $contador = 0;
    foreach($aNumeros as $numero){
        $contador= $contador + $numero;
    }
    return $contador  / count($aNumeros);
}

$aAlumnos = array();
$aAlumnos[] = array("nombre" => "Ana valle",
    "notas" => array(7,8)
);
$aAlumnos[] = array("nombre" => "Bernabe Paz",
    "notas" => array(5,7)
);
$aAlumnos[] = array("nombre" => "Ana Bal",
    "notas" => array(6,9)
);
$aAlumnos[] = array("nombre" => "Ana juncos",
    "notas" => array(8,9)
);







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
<main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Actas</h1>
            </div>
        </div> 
      
        <div class="row">
            <div class="col-12">
                <table class="table border ">
                    <thead>
                        <th>Alumno</th>
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>Promedio</th>
                    </thead>
                    <tbody>
                      <?php foreach($aAlumnos as $alumno) : ?>
                        <tr>
                            <td><?php echo $alumno["nombre"];    ?></td>
                            <td><?php echo $alumno["notas"][0];     ?></td>
                            <td><?php echo $alumno ["notas"][1]    ?></td>
                            <td><?php echo number_format(promediar($alumno["notas"]), 2, ",", ".");?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>                 
        </div>        
        <div class="row">
            <div class="col-12 p-3">
                <p><?php echo "Promedio de la cursada: " . promediar($alumno["notas"]) / count($alumno); ?></p>
            </div>
        </div>         

    </main>
</body>
</html>