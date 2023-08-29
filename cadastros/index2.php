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
    <title>Entrada e saida</title>
</head>

<body>
    <h1>Cadstro de entrada e saida</h1>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    $dados = filter_input_array (INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);

    if(!empty($dados['CadUsuario'])){
    //inserir no banco de dados "user"
        $query_usuario = "INSERT INTO user (nome, email) VALUES ('".$dados['nome']."' , '".$dados['email']."') ";
        $cad_usuario = $conn->prepare($query_usuario);
        $cad_usuario->execute();
        if ($cad_usuario->rowCount()) {
            echo "<p style='color: #00ff00;'>Usuário cadastrado com sucesso!</p>";
            unset($dados);   
        } else {
            echo "<p style='color: #00ff00;'>Erro: Usuário não cadastrado com sucesso!</p>";
        }
    }
    ?>

    <p id="horario"><?php echo date("d/m/Y H:i:s"); ?></p>
    <h3><a id="botao" href="registrar_ponto.php">Entrada / Saída</a><br></h3>
    
        <?php
            if (empty("saida"['horario_saida'])) {
                echo '<h3><a class="botao" href="index.php">Pagina Inicial</a><br></h3>';
            } else {
                echo '<a class="botao" href="registrar_ponto.php">Entrar / Sair</a><br>';
            }
        ?>

    <script>

////////////////////////////////////////////////////////////////////////////////////
        

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