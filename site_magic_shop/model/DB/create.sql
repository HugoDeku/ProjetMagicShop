CREATE TABLE Utilisateur(
  nom TEXT UNIQUE PRIMARY KEY,
  mail TEXT,
  password TEXT
);

CREATE TABLE Offre(
  ref INTEGER PRIMARY KEY,
  titre TEXT,
  description TEXT,
  type INTEGER,
  prix FLOAT,
  datePublication DATE,
  utilisateur FOREIGN KEY REFERENCES Utilisateur(nom)
);

CREATE TABLE Type(
  ref INTEGER PRIMARY KEY,
  texteCorrespondant TEXT
);
