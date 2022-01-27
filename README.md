# Instalación de herramienta y generación datos B2B

La herramienta y scripts descritos a continuación son un desarrollo propio basado en el modelo entidad – relación del punto 3.1 para poder simular la base de datos B2B, ya que la original no puede ser mostrada ni a la Organización ni a otra entidad distinta a Mayani debido a la confidencialidad de esta. En todo caso, el modelo de datos representa lo más aproximado al sistema B2B que tiene Mayani.

## Requisitos

    1) Computador con procesador i7 de 5ta generación en adelante (Recomendado)
    2) Memoria RAM 32GB
    3) Sistema Operativo Linux Ubuntu 20.04 LTS
    
## Configuración del Ambiente

### Instalar Docker  y Docker Compose

    1) sudo apt-get update
    2) sudo apt-get install  ca-certificates curl gnupg lsb-release
    3) curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
    4) echo \
       "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu \
        $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
    5) sudo apt-get update
    6) sudo apt-get install docker-ce docker-ce-cli containerd.io
    7) sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
    8) sudo chmod +x /usr/local/bin/docker-compose
    
### Instalar Git

  1) sudo apt-get update
  2) sudo apt-get install git

### Instalar PHP 7.4, Composer  y otras librerías relacionadas

  1) sudo apt-get update
  2) sudo apt install php7.4 php7.4-cli php7.4-fpm php7.4-json php7.4-pdo php7.4-pgsql php7.4-zip php7.4-gd php7.4-ctype php7.4-tokenizer php7.4-xsl php7.4-mbstring php7.4-curl php7.4-xml php7.4-amqp php7.4-intl php-pear php-bcmath openssl
  3) php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
  4) php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
  5) php composer-setup.php
  6) php -r "unlink('composer-setup.php');"
  7) sudo mv composer.phar /usr/bin/composer

### Instalar Symfony CLI


### Clonar proyecto


### Iniciar herramienta y desplegar data


  
