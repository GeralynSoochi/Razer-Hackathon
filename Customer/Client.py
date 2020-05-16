import json
import sys
import os
import random
from flask import Flask, request, jsonify
from flask_cors import CORS
from flask_sqlalchemy import SQLAlchemy
import uuid

app = Flask(__name__)
CORS(app)

import requests
clientURL = "https://razerhackathon.sandbox.mambu.com/api/clients"

@app.route("/createclient/", methods=['POST'])
def create_client():
    submitted = request.get_json()
    firstName = submitted["firstName"]
    lastName = submitted["lastName"]
    preferredLanguage = submitted["preferredLanguage"]
    notes = submitted["notes"]
    assignedBranchKey = "8a8e878e71c7a4d70171ca4ec7e710c4"
    validUntil = submitted["validUntil"]
    documentId = submitted["documentId"]
    id = str(uuid.uuid4())

    
    payload = "{\n    \"client\": {\n        \"firstName\": " + firstName + ",\n        \"lastName\": " + lastName + ",\n        \"preferredLanguage\": "+ preferredLanguage +",\n        \"notes\": " + notes +",\n        \"assignedBranchKey\": " + assignedBranchKey + "\n    },\n    \"idDocuments\": [\n        {\n            \"identificationDocumentTemplateKey\": \"8a8e867271bd280c0171bf7e4ec71b01\",\n            \"issuingAuthority\": \"Immigration Authority of Singapore\",\n            \"documentType\": \"NRIC/Passport Number\",\n            \"validUntil\": " + validUntil + ",\n            \"documentId\": " + documentId + "\n        }\n    ],\n    \"addresses\": [],\n    \"customInformation\": [\n    \t{\n    \t\t\"value\":\"Singapore\",\n    \t\t\"customFieldID\":\"countryOfBirth\"\n    \t\t\n    \t},\n    \t{\n    \t\t\"value\": " + id + ",\n    \t\t\"customFieldID\":\"razerID\"\n    \t\t\n    \t}\n    \t]\n}"
    headers = {
    'Content-Type': 'application/json',
    'Authorization': 'Basic VGVhbTE2OnBhc3MxRjNFN0E3MkU=',
    'Content-Type': 'application/json'}

    response = requests.request("POST", clientURL, headers=headers, data = payload)
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


if __name__ == '__main__':
    app.run(port=5015, debug=True)