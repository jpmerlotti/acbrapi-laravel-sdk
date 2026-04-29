# ACBr API Laravel SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jpmerlotti/acbrapi-laravel-sdk.svg?style=flat-square)](https://packagist.org/packages/jpmerlotti/acbrapi-laravel-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/jpmerlotti/acbrapi-laravel-sdk.svg?style=flat-square)](https://packagist.org/packages/jpmerlotti/acbrapi-laravel-sdk)

O SDK Laravel definitivo para integração com a ACBr API. Desenvolvido para tornar a emissão de documentos fiscais brasileiros (NFe, NFCe, CTe, etc) uma tarefa simples e elegante no Laravel.

## Instalação

Você pode instalar o pacote via composer:

```bash
composer require jpmerlotti/acbrapi-laravel-sdk
```

Você pode publicar o arquivo de configuração com:

```bash
php artisan vendor:publish --tag="acbrapi-config"
```

## Uso

Configure suas credenciais no arquivo `.env`:

```env
ACBR_API_TOKEN=seu_token_aqui
ACBR_API_ENV=sandbox
```

### Exemplo de Emissão de NFe

```php
use ACBr\Laravel\Facades\ACBr;

$response = ACBr::nfe()->emitirNfe($dados);

if ($response->getStatus() === 'autorizado') {
    return "Nota emitida com sucesso: " . $response->getChave();
}
```

### Consulta de CEP

```php
use ACBr\Laravel\Facades\ACBr;

$endereco = ACBr::cep()->consultarCep('01001000');
```

## Opções de Instalação (Em breve)

Este SDK oferecerá presets para diferentes stacks:
- [ ] Laravel API Only
- [ ] Laravel + Blade
- [ ] Laravel + Livewire
- [ ] FilamentPHP Plugin

## Créditos

- [João Paulo Merlotti](https://github.com/jpmerlotti)
- [Baseado no SDK oficial da ACBr API](https://github.com/projeto-acbr-oficial/acbrapi-sdk-php)

## Licença

The MIT License (MIT). Por favor, veja o [Arquivo de Licença](LICENSE.md) para mais informações.
