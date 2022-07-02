#!make
-include .env

# set default command name
default: help

# set variables
DOCKER := docker
DOCKER_COMPOSE := docker-compose

# make help
help:
	@echo ""
	@echo "usage: make COMMAND"
	@echo ""
	@echo "Commands:"
	@echo "  init                                     Init skeleton settings"
	@echo "  help                                     List of all commands in make file"
	@echo "  install                                  Install application"
	@echo "  add-host                                 Add nginx host to /etc/hosts file"
	@echo "  bash                                     Exec backend container"
	@echo "  build                                    Build docker-compose"
	@echo "  build-no-cache                           Build docker-compose without cache"
	@echo "  up                                       Up with demon docker containers"
	@echo "  down                                     Down docker containers"
	@echo "  stop                                     Stop docker containers"
	@echo "  clear-all-logs                           Clear all logs in folder /logs"
	@echo "  clear-logs-in folder=[FOLDER]            Clear logs in folder"
	@echo "  watch-log logFilePath=[PATH TO LOG FILE] Watch log file"

# make init
init:
	@if [ ! -f ./.env ]; then \
		cp .env_example .env; \
	fi

	@if [ -f ./LICENSE ]; then \
		rm ./LICENSE; \
	fi

	@if [ -f ./.git ]; then \
		rm -rf ./.git; \
	fi

	@if [ -f ./install.sh ]; then \
		rm ./install.sh; \
	fi

# make install project
install: add-host build up
	@${DOCKER} exec -it "${DOCKER_PREFIX}-backend" composer install;

# add nginx host to /etc/hosts file
add-host:
	SERVICES=$$(command -v getent > /dev/null && echo "getent ahostsv4" || echo "dscacheutil -q host -a name"); \
	if [ ! "$$($$SERVICES $(NGINX_HOST) | grep 127.0.0.1 > /dev/null; echo $$?)" -eq 0 ]; then sudo bash -c 'echo "127.0.0.1 $(NGINX_HOST)" >> /etc/hosts; echo "Entry was added"'; else echo 'Entry already exists'; fi;

# exec docker backend container
bash:
	@${DOCKER} exec -it "${DOCKER_PREFIX}-backend" bash;

# build docker-compose
build:
	@${DOCKER_COMPOSE} build;

# build docker-compose without cache
build-no-cache:
	@${DOCKER_COMPOSE} build --no-cache;

# up with demon docker containers
up:
	@${DOCKER_COMPOSE} up -d;

# down docker containers
down:
	@${DOCKER_COMPOSE} up --volumes --rmi local --remove-orphans;

# stop docker containers
stop:
	@${DOCKER_COMPOSE} stop;

# make clear-all-logs
clear-all-logs:
	for log in logs/**/*.log; do \
  		cat /dev/null > $$log; \
	done

# make clear-logs-in folder=nginx
clear-logs-in:
	for log in logs/$(folder)/*.log; do \
  		cat /dev/null > $$log; \
	done

# make watch-log logFilePath=logs/nginx/backend-access.log
watch-log:
	tail -f $(logFilePath);