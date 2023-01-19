<?php

session_start();

if(isset($_POST['task_name'])){ //VERIFICA SE EXISTE task_name NA REQUISIÇÃO
    if($_POST['task_name'] != ""){

        if(isset($_FILES['task_image'])){
            $ext = strtolower(substr($_FILES['task_manager']['name'], -4));
            $file_name = md5(date('Y.m.d.H.i.s')) . $ext;
            $dir = '../../uploads/';

            move_uploaded_file($_FILES['task_image']['tmp_name'],$dir.$file_name);
        }

        $data = [
            'task_name' => $_POST['task_name'],
            'task_description' => $_POST['task_description'],
            'task_date' => $_POST['task_date'],
            'task_image' => $file_name,
        ];

        array_push($_SESSION['tasks'], $data); // SE EXISTIR ADICIONA O VALOR DENTRO DA SESSÃO['tasks'] INICIADA ACIMA
        unset($_POST['task_name']);
        unset($_POST['task_description']);
        unset($_POST['task_date']);

        header('Location:/index.php');
    }else{
        $_SESSION['message'] = "O campo nome da tarefa não pode ser vazio";
        header('Location:/index.php');
    }
}

if(isset($_GET['key'])){ //VERIFICA SE EXISTE key NA REQUISIÇÃO | Key OBTIDO PELA FUNÇÃO JS DO FORM
    array_splice($_SESSION['tasks'], $_GET['key'], 1); //FUNÇÃO QUE REMOVE ELEMENTOS DO ARRAY ['tasks] na posição ['key']
    unset($_GET['key']); //REMOVE OS VALORES PASSADOS NA SESSION['key']
    header('Location:/index.php');
}
?>