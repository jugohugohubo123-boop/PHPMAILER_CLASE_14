<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envío de Correos con PHPMailer</title>
    <!-- Fuente moderna de Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Reseteo básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            /* Fondo con gradiente moderno y oscuro */
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
        }

        /* Contenedor del formulario (Efecto Glassmorphism) */
        .form-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.8s ease-out;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            letter-spacing: 1px;
            background: -webkit-linear-gradient(45deg, #00f2fe, #4facfe);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .input-group {
            margin-bottom: 25px;
            position: relative;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #a8b2d1;
            font-weight: 400;
            transition: color 0.3s ease;
        }

        .input-group input,
        .input-group textarea {
            width: 100%;
            padding: 15px;
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #fff;
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
        }

        .input-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* Efectos al seleccionar un input */
        .input-group input:focus,
        .input-group textarea:focus {
            border-color: #4facfe;
            box-shadow: 0 0 15px rgba(79, 172, 254, 0.3);
            background: rgba(0, 0, 0, 0.4);
        }

        .input-group input:focus + label,
        .input-group textarea:focus + label {
            color: #4facfe;
        }

        /* Botón con micro-animaciones */
        button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(0, 242, 254, 0.3);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(0, 242, 254, 0.5);
        }

        button:active {
            transform: translateY(1px);
        }

        /* Estilos premium para el input file */
        .input-group input[type="file"] {
            padding: 10px;
            cursor: pointer;
            line-height: 1.5;
        }

        .input-group input[type="file"]::file-selector-button {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            color: #fff;
            padding: 6px 12px;
            margin-right: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .input-group input[type="file"]::file-selector-button:hover {
            background: rgba(79, 172, 254, 0.2);
            border-color: #4facfe;
        }

        /* Animación de entrada */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Enviar Correo</h2>
        <form action="?controller=correo&action=sendMail" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <label for="correo">Correo destino</label>
                <input type="email" id="correo" name="correo" placeholder="ejemplo@gmail.com" required />
            </div>
            
            <div class="input-group">
                <label for="asunto">Asunto</label>
                <input type="text" id="asunto" name="asunto" placeholder="Escribe el asunto aquí" required />
            </div>

            <div class="input-group">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje..." required></textarea>
            </div>

            <div class="input-group">
                <label for="adjunto">Archivo adjunto</label>
                <input type="file" id="adjunto" name="adjunto" required />
            </div>

            <button type="submit">Enviar Mensaje</button>
        </form>
    </div>
</body>

</html>
