from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from flask_sqlalchemy import SQLAlchemy
import json


# ==================================== CONNECTION SPECIFICATION ====================================== #
app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://admin:database-1.c9bzkzbvdsli.ap-southeast-1.rds.amazonaws.com:3306/regionBoss'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db = SQLAlchemy(app)
CORS(app)


class Region(db.Model):
    __tablename__ = 'region_mast'

    RegionID = db.Column(db.Integer, primary_key=True)
    RegionPostal = db.Column(db.Integer, primary_key=True)
    RegionName = db.Column(db.Integer, primary_key=True)
    Points = db.Column(db.Integer, nullable=False)

    def __init__(self, RegionID,RegionPostal,RegionName,Points):
        self.RegionID = RegionID
        self.RegionPostal = RegionPostal
        self.RegionName = RegionName
        self.Points = Points

    def json(self):
        region_entry = {
            "RegionID": self.RegionID,
            "RegionPostal": self.RegionPostal,
            "RegionName": self.RegionName,
            "Points": self.Points
        }
        return region_entry

    def set_Points(self, update):
        self.Points = update
        return True
    

#### REWARDS 
class Bosses(db.Model):
    __tablename__ = 'reward_mast'

    mainBoss = db.Column(db.String(50), primary_key=True)
    regionID = db.Column(db.Integer, primary_key=True)
    bosscount = db.Column(db.Integer, nullable=True)


    def __init__(self, mainBoss, regionID, status):
        self.mainBoss = mainBoss
        self.regionID = regionID
        self.status = status

    def json(self):
        bossEntry = {
            "mainBoss": self.mainBoss,
            "regionID": self.regionID,
            "bosscount": self.bosscount
        }
        return bossEntry

    def set_bosscount(self, update):
        self.bosscount = update
        return True




#Get all boss and rand() 




# Updating region points weekly ()



if __name__=='__main__':
    app.run(host='0.0.0.0',port=5003, debug=True)
