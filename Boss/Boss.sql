DROP DATABASE IF EXISTS boss;

CREATE DATABASE boss;
USE boss; 


CREATE TABLE boss (
	bossID INT NOT NULL,
	bossType BOOLEAN NOT NULL, #1 for main 0 for mini
    bossName VARCHAR(50) NOT NULL,
    PRIMARY KEY (bossID)
);

CREATE TABLE questions ( 
	questionNumber INT NOT NULL AUTO_INCREMENT,
    questionPrompt VARCHAR (300) NOT NULL,  
	optionOne VARCHAR (50) NOT NULL,
	optionTwo VARCHAR (50) NOT NULL,
	optionThree VARCHAR (50) NOT NULL,
	optionFour VARCHAR (50) NOT NULL,
    answer INT NOT NULL, # this is the option number
    PRIMARY KEY (questionNumber)
);



INSERT INTO boss VALUES (1, 1, "quiz");
INSERT INTO boss VALUES (2, 0, "Post a picture of yourself exercising");
INSERT INTO questions VALUES (1, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (2, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (3, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (4, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (5, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (6, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (7, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (8, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (9, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (10, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (11, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (12, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (13, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (14, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (15, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (16, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (17, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (18, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (19, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (20, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (21, "adf","asdf","afd","adsf","adsf", 3);
INSERT INTO questions VALUES (22, "adf","asdf","afd","adsf","adsf", 3);