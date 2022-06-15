# Setup xDebug in phpStorm

### Let's debugging
- Here we want to configure our PHP docker interpreter. a. Go to ***Preferences > PHP***, add new interpreter, select new interpreter from Docker, vagrant, etc...
  ![Alt Text](media/xdebug/xdebug1.png)
  ![Alt Text](media/xdebug/xdebug2.png)

- Create new Server.
  ![Alt Text](media/xdebug/xdebug3.png)
  ![Alt Text](media/xdebug/xdebug4.png)

- After selecting an Interpreter, we are going to map our working project with container path,
  my working project path is $HOME/Projects/terragrunt
  docker and I will map into ***.env > DOCKER_WORK_DIR***,
  so change the Docker container value:
  ![Alt Text](media/xdebug/xdebug5.png)

- This the result :
  ![Alt Text](media/xdebug/xdebug6.png)

### Xdebug configuration.
- Go to ***Preferences > PHP > Debug***, set like this:
  ![Alt Text](media/xdebug/xdebug7.png) 
- Go to ***Preferences > PHP > Debug > Dbgp Proxy***, set like this (note: IDE Key must same with the value of xdebug.idekey on php.ini):
  ![Alt Text](media/xdebug/xdebug8.png)
- Go to ***Run > Edit Configurations...***, create a new PHP Remote Debug configuration:
  ![Alt Text](media/xdebug/xdebug9.png)
  ![Alt Text](media/xdebug/xdebug10.png)
- Go to ***Run > Web Server Debug Validation***, on Path to create validation script I point the value into my public path of project, and URL to validation script I point to my nginx docker host.
  ![Alt Text](media/xdebug/xdebug11.png)
  
### EXECUTE!
- Set breakpoint, and turning on Start Listening for PHP Debug Connection
  ![Alt Text](media/xdebug/xdebug12.png)
  ![Alt Text](media/xdebug/xdebug13.png)
- Go to ***Run > Debug*** then select the configuration what we made earlier (PHP Remote Debug):
  ![Alt Text](media/xdebug/xdebug14.png)
- Go to your endpoint, and add query string with parameter ***XDEBUG_SESSION_START*** and the value is your IDE Key, then execute!
  ![Alt Text](media/xdebug/xdebug15.png)
- Or if you need debugging in browser use this extension - [Xdebug helper](https://chrome.google.com/webstore/detail/xdebug-helper/eadndfjplgieldjbigjakmdgkmoaaaoc)
    

  