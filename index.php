<?php
/* Valores iniciales de la calculadora*/
$numero1 = "";
$numero2 = "";
$operacion = "sumar";
$mensaje = "";

/* PROCESO DE CALCULO */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero1 = $_POST["numero1"] ?? "";
    $numero2 = $_POST["numero2"] ?? "";
    $operacion = $_POST["operacion"] ?? "";

    if (is_numeric($numero1) && is_numeric($numero2)) {
        $a = (float) $numero1;
        $b = (float) $numero2;

        if ($operacion == "sumar") {
            $mensaje = "Resultado: " . ($a + $b);

        } elseif ($operacion == "restar") {
            $mensaje = "Resultado: " . ($a - $b);

        } elseif ($operacion == "multiplicar") {
            $mensaje = "Resultado: " . ($a * $b);

        } elseif ($operacion == "dividir") {
            if ($b == 0) {
                $mensaje = "No se puede dividir entre cero.";
            } else {
                $mensaje = "Resultado: " . ($a / $b);
            }

        } else {
            $mensaje = "Selecciona una operación válida.";
        }

    } else {
        $mensaje = " números NO válidos.";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mi CV - Christian Mesias</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    /* Datos personales*/
    <div class="contenedor">
      
        <img
            src="cm.jpeg"
            alt="Fotografía de Christian Mesías"
            id="foto"
        >

        <h1 id="titulo">Christian Gustavo Mesías Shulca</h1>

        <p class="presentacion">
            Desarrollo Web | Soporte Técnico | Redes
        </p>

        <p>
            <strong>Ubicación:</strong>
            Ambato, Tungurahua, Ecuador
        </p>

        <p>
            <strong>Estudios actuales:</strong>
            Ingeniería de Software
        </p>

        <h2>Perfil Profesional</h2>

        <p>
            Tecnólogo en Desarrollo de Aplicaciones Web con experiencia
            en soporte técnico, mantenimiento de equipos informáticos
            y solución de problemas de hardware, software y redes.
            Actualmente continúo mi formación en Ingeniería de Software.
        </p>

        <h2>Estudios</h2>

        <ul>
            <li>
                Ingeniería de Software — en curso, sexto semestre
            </li>
            <li>
                Tecnología en Desarrollo Web —
                Instituto Superior Universitario España
            </li>
            <li>
                Tecnología Universitaria en Sistemas y Ciberseguridad
            </li>
            <li>
                Técnico Informático — Unidad Educativa Bolívar
            </li>
        </ul>

        <h2>Experiencia Profesional</h2>

        <ul>
            <li>KM Solutions — Coordinador Tecnico </li>
            <li>MicroPagos S.A. — Asesor de Soporte Técnico</li>
            <li>Y&amp;M Systems —  Técnico Informático</li>
            <li>IMADECO — Técnico de Soporte</li>
        </ul>

        <h2>Conocimientos Técnicos</h2>

        <ul>
            <li>Diagnóstico y mantenimiento de equipos informáticos</li>
            <li>Instalación y configuración de Windows y software</li>
            <li>Redes TCP/IP y solución de problemas de conectividad</li>
            <li>Configuración de impresoras y periféricos</li>
            <li>Soporte técnico presencial y remoto</li>
        </ul>

        <h2>Contacto</h2>

        <p id= "correo">
            <strong>Correo:</strong>
            christiang_mesias@hotmail.com
            
        </p>

    </div>

    /*Calculadora*/
    <div class="contenedor" id="calculadora">

        <h2>Calculadora</h2>

        <p>Ingresa dos números y selecciona una operación.</p>

        <form method="post" action="#calculadora">

            <label for="numero1">Primer número:</label>

            <input
                type="number"
                id="numero1"
                name="numero1"
                step="any"
                required
                value="<?php echo htmlspecialchars($numero1, ENT_QUOTES, 'UTF-8'); ?>"
            >

            <label for="operacion">Operación:</label>

            <select id="operacion" name="operacion">

                <option
                    value="sumar"
                    <?php if ($operacion == "sumar") echo "selected"; ?>
                >
                    Sumar (+)
                </option>

                <option
                    value="restar"
                    <?php if ($operacion == "restar") echo "selected"; ?>
                >
                    Restar (-)
                </option>

                <option
                    value="multiplicar"
                    <?php if ($operacion == "multiplicar") echo "selected"; ?>
                >
                    Multiplicar (×)
                </option>

                <option
                    value="dividir"
                    <?php if ($operacion == "dividir") echo "selected"; ?>
                >
                    Dividir (÷)
                </option>

            </select>

            <label for="numero2">Segundo número:</label>

            <input
                type="number"
                id="numero2"
                name="numero2"
                step="any"
                required
                value="<?php echo htmlspecialchars($numero2, ENT_QUOTES, 'UTF-8'); ?>"
            >

            <button type="submit">Calcular</button>

        </form>

        <p id="resultado">
            <?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?>
        </p>

    </div>

</body>
</html>
