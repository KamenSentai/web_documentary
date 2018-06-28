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
    $chapter_1 = 
    [
        'number'    => 1,
        'title'     => 'Voyage au fil<br>de l\'eau',
        'paragraph' => 'L\'eau qui coule de nos robinets semble infinie mais cette ressource naturelle se transforme peu à peu en valeur marchande.',
        'section'   => 'États des lieux',
        'slug'      => 'introduction',
        'header'    =>
        [
            'title' => 'La quantité d\'eau<br>à la surface de la Terre',
            'text'  => 'L’eau qui coule de nos robinets semble infinie, mais cette<br>ressource naturelle se transforme peu à peu en valeur marchande.',
        ],
        'slides'    =>
        [
            'slide_1' => 
            [
                'type' => 'motion',
            ],
            'slide_2' => 
            [
                'type'      => 'threeBars',
                'bar_1' =>
                [
                    'title'  => 'Géants de l’eau',
                    'number' => '60 %',
                    'text'   => 'des ressources naturelles d’eau douce sont partagées entre 9 pays. Le monde en compte 197.',
                ],
                'bar_2' =>
                [
                    'title'  => 'Inaccessible',
                    'number' => '10 %',
                    'text'   => 'de la population mondiale n’a pas accès à l’eau potable. Soit 748 millions d’humains.',
                ],
                'bar_3' =>
                [
                    'title'  => 'Course contre la montre',
                    'number' => '5 Humains',
                    'text'   => 'meurent toutes les minutes parce qu’ils n’ont pas accès à l’eau potable.',
                ],
            ],
        ],
    ];

    $chapter_2 =
    [
        'number'    => 2,
        'title'     => 'L\'or bleu<br>la bataille de l\'eau',
        'paragraph' => 'Chaque minute, cinq personnes meurent dans le monde parce qu’elles n’ont pas accès à l’eau potable.',
        'section'   => 'Utilisation de l\'eau',
        'slug'      => 'utilisation',
        'header'    =>
        [
            'title' => 'L\'utilisation de l\'eau<br>dans nos sociétés',
            'text'  => 'Entre agriculture, industrie et quotidien, la quantité<br>d’eau a drastiquement diminué au cours de ces dernières années.',
        ],
        'slides'    =>
        [
            'slide_1' =>
            [
                'type'     => 'threeCircles',
                'circle_1' =>
                [
                    'number' => '70',
                    'text'   => 'Agriculture',
                ],
                'circle_2' =>
                [
                    'number' => '20',
                    'text'   => 'Industries',
                ],
                'circle_3' =>
                [
                    'number' => '10',
                    'text'   => 'Humains',
                ],
            ],
            'slide_2' =>
            [
                'type'  => 'twoBars',
                'bar_1' =>
                [
                    'subtitle' => 'Terres cultivées',
                    'number'   => '12',
                ],
                'bar_2' =>
                [
                    'subtitle' => 'Surfaces irriguées',
                    'number'   => '117',
                ],
                'popup_1' =>
                [
                    'question' => 'Comment l\'expliquer ?',
                    'text'     => 'L’irrigation constitue un outil de gestion efficace contre les aléas des précipitations. Elle permet de choisir des variétés à haut <span class="text-bold">rendement</span> en appliquant les fertilisants et traitements nécessaires.<br>L’irrigation rend ces cultures économiquement intéressantes, et a pour effet de favoriser l’augmentation des rendements.',
                ],
                'popup_2' =>
                [
                    'question' => 'Quelles conséquences ?',
                    'text'     => 'Il y a des conséquences importantes sur la <span class="text-bold">pollution</span> des eaux des nappes et des rivières avec de fortes concentrations en <span class="text-bold">azote</span> et en <span class="text-bold">molécules</span> issues des produits phytosanitaires, ainsi qu’en phosphore dans certaines zones.',
                ],
            ],
            'slide_3' =>
            [
                'type'  => 'twoBars',
                'bar_1' =>
                [
                    'subtitle' => 'REFROIDISSMENT RÉACTEURS',
                    'number'   => '66',
                    'infos'    => 'de l’eau utilisée par le secteur industriel est pour le refroidissment des réacteurs',
                ],
                'bar_2' =>
                [
                    'subtitle' => 'PRODUCTION ENERGIE',
                    'number'   => '34',
                    'infos'    => 'de l’eau sert à la production d’énergie.',
                ],
                'popup_1' =>
                [
                    'question' => 'EN TURQUIE',
                    'text'     => 'En 2013, le gouvernement turc a <span class="text-bold">privatisé</span> le secteur de l\'hydroélectricité. Depuis, tous les cours d’eau du pays sont <span class="text-bold">accaparés</span> forçant les populations à se déplacer.',
                ],
                'popup_2' =>
                [
                    'question' => 'AU MEXIQUE',
                    'text'     => 'Le géant américain, <span class="text-bold">Coca-Cola</span> engloutit <span class="text-bold">100 millions</span> de litres par an. Alors que <span class="text-bold">12 millions</span> d’habitants n’ont pas accès à l’eau potable dans ce même pays.',
                ],
            ],
            'slide_4' =>
            [
                'type'     => 'fiveCircles',
                'circle_1' =>
                [
                    'subtitle' => 'Boisson',
                    'number'   => '1-3 L',
                ],
                'circle_2' =>
                [
                    'subtitle' => 'Chasse d\'eau',
                    'number'   => '4-10 L',
                ],
                'circle_3' =>
                [
                    'subtitle' => 'Douche',
                    'number'   => '30-80 L',
                ],
                'circle_4' =>
                [
                    'subtitle' => 'Lave-linge',
                    'number'   => '120 L',
                ],
                'circle_5' =>
                [
                    'subtitle' => 'Bain',
                    'number'   => '150-200 L',
                ],
                'quizz_1' =>
                [
                    'question' => 'Combien de litres d’eau sont nécessaires pour un steak de boeuf de 250g ?',
                    'correct'  => '3 850 L',
                    'wrong   ' => '1 520 L',
                ],
                'quizz_2' =>
                [
                    'question' => 'Pour 1 kilo de beurre, il faut … litres d’eau',
                    'correct'  => '5 533 L',
                    'wrong'    => '2 150 L',
                ],
                'quizz_3' =>
                [
                    'question' => '1 kilo de coton,<br>c’est … litres d’eau',
                    'correct'  => '22 500 L',
                    'wrong'    => '12 655 L',
                ],
                'redirection' =>
                [
                    'title' => 'Chapite 3',
                    'text'  => 'La gestion de l\'eau',
                ],
            ],
        ],
    ];

    $chapter_3 =
    [
        'number'    => 3,
        'title'     => 'Gestion publique<br>acteurs civiques',
        'paragraph' => 'Chaque minute, cinq personnes meurent dans le monde parce qu’elles n’ont pas accès à l’eau potable.',
        'section'   => 'Gestion publique',
        'slug'      => 'gestion-publique',
        'slides'    =>
        [
            'slide_1' =>
            [
                'type' => 'video',
            ],
            'slide_2' =>
            [
                'type'  => 'text',
                'title' => 'FLUCTUACT NEC MERGITUR',
                'label' => '« il est battu par les flots mais ne sombre pas »',
                'text'  => 'Aujourd’hui, la mairie de Paris affiche comme un succès le fait d\'avoir fait baisser le prix du mètre cube d\'eau. En revanche et en parallèle de cette baisse, les Parisiens ont pu constater une réelle augmentation de leurs impôts locaux.',
            ],
            'slide_3' =>
            [
                'type'        => 'character',
                'button'      => 'LE VOYAGE POLITIQUE<br>DE L’EAU',
                'title'       => 'L’EAU ET<br>LES IMPÔTS',
                'text'        => 'En 2009, les parisiens ont connu une hausse en moyenne de 11,7% ( 395 euros en moyenne) pour la taxe d\'habitation et de 47% ( 552 euros en moyenne ) pour la taxe foncière. Dire que le passage de Paris en régie publique est la seule conséquence de l’augmentation des impôts serait un raccourci trop facile, néanmoins le lien paraît évident.<br>En réalité, le coût dépend surtout de la facilité d\'accès aux points d\'approvisionnement en eau et de la qualité de cette eau. C’est pour cette raison que les prix peuvent varier de 2,50 à 15€ le mètre cube rien qu’en France.<br>Ce choix est également très politique, et il en va de la réappropriation du service public pour certains.',
                'character_1' =>
                [
                    'name'        => 'PIERRE MOSCOVICI',
                    'description' => 'Président de l\'agglomération du Pays de Montbéliard, il avait annoncé en 2010 le retour en régie de la gestion de l\'eau d\'ici 2015… alors que le contrat courait jusqu\'en 2022, n\'en déplaise à Veolia.<br>Certains estiment que se prononcer en faveur de la gestion en régie, et donc contre la mainmise des groupes privés, reste une manœuvre électoraliste efficace pour apaiser les ardeurs des Verts et redorer son blason socialiste. Pourtant, si le combat semble plus porté par la gauche, la gestion est une question qui dépasse bel et bien le clivage politique droite-gauche.',
                ],
                'character_2' =>
                [
                    'name'        => 'BERNARD DELANÖE',
                    'description' => 'Bertrand Delanoë en avait fait son cheval de bataille pour sa réélection à la Mairie de Paris en 2008. En réaffirmant, ce besoin de la puissance des collectivités locales face aux entreprises privées, motivé par un attachement certain au service public.<br>Olivier Galiana, directeur du cabinet de la communauté d\'agglomération d\'Evry le disait : "La distribution d\'eau sera gérée par une régie publique et non plus par Suez car nous visons à nous réapproprier le service public de proximité.”',
                ],
                'character_3' =>
                [
                    'name'        => 'ANNE LE STRAT',
                    'description' => 'D\'après Anne Le Strat, adjointe PS à la mairie de Paris chargée de l\'eau :<br>"Quand on regarde la carte de France de plus près, on voit que certaines villes de gauche ont décidé de rester délégataires tandis que des villes de droite ont cassé leur contrat pour passer en régie. Il faut donc se garder de tout raisonnement simpliste selon lequel les municipalités de gauche seraient plus favorables à une gestion publique que celles de droite.”',
                ],
            ],
            'slide_4' =>
            [
                'type'  => 'audio',
                'title' => 'LES DIFFÉRENTES POLITIQUES DE L’EAU',
                'text'  => 'Découverte de la gestion de l’eau avec<br>les grands géants de ce monde',
            ],
        ],
    ];

    $chapter_4 =
    [
        'number'    => 4,
        'title'     => 'Gestion privée<br>ressource protégée',
        'paragraph' => 'Chaque minute, cinq personnes meurent dans le monde parce qu’elles n’ont pas accès à l’eau potable.',
        'section'   => 'Gestion privée',
        'slug'      => 'gestion-privee',
    ];

    $chapter_5 =
    [
        'number'    => 5,
        'title'     => 'Droit ou besoin<br>le statut de l\'eau',
        'paragraph' => 'Chaque minute, cinq personnes meurent dans le monde parce qu’elles n’ont pas accès à l’eau potable.',
        'section'   => 'Droit ou besoin',
        'slug'      => 'droit-ou-besoin',
        'slides'    =>
        [
            'slide_1' =>
            [
                'type'  => 'motion',
            ],
            'slide_2' =>
            [
                'type'        => 'text',
                'title'       => 'La ruee vers l\'or',
                'label'       => 'UNE AFFOLANTE COURSE VERS L’EAU',
                'text'        => 'Si aujourd’hui l’eau potable est abondante, et 70% des personnes qui vivent sur Terre y ont accès, cela ne sera plus le cas dans quelques temps. Selon une étude des Nations Unies, l\'eau pourrait devenir, d\'ici à 50 ans, un bien plus précieux que le pétrole.',
                'button'      => 'Quel avenir ?',
                'description' => 'Si l’eau venait à devenir un actif financier, la spéculation sur les prix de l’eau potable pourrait être catastrophique pour les pays du tiers monde.<br>
                Pourtant, contrairement aux denrées alimentaires qui nécessite des techniques agricoles particulières, il n’y a quasiment aucun surcoût pour l’eau potable. C’est d’ailleurs l’un des arguments majeurs luttant contre la privatisation de l’eau. Cette action pourrait tuer des millions d’être humains sur la planète.<br>                 
                Mais la raréfaction de cette ressource, les tensions qu’elle provoque, pousse de plus en plus d’acteurs à réfléchir à la financiarisation de l’eau.',
            ],
            'slide_3' =>
            [
                'type'        => 'audio',
                'title'       => 'NESTLÉ, PRIVATISER L’EAU POUR MIEUX LA RÉPARTIR',
                'text'        => '« We feed the world » - 2005 - Erwin Wagenhofer<br>
                Interview du président de Nestlé, Peter Brabeck',
                'button'      => 'EN SAVOIR PLUS',
                'name'        => 'Nestlé',
                'description' => 'Après l’énorme mouvement collectif d’indignation et de colère que provoqua cette déclaration. Nestlé publia bon nombre de communiqué de presse et M. Brabeck fit quelques autres sorties remarquées pour clarifier son point de vue. Pour Nestlé, comme pour les Nations Unies :<br>                
                « Notre planète dispose de suffisamment d\'eau fraîche pour couvrir les besoins de 7 milliards de personnes, mais ces ressources sont inégalement réparties. Une quantité malheureusement trop importante d\'eau est gaspillée, polluée et utilisée de façon non durable. »<br>                
                Nestlé souhaite privatiser l’eau dans le but de mieux la répartir, de manière triviale en empêchant les plus fortunés de remplir leurs piscines et les plus nécessiteux d’avoir accès à l’eau. Celle-ci devrait avoir une valeur en termes de taxation afin que chacun continue à l’utiliser de façon responsable.',
            ],
            'slide_4' =>
            [
                'type'        => 'text',
                'title'       => 'CONFLITS MILITAIRES',
                'label'       => '« EAU RAGE, EAU DÉSESPOIR »',
                'text'        => 'L’accès à l’eau pourrait devenir l\'une des premières causes de tensions internationales. Plus de 40 % de la population mondiale est établie dans les 250 bassins fluviaux transfrontaliers du globe. Elles ont toutes l’obligation de partager leurs ressources en eau avec les habitants d\'un pays voisin.',
            ],
            'slide_5' =>
            [
                'type'         => 'text',
                'title'        => 'CONFLITS MILITAIRES',
                'label'        => '« EAU RAGE, EAU DÉSESPOIR »',
                'text'         => 'Une telle situation peut être à l\'origine de conflits récurrents, notamment lorsqu’un cours d’eau traverse une frontière, car l\'eau devient alors un véritable instrument de pouvoir aux mains du pays situé en amont. Qu’il soit puissant ou non, celui-ci a toujours théoriquement l\'avantage, puisqu\'il a la maîtrise du débit de l\'eau.',
                'button'       => 'HISTOIRE DE POUVOIR',
                'description1' =>
                [
                    'name'        => 'SUIVRE LE NIL',
                    'description' => 'L’Égypte, entièrement tributaire du Nil pour ses ressources en eau, doit néanmoins partager celles-ci avec dix autres États du bassin du Nil : notamment avec l\'Éthiopie où le Nil bleu prend sa source, et avec le Soudan où le fleuve serpente avant de déboucher sur le territoire égyptien.',
                ],
                'description2' =>
                [
                    'name'        => 'LA TURQUIE',
                    'description' => 'Quant à l\'Irak et à la Syrie, ils sont tous deux à la merci de la Turquie, où les deux fleuves qui les alimentent, le Tigre et l\'Euphrate, prennent leur source. L\'eau de l\'Euphrate a d\'ailleurs souvent servi d\'arme brandie par la Turquie contre ses deux voisins : grâce aux nombreux barrages qu’elle a érigés sur le cours supérieur du fleuve et qui lui permettent d’en réguler à sa guise le débit en aval, la Turquie possède là, en effet, un puissant moyen de pression.',
                ],
                'button2'     => 'En savoir plus',
                'name'        => 'Quel avenir ?',
                'description' => 'Avec l’essor démographique et l’accroissement des besoins, ces tensions pourraient se multiplier à l’avenir. C’est ce que prédisent certains experts pour le XXIe siècle. D’autres en revanche pensent que la gestion commune de l\'eau peut être un facteur de pacification. Ils mettent en avant des exemples étonnants de coopération : le plus fameux est celui de l\'Inde et du Pakistan qui, au plus fort de la guerre qui les opposait dans les années 1960, n\'ont jamais interrompu le financement des travaux d\'aménagement qu\'ils menaient en commun sur le fleuve Indus.',
            ],
            'slide_6' => 
            [
                'type'      => 'threeBars',
                'bar_1' =>
                [
                    'title'  => 'CROISSANCE',
                    'ispourcentage' => false,
                    'number' => '458 milliards',
                    'text'   => 'd’euros de perte, voilà ce que représente la pénurie d’eau, soit 1% du PIB mondial.',
                ],
                'bar_2' =>
                [
                    'title'  => 'SANTÉ, DANGER',
                    'ispourcentage' => false,
                    'number' => '3,5 milliards',
                    'text'   => 'de la population mondiale boivent une eau dangereuse pour leur santé.',
                ],
                'bar_3' =>
                [
                    'title'  => 'CONTAMINATION',
                    'ispourcentage' => false,
                    'number' => '1,8 milliards',
                    'text'   => 'd’humains s’abreuvent à des points d’eau contaminés par les matières fécales, etc.',
                ],
            ],
        ],
    ];

    $chapters = [$chapter_1, $chapter_2, $chapter_3, $chapter_4, $chapter_5];

    return $chapters;
};