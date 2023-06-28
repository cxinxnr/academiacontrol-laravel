# academiacontrol-laravel
 academia Control Laravel
*Título: Documento de Requisitos

*Integrantes:
 - Cainan Rhoden e Ribeiro - Documentação

*Introdução:
 Este documento tem como objetivo descrever os requisitos e funcionalidades do software apresentado. O software tem como finalidade um controle de uma academia de musculação, com cadastro de clientes, planos, e aulas.
*Objetivos:
 O software deverá ser capaz de:

  - Permitir o registro de usuários;
  - Garantir a segurança e privacidade das informações;
  - Ser de fácil utilização.

*Funcionalidades:
 O software deverá conter as seguintes funcionalidades:

  - Registro de clientes;
  - Registro de planos de assinatura;
  - Registro de aulas exclusivas;
  - Lista de clientes;
  - Lista de planos de assinatura;
  - Lista de aulas exclusivas;
  - Login;
  - Sistema de lista de clientes;
  - Sistema de lista de assinatura;
  - Sistema de lista exclusivas;
  - um dashboard com informações relevantes

--


*Requisitos Técnicos:
 O software deverá ser desenvolvido com as seguintes tecnologias:

  - Linguagem de programação: PHP;
  - Tecnologias: HTML, CSS, JS;
  - Banco de dados: mysql;
  - Framework: Bootstrap;
  - Servidor de aplicação: Apache Tomcat;

*Utilização:
 Como deve ser executado o software:

  - Clone o repositório em sua máquina local;
  - Acesse o diretório do projeto;
  - Coloque a pasta no caminho C:\xampp\htdocs;
  - Instale as dependências do projeto usando o Composer: composer install; (isso deve instalar a pasta vendor, e mais o que for necessário)
  - Abra o Xampp e clique em start no apache e no mySQL no painel de controle;
  - Rode o script "php -S localhost:8080 " na raiz do projeto para poder utilizar a url http://localhost:8080
  - Rode o script "php artisan migrate" para criar o banco
  - Rode o script "php artisan serve" para startar a aplicação
*Banco de dados:
php artisan migrate

