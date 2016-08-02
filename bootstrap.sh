#Переменные
sudo add-apt-repository "deb http://archive.ubuntu.com/ubuntu $(lsb_release -sc) main"
sudo add-apt-repository "deb http://archive.ubuntu.com/ubuntu $(lsb_release -sc) universe"
sudo apt-get -y update
sudo apt-get install -y apache2

if ! [ -L /var/www ]; then
  sudo rm -rf /var/www
  sudo ln -fs /vagrant /var/www
fi

sudo chown -R root:root /var/www
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password theone'
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password theone'


sudo apt-get -y install mysql-server libapache2-mod-auth-mysql php5-mysql
sudo apt-get -y install php5 libapache2-mod-php5 php5-mcrypt
sudo apt-get -y install php5-gd
sudo apt-get -y install php5-intl
sudo add-apt-repository -y ppa:git-core/ppa
sudo apt-get -y update
sudo apt-get -y dist-upgrade
sudo apt-get -y install git

#composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo cp -r /vagrant/.composer/ ~/.composer
sudo chmod -R 777 ~/.composer
#github token
# composer config github-oauth.github.com '0942384ae56ded962f6ee1f09782771c8383caaf'

composer global require fxp/composer-asset-plugin
composer create-project  yiisoft/yii2-app-advanced /vagrant/the-one

#website init
sudo a2enmod rewrite
sudo cp /vagrant/conf/the-one.conf /etc/apache2/sites-available
sudo cp /vagrant/conf/bck.the-one.conf /etc/apache2/sites-available
sudo cp /vagrant/conf/sandstorm.the-one.conf /etc/apache2/sites-available
sudo a2ensite the-one.conf
sudo a2ensite bck.the-one.conf
service apache2 reload
sudo service apache2 restart
echo '127.0.0.1  the-one.rcl bck.the-one.rcl sandstorm.the-one.rcl' | sudo tee --append /etc/hosts
cd /var/www/the-one
composer install