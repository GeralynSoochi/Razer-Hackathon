from datetime import date, datetime, timedelta
from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from flask_sqlalchemy import SQLAlchemy
import random 
import requests

app = Flask(__name__)

#auto mate this to a weekly task
@app.route("/genSpawnDate")
def genSpawnDate ():
    numbers = set([])
    for i in range (2): # spawn rate; change accordingly.
        genNo = random.randrange(6)
        while genNo in numbers: 
            genNo = random.randrange(6)
        numbers.add(str(genNo))
    numbers = ",".join(list(numbers))
    r = requests.put("http://localhost:5004/updateSpawnDate/" + numbers )
    return jsonify(True)

@app.route("/getSpawnDate/<string:region>") 
def getSpawnDate(region): 
    r = requests.get("http://localhost:5004/getSpawnDate/" + region).json()
    dates = set(r["spawnDate"].split(","))
    if (date.today().weekday() in dates):
        return jsonify(True)
    return jsonify(False)

@app.route("/getMiniBoss")
def miniBoss():
    r = requests.get("http://localhost:5003/getMiniBoss")
    return jsonify(r.json())

    
@app.route("/getMainBoss")
def mainBoss():
    r = requests.get("http://localhost:5003/getMainBoss")
    return jsonify(r.json())

if __name__=='__main__':
    app.run(host='0.0.0.0',port=5009, debug=True)