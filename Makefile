include .env

# make help
help:
	@echo ""
	@echo "usage: make COMMAND"
	@echo ""
	@echo "Commands:"
	@echo "  init                                     Init skeleton settings"
	@echo "  help                                     List of all commands in make file"
	@echo "  clear-all-logs                           Clear all logs in folder /logs"
	@echo "  clear-logs-in folder=[FOLDER]            Clear logs in folder"
	@echo "  watch-log logFilePath=[PATH TO LOG FILE] Watch log file"

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