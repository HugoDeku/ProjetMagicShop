CREATE TABLE Utilisateur(
  id INTEGER PRIMARY KEY,
  nom TEXT,
  mail TEXT,
  password TEXT UNIQUE
);

CREATE TABLE Offre(
  ref INTEGER PRIMARY KEY,
  titre TEXT,
  description TEXT,
  type INTEGER,
  prix FLOAT,
  datePublication DATE,
  utilisateur REFERENCES Utilisateur
);

CREATE TABLE Type(
  ref INTEGER PRIMARY KEY,
  texteCorrespondant TEXT
);
