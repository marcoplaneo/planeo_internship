# PHP

- general purpose scripting language
- for web development
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
- need NGINX server block and FPM pool (or other pool)
- to save data from webserver, database is needed