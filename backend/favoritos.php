<?php

require 'conexao.php';

$resultado = $conexao->query("SELECT protocolo FROM tb_emergencias WHERE favorito = 1");

$favoritos = [];

while ($linha = $resultado->fetch_assoc()) {
    $protocolo = $linha["protocolo"];
    $arquivo = __DIR__ . "/../" . $protocolo;

    if (!is_file($arquivo)) {
        continue;
    }

    $conteudo = file_get_contents($arquivo);
    $titulo = $protocolo;

    if (preg_match("/<h1>(.*?)<\/h1>/s", $conteudo, $achou)) {
        $texto = strip_tags(str_replace("<br>", " ", $achou[1]));
        $texto = trim(preg_replace("/\s+/", " ", $texto));
        $texto = trim(str_replace("Como proceder em caso de...", "", $texto));
        $titulo = mb_strtoupper(mb_substr($texto, 0, 1)) . mb_strtolower(mb_substr($texto, 1));
    }

    $favoritos[] = ["protocolo" => $protocolo, "titulo" => $titulo];
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style2.css">
    <link rel="stylesheet" href="../style-favoritos.css">
    <title>Meus Favoritos</title>
</head>

<body>
    <div class="titulo">
        <h1>Meus Favoritos</h1>
    </div>

    <div class="box1">
        <?php if (empty($favoritos)) { ?>
            <p class="sem-favoritos">Você ainda não favoritou nenhum protocolo.</p>
        <?php } else { ?>
            <ul class="lista-favoritos">
                <?php foreach ($favoritos as $favorito) { ?>
                    <li>
                        <a href="../<?= htmlspecialchars($favorito["protocolo"]) ?>">
                            <?= htmlspecialchars($favorito["titulo"]) ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>

        <a class="btn-favoritos" href="../index.html">Voltar</a>
    </div>
</body>

</html>
