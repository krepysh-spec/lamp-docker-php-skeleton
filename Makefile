include .env

help:
	@echo ""
	@echo "usage: make COMMAND"
	@echo ""
	@echo "Commands:"
	@echo "  apidoc              Generate documentation of API"
	@echo "  code-sniff          Check the API with PHP Code Sniffer (PSR2)"
	@echo "  clean               Clean directories for reset"
	@echo "  composer-up         Update PHP dependencies with composer"
	@echo "  docker-start        Create and start containers"
	@echo "  docker-stop         Stop and clear all services"
	@echo "  gen-certs           Generate SSL certificates"
	@echo "  logs                Follow log output"
	@echo "  mysql-dump          Create backup of all databases"
	@echo "  mysql-restore       Restore backup of all databases"
	@echo "  phpmd               Analyse the API with PHP Mess Detector"
	@echo "  test                Test application"

# make init
init:
	cp .env_example .env;

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