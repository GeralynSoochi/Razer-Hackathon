import json
import sys
import os
import random
from flask import Flask, request, jsonify
from flask_cors import CORS
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
CORS(app)

import requests
createCAccURL = "https://razerhackathon.sandbox.mambu.com/api/savings"
getCAccURL = "https://razerhackathon.sandbox.mambu.com/api/clients/"

@app.route("/currentacc/", methods=['POST'])
def createCurrAcc():
    submitted = request.get_json()
    user = submitted["user"]

    payload = "{\n    \"savingsAccount\": {\n        \"name\": \"Digital Account\",\n        \"accountHolderType\": \"CLIENT\",\n        \"accountHolderKey\": "+ user + ",\n        \"accountState\": \"APPROVED\",\n        \"productTypeKey\": \"8a8e878471bf59cf0171bf6979700440\",\n        \"accountType\": \"CURRENT_ACCOUNT\",\n        \"currencyCode\": \"SGD\",\n        \"allowOverdraft\": \"true\",\n        \"overdraftLimit\": \"100\",\n        \"overdraftInterestSettings\": {\n            \"interestRate\": 5\n        },\n            \"interestSettings\": {\n        \"interestRate\": \"1.25\"\n    }\n    }\n\n}"
    headers = {
    'Content-Type': 'application/json',
    'Authorization': 'Basic VGVhbTE2OnBhc3MxRjNFN0E3MkU=',
    'Content-Type': 'application/json',
    'Cookie': 'AWSALB=3sxulxBsHiEiuK4yYNBQKldxynSlfLCpkCdIerZ2cXwNSRZCmijXW0ftqiDDK61hLP3hZONAMRgg8wjfMsWM7g4+SPmAnQ33gB+i56yuukEPWYZrEFm+4TPAlByV; AWSALBCORS=3sxulxBsHiEiuK4yYNBQKldxynSlfLCpkCdIerZ2cXwNSRZCmijXW0ftqiDDK61hLP3hZONAMRgg8wjfMsWM7g4+SPmAnQ33gB+i56yuukEPWYZrEFm+4TPAlByV'
    }

    response = requests.request("POST", createCAccURL, headers=headers, data = payload)
    # try:
    #     print(firstName)
    #     response = requests.request("POST", clientURL, headers=headers, data = payload)
    #     # client = json.loads(response)
    #     if response.status_code != requests.codes.ok: #return error message
    #         return jsonify({"message": "An error occurred creating your account. Please check your details."}), 404
        
    # except:
    #     return jsonify({"message": "Something went wrong on our end. Please try again later."}), 500
    response = response.json()
    return jsonify(response), 201

@app.route("/currentacc/getUser/<string:username>", methods=['GET'])
def getUserAccs(username):
    headers = {
    'Authorization': 'Basic VGVhbTE2OnBhc3MxRjNFN0E3MkU=',
    'Cookie': 'AWSALB=SCyLu8+OuTImLlfP1eh8nql91Ct7//I2pMraeyFdy6nAq9oO2gfqwYQpcALP/X7oW9Z48YY6yPK2VZb4dF/whA21klZ3Qi3vs3BU6uZ9nNyWhQwxPOqO1KKTaoIz; AWSALBCORS=SCyLu8+OuTImLlfP1eh8nql91Ct7//I2pMraeyFdy6nAq9oO2gfqwYQpcALP/X7oW9Z48YY6yPK2VZb4dF/whA21klZ3Qi3vs3BU6uZ9nNyWhQwxPOqO1KKTaoIz'
    }
    response = requests.get(getCAccURL + username + "/savings/", headers=headers)
    response = response.json() #this is a list (for future references)
    return jsonify(response)

if __name__ == '__main__':
    app.run(port=5016, debug=True)