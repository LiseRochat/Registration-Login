### Paramétrer serveur local pour envoyer des mails
1. Avoir une boite mail **gmail**
2. Utilisation de la fonction **mail()** de PHP 7.33.3
3. Configuration de wamp

## Fichier Fake Send Mail
- Il suffit de télécharger et extraire le contenu du dossier Fake SendMail. 
- Il faut ensuite placez sont contenue dans le dossier racine de wamp : **C:/Wamp/sendmail**
- Configurer le fichier **sendmail.ini** avec vos informations :
[sendmail] 
smtp_server=smtp.gmail.com 
smtp_port=587 
default_domain=gmail.com 
error_logfile=error.log 
auth_username=********@gmail.com 
auth_password=****** 
pop3_server= 
pop3_username= 
pop3_password= 
force_sender=****@gmail.com 
force_recipient= 
hostname=

## Fichier php.ini
Editez le fichier **php.ini** et chercher la varaible **[mail function]** pour y indiquez le chemin vers l'éxécutable sendmail.exe :
SMTP=smtp.gmail.com
smtp_port=587
sendmail_from = VotreGmailId@gmail.com
sendmail_path = "\"C:\wamp64\sendmail\sendmail.exe\" -t"

## Redémarrez wamp
Redémarrez wamp et le tour est joué !