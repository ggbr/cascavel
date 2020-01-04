import requests
from dotenv import load_dotenv
import os
import time
from netdata import Netdata

def show():
    netdata = Netdata()
    data = netdata.getAllMetrics()
    os.system('cls' if os.name == 'nt' else 'clear')
    for metric in data.keys():
        #print(metric)
        if metric == 'system.load':
            print("System Load\n")
            print("  load 1: " + str(data[metric]['dimensions']['load1']['value']))
            print("  load 5: " + str(data[metric]['dimensions']['load5']['value']))
            print("  load 15: " + str(data[metric]['dimensions']['load15']['value']))

while True:
    show()
    time.sleep(5)