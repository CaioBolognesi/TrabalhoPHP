# Projeto: Formulário de Cadastro de Clientes

## Introdução
O projeto consiste em um formulário de cadastro de clientes desenvolvido em HTML, CSS, JavaScript, PHP e integração com um banco de dados MySQL. O formulário coleta informações pessoais do cliente e as armazena em um banco de dados, permitindo a leitura e exibição dos dados cadastrados.

## Estrutura do Projeto

### Arquivos Principais
- **index.html:** Contém a estrutura do formulário e as chamadas para as bibliotecas externas.
- **style.css:** Folha de estilo para personalização visual do formulário.
- **processa_formulario.php:** Script PHP para processamento dos dados do formulário, integração com o banco de dados MySQL e exibição dos dados cadastrados.
- **datepicker-pt-BR.js:** Script para configuração do calendário do jQuery UI em português.

[...]

### Configuração do Banco de Dados

Antes de executar o projeto, é necessário configurar o banco de dados MySQL. Siga os passos abaixo para criar o banco de dados e a tabela necessários:

1. Abra o console do phpMyAdmin.

2. Crie o Banco de Dados "trabalho_web" com o seguinte comando SQL:
   ```sql
   CREATE DATABASE trabalho_web;
   
3. Selecione o Banco de Dados Criado:
   ```sql
   USE trabalho_web;

4. Crie a Tabela "clientes":
   ```sql
   CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    sobrenome VARCHAR(50),
    cep VARCHAR(10),
    endereco VARCHAR(255),
    bairro VARCHAR(50),
    cidade VARCHAR(50),
    estado VARCHAR(2),
    numero VARCHAR(10),
    telefone VARCHAR(15),
    email VARCHAR(100),
    data_nascimento DATE,
    genero VARCHAR(20),
    foto VARCHAR(255)
   ); 
    
## Como Utilizar: 

1. Abra o arquivo `index.html` em um navegador web.
2. Preencha o formulário com as informações solicitadas.
3. O campo de CEP realiza automaticamente o preenchimento dos campos de endereço, bairro, cidade e estado.
4. Escolha a data de nascimento usando o calendário interativo.
5. Selecione o gênero no menu suspenso.
6. Faça o upload de uma foto (opcional).
7. Clique em "Enviar" para processar o formulário, que será integrado ao banco de dados MySQL.

[...]

## PHP e MySQL

O processamento do formulário é realizado pelo script PHP (`processa_formulario.php`). Algumas funcionalidades incluem:

- **Conexão com o Banco de Dados:** O script estabelece uma conexão com o banco de dados MySQL usando as configurações fornecidas.
- **Inserção de Dados:** Os dados do formulário são inseridos no banco de dados usando prepared statements para evitar injeção de SQL.
- **Redirecionamento:** Após o cadastro bem-sucedido, o usuário é redirecionado automaticamente após 5 segundos.

A parte final do script PHP realiza uma operação de leitura (READ) para exibir os clientes cadastrados.

[...]

## Notas Adicionais
- Certifique-se de ter uma conexão com o banco de dados configurada corretamente.
- A implementação do script PHP inclui operações de inserção e leitura no banco de dados.
