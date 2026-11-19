const formulario = document.getElementById("formPesquisa");
const campoPesquisa = document.getElementById("termo");

formulario.addEventListener("submit", function(event) {

    if (campoPesquisa.value.trim() === "") {
        event.preventDefault();

        alert("Digite uma emergência para pesquisar.");

        campoPesquisa.focus();
    }

});