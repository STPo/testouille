<?php
    define('_BBC_PAGE_NAME', 'v1_ '.$_SERVER['REQUEST_URI']);
    define('_BBCLONE_DIR', '/homez.548/parmotsez/www/bbclone/');
    define('COUNTER', _BBCLONE_DIR . 'mark_page.php');
    if (is_readable(COUNTER)) include_once(COUNTER);
?>
<?php include('inc/config.inc.php'); ?>
<?php include('inc/head.inc.php'); ?>

<body>

    <div id="body-core">

        <?php include('inc/header.inc.php'); ?>

        <div class="section" id="accueil">
            <div class="body-inside clearfix">

                <div id="home-intro">

                    <blockquote>
                        <p>
                            «&nbsp;La chose du monde<br>
                            la plus difficile, c’est de saisir la vie avec<br>
                            des mots justes et simples.&nbsp;»
                        </p>
                        <cite><span>Vittorio Saltini</span> (Le Livre de Li Po).</cite>
                    </blockquote>

                    <p class="big"><strong>Par Mots et par Lettres</strong> est la libre association de deux conseillers en écriture installés en Île-de-France.</p>
                    <p>Nous <strong>rédigeons</strong> des textes privés, des documents professionnels ou administratifs, pour vous et avec vous, particuliers, associations, collectivités, entreprises.<br>
                        Nous <strong>recueillons et transcrivons</strong> aussi votre parole en vue d’un récit de vie, d’une biographie, d’une histoire personnelle ou collective.</p>

                    <a href="#a-propos" class="who internal-link">
                        <h2><strong>Qui</strong> sommes-nous&nbsp;?</h2>
                        <p>
                            <strong>Marité</strong> Andrieu
                            <span class="faces">
                                <span class="default"></span>
                                <span class="hover"></span>
                            </span>
                            Dominique <strong>Jeanningros</strong>
                        </p>
                        <span class="moar bordered">Plus d’<abbr title="informations">infos</abbr> sur nous&nbsp;!</span>
                    </a>

                </div><!-- /#home-intro -->

                <div id="home-list">
                    <h2><strong>Conseillers en écriture, </strong>nous vous proposons de…</h2>
                    <ul>
                        <li><strong>Recueillir et transcrire</strong> votre parole en vue d’un récit de vie, d’une biographie, d’une histoire personnelle ou familiale…</li>
                        <li><strong>Retracer les grandes étapes</strong> de votre entreprise ou de votre association, de votre quartier…</li>
                        <li><strong>Recueillir la mémoire</strong> de groupes sociaux, à travers témoignages, archives, photos, à l’occasion d’un événement ou d’une étude…</li>
                        <li><strong>Écrire, corriger ou réécrire, mettre en forme</strong> vos textes privés ou professionnels : courriers, CV, lettres de motivation, créations littéraires, thèses, mémoires, comptes-rendus, rapports d’activité…</li>
                        <li><strong>Aider à traiter</strong> des dossiers et documents administratifs, <strong>accompagner</strong> des démarches personnelles…</li>
                        <li><strong>Animer des ateliers</strong> d’écriture pour favoriser l’expression et l’utilisation de la langue, faire éclore la parole de personnes âgées, d’adultes non francophones, de personnes en difficulté…</li>
                    </ul>
                </div><!-- /#home-list -->

                <p class="back-to-top"><a href="#accueil" class="bordered">Retourner à l’accueil</a></p>

            </div><!-- /.body-inside -->
        </div><!-- /#accueil -->

        <div class="section" id="prestations">
            <div class="body-inside clearfix">

                <h1>Toutes nos <strong>prestations</strong></h1>

                <ul class="list-1 clearfix">
                    <li class="item-1">
                        <span class="illus"></span>
                        <h2>Recueil de la parole et de la mémoire, rédaction d’histoires personnelles et collectives</h2>
                        <p>Biographies, récits de vie, journaux de voyages, sagas familiales, histoires d’une entreprise, d’une association, d’un lieu, d’une ville, d’un quartier, d’une communauté… pour une publication écrite ou numérique.</p>
                    </li>
                    <li class="item-2">
                        <span class="illus"></span>
                        <h2>Animation d’ateliers d’écriture</h2>
                        <p>Travail autour de la mémoire, du réel, de l’imaginaire, création des conditions pour favoriser l’expression et faire éclore la parole, et passer à l’écriture, auprès de personnes âgées, d’adultes non francophones et de personnes en difficulté. </p>
                    </li>
                    <li class="item-3">
                        <span class="illus"></span>
                        <h2>Relectures, corrections, réécritures</h2>
                        <p>Pour des textes lisibles, sans fautes, sans erreurs grammaticales ni entorses aux règles typographiques : manuscrits, discours, thèses, mémoires et tout document privé ou professionnel.</p>
                    </li>
                    <li class="item-4">
                        <span class="illus"></span>
                        <h2>Écriture professionnelle</h2>
                        <p>Établissement de rapports d’activités, actes de colloques, comptes rendus de réunion au profit d’entreprises, d’associations, de collectivités locales, et rédaction de CV et lettres de motivation pour les particuliers.</p>
                    </li>
                    <li class="item-5">
                        <span class="illus"></span>
                        <h2>Traitement de dossiers et courriers administratifs</h2>
                        <p>Accompagnement dans le déchiffrage, la constitution et la rédaction de documents à destination de l’administration, recherches d’informations, aide et soutien aux démarches personnelles et formalités vis-à-vis des services de l’État, orientation vers les services compétents.</p>
                    </li>
                    <li class="item-6">
                        <a href="#contactez-nous" class="internal-link">
                            <span class="illus"></span>
                            <h2>Vous avez besoin d’autre chose ?</h2>
                            <p>N’hésitez pas à <span class="bordered">nous contacter</span> pour toute prestation personnalisée qui n’apparaîtrait pas dans cette liste : notre rôle est aussi de vous accompagner dans votre démarche !</p>
                            <span class="overdub"></span>
                        </a>
                    </li>
                </ul>

                <p class="back-to-top"><a href="#accueil" class="bordered">Retourner à l’accueil</a></p>

            </div><!-- /.body-inside -->
        </div><!-- /#prestations -->

        <div class="section" id="references">
            <div class="body-inside clearfix">

                <h1>Quelques <strong>références</strong></h1>

                <ul class="list-1 clearfix">
                    <li class="item-1">
                        <span class="illus"></span>
                        <h2>Emmaüs solidarité, Paris <cite>Rose-Marie Ryan, <span>directrice de l’atelier de formation de base.</span></cite></h2>
                        <blockquote>
                            <p>«&nbsp;La fréquentation régulière des ateliers par le public concerné témoigne de l’intérêt, de la motivation et de la confiance suscités par les co-animateurs.&nbsp;»</p>
                            <p>«&nbsp;Réalisation d’un recueil des textes produits par les participants dans un souci de valorisation et concrétisant le besoin de “laisser des traces”.&nbsp;»</p>
                            <p>«&nbsp;Préparation et suivi rigoureux. Approche adaptée à la spécificité des publics.&nbsp;»</p>
                        </blockquote>
                    </li>
                    <li class="item-2">
                        <span class="illus"></span>
                        <h2>Résidence MAPI Saint-Simon, Paris <cite>Jeanne Doublet, <span>psychologue.</span></cite></h2>
                        <blockquote>
                            <p>«&nbsp;Adaptation au rythme des personnes âgées et aptitude à communiquer avec elles pour les mettre en confiance et engendrer une parole riche en souvenirs.&nbsp;»</p>
                            <p>«&nbsp;Un travail de réécriture qui a permis une mise en forme efficace, dynamique et agréable à lire mettant en valeur des monologues et des dialogues qui reflètent bien l’image du travail de groupe et des histoires individuelles.&nbsp;»</p>
                        </blockquote>
                    </li>
                    <li class="item-3">
                        <span class="illus"></span>
                        <h2>La Compagnie littéraire, Paris <cite>Denis Ravel, <span>directeur.</span></cite></h2>
                        <blockquote>
                            <p>«&nbsp;Travail en collaboration : un grand plaisir, doublé d’un enrichissement.&nbsp;»</p>
                            <p>«&nbsp;Grand sérieux, parfaite rigueur.&nbsp;»</p>
                        </blockquote>
                    </li>
                    <li class="item-4">
                        <span class="illus"></span>
                        <h2>Ma plume est à vous, information et médiateur social, Paris <cite>Micheline Marret, <span>présidente.</span></cite></h2>
                        <blockquote>
                            <p>« Accueil chaleureux et très professionnel.&nbsp;»</p>
                            <p>«&nbsp;Rédaction claire et synthétique de la correspondance. Très bonne compréhension des dossiers, exécution rapide. De bon conseil, ponctuel, méticuleux. »</p>
                        </blockquote>
                    </li>
                    <li class="item-5">
                        <span class="illus"></span>
                        <h2>Maison de Justice et du Droit, Champigny-sur-Marne <cite>Laurence Gorce, <span>coordinatrice.</span></cite></h2>
                        <blockquote>
                            <p>«&nbsp;Excellente capacité d’écoute et rapide compréhension des demandes et exigences des courriers à connotation juridique.&nbsp;»</p>
                            <p>«&nbsp;Exceptionnelle qualité de l’écriture et pertinence du vocabulaire.&nbsp;»</p>
                            <p>«&nbsp;Sensibilité très fine dans l’accueil des publics en difficulté.&nbsp;»</p>
                        </blockquote>
                    </li>
                </ul>

                <p class="back-to-top"><a href="#accueil" class="bordered">Retourner à l’accueil</a></p>

            </div><!-- /.body-inside -->
        </div><!-- /#references -->

        <div class="section" id="a-propos">
            <div class="body-inside clearfix">

                <h1><strong>À propos</strong></h1>

                <div class="inside clearfix">
                    <div class="photos"></div>

                    <div class="person fl">
                        <h2>Marité Andrieu</h2>
                        <p>Après un CAPES d’anglais et une maîtrise de traduction, j’ai enseigné en lycée et collège. J’ai ensuite rejoint le monde de l’information et communication. Munie d’un diplôme de formation supérieure du CNAM, j’ai d’abord exercé en cabinet de conseil en recrutement, puis dans une ONG latino-américaine, et enfin au département communication d’un grand ministère.</p>
                        <p>En 2010, j’ai choisi de développer en libéral une activité proche des mes aspirations. Diplômée de l’université Sorbonne Nouvelle (Paris 3), associée à Dominique, j’exerce désormais mon métier de conseiller en écriture-écrivain public auprès de particuliers, d’associations et d’entreprises privées. </p>
                    </div>

                    <div class="person fr">
                        <h2>Dominique Jeanningros</h2>
                        <p>Engagé professionnellement dans le mouvement Emmaüs en tant que responsable de communauté puis permanent national, j’ai aussi exercé les fonctions d’éducateur et de directeur au sein d’une association auprès de gens à la rue dans Paris. Durant mon parcours, j’ai été amené à découvrir les difficultés quotidiennes rencontrées par de nombreuses personnes face à l’écrit, les privant parfois de leurs droits sociaux et citoyens. À titre personnel, je suis passionné de littérature.</p>
                        <p>Il y a deux ans, j’ai fait le choix de m’engager dans le métier d’écrivain public. Diplômé d’État en écriture professionnelle et privée-écrivain public de l’université Sorbonne Nouvelle (Paris 3), j’exerce cette activité de conseil en duo avec Marité Andrieu.</p>
                    </div>
                </div>

                <p class="back-to-top"><a href="#accueil" class="bordered">Retourner à l’accueil</a></p>

            </div><!-- /.body-inside -->
        </div><!-- /#a-propos -->

        <div class="section" id="contactez-nous">
            <div class="body-inside clearfix">

                <h1><strong>Contactez-nous&nbsp;!</strong></h1>

                <div class="description fl">

                    <h2>Notre méthode&nbsp;: conseil et accompagnement…</h2>

                    <p>Que vous soyez particuliers, entreprises, associations ou collectivités, <strong>nous vous conseillons et nous vous accompagnons</strong> dans vos travaux d’écriture. Nous les prenons en charge, entièrement ou partiellement, selon vos besoins.</p>
                    <p>Nous avons fait le choix de <strong>travailler en équipe</strong> et en réseau afin de répondre rapidement et en complémentarité aux diverses sollicitations.</p>
                    <p>Nous avons le souci de construire une relation basée sur <strong>le respect, la confiance, la clarté et l’honnêteté.</strong></p>
                    <p>Nous offrons <strong>des prestations sur mesure.</strong></p>
                    <p>Nous avons la capacité d’intervenir partout <strong>en Île-de-France et au-delà</strong> pour réaliser des travaux à distance.</p>
                    <p><strong>La première consultation gratuite</strong> d’environ une heure permet de faire connaissance, d’apprécier la demande et de fixer les modalités d’exécution. Les travaux à réaliser débutent à la suite de <strong>la signature d’un devis et du versement d’un acompte.</strong></p>

                </div>

                <div class="coordonnees fr">

                    <h2>Parlons-en en direct&nbsp;!</h2>

                    <div>
                        <p>N’hésitez pas à nous téléphoner sur nos portables <br>ou à formuler votre demande par mél.</p>
                        <ul>
                            <li class="clearfix">
                                <span class="picto telephone"></span>
                                <ul>
                                    <li class="telephone-number">06 76 76 97 68 <span class="author">(Marité Andrieu)</span></li>
                                    <li class="telephone-number">06 78 56 69 42 <span class="author">(Dominique Jeanningros)</span></li>
                                </ul>
                            </li>
                            <li class="clearfix">
                                <span class="picto email-address"></span>
                                <span class="email">bonjour[AT]parmotsetparlettres[DOT]fr</span>
                            </li>
                        </ul>
                        <p class="find-us">Nous sommes également sur <a href="#" class="facebook">Facebook</a> et <a href="#" class="linkedin">LinkedIn</a>&nbsp;!</p>
                    </div>

                </div>

                <p class="back-to-top"><a href="#accueil" class="bordered">Retourner à l’accueil</a></p>

            </div><!-- /.body-inside -->
        </div><!-- /#contactez-nous -->

        <?php include('inc/footer.inc.php'); ?>

    </div><!-- /#body-core -->
    
    <!-- START : scripts -->
    <?php include('inc/scripts.inc.php'); ?>
    <!-- END : scripts -->
    
</body>
</html>