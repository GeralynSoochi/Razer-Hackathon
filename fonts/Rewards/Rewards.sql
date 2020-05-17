DROP DATABASE IF EXISTS rewards;

CREATE DATABASE rewards;
USE rewards; 


CREATE TABLE rewards (
	rewardID INT NOT NULL,
    item VARCHAR(50) NOT NULL, 
    rewardType VARCHAR(50) NOT NULL, 
    quantity INT NOT NULL,
    rewardValue INT NOT NULL,
    bossID INT,
    PRIMARY KEY (rewardID)
);


CREATE TABLE customerrewards (
    username VARCHAR(50) NOT NULL,
	rewardID INT NOT NULL,
    PRIMARY KEY (username) 
);

INSERT INTO rewards VALUES (1, "$5 Grab voucher", "voucher", 90, 1500, NULL);
INSERT INTO rewards VALUES (2, "$5 Food Panda Voucher", "voucher", 90, 1500, NULL);
INSERT INTO rewards VALUES (3, "$7 Donation to Charity", "donation", 90, 1500, NULL);
INSERT INTO rewards VALUES (4, "$15 Donation to Charity", "donation", 90, 2800, NULL);
INSERT INTO rewards VALUES (5, "$10 Food Panda Voucher", "voucher", 90, 2800, NULL);
INSERT INTO rewards VALUES (6, "$10 Grab voucher", "voucher",90, 4000, NULL);
INSERT INTO rewards VALUES (7, "$30 Donation to Charity", "donation", 90, 4000, NULL);
INSERT INTO rewards VALUES (8, "$20 Food Panda Voucher", "voucher",90, 4000, NULL);
INSERT INTO rewards VALUES (9, "$20 Grab Voucher", "voucher", 90, 4000, NULL);

INSERT INTO rewards VALUES (10, "10 points", "Main Boss Rewards", 90, 0, 1);
INSERT INTO rewards VALUES (11, "20 points", "Main Boss Rewards", 90, 0, 1);
INSERT INTO rewards VALUES (12, "30 points", "Main Boss Rewards", 90, 0, 1);
INSERT INTO rewards VALUES (13, "40 points", "Main Boss Rewards", 90, 0, 1);
INSERT INTO rewards VALUES (14, "50 points", "Main Boss Rewards", 90, 0, 1);
INSERT INTO rewards VALUES (15, "100 points", "Main Boss Rewards", 90, 0, 1);
INSERT INTO rewards VALUES (16, "20 points", "Mini Boss Rewards", 90, 0, 2);