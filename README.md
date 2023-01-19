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
Nessa aula foi exposto como realizar upload de arquivos utilizando a sessão do php. Foi retirada a exlusão de todos os registros.