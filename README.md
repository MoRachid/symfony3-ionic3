# Symfony 3.4 & Ionic 3 

# Installation

Follow these steps :

    1 Clone or Download the Project
        $ git clone https://github.com/wiselh/Symfony3-Ionic3.git
    
    2 installation de base de données
    
    $ cd backend then $ php bin/console doctrine:database:create
    $ php bin/console doctrine:schema:update --force
    $ php bin/console doctrine:fixtures:load this command will create the first user : username = admin & password = 1234
    
    3 Enfin exécuter les applications
    
    $ php bin/console serve:run
    ionic serve -l


