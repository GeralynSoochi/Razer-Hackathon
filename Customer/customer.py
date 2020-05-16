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
    password = db.Column(db.String(50), primary_key=False)
    postalCode = db.Column(db.String(50), nullable=False)
    accountID = db.Column(db.String(50), nullable=False)
    points = db.Column(db.Integer)
    savingsReward = db.Column(db.Boolean)


    def __init__(self, username, password ,postalCode, accountID):
        self.username = username
        self.postalCode = postalCode
        self.password = password
        self.accountID = accountID
        self.points = 0
        self.savingsReward = False

    def json(self):
        customer_entry = {
            "username": self.username,
            "password": self.password,
            "postalcode": self.postalCode,
            "accountID": self.accountID,
            "points" : self.points,
            "savingsReward" : self.savingsReward
        }
        return customer_entry

# retrieve all customer 
@app.route("/customers", methods=['GET'])
def get_all():
    return jsonify({"Customers": [customer.json() for customer in Customer.query.all()]})

    
@app.route("/newCustomer/<string:username>", methods=['POST'])    
def newCustomer(username):
    if (Customer.query.filter_by(username=username).first()):
        return jsonify({"message": "A username with '{}' already exists.".format(username)}), 400

    data = request.get_json()
    print (data)
    customer = Customer(username, **data)

    try:
        db.session.add(customer)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred creating the account."}), 500

    return jsonify({"success": "Account successfully created"}), 201

# retrieve a particular customer   
@app.route("/getCustomer/<string:postalcode>", methods=["GET"])
@cross_origin(supports_credentials=True)
def getCustomer(accountID):
    All_CB = Customer.query.filter_by(accountID=accountID).all()
    if All_CB:
        return jsonify({"CustomerParticulars":[cb.json() for cb in All_CB ]}), 200
    else: 
        return jsonify(False), 404

@app.route("/addPoints/<string:username>/<int:points>", methods=['PUT'])
def addPoints(username, points):
    cust = Customer.query.get(username)
    cust.points += points
    db.session.commit()
    return jsonify(True)

# update points  
@app.route("/updatePoints/<string:username>/<int:points>", methods=['PUT'])
def updatePoints(username, points):
    cust = Customer.query.get(username)
    cust.points -= points
    db.session.commit()
    return jsonify(True)

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
