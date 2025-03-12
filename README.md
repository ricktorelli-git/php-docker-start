## Modelo de projeto PHP com Docker

Projeto base para desenvolvimento de aplicações em php utilizando container docker. Foi concebido para ser utilizado em
ambiente de desenvolvimento, não sendo recomendado para ambiente de produção, pois requer mais segurança. Foi utilizado
o docker-compose para orquestrar os containers. Composer para gerenciar as dependências do projeto. Bootstrap 5 para o
layout e make para automatizar as tarefas.

### Requisitos:
- docker
- git
- composer
- bootstrap 5
- make (cmake)

### Os containers Docker pré-definidos são:
- php_fpm: container com php-fpm
- nginx: container com nginx
- mysql: container com mysql
- phpmyadmin: container com phpmyadmin
- redis: container com redis

### Preparando o ambiente de desenvolvimento
- Clone o repositório:
```bash
git clone nome_do_repositorio-no-github
```
- Acesse o diretório do projeto
- Dentro de `app/` foi criada uma sugestão de estrutura de diretórios para o projeto no padrão MVC, mas você pode alterar
  conforme a necessidade do seu projeto, o importante é que o diretório 'public/' seja o diretório raiz do projeto.

- Altere as variáveis de ambiente no arquivo .env.example
````bash
APP_NAME='PHP-Docker'
APP_DESCRIPTION='Projeto PHP com Docker para desenvolvimento'
APP_AUTHOR=''
APP_PORT=80

DB_HOST=mysql
DB_ROOT_PASSWORD=root
DB_DATABASE=php_docker
DB_USER=user
DB_PASSWORD=password
DB_PORT=3306
PHPMYADMIN_PORT=8081
REDIS_PORT=6379
````
- Execute o comando 'make', este comando irá criar os containers e instalar as dependências do projeto e copiar o
`env.example` para o `.env`.:
```bash
make
````
### Acessando o projeto
- Acesse o projeto em http://localhost
- Acesse o phpmyadmin em http://localhost:8081 (DB_USER, DB_PASSWORD)
- Acesse o redis em http://localhost:6379

### Comandos úteis
- Para iniciar os containers:
````bash
docker compose up -d
````
- Para parar os containers:
````bash
docker compose down
````
- Para parar e remover os containers:
````bash
docker compose down --volumes
````
```bash
docker compose build --no-cache # Recria as imagens
```
- Forcar a recriação dos containers em ambiente de desenvolvimento:
```bash
docker-compose down                                                                   ✔  took 7s   at 07:05:46  ▓▒░
docker-compose build --no-cache
docker-compose up -d
```
- Para acessar o container php_fpm e saber a versão do php:
```bash
docker compose run --rm php_fpm php -v
```
- Para acessar o container php_fpm e saber a versão do composer:
```bash
docker compose run --rm php_fpm composer --version
```
- Para instalar as dependências do projeto:
```bash
docker compose run --rm php_fpm composer install
```
- Instalar um pacote novo no composer:
```bash
docker compose run --rm php_fpm composer require pacote/nome
```
- Rodar sempre que alterar algo no arquivo `composer.json`
```bash
docker compose run --rm php_fpm composer dump-autoload
```
- Para acessar o container mysql e executar comandos sql:
```bash
docker compose exec mysql mysql -uroot -p
```














