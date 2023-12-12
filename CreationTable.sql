CREATE TABLE CD
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(50),
    artiste VARCHAR(50),
    genre VARCHAR(50),
    prix INT,
    pochette VARCHAR(50)

)


    
    <cd>
        <titre>Abbey Road</titre>
        <artiste>The Beatles</artiste>
        <genre>Rock</genre>
        <prix>22.99</prix>
        <pochette>images/abbey_road.jpg</pochette>
    </cd>
-- Insertion
INSERT INTO CD (titre, artiste, genre, prix, pochette) 
VALUES ('Dark Side of the Moon', 'Pink Floyd', 'Rock progressif', 19, 'images/dark_side_of_the_moon.jpg');

INSERT INTO CD (titre, artiste, genre, prix, pochette) 
VALUES ('Thriller', 'Michael Jackson', 'Pop', 16, 'images/thriller.jpg');

INSERT INTO CD (titre, artiste, genre, prix, pochette) 
VALUES ('Abbey Road', 'The Beatles', 'Rock', 23, 'images/abbey_road.jpg');