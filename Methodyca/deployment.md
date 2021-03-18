# Deployment
## install software

### install curl

### install git

### install composer
Via powershell or putty on server:
ssh ...
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

### install nvm and node
You have to exit ssh after nvm installation
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.37.2/install.sh | bash
exit
ssh ...
nvm install 14 --latest-npm

## main install and update
### copy project
php artisan down
copy both folders
overwrite .env file

### setup server
composer install --no-dev --no-interaction --no-plugins --no-scripts --no-progress --optimize-autoloader
composer dump-autoload
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm install --production
npm run prod
php artisan up
