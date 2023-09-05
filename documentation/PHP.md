# PHP

- general purpose scripting language
- for web development
- built-in server
  - single-threaded (execute only one request at a time)
- usually processed on webserver by PHP interpreter
- PHP interpreter can be implemented as:
    - module
    - daemon
    - Common Gateway Interface (CGI)
- whole or part of HTTP response
- can be used outside of web (for example robotic drone control)
- extra programme needed for PHP-process and as bridge between PHP-interpreter and webserver
- data can be saved on database

## PHP with NGINX

- PHP-FPM (FastCGI Process Manager) faster than traditional CGI based methods for running PHP script
  - can execute multiple requests at once through workers
    - one worker can only execute one request at a time
  - can not manage HTTP traffic, therefore webserver as reverse proxy is needed (NGINX)
- need NGINX server block and FPM pool (or other pool)
  - usually separate pools are created (for better control over resource allocation to each FPM process)
    - they will run independent by creating own master process
      - own cache settings
    - one pool can be configured without affecting others
- to save data from webserver, database is needed