# Pokedex

Projeto para testar conhecimentos com Laravel

## Requisitos

- PHP 8.3
- Laravel 10
- MySQL

## Instalação

### Configuração de ambiente:

```bash
cp .env.example .env
```

```bash
php artisan jwt:secret
```


### Rodar aplicação sem docker

```bash
composer install
```

```bash
php artisan migrate
```

```bash
php artisan serve
```

### Rodar aplicação com docker (Recomendado)

```bash
docker compose up -d
```

```bash
docker compose exec app php artisan migrate
```
