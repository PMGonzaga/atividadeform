<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .container {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #tabela {
      border-collapse: collapse;
      text-align: center;
      font-family: Arial, Helvetica, sans-serif;
    }

    #tabela td, #tabela th, #tabela tr {
      border: 1px solid black;
      padding: 8px;
      
      
    }

    #tabela th {
      background-color: #2192FF;
      color: white;
     
    }

    #tabela tr:hover {
      background-color: #008000;
      color: white;
      cursor: pointer;
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="secao">

    <?php

      $file = fopen("dados.txt","r");

      echo "<table id='tabela'>";
      echo "<th>Nome</th><th>Gênero</th><th>DT-Nasci</th><th>Tel</th><th>Email</th>";
      while(! feof($file)) 
      {
        $line = fgets($file);
        
        $pessoa = json_decode($line, true);
      
      if (isset($pessoa["nome"]) || isset($pessoa["genero"]) || isset($pessoa["dtNasc"]) || isset($pessoa["tel"]) || isset($pessoa["email"])) {
        echo "<tr>";
        echo "<td>";
        echo $pessoa["nome"];
        echo "</td>";
        echo "<td>";
        echo $pessoa["genero"];
        echo "</td>";
        echo "<td>";
        echo $pessoa["dtNasc"];
        echo "</td>";
        echo "<td>";
        echo $pessoa["tel"];
        echo "</td>";
        echo "<td>";
        echo $pessoa["email"];
        echo "</td>";
        echo "</tr>";
      }

      }
      echo "</table>";
      fclose($file);
    ?>

    </div>
  </div>
</body>
</html>