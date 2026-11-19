<?php

require 'conexao.php';

$termo = $_GET["termo"];

//talvez eu delete essa parte
if(empty($termo)){
    header("Location:../index.html");
    exit;
}
//talvez eu delete essa parte

$sql = "SELECT * FROM tb_emergencias WHERE tipo LIKE '%$termo%'";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
    <html lang="pt-BR">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style1.css">
            <title>Resultado da busca</title>
        </head>
    <body>
        <div class="box">
            <article>
        <?php

        if($resultado->num_rows > 0){
            while($emergencia = $resultado -> fetch_assoc()) {
            echo "Emergência encontrada: " . $emergencia["tipo"] . "<br>";
            echo "Faixa etária: " . $emergencia["faixa_etaria"] . "<br>";
        }
    
    }
        else{
            echo "Nenhuma emergência encontrada.";

}

?>
            </article>

            <aside>
                <!-- trocar isso aqui por uma variavel dentro do banco de dados -->
                <?php
                $conteudo = file_get_contents('teste.txt');
                echo $conteudo;
                ?>

            </aside>

            </div>
            <div class="retorno">
                <h2>Retorne a página de busca</h2>
                <button type="button" onclick="window.location.href='../index.html'"></button>
            </div>
    </body>

</html>






