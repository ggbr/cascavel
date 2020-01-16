import requests
from dotenv import load_dotenv
import os
import time
from netdata import Netdata
from slackApi import SlackApi
def show(netdata_name,netdata_host,alerts = 1):
    netdata = Netdata(netdata_host)
    try:
        data = netdata.getAllMetrics()
    except:
        slack.sendAlert('Alerta!, Netdata do servidor ' + netdata_name + ' não responde')
        return 0 

    os.system('cls' if os.name == 'nt' else 'clear')
    for metric in data.keys():
        if alerts == 0:
            if metric == 'system.load':
                slack.sendAlert('Servidor ' + netdata_name + ' funcionando perfeitamente\n. Load de 15 mim ' + str(data[metric]['dimensions']['load15']['value']))
        if metric == 'system.load':
            print("System Load\n")
            print("  load 1: " + str(data[metric]['dimensions']['load1']['value']))
            print("  load 5: " + str(data[metric]['dimensions']['load5']['value']))
            print("  load 15: " + str(data[metric]['dimensions']['load15']['value']))
            if( data[metric]['dimensions']['load1']['value'] > 7):
                slack.sendAlert('Alerta! a media de 1 mim de load do servidor ' + netdata_name + ' ' + str(data[metric]['dimensions']['load1']['value']))


        if metric == 'system.cpu':
            valor = data[metric]['dimensions']['idle']['value']
            cpu = 100 - valor
            print('CPU: ' + str(cpu) + '%')
            if( cpu > 95):
                slack.sendAlert('Alerta! CPU do servidor ' + netdata_name + ' está em ' + str(cpu) +' %')


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
                slack.sendAlert('Alerta! memoría do servidor ' + netdata_name + ' está em ' + str(uso)+' %')




def showTest():
    netdata = Netdata('')
    data = netdata.getAllMetrics()
    os.system('cls' if os.name == 'nt' else 'clear')
    for metric in data.keys():
        print(metric)







def services():
    print('http://nginx/api/service/get/all')
    request = requests.get("http://nginx/api/service/get/all", timeout=5)
    services = list(request.json())
    for service in services:
        try:
            r = requests.get(service['url'], timeout=5)
            print(service['name'])       
            if r.status_code == 200:
                print('o serviço ' + service['name'] + ' esta OK' )
            else:
                print('serviço ' + service['name'] +' esta fora do ar')
                slack.sendAlert('serviço ' + service['name'] +' esta fora do ar')
        except:
            slack.sendAlert('Tem algo errado com o serviço ' + service['name'])
        
def server(contador):
    request = requests.get("http://nginx/api/serve/get/all", timeout=5)
    servers = list(request.json())
    for server in servers:
        if contador > (60):
            show(server['name'],server['url'],0)
            contador = 0
        else:
            show(server['name'],server['url'])

print('Start service')
slack = SlackApi()
slack.sendAlert('Iniciando serviço de monitoramento')
contador = 0
time.sleep(5)



while True:
    try:
        server(contador)
        services()
    except:
        slack.sendAlert('Erro no serviço do Cascavel')
    
    if contador > (60):
        contador = 0
    else:
        contador = contador + 1
    time.sleep(60)