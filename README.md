# Task Manager - PHP
Projeto de Estudo prático desenvolvido com base nas aulas disponibilizadas pelo canal AM Projetos WEB nessa [PLAYLIST](https://www.youtube.com/watch?v=dJ49I-QYYUk&list=PL1KWVrkOhKP1JTmUmBgrc6Bp6u20Bc6rT&index=1). Consiste em um Gerenciador de Tarefas.
## para executar
Nesse projeto utilizei o docker para rodar o servidor php, então, para executá-lo é necessário que tenha o docker previamente instalado e iniciado.
Com esses passos concluídos é necessário apenas que utilize o seguinte comando:
```
docker-compose up -d
```
E pronto já poderá executar este projeto.
## commits
### [aula 01](https://github.com/CamilaDaCosta/task-manager-php/tree/39cbd87f65b0cc987eb7bf7c9ea4845d2c4ba32d)
Criação do Projeto base, nele é possivel cadastrar o nome das tarefas e excluir todas de uma vez.
### [aula 02](https://github.com/CamilaDaCosta/task-manager-php/tree/fbe0e410fd12a10bdf5ae0112d906dae2b1c51fa)
Nessa versão é possivel excluir as tarefas individualmente e tambem foi adicionada uma validação que impede que o usuário insira uma tarefa sem nome.
### [aula 03](https://github.com/CamilaDaCosta/task-manager-php/tree/d1401fbd07e601829fd78af37ce0bea710950713)
Nessa versão foram adicionados novos campos (descrição e data), foi feita uma divisão da lógica do projeto em outro arquivo (task.php) e também criado um array bidimensional('chave' => $valor) para armazenar os dados fornecidos pelo usuário, agora via $_POST.
### [aula04](https://github.com/CamilaDaCosta/task-manager-php/tree/d7c44ce02bb143bd48f790b6611e0030f43c583d)
Nessa aula foi exposto como realizar upload de arquivos utilizando a sessão do php. Foi retirada a funcionalidade de exclusão de todos os registros.
### [aula05](https://github.com/CamilaDaCosta/task-manager-php/tree/7f707676385164305595912f5896abe5002259d9)
Nessa versão foi criada a página de detalhes da tarefa, realizei a refatoração de alguns detalhes do código e também retirei os comentários para melhor visualização e que não eram mais necessários neste estágio do projeto
### [aula06](https://github.com/CamilaDaCosta/task-manager-php/tree/6a936a3beb974db04fb4f9311039e852bb38dea3)
Como estou utilizando docker o processo nessa parte foi bem diferente do exposto na videoaula, então contarei o meu processo:
Exlui o container criado anteriormente, para evitar erros:
```
docker-compose down -v --rmi all
```
Depois criei um novo arquivo connect.php
```
<?php
$conn = mysqli_connect("db","user","pass","task-manager") or die(mysqli_error());
echo "Conectado";
$conn->close();
?>
```

Depois modifiquei o docker-compose,yml para que ficasse dessa forma:
```
version: '3'
services:
  web:
    image: php:7.4-apache
    container_name: task-web
    ports:
      - "88:80"
    volumes:
      - ./:/var/www/html
    depends_on:
      - db

  db:
    image: mysql:latest
    container_name: task-db
    ports:
      - "3309:3306" #DEFINA SUA PORTA
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: task-manager
      MYSQL_USER: user
      MYSQL_PASSWORD: pass
```
Iniciei esses novos containers com
```
docker-compose up -d
```
Depois instalei o driver PDO e Mysqli no container criado com:
```
docker-compose exec task-web docker-php-ext-install pdo pdo_mysql
```
Após isso os reiniciei com:
```
docker-compose stop
```
```
docker-compose start
```
### [aula07]() - Atual :zap:
Nessa versão utilizei a videoaula como base para realizar o cadastro, exibição e deleção dos dados utilizando o banco de dados mysql que criei no commit anterior. Fiz algumas modificações próprias para exibir o nome do arquivo selecionado, utilizando javascript e também algumas modificações de layout.