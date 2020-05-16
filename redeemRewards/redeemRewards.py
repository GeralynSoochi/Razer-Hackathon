from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from flask_sqlalchemy import SQLAlchemy
import json
import requests

app = Flask(__name__)

@app.route("/redeemRewards/<string:username>/<int:rewardID>/<int:points>", methods = ["PUT"])
def redeemRewards(username, rewardID, points):
    r = requests.put("http://localhost:5002/updateRewardQuantity/" + str(rewardID))
    rTwo = requests.put("http://localhost:5001/updatePoints/" + username + "/" + str(points))
    if ( r.status_code == 200 and r.status_code == 200):
        return jsonify(True)
    return jsonify(False)

if __name__=='__main__':
    app.run(host='0.0.0.0',port=5022, debug=True)
