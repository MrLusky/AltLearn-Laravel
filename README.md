# AltLearn – Site do TCC (Laravel Breeze)
 
Projeto desenvolvido em **Laravel Breeze** para apresentar, em formato de site, o trabalho de conclusão de curso:
 
> **AltLearn: um aplicativo web progressivo para auxílio na educação de crianças com TEA no 1º e 2º anos do Ensino Fundamental**
 
---
 
## 📌 Sobre o projeto
 
Este repositório **não é o aplicativo AltLearn em si**. Ele é um **site que fala sobre o TCC**: reúne e exibe os dados do artigo (resumo, seções, atividades educacionais, recursos e tecnologias, referências bibliográficas) e permite que um administrador mantenha esse conteúdo por meio de um CRUD.
 
O artigo apresenta o **AltLearn**, uma aplicação web progressiva (PWA) pensada para apoiar crianças autistas do 1º e 2º anos do Ensino Fundamental, com atividades de alfabetização, classificação, organização de rotinas, matemática visual e consciência fonológica, além de recursos de personalização da interface (alto contraste, tamanho da fonte e controle de som).
 
O site foi construído como atividade de Programação Web III, aplicando os conceitos de Laravel: autenticação com Breeze, rotas, middlewares, rota fallback, migrations, seeders, models, controllers e views Blade com Tailwind CSS.
 
---
 
## 🌐 Como o site funciona
 
O sistema tem duas áreas e dois tipos de usuário.
 
### 1. Página inicial (pública – Front End)
Qualquer visitante acessa `/` e vê **todos os dados do TCC**:
- título do trabalho em português, inglês e espanhol, evento, local e licença;
- autores e orientador, com e-mails;
- palavras-chave nos três idiomas;
- **seções do artigo** (resumo, abstract, resumen, introdução, fundamentação teórica, método, resultados e considerações finais);
- **atividades educacionais** do AltLearn, com as habilidades da BNCC relacionadas, a relação pedagógica e a situação de implementação;
- **recursos e tecnologias** (React, Vite, Laravel, PHP, MySQL, recursos de personalização e itens de PWA), com status *Implementado*, *Informado* ou *Não confirmado*;
- **referências bibliográficas** com links.
### 2. Painel de controle (autenticado – Back End)
Depois de fazer login (ou se cadastrar), o usuário acessa o **Dashboard**, que mostra:
- boas-vindas e o perfil do usuário;
- contadores de registros (seções, atividades, recursos e referências);
- os mesmos dados do TCC exibidos na página inicial;
- para o **administrador**, atalhos e menu para gerenciar cada tabela.
### Perfis de usuário
 
| Perfil | O que pode fazer |
|---|---|
| **Visitante** | Ver a página inicial, entrar e se cadastrar |
| **Usuário comum** (`role = user`) | Ver a página inicial e o dashboard (somente leitura). Quem se cadastra pelo site entra com este perfil |
| **Administrador** (`role = admin`) | Tudo o que o usuário comum faz, e ainda **criar, editar e excluir** seções, atividades, recursos e referências |
 
Se um usuário comum tentar acessar uma rota de administração (ex.: `/admin/atividades`), o middleware bloqueia o acesso e retorna **403**. Qualquer URL que não exista cai na **rota fallback**, que exibe uma página 404 personalizada.
 
### Usuários criados pelo seeder
 
| Perfil | E-mail | Senha |
|---|---|---|
| Administrador | `admin@altlearn.com` | `password` |
| Usuário comum | `usuario@altlearn.com` | `password` |
 
---
 
## ✅ Requisitos da atividade e onde foram atendidos
 
| Requisito | Como foi atendido |
|---|---|
| Laravel Breeze | Instalado com a stack Blade: login, registro, recuperação de senha e dashboard |
| Rota Fallback | `Route::fallback()` em `routes/web.php`, com a view `fallback.blade.php` (404) |
| Migrations | Tabelas `users` (com a coluna `role`), `secoes`, `atividades`, `recursos` e `referencias` |
| Front-end | Tailwind CSS (que acompanha o Breeze) com a paleta do projeto |
| Middlewares | `auth` (usuário logado) e `admin` (`EnsureUserIsAdmin`) controlando as rotas |
| Seeders | `UserSeeder`, `SecaoSeeder`, `AtividadeSeeder`, `RecursoSeeder` e `ReferenciaSeeder` (mais de 40 registros no total) |
| Home e dashboard com todos os dados do TCC | Partial `partials/conteudo-tcc.blade.php`, usado nas duas telas |
| CRUD | Seções, atividades, recursos e referências, para o administrador |
 
---
 
## 🗄️ Banco de dados
 
Banco **MySQL** chamado `altlearn_db`.
 
| Tabela | Registros no seeder | Conteúdo |
|---|---|---|
| `users` | 2 | Administrador e usuário comum (coluna `role`) |
| `secoes` | 16 | Resumo, abstract, resumen e as seções do artigo |
| `atividades` | 5 | Associação imagem-palavra, Caça aos sons, Arrastar e soltar, Sequência de rotina e Matemática visual |
| `recursos` | 11 | Tecnologias, recursos de personalização e itens de PWA, com status |
| `referencias` | 12 | Referências bibliográficas do artigo |
 
---
 
## 🛠️ Tecnologias
 
- **Laravel** + **Laravel Breeze** (Blade)
- **PHP** e **Composer**
- **MySQL** (phpMyAdmin / XAMPP)
- **Tailwind CSS** e **Vite**
- **Node.js** / npm
### Paleta de cores
 
| Cor | Hex | Uso |
|---|---|---|
| Azul marinho | `#1B3454` | Cabeçalhos, botões e destaques |
| Lilás | `#C9B6FF` | Detalhes, links e selos |
| Azul-noite | `#0E1A2B` | Fundo da página inicial |
 
---
 
## 🧭 Rotas principais
 
| Método | Rota | Acesso | Descrição |
|---|---|---|---|
| GET | `/` | Público | Página inicial com os dados do TCC |
| GET | `/login`, `/register` | Visitante | Login e cadastro (Breeze) |
| GET | `/dashboard` | `auth` | Painel de controle |
| GET/PATCH/DELETE | `/profile` | `auth` | Perfil do usuário (Breeze) |
| CRUD | `/admin/secoes` | `auth` + `admin` | Gerenciar seções do artigo |
| CRUD | `/admin/atividades` | `auth` + `admin` | Gerenciar atividades |
| CRUD | `/admin/recursos` | `auth` + `admin` | Gerenciar recursos e tecnologias |
| CRUD | `/admin/referencias` | `auth` + `admin` | Gerenciar referências |
| GET | qualquer outra URL | Público | **Fallback**: página 404 personalizada |
 
---
 
## 📁 Arquivos principais
 
```
app/
├── Http/
│   ├── Controllers/
│   │   ├── HomeController.php
│   │   ├── DashboardController.php
│   │   └── Admin/
│   │       ├── CrudController.php        # base genérica do CRUD
│   │       ├── SecaoController.php
│   │       ├── AtividadeController.php
│   │       ├── RecursoController.php
│   │       └── ReferenciaController.php
│   └── Middleware/EnsureUserIsAdmin.php
├── Models/ (User, Secao, Atividade, Recurso, Referencia)
└── Providers/AppServiceProvider.php      # View Composer do partial
config/tcc.php                            # título, autores e palavras-chave
database/
├── migrations/
└── seeders/
resources/views/
├── home.blade.php
├── dashboard.blade.php
├── fallback.blade.php
├── components/publico-layout.blade.php
├── partials/conteudo-tcc.blade.php
└── admin/crud/ (index.blade.php, form.blade.php)
routes/web.php
```
 
---
 
## 🚀 Como rodar o projeto
 
**Pré-requisitos:** PHP 8.2+, Composer, Node.js e MySQL em execução.
 
```bash
# 1. Clonar o repositório
git clone https://github.com/MrLusky/AltLearn-Laravel.git
cd SEU-REPOSITORIO
 
# 2. Instalar as dependências
composer install
npm install
 
# 3. Configurar o ambiente
cp .env.example .env
php artisan key:generate
```
 
No `.env`, confira os dados do banco (crie antes um banco vazio chamado `altlearn_db`):
 
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=altlearn_db
DB_USERNAME=root
DB_PASSWORD=
```
 
```bash
# 4. Criar as tabelas e popular o banco
php artisan migrate:fresh --seed
 
# 5. Subir o servidor e o Vite
composer run dev
# ou, em dois terminais: php artisan serve  e  npm run dev
```
 
Acesse **http://127.0.0.1:8000**.
 
---
 
## 👥 Autores do TCC
 
- Júlio César Pires de Sousa da Silva
- Lucas Daniel de Araujo Pereira
- Waldemar José Pereira Neto
- Jeferson Roberto de Lima (orientador)
 
---
 
# 📸 Prints do projeto
 
## 1. Site funcionando em localhost
 
### Página inicial
![Página inicial](docs/prints/01-home.png)
 
### Página inicial – conteúdo do TCC
![Conteúdo do TCC na página inicial](docs/prints/02-home-conteudo.png)
 
### Login
![Tela de login](docs/prints/03-login.png)
 
### Registro
![Tela de registro](docs/prints/04-registro.png)
 
### Dashboard do administrador
![Dashboard do administrador](docs/prints/05-dashboard-admin.png)
 
### Dashboard do usuário comum (somente leitura)
![Dashboard do usuário comum](docs/prints/06-dashboard-usuario.png)
 
### Rota Fallback (404 personalizada)
![Página 404 da rota fallback](docs/prints/07-fallback-404.png)
 
### Middleware `admin` bloqueando o usuário comum (403)
![Acesso negado pelo middleware](docs/prints/08-middleware-403.png)
 
---
 
## 2. Banco de dados (migrations e seeders)
 
### Execução das migrations e seeders no terminal
![php artisan migrate:fresh --seed](docs/prints/09-migrate-terminal.png)
 
### Tabelas criadas no phpMyAdmin (`altlearn_db`)
![Tabelas no phpMyAdmin](docs/prints/10-phpmyadmin-tabelas.png)
 
### Tabela `users` com a coluna `role`
![Tabela users](docs/prints/11-phpmyadmin-users.png)
 
### Tabela `secoes` populada pelo seeder
![Tabela secoes](docs/prints/12-phpmyadmin-secoes.png)
 
### Exemplo de migration
![Código de uma migration](docs/prints/13-codigo-migration.png)
 
### Exemplo de seeder
![Código de um seeder](docs/prints/14-codigo-seeder.png)
 
---
 
## 3. Front End – operações CRUD (logado como administrador)
 
### READ – listagem dos registros
![Listagem](docs/prints/15-crud-read.png)
 
### CREATE – formulário de novo registro
![Formulário de criação](docs/prints/16-crud-create-form.png)
 
### CREATE – registro criado com sucesso
![Registro criado](docs/prints/17-crud-create-ok.png)
 
### UPDATE – formulário de edição
![Formulário de edição](docs/prints/18-crud-update-form.png)
 
### UPDATE – registro atualizado com sucesso
![Registro atualizado](docs/prints/19-crud-update-ok.png)
 
### DELETE – confirmação de exclusão
![Confirmação de exclusão](docs/prints/20-crud-delete-confirm.png)
 
### DELETE – registro excluído com sucesso
![Registro excluído](docs/prints/21-crud-delete-ok.png)
 
### Validação de formulário
![Erros de validação](docs/prints/22-crud-validacao.png)
 
---
 
## 4. Back End – operações CRUD
 
### `CrudController` (métodos `index`, `create`, `store`, `edit`, `update` e `destroy`)
![Código do CrudController](docs/prints/23-codigo-crudcontroller.png)
 
---

## Autores

Lucas Daniel de Araujo Pereira
Júlio César Pires de Sousa da Silva
Waldemar José Pereira Neto

Projeto desenvolvido para fins acadêmicos na disciplina de Programação Web III.
