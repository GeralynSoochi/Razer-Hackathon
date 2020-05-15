from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from flask_sqlalchemy import SQLAlchemy
import json


# ==================================== CONNECTION SPECIFICATION ====================================== #
app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root:password@database-1.c9bzkzbvdsli.ap-southeast-1.rds.amazonaws.com:3306/customer'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)
CORS(app)

class Customer(db.Model):
    __tablename__ = 'customer'

    username = db.Column(db.String(50), primary_key=True)
    password = db.Column(db.String(50), primary_key=True)
    postalcode = db.Column(db.String(50), nullable=False)
    accountID = db.Column(db.String(50), nullable=False)

    def __init__(self, username,password ,postalcode, accountID):
        self.username = username
        self.postalcode = postalcode
        self.password = password
        self.accountID = accountID

    def json(self):
        customer_entry = {
            "username": self.username,
            "password": self.password,
            "postalcode": self.postalcode,
            "accountID": self.accountID
        }
        return customer_entry

    def set_username(self, update):
        self.username = update
        return True
    
    def set_password(self, update):
        self.password = update
        return True 
    
    def set_postalcode(self, update):
        self.postalcode = update
        return True
    
    
class accCb(db.Model):
    __tablename__ = 'account'

    status = db.Column(db.String(50), primary_key=True)
    pendingcashback = db.Column(db.Float(2), nullable=True)
    accountID = db.Column(db.String(50), nullable=True)


    def __init__(self, accountID, pendingcashback, status):
        self.accountID = accountID
        self.pendingcashback = pendingcashback
        self.status = status

    def json(self):
        accCb_entry = {
            "accountID": self.accountID,
            "pendingcashback": self.pendingcashback,
            "status": self.status
        }
        return accCb_entry

    def set_pendingcashback(self, update):
        self.pendingcashback = update
        return True

    def set_status(self, update):
        self.status = update
        return True

# retrieve all customer 
@app.route("/customers", methods=['GET'])
def get_all():
    return jsonify({"Customers": [customer.json() for customer in Customer.query.all()]})

# retrieve a particular customer   
@app.route("/getCustomer/<string:accountID>", methods=["GET"])
@cross_origin(supports_credentials=True)
def getCustomer(accountID):
    All_CB = Customer.query.filter_by(accountID=accountID).all()
    if All_CB:
        return jsonify({"CustomerParticulars":[cb.json() for cb in All_CB ]}), 200
    else: 
        return jsonify(False), 404

# Creating a new Customer Record , not sure how the data gonna be passed 
# rmb account id is created ussing UUID lmk who is doing this i can provide the code 


#retreive a list of customer cashbacks
@app.route("/oneCustomerCb/<string:accountID>", methods=['GET'])
@cross_origin(supports_credentials=True)
def particularCashBack(accountID):
    All_CB = accCb.query.filter_by(accountID=accountID).all()
    if All_CB:
        return jsonify({"CashBacks":[cb.json() for cb in All_CB]}), 200
    else: 
        return jsonify(False), 404

if __name__=='__main__':
    app.run(host='0.0.0.0',port=5001, debug=True)
