DROP DATABASE IF EXISTS rewards;

CREATE DATABASE rewards;
USE rewards; 


CREATE TABLE rewards (
	rewardID INT NOT NULL,
    item VARCHAR(50) NOT NULL, 
    quantity INT NOT NULL,
    PRIMARY KEY (rewardID)
);


CREATE TABLE customerrewards (
    username VARCHAR(50) NOT NULL,
	rewardID INT NOT NULL,
    PRIMARY KEY (username) 
);