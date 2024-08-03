# PROJETO

## Configurando o projeto

1. **Criar o `.env` do projeto**

Copie o arquivo de exemplo para criar o arquivo de configuração (`.src/.env.sample`):

```bash
cd src &&
cp .env.sample .env
```

3. **Instalar as Dependências NODE**

Para instalar as dependências do NODEJS no projeto execute o comando no container do projeto:

```bash
npm install
npm run build
```

3. **Instalar as Dependências PHP**

Para instalar as dependências do PHP no projeto execute o comando no container do projeto:

```bash
composer install
```

4. **Atualizar Configurações**

Execute os seguintes comandos no container do projeto para atualizar as configurações:

```bash
php artisan optimize
```

### Links uteis 
- [Map Tree](http://api.map-tree.com.br/quote/list/map-tree)
- [Quote List JSON](http://api.map-tree.com.br/quote/list)
