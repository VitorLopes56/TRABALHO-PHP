<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $expression = $_POST["expression"];
    
    function calculateExpression($expression) {
        $result = @eval("return $expression;");
        if ($result === false) {
            return "Erro de expressão";
        } else {
            return $result;
        }
    }

    $result = calculateExpression($expression);

    $_SESSION["result"] = $result;

    setcookie("last_result", $result, time() + (86400 * 30), "/");

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

$lastResult = isset($_COOKIE['last_result']) ? $_COOKIE['last_result'] : '';
?>
