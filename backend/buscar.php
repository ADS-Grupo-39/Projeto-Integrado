

<form action="../backend/favoritar.php" method="POST">
    <button type="submit">Favoritar</button>
<?php
require 'conexao.php';

$termo = trim($_GET["termo"] ?? "");
     
$sql = "SELECT * FROM tb_emergencias WHERE tipo LIKE '%$termo%'";

$resultado = $conexao->query($sql);
if($resultado->num_rows > 0){
    while($emergencia = $resultado -> fetch_assoc()) {
        echo "Emergência encontrada: " . $emergencia["tipo"] . "<br>";
        echo "Faixa etária: " . $emergencia["faixa_etaria"] . "<br>";
    }
    
}
else{
    echo "Nenhuma emergência encontrada.";

}