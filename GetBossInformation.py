from datetime import date, datetime, timedelta
from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from flask_sqlalchemy import SQLAlchemy
import random 
import requests

app = Flask(__name__)

@app.route("/getSpawnDate/<string:region>")
def getSpawnDate (region):
    if (date.today().weekday() == 6): # if sunday, spawn
        numbers = set([])

        for i in range (2): # spawn rate; change accordingly.
            genNo = random.randrange(6)
            while genNo in numbers: 
                genNo = random.randrange(6)
            numbers.add(str(genNo))
        numbers = ",".join(list(numbers))
        r = requests.put("http://localhost:5004/updateSpawnDate/" + numbers + "/" + region )
        return jsonify(True)
    else: 
        r = requests.get("http://localhost:5004/getSpawnDate/" + region)
        return jsonify(r.json())    

@app.route("/miniBoss")
def miniBoss():
    r = requests.get("http://localhost:5003/getBoss")
    return jsonify(r.json())

    
@app.route("/mainBoss")
def mainBoss():
    r = requests.get("http://localhost:5003/getBoss")
    return jsonify(r.json())

if __name__=='__main__':
    app.run(host='0.0.0.0',port=5009, debug=True)