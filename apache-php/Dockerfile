FROM centos:7.4.1708

USER root

RUN yum -y update

# 外部リポジトリ（EPEL, Remi）を追加
RUN yum -y install epel-release
RUN yum -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm

# apache その他 phpパッケージを導入
RUN yum -y install httpd
RUN yum -y install --enablerepo=remi,remi-php72 php php-cli php-common php-devel php-fpm php-gd php-mbstring php-pgsql php-pdo php-pear php-pecl-apcu php-soap php-xml php-xmlrpc php-zip 
RUN yum -y install zip unzip

# composerのインストール
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN curl -sL https://rpm.nodesource.com/setup_8.x | bash -
RUN yum install -y gcc-c++ make
RUN yum install -y nodejs

CMD ["/usr/sbin/httpd","-D","FOREGROUND"]

WORKDIR /var/www/html
