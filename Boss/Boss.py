from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from flask_sqlalchemy import SQLAlchemy
import json
import random


# ==================================== CONNECTION SPECIFICATION ====================================== #
app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root:password@database-1.c9bzkzbvdsli.ap-southeast-1.rds.amazonaws.com:3306/boss'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db = SQLAlchemy(app)
CORS(app)


class Boss(db.Model):
    __tablename__ = 'boss'

    bossID = db.Column(db.Integer, primary_key=True)
    bossType = db.Column(db.Boolean, primary_key=False)
    bossName = db.Column(db.String(50), primary_key=False)

    def __init__(self, bossID,bossType,bossName):
        self.bossName = bossName
        self.bossID = bossID
        self.bossType = bossType

    def json(self):
        bossInfo = {
            "bossID": self.bossID,
            "bossType": self.bossType,
            "bossName": self.bossName,
        }
        return bossInfo
    

#### REWARDS 
class Questions(db.Model):
    __tablename__ = 'questions'

    questionNumber = db.Column(db.Integer, primary_key=True)
    questionPrompt = db.Column(db.String(300), primary_key=False)
    optionOne = db.Column(db.String(50), primary_key=False)
    optionTwo = db.Column(db.String(50), primary_key=False)
    optionThree=  db.Column(db.String(50), primary_key=False)
    optionFour = db.Column(db.String(50), primary_key=False)
    answer = db.Column(db.Integer, primary_key=False) # this is the option number

    def __init__(self, questionNumber, questionPrompt, optionOne, optionTwo, optionThree, optionFour, answer):
        self.questionNumber = questionNumber
        self.questionPrompt = questionPrompt
        self.optionOne = optionOne
        self.optionTwo = optionTwo
        self.optionThree = optionThree
        self.optionFour = optionFour
        self.answer = answer

    def json(self):
        questionInfo = {
            "questionNumber" : self.questionNumber,
            "questionPrompt" : self.questionPrompt ,
            "optionOne" : self.optionOne,
            "optionTwo" : self.optionTwo,
            "optionThree" : self.optionThree,
            "optionFour" : self.optionFour,
            "answer" : self.answer
        }
        return questionInfo

@app.route("/getMiniBoss")
def getMiniBoss ():
    queryBosses = Boss.query.filter_by(bossType=0)
    bossesClass = []
    for boss in queryBosses: 
        bossesClass.append(boss.json())
    boss = random.randrange(len(bossesClass))
    return jsonify(bossesClass[boss])


@app.route("/getMainBoss")
def getMainBoss ():
    queryBosses = Boss.query.filter_by(bossType=1)
    bossesClass = []
    for boss in queryBosses: 
        bossesClass.append(boss.json())
    boss = random.randrange(len(bossesClass))
    if "quiz" in bossesClass[boss]['bossName']:
        questions = {"Questions": [question.json() for question in Questions.query.all()]}
        return jsonify(questions)
    return jsonify(False)
    # add on for the other mainbosses



if __name__=='__main__':
    app.run(host='0.0.0.0',port=5003, debug=True)
