# Paramétrer serveur local pour envoyer des mails
1. Avoir une boite mail **gmail**
2. Utilisation de la fonction **mail()** de PHP 7.33.3
3. Configuration de wamp

## Fichier Fake Send Mail
- Il suffit de télécharger et extraire le contenu du dossier Fake SendMail. 
- Il faut ensuite placez sont contenue dans le dossier racine de wamp : **C:/Wamp/sendmail**
- Configurer le fichier **sendmail.ini** avec vos informations :<br>
[sendmail] <br>
smtp_server=smtp.gmail.com <br>
smtp_port=587 <br>
default_domain=gmail.com <br>
error_logfile=error.log <br>
auth_username=********@gmail.com <br>
auth_password=****** <br>
pop3_server= <br>
pop3_username= <br>
pop3_password= <br>
force_sender=****@gmail.com <br>
force_recipient= <br>
hostname=<br>

## Fichier php.ini
Editez le fichier **php.ini** et chercher la varaible **[mail function]** pour y indiquez le chemin vers l'éxécutable sendmail.exe :<br>
SMTP=smtp.gmail.com<br>
smtp_port=587<br>
sendmail_from = VotreGmailId@gmail.com<br>
sendmail_path = "\"C:\wamp64\sendmail\sendmail.exe\" -t"<br>

## Redémarrez wamp
Redémarrez wamp et le tour est joué !