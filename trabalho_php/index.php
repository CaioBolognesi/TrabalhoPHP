<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Cadastro de Clientes</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/datepicker-pt-BR.js"></script>
    <script src="datepicker-pt-BR.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Cadastro de Cliente</h2>
    <form action="processa_formulario.php" method="post" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        
        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" required><br><br>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" maxlength="9" oninput="getAddressByCEP(this.value)" required><br><br>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required><br><br>

        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="bairro" required><br><br>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" required><br><br>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" required><br><br>
        
        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br><br>
        
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br><br>
        
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="text" id="data_nascimento" name="data_nascimento" class="datepicker" required><br><br>

        <label for="genero">Gênero:</label>
        <select id="genero" name="genero" class="select-style" required>
            <option value=""></option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Nao-informar">Prefiro não informar</option>
        </select><br><br>

        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*"><br><br>
        
        <input type="submit" value="Enviar">
    </form>

    <script>
    function getAddressByCEP(cep) {
        cep = cep.replace(/\D/g, ''); 

        if (cep.length !== 8) {
            return;
        }

        // URL da API ViaCEP
        const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                if (!data.erro) {
                    document.getElementById('endereco').value = data.logradouro;
                    document.getElementById('bairro').value = data.bairro;
                    document.getElementById('cidade').value = data.localidade;
                    document.getElementById('estado').value = data.uf;
                }
            })
            .catch(error => console.error('Erro na requisição:', error));
    }
    </script>

    <script>
        $(function() {
            $.datepicker.setDefaults($.datepicker.regional['pt-BR']);

            $("#data_nascimento").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0",
                dateFormat: "dd/mm/yy"
            });
        });
    </script>

</body>
</html>