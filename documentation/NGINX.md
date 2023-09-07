# NGINX

- open source and free
- biggest web server
- can be used as:
    - reverse proxy
    - load balancer
    - mail proxy
    - HTTP cache
- deployed to serve static or dynamic web content
- HTTP requests are handled by workers
  - one worker can handle multiple incoming client connections and requests at a time

# Config Structure

- different server blocks for server configuration
  - which port to listen to
  - server name
  - define root
  - location blocks
    - route requests to correct location

# My Code

```
# Default server configuration
server {
	listen 80;

	server_name internship.com www.internship.com;

	root /var/www/html;

	index index.php index.html index.htm shop.html;

	include /home/marco/dev/planeo_internship/*.html;

	location / {
		# First attempt to serve request as file, then
		# as directory, then fall back to displaying a 404.
		try_files $uri $uri/ =404;
	}

	# pass PHP scripts to FastCGI server
	location ~ \.php$ {
		include snippets/fastcgi-php.conf;
		fastcgi_pass unix:/run/php/php8.1-fpm.sock;
	}

	# deny access to .htaccess files, if Apache's document root
	location ~ /\.ht {
		deny all;
	}
}
```

- listen listens to a port (here: 80)
- named the server internship.com
- defined where root is
- include refers to where the website is saved
- try_files ...; tries to serve the request as different types (file, directories)
  - if this does not work error 404 is displayed
- location ~ \.php§ {...} is for PHP
  - it directs the PHP requests to the FastCGI server
- location ~ /\.ht {...} denies access to .ht files