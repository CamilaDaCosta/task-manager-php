<?php

require __DIR__ . '/assets/script/connect.php';

session_start();

$_DIR = '/assets/script/';

if(!isset($_SESSION['tasks'])){
    $_SESSION['tasks'] = array();
}

$query = $pdo->prepare("select * from tasks");
$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC); //define o modo de busca como FETCH_ASSOC => ou seja serão retornados como um array associativo

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/script.js" defer></script>
    <title>Task Manager</title>
</head>
<body>
    <div class="container">
        <?php
            if(isset($_SESSION['success'])){//if
        ?>
            <div class="alert-success"><?php echo $_SESSION['success'];?></div>
        <?php
                unset($_SESSION['success']);
            }//if
        ?>

        <?php
            if(isset($_SESSION['error'])){//if
        ?>
            <div class="alert-error"><?php echo $_SESSION['error'];?></div>
        <?php
                unset($_SESSION['error']);
            }//if
        ?>

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
                <input type="date" name="task_date" class="task-date">

                <label for="">Imagem</label>
                <div class="image-container">
                    <input type="file" name="task_image" id="task_image">
                    <label for="task_image" class="input-file">
                        <span>Escolher Arquivo</span>
                    </label>
                    <span class="image-name"></span>
                </div>
                <span class="alert-size">*Até 1mb</span>
                
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
                echo "<ul>";
                foreach ($query->fetchAll() as $task)
                {
                echo "<li>
                        <a href='".$_DIR."details.php?key=". $task['id'] ."'>" . $task['task_name'] ."</a>
                        <button type='button' class='btn-clear' onclick='deletar". $task['id'] ."()'>Remover</button>
                        <script>
                            function deletar". $task['id'] ."(){
                                if(confirm('Confirmar remoção?')){
                                    window.location = 'http://localhost:88/$_DIR/task.php?key=". $task['id'] ."';
                                }
                                return false;
                            }
                        </script>
                    </li>";                        
                }
                echo "</ul>";
            ?>                       
        </div>
        <div class="footer">
            <p>Desenvolvido por @camiladacosta</p>
        </div>
    </div>
    
</body>
</html>