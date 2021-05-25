# MCD

## Entités

### Stagiaire

- id : int
- nom : string(30)
- prenom : string(30)
- email : string(100)
- adresse : string(50)
- cp : string(10)
- ville : string(100)
- telephone : string(20)
- nPoleEmploi : string(10)

### Utilisateur

- id : int
- email : string(100)
- nom : string(30)
- prenom : string(30)
- password: string(255)
- role : string(20)

### Session

- id : int
- intitule : string(10)
- nbPlaces : int
- dateDebut : datetime
- dateFin : datetime

### Formation

- id : int
- titre : string(100)

### Module

- id : int
- nom : string(50)

### Lieu

- id : int
- ville : string(100)
- cp : string(10)

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