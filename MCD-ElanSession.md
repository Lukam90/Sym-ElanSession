# MCD

## Entités

### Utilisateur

- id : int
- email : string(100) not null
- nom : string(30) not null
- prenom : string(30) not null
- password: string(255) not null
- role : string(20) not null

### Stagiaire

- id : int
- nom : string(30) not null
- prenom : string(30) not null
- email : string(100) not null
- adresse : string(100) not null
- cp : string(10) not null
- ville : string(100) not null
- telephone : string(20) not null
- nPoleEmploi : string(10) null

### Session

- id : int
- intitule : string(10) not null
- nbPlaces : int not null
- dateDebut : datetime not null
- dateFin : datetime not null

### Formation

- id : int
- titre : string(100) not null

### Module

- id : int
- nom : string(50) not null

### Lieu

- id : int
- ville : string(100) not null
- cp : string(10) not null

## Relations

### Stagiaire - Session

**stagiaire.sessions** (Stagiaire, ManyToMany, nullable)

Un stagiaire participe à aucune ou plusieurs sessions. (0,n)

**session.stagiaires** (Session, ManyToMany, nullable)

### Session - Lieu

id_lieu

**session.lieu** (Session, ManyToOne)

Une session se déroule dans un seul lieu. (1,1)

**lieu.sessions** (Lieu, OneToMany, nullable)

Un lieu est concerné par aucune ou plusieurs sessions. (0,n)

### Session - Formation

id_formation

**session.formation** (Session, ManyToOne)

Une session concerne une seule formation. (1,1)

**formation.sessions** (Formation, OneToMany, nullable)

Une formation concerne aucune ou plusieurs sessions. (0,n)

### Formation - Module

id_module

**formation.modules** (Formation, ManyToMany)

Une formation contient un ou plusieurs modules. (1,n)

**module.formations** (Module, ManyToMany, nullable)

Un module concerne aucune ou plusieurs formations. (0,n)
