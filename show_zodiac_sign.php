<?php
include('layouts/header.php');
?>

<div class="container">
    <?php
    $data_nascimento = $_POST['data_nascimento'];
    $data_nascimento_formatada = date("d/m", strtotime($data_nascimento));
    $signos = simplexml_load_file("signos.xml");
    $signo_encontrado = null;

    foreach ($signos->signo as $signo) {
        $data_inicio = DateTime::createFromFormat('d/m', (string) $signo->dataInicio);
        $data_fim = DateTime::createFromFormat('d/m', (string) $signo->dataFim);
        $data_usuario = DateTime::createFromFormat('d/m', $data_nascimento_formatada);

        if (($data_usuario >= $data_inicio && $data_usuario <= $data_fim) ||
            ($data_inicio > $data_fim && ($data_usuario >= $data_inicio || $data_usuario <= $data_fim))) {
            $signo_encontrado = $signo;
            break;
        }
    }

    if ($signo_encontrado) {
        echo "<div class='result'>";
        echo "<h3>Seu signo é: " . $signo_encontrado->signoNome . "</h3>";
        echo "<p>Descrição: " . $signo_encontrado->descricao . "</p>";
        echo "</div>";
    } else {
        echo "<div class='result'>";
        echo "<p>Signo não encontrado.</p>";
        echo "</div>";
    }
    ?>

    <a href="index.php" class="back-link">Voltar</a>
</div>

</body>
</html>
