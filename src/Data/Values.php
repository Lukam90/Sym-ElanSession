<?php

namespace App\Data;

abstract class Values {
    public static $users = [
        // ID, email, prenom, nom, mot de passe, rôle
        new User(1,"jc@admin.com","Jean-Charles","HENRI","jcadmin","Administrateur"),
        new User(2,"virgile.gibello@test.com","Virgile","GIBELLO","vgibello","Formateur"),
        new User(3,"mickael.murmann@test.com","Mickaël","MURMANN","mmurmann","Formateur"),
        new User(4,"marie.duvel@test.com","Marie","DUVEL","mduvel","Secrétaire")
    ];

    public static $formations = [
        // ID, titre
        new Formation(1, "Formation Développeur Web PHP"),
        new Formation(2, "Formation Développeur Java / Android"),
        new Formation(3, "Formation Secrétariat"),
        new Formation(4, "Formation Bureautique"),
    ];

    public static $sessions = [
        // ID, intitule, nbPlaces, dateDebut, dateFin
        new Session(1, "DL1 Web", 15, "18/02/2021", "17/09/2021"),
        new Session(2, "DL2 Java", 15, "18/02/2021", "17/09/2021"),
        new Session(3, "DL3 Secrétariat", 15, "18/02/2021", "17/09/2021"),
        new Session(4, "DL4 Compta", 15, "18/02/2021", "17/09/2021")
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
        new Module(10, "Java")
    ];
}