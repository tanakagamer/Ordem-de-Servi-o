<?php
$host = "localhost"; // Host do banco de dados
$usuario = "root"; // Nome de usuário do banco de dados
$senha = ""; // Senha do banco de dados
$banco = "oficina_mecanica"; // Nome do banco de dados

// Estabeleça a conexão com o banco de dados
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifique se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>

<?php
    // Consulta para obter os dados do banco de dados
$query = "SELECT * FROM clientes";
$resultado = $conexao->query($query);

if ($resultado) {
    $dados = array(); // Inicialize um array para armazenar os dados

    while ($row = $resultado->fetch_assoc()) {
        // Adicione cada linha de dados ao array
        $dados[] = $row;
    }

    // Converta o array em JSON
    $json_data = json_encode($dados);

    // Exiba o JSON ou faça o que desejar com ele
    echo $json_data;
} else {
    echo "Erro na consulta: " . $conexao->error;
}

// Feche a conexão
$conexao->close();
?>

