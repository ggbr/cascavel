import requests
from dotenv import load_dotenv
import os
import time
from netdata import Netdata
from slackApi import SlackApi
def show():
    netdata = Netdata()
    data = netdata.getAllMetrics()
    os.system('cls' if os.name == 'nt' else 'clear')
    for metric in data.keys():
        if metric == 'system.load':
            print("System Load\n")
            print("  load 1: " + str(data[metric]['dimensions']['load1']['value']))
            print("  load 5: " + str(data[metric]['dimensions']['load5']['value']))
            print("  load 15: " + str(data[metric]['dimensions']['load15']['value']))
            if( data[metric]['dimensions']['load1']['value'] > 7):
                slack.sendAlert('Alerta! a media de 1 mim de load do servidor ' + str(data[metric]['dimensions']['load1']['value']))


        if metric == 'system.cpu':
            valor = data[metric]['dimensions']['idle']['value']
            cpu = 100 - valor
            print('CPU: ' + str(cpu) + '%')
            if( cpu > 95):
                slack.sendAlert('Alerta! CPU  esta em ' + str(cpu) +' %')


        if metric == 'system.ram':
            valor = 0
            dimensions = data[metric]['dimensions']
            for d in dimensions:
                valor = valor + data[metric]['dimensions'][d]['value']
                if (d == 'used'):
                    used = data[metric]['dimensions'][d]['value']
            uso = used/valor * 100
            print("Uso de memoría: " + str(uso) + " %")
            if( uso > 90 ):
                slack.sendAlert('Alerta! memoría  esta em ' + str(uso)+' %')




def show2():
    netdata = Netdata()
    data = netdata.getAllMetrics()
    os.system('cls' if os.name == 'nt' else 'clear')
    for metric in data.keys():
        print(metric)
        
print('Start service')
slack = SlackApi()
slack.sendAlert('Iniciando serviço de monitoramento')

while True:
    show()
    time.sleep(30)