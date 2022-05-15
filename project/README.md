### Acessar o projeto via Laravel Artisan
- Dentro da pasta project digitar os comandos: 
  - php artisan key:generate 
  - php artisan serve
- Acessar a url: localhost:8000

### Executar o projeto via Docker

- Dentro da pasta project digitar o comando: docker compose up -d
- Acessar o container e digitar os comandos:
  - composer install
  - php artisan key:generate
  - chown apache:apache storage/
  - chown apache:apache bootstrap/cache
- Acessar a url: localhost:8080
