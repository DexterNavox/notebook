# GN | Sistema de Gerenciamento de Notebooks

## Descrição

O projeto GN é um sistema de gerenciamento de notebooks desenvolvido em PHP e MySQL, com interfaces construídas usando HTML, CSS, JAVASCRIPT e Bootstrap. O sistema permite adicionar, editar,visualizar, listar e exlcuir os notebooks. Ele também inclui funcionalidades para pesquisa e exportação de dados.

## Requisitos

- PHP 7.4 ou superior
- MySQL
- Servidor Web (Apache, Nginx, etc.)

## Estrutura do Projeto

O projeto está estruturado da seguinte forma:

- `conexao.php`: Arquivo de configuração para conexão com o banco de dados MySQL.
- `includes/`: Pasta contendo arquivos incluídos em várias páginas, como o menu lateral e o cabeçalho.
- `css/`: Folha de estilos CSS para personalização visual das páginas.
- `js/`: Scripts JavaScript para funcionalidades adicionais.
- `img/`: Imagens utilizadas no projeto.
- `bootstrap-icons.css`: Arquivo de ícones Bootstrap.
- `fonts/css/`: Folha de estilos para fontes externas.
- `index.php`: Página principal de login.
- `listar_notebooks.php`: Página para listar todos os notebooks.
- `visualizar_notebook.php`: Página para visualizar os detalhes de um notebook específico.
- `editar_notebook.php`: Página para editar os dados de um notebook.
- `deletar_notebook.php`: Página para excluir um notebook.
- `exportar.php`: Página para exportar dados.

## Usuario Padrão
- Login: adm@teste.com
- Senha: Teste@01

- Login: usuario01@teste.com
- Senha: Usuario@01
## Instalação

1. Clone o repositório:

    ```bash
    git clone github.com/DexterNavox/notebook.git
    ```

2. Navegue até o diretório do projeto:

    ```bash
    cd nome-do-repositorio
    ```

3. Configure o banco de dados:
   - Importe o schema SQL fornecido para criar as tabelas necessárias no MySQL.

4. Configure a conexão com o banco de dados:
   - Edite o arquivo `conexao.php` para incluir suas credenciais do banco de dados.

5. Configure o servidor web para apontar para o diretório do projeto.

## Funcionalidades

- **Visualização de Notebooks**: Página para visualizar detalhes de um notebook específico.
- **Edição de Notebooks**: Página para editar informações de um notebook.
- **Exclusão de Notebooks**: Página para excluir um notebook.
- **Listagem de Notebooks**: Página para listar todos os notebooks com opções de pesquisa e exportação.

## Uso

1. Acesse a página de login (`index.php`) e faça o login com suas credenciais.
2. Navegue para `listar_notebooks.php` para visualizar todos os notebooks.
3. Use o botão de pesquisa para encontrar notebooks específicos.
4. Clique em um notebook para visualizar seus detalhes ou editar/excluir conforme necessário.

## Contribuição

Se você deseja contribuir para este projeto, por favor, siga estas etapas:

1. Fork o repositório.
2. Crie uma nova branch (`git checkout -b feature/MinhaNovaFuncionalidade`).
3. Faça suas alterações e commit (`git commit -am 'Adiciona nova funcionalidade'`).
4. Faça o push para a branch (`git push origin feature/MinhaNovaFuncionalidade`).
5. Abra um Pull Request.

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).

## Contato

Para perguntas ou suporte, entre em contato com [dnavox@gmail.com](mailto:seu-email@dominio.com).
