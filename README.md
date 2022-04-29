# Lamp Docker skeleton PHP + Nginx + Mysql + Redis
![](https://img.shields.io/github/issues/krepysh-spec/lamp-docker-php-skeleton) ![](	https://img.shields.io/github/forks/krepysh-spec/lamp-docker-php-skeleton) ![](	https://img.shields.io/github/stars/krepysh-spec/lamp-docker-php-skeleton) ![](https://img.shields.io/github/license/krepysh-spec/lamp-docker-php-skeleton) 

Stop installing the entire development stack on your local machine. This project will allow you to quickly start working with php.
To install, you need to install docker locally.

### Features
- Simple and clear project structure;
- Php the latest version 8.1 (can be changed if you need);
- All necessary php extensions including composer and xDebug3;
- Output all necessary logs (nginx, php, mysql, redis), including slow mysql queries;
- Supervisor and cron support
- Quick, easy setup for everything you need
- Lots of useful examples

### How start work
First make sure you have [Docker](https://docs.docker.com/get-docker/) installed locally.

1. Clone current project:

   `git clone https://github.com/krepysh-spec/lamp-docker-php-skeleton.git && cd lamp-docker-php-skeleton`
2. Create .env file from .env_example:

   `cp .env_example .env` and fill configuration in .env file

3. `docker-compose build && docker-compose up` and after open in browser [http://localhost](http://localhost)

### Support

For support, email evgeniymykhalichenko@gmail.com or telegram @krep1sh

### License

MIT