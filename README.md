# Athena BDD Test (Page-Object-Model)
#### Pre-installed dependencies
```$ sudo apt-get install git```
<br>
```$ sudo apt install docker.io```
<ul>
    <li> Git (refer to: https://tinyurl.com/k9spv9w) 
    <li> Docker (refer to: https://tinyurl.com/y6utrqrz)
</ul>

1. Clone athena repo: <br>
```$ git clone https://github.com/athena-oss/athena.git``` <br>
2. run <code background-color="black">```$ ./athena init```</code> under athena project root dir to check if all dependencies is already installed <br>
``` - Follow the ATHENA instruction to make ATHENA global``` <br>
``` - Restart your terminal ``` <br>
<b>OR Add following to bash_profile</b><br>
```a. $ vi ~/.bash_profile``` (Mac User) , ```vi ~/.bashrc``` (Linux User) <br>
```b. add the following at the end of line``` <br>
      ```export ATHENA_HOME=/<installation location>/athena``` <br>
      ```export PATH=${PATH}:$ATHENA_HOME``` <br>
```c. Restart your terminal ``` <br>
``` To check of athena is already recognized type``` <code>```athena init```</code>
3. Install the following plugins under athena project <br>
<b>PROXY:</b> <code>```$ athena plugins install proxy https://github.com/athena-oss/plugin-proxy.git``` </code><br>
<b>SELENIUM:</b> <code>```$ athena plugins install selenium https://github.com/athena-oss/plugin-selenium.git``` </code><br>
<b>PHP:</b> <code>```$ athena plugins install php https://github.com/athena-oss/plugin-php.git``` </code><br>
4. Start proxy plugin <br>
<code>```$ athena proxy start``` </code>
5. Start selenium-hub <br>
<code>```$ athena selenium start hub <version>``` </code> ```ex. athena selenium start hub 3.1```
6. Start selenium-node multiple instances <br>
<code>```$ athena selenium start chrome-debug <version> -p 6003-6004:5900 --instances=2``` <br>
```ex. athena selenium start chrome-debug 3.1 -p 6003-6004:5900 --instances=2```
7. Clone athena-olxph <br>
```$ git clone https://github.com/magagan/example-athena-test.git```
8. Run a bdd test<br>
```
$ ./athena php bdd ../example-athena-test ../example-athena-test/athena.json --browser=chrome
  
  Executing specific test:
  add @tags
  
$ ./athena php bdd ../example-athena-test ../example-athena-test/athena.json --browser=chrome --tags=@homepage

  parallel-run
  
$ ./athena php bdd ../example-athena-test/ ../example-athena-test/athena.json --browser=chrome --parallel-process=2
   
With added args when running chrome nodes to avoid page-crash in chrome
  athena selenium start chrome-debug 3.1 -p 6001-6002:5900 --instances=2 --env DBUS_SESSION_BUS_ADDRESS=/dev/null -v /dev/shm:/dev/shm -t -d -P
  ```  
  Usage
  ```
$ athena php bdd <tests-directory> <config-file> [<options>...] [<behat-options>...]
  
      <tests-directory>                   This directory will be mounted inside the docker container. Behat will be executed inside this directory
      <config-file>                       Athena config file, with proxy configurations, grid options, etc
      [--browser=<name>]                  Browser name to be used. Such as firefox, phantomjs, or chrome
      [--parallel-process=<number>]       Number of scenarios, of a single feature, to be ran in parallel
      [--parallel-features=<number>]      Number of features to be ran in parallel. This can be used with --parallel-process to achieve the best results
      [--php-version=<version>]           Switch between available PHP versions. E.g. --php-version=7.0
      [--override-athena-dependencies]    Override PHP plugin dependencies with the ones found inside the tests directory
      [--restore-athena-dependencies]     Restore PHP plugin original dependencies
  
  You can also use the following athena flags :
      --athena-dbg                                     Enables the debug mode.
      --athena-env=<name|file_with_environment_config> Specifies the environment to be used.
      --athena-dns=<nameserver_ip>                     Specifies which nameserver will be used in the container.
      --athena-no-logo                                 Suppresses the logo.
      
   ```    
  <ul>
   <li><b>PhantomJs Version</b> - <a href="https://hub.docker.com/r/akeem/selenium-node-phantomjs/tags/">Click Me!</a>
   <li><b>Selenium Hub and Nodes Version</b> - <a href="https://hub.docker.com/u/selenium/">Click Me!</a>

For more documentation kindly visit this <a href="https://github.com/athena-oss/plugin-php/tree/master/docs"> Link! </a> <br>

