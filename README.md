# Agendamento

Projeto Agendamento de salas.

Criado pensando na necessidade de uma empresa que trabalho em agendar e guardar históricos do agendamentos das salas de reunião.

* **Sistema Login**

* **Cadastro/Visualização/Exclusão** - Agendas só podem ser cadastradas e excluidas caso o usuário esteja logado (pode ser visualizado sem estar logado).

* **Filtro por Data**

* **As senhas são criptografadas com md5**

* **Bootstrap/JQUERY**

## Requerimentos técnicos mínimos:
- PHP 5.6 ou superior
- mySQL versão 5.6.21 ou superior
- Apache/2.4.10

## Instalação

**Cópia de Arquivos no servidor:**

- Clonar o repo para o seu servidor web usando git clone: `https://github.com/brunosalgadoreis/agendamento-sala.git`.

**Preparação do Banco de Dados:**
- Criar o banco de dados mySQL (nome padrão 'calendar_system').
- Importar o script `calendar_system.sql` que esta na pasta `db`.

**Configuração:**
- Alterar o arquivo config.php a `BASE_URL` e as informações necessárias para a conectar o banco de dados.
- Alterar no arquivo `.htaccess` a URL em `RewriteRule`
