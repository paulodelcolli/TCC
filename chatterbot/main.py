
from flask import Flask
from flask import request
import sys

from recebe import PrintaAlgo

#CHATTER
from chatterbot.trainers import ListTrainer #treinador
from chatterbot import ChatBot 
import os


app = Flask(__name__)

#eu deveria instanciar a classe do chatter
class chatter:
    def __init__(self):
        self.bot = ChatBot('Charles')
        self.trainer = ListTrainer(self.bot)
        self.conv1 = ['Olá, meu nome é Charles, como posso te ajudar?','Olá, como você está','Bom dia, como vai?','Boa tarde, como vai?','Meu nome é Charles, qual é seu nome?']
        self.conv2 = ['Como você tem passado ultimamente?','Como você está se sentindo?','Entendo, como poderiamos melhorar isso?']
        self.conv3 = ['Você tem tido quaisquer pensamentos sobre prejudicar a si mesmo?','Como andam suas interações sociais?']
        self.trainer.train(self.conv1)
        self.trainer.train(self.conv2)
        self.trainer.train(self.conv3)

    

    def setNome(self, nome):
        self.nome = nome

    def setResposta(self, resposta): 
        self.resposta = resposta

    def getNome(self): 
        return self.nome

    def getResposta(self): 
        return self.resposta


    def print(self, **kwargs):
        self.msg = kwargs.get('msgForward')
        resposta = self.bot.get_response(self.msg)
        #print("recebido: %s" % (kwargs.get('msgForward')) )
        print(str(resposta))
        return str(resposta)

    def postRec():
        print(request.is_json)
        content = request.get_json()
        #print(content)
        #print(content['id'])
        try:
            print(content['msgForward'])
        except:
            print(sys.exc_info()[0])
        print("enviando msg para o outro objeto...")



obj = chatter()

@app.route('/')
def index():
    return "Hello, World!"

@app.route('/teste')
def teste():
    return "Hello, teste!" 

@app.route('/recData', methods=['POST'])
def postRec():
    print(request.is_json)
    content = request.get_json()
    #print(content)
    #print(content['id'])
    try:
        print(content['msgForward'])
    except:
        print(sys.exc_info()[0])
    print("enviando msg para o outro objeto...")

    

    return obj.print(**content)

#não usada, somente se precisar retropropagar
@app.route('/sendData', methods=['POST'])
def postSend():
    print(request.is_json)
    content = request.get_json()

    print(content['msg'])

    return content['msg']

if __name__ == '__main__':
    app.run(debug=True)
