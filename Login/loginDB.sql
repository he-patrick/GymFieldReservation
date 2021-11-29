CREATE DATABASE loginDB;

CREATE TABLE loginInfo{
    personID int NOT NULL AUTO_INCREMENT,
    username VARCHAR(255),
    passcode VARCHAR(255)
}

INSERT INTO loginInfo (username, passcode)
VALUES ('megan.port@ocdsb.ca', 'earlathletics'); 

