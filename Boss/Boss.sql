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
