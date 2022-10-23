<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    
	$nome = $_GET["nome"];
    $genero = $_GET["genero"];
    $dataNascimento = $_GET["dataNascimento"];
    $telefone = $_GET["telefone"];
    $email = $_GET["email"];

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo("<p style='text-align: center; background-color: rgb(12, 228, 135); font-size: 20px; color: white;'>Esse email: $email é válido, obrigado.</p>");
    } else {
        echo ("<p style='text-align: center; background-color: rgb(12, 228, 135); font-size: 20px;'>Esse email: $email não é válido. Favor, colocar um endereço de email válido para gerar a sua tabela.</p>");
        return;
    }
   
    $pessoa = ["nome" =>$nome, "genero"=>$genero, "dtNasc"=>$dataNascimento, "tel"=>$telefone, "email"=>$email];
    $texto = json_encode($pessoa).chr(13).chr(10);

    $a = fopen("dados.txt", "a");
    fwrite($a, $texto);
    fclose($a);
   
?>
</body>
</html>