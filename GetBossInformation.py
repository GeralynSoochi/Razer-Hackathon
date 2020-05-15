from datetime import date, datetime, timedelta
from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from flask_sqlalchemy import SQLAlchemy
import random 
import requests

app = Flask(__name__)

@app.route("/getSpawnDates")
def generateSpawnDate ():
    if (date.today().weekday() == 4):
        numbers = set([])

        for i in range (2): # spawn rate; change accordingly.
            genNo = random.randrange(6)
            while genNo in numbers: 
                genNo = random.randrange(6)
            numbers.add(genNo)
    return jsonify(list(numbers))

@app.route("/miniBoss")
def miniBoss():
    r = requests.get("http://localhost:5003/getBoss")
    return jsonify(r.json())

if __name__=='__main__':
    app.run(host='0.0.0.0',port=5009, debug=True)