<?php
include'conexao.php'; //******
session_start(); // Iniciar a sessao
// Definir um fuso horario padrao
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>

<body>
    <h1>Cadstro de entrada e saida</h1>

   

    <p id="horario"><?php echo date("d/m/Y H:i:s"); ?></p>

        <form name="cad-usuario" method="POST" action="index2.php">

            <label for="">Nome: </label>
            <input type="text" name="nome" id="nome" placeholder=" Nome completo" required><br><br>

            <label for="">E-mail: </label>
            <input type="email" name="email" id="email" placeholder=" Seu E-mail" required><br><br>

            <input type="submit" value="Castrar" name="CadUsuario"><br><br>
        </form>

    

    <script>

        function atualizarHorario() {
            var data = new Date().toLocaleString("pt-br", {
                timeZone: "America/Sao_Paulo"
            });
            document.getElementById("horario").innerHTML = data.replace(", ", " - ");
        }

        setInterval(atualizarHorario, 1000);
    </script>

</body>

</html>