# Backend Teste Consulta Facil


<br>

## Tópicos

[Instalação e Uso](#instalação-e-uso)

<br>

## Instação e Uso

### Clonar o repositório

```bash
# Clone o repositório
$ git clone https://github.com/EsdrasMaciel/teste-backend-cf.git

# Entre na pasta
$ cd teste-backend-cf

# Instale as dependências do laravel e node
$ composer install

# Faça uma copia do .env.example, renomeie para .env e configure suas variáveis
$ cp .env.example .env

# Gere uma APP_KEY (.env)
$ php artisan key:generate

# Gere uma JTW key (.env)
$ php artisan jwt:secret

# Gere as tabelas do banco de dados
$ php artisan migrate

# Popule as tabelas do banco de dados
$ php artisan db:seed


