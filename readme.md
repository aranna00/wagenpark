# Project wagenpark
###### door Aran Kieskamp
------

Installatie:

benodigd heden:

- [composer](https:://getcomposer.org/)
- een sql server
- php5.5/hoger of een webserver

1. U moet aan de rechterkant van mijn [github page](https://github.com/aranna00/wagenpark) op download ZIP klikken
2. Pak de [zip](https://github.com/aranna00/wagenpark/archive/master.zip) uit, dit hoeft niet in uw www map
3. Maak een database aan en zet de naam+wachtwoord in **/app/config/database.php**
 * of maak een database 'wagenpark' aan met het wachtwoord 'Nyc9A4sHWYmUAGMW'
4. Voer daarna in de uitgepakte folder **composer update** uit
5. voer **php artisan migrate --seed** uit
6. als u een eigen webserver heeft kunt u die gebruiken, anders, als u php5.5 of hoger heeft, kunt u **php artisan serve** uitvoeren.
   deze kunt u bereiken met localhost:8000