# Map Tree

## AMBIENTE DOCKER

### Configuração Inicial

Este README fornece instruções para configurar o ambiente de desenvolvimento usando Docker. Se você estiver utilizando ferramentas de desenvolvimento como XAMPP ou WampServer e preferir não usar o Docker, pode pular este tutorial. O conteúdo do projeto está no diretório `src`. Caso tenha dificuldades com a execução do projeto, consulte o tutorial em `src/README.md`.

1. **Criar o arquivo `.env` para o Docker:**

```bash
cp .env.sample .env
```

2. **Adicionar uma entrada ao arquivo hosts do seu sistema operacional:**

```bash
127.0.0.1   api.map-tree.com.br
```

### Iniciar o Docker

Para iniciar os containers pela primeira vez, use o comando:

```bash
docker compose up -d
```

### Acessar container do php

Para acessar o terminal do container PHP (o nome pode variar, como teste_situacional-php-fpm-1), execute:

```bash
docker exec -it map_tree-php-fpm-1 /bin/bash
```

**Observação:** O nome do container pode variar. Verifique o nome correto com:
```bash
docker ps
```