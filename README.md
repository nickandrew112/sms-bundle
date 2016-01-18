sms
===

This service can send sms from

1. sms.ru [http://sms.ru]
2. prostor-sms.ru [http://prostor-sms.ru]
3. iqsms.ru [http://iqsms.ru]


Bulding Project
===
1. clone project
2. cp src/SmsBundle/Resources/config/parametrs.yml.dist src/SmsBundle/Resources/config/parametrs.yml
3. In src/SmsBundle/Resources/config/parametrs.yml create your configuration
4. bin/console server:start {IP:port}

Developers
===
Method for create own class

1. Create Dir In src/SmsBundle/Modules/Sms with your module
2. Craete 3 classes in this directory, manager, message, subscriber extends it from abstract class
3. Create you configuration in parametrs.yml( parametrs.yml.dist )
4. Add Your Manager class to SmsManagerFactory



