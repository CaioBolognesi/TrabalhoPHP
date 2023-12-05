# Projeto: Formulário de Cadastro de Clientes

## Introdução
O projeto consiste em um formulário de cadastro de clientes desenvolvido em HTML, CSS, JavaScript, PHP e integração com um banco de dados MySQL. [...]

## Estrutura do Projeto

### Arquivos Principais
- **index.html:** Contém a estrutura do formulário e as chamadas para as bibliotecas externas.
- **style.css:** Folha de estilo para personalização visual do formulário.
- **processa_formulario.php:** Script PHP para processamento dos dados do formulário e integração com o banco de dados MySQL.
- **datepicker-pt-BR.js:** Script para configuração do calendário do jQuery UI em português.

[...]

## Como Utilizar

1. Abra o arquivo `index.html` em um navegador web.
2. Preencha o formulário com as informações solicitadas.
3. O campo de CEP realiza automaticamente o preenchimento dos campos de endereço, bairro, cidade e estado.
4. Escolha a data de nascimento usando o calendário interativo.
5. Selecione o gênero no menu suspenso.
6. Faça o upload de uma foto (opcional).
7. Clique em "Enviar" para processar o formulário, que será integrado ao banco de dados MySQL.

[...]

## Notas Adicionais
- Certifique-se de ter uma conexão com a internet para o correto funcionamento da consulta de CEP.
- O script PHP (`processa_formulario.php`) processa os dados do formulário e os integra ao banco de dados MySQL. Certifique-se de configurar corretamente as credenciais do banco de dados.
