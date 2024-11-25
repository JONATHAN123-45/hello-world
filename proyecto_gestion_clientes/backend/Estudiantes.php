<?php
function registrarEstudiantes($cantidad) {
    $estudiantes = [];
    for ($i = 0; $i < $cantidad; $i++) {
        echo "Ingresa el nombre del estudiante " . ($i + 1) . ": ";
        $nombre = trim(fgets(STDIN));

        echo "Ingresa la calificación 1: ";
        $cal1 = floatval(trim(fgets(STDIN)));

        echo "Ingresa la calificación 2: ";
        $cal2 = floatval(trim(fgets(STDIN)));

        echo "Ingresa la calificación 3: ";
        $cal3 = floatval(trim(fgets(STDIN)));

        $estudiantes[] = [
            "nombre" => $nombre,
            "calificaciones" => [$cal1, $cal2, $cal3]
        ];
    }
    return $estudiantes;
}

function calcularPromedio($calificaciones) {
    return array_sum($calificaciones) / count($calificaciones);
}

function promedioMasAlto($estudiantes) {
    $mejorPromedio = 0;
    $mejorEstudiante = "";

    foreach ($estudiantes as $estudiante) {
        $promedio = calcularPromedio($estudiante["calificaciones"]);
        if ($promedio > $mejorPromedio) {
            $mejorPromedio = $promedio;
            $mejorEstudiante = $estudiante["nombre"];
        }
    }

    return ["nombre" => $mejorEstudiante, "promedio" => $mejorPromedio];
}

// Programa principal
echo "¿Cuántos estudiantes deseas registrar?: ";
$cantidad = intval(trim(fgets(STDIN)));

$estudiantes = registrarEstudiantes($cantidad);

foreach ($estudiantes as $estudiante) {
    $promedio = calcularPromedio($estudiante["calificaciones"]);
    echo "El promedio de " . $estudiante["nombre"] . " es: " . $promedio . "\n";
}

$mejor = promedioMasAlto($estudiantes);
echo "El estudiante con el mejor promedio es: " . $mejor["nombre"] . " con " . $mejor["promedio"] . "\n";
?>
