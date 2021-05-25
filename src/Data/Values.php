<?php

namespace App\Data;

use App\Entity\User;
use App\Entity\Module;
use App\Entity\Session;
use App\Entity\Formation;
use App\Entity\Stagiaire;

abstract class Values {
    public static $users = [
        // ID, email, prenom, nom, mot de passe, rôle
        new User(1,"jc@admin.com","Jean-Charles","HENRI","jcadmin","Administrateur"),
        new User(2,"virgile.gibello@test.com","Virgile","GIBELLO","vgibello","Formateur"),
        new User(3,"mickael.murmann@test.com","Mickaël","MURMANN","mmurmann","Formateur"),
        new User(4,"cindy.cahen@test.com","Cindy","CAHEN","ccahen","Formateur"),
        new User(5,"marie.duvel@test.com","Marie","DUVEL","mduvel","Secrétaire"),
        new User(6, "martine.dupont@test.com", "Martine", "DUPONT", "mdupont", "Secrétaire")
    ];

    public static $stagiaires = [
        // id, nom, prenom, email, adresse, CP, ville, telephone, (nPoleEmploi), (sessions)
        new Stagiaire(1, "DUPONT", "René", "rene.dupont@test.fr", "1 rue du test", "67000", "STRASBOURG", "06 12 34 56 78", "1234567A"),
        new Stagiaire(2, "LEBLANC", "Mathieu", "mathieu.leblanc@test.fr", "2 avenue de la liberté", "67000", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(3, "DUVAL", "Pierre", "pierre.duval@test.fr", "3 rue des chats", "67000", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(4, "WEISS", "Nicole", "nicole.weiss@test.fr", "4 rue des champignons", "67000", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(5, "FOURNIER", "Charline", "charline.fournier@test.fr", "5 rue de la forêt", "67100", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(6, "PARISEAU", "Lydie", "lydie.pariseau@test.fr", "6 boulevard de la nature", "67000", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(7, "BERGER", "Benoît", "benoit.berger@test.fr", "7 rue du chêne", "67200", "STRASBOURG", "06 12 34 56 78", null),
        new Stagiaire(8, "CRESSAC", "Félicien", "felicien.cressac@test.fr", "8 rue des fraises", "67000", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(9, "LOISEAU", "Francis", "francis.loiseau@test.fr", "9 rue des asperges", "67100", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(10, "MEDOR", "Edouard", "edouard.medor@test.fr", "10 rue de la pizza", "67000", "STRASBOURG", "06 12 34 56 78", null),
        new Stagiaire(11, "LAGRANGE", "Johanna", "johanna.lagrange@test.fr", "11 rue du pain", "67300", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(12, "SISOU", "Martin", "martin.sisou@test.fr", "12 avenue de la boulangerie", "67200", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(13, "SAGLIS", "Alice", "alice.saglis@test.fr", "13 place Toriko", "67000", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(14, "VALENTIN", "Vincent", "vincent.valentin@test.fr", "14 rue du manga", "67300", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(15, "MARLEAU", "Patricia", "patricia.marleau@test.fr", "15 rue des ninjas", "67100", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(16, "ROBERT", "Regis", "regis.robert@test.fr", "16 rue des cinq", "67200", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(17, "PARKER", "Pierre", "pierre.parker@test.fr", "17 rue des araignées", "67000", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(18, "LEQUERNEC", "Jérôme", "jerome.lequernec@test.fr", "18 rue Godart", "67000", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(19, "NERDZOWSKY", "Benjamin", "benjamin.nerdzowsky@test.fr", "19 avenue des geeks", "67100", "STRASBOURG", "06 12 34 56 78", "1234567X"),
        new Stagiaire(20, "ZIMMERMAN", "Caroline", "caroline.zimmerman@test.fr", "20 rue des poupées", "67000", "STRASBOURG", "06 12 34 56 78", "1234567X"),
    ];

    public static $sessions = [
        // ID, intitule, nbPlaces, dateDebut, dateFin
        new Session(1, "DL1 Web", 15, "18/02/2021", "17/09/2021"),
        new Session(2, "DL2 Java", 18, "15/02/2021", "17/09/2021"),
        new Session(3, "DL3 Secrétariat", 14, "12/03/2021", "17/09/2021"),
        new Session(4, "DL4 Compta", 25, "16/01/2021", "17/09/2021"),
        new Session(5, "DL5 Symfony", 12, "28/04/2021", "17/09/2021"),
        new Session(6, "DL6 WordPress", 16, "07/05/2021", "17/09/2021"),
        new Session(7, "DL7 Infographie", 17, "08/06/2021", "17/09/2021"),
    ];

    public static $lieux = [
        // ID, ville, CP
        new Lieu(1, "Strasbourg", "67100"),
        new Lieu(2, "Saverne", "67700"),
        new Lieu(3, "Sélestat", "67600"),
        new Lieu(4, "Haguenau", "67500"),
        new Lieu(5, "Colmar", "68000"),
        new Lieu(6, "Mulhouse", "68200"),
        new Lieu(7, "Molsheim", "67120"),
        new Lieu(8, "Epinal", "88026"),
        new Lieu(9, "Saint Avold", "57500"),
        new Lieu(10, "Forbach", "57600"),
        new Lieu(11, "Thionville", "57100"),
        new Lieu(12, "Nancy", "54320"),
        new Lieu(13, "Metz", "57070"),
        new Lieu(14, "Gérardmer", "88400"),
    ];

    public static $formations = [
        // ID, titre
        new Formation(1, "Développeur Web PHP"),
        new Formation(2, "Développeur Java / Android"),
        new Formation(3, "Infographie"),
        new Formation(4, "Secrétariat"),
        new Formation(5, "Bureautique"),
        new Formation(6, "Dentaire"),
        new Formation(7, "Comptabilité"),
        new Formation(8, "Paye"),
        new Formation(9, "Vente"),
    ];

    public static $modules = [
        // ID, nom
        new Module(1, "HTML / CSS"),
        new Module(2, "PHP"),
        new Module(3, "Wordpress"),
        new Module(4, "Symfony"),
        new Module(5, "Gestion de projet"),
        new Module(6, "Démarche"),
        new Module(7, "Anglais"),
        new Module(8, "Word"),
        new Module(9, "Excel"),
        new Module(10, "Java"),
        new Module(11, "Photoshop"),
        new Module(12, "Techniques de vente"),
    ];
}