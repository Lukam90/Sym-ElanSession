# MCD

## Entités

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

### Utilisateur

- id : int
- email : string(100) not null
- nom : string(30) not null
- prenom : string(30) not null
- password: string(255) not null
- role : string(20) not null

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

Un stagiaire participe à aucune ou plusieurs sessions. (0,n)

Un session a aucun ou plusieurs stagiaires (0,n)

### Session - Lieu

Une session se déroule dans un seul lieu. (1,1)

Un lieu est concerné par aucune ou plusieurs sessions. (0,n)

### Session - Formation

Une session concerne une seule formation. (1,1)

Une formation concerne aucune ou plusieurs sessions. (0,n)

### Formation - Module

Une formation contient un ou plusieurs modules. (1,n)

Un module concerne aucune ou plusieurs formations. (0,n)