<?php

// Namespaces
use \Documentary\Models      as DM;
use \Documentary\Views       as DV;
use \Documentary\Controllers as DC;

// Container
$container = $app->getContainer();

// View
$container['view'] = function($container)
{
    // Initialize views
    $view   = new \Slim\Views\Twig('../includes/views');
    $router = $container->get('router');
    $uri    = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};

// Database
$container['database'] = function($container)
{
    // Connect to database
    $db  = $container['settings']['database'];
    $pdo = new PDO('mysql:host='.$db['host'].';dbname='.$db['name'].';port='.$db['port'], $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Connect to database
    $database = new DM\Database($pdo);

    return $database;
};

// Chapters
$container['chapters'] = function($container)
{
    $chapters =
    [
        [
            'number'    => 1,
            'title'     => 'Voyage au fil<br>de l\'eau',
            'paragraph' => 'L\'eau qui coule de nos robinets semble infinie mais cette ressource naturelle se transforme peu à peu en valeur marchande.',
            'section'   => 'États des lieux',
            'slug'      => 'introduction',
            'header' =>
                [
                    'title'     => 'La quantité d\'eau<br>à la surface de la Terre',
                    'text'      => 'L’eau qui coule de nos robinets semble infinie mais cette ressource naturelle se transforme peu à peu en valeur marchande.',
                ],
            'slides'    =>
            [
                '1'      => 
                [
                    'type'      => 'motion',
                ],
                '2'      => 
                [
                    'subtitle1' => 'Géants de l’eau',
                    'number1'   => '60 %',
                    'text1'     => 'des ressources naturelles d’eau douce sont partagées entre 9 pays. Le monde en compte 197.',
                    'subtitle2' => 'Inaccessible',
                    'number2'   => '10 %',
                    'text2'     => 'de la population mondiale n’a pas accès à l’eau potable. Soit 748 millions d’humains.',
                    'subtitle3' => 'Course contre la montre',
                    'number3'   => '5 Humains',
                    'text3'     => 'meurent toutes les minutes parce qu’ils n’ont pas accès à l’eau potable.',
                    'type'      => 'three-bars',
                ],
            ],
        ],
        [
            'number'    => 2,
            'title'     => 'L\'or bleu<br>la bataille de l\'eau',
            'paragraph' => 'Chaque minute, cinq personnes meurent dans le monde parce qu’elles n’ont pas accès à l’eau potable.',
            'section'   => 'Utilisation de l\'eau',
            'slug'      => 'utilisation',
            'header' =>
            [
                'title'     => 'L\'utilisation de l\'eau<br>Dans nos sociétés',
                'text'      => 'Entre agriculture, industrie et quotidien, la quantité d’eau a drastiquement diminué au cours de ces dernières années.',
            ],
            'slides'    =>
            [
                '1'      =>
                [
                    'number1'   => '70 %',
                    'text1'     => 'Agriculture',
                    'number2'   => '20 %',
                    'text2'     => 'Industries',
                    'number3'   => '10 %',
                    'text3'     => 'Humains',
                    'type'      => 'three-circles',
                ],
                '2'      =>
                [
                    'subtitle1' => 'Terres cultivées',
                    'number1'   => '+ 12 %',
                    'subtitle2' => 'Surfaces irriguées',
                    'number2'   => '+ 117 %',
                    'question1' => 'Comment l\'expliquer ?',
                    'text1'     => 'L’irrigation constitue un outil de gestion efficace contre les <span class="text-bold">aléas</span> des précipitations. Elle permet de choisir des variétés à haut <span class="text-bold">rendement</span> en appliquant les fertilisants et traitements nécessaires.<br>
                    L’irrigation rend ces cultures économiquement intéressantes, et a pour effet de favoriser l’augmentation des rendements.',
                    'question2' => 'Quelles conséquences ?',
                    'text2'     => 'Il y a des conséquences importantes sur la <span class="text-bold">pollution</span> des eaux des nappes et des rivières avec de fortes concentrations en <span class="text-bold">azote</span> et en <span class="text-bold">molécules</span> issues des produits phytosanitaires, ainsi qu’en phosphore dans certaines zones.',
                    'type'      => 'two-bars',  
                ],
                '3'      =>
                [
                    'subtitle1' => 'REFROIDISSMENT RÉACTEURS',
                    'number1'   => '66 %',
                    'infos1'     => 'de l’eau utilisée par le secteur industriel est pour le refroidissment des réacteurs',
                    'subtitle2' => 'Inaccessible',
                    'subtitle2' => 'PRODUCTION ENERGIE',
                    'number2'   => '34 %',
                    'infos2'     => 'de l’eau sert à la production d’énergie.',
                    'question1' => 'EN TURQUIE',
                    'text1'     => 'En 2013, le gouvernement turc a <span class="text-bold">privatisé</span> le secteur de l\'hydroélectricité. 
                    Depuis, tous les cours d’eau du pays sont <span class="text-bold">accaparés</span> forçant les populations à se déplacer.',
                    'question2' => 'AU MEXIQUE',
                    'text2'     => 'Le géant américain, <span class="text-bold">Coca-Cola</span> engloutit <span class="text-bold">100 millions</span> de litres par an. Alors que <span class="text-bold">12 millions</span> d’habitants n’ont pas accès à l’eau potable dans ce même pays.',
                    'type'      => 'two-bars',  
                ],
                '4'      =>
                [
                    'subtitle1' => 'Boisson',
                    'number1'   => '1-3 L',
                    'subtitle2' => 'Chasse d\'eau',
                    'number2'   => '4-10 L',
                    'subtitle3' => 'Douche',
                    'number3'   => '30-80 L',
                    'subtitle4' => 'Lave-linge',
                    'number4'   => '120 L',
                    'subtitle5' => 'Bain',
                    'number5'   => '150-200 L',
                    'question1' => 'Combien de litres d’eau sont nécessaires pour un steak de boeuf de 250g ?',
                    'reponse1A' => '1 520 L',
                    'reponse1B' => '3 850 L',
                    'question2' => 'Pour 1 kilo de beurre, il faut … litres d’eau',
                    'reponse2A' => '5 533 L',
                    'reponse2B' => '2 150 L',
                    'question3' => '1 kilo de coton,<br>c’est … litres d’eau',
                    'reponse3A' => '22 500 L',
                    'reponse3B' => '12 655 L',
                    'title'     => 'Chapite 3',
                    'text'      => 'La gestion de l\'eau',
                    'type'      => 'five-circles',
                ],
            ],
        ],
        [
            'number'    => 3,
            'title'     => 'Gestion publique<br>acteurs civiques',
            'paragraph' => 'Chaque minute, cinq personnes meurent dans le monde parce qu’elles n’ont pas accès à l’eau potable.',
            'section'   => 'Gestion publique',
            'slug'      => 'gestion-publique',
            'slides'    =>
            [
                '1'      =>
                [
                    'type'      => 'video',
                ],
                '2'      =>
                [
                    'title'     => 'FLUCTUACT NEC MERGITUR',
                    'trad'      => '« il est battu par les flots mais ne sombre pas »',
                    'texte'     => 'Aujourd’hui, la mairie de Paris affiche comme un succès le fait d\'avoir fait baisser le prix du mètre cube d\'eau. En revanche et en parallèle de cette baisse, les Parisiens ont pu constater une réelle augmentation de leurs impôts locaux.',
                    'type'      => 'texte',
                ],
                '3'      =>
                [
                    'button'       => 'LE VOYAGE POLITIQUE<br>DE L’EAU',
                    'title'        => 'L’EAU ET<br>LES IMPÔTS',
                    'texte'        => 'En 2009, les parisiens ont connu une hausse en moyenne de 11,7% ( 395 euros en moyenne) pour la taxe d\'habitation et de 47% ( 552 euros en moyenne ) pour la taxe foncière. Dire que le passage de Paris en régie publique est la seule conséquence de l’augmentation des impôts serait un raccourci trop facile, néanmoins le lien paraît évident.<br>
                    En réalité, le coût dépend surtout de la facilité d\'accès aux points d\'approvisionnement en eau et de la qualité de cette eau. C’est pour cette raison que les prix peuvent varier de 2,50 à 15€ le mètre cube rien qu’en France.<br>                    
                    Ce choix est également très politique, et il en va de la réappropriation du service public pour certains.',
                    'name1'        => 'PIERRE MOSCOVICI',
                    'description1' => 'Président de l\'agglomération du Pays de Montbéliard, il avait annoncé en 2010 le retour en régie de la gestion de l\'eau d\'ici 2015… alors que le contrat courait jusqu\'en 2022, n\'en déplaise à Veolia.<br>
                    Certains estiment que se prononcer en faveur de la gestion en régie, et donc contre la mainmise des groupes privés, reste une manœuvre électoraliste efficace pour apaiser les ardeurs des Verts et redorer son blason socialiste. Pourtant, si le combat semble plus porté par la gauche, la gestion est une question qui dépasse bel et bien le clivage politique droite-gauche.',
                    'name2'        => 'BERNARD DELANÖE',
                    'description2' => 'Bertrand Delanoë en avait fait son cheval de bataille pour sa réélection à la Mairie de Paris en 2008. En réaffirmant, ce besoin de la puissance des collectivités locales face aux entreprises privées, motivé par un attachement certain au service public.<br>
                    Olivier Galiana, directeur du cabinet de la communauté d\'agglomération d\'Evry le disait : “La distribution d\'eau sera gérée par une régie publique et non plus par Suez car nous visons à nous réapproprier le service public de proximité.”',
                    'name3'        => 'ANNE LE STRAT',
                    'description3' => 'D\'après Anne Le Strat, adjointe PS à la mairie de Paris chargée de l\'eau :<br> 
                    “Quand on regarde la carte de France de plus près, on voit que certaines villes de gauche ont décidé de rester délégataires tandis que des villes de droite ont cassé leur contrat pour passer en régie. Il faut donc se garder de tout raisonnement simpliste selon lequel les municipalités de gauche seraient plus favorables à une gestion publique que celles de droite.”',
                    'type'         => 'photos',
                ],
                '4'      =>
                [
                    'title'     => 'LES DIFFÉRENTES POLITIQUES DE L’EAU',
                    'texte'     => 'Découverte de la gestion de l’eau avec<br>
                    les grands géants de ce monde',
                    'type'      => 'audio',
                ],
            ],
        ],
        [
            'number'    => 4,
            'title'     => 'Gestion privée<br>ressource protégée',
            'paragraph' => 'Chaque minute, cinq personnes meurent dans le monde parce qu’elles n’ont pas accès à l’eau potable.',
            'section'   => 'Gestion privée',
            'slug'      => 'gestion-privee',
        ],
        [
            'number'    => 5,
            'title'     => 'Droit ou besoin<br>le statut de l\'eau',
            'paragraph' => 'Chaque minute, cinq personnes meurent dans le monde parce qu’elles n’ont pas accès à l’eau potable.',
            'section'   => 'Droit ou besoin',
            'slug'      => 'droit-ou-besoin',
        ],
    ];

    return $chapters;
};