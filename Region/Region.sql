DROP DATABASE IF EXISTS region;

CREATE DATABASE region;
USE region; 


CREATE TABLE region (
	regionID INT NOT NULL,
    regionName VARCHAR (5) NOT NULL,
    points INT NOT NULL,
    spawnDate CHAR(8),
    PRIMARY KEY (regionID)
);
