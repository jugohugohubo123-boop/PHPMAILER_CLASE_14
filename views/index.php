<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de correos con phpMailer</title>
</head>

<body>
    <form action="?controller=correo&action=sendMail" method="post">
    <div>
        <label>Correo destino</label>
        <input type="email" name="correo" required />
    </div>
        <div>
            <label>Asunto</label>
            <input type="text" name="asunto" required />
        </div>

        <div>
            <label>Mensaje</label>
            <textarea name="mensaje" required></textarea>
        </div>

       <button type="submit">Enviar Correo</button>
    </form>
</body>

</html>