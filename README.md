Api com objetivo de fixar aprendizado de API RestFull

Para rodar a API você deverá entrar na pasta do programa com o terminal e usar o comando 'php artisan serve' para rodar o aplicativo.

Consultas:

    As consultas são feitas utilizando o método GET
    Se deseja buscar algum carro basta utilizar /carro/{id?}
    Se quiser recuperar todos os carros do banco de dados o link é somente /carro.
    O mesmo serve para os clientes. Se deseja buscar algum cliente em especifico basta utilizar o link /cliente/{id?}. Porém se deseja ter o retorno de todos os clientes basta utilizar /cliente.

    Todas as consultas trazem consigo as classes que o objeto herda.

Criação:
    
    As criações são feitas utilizando o método POST.
    Para criar um novo carro basta utilizar o link /carro passando no corpo ro request a marca e o modelo.
    Na criação de um novo cliente basta utilizar o link /cliente passando no corpo ro request o nome, o cpf(somente número), carro_id, data_nascimento(yyyy/mm/dd).

Atualização:

    Os update podem ser feito pelo método PUT ou PATCH. Sendo PUT ou PATCH, atualizar tudo e atualizar parte do objeto respectivamente.
    As informações do carro podem ser atualizadas pelo link /carro/{id?} passando no corpo do request os atributos que deseja atualizar atributos.
    O mesmo serve para cliente, para ser atualizado basta utilizar o link /cliente/{id?} passando no corpo do request os atributos que deseja atualizar atributos.

Remoção:

    É necessário utilizar o método DELETE.
    Para fazer a remoção do objeto bastar passar o link /objeto/{id?}.
    Ex: /carro/3