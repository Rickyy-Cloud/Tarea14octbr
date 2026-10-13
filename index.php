<?php
// Variable para saber si ya se envió el formulario
$procesado = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $procesado = true;

    // Datos personales
    $nombre = $_POST["nombre"];
    $cedula = $_POST["cedula"];

    // Horas trabajadas
    $horas_diurna = $_POST["horas_diurna"];
    $horas_vespertina = $_POST["horas_vespertina"];
    $horas_nocturna = $_POST["horas_nocturna"];

    // Tarifas por hora
    $tarifa_diurna = 675;
    $tarifa_vespertina = 700;
    $tarifa_nocturna = 956.23;

    // Sueldo bruto
    $sueldo_bruto = ($horas_diurna * $tarifa_diurna)
                  + ($horas_vespertina * $tarifa_vespertina)
                  + ($horas_nocturna * $tarifa_nocturna);

    // Porcentajes según el sueldo bruto
    if ($sueldo_bruto < 85000) {
        $porc_ahorro = 0.1;
        $porc_seguro = 0.15;
    } elseif ($sueldo_bruto <= 150000) {
        $porc_ahorro = 0.15;
        $porc_seguro = 0.2;
    } else {
        $porc_ahorro = 0.3;
        $porc_seguro = 0.25;
    }

    // Montos descontados
    $ahorro_habitacional = $sueldo_bruto * $porc_ahorro / 100;
    $seguro_social = $sueldo_bruto * $porc_seguro / 100;

    // Sueldo neto
    $sueldo_neto = $sueldo_bruto - $ahorro_habitacional - $seguro_social;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sueldo Quincenal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4 mb-4">
        <h1 class="mb-4">Cálculo del Sueldo Quincenal</h1>

        <form method="post" action="index.php">
            <h4>Datos personales</h4>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="cedula" class="form-label">Cédula</label>
                <input type="text" class="form-control" id="cedula" name="cedula">
            </div>

            <h4>Horas trabajadas</h4>
            <div class="mb-3">
                <label for="horas_diurna" class="form-label">Horas diurnas</label>
                <input type="number" class="form-control" id="horas_diurna" name="horas_diurna">
            </div>
            <div class="mb-3">
                <label for="horas_vespertina" class="form-label">Horas vespertinas</label>
                <input type="number" class="form-control" id="horas_vespertina" name="horas_vespertina">
            </div>
            <div class="mb-3">
                <label for="horas_nocturna" class="form-label">Horas nocturnas</label>
                <input type="number" class="form-control" id="horas_nocturna" name="horas_nocturna">
            </div>

            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>

        <?php if ($procesado) { ?>
            <hr>
            <h4>Resultado</h4>
            <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
            <p><strong>Cédula:</strong> <?php echo $cedula; ?></p>
            <p><strong>Sueldo bruto:</strong> <?php echo number_format($sueldo_bruto, 2); ?> Bs.</p>
            <p><strong>Ahorro Habitacional (<?php echo $porc_ahorro; ?>%):</strong> <?php echo number_format($ahorro_habitacional, 2); ?> Bs.</p>
            <p><strong>Seguro Social (<?php echo $porc_seguro; ?>%):</strong> <?php echo number_format($seguro_social, 2); ?> Bs.</p>
            <p><strong>Sueldo neto:</strong> <?php echo number_format($sueldo_neto, 2); ?> Bs.</p>
        <?php } ?>
    </div>
</body>
</html>
