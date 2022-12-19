<h1>Tutorial para rodar o código parar gerar o JWT e acessar a API</h1>

1) Clonar esse repositorio:<br>
   git clone https://github.com/gilperon/laravel-api-github.git
   
2) Vá para a pasta do diretorio<br>
   cd laravel-api-github
   
3) Instale as dependencidas com o composer <br>
   composer install

4) Copie o arquivo .env.example para .env ou simplesmente renomeie ele<br>
   Se estiver no linux digite isso no terminal: cp .env.example .env <br>
   Se estiver no windows digite isso no terminal: copy .env.example .env<br>
   Lembrar de definir a conexão ao banco de dados nesse arquivo .env com o respectivo nome do banco de dados que voce deve criar<br>
    DB_CONNECTION=mysql<br>
    DB_HOST=127.0.0.1<br>
    DB_PORT=3306<br>
    DB_DATABASE=laravel_api<br>

5) Execute o comando abaixo, para criar uma chave para a aplicação<br>
   php artisan key:generate

6) Execute o comtando abaixo, para criar a tabela cliente no banco de dados<br>
   php artisan migrate

7) Rode o servidor<br>
   php artisan serve

8) Acesse em seu navegador seu diretorio localhost para ter acesso ao sistema:  localhost/laravel-api-github/public/

Voce deve ver uma página para criar sua conta, igual imagem abaixo, e após criar a conta, você deve deslogar.<br>
E clicar sobre Gerar um token de acesso para receber sua chave JWT
 <br>
<img src='https://i.imgur.com/6VwIR8t.jpg' width="400">
 <br>
Com ela voce pode fazer requisições REST para a API. <br>
<img src='https://i.imgur.com/qWqyGk8.png' width="400"><br>


Obs:
Eu fiz meu próprio código JWT, ele está em Helpers/Functions e Helpers/MeuToken 

;)













