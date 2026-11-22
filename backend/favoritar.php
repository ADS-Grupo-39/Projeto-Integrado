

<?php

require 'conexao.php';

$pagina =  $_SERVER["HTTP_REFERER"];

$pagina = parse_url($pagina, PHP_URL_PATH);

$pagina = str_replace("/primeiros_socorros/", "", $pagina);

$sql = "UPDATE tb_emergencias
        SET favorito = NOT favorito
        WHERE protocolo = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $pagina);
$stmt->execute();

header("Location: ../" . $pagina);
exit;

?>

