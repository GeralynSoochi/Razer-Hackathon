from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from flask_sqlalchemy import SQLAlchemy
import json



# ==================================== CONNECTION SPECIFICATION ====================================== #

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root:password@database-1.c9bzkzbvdsli.ap-southeast-1.rds.amazonaws.com:3306/rewards'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)
CORS(app)

class custreward(db.Model):
    __tablename__ = 'custreward'

    username = db.Column(db.String(50), primary_key=True)
    rewardID = db.Column(db.Integer, nullable=False)

    def __init__(self, username, rewardID):
        self.username = username
        self.rewardID = rewardID

    def json(self):
        Cust_rewardEntry = {
            "username": self.username,
            "rewardID": self.rewardID
        }
        return Cust_rewardEntry

    def set_rewardID(self, update):
        self.rewardID = update
        return True
    
    def set_AccountID(self, update):
        self.username = update
        return True
    

#### REWARDS 
class rewards(db.Model):
    __tablename__ = 'rewards'

    rewardID = db.Column(db.Integer, primary_key=True)
    item = db.Column(db.String(50), nullable=True)
    quantity = db.Column(db.Integer, nullable=True)
    rewardValue = db.Column(db.Integer, nullable=True)
    rewardType =  db.Column(db.String(50), nullable=True)
    bossID = db.Column(db.Integer)


    def __init__(self, rewardID, item, quantity, rewardValue, rewardType, bossID):
        self.item = item
        self.rewardID = rewardID
        self.quantity = quantity
        self.rewardValue = rewardValue
        self.rewardType = rewardType
        self.bossID = bossID


    def json(self):
        reward_mast_entry = {
            "rewardID": self.rewardID,
            "item": self.item,
            "quantity": self.quantity,
            "rewardValue": self.rewardValue,
            "rewardType": self.rewardType,
            "bossID": self.bossID
        }
        return reward_mast_entry

@app.route("/retrieveRedeemableRewards/<int:points>")
def retrieveRedeemableRewards( points):
    # retrieve user information 
    rwds = rewards.query.filter(points >= rewards.rewardValue, rewards.bossID.is_(None), rewards.quantity > 0).all()
    r = []
    for rwd in rwds:
        r.append(rwd.json())
    return jsonify(r)

@app.route ("/updateRewardQuantity/<int:rewardID>", methods = ["PUT"])
def updateRewardQuantity (rewardID):
    rwd = rewards.query.get(rewardID)
    rwd.quantity -= 1
    db.session.commit()
    return jsonify (True)
    
if __name__=='__main__':
    app.run(host='0.0.0.0',port=5002, debug=True)
