const tbody = document.querySelector(".listar-notebooks");
let pesquisaAtual = '';

// Função assíncrona para listar os notebooks
const listarNotebooks = async (pagina) => {
    // Faz uma requisição para o servidor passando o número da página e o valor de pesquisa
    const url = pesquisaAtual ? `./list.php?pesquisa=${pesquisaAtual}&pagina=${pagina}` : `./list.php?pagina=${pagina}`;
    const dados = await fetch(url);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

const filtrarNotebooks = async (pesquisa, pagina=1) => {
    pesquisaAtual = pesquisa;
    listarNotebooks(pagina);
};

// Chama a função para listar todos os notebooks
listarNotebooks(1);

// Adiciona um evento de escuta para o formulário de pesquisa
const formPesquisa = document.querySelector("#form-pesquisa");
formPesquisa.addEventListener("keyup", (event) => {
    event.preventDefault();
    const pesquisa = document.querySelector("#pesquisa").value;
    filtrarNotebooks(pesquisa, 1);
});