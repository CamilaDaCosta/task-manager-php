<?php

session_start();//INICIA A SESSÃO

if(!isset($_SESSION['tasks'])){ //VERIFICA SE NA SESSÃO INICIADA A CHAVE ['task'] JA FOI DEFINIDA
    $_SESSION['tasks'] = array(); //SE NÃO FOR, É INICIALIZADA COMO ARRAY VAZIO
}

if(isset($_GET['task_name'])){ //VERIFICA SE EXISTE task_name NA REQUISIÇÃO
    array_push($_SESSION['tasks'], $_GET['task_name']); // SE EXISTIR ADICIONA O VALOR DENTRO DA SESSÃO['tasks'] INICIADA ACIMA
    unset($_GET['task_name']); //REMOVE O PARAMETRO DA REQUISICAO
}

if(isset($_GET['clear'])){ //VERIFICA SE EXISTE clear NA REQUISIÇÃO
    unset($_SESSION['tasks']); //REMOVE OS VALORES PASSADOS NA SESSION[]
}
#
#em resumo inicia a variavel global $_SESSION e cria nela um array vazio 
#com a chave de referencia ['tasks'] e atraves do get submetido no form
#pega os valores inseridos pelo usuário e armazena na sessão['tasks']
#
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <title>Task Manager</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Gerenciador de Tarefas</h1>
        </div>
        <div class="form">
            <form action="#" method="GET">
                <label for="task_name">Tarefa</label>
                <input type="text" name="task_name" placeholder="Nome da Tarefa">
                <button type="submit">Cadastrar</button>
            </form>
        </div>
        <div class="separator">
        </div>
        <div class="list-tasks">
            <?php
                if(isset($_SESSION['tasks'])){
                    echo "<ul>";
                    foreach ($_SESSION['tasks'] as $key => $task){
                        echo "<li>$task</li>";
                    }
                    echo "</ul>";
                }
                #se existir dados na sessão o for percorre os dados e exibe
            ?>
            <div class="form">
                <form action="#" method="GET">
                    <input type="hidden" name="clear" value="clear">
                    <button type="submit">Limpar Tarefas</button>
                </form>
            </div>            
        </div>
        <div class="footer">
            <p>Desenvolvido por @camiladacosta</p>
        </div>
    </div>
    
</body>
</html>