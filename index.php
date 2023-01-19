<?php

session_start();//INICIA A SESSÃO
$_DIR = '/assets/script/'; //DIRETÓRIO DO SCRIPT

if(!isset($_SESSION['tasks'])){
    $_SESSION['tasks'] = array();
}

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
            <form action="<?=$_DIR?>/task.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="insert" value="insert">
                <label for="task_name">Tarefa</label>
                <input type="text" name="task_name" placeholder="Nome da Tarefa">
                <label for="task_description">Descrição</label>
                <input type="text" name="task_description" placeholder="Descrição da Tarefa">
                <label for="task_date">Data</label>
                <input type="date" name="task_date">
                <label for="task_image">Imagem</label>
                <input type="file" name="task_image">
                <button type="submit">Cadastrar</button>
            </form>
            <?php
                if(isset($_SESSION['message'])){
                    echo "<p style='color:#3615c8;'>" . $_SESSION['message'] . "</p>";
                    unset($_SESSION['message']);
                }
            ?>
        </div>
        <div class="separator">
        </div>
        <div class="list-tasks">
            <?php
                if(isset($_SESSION['tasks'])){
                    echo "<ul>";
                    foreach ($_SESSION['tasks'] as $key => $task){
                        echo "<li>
                                <a href='".$_DIR."details.php?key=$key'>" . $task['task_name'] ."</a>
                                <button type='button' class='btn-clear' onclick='deletar$key()'>Remover</button>
                                <script>
                                    function deletar$key(){
                                        if(confirm('Confirmar remoção?')){
                                            window.location = 'http://localhost:88/$_DIR/task.php?key=$key';
                                        }
                                        return false;
                                    }
                                </script>
                              </li>";                        
                    }
                    echo "</ul>";
                }                
            ?>                       
        </div>
        <div class="footer">
            <p>Desenvolvido por @camiladacosta</p>
        </div>
    </div>
    
</body>
</html>