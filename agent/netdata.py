import requests
from dotenv import load_dotenv
import os
import time


class Netdata():
    def __init__(self,):
        # carregando configurações
        load_dotenv()
        self.HOST = os.getenv("host")

    def getAllMetrics(self,):
        #request = requests.get(HOST + "/api/v1/data?chart=system.cpu&after=-1&points=1&group=average&format=json")
        #request = requests.get(HOST + "/api/v1/chart?chart=system.cpu")
        #request = requests.get(HOST + "/api/v1/charts")
        request = requests.get(self.HOST + "/api/v1/allmetrics?format=json")
        return request.json()
        

