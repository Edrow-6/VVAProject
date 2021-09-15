CREATE TABLE etats_reservations (
  code varchar(2) NOT NULL, 
  nom  varchar(15), 
  PRIMARY KEY (code));
CREATE TABLE hebergements (
  numero        int(4) NOT NULL AUTO_INCREMENT, 
  code_type     varchar(5) NOT NULL, 
  nom           varchar(40), 
  nb_place      int(2), 
  surface       int(3), 
  internet      tinyint, 
  annee         int(4), 
  secteur       varchar(15), 
  orientation   varchar(5), 
  etat          varchar(32), 
  description   varchar(200), 
  photo         varchar(255), 
  tarif_semaine decimal(7, 2), 
  PRIMARY KEY (numero));
CREATE TABLE reservations (
  numero             int(5) NOT NULL AUTO_INCREMENT, 
  id_utilisateur     int(8) NOT NULL, 
  date_debut_semaine date NOT NULL, 
  num_hebergement    int(4) NOT NULL, 
  code_etat          varchar(2) NOT NULL, 
  `date`             int(11), 
  date_arrivee       int(11), 
  montant_arrivee    decimal(7, 2), 
  nb_occupant        int(2), 
  tarif_semaine      decimal(7, 2), 
  PRIMARY KEY (numero));
CREATE TABLE semaines (
  date_debut date NOT NULL, 
  date_fin   date DEFAULT NULL, 
  PRIMARY KEY (date_debut));
CREATE TABLE types_hebergements (
  code varchar(5) NOT NULL, 
  nom  varchar(30), 
  PRIMARY KEY (code));
CREATE TABLE utilisateurs (
  id                int(8) NOT NULL AUTO_INCREMENT, 
  fournisseur_oauth varchar(10) NOT NULL, 
  uid_oauth         varchar(100) NOT NULL, 
  nom               varchar(40) NOT NULL, 
  prenom            varchar(40) NOT NULL, 
  pseudo            varchar(50) NOT NULL, 
  email             varchar(100) NOT NULL, 
  position          varchar(100) DEFAULT 'NULL', 
  photo             varchar(255) NOT NULL, 
  lien              varchar(255) NOT NULL, 
  mot_de_passe      varchar(20) DEFAULT 'NULL', 
  numero_tel        varchar(15) DEFAULT 'NULL', 
  numero_port       varchar(15) DEFAULT 'NULL', 
  type_compte       varchar(5) DEFAULT 'NULL', 
  date_inscription  date DEFAULT NULL, 
  date_ferme        date DEFAULT NULL, 
  cree_le           timestamp DEFAULT current_timestamp() NOT NULL, 
  modifie_le        timestamp DEFAULT current_timestamp() NOT NULL, 
  PRIMARY KEY (id));
ALTER TABLE reservations ADD CONSTRAINT fk_etats_reservations_reservations FOREIGN KEY (code_etat) REFERENCES etats_reservations (code) ON UPDATE Restrict ON DELETE Restrict;
ALTER TABLE reservations ADD CONSTRAINT fk_reservations_hebergements FOREIGN KEY (num_hebergement) REFERENCES hebergements (numero) ON UPDATE Restrict ON DELETE Restrict;
ALTER TABLE reservations ADD CONSTRAINT fk_semaines_reservations FOREIGN KEY (date_debut_semaine) REFERENCES semaines (date_debut) ON UPDATE Restrict ON DELETE Restrict;
ALTER TABLE hebergements ADD CONSTRAINT fk_types_hebergements_hebergements FOREIGN KEY (code_type) REFERENCES types_hebergements (code) ON UPDATE Restrict ON DELETE Restrict;
ALTER TABLE reservations ADD CONSTRAINT fk_utilisateurs_reservations FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs (id) ON UPDATE Restrict ON DELETE Restrict;

