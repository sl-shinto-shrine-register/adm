# Admin interface of the Second Life Shinto shrine register (SLSR)

## Table of Contents
- [About](#about)
- [Contribution](#contribution)
  - [Quick start](#quick-start)
  - [IDE](#ide)
  - [Dependency orcestration](#dependency-orcestration)
- [Deployment](#deployment)
- [License](#license)

## About
This project is an temporary solution to simplify the maintenance of the database.

## Contribution
Feel free to open pull requests.

### Quick start
1. Copy the complete SQL data dumps into `data/*.sql`.
2. Use the development environment variables:
    ```bash
    cp .env.dev .env
    ```
3. Build and start all [Docker](https://www.docker.com) container 
    ```bash
    docker compose up -d
    ```

### IDE
VSCode/[VSCodium](https://vscodium.com) with the following extensions:
- [PHP Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client): PHP language support
- [Markdown All in One](https://marketplace.visualstudio.com/items?itemName=yzhang.markdown-all-in-one): Readme TOS generation
- [SQLTools](https://marketplace.visualstudio.com/items?itemName=mtxr.sqltools): SQL client
- [SQLTools MySQL/MariaDB/TiDB](https://marketplace.visualstudio.com/items?itemName=mtxr.sqltools-driver-mysql): MariaDB driver for the SQL client

### Dependency orcestration
This project uses [Composer](https://getcomposer.org).
You may use the latest [Docker](https://www.docker.com) image:
```bash
docker pull composer/composer
docker run --rm -it -v "$(pwd)/app:/app" composer/composer install
```

## Deployment
Please take the `.env.prod` as an reference and change the `MARIADB_ROOT_PASSWORD` environment variable to an secure random passphrase by using:
```bash
openssl rand -base64 48
```

## License
This Software is free under the terms of the [**GNU Affero General Public License v3 or later**](https://www.gnu.org/licenses/agpl-3.0.html).
