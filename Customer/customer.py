from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from flask_sqlalchemy import SQLAlchemy
import json
from passlib.hash import sha256_crypt


# ==================================== CONNECTION SPECIFICATION ====================================== #
app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root:password@database-1.c9bzkzbvdsli.ap-southeast-1.rds.amazonaws.com:3306/customer'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)
CORS(app)

class Customer(db.Model):
    __tablename__ = 'customer'

    username = db.Column(db.String(50), nullable=False)
    password = db.Column(db.String(50), nullable=False)
    postalCode = db.Column(db.String(50), nullable=False)
    accountID = db.Column(db.String(50), primary_key=True)
    points = db.Column(db.Integer)


    def __init__(self,accountID, username, password ,postalCode):
        self.accountID = accountID
        self.username = username
        self.password = password
        self.postalCode = postalCode
        self.points = 0

    def json(self):
        customer_entry = {
            "username": self.username,
            "password": self.password,
            "postalcode": self.postalCode,
            "accountID": self.accountID,
            "points" : self.points
        }
        return customer_entry

        
# retrieve all customer 
@app.route("/customers", methods=['GET'])
def get_all():
    return jsonify({"Customers": [customer.json() for customer in Customer.query.all()]})

    
@app.route("/newCustomer/<string:accountID>", methods=['POST'])    
def newCustomer(accountID):
    if (Customer.query.filter_by(accountID=accountID).first()):
        return jsonify({"message": "An accountID with '{}' already exists.".format(accountID)}), 400

    data = request.get_json()
    customer = Customer(accountID, data['username'], sha256_crypt.hash(data['password']), data['postalCode'])
    try:
        db.session.add(customer)
        db.session.commit()

    except:
        return jsonify({"message": "An error occurred creating the account."}), 500

    return jsonify({"success": "Account successfully created"}), 201

# retrieve a particular customer by postal code 
# @app.route("/getCustomer/<string:postalcode>", methods=["GET"])
# @cross_origin(supports_credentials=True)
# def getCustomer(accountID):
#     All_CB = Customer.query.filter_by(accountID=accountID).all()
#     if All_CB:
#         return jsonify({"CustomerParticulars":[cb.json() for cb in All_CB ]}), 200
#     else: 
#         return jsonify(False), 404

# retrieve a particular customer by postal code 
@app.route("/getCustomer/<string:accountid>", methods=["GET"])
@cross_origin(supports_credentials=True)
def getCustomer(accountID):
    All_CB = Customer.query.filter_by(accountID=accountID).first()
    if All_CB:
        return jsonify(All_CB.json()), 200
    else: 
        return jsonify(False), 404

@app.route("/addPoints/<string:accountID>/<int:points>", methods=['PUT'])
def addPoints(accountID, points):
    cust = Customer.query.get(accountID)
    cust.points += points
    db.session.commit()
    return jsonify(True)

# update points  
@app.route("/updatePoints/<string:accountID>/<int:points>", methods=['PUT'])
def updatePoints(accountID, points):
    cust = Customer.query.get(accountID)
    cust.points -= points
    db.session.commit()
    return jsonify(True)
    
#getPoints
@app.route("/getPoints/<string:accountID>", methods=['GET'])
def getPoints(accountID):
    cust = Customer.query.get(accountID)
    return jsonify({"points" : cust.points})

#Authenticate user method
@app.route("/authC/<string:username>", methods=["POST"])
def authC(username):
#Getting the data
    data = request.get_json()
    #gets the password with key password in json data
    inputpassword = data["password"]
    #if user exist check pass otherwise return does not exist
    user = Customer.query.filter_by(username=username).first()
    if user:
        password = (Customer.query.filter_by(username=username).first().password)
        password = sha256_crypt.unhash(password)
        
        if str(password) == str(inputpassword):
            return jsonify({"message": "True"}), 200
        else:
            return jsonify({"message": "Password does not match"}), 404
    else:
        return jsonify({"message": "Username does not exist"}), 404



if __name__=='__main__':
    app.run(host='0.0.0.0',port=5001, debug=True)
