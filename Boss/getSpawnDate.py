import requests
import random

# using cronjob to automate. 

def genSpawnDates ():
    regions = requests.get("http://localhost:5004/getRegions")
    regions = regions.json()
    for region in regions["Regions"]:
        regionName = region["regionName"]
        numbers = set([])
        for i in range (2): # spawn rate; change accordingly.
            genNo = random.randrange(6)
            while str(genNo) in numbers:
                genNo = random.randrange(6)
            numbers.add(str(genNo))
        numbers = ",".join(list(numbers))
        r = requests.put("http://localhost:5004/updateSpawnDate/" + numbers + "/" + regionName)

genSpawnDates ()