from flask import Flask, request, jsonify, redirect
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS, cross_origin
import requests

import json

app = Flask(__name__)
CORS(app)


# Create a new Trnsactions 
@app.route("/createNewTransaction/<string:accountID>", methods=['POST'])
@cross_origin(supports_credentials=True)
def createNewTransaction(accountID):
    transactionInfo = request.get_json()
    transactionInfo = json.loads(json.dumps(transactionInfo,default=str))
    createStatus = requests.post("https://razerhackathon.sandbox.mambu.com/api/savings/"+ accountID +"/transactions"    , json = transactionInfo, auth=('Team16', 'pass1F3E7A72E'))
    print(createStatus.text)
    if createStatus.status_code == 201:
        return jsonify(True)
    return jsonify(False)

# retrieve all the trasaction details to UI 
@app.route("/getUserTransaction/<string:accountID>", methods=['GET'])
@cross_origin(supports_credentials=True)
def getUserTransaction(accountID):
    r = requests.get("https://razerhackathon.sandbox.mambu.com/api/savings/"+ accountID +"/transactions", auth=('Team16', 'pass1F3E7A72E'))
    if r.status_code == 200:
        Transinfo = json.loads(r.text)
        return jsonify(Transinfo)
    else: 
        return jsonify(False)


# retrieve all the trasaction details to UI 
@app.route("/getOverallSavingAccount/<string:accountID>", methods=['GET'])
@cross_origin(supports_credentials=True)
def getOverallSavingAccount(accountID):
    r = requests.get("https://razerhackathon.sandbox.mambu.com/api/savings/"+ accountID +"/", auth=('Team16', 'pass1F3E7A72E'))
    if r.status_code == 200:
        Transinfo = json.loads(r.text)
        return jsonify(Transinfo)
    else: 
        return jsonify(False)






if __name__ == '__main__':
    app.run(host="0.0.0.0", port=5044, debug=True)
