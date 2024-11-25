<?php
function sumar($a, $b) {
    return $a + $b;
}

function restar($a, $b) {
    return $a - $b;
}

function multiplicar($a, $b) {
    return $a * $b;
}

function dividir($a, $b) {
    if ($b == 0) {
        return "Error: División por cero.";
    }
    return $a / $b;
}

echo "Bienvenido a la Calculadora\n";
echo "Selecciona una operación: 1) Suma 2) Resta 3) Multiplicación 4) División\n";
$operacion = intval(trim(fgets(STDIN)));

echo "Ingresa el primer número: ";
$num1 = floatval(trim(fgets(STDIN)));

echo "Ingresa el segundo número: ";
$num2 = floatval(trim(fgets(STDIN)));

switch ($operacion) {
    case 1:
        echo "Resultado: " . sumar($num1, $num2) . "\n";
        break;
    case 2:
        echo "Resultado: " . restar($num1, $num2) . "\n";
        break;
    case 3:
        echo "Resultado: " . multiplicar($num1, $num2) . "\n";
        break;
    case 4:
        echo "Resultado: " . dividir($num1, $num2) . "\n";
        break;
    default:
        echo "Operación no válida.\n";
}
?>
