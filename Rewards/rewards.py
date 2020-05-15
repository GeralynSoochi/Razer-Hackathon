from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from flask_sqlalchemy import SQLAlchemy
import json


# ==================================== CONNECTION SPECIFICATION ====================================== #

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://admin:database-1.c9bzkzbvdsli.ap-southeast-1.rds.amazonaws.com:3306/rewards'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)
CORS(app)

class custreward(db.Model):
    __tablename__ = 'custreward'

    AccountID = db.Column(db.Integer, primary_key=True)
    rewardID = db.Column(db.Integer, nullable=False)

    def __init__(self, AccountID, rewardID):
        self.AccountID = AccountID
        self.rewardID = rewardID

    def json(self):
        Cust_rewardEntry = {
            "AccountID": self.AccountID,
            "rewardID": self.rewardID
        }
        return Cust_rewardEntry

    def set_rewardID(self, update):
        self.rewardID = update
        return True
    
    def set_AccountID(self, update):
        self.AccountID = update
        return True
    

#### REWARDS 
class reward_mast(db.Model):
    __tablename__ = 'reward_mast'

    rewardID = db.Column(db.Integer, primary_key=True)
    Rewardvalue = db.Column(db.Float(2), nullable=True)


    def __init__(self, rewardID, Rewardvalue, status):
        self.rewardID = rewardID
        self.Rewardvalue = Rewardvalue


    def json(self):
        reward_mast_entry = {
            "rewardID": self.rewardID,
            "Rewardvalue": self.Rewardvalue
        }
        return reward_mast_entry

    def set_rewardID(self, update):
        self.rewardID = update
        return True

    def set_Rewardvalue(self, update):
        self.Rewardvalue = update
        return True



# Creating a new Customer Record , not sure how the data gonna be passed 

#Retrieve a list of all customer rewrds + value and return it 
@app.route("/AllCustRewards/<string:accountID>", methods=['GET'])
@cross_origin(supports_credentials=True)
def UserProductProgress(accountID):
    All_CB = custreward.query.filter_by(accountID=accountID).all()
    if All_CB:
        # retrieve all unique rewardID 
        # create value list and send back 
        RewardPoints = [] 
        
        
        return jsonify({"CashBacks":[cb.json() for cb in All_CB.query.filter_by(accountID=accountID).all()],
                        "RewardPoints" : [value.json() for value in RewardPoints ]
                        }), 200
    else: 
        return jsonify(False), 404

if __name__=='__main__':
    app.run(host='0.0.0.0',port=5002, debug=True)
