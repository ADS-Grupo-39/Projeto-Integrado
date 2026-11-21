const formulario = document.getElementById("formPesquisa");
formulario.addEventListener("submit", function(event) {

    event.preventDefault();

    let termo = document.getElementById("termo").value;

    if (termo == "") {
        alert("Digite uma emergência para pesquisar.");
        return;
    }

    fetch("backend/resultado.php?termo=" + termo)
        .then(resposta => resposta.text())
        .then(data => {

            let resultado = document.getElementById("resultado");

            if (data == "nenhuma") {
                resultado.innerHTML = "Nenhuma emergência encontrada.";
                return;
            }

            resultado.innerHTML = "";
            let linhas = data.trim().split("\n");

            linhas.forEach((linha, i) => {
                let dados = linha.split("|");
                let idBotao = "protocolo_" + i;

                resultado.innerHTML += `
                    <h2>${dados[0]}</h2>
                    <p>Faixa etária: ${dados[1]}</p>
                    <button id="${idBotao}"></button>
                `;

                document.getElementById(idBotao).onclick = function() {
                    location.href = dados[2];
                };
            });
        });
});