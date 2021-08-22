# Requisitos
* #### php instalado
* ### composer instalado
* ### banco de dados de preferencia mysql
* ### gerenciador de pacotes npm

## Para rodar o projeto
* ### Clone este repositorio
* ### Na raiz do projeto rode **composer install**
* ### Na raiz do projeto rode **php artisan key:generate**
* ### copie ou renomeie o arquivo **.env.example** para **.env**
* ### Configure seu banco de dados no arquivo **.env**
* ### Rode **php artisan migrate** para estruturar o banco de dados 
* ### Na raiz do projeto rode **npm install**
* ### Na raiz do projeto rode **npm run dev**
* ### Na raiz do projeto rode **php artisan storage:link** para conseguir gerenciar arquivos
* ### Rode **php artisan db:seed** para criar um usuario para logar
* ### Agora **php artisan serve** e acesse **http://localhost:8000/**
* ### Para acessar o admin acesse o **/dashboard** o email e **carlos@gmail.com** e a senha e **c@rlos11**