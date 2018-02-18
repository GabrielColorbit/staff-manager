# Staff Manager
Sistema de cadastro de funcionários, criado com objetivo de realizar a integração entre o back-end feito com laravel e o front-end criado com vue.js.

# Tecnologias Utilizadas
  - Laravel
  - VUE JS
  - NPM
  - Composer
  - PHP
  - Mysql

Também deve ser possível 
# Requisitos
 Deverá ser possivel adicionar/remover/atualizar funcionários.
 ###Tables
                    
Requisito  | Tipo | Prioridade | Perfil
------------- | ------------- | ------------- | -------------
Utilizar VueJS | Não Funcional | 3 | Todos
Utilizar PHP | Não Funcional  | 3 | Todos
Utilizar Mysql | Não Funcional  | 3 | Todos
Autenticação de Sessão | Não Funcional  | 2 | Todos
Cadastrar Funcionários | Funcional  | 1 | Usuário
Editar Funcionários | Funcional  | 1 | Usuário
Excluir Funcionários | Funcional  | 1 | Usuário
Listagem de Funcionários | Funcional  | 1 | Usuário

# Dependências

    Programas
    - php http://php.net/downloads.php
    - composer https://getcomposer.org/
    - npm https://www.npmjs.com/get-npm
    - mysql https://dev.mysql.com/downloads/installer/
        - create: scheme: staffmanater, user: staffmanager, password: staffmanager

# Inicialização
- Comandos para Instalação<br>
    `$ composer install`<br>
    `$ npm install`
    `$php artisan migrate`

- Comandos para Executar Projeto (executar em abas separadas do terminal)<br>
    `$php artisan serve`<br>
    `$npm run watch`
