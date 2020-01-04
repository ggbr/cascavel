import requests
from dotenv import load_dotenv
import os
import time

# carregando configurações
load_dotenv()
HOST = os.getenv("host")
def show():

    #request = requests.get(HOST + "/api/v1/data?chart=system.cpu&after=-1&points=1&group=average&format=json")
    #request = requests.get(HOST + "/api/v1/chart?chart=system.cpu")
    #request = requests.get(HOST + "/api/v1/charts")
    request = requests.get(HOST + "/api/v1/allmetrics?format=json")
    data = request.json()
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
    time.sleep(1)