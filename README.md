# Runes Game
Este projeto é um jogo baseado nas runas nórdicas, desenvolvido com Laravel, Inertia.js e Vue.js.

## Tecnologias Utilizadas
- Laravel - Framework PHP para o backend.
- Inertia.js - Conecta o backend Laravel com o frontend Vue.js, proporcionando uma experiência de SPA (Single Page Application).
- Vue.js - Framework JavaScript para construir a interface do usuário.
- Vite - Ferramenta de construção e servidor de desenvolvimento.

## Pré-Requisitos
Antes de começar, verifique se você tem as seguintes ferramentas instaladas:
- PHP (>= 8.1)
- Composer para gerenciar dependências PHP
- Node.js e npm para gerenciar dependências JavaScript
- Laravel instalado globalmente ou via Composer

Instalação
### 1. Clone o Repositório
```bash
git clone https://github.com/seu-usuario/runes-game.git
cd runes-game
```

### 2. Instale as Dependências do Backend
Instale as dependências do Laravel:
```bash
composer install
```
### 3. Instale as Dependências do Frontend

Instale as dependências do Vue.js e Vite:
```bash
npm install
```

### 4. Configure o Ambiente
Copie o arquivo .env.example para .env:
```bash
cp .env.example .env
```
Atualize as configurações no arquivo .env conforme necessário, especialmente a configuração do banco de dados.

### 5. Gere a Chave do Aplicativo
```bash
php artisan key:generate
```

### 6. Execute as Migrations
Para criar as tabelas no banco de dados:
```bash
php artisan migrate
```
## Execução

### 1. Execute o Servidor de Desenvolvimento Laravel
```bash
php artisan serve
```

### 2. Execute o Vite (Frontend)
Em outro terminal, execute o Vite para compilar e assistir mudanças no frontend:
```bash
npm run dev
```

## Endpoints API
- GET /api/runes - Retorna a lista de todas as runas nórdicas.
- POST /api/runes - Adiciona uma nova runa (requer name e meaning no corpo da requisição).

# Estrutura do Projeto

- app/: Contém o código do backend em Laravel.
    - Http/Controllers: Controladores para lidar com requisições.
    - Models: Modelos para interagir com o banco de dados.
- resources/js: Contém o frontend com Vue.js.
    - Pages: Contém as páginas do Vue.js, como Home.vue.
- routes/: Contém as definições de rotas do Laravel.

## Contribuição

Se você quiser contribuir com o projeto:
1. Faça um fork deste repositório.
2. Crie uma nova branch (git checkout -b minha-branch).
3. Realize as alterações.
4. Envie um pull request para a branch principal.

## Licença
Este projeto está sob a licença MIT. Consulte o arquivo LICENSE para mais detalhes.
