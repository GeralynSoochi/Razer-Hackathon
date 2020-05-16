DROP DATABASE IF EXISTS customer;

CREATE DATABASE customer;
USE customer; 


CREATE TABLE customer (
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    postalcode CHAR(6) NOT NULL,
    accountID VARCHAR(50),
    points INT NOT NULL DEFAULT 0,
    savingsReward BOOLEAN,
    PRIMARY KEY (username)
) ;
