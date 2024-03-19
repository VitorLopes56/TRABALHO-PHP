<?php
session_start(); // Inicia a sessão para usar sessões PHP

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $expression = $_POST["expression"]; // Obtem a expressão do formulário

    // Função para calcular a expressão
    function calculateExpression($expression) {
        $result = eval("return $expression;"); 
        return $result;
    }// Avalia a expressão usando eval (tenha cuidado com a segurança ao usar eval!)

    $result = calculateExpression($expression); // Calcula a expressão

    // Armazena o resultado na sessão para uso posterior (opcional)
    $_SESSION["result"] = $result;

    // Armazena o resultado em um cookie
    setcookie("last_result", $result, time() + (86400 * 30), "/"); // Expira em 30 dias

    // Redireciona de volta para a página anterior com o resultado
    header("Location: {$_SERVER['HTTP_REFERER']}?result=$result");
    exit();
}

// Verifica se há um cookie de resultado anterior e configura a variável $lastResult
$lastResult = isset($_COOKIE['last_result']) ? $_COOKIE['last_result'] : '';
?>
