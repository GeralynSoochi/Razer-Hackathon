from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from flask_sqlalchemy import SQLAlchemy
import json


# ==================================== CONNECTION SPECIFICATION ====================================== #
app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root:password@database-1.c9bzkzbvdsli.ap-southeast-1.rds.amazonaws.com:3306/region'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db = SQLAlchemy(app)
CORS(app)

class Region(db.Model):
    __tablename__ = 'region'

    regionID = db.Column(db.Integer, primary_key=True)
    spawnDate = db.Column(db.String(50), primary_key=True)
    regionName = db.Column(db.String(50), primary_key=True)
    Points = db.Column(db.Integer, nullable=False)

    def __init__(self, regionID,regionName,Points,spawnDate):
        self.regionID = regionID
        self.spawnDate = spawnDate
        self.regionName = regionName
        self.Points = Points

    def json(self):
        region_entry = {
            "regionID": self.regionID,
            "regionName": self.regionName,
            "points": self.Points,
            "spawnDate": self.spawnDate
        }
        return region_entry

    
    
#region map 
class regionMap(db.Model):
    __tablename__ = 'regionMap'
    regionID = db.Column(db.String(50), primary_key=False)
    postalcode = db.Column(db.String(50), primary_key=True)

    def __init__(self, regionID,postalcode):
        self.regionID = regionID
        self.postalcode = postalcode

    def json(self):
        region_entrymap = {
            "regionID": self.regionID,
            "postalcode": self.postalcode
        }
        return region_entrymap

    def set_Points(self, update):
        self.Points = update
        return True
    

# method to retireve all region maps 


# retrieve particular region map area   
@app.route("/getCustRegion/<string:postalcode>", methods=["GET"])
@cross_origin(supports_credentials=True)
def getRegionMap(postalcode):
    f2 = postalcode[0] + postalcode[1] 
    allRegions = regionMap.query.filter_by(postalcode=f2).all()
    regionID = [regionid.regionID for regionid in allRegions if regionid.postalcode == f2]
    Regionname = Region.query.filter_by(regionID=regionID[0]).all()

    if Regionname:
        return jsonify({"RegionName":[RN.json() for RN in Regionname]}),200
    else: 
        return jsonify(False), 404

    
    
if __name__=='__main__':
    app.run(host='0.0.0.0',port=5004, debug=True)
