<p align="center">
    <img width="800" src=".github/logo.png" title="Logo do projeto"><br />
    <img src="https://img.shields.io/maintenance/yes/2021?style=for-the-badge" title="Status do projeto">
    <img src="https://img.shields.io/github/workflow/status/ccuffs/template/ci.uffs.cc?label=Build&logo=github&logoColor=white&style=for-the-badge" title="Status do build">
</p>

# Título

Coloque uma descrição do projeto aqui. Geralmente essa descrição tem de duas a três linhas de tamanho. Ela deve dar uma visão geral sobre o que é o projeto, ex.: tecnologia usada, filosofia de existência, qual problema tenta-se resolver, etc. Se você precisa escrever mais que 3 linhas de descrição, crie subseções.

> **IMPORTANTE:** coloque aqui alguma mensagem que é muito relevante aos usuários do projeto, se for o caso.

## ✨ Features

Aqui você pode colocar uma screenshot do produto resultante desse projeto. Descreva também suas features usando uma lista:

* Fácil integração;
* Poucas dependências;
* Utiliza um template lindo para organizar o `README`;
* Possui ótima documentação e testes.

## 🚀 Começando

### 1. Dependências

Para executar o projeto, você precisa ter o seguinte instalado:

- [Git](https://git-scm.com);
- [PHP](https://www.php.net/downloads);
- [Composer](https://getcomposer.org/download/);
- [NodeJS](https://nodejs.org/en/);
- [NPM](https://www.npmjs.com/package/npm);

Você precisa de várias extensões PHP instaladas também:

```
sudo apt install php-cli php-mbstring php-zip php-xml php-curl
```

### 2. Configuração

Feito a instalação das dependências, é necessário obter uma cópia do projeto. A forma recomendada é clonar o repositório para a sua máquina.

Para isso, rode:

```
git clone --recurse-submodules https://github.com/practice-uffs/maker.git && cd maker
```

Isso criará e trocará para a pasta `template` com o código do projeto.

#### 2.1 PHP

Instale as dependências do PHP usando o comando abaixo:

```
composer install
```

#### 2.2 Banco de Dados

O banco de dados mais simples para uso é o SQLite. Para criar uma base usando esse SGBD, rode:

```
touch database/database.sqlite
```

#### 2.3 Node

Instale também as dependências do NodeJS executando:

```
npm install
```

#### 2.4 Laravel

Crie o arquivo `.env` a partir do arquivo `.env.example` gerado automaticamente pelo Laravel:

```
cp .env.example .env
```

Criação as tabelas do banco de dados com as migrações esquemas:

```
php artisan migrate
```

Por fim execute o comando abaixo para a geração da chave de autenticação da aplicação:

```
php artisan key:generate
```

Gere os recursos JavaScript e CSS:

```
npm run dev
```

>*DICA:* enquanto estiver desenvolvendo, rode `npm run watch` para manter os scripts javascript sendo gerados sob demanda quando alterados.


#### 2.5 Ibis

Instale a ferramenta [Ibis](https://github.com/themsaid/ibis) para que seja possível a geração do livro digital em sua máquina localmente:

```
composer global require themsaid/ibis
```

Também é necessário habilitar a extenção _gd_ do PHP, então rode o seguinte comando em seu terminal, com _x_ estando de acordo com a versão do seu PHP:

```
sudo apt-get install php7.x-gd
```

O próximo passo é adicionar o ibis para que possa ser rodado através do terminal, para isso rode:

```
sudo nano /etc/bash.bashrc
```

Adicione a seguinte linha, que é o caminho para aonde foi instalado o ibis, no final do arquivo aberto com o comando anterior (substituindo 'seu_usuario' pelo usuario que instalou o ibis): 
```
export ibis="/home/seu_usuario/.config/composer/vendor/themsaid/ibis/ibis"
```

#### 2.6 Site

No .env é necessário adicionar o caminho da pasta que ficarão armazenados os sites, então em  'PATH_TO_STORE_SITES' coloque tal caminho, exemplo:

```
PATH_TO_STORE_SITES=/home/seu_usuario/Documents/Sites/
```

#### 2.7 Credentials do Google


O Maker possui integração com o Google Drive, mas para que a integração funcione corretamente é necessário gerar e adicionar um arquivo de credenciais na pasta `config/google`. Para gerar este arquivo é necessário realizar autenticação com a conta cujo Drive será utilizado [neste link](https://console.developers.google.com/) e criar um novo projeto. Com o projeto criado basta acessar o Marketplace (presente no menu lateral) e buscar pela "Google Drive API", acessá-la e clicar no botão "ativar".

Depois que a ativação é concluída basta acessar a página da API e clicar em "Credenciais" no menu lateral, em seguida em "Criar credenciais" e "ID do cliente OAuth". Nesse momento pode ser necessário configurar a tela de permissão OAuth, para isso basta seguir o passo a passo inserindo as configurações desejadas. Com a tela de permissão configurada basta criar o ID do cliente OAuth, como URL de redirecionamento é possível utilizar a url `https://developers.google.com/oauthplayground/`. Depois de gerar o ID do cliente OAuth é possível fazer o download do JSON com as credenciais por meio da página de credenciais.

Com o JSON em mãos basta salvá-lo na pasta `config/google` com o nome `credentials.json`. Depois desses passos ao tentar gerar um livro digital pela primeira vez aparecerá um erro com um link de redirecionamento, acesse o link e após entregar a permissão de acesso, basta pegar o código que aparecerá na tela e colocar em `GOOGLE_VERIFICATION_CODE` no arquivo .env.



### 3. Utilizacão

#### 3.1 Rodando o projeto

Depois de seguir todos os passos de instalação, inicie o servidor do Laravel:

```
php artisan serve
```
Após isso a aplicação estará rodando na porta 8000 e poderá ser acessada em [localhost:8000](http://localhost:8000).


Também é necessário rodar a fila de jobs do Laravel em outro terminal, então abra um novo terminal e rode:

```
php artisan queue:work
```

#### 3.2 Utilização da API

Se você utilizar a API dessa aplicacão, todos endpoints estarão acessivel em `/api`, por exemplo [localhost:8000/api](http://localhost:8000/api). Os endpoints que precisam de uma chave de autenticação devem ser utilizar o seguinte cabeçalho HTTP:

```
Authorization: Bearer XXX
```

onde `XXX` é o valor da sua chave de acesso (api token do Jetstream), por exemplo `c08cbbfd6eefc83ac6d23c4c791277e4`.
Abaixo está um exemplo de requisição para o endpoint `user` utilizando a chave de acesso acima:

```bash
curl -H 'Accept: application/json' -H "Authorization: Bearer c08cbbfd6eefc83ac6d23c4c791277e4" http://localhost:8080/api/user
```

## 🤝 Contribua

Sua ajuda é muito bem-vinda, independente da forma! Confira o arquivo [CONTRIBUTING.md](CONTRIBUTING.md) para conhecer todas as formas de contribuir com o projeto. Por exemplo, [sugerir uma nova funcionalidade](https://github.com/ccuffs/template/issues/new?assignees=&labels=&template=feature_request.md&title=), [reportar um problema/bug](https://github.com/ccuffs/template/issues/new?assignees=&labels=bug&template=bug_report.md&title=), [enviar um pull request](https://github.com/ccuffs/hacktoberfest/blob/master/docs/tutorial-pull-request.md), ou simplemente utilizar o projeto e comentar sua experiência.

Veja o arquivo [ROADMAP.md](ROADMAP.md) para ter uma ideia de como o projeto deve evoluir.


## 🎫 Licença

Esse projeto é licenciado nos termos da licença open-source [MIT](https://choosealicense.com/licenses/mit) e está disponível de graça.

## 🧬 Changelog

Veja todas as alterações desse projeto no arquivo [CHANGELOG.md](CHANGELOG.md).

## 🧪 Links úteis

Abaixo está uma lista de links interessantes e projetos similares:

* [Universidade Federal da Fronteira Sul](https://www.uffs.edu.br)
* [Programa Practice](https://practice.uffs.cc)
