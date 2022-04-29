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