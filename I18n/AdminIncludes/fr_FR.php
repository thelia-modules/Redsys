<?php

return array(
    '<ol>

                                        <li>

                                            L\'interface de génération de la clé secrète d\'authentification se trouve dans l\'onglet "Informations" du Back Office Commerçant de Redsys, en bas de la page.

                                        </li>

                                        <li>

                                            Le champ "Phrase de passe" peut être renseigné avec une phrase, un mot de passe, ou tout autre texte.

                                        </li>

                                        <li>

                                            L\'affichage par défaut du champ "Phrase de passe" est caché, les caractères apparaissent comme un champ "mot de passe". Il est possible de choisir d\'afficher cette phrase de passe en décochant la case "Cacher".

                                        </li>

                                        <li>

                                            Les champs "Complexité" et "Force" sont mis à jour automatiquement lorsque la phrase de passe est saisie. Ces champs permettent de définir des règles d\'acceptation minimales de la phrase de passe. Les règles fixées actuellement demandent une phrase de passe d\'au moins 15 caractères de long et d\'une force de 90%. Le bouton "VALIDER" restera grisé tant que ces limitations ne sont pas respectées.

                                        </li>

                                        <li>

                                            Le bouton "Générer une clé" permet de calculer la clé d\'authentification à partir de la phrase de passe saisie. Ce calcul est une méthode standard assurant le caractère aléatoire de la clé et renforçant sa robustesse. Cette méthode de calcul étant fixe, il est possible à tout moment de retrouver sa clé en retapant la même phrase de passe et en relançant le calcul.<br />

                                            Attention, il est possible que le calcul de la clé prenne quelques secondes, selon le navigateur Internet utilisé et la puissance de l\'ordinateur. Au cours du calcul, il se peut que votre navigateur demande s\'il faut "arrêter l\'exécution de ce script". Il faut répondre "Non" à cette alerte, et patienter jusqu\'à la fin du calcul.

                                        </li>

                                        <li>

                                            Après validation du formulaire, un message récapitulatif sera affiché sur la page, expliquant qu\'un email de demande de confirmation a été envoyé à l\'adresse mail du Commerçant. La clé qui vient d\'être générée ne sera pas active tant que les indications de validation décrites dans cet email n\'auront pas été appliquées.

                                        </li>

                                        <li>

                                            Il faut alors copier la clé d\'authentification qui se trouve dans le champ "Clé", et la coller dans le champ "Clef privée d\'échange" de la page de configuration du module Redsys (back office de Thelia -> Modules -> Redsys -> Configurer)

                                        </li>

                                    </ol>' => '<ol>                                        <li>                                            L\'interface de génération de la clé secrète d\'authentification se trouve dans l\'onglet "Informations" du Back Office Commerçant de Redsys, en bas de la page.                                        </li>                                        <li>                                            Le champ "Phrase de passe" peut être renseigné avec une phrase, un mot de passe, ou tout autre texte.                                        </li>                                        <li>                                            L\'affichage par défaut du champ "Phrase de passe" est caché, les caractères apparaissent comme un champ "mot de passe". Il est possible de choisir d\'afficher cette phrase de passe en décochant la case "Cacher".                                        </li>                                        <li>                                            Les champs "Complexité" et "Force" sont mis à jour automatiquement lorsque la phrase de passe est saisie. Ces champs permettent de définir des règles d\'acceptation minimales de la phrase de passe. Les règles fixées actuellement demandent une phrase de passe d\'au moins 15 caractères de long et d\'une force de 90%. Le bouton "VALIDER" restera grisé tant que ces limitations ne sont pas respectées.                                        </li>                                        <li>                                            Le bouton "Générer une clé" permet de calculer la clé d\'authentification à partir de la phrase de passe saisie. Ce calcul est une méthode standard assurant le caractère aléatoire de la clé et renforçant sa robustesse. Cette méthode de calcul étant fixe, il est possible à tout moment de retrouver sa clé en retapant la même phrase de passe et en relançant le calcul.<br />                                            Attention, il est possible que le calcul de la clé prenne quelques secondes, selon le navigateur Internet utilisé et la puissance de l\'ordinateur. Au cours du calcul, il se peut que votre navigateur demande s\'il faut "arrêter l\'exécution de ce script". Il faut répondre "Non" à cette alerte, et patienter jusqu\'à la fin du calcul.                                        </li>                                        <li>                                            Après validation du formulaire, un message récapitulatif sera affiché sur la page, expliquant qu\'un email de demande de confirmation a été envoyé à l\'adresse mail du Commerçant. La clé qui vient d\'être générée ne sera pas active tant que les indications de validation décrites dans cet email n\'auront pas été appliquées.                                        </li>                                        <li>                                            Il faut alors copier la clé d\'authentification qui se trouve dans le champ "Clé", et la coller dans le champ "Clef privée d\'échange" de la page de configuration du module Redsys (back office de Thelia -> Modules -> Redsys -> Configurer)                                        </li>                                    </ol>',
    'Accès à la plate-forme Redsys' => 'Accès à la plate-forme Redsys',
    'Comment générer votre clef privée ?' => 'Comment générer votre clef privée ?',
    'Configuration des URLs' => 'Configuration des URLs',
    'Configuration du paiement' => 'Configuration du paiement',
    'Historique des appels Redsys à l\'URL IPN' => 'Historique des appels Redsys à l\'URL IPN',
    'Redsys Configuration' => 'Configuration Redsys',
    'Vous pouvez aussi configurer le mail de confirmation Redsys' => 'Vous pouvez aussi configurer le mail de confirmation Redsys',
);
