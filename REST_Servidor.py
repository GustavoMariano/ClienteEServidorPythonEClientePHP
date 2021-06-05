from flask import Flask
from flask_restful import Api, Resource, reqparse
import re
app = Flask(__name__)
api = Api(app)

usuarios = [ 
    {
        "nome": "Abc",
        "idade": 42,
        "ocupacao": "oreia"
    },{
        "nome": "Bolinhas",
        "idade": 32,
        "ocupacao": "seca"
    },{
        "nome": "Uniplac",
        "idade": 22,
        "ocupacao": "estagiário" } 
]

class User(Resource):
    def get(self, nome):

        for user in usuarios:
            if(nome == user["nome"]):
                return user, 200
        return "Usuário não encontrado", 404

    def post(self, nome):
        parser = reqparse.RequestParser()
        parser.add_argument("idade")
        parser.add_argument("ocupacao")
        args = parser.parse_args()

        for user in usuarios:
            if(nome == user["nome"]):
                return "Usuário com nome {} já existe".format(nome), 400

        user = {
            "nome": nome,
            "idade": args["idade"],
            "ocupacao": args["ocupacao"]
        }
        usuarios.append(user)
        return user, 201
    
    def put(self, nome):
        parser = reqparse.RequestParser()
        parser.add_argument("idade")
        parser.add_argument("ocupacao")
        args = parser.parse_args()

        for user in usuarios:
            if(nome == user["nome"]):
                user["idade"] = args["idade"]
                user["ocupacao"] = args["ocupacao"]
                return user, 200

        user = {
            "nome": nome,
            "idade": args["idade"],
            "ocupacao": args["ocupacao"]
        }
        usuarios.append(user)
        return user, 201

    def delete(self, nome):
        global usuarios
        usuarios = [user for user in usuarios if user["nome"] != nome]
        return "{} deletado.".format(nome), 200
        

class Operacao(Resource):
    def post(self, operador):
        parser = reqparse.RequestParser()
        parser.add_argument("num1")
        parser.add_argument("operador")
        parser.add_argument("num2")        
        args = parser.parse_args()

        nume1 = int(args["num1"])
        nume2 = int(args["num2"])

        resultado = '';
        if(operador == "somar"):
           resultado = int(nume1 + nume2)

        elif(operador == "subtrair"):
            resultado = nume1 - nume2

        elif(operador == "multiplicar"):
           resultado = nume1 * nume2

        elif(operador == "dividir"):
           resultado = nume1 / nume2
    
        else:
          resultado = '';

        return resultado, 201

class Validacpf(Resource):
    def post(self, cpf):

        if not isinstance(cpf,str):
            return False

        cpf = re.sub("[^0-9]",'',cpf)

        if cpf=='00000000000' or cpf=='11111111111' or cpf=='22222222222' or cpf=='33333333333' or cpf=='44444444444' or cpf=='55555555555' or cpf=='66666666666' or cpf=='77777777777' or cpf=='88888888888' or cpf=='99999999999':
            return False

        if len(cpf) != 11:
            return False

        sum = 0
        weight = 10

        for n in range(9):
            sum = sum + int(cpf[n]) * weight

            weight = weight - 1

        verifyingDigit = 11 -  sum % 11

        if verifyingDigit > 9 :
            firstVerifyingDigit = 0
        else:
            firstVerifyingDigit = verifyingDigit

        sum = 0
        weight = 11
        for n in range(10):
            sum = sum + int(cpf[n]) * weight

            weight = weight - 1

        verifyingDigit = 11 -  sum % 11

        if verifyingDigit > 9 :
            secondVerifyingDigit = 0
        else:
            secondVerifyingDigit = verifyingDigit

        if cpf[-2:] == "%s%s" % (firstVerifyingDigit,secondVerifyingDigit):
            return True
            
        return

api.add_resource(Validacpf, "/cpf/<string:cpf>")
api.add_resource(User, "/user/<string:nome>")
api.add_resource(Operacao, "/operacao/<string:operador>")
app.run(debug=True)