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
    questionPrompt VARCHAR (1000) NOT NULL,  
	optionOne VARCHAR (200) NOT NULL,
	optionTwo VARCHAR (200) NOT NULL,
	optionThree VARCHAR (200) NOT NULL,
	optionFour VARCHAR (200) NOT NULL,
    answer VARCHAR (200) NOT NULL, 
    PRIMARY KEY (questionNumber)
);



INSERT INTO boss VALUES (1, 1, "quiz");
INSERT INTO boss VALUES (2, 0, "Post a picture of yourself exercising");

# credits: https://www.forbes.com/sites/maggiemcgrath/2015/11/18/in-a-global-test-of-financial-literacy-the-u-s/#37977cab58f0
INSERT INTO questions VALUES (1, "Suppose you have some money. Is it safer to put your money into one business or investment, or to put your money into multiple businesses or investments?","one business or investment","multiple businesses or investments","don’t know","refuse to answer", "multiple businesses or investments");
INSERT INTO questions VALUES (2, "Suppose over the next 10 years the prices of the things you buy double. If your income also doubles, will you be able to buy less than you can buy today, the same as you can buy today, or more than you can buy today?","less","more","the same","don't know", "more");
INSERT INTO questions VALUES (3, "Suppose you need to borrow 100 US dollars. Which is the lower amount to pay back: 105 US dollars or 100 US dollars plus three percent?","105 US dollars","105 US dollars plus 3 percent","don’t know","refuse to answer", "105 US dollars plus 3 percent");
INSERT INTO questions VALUES (4, "Suppose you put money in the bank for two years and the bank agrees to add 15 percent per year to your account. Will the bank add more money to your account the second year than it did the first year, or will it add the same amount of money both years?","more","the same", "don't know","refuse to answer", "more");
INSERT INTO questions VALUES (5, "Suppose you had 100 US dollars in a savings account and the bank adds 10 percent per year to the account. How much money would you have in the account after five years if you did not remove any money from the account?","more than 150 dollars","exactly 150 dollars","less than 150 dollars","don't know", "less than 150 dollars");
# credits: https://quizizz.com/admin/quiz/5a9592b24faf050019eec5b1/finlit-quiz
INSERT INTO questions VALUES (6, "What is the percent of children's social security card stolen?","15%","5%","20%","10%", "10%");
INSERT INTO questions VALUES (7, "Is fixing your cards and stuff from a stolen identitty time consuming?","Yes","No","Maybe","Don't know", "Yes");
INSERT INTO questions VALUES (8, "Should you be aware of your payments on your debit of credit card?","Yes","No","Maybe","Don't know", "Yes");
INSERT INTO questions VALUES (9, "How much time could you spend time in jail for identity theft?","1 year","1 month","3 years","5 years", "5 years");
INSERT INTO questions VALUES (10, "How many people have their identity stolen?","1 million","5 million","10 million","15 million", "15 million");
INSERT INTO questions VALUES (11, "What is not a way to prevent identity theft?","Ignore email scams","Don't give out your social security number","Stay away from computer viruses","Carry your social security card with you all the time", "Carry your social security card with you all the time");
