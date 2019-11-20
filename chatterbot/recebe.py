import requests

class PrintaAlgo():

        def print(self, **kwargs):
                #print(kwargs)
                self.msg = kwargs.get('msgForward')
                print("recebido: %s" % (kwargs.get('msgForward')) )

                return "msg recebida:"+self.msg+", eu deveria processar e fazer algo"

        #se precisar retropropagar
        def send(self):
                print('aaaaaaaaaaaaaaaaa')
                r = requests.post('http://localhost:5000/sendData', json={'msg': 'woooow, deu certo'})
                