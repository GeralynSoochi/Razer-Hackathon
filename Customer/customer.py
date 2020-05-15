from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from flask_sqlalchemy import SQLAlchemy
import json


# ==================================== CONNECTION SPECIFICATION ====================================== #
app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root:password@root:password@database-1.c9bzkzbvdsli.ap-southeast-1.rds.amazonaws.com:3306/customer'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)
CORS(app)

class Customer(db.Model):
    __tablename__ = 'booking'

    name = db.Column(db.String(50), primary_key=True)
    address = db.Column(db.String(50), nullable=False)
    contactno = db.Column(db.String(50), nullable=True)
    accountid = db.Column(db.Integer, nullable=True)


    def __init__(self, name, address, contactno, accountid):
        self.name = name
        self.address = address
        self.contactno = contactno
        self.accountid = accountid


    def json(self):
        customer_entry = {
            "name": self.name,
            "address": self.address,
            "contactno": self.contactno,
            "accountid": self.accountid
        }
        return customer_entry

    def set_name(self, update):
        self.name = update
        return True
    
    def set_contactno(self, update):
        self.contactno = update
        return True
    
    def set_address(self, update):
        self.address = update
        return True
    
    
class accCb(db.Model):
    __tablename__ = 'Account'

    status = db.Column(db.String(50), primary_key=True)
    pendingcashback = db.Column(db.Float(2), nullable=True)
    accountid = db.Column(db.Integer, nullable=True)


    def __init__(self, accountid, pendingcashback, status):
        self.accountid = accountid
        self.pendingcashback = pendingcashback
        self.status = status

    def json(self):
        accCb_entry = {
            "accountid": self.accountid,
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
@app.route("/Customers", methods=['GET'])
def get_all():
    return jsonify({"Customers": [customer.json() for customer in Customer.query.all()]})

# retrieve a particular customer   
@app.route("/getCustomer/<string:AccountID>", methods=["GET"])
@cross_origin(supports_credentials=True)
def getProducts(AccountID):
    Customer = Customer.query.get(AccountID)
    Customer = Customer.json()
    return jsonify(Customer)

# Creating a new Customer Record , not sure how the data gonna be passed 

#retreive a list of customer cashbacks
@app.route("/allCustomerCashBack/<string:accountID>", methods=['GET'])
@cross_origin(supports_credentials=True)
def UserProductProgress(accountID):
    # print(username)
    All_CB = accCb.query.filter_by(accountID=accountID).all()
    if All_CB:
        return jsonify({"CashBacks":[cb.json() for cb in All_CB.query.filter_by(accountID=accountID).all() ]}), 200
    else: 
        return jsonify(False), 404

if __name__=='__main__':
    app.run(host='0.0.0.0',port=5001, debug=True)
