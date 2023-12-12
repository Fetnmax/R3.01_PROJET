CREATE TABLE CD
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(50),
    artiste VARCHAR(50),
    genre VARCHAR(50),
    prix INT,
    pochette VARCHAR(50)

)

CREATE TABLE USER
(
    userName VARCHAR(50) PRIMARY KEY,
    mdp VARCHAR(50),
    idPanier INT FOREIGN KEY REFERENCES PANIER.id

)

CREATE TABLE PANIER
(
    id INT PRIMARY KEY,
    
)
    
-- Insertion
INSERT INTO CD (titre, artiste, genre, prix, pochette) 
VALUES ('Dark Side of the Moon', 'Pink Floyd', 'Rock progressif', 19, 'images/dark_side_of_the_moon.jpg');

INSERT INTO CD (titre, artiste, genre, prix, pochette) 
VALUES ('Thriller', 'Michael Jackson', 'Pop', 16, 'images/thriller.jpg');

INSERT INTO CD (titre, artiste, genre, prix, pochette) 
VALUES ('Abbey Road', 'The Beatles', 'Rock', 23, 'images/abbey_road.jpg');