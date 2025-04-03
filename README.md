# Lista Passo a Passo

## Subir o Container e Criar as Imagens

1. Certifique-se de que o Docker e o Docker Compose estão instalados.
2. Navegue até o diretório do projeto: `/c:/prueba/`.
3. Execute o comando para subir os serviços definidos no `docker-compose.yml`:
   ```bash
   docker-compose up -d
   ```

## Rodar o MySQL

1. Verifique se o container do MySQL está em execução:
   ```bash
   docker ps
   ```
2. Acesse o MySQL dentro do container:
   ```bash
   docker exec -it <nome_do_container_mysql> mysql -u root -p
   ```
   Substitua `<nome_do_container_mysql>` pelo nome do container correspondente ao MySQL.

## Acessar `prueba1` e `prueba2`

1. Certifique-se de que os serviços `prueba1` e `prueba2` estão configurados no `docker-compose.yml`.
2. Acesse os serviços pelos respectivos endereços no navegador:
   - `http://localhost/prueba1` para `prueba1`.
   - `http://localhost/prueba2/psychology-clinic/src/views/index.php` para `prueba2`.