# Task Manager - PHP
Projeto de Estudo prático desenvolvido com base nas aulas disponibilizadas pelo canal AM Projetos WEB na [playlist](https://www.youtube.com/watch?v=dJ49I-QYYUk&list=PL1KWVrkOhKP1JTmUmBgrc6Bp6u20Bc6rT&index=1). Consiste em um Gerenciador de Tarefas.
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