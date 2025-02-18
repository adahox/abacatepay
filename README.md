
# Abacate Pay Library

Uma simples biblioteca para usar o meio de pagamento Abacate Pay


## Apêndice

- [Como instalar](#como-instalar)
- [Configurando a Biblioteca](#configurando-a-biblioteca)
- [principios básicos](#principios-básicos)


## Como Instalar

Utilize o Composer para instalar a biblioteca ao seu sistema:

```bash
composer install adahox/abacatepay
```



## Configurando a biblioteca

Após a instalação, rode o comando para importar o arquivo de configuração: 

```bash
  php vendor:publish
```

Vá até o arquivo de configuração importado `abacatepay.php` no pasta `config` do seu projeto Laravel. você verá um arquivo como:

```php
<?php

return [
    "abacate-key" => ""
];
```

Neste arquivo, configure a Key do seu Abacate Pay. Para saber como obter sua key [clique Aqui](https://abacatepay.readme.io/reference/autentica%C3%A7%C3%A3o).
## Principios Básicos

A biblioteca vem com as seguintes rotas configuradas: 

#### Retorna todos os clientes cadastrados
```http
  GET /abacatepay/cliente
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `api_key` | `string` | **Obrigatório**. A chave da sua API |

#### Cadastra um cliente no seu Abacate Pay

```http
  POST /abacatepay/cliente
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `name`      | `string` | **Obrigatório**. nome do cliente |
| `cellphone`      | `string` | **Obrigatório**. Telefone do cliente |
| `taxId`      | `string` | **Obrigatório**. IDENTIDADE do cliente podendo ser CPF ou RG |
| `email`      | `string` | **Obrigatório**. email do cliente |

## Autores

- [@adahox](https://www.github.com/adahox)


## Licença

[MIT](https://choosealicense.com/licenses/mit/)


## Roadmap

- Implementação de Services também como opção de uso.

- Migrations para gestão interna de clientes/pagamentos.

