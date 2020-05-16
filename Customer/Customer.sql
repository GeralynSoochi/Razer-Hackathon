
DROP DATABASE IF EXISTS customer;

CREATE DATABASE customer;
USE customer; 


CREATE TABLE customer (
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    postalcode CHAR(6) NOT NULL,
    accountID VARCHAR(50) NOT null,
    points INT NOT NULL DEFAULT 0,
    encodedKey VARCHAR(100) NOT NULL,
    PRIMARY KEY (accountID)
) ;
