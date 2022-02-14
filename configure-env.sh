#!/usr/bin/env bash

## docker y docker-compose

sudo apt-get update
sudo apt-get install  ca-certificates curl gnupg lsb-release
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
echo \
   "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu \
    $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt-get update
sudo apt-get install docker-ce docker-ce-cli containerd.io
sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose


#GIT
sudo apt-get update
sudo apt-get install git

#PHP 7.4, Composer y otras librerías relacionadas

sudo apt-get update
sudo apt install php7.4 php7.4-cli php7.4-fpm php7.4-json php7.4-pdo php7.4-pgsql php7.4-zip php7.4-gd php7.4-ctype php7.4-tokenizer php7.4-xsl php7.4-mbstring php7.4-curl php7.4-xml php7.4-amqp php7.4-intl php-pear php-bcmath openssl
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/bin/composer

#symfony-cli

echo 'deb [trusted=yes] https://repo.symfony.com/apt/ /'| sudo tee /etc/apt/sources.list.d/symfony-cli.list
sudo apt update
sudo apt install symfony-cli
symfony server:ca:install