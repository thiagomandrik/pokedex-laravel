# Pokedex

Projeto para testar conhecimentos com Laravel utilizando JWT para autenticação e docker para containerização.

## Stack
- PHP 8.3
- Composer
- Laravel 10
- MySQL

## Instalação

### Configuração de ambiente:

```bash
cp .env.example .env
```

```bash
composer install
```

```bash
php artisan jwt:secret
```

Atualize as variáveis de ambiente no arquivo `.env`:

```bash
DB_USERNAME=
DB_PASSWORD=
MYSQL_ROOT_PASSWORD=
```

### Rodar aplicação sem docker (necessario MySQL)

```bash
php artisan migrate
```

```bash
php artisan serve
```

A aplicação ficara disponivel em `http://localhost:8000`

### Rodar aplicação com docker (Recomendado)

```bash
docker compose up -d
```

Aguarde a inicialização do container e execute:

```bash
docker compose exec app php artisan migrate
```

A aplicação ficara disponivel em `http://localhost:8989`

## Endpoints

Para testar os endpoints, use o arquivo `collection.postman_collection.json`

A collection contém algumas variaveis de ambiente que devem ser atualizadas conforme necessario:

- `url` - Ajustar conforme a url da aplicação
- `bearer_token` - Token de autenticação, deve ser atualizado conforme o endpoint de login

Os endpoints de autenticação sao:

- `POST /api/auth/login`
- `POST /api/auth/register`
- `POST /api/auth/refresh`
- `GET /api/auth/me`

Os endpoints publicos para consulta de Pokemons sao:

- `GET /api/pokedex`
- `GET /api/pokedex/{pokemon}`

Os endpoints privados para gestão de Pokemons favoritos sao:

- `POST /api/favorites/{pokemon}`
- `DELETE /api/favorites/{pokemon}`
- `GET /api/favorites`
