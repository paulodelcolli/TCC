from flask import Flask
from flask import request
import sys

from recebe import PrintaAlgo



app = Flask(__name__)

#eu deveria instanciar a classe do chatter
obj = PrintaAlgo()

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