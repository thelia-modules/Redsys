# Redsys
----------

Ce module vous permet de proposer à vos clients le système de paiement Redsys.

## Installation

> Ce module requiert Thelia 2.2.0 au minimum

### Manuellement

Pour installer le module Redsys, il suffit d'envoyer l'archive depuis la page "Modules" de votre back-office.

Vous pouvez aussi décompresser l'archive dans `<racine de thelia>/local/modules`. Veillez à ce que le dossier porte le nom `Redsys` (et pas `Redsys-master`, par exemple).

### Composer

Ajoutez le module dans le fichier composer.json princopal de Thelia :

```
composer require thelia/redsys-module:~1.0
```

## Utilisation

Pour utiliser le module Redsys, vous devez tout d'abord le configurer. Pour ce faire, rendez-vous dans votre back-office, onglet Modules, et activez le module Redsys.

Cliquez ensuite sur "Configurer" sur la ligne du module, et renseignez les informations requises, que vous trouverez dans votre back-office Redsys.

Lors de la phase de test, vous pouvez définir les adresses IP qui seront autorisées à utiliser le module en front-office, afin de ne pas laisser vos clients payer leur commandes avec Redsys pendant la phase de test.

## Intégration en front-office

L'intégration est automatique, et s'appuie sur les templates standard.

----------

This module offers to your customers the Redsys payment system.

## Installation

> This module requires Thelia 2.2.0 or newer

To install the Redsys module, upload the archive from the "Modules" page of your back-office.

You could also uncompress the archive in the `<thelia root>/local/modules` directory. Be sure that the name of the module's directory is `Redsys` (and not `Redsys-master`, for exemple).

### Composer

Add it in your main thelia composer.json file

```
composer require thelia/redsys-module:~1.0
```

## Usage

You have to configure the Redsys module before starting to use it. To do so, go to the "Modules" tab of your Thelia back-office, and activate the Redsys module.

Then click the "Configure" button, and enter the required information, which are available in your Redsys back-office.

During the test phase, you can define the IP addresses allowed to use the Redsys module on the front office, so that your customers will not be able to pay with Redsys during this test phase. 

## Front-office integration

The front-office integration is automatic, as it relies on standard templates.
