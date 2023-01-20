<?php

require __DIR__ . '/connect.php';

session_start();

if(isset($_POST['task_name'])){
    if($_POST['task_name'] != ""){

        if(isset($_FILES['task_image'])){
            $ext = strtolower(substr($_FILES['task_image']['name'], -4));
            $file_name = md5(date('Y.m.d.H.i.s')) . $ext;            
            $dir = '../../uploads/';

            move_uploaded_file($_FILES['task_image']['tmp_name'],$dir.$file_name);
        }

        $query = $pdo->prepare('INSERT INTO tasks (task_name, task_description, task_image, task_date)
                                VALUES (:name, :description, :image, :date)');
        $query->bindParam('name', $_POST['task_name']);
        $query->bindParam('description', $_POST['task_description']);
        $query->bindParam('image', $file_name);
        $query->bindParam('date', $_POST['task_date']);

        if($query->execute()){
            $_SESSION['success'] = "Dados Cadastrados";
            header('Location:/index.php');
        }else{
            $_SESSION['error'] = "Dados Não Cadastrados";
            header('Location:/index.php');
        }
    }else{
        $_SESSION['message'] = "O campo nome da tarefa não pode ser vazio";
        header('Location:/index.php');
    }
}

if(isset($_GET['key'])){
    $query= $pdo->prepare('DELETE FROM tasks WHERE id = :id');
    $query->bindParam(':id', $_GET['key']);
    header('Location:/index.php');

    if($query->execute()){
        $_SESSION['success'] = "Dados Removidos";
        header('Location:/index.php');
    }else{
        $_SESSION['error'] = "Dados Não Removidos";
        header('Location:/index.php');
    }
}
?>