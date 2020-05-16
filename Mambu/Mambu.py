import json
import sys
import os
import random
from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from flask_sqlalchemy import SQLAlchemy
import uuid 

app = Flask(__name__)
CORS(app)

import requests
@app.route("/registration", methods = ['POST'])
@cross_origin(supports_credentials=True)
def registration():
    submitted = request.get_json()
    username = submitted["username"]
    password = submitted["password"]
    firstName = submitted["firstName"]
    lastName = submitted["lastName"]
    assignedBranchKey = "8a8e878e71c7a4d70171ca4ec7e710c4"
    validUntil = submitted["validUntil"]
    documentId = submitted["documentId"]
    postalCode = submitted["postalCode"]
    id = str(uuid.uuid4())

    clientID = create_client(firstName, lastName, assignedBranchKey, validUntil, documentId, postalCode, id)
    accountID = createCurrAcc(clientID)
    # create user in our records
    body = {
        "username" : username,
        "password" : password, # need to hash 
        "postalCode" : postalCode,
        "encodedKey" : clientID
    }
    r = requests.post ("http://localhost:5001/newCustomer/" + accountID, json= body)
    print (r.status_code)
    return jsonify("True")

def create_client(firstName, lastName, assignedBranchKey, validUntil, documentId, postalCode, id):  
    clientURL = "https://razerhackathon.sandbox.mambu.com/api/clients"  
    payload = "{\n    \"client\": {\n        \"firstName\": " + firstName + ",\n        \"lastName\": " + lastName + ",\n        \"preferredLanguage\": ENGLISH,\n        \"notes\":  NIL ,\n        \"assignedBranchKey\": " + assignedBranchKey + "\n    },\n    \"idDocuments\": [\n        {\n            \"identificationDocumentTemplateKey\": \"8a8e867271bd280c0171bf7e4ec71b01\",\n            \"issuingAuthority\": \"Immigration Authority of Singapore\",\n            \"documentType\": \"NRIC/Passport Number\",\n            \"validUntil\": " + validUntil + ",\n            \"documentId\": " + documentId + "\n        }\n    ],\n    \"addresses\": [],\n    \"customInformation\": [\n    \t{\n    \t\t\"value\":\"Singapore\",\n    \t\t\"customFieldID\":\"countryOfBirth\"\n    \t\t\n    \t},\n    \t{\n    \t\t\"value\": " + id + ",\n    \t\t\"customFieldID\":\"razerID\"\n    \t\t\n    \t}\n    \t]\n}"
    headers = {
    'Content-Type': 'application/json',
    'Authorization': 'Basic VGVhbTE2OnBhc3MxRjNFN0E3MkU=',
    'Content-Type': 'application/json'}

    response = requests.request("POST", clientURL, headers=headers, data = payload)
    response = response.json()
    print (response)
    encodedKey = (response["client"]["encodedKey"])
    # try:
    #     print(firstName)
    #     response = requests.request("POST", clientURL, headers=headers, data = payload)
    #     # client = json.loads(response)
    #     if response.status_code != requests.codes.ok: #return error message
    #         return jsonify({"message": "An error occurred creating your account. Please check your details."}), 404
        
    # except:
    #     return jsonify({"message": "Something went wrong on our end. Please try again later."}), 500
    # response = response.json()
    return encodedKey

def createCurrAcc(clientID):
    createCAccURL = "https://razerhackathon.sandbox.mambu.com/api/savings"
    
    submitted = request.get_json()

    payload = "{\n    \"savingsAccount\": {\n        \"name\": \"Digital Account\",\n        \"accountHolderType\": \"CLIENT\",\n        \"accountHolderKey\": "+ clientID + ",\n        \"accountState\": \"APPROVED\",\n        \"productTypeKey\": \"8a8e878471bf59cf0171bf6979700440\",\n        \"accountType\": \"CURRENT_ACCOUNT\",\n        \"currencyCode\": \"SGD\",\n        \"allowOverdraft\": \"true\",\n        \"overdraftLimit\": \"100\",\n        \"overdraftInterestSettings\": {\n            \"interestRate\": 5\n        },\n            \"interestSettings\": {\n        \"interestRate\": \"1.25\"\n    }\n    }\n\n}"
    headers = {
    'Content-Type': 'application/json',
    'Authorization': 'Basic VGVhbTE2OnBhc3MxRjNFN0E3MkU=',
    'Content-Type': 'application/json',
    'Cookie': 'AWSALB=3sxulxBsHiEiuK4yYNBQKldxynSlfLCpkCdIerZ2cXwNSRZCmijXW0ftqiDDK61hLP3hZONAMRgg8wjfMsWM7g4+SPmAnQ33gB+i56yuukEPWYZrEFm+4TPAlByV; AWSALBCORS=3sxulxBsHiEiuK4yYNBQKldxynSlfLCpkCdIerZ2cXwNSRZCmijXW0ftqiDDK61hLP3hZONAMRgg8wjfMsWM7g4+SPmAnQ33gB+i56yuukEPWYZrEFm+4TPAlByV'
    }

    response = requests.request("POST", createCAccURL, headers=headers, data = payload)
    response = (response.json())
    # print (response)
    accountID =  (response["savingsAccount"]["id"])
    # try:
    #     print(firstName)
    #     response = requests.request("POST", clientURL, headers=headers, data = payload)
    #     # client = json.loads(response)
    #     if response.status_code != requests.codes.ok: #return error message
    #         return jsonify({"message": "An error occurred creating your account. Please check your details."}), 404
        
    # except:
    #     return jsonify({"message": "Something went wrong on our end. Please try again later."}), 500
    return accountID

# get user's current account
@app.route("/currentacc/getUser/<string:username>", methods=['GET'])
def getUserAccs(username):
    getCAccURL = "https://razerhackathon.sandbox.mambu.com/api/clients/"

    headers = {
    'Authorization': 'Basic VGVhbTE2OnBhc3MxRjNFN0E3MkU=',
    'Cookie': 'AWSALB=SCyLu8+OuTImLlfP1eh8nql91Ct7//I2pMraeyFdy6nAq9oO2gfqwYQpcALP/X7oW9Z48YY6yPK2VZb4dF/whA21klZ3Qi3vs3BU6uZ9nNyWhQwxPOqO1KKTaoIz; AWSALBCORS=SCyLu8+OuTImLlfP1eh8nql91Ct7//I2pMraeyFdy6nAq9oO2gfqwYQpcALP/X7oW9Z48YY6yPK2VZb4dF/whA21klZ3Qi3vs3BU6uZ9nNyWhQwxPOqO1KKTaoIz'
    }
    response = requests.get(getCAccURL + username + "/savings/", headers=headers)
    response = response.json() #this is a list (for future references)
    return jsonify(response)

@app.route("/getDetails/<string:userid>", methods=['GET'])
def getDetails(userid):
    getAccURL = "https://razerhackathon.sandbox.mambu.com/api/clients/"
    
    headers = {
    'Authorization': 'Basic VGVhbTE2OnBhc3MxRjNFN0E3MkU=',
    'Cookie': 'AWSALB=SCyLu8+OuTImLlfP1eh8nql91Ct7//I2pMraeyFdy6nAq9oO2gfqwYQpcALP/X7oW9Z48YY6yPK2VZb4dF/whA21klZ3Qi3vs3BU6uZ9nNyWhQwxPOqO1KKTaoIz; AWSALBCORS=SCyLu8+OuTImLlfP1eh8nql91Ct7//I2pMraeyFdy6nAq9oO2gfqwYQpcALP/X7oW9Z48YY6yPK2VZb4dF/whA21klZ3Qi3vs3BU6uZ9nNyWhQwxPOqO1KKTaoIz'
    }
    print(type(userid))
    response = requests.get(getAccURL + userid, headers=headers)
    response = response.json()
    return jsonify(response)

if __name__ == '__main__':
    app.run(host="0.0.0.0",port=5015, debug=True)