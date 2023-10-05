<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="relatórios.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <script src="https://cdn.plot.ly/plotly-2.25.2.min.js" charset="utf-8"></script>
  <script src="script.js"></script>
  <title>Relatório</title>
</head>

<body>
  <header>
    <h1>Gráfico da Oficina Mecânica</h1>
  </header>

  <?php
  // Conexão com o banco de dados (substitua com suas próprias configurações)
  $host = "localhost:3307";
  $usuario = "root";
  $senha = "";
  $banco = "oficina_mecanica";

  $conexao = new mysqli($host, $usuario, $senha, $banco);

  if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
  }

  // Consulta SQL para recuperar os dados da tabela
  $query = "SELECT categoria, valor FROM dados_grafico";
  $resultado = $conexao->query($query);

  // Inicialize um array para armazenar os dados
  $dadosDoBanco = [];

  if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
      // Adicione cada linha de dados ao array
      $dadosDoBanco[] = [$row['categoria'], $row['valor']];
    }
  }

  // Feche a conexão com o banco de dados
  $conexao->close();
  ?>
  <?php
  // Converta os dados do PHP em formato JSON
  $dadosJS = json_encode($dadosDoBanco);
  ?>

  <main>
    <section class="chart">
      <!-- Gráficos ou visualizações de dados podem ser adicionados aqui -->
      <div id="grafico1" style="width: 700px; height: 500px"></div>
      <script>
        var dadosDoBanco = <?php echo $dadosJS; ?>;

        // Extraia os rótulos e valores do array de dados
        var rotulos = [];
        var valores = [];

        for (var i = 0; i < dadosDoBanco.length; i++) {
          rotulos.push(dadosDoBanco[i][0]);
          valores.push(dadosDoBanco[i][1]);
        }

        // Crie um objeto de dados para o gráfico de barras
        var dados = [{
          x: rotulos,
          y: valores,
          type: 'bar',
          marker: {
            color: 'rgba(255, 99, 132, 0.6)'
          }
        }];

        // Defina o layout do gráfico
        var layout = {
          title: 'Meu Gráfico',
          xaxis: {
            title: 'Categorias'
          },
          yaxis: {
            title: 'Valores'
          }
        };
        Plotly.newPlot('grafico1', dados, layout);
      </script>
    </section>
  </main>

  <footer>
    <!-- Conteúdo do footer aqui -->
    <div class="footer-content">
      <div class="contact-info">
        <h3>Contato</h3>
        <p>Endereço: Rua da Oficina, 123</p>
        <p>Telefone: (123) 456-7890</p>
        <p>Email: contato@oficinamecanica.com</p>
      </div>
      <div class="quick-links">
        <h3>Links Rápidos</h3>
        <ul>
          <li><a href="./index.html">Página Inicial</a></li>
          <li><a href="./Ordem_Serviço.html">Ordens de Serviço</a></li>
          <li><a href="./Clientes.php">Clientes</a></li>
          <li><a href="./relatórios.php">Relatórios</a></li>
        </ul>
      </div>
    </div>
    <div class="copyright">
      <p>&copy; 2023 Oficina Mecânica. Todos os direitos reservados.</p>
    </div>
  </footer>
</body>

</html>