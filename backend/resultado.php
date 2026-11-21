<?php

require 'conexao.php';

$termo = isset($_GET["termo"]) ? trim($_GET["termo"]) : "";

if ($termo === "") {
    exit;
}

$sql = "SELECT tipo, protocolo, faixa_etaria
        FROM tb_emergencias
        WHERE tipo LIKE ?";

$stmt = $conexao->prepare($sql);

$busca = "%" . $termo . "%";

$stmt->bind_param("s", $busca);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $linhas = [];
    while ($emergencia = $resultado->fetch_assoc()) {
        $linhas[] = $emergencia["tipo"] . "|" . $emergencia["faixa_etaria"] . "|" . $emergencia["protocolo"];
    }

    echo implode("\n", $linhas);

} else {

    echo "nenhuma";

}

?>




