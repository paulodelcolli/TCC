#-*- coding: utf-8 -*-

from chatterbot.trainers import ListTrainer #treinador
from chatterbot import ChatBot #chatbot
import os

bot = ChatBot('Test')

#bot.set_trainer(ListTrainer)
trainer = ListTrainer(bot)

for arq in os.listdir('arq'):
    chats = open('arq/' + arq, 'r').readlines() 
    #bot.train(chats)
    trainer.train(chats)

while True:
    resq = input('Você: ')

    resp = bot.get_response(resq)
    print('Charlie: ' + str(resp))


#Thank you! If you're using the new version of chatterbot, then you have to use: trainer = ListTrainer(bot) trainer.train(conv) instead of bot.set_trainer() bot.train()﻿

#pip3 install chatterbot-corpus
