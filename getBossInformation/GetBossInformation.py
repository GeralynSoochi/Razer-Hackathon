from datetime import date, datetime, timedelta
from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from flask_sqlalchemy import SQLAlchemy
import random 
import requests

app = Flask(__name__)
CORS(app)

@app.route("/getSpawnDate/<string:region>") 
def getSpawnDate(region): 
    r = requests.get("http://54.169.136.72:5004/getSpawnDate/" + region).json()
    dates = r["spawnDate"].split(",")
    return jsonify(dates)

@app.route("/getMiniBoss")
def miniBoss():
    r = requests.get("http://54.169.136.72:5003/getMiniBoss")
    return jsonify(r.json())
    
@app.route("/getMainBoss")
def mainBoss():
    r = requests.get("http://54.169.136.72:5003/getMainBoss")
    return jsonify(r.json())

if __name__=='__main__':
    app.run(host='0.0.0.0',port=5009, debug=True)