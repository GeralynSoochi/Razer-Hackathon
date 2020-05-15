import schedule
import time

def job(t):
    print ("JOB"+t)
    return

schedule.every().day.at("01:55").do(job,'It is 01:00')

while True:
    schedule.run_pending()
    time.sleep(5) # wait one minute