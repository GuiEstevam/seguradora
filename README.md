# Seguradora - Sistema de Gerenciamento

Sistema web desenvolvido em Laravel para gerenciamento de pesquisas, usuários, empresas, veículos, CNH e processos relacionados ao segmento de seguradoras.

## Índice

- [Visão Geral](#visão-geral)
- [Funcionalidades](#funcionalidades)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Instalação](#instalação)
- [Configuração](#configuração)
- [Como Usar](#como-usar)
- [Testes](#testes)
- [Estrutura de Pastas](#estrutura-de-pastas)
- [Scripts Úteis](#scripts-úteis)
- [Contribuição](#contribuição)
- [Licença](#licença)

---

## Visão Geral

Este projeto visa facilitar o controle de pesquisas e cadastros de usuários, empresas, veículos e processos, além de permitir consultas, exportação de dados e gerenciamento de permissões. O sistema possui interface web responsiva, integração com APIs externas (ex: ViaCEP), exportação para Excel e autenticação baseada em papéis.

## Funcionalidades

- Cadastro e gerenciamento de **Usuários** com papéis e permissões
- Cadastro e gerenciamento de **Empresas**
- Cadastro e gerenciamento de **Veículos**
- Cadastro e gerenciamento de **CNH** e processos
- **Pesquisas** unificadas e individuais (motorista, veículo, empresa, frota, agregado, autônomo)
- Exportação de pesquisas para **Excel**
- Máscaras e validações de campos (CPF, CNPJ, telefone, CEP)
- Consulta de endereço via **API ViaCEP**
- Interface de pesquisa com filtros dinâmicos
- Relatórios e renovação de registros
- Layout responsivo com **Bootstrap** e **TailwindCSS**
- Sistema de autenticação e autorização (Laravel Fortify)
- Seeders para popular o banco de dados com dados de exemplo

## Tecnologias Utilizadas

- [Laravel](https://laravel.com/) (PHP)
- [Bootstrap](https://getbootstrap.com/)
- [TailwindCSS](https://tailwindcss.com/)
- [Vite](https://vitejs.dev/)
- [jQuery](https://jquery.com/)
- [Composer](https://getcomposer.org/)
- [npm](https://www.npmjs.com/)
- [MySQL](https://www.mysql.com/) (ou outro banco suportado pelo Laravel)
- [PHPExcel/Laravel Excel](https://laravel-excel.com/) para exportação

## Instalação

1. Clone o repositório:
   ```sh
   git clone https://github.com/seu-usuario/seguradora.git
   cd seguradora
   ```

2. Instale as dependências PHP:
   ```sh
   composer install
   ```

3. Instale as dependências JavaScript:
   ```sh
   npm install
   ```

## Configuração

1. Copie o arquivo de exemplo de ambiente:
   ```sh
   cp .env.example .env
   ```

2. Configure as variáveis do `.env` (banco de dados, mail, etc).

3. Gere a chave da aplicação:
   ```sh
   php artisan key:generate
   ```

4. Execute as migrations e seeders:
   ```sh
   php artisan migrate --seed
   ```

## Como Usar

- Inicie o servidor de desenvolvimento:
  ```sh
  php artisan serve
  ```
- Acesse `http://localhost:8000` no navegador.

- Para compilar os assets:
  ```sh
  npm run dev
  ```

- Para compilar para produção:
  ```sh
  npm run build
  ```

## Testes

- Execute os testes automatizados:
  ```sh
  php artisan test
  ```
  ou
  ```sh
  ./vendor/bin/phpunit
  ```

## Estrutura de Pastas

- `app/Http/Controllers`: Controladores das rotas e regras de negócio
- `app/Models`: Modelos Eloquent (Usuário, Empresa, Pesquisa, etc)
- `app/Services`, `app/Helpers`, `app/Actions`: Lógicas auxiliares e serviços
- `resources/views`: Views Blade (interface web)
- `public/js`, `public/css`: Scripts e estilos customizados
- `routes/`: Definição das rotas web e API
- `database/seeders`: Seeders para popular o banco
- `config/`: Arquivos de configuração do Laravel e pacotes

## Scripts Úteis

- Rodar migrations: `php artisan migrate`
- Rodar seeders: `php artisan db:seed`
- Limpar cache: `php artisan cache:clear`
- Exportar pesquisas: botão "Excel" nas telas de pesquisa

## Contribuição

Contribuições são bem-vindas! Siga os passos:

1. Fork este repositório
2. Crie uma branch: `git checkout -b minha-feature`
3. Commit suas alterações: `git commit -m 'Minha feature'`
4. Push para o branch: `git push origin minha-feature`
5. Abra um Pull Request

## Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

> Projeto desenvolvido com Laravel e amor por tecnologia!
