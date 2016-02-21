-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2016 at 10:00 PM
-- Server version: 5.6.27-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4


SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database:  timetable 
--

-- --------------------------------------------------------

--
-- Table structure for table  classe 
--

CREATE TABLE classe (
idclasse serial NOT NULL,
  codeclass varchar(45) NOT NULL,
  libelleclasse varchar(45) DEFAULT NULL,
  idfiliere integer NOT NULL
);

--
-- Dumping data for table  classe 
--
INSERT INTO classe (idclasse, codeclasse, libelleclasse, idfiliere) VALUES
(1, 'IT1', 'Technologie license 1', 4),
(2, 'IT2', 'Technologie license 2', 3),
(3, 'ELN1', 'Reseau license 1', 4),
(4, 'ELN2', 'Reseau license 2', 4),
(5, 'cx', 'cx', 3),
(6, 'IT4', 'License 4', 4),
(7, 'ELN3', 'License 3', 3);

-- --------------------------------------------------------

--
-- Table structure for table  cours 
--

CREATE TABLE    cours  (
 idcours  serial NOT NULL,
   idmatiere  integer DEFAULT NULL,
   idsalle  integer DEFAULT NULL,
   idprofesseur  integer DEFAULT NULL,
   datedebut  datetime DEFAULT NULL,
   datefin  datetime DEFAULT NULL,
   idclasse  integer NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table  cours 
--

INSERT INTO  cours  ( idcours ,  idmatiere ,  idsalle ,  idprofesseur ,  datedebut ,  datefin ,  idclasse ) VALUES
(1, 1, 2, 2, '2016-02-05 07:30:00', '2016-02-05 09:30:00', 1),
(2, 2, 1, 1, '2016-02-05 10:00:00', '2016-02-05 12:00:00', 2),
(3, 2, 1, 1, '2016-02-05 12:30:00', '2016-02-05 14:30:00', 1),
(4, 4, 1, 2, '2016-02-05 15:00:00', '2016-02-05 18:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table  filiere 
--

CREATE TABLE    filiere  (
 idfiliere  serial NOT NULL,
   codefiliere  varchar(45) DEFAULT NULL,
   libellefiliere  varchar(45) DEFAULT NULL,
   idutilisateur  integer NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table  filiere 
--

INSERT INTO  filiere  ( idfiliere ,  codefiliere ,  libellefiliere ,  idutilisateur ) VALUES
(3, 'IT', 'Technologies Informatiques', 1),
(4, 'ELN', 'Systemes d''informations et Reseau', 1),
(9, 'GEA', 'Genie minerie', 2);

-- --------------------------------------------------------

--
-- Table structure for table  matiere 
--

CREATE TABLE    matiere  (
 idmatiere  serial NOT NULL,
   codematiere  varchar(45) DEFAULT NULL,
   libellematiere  varchar(45) DEFAULT NULL,
   idclasse  integer NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table  professeur 
--

CREATE TABLE   professeur  (
 idprofesseur  serial NOT NULL,
   nomprofesseur  varchar(45) DEFAULT NULL,
   prenomprofesseur  varchar(45) DEFAULT NULL,
   emailprofesseur  varchar(45) DEFAULT NULL,
   contact  varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table  professeur 
--

INSERT INTO  professeur  ( idprofesseur ,  nomprofesseur ,  prenomprofesseur ,  emailprofesseur ,  contact ) VALUES
(1, 'yonli', 'yamba', 'nb@gmail.com', NULL),
(2, 'sonde', 'poulo', 'poul@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table  salle 
--

CREATE TABLE    salle  (
 idsalle  serial NOT NULL,
   codesalle  varchar(45) DEFAULT NULL,
   lieu  varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table  salle 
--

INSERT INTO  salle  ( idsalle ,  codesalle ,  lieu ) VALUES
(1, '14B', 'ANNEXE'),
(2, '18B', 'ANNEXE'),
(3, '16B', 'Annexe');

-- --------------------------------------------------------

--
-- Table structure for table  utilisateur 
--

CREATE TABLE    utilisateur  (
 idutilisateur  serial NOT NULL,
   nomutilisateur  varchar(45) DEFAULT NULL,
   prenomutilisateur  varchar(45) DEFAULT NULL,
   pseudo  varchar(45) DEFAULT NULL,
   motdepasse  varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table  utilisateur 
--

INSERT INTO  utilisateur  ( idutilisateur ,  nomutilisateur ,  prenomutilisateur ,  pseudo ,  motdepasse ) VALUES
(1, 'ouoba', 'soampa', 'soamp', '1234'),
(2, 'ouoba', 'yemba', 'yemba', '0000'),
(3, 'kildjoa', 'ouali', 'kildjoa', '0000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table  classe 
--
ALTER TABLE  classe 
 ADD PRIMARY KEY ( idclasse ), ADD KEY  fk_classe_filiere_idx  ( idfiliere );

--
-- Indexes for table  cours 
--
ALTER TABLE  cours 
 ADD PRIMARY KEY ( idcours ), ADD KEY  fk_cours_matiere_idx  ( idmatiere ), ADD KEY  fk_cours_salle_idx  ( idsalle ), ADD KEY  fk_cours_professeur_idx  ( idprofesseur ), ADD KEY  fk_cours_classe_idx  ( idclasse );

--
-- Indexes for table  filiere 
--
ALTER TABLE  filiere 
 ADD PRIMARY KEY ( idfiliere ), ADD KEY  fk_filiere_utilisateur_idx  ( idutilisateur );

--
-- Indexes for table  matiere 
--
ALTER TABLE  matiere 
 ADD PRIMARY KEY ( idmatiere ), ADD KEY  fk_matiere_classe_idx  ( idclasse );

--
-- Indexes for table  professeur 
--
ALTER TABLE  professeur 
 ADD PRIMARY KEY ( idprofesseur );

--
-- Indexes for table  salle 
--
ALTER TABLE  salle 
 ADD PRIMARY KEY ( idsalle );

--
-- Indexes for table  utilisateur 
--
ALTER TABLE  utilisateur 
 ADD PRIMARY KEY ( idutilisateur );

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table  classe 
--
ALTER TABLE  classe 
MODIFY  idclasse  integer NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table  cours 
--
ALTER TABLE  cours 
MODIFY  idcours  integer NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table  filiere 
--
ALTER TABLE  filiere 
MODIFY  idfiliere  integer NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table  matiere 
--
ALTER TABLE  matiere 
MODIFY  idmatiere  integer NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table  professeur 
--
ALTER TABLE  professeur 
MODIFY  idprofesseur  integer NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table  salle 
--
ALTER TABLE  salle 
MODIFY  idsalle  integer NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table  utilisateur 
--
ALTER TABLE  utilisateur 
MODIFY  idutilisateur  integer NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table  classe 
--
ALTER TABLE  classe 
ADD CONSTRAINT  fk_classe_filiere  FOREIGN KEY ( idfiliere ) REFERENCES  filiere  ( idfiliere ) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table  cours 
--
ALTER TABLE  cours 
ADD CONSTRAINT  fk_cours_classe  FOREIGN KEY ( idclasse ) REFERENCES  classe  ( idclasse ) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT  fk_cours_matiere  FOREIGN KEY ( idmatiere ) REFERENCES  matiere  ( idmatiere ) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT  fk_cours_professeur  FOREIGN KEY ( idprofesseur ) REFERENCES  professeur  ( idprofesseur ) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT  fk_cours_salle  FOREIGN KEY ( idsalle ) REFERENCES  salle  ( idsalle ) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table  filiere 
--
ALTER TABLE  filiere 
ADD CONSTRAINT  fk_filiere_utilisateur  FOREIGN KEY ( idutilisateur ) REFERENCES  utilisateur  ( idutilisateur ) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table  matiere 
--
ALTER TABLE  matiere 
ADD CONSTRAINT  fk_matiere_classe  FOREIGN KEY ( idclasse ) REFERENCES  classe  ( idclasse ) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
