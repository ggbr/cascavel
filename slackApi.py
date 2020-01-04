import os
import slack
from dotenv import load_dotenv


class SlackApi:
    def __init__(self,):
        load_dotenv()
        print(os.getenv('SLACK_API_TOKEN'))
        self.client = slack.WebClient(token=os.getenv('SLACK_API_TOKEN'))

    def sendAlert(self, texto):
        response = self.client.chat_postMessage(
            channel='#devs',
            text=str(texto))
            