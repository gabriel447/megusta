## Como utilizar o projeto

1- verifique as versões do php instalada na sua máquina e mude para a 8.3

sudo update-alternatives --list php
sudo update-alternatives --set php /usr/bin/php8.3

2- instale as dependencias com o composer

composer install --ignore-platform-reqs

3- mude de branch

git checkout series

4- crie um arquivo de banco de dados para o sqlite e de permissoes para o arquivo

touch database/database.sqlite
chmod 777 database/database.sqlite

5- instale o sqlite caso não tenha e verifique o env

sudo apt-get install php-sqlite3
DB_CONNECTION=sqlite

6- agora de o comando para gerar os dados

php artisan migrate

7- execute o servidor e teste

php artisan server

8- não se esqueça de gerar a key

php artisan key:generate



