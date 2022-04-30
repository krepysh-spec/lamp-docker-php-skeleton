# Lamp Docker skeleton PHP + Nginx + Mysql + Redis
![](https://img.shields.io/github/issues/krepysh-spec/lamp-docker-php-skeleton) ![](	https://img.shields.io/github/forks/krepysh-spec/lamp-docker-php-skeleton) ![](	https://img.shields.io/github/stars/krepysh-spec/lamp-docker-php-skeleton) ![](https://img.shields.io/github/license/krepysh-spec/lamp-docker-php-skeleton) 

Stop installing the entire development stack on your local machine. This project will allow you to quickly start working with php.
To install, you need to install docker locally.

### Features
- Simple and clear project structure;
- Php the latest version 8.1 (can be changed if you need);
- All necessary php extensions including composer and xDebug3;
- Output all necessary logs (nginx, php, mysql, redis, supervisor, cron), including slow mysql queries;
- Supervisor and cron support
- Quick, easy setup for everything you need
- Lots of useful examples

### What's inside

* [Nginx](http://nginx.org/)
* [MySQL](http://www.mysql.com/)
* [PHP-FPM](http://php-fpm.org/)
* [Redis](http://redis.io/)

### Requirements

* [Docker Engine](https://docs.docker.com/installation/)
* [Docker Compose](https://docs.docker.com/compose/)
* [Docker Machine](https://docs.docker.com/machine/) (Mac and Windows only)

### How start work

Clone current project:
```bash
git clone https://github.com/krepysh-spec/lamp-docker-php-skeleton.git && cd lamp-docker-php-skeleton
````
Create .env file from .env_example:
```bash
cp .env_example .env
````
Fill configuration in .env file
```bash
docker-compose build && docker-compose up
```

After open in browser [http://127.0.0.1/](http://127.0.0.1/)

### Support

For support, email evgeniymykhalichenko@gmail.com or telegram @krep1sh

### License

MIT