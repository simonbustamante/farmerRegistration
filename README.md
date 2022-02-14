# Instalación de herramienta y generación datos B2B

La herramienta y scripts descritos a continuación son un desarrollo propio basado en el modelo entidad – relación del punto 3.1 para poder simular la base de datos B2B, ya que la original no puede ser mostrada ni a la ORGANIZACION ni a otra entidad distinta al CLIENTE debido a la confidencialidad de esta. En todo caso, el modelo de datos representa lo más aproximado al sistema B2B que tiene el CLIENTE en producción.

## Requisitos

    1) Computador con procesador i7 de 5ta generación en adelante (Recomendado)
    2) Memoria RAM 32GB
    3) Sistema Operativo Linux Ubuntu 20.04 LTS
    
## Configuración del Ambiente

### Instalar Docker  y Docker Compose

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
    
### Instalar Git

    sudo apt-get update
    sudo apt-get install git

### Instalar PHP 7.4, Composer  y otras librerías relacionadas

      sudo apt-get update
      sudo apt install php7.4 php7.4-cli php7.4-fpm php7.4-json php7.4-pdo php7.4-pgsql php7.4-zip php7.4-gd php7.4-ctype php7.4-tokenizer php7.4-xsl php7.4-mbstring php7.4-curl php7.4-xml php7.4-amqp php7.4-intl php-pear php-bcmath openssl
      php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
      php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
      php composer-setup.php
      php -r "unlink('composer-setup.php');"
      sudo mv composer.phar /usr/bin/composer

### Instalar Symfony CLI

        echo 'deb [trusted=yes] https://repo.symfony.com/apt/ /'| sudo tee /etc/apt/sources.list.d/symfony-cli.list
        sudo apt update
        sudo apt install symfony-cli
        symfony server:ca:install

### Clonar proyecto

        git clone https://github.com/simonbustamante/farmerRegistration.git

### Instalar herramienta

        cd farmerRegistration
        composer install
        
### Iniciar Herramienta

        docker-compose up -d
        symfony server:start -d
        symfony console doctrine:migrations:migrate -n
        symfony console doctrine:fixtures:load -n
        
En este punto, se debe esperar aproximadamente 30 minutos dependiendo de la máquina computadora, ya que  la data se encontrará cargando en las tablas de la base de datos y se mostrará en líne de comandos la entidades que se encuentran cargadas.  Finalmente de querer manipular algun dato de forma manual, puede acceder a la siguiente direccion en el navegador web https://127.0.0.1:8000/admin. 

### Detener herramienta

        docker-compose down

### Logs mostrados durante la carga masiva

     > purging database
       > loading App\DataFixtures\LocationFixtures
       > loading App\DataFixtures\GroupFixtures
       > loading App\DataFixtures\AppFixtures
       > loading App\DataFixtures\FarmerRegisterFixtures
       > loading App\DataFixtures\MayaniLoanProductFixtures
       > loading App\DataFixtures\FarmFixtures
       > loading App\DataFixtures\ActivityFixtures
       > loading App\DataFixtures\ProductFixtures
       > loading App\DataFixtures\FarmInventoryFixtures
       > loading App\DataFixtures\InventoryUpdateFixtures
       > loading App\DataFixtures\MayaniRequestInventoryFixtures
       > loading App\DataFixtures\FarmerBalanceFixtures
       > loading App\DataFixtures\FarmerLoanFixtures
       > loading App\DataFixtures\LoanPaymentFixtures
       > loading App\DataFixtures\MayaniProductInventoryFixtures
       > loading App\DataFixtures\B2CProductrequestFixtures

