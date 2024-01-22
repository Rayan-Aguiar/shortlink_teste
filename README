
# Encurtador de link (shortlink)

Teste Prático para a Vaga de Desenvolvedor Front-End.

O desafio proposto consistiu em criar uma aplicação web que permitisse aos usuários simplificar e tornar mais apresentáveis os URLs fornecidos. A principal funcionalidade era a capacidade de encurtar links, oferecendo aos usuários a conveniência de compartilhar URLs de forma mais compacta.


## Demonstração

<div align="center">
    <img src="./assets/print-mobile.png" alt="print Mobile" width="50%"/>
    <img src="./assets/print-PC.png" alt="print PC" width="50%"/>
</div>


## Stack utilizada

**Front-end:** VueJs, TailwindCSS

**Back-end:** Laravel

**Outros:** Docker e Docker Compose, MySQL


## Instalação


Certifique-se de ter o Docker e o Docker Compose instalados em sua máquina antes de prosseguir.

[Docker](https://www.docker.com/) | 
[Docker Compose](https://docs.docker.com/compose/)


Clone o repositório

```bash
  git clone https://github.com/Rayan-Aguiar/shortlink_teste
  cd shortLink
```

Para rodar o **front end**:

```bash
  cd WEB
  npm install
  npm run dev
```
Para rodar o **Back end**:

1. Crie um arquivo .env na raiz do projeto para configurar as variáveis de ambiente necessárias. Você pode usar o exemplo fornecido em .env.example como referência.
```bash
  cd .. 
  cd API
  cp .env.example .env

```
2. Execute o Docker Compose para iniciar os serviços:
 ```bash
    docker compose build
    docker compose up -d
```
Isso iniciará os contêineres especificados no arquivo docker-compose.yml em segundo plano.

3. Instale as dependências do Laravel e execute as migrações para criar as tabelas do banco de dados:

 ```bash
    docker compose exec app composer install
```

4. Entre no Shell do container do docker e rode as migrations

 ```bash
    docker exec -it apache /bin/bash
    cd laravel
    php artisan migration
```

### Executando a Aplicação

Com todos os serviços em execução e as dependências instaladas, você pode acessar sua aplicaço, PHPMyAdmin disponivel em http://localhost:8080. O Laravel estará disponível em http://localhost.


### Comandos Úteis do Docker Compose

Parar os serviços:

 ```bash
    docker compose down
```
Visualizar logs:

 ```bash
    docker compose logs
```