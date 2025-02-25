#!/bin/bash

# Atualiza e instala pacotes básicos
echo "Atualizando pacotes e instalando dependências..."
apt update -y && apt upgrade -y
apt install -y curl git htop apache2 php mariadb-server

# Instala pacotes PHP adicionais, incluindo pacotes sugeridos
echo "Instalando extensões PHP necessárias e recomendadas..."
apt install -y php-curl php-mysql php-zip php-common php-sqlite3 php-soap php-cli php-mbstring php-imap php-bcmath php-xmlrpc php-pear php-gd php-intl php-xml php-json php-xdebug

# Reinicia serviços para aplicar configurações
echo "Reiniciando Apache e MariaDB..."
service apache2 restart
service mariadb restart

# Permissões para o diretório web
echo "Ajustando permissões do diretório web..."
chmod 777 -R /var/www/html/

# Configuração do PHP (substitua '8.1' pela sua versão do PHP, se necessário)
PHP_VERSION=$(php -r "echo PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;")
PHP_INI_FILE="/etc/php/$PHP_VERSION/apache2/php.ini"

if [[ -f "$PHP_INI_FILE" ]]; then
  echo "Configurando $PHP_INI_FILE..."
  sed -i 's/display_errors = .*/display_errors = On/' "$PHP_INI_FILE"
  echo 'open_basedir = "/var/www/includes:/var/www/html"' >> "$PHP_INI_FILE"
  echo '[XDebug]
xdebug.mode=debug
xdebug.start_with_request=yes
xdebug.discover_client_host=1
xdebug.client_host=localhost
xdebug.port=9003
xdebug.connect_timeout_ms=2000' >> "$PHP_INI_FILE"
else
  echo "Arquivo php.ini não encontrado. Verifique a versão do PHP instalada."
fi

# Configurações do sudoers
echo "Configurando permissões no sudoers para Apache e MariaDB..."
{
  echo "%sudo ALL=(ALL) NOPASSWD: /usr/sbin/service mariadb *"
  echo "%sudo ALL=(ALL) NOPASSWD: /usr/sbin/service apache2 *"
} | EDITOR='tee -a' visudo

# Configuração do MySQL automatizada com senha para o root
echo "Executando configuração segura do MySQL com senha para o root..."

# Substitua 'qwe123!' pela senha desejada para o usuário root do MySQL.
MYSQL_ROOT_PASSWORD="qwe123!"

mysql -u root <<EOF
-- Configura o usuário root para autenticação por senha
ALTER USER 'root'@'localhost' IDENTIFIED BY '${MYSQL_ROOT_PASSWORD}';
-- Permite acesso remoto para o usuário root com a mesma senha
GRANT ALL PRIVILEGES ON . TO 'root'@'%' IDENTIFIED BY '${MYSQL_ROOT_PASSWORD}' WITH GRANT OPTION;
-- Remove usuários anônimos
DELETE FROM mysql.user WHERE User='';
-- Remove o banco de dados de teste e suas permissões
DROP DATABASE IF EXISTS test;
DELETE FROM mysql.db WHERE Db='test' OR Db='test\\_%';
-- Atualiza as permissões
FLUSH PRIVILEGES;
EOF

echo "Ambiente configurado com sucesso! A senha do root do MySQL foi definida e o acesso remoto está configurado."
