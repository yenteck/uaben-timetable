CREATE TABLE    utilisateur  (
 idutilisateur  int auto_increment PRIMARY KEY NOT NULL,
   nomutilisateur  varchar(45) DEFAULT NULL,
   prenomutilisateur  varchar(45) DEFAULT NULL,
   pseudo  varchar(45) DEFAULT NULL,
   motdepasse  varchar(45) DEFAULT NULL
) ;

--
-- Dumping data for table  utilisateur 


INSERT INTO  utilisateur  ( idutilisateur ,  nomutilisateur ,  prenomutilisateur ,  pseudo ,  motdepasse ) VALUES
(1, 'ouoba', 'soampa', 'soamp', '1234'),
(2, 'ouoba', 'yemba', 'yemba', '0000'),
(3, 'kildjoa', 'ouali', 'kildjoa', '0000');



CREATE TABLE    filiere  (
 idfiliere  int auto_increment PRIMARY KEY NOT NULL,
   codefiliere  varchar(45) DEFAULT NULL,
   libellefiliere  varchar(45) DEFAULT NULL,
   idutilisateur  int(11) NOT NULL
) ;

--
-- Dumping data for table  filiere 
--


 ALTER TABLE  filiere 
ADD CONSTRAINT  fk_filiere_utilisateur  FOREIGN KEY ( idutilisateur ) REFERENCES  utilisateur  ( idutilisateur ) ON DELETE NO ACTION ON UPDATE NO ACTION;




INSERT INTO  filiere  ( idfiliere ,  codefiliere ,  libellefiliere ,  idutilisateur ) VALUES
(3, 'IT', 'Technologies Informatiques', 1),
(4, 'ELN', 'Systemes d''informations et Reseau', 1),
(9, 'GEA', 'Genie minerie', 2);



CREATE TABLE classe (
idclasse int auto_increment PRIMARY KEY NOT NULL,
  codeclasse varchar(45) NOT NULL,
  libelleclasse varchar(45) DEFAULT NULL,
  idfiliere int(11) NOT NULL
);

--
-- Dumping data for table  classe 
ALTER TABLE  classe 
 ADD PRIMARY KEY ( idclasse );

ALTER TABLE  classe 
ADD CONSTRAINT  fk_classe_filiere  FOREIGN KEY ( idfiliere ) REFERENCES  filiere  ( idfiliere ) ON DELETE NO ACTION ON UPDATE NO ACTION;


--
INSERT INTO classe (idclasse, codeclasse, libelleclasse, idfiliere) VALUES
(1, 'IT1', 'Technologie license 1', 4),
(2, 'IT2', 'Technologie license 2', 3),
(3, 'ELN1', 'Reseau license 1', 4),
(4, 'ELN2', 'Reseau license 2', 4),
(5, 'cx', 'cx', 3),
(6, 'IT4', 'License 4', 4),
(7, 'ELN3', 'License 3', 3);






CREATE TABLE    matiere  (
 idmatiere  int auto_increment PRIMARY KEY NOT NULL,
   codematiere  varchar(45) DEFAULT NULL,
   libellematiere  varchar(45) DEFAULT NULL,
   idclasse  int(11) NOT NULL
) ;

ALTER TABLE  matiere 
 ADD PRIMARY KEY ( idmatiere );


 ALTER TABLE  matiere 
ADD CONSTRAINT  fk_matiere_classe  FOREIGN KEY ( idclasse ) REFERENCES  classe  ( idclasse ) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Dumping data for table  matiere 
--

INSERT INTO  matiere  ( idmatiere ,  codematiere ,  libellematiere ,  idclasse ) VALUES
(1, 'ALGO', 'Algorithmique', 1),
(2, 'EL', 'Electronique', 2),
(4, 'C', 'Langage C', 1),
(5, 'C', 'Langage C', 2),
(6, 'COMPTA', 'Comptabilite', 2),
(7, 'RESEAU', 'Reseau', 3),
(10, 'ESP', 'enregi iie', 2);

-- -----------------------------



CREATE TABLE    salle  (
 idsalle  int auto_increment PRIMARY KEY NOT NULL,
   codesalle  varchar(45) DEFAULT NULL,
   lieu  varchar(45) NOT NULL
) ;


ALTER TABLE `salle`
 ADD PRIMARY KEY (`idsalle`);
--
-- Dumping data for table  salle 
--

INSERT INTO  salle  ( idsalle ,  codesalle ,  lieu ) VALUES
(1, '14B', 'ANNEXE'),
(2, '18B', 'ANNEXE'),
(3, '16B', 'Annexe');






CREATE TABLE   professeur  (
 idprofesseur  int auto_increment PRIMARY KEY NOT NULL,
   nomprofesseur  varchar(45) DEFAULT NULL,
   prenomprofesseur  varchar(45) DEFAULT NULL,
   emailprofesseur  varchar(45) DEFAULT NULL,
   contact  varchar(45) DEFAULT NULL
) ;

--
-- Dumping data for table  professeur 
--

INSERT INTO  professeur  ( idprofesseur ,  nomprofesseur ,  prenomprofesseur ,  emailprofesseur ,  contact ) VALUES
(1, 'yonli', 'yamba', 'nb@gmail.com', NULL),
(2, 'sonde', 'poulo', 'poul@gmail.com', NULL);







CREATE TABLE    cours  (
 idcours  int auto_increment PRIMARY KEY NOT NULL,
   idmatiere  int(11) NOT NULL,
   idsalle  int(11) NOT NULL,
   idprofesseur  int(11) NOT NULL,
   datedebut  timestamp  NOT  NULL,
   datefin  timestamp NOT NULL,
   idclasse  int(11) NOT NULL
) ;

ALTER TABLE  cours 
 ADD PRIMARY KEY ( idcours );


 ALTER TABLE  cours 
ADD CONSTRAINT  fk_cours_classe  FOREIGN KEY ( idclasse ) REFERENCES  classe  ( idclasse ) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT  fk_cours_matiere  FOREIGN KEY ( idmatiere ) REFERENCES  matiere  ( idmatiere ) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT  fk_cours_professeur  FOREIGN KEY ( idprofesseur ) REFERENCES  professeur  ( idprofesseur ) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT  fk_cours_salle  FOREIGN KEY ( idsalle ) REFERENCES  salle  ( idsalle ) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Dumping data for table  cours 
--

INSERT INTO  cours  ( idcours ,  idmatiere ,  idsalle ,  idprofesseur ,  datedebut ,  datefin ,  idclasse ) VALUES
(1, 1, 2, 2, '2016-02-05 07:30:00', '2016-02-05 09:30:00', 1),
(2, 2, 1, 1, '2016-02-05 10:00:00', '2016-02-05 12:00:00', 2),
(3, 2, 1, 1, '2016-02-05 12:30:00', '2016-02-05 14:30:00', 1),
(4, 4, 1, 2, '2016-02-05 15:00:00', '2016-02-05 18:00:00', 1);