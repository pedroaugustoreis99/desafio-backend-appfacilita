 # Desafio back-end

Este é um projeto desenvolvido em Laravel 11, requerendo PHP 8.1 ou superior. O objetivo deste projeto é demonstrar o uso de rotas, controllers, views, relacionamentos de banco de dados e outras funcionalidades do framework.

## Requisitos

- **PHP:** 8.1 ou superior  
- **Composer:** [https://getcomposer.org/](https://getcomposer.org/)  
- **Banco de dados:** MySQL
- **Extensão PDO do PHP:** habilitada para conexão com o banco  
- **Git (opcional):** para clonar o repositório  

## Passo a Passo para Rodar o Projeto em Ambiente Local

1. **Clonar o repositório:**  
   Se você ainda não tem o código localmente:
   ```bash
   git clone https://github.com/pedroaugustoreis99/desafio-backend-appfacilita.git
   cd desafio-backend-appfacilita
    ```

2. **Instalar dependências PHP:**
   ```bash
   composer install
   ```

3. **Configurar as variáveis de ambiente:**
   Copie o arquivo `.env.example` para `.env`
   ```bash
   cp .env.example .env
   ```
   edite o arquivo .env para configurar o banco de dados e outras variáveis, por exemplo:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nome_do_banco
   DB_USERNAME=seu_usuario
   DB_PASSWORD=sua_senha
   ```

4. **Gerar a chave de aplicação:**
   ```bash
   php artisan key:generate
   ```

5. **Migrar o banco de dados:**
   ```bash
   php artisan migrate
   ```

6. **Iniciar o servidor de desenvolvimento:**
   ```bash
   php artisan serve
   ```
   A aplicação estará disponível em http://localhost:8000 se a porta 8000 não estiver ocupada