

## Sobre
Seleção do edital 003/2021 no LAIS

## Instalação
Baixar o respositório:

``git clone https://github.com/talesjoabe/registroEpidemiologico.git``

Acessar o diretório criado e executar:

``docker-compose run --rm app composer install``

``sudo chown -R $USER:$USER ../papermaker``

``cp .env.example .env``

``docker-compose up -d``

Criar a chave:

``docker-compose exec app php artisan key:generate``

Para criar o cache das configurações, executar:

``docker-compose exec app php artisan config:cache``

Criar o cliente no passport
``sudo docker-compose exec app php artisan passport:client --personal``

Gerar uma chave jwt
``sudo docker-compose exec app php artisan jwt:secret``

Para finalizar o projeto, devemos criar as tabelas e populá-las em seu estado inicial:

``docker-compose exec app php artisan migrate --seed``


## Uso

Para executar qualquer comando do artisan, php ou outros, executar da seguinte forma:

``docker-compose exec app COMANDO_A_EXECUTAR``

Por exemplo, para acessar o tinker do artisan devemos executar:

``docker-compose exec app php artisan tinker``

Para executar comandos do npm utilizar:

``docker run -v "$PWD":/usr/src/app -w /usr/src/app node:alpine sh -c 'npm COMANDO'``

Por exmeplo, para executar npm install utilize:

``docker run -v "$PWD":/usr/src/app -w /usr/src/app node:alpine sh -c 'npm install'``


## Diagrama de Entidade-Relacionamento
- [Clique aqui para visualizar o ERD](https://github.com/talesjoabe/registroEpidemiologico/blob/dev/ERD.svg)

## Documentação da API
[Clique aqui para visualizar a documentação da API REST](https://app.swaggerhub.com/apis/registroEpi/registroEpidemiologico-LAIS/1.0.0) 


## Dica
Quando eu estava criando as funcionalidades de transparência, eu não conseguia fazer consulta nas funcionalidades que tem
faixa etária. No dia que estava ocorrendo o erro, vi uma dica que poderia se resolver em config.database - ao mudar o valor 
“strict” em mysql para “false”. No momento que eu faço esse commit, o erro não voltou mesmo com strict com o valor true. 
Caso ao testar essa api você note algum erro, é válido checar se faz sentido ou não fazer essa alteração.




