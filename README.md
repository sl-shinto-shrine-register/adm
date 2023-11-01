# Admin interface of the Second Life Shinto shrine register (SLSR)

## Table of Contents
- [About](#about)
- [Contribution](#contribution)
  - [Quick start](#quick-start)
  - [IDE](#ide)
  - [Dependency orcestration](#dependency-orcestration)
- [License](#license)

## About
This project is an temporary solution to simplify the maintenance of the database.

## Contribution
Feel free to open pull requests.

### Quick start
```bash
cp .env.dev .env
docker compose up -d
```

### IDE
VSCode/[VSCodium](https://vscodium.com) with the following extensions:
- [Markdown All in One](https://marketplace.visualstudio.com/items?itemName=yzhang.markdown-all-in-one): Readme TOS generation

### Dependency orcestration
This project uses [Composer](https://getcomposer.org).
You may use the latest [Docker](https://www.docker.com) image:
```bash
docker pull composer/composer
docker run --rm -it -v "$(pwd)/app:/app" composer/composer install
```

## License
This Software is free under the terms of the [**GNU Affero General Public License v3 or later**](https://www.gnu.org/licenses/agpl-3.0.html).
