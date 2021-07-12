# Deployment  
  
## have needed accounts  
  
### gmail  
(note you may use other mailing providers)  
(also make sure used ports here are open)  
Under Google Settings:  
Allow less secure apps  
Setup 2-f authentication  
Generate single use password  
Fill .env  
MAIL_HOST=smtp.googlemail.com  
MAIL_PORT=465  
MAIL_USERNAME=dlg@tlu.ee  
MAIL_PASSWORD=null  
MAIL_ENCRYPTION=ssl  
MAIL_FROM_ADDRESS=dlg@tlu.ee  
  
### reCaptcha  
Setup recaptcha v3 account  
https://g.co/recaptcha/admin/  
Fill .env  
GOOGLE_RECAPTCHA_KEY="..."  
GOOGLE_RECAPTCHA_SECRET="..."  

### database  
Fill .env  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=methodyca  
DB_USERNAME=root  
DB_PASSWORD=  
  
### Redis and MEMCACHED  
Filling optional in .env  
  
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
  
## For first install  
### copy project  
php artisan down  
download https://github.com/ParadineG/Methodyca and upload to web  
(htdocs must be public folder)  
Find .env.example in Methodyca folder  
Fill it with accounts access data and save as .env file  
On update simply overwrite .env file  
  
### setup server  
composer install --no-dev --no-interaction --no-plugins --no-scripts --no-progress --optimize-autoloader  
composer dump-autoload  
php artisan key:generate  
php artisan migrate --force  
php artisan route:clear  
php artisan config:clear  
php artisan view:clear  
npm install  
npm run prod  
php artisan up  

## For updates
### copy project  
php artisan down  
npm install -g npm
download https://github.com/ParadineG/Methodyca and upload to web  
(htdocs must be public folder) by replacing old files
Update .env file only if needed
  
### setup server  
composer install --no-dev --no-interaction --no-plugins --no-scripts --no-progress --optimize-autoloader  
composer dump-autoload  
php artisan route:clear  
php artisan config:clear  
php artisan view:clear  
npm install  
npm run prod  
php artisan up  

## User creation  
### Create required users  
Created needed users under /methodyca/admin  
  
### Remove registration  
Under config/fortify.php comment out:  
Features::registration(),  
