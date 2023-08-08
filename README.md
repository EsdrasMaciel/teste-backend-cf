
# Backend Teste Consulta Facil


Consulta Facil teste de Desenvolvedor Backend pleno Laravel

## Instalação


#### Clone o repositório
```bash
git clone https://github.com/EsdrasMaciel/teste-backend-cf.git
```
#### Entre na pasta
```bash
cd teste-backend-cf
```
#### Instale as dependências do laravel
```bash
composer install
```
#### Faça uma copia do .env.example, renomeie para .env e configure suas variáveis
```bash
cp .env.example .env
```
#### Gere uma APP_KEY (.env)
```bash
php artisan key:generate
```
#### Gere uma JTW key (.env)
```bash
php artisan jwt:secret
```
#### Gere as tabelas do banco de dados
```bash
php artisan migrate
```
#### Popule as tabelas do banco de dados
 
```bash
php artisan db:seed
```
#### Inicie o servidor de desenvolvimento

```bash
php artisan serve
```
## Deploy com Sails
###

#### Iniciar o Sails
```bash
  ./vendor/bin/sail up
```
Ou iniciar o Sails no "detached" mode:
```bash
  ./vendor/bin/sail up -d
```
#### Gere as tabelas do banco de dados
```bash
  ./vendor/bin/sail artisan migrate
```

#### Popule as tabelas do banco de dados
```bash
  ./vendor/bin/sail artisan db:seed
```

## Documentação da API

## Métodos
Requisições para a API devem seguir os padrões:
| Método | Descrição |
|---|---|
| `GET` | Retorna informações de um ou mais registros. |
| `POST` | Utilizado para criar um novo registro. |
| `PUT` | Atualiza dados de um registro ou altera sua situação. |

## Respostas

| Código | Descrição |
|---|---|
| `200` | Requisição executada com sucesso (success).|
| `400` | Erros de validação ou os campos informados não existem no sistema.|
| `401` | Dados de acesso inválidos (unauthenticated).|
| `404` | Registro pesquisado não encontrado (Not found).|


#### Login  [/login]

Requisição de um token de acesso
```http
  POST /api/login
```

+ Request (application/json)

    + Body

            {
              "email": "email@example.com"
              "password": "password",
            }

+ Response 200 (application/json)

    + Body

            {
                "access_token": "[access_token]",
                "token_type": "Bearer",
                "expires_in": 3600
            }


#### Cidades  [/cidades]
Lista de todas as cidades cadastradas

```http
  GET /api/cidades
```
+ Request (application/json)

    + Body

            {
              
            }

+ Response 200 (application/json)

    + Body

            [
                {
                    "id": 1,
                    "nome": "Pelotas",
                    "estado": "Rio Grande do Sul"
                },
                {
                    "id": 2,
                    "nome": "São Paulo",
                    "estado": "São Paulo"
                }
            ]

#### Medicos  [/medicos]
Lista de todos os medicos

```http
  GET /api/medicos
```
+ Request (application/json)

    + Body

            {
              
            }

+ Response 200 (application/json)

    + Body

            [
              {
                  "id": 1,
                  "nome": "Dra. Alessandra Moura",
                  "especialidade": "Neurologista",
                  "cidade_id": 1
              },
              {
                  "id": 3,
                  "nome": "Dra. Alessandra Moura",
                  "especialidade": "Neurologista",
                  "cidade_id": 1
              }
            ]
#### Medicos cidade  [/cidades/{id_cidade}/medicos]
Lista de todos os medicos de uma cidade

```http
  GET /api/cidades/{id_cidade}/medicos
```
+ Request (application/json)

    + Body

            {
              
            }

+ Response 200 (application/json)

    + Body

          [
              {
                  "id": 3,
                  "nome": "Dr. Antônio Costa",
                  "especialidade": "Cardiologista",
                  "cidade_id": 1
              },
              {
                  "id": 2,
                  "nome": "Dra. Luisa Camargo",
                  "especialidade": "Cardiologista",
                  "cidade_id": 1
              }
          ]

#### Cadastrar medico  [/medicos]
Cadatra um novo medico
```http
  POST /api/medicos
```
+ Request (application/json)
    + Headers

            Authorization: Bearer [access_token]

    + Body

            {
                "nome": "Dra. Alessandra Moura",
                "especialidade": "Neurologista",
                "cidade_id": {id_cidade}
            }

+ Response 200 (application/json)

    + Body

          {
              "id": 11,
              "nome": "Dra. Alessandra Moura",
              "especialidade": "Neurologista",
              "cidade_id": 1,
              "created_at": "2023-08-08T02:14:33.000000Z",
              "updated_at": "2023-08-08T02:14:33.000000Z",
              "deleted_at": null
          }



#### Vincular medico e paciente  [/medicos/{id_medico}/pacientes]
Vincula um medico a um paciente
```http
  POST /medicos/{id_medico}/pacientes
```
+ Request (application/json)
    + Headers

            Authorization: Bearer [access_token]

    + Body

            {
                "medico_id": {id_medico},
                "paciente_id": {id_paciente}
            }

+ Response 200 (application/json)

    + Body

          {
              "medico": {
                  "id": 7,
                  "nome": "Srta. Maraisa Molina Jr.",
                  "especialidade": "Oftalmologia",
                  "cidade_id": 2,
                  "created_at": "2023-08-08T02:10:09.000000Z",
                  "updated_at": "2023-08-08T02:10:09.000000Z",
                  "deleted_at": null
              },
              "paciente": {
                  "id": 10,
                  "nome": "Sr. Otávio Barreto Saito",
                  "cpf": "055.180.649-42",
                  "celular": "(38) 4756-9559",
                  "created_at": "2023-08-08T02:10:09.000000Z",
                  "updated_at": "2023-08-08T02:10:09.000000Z",
                  "deleted_at": null
              }
          }


#### Listar pacientes medico  [/medicos/{id_medico}/pacientes]
Lista todos os pacientes de um medico
```http
  GET /medicos/{id_medico}/pacientes
```
+ Request (application/json)
    + Headers

            Authorization: Bearer [access_token]

    + Body

            {

            }

+ Response 200 (application/json)

    + Body

          [
              {
                  "id": 103,
                  "nome": "Luana Rodrigues",
                  "cpf": "662.669.840-08",
                  "celular": "(11) 9 8484-6363",
                  "created_at": "2023-07-06 09:36:28",
                  "updated_at": "2023-07-06 09:36:28",
                  "deleted_at": null
              },
              {
                  "id": 108,
                  "nome": "Luiza Gonçalves",
                  "cpf": "491.075.050-94",
                  "celular": "(11) 9 8123-4567",
                  "created_at": "2023-07-06 09:37:59",
                  "updated_at": "2023-07-06 09:37:59",
                  "deleted_at": null
              }
          ]


#### Criar paciente  [/pacientes]
Cria um paciente 
```http
  POST /pacientes
```
+ Request (application/json)
    + Headers

            Authorization: Bearer [access_token]

    + Body

            {
                "nome": "Matheus Henrique",
                "cpf": "795.429.941-60",
                "celular": "(11) 9 8432-5789"
            }

+ Response 200 (application/json)

    + Body

          {
                 "id": 111,
                  "nome": "Matheus Henrique",
                  "cpf": "795.429.940-60",
                  "celular": "(11) 98432-5789",
                  "created_at": "2023-07-06 09:50:22",
                  "updated_at": "2023-07-06 09:50:22",
                  "deleted_at": null
          }

#### Atualizar paciente  [/pacientes/{id_paciente}]
Vincula um medico a um paciente
```http
  PUT /pacientes/{id_paciente}
```
+ Request (application/json)
    + Headers

            Authorization: Bearer [access_token]

    + Body

            {
                    "nome": "Luana Rodrigues Garcia",
                    "celular": "(11) 98484-6362"
            }

+ Response 200 (application/json)

    + Body

          {    
              "id": 10,
              "nome": "Luana Rodrigues Garcia",
              "cpf": "055.180.649-42",
              "celular": "(11) 98484-6362",
              "created_at": "2023-08-08T02:10:09.000000Z",
              "updated_at": "2023-08-08T02:15:14.000000Z",
              "deleted_at": null
          }




