sms
===

This service can send sms from

1. sms.ru [http://sms.ru]
2. prostor-sms.ru [http://prostor-sms.ru]
3. iqsms.ru [http://iqsms.ru]


Bulding Project
===
1. clone project
2. download composer( for example "php -r "readfile('https://getcomposer.org/installer');" | php )
3. php composer.phar install
3. cp src/SmsBundle/Resources/config/parameters.yml.dist src/SmsBundle/Resources/config/parameters.yml
4. In src/SmsBundle/Resources/config/parameters.yml create your configuration
5. bin/console server:start {IP:port}

Developers
===
Method for create own class

1. Create Dir In src/SmsBundle/Modules/Sms with your module
2. Craete 3 classes in this directory, manager, message, subscriber extends it from abstract class
3. Create you configuration in parametrs.yml( parametrs.yml.dist )
4. Add Your Manager class to SmsManagerFactory



