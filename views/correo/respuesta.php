<?php
/**
 * @var string $status
 * @var string $mensajeEstado
 */
$status = $status ?? 'error';
$mensajeEstado = $mensajeEstado ?? 'No se pudo determinar el estado.';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado del Envío</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
        }

        .card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 50px 40px;
            width: 100%;
            max-width: 450px;
            text-align: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
            animation: fadeInScale 0.6s ease-out;
        }

        .icon {
            font-size: 60px;
            margin-bottom: 20px;
        }

        .success .icon {
            color: #00f2fe;
            text-shadow: 0 0 20px rgba(0, 242, 254, 0.5);
        }

        .error .icon {
            color: #ff4b2b;
            text-shadow: 0 0 20px rgba(255, 75, 43, 0.5);
        }

        h2 {
            margin-bottom: 15px;
            font-weight: 600;
        }

        p {
            color: #a8b2d1;
            font-size: 16px;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .btn-back {
            display: inline-block;
            padding: 12px 30px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="card <?php echo $status; ?>">
        <div class="icon">
            <?php echo $status === 'success' ? '✨' : '❌'; ?>
        </div>
        <h2><?php echo $status === 'success' ? '¡Éxito!' : 'Ups, algo salió mal'; ?></h2>
        <p><?php echo htmlspecialchars($mensajeEstado); ?></p>
        <a href="?controller=correo&action=index" class="btn-back">Volver al formulario</a>
    </div>
</body>

</html>
