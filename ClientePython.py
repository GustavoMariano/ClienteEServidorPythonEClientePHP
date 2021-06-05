from typing import Text
import PySimpleGUI as sg
import requests

base_url_usr = "http://localhost:5000/user/%s"
base_url_cpf = "http://localhost:5000/cpf/%s"
base_url_mat = "http://localhost:5000/operacao/%s"

resultado = "a"
#Janelas Menu
def janelaResultado():
    sg.theme('Reddit')
    layout = [
        [sg.Text(resultado)],
    ]
    return sg.Window('Inicio', layout, finalize=True)

def janelaInicial():
    sg.theme('Reddit')
    layout = [
        [sg.Button('Adicionar'), sg.Button('Visualizar'), sg.Button('Editar'), sg.Button('Deletar')],
        [sg.Button('CPF')],
        [sg.Button('Operação')],
    ]
    return sg.Window('Inicio', layout, finalize=True)

#Janelas Usuario
def janelaAdicionarUsuario():
    sg.theme('Reddit')
    layout = [        
        [sg.Text('Nome'), sg.Input(key='nome')],
        [sg.Text('Idade'), sg.Input(key='idade')],
        [sg.Text('Ocupação'), sg.Input(key='ocupacao')],
        [sg.Button('Salvar')],
    ]
    return sg.Window('Adicionar Usuario', layout, finalize=True)

def janelaVisualizarUsuario():
    sg.theme('Reddit')
    layout = [
        [sg.Text('Nome'), sg.Input(key='nome')],
        [sg.Button('Visualizar')],
    ]
    return sg.Window('Visualizar Usuario', layout, finalize=True)

def janelaEditarFinalUsuario():
    sg.theme('Reddit')
    layout = [
        [sg.Text('Nome'), sg.Input(key='nome')],
        [sg.Text('Idade'), sg.Input(key='idade')],
        [sg.Text('Ocupação'), sg.Input(key='ocupacao')],
        [sg.Button('Editar')],
    ]
    return sg.Window('Editar Final Usuario', layout, finalize=True)

def janelaDeletarUsuario():
    sg.theme('Reddit')
    layout = [
        [sg.Text('Nome'), sg.Input(key='nome')],
        [sg.Button('Deletar')],
    ]
    return sg.Window('Deletar Usuario', layout, finalize=True)

#Janelas Cpf

def janelaCpf():
    sg.theme('Reddit')
    layout = [
        [sg.Text('CPF'), sg.Input(key='cpf')],
        [sg.Button('Verificar')],
    ]
    return sg.Window('Verificar CPF', layout, finalize=True)

#Janelas Operacao

def janelaOperacao():
    sg.theme('Reddit')
    layout = [
        [sg.Text('Primeiro número'), sg.Input(key='num1')],
        [sg.Text('Operador'),sg.Combo(['somar', 'subtrair', 'multiplicar', 'dividir'], enable_events=True, key='operador')],
        [sg.Text('Segundo número'), sg.Input(key='num2')],
        [sg.Button('Calcular')],
    ]
    return sg.Window('Calcular Operação', layout, finalize=True)

#Criar janelas iniciais

janela1, janela2, janela3= janelaInicial(), None, None

#Troca de janelas
while True:
    window, event, values = sg.read_all_windows()

    if window == janela1 and event == sg.WIN_CLOSED:
        break

    if window == janela2 and event == sg.WIN_CLOSED:
        janela1.UnHide()
        janela2.hide()

    if window == janela3 and event == sg.WIN_CLOSED:
        janela2.UnHide()
        janela3.hide()
       

    if window == janela1 and event == 'Adicionar':
        janela2 = janelaAdicionarUsuario()
        janela1.hide()

    if  window == janela1 and event == 'Visualizar':  
        janela2 = janelaVisualizarUsuario()
        janela1.hide()

    if  window == janela1 and event == 'Editar':
        janela2 = janelaEditarFinalUsuario()
        janela1.hide()

    if  window == janela1 and event == 'Deletar':  
        janela2 = janelaDeletarUsuario()
        janela1.hide()
 
    if  window == janela1 and event == 'CPF':  
        janela2 = janelaCpf()
        janela1.hide()

    if  window == janela1 and event == 'Operação':  
        janela2 = janelaOperacao()
        janela1.hide()

    if window == janela2 and event == 'Salvar':
        payload = {"nome": values['nome'], "idade": values['idade'], "ocupacao": values['ocupacao']}
        response = requests.post(base_url_usr % values['nome'], payload)
        resultado = response.json()

    if window == janela2 and event == 'Visualizar':
        response = requests.get(base_url_usr % values['nome'])
        resultado = response.json()
        janela3 = janelaResultado()    

    if window == janela2 and event == 'Editar':
        payload = {"idade": values['idade'], "ocupacao": values['ocupacao']}
        response = requests.put(base_url_usr % values['nome'], payload)
        resultado = response.json()

    if window == janela2 and event == 'Deletar':
        response = requests.delete(base_url_usr % values['nome'])


    if window == janela2 and event == 'Visualizar':
        response = requests.get(base_url_usr % values['nome'])
        resultado = response.json()
        janela3 = janelaResultado() 

    if window == janela2 and event == 'Verificar':
        response = requests.post(base_url_cpf % values['cpf'])
        resultado = response.json()
        janela3 = janelaResultado() 

    if window == janela2 and event == 'Calcular':
        payload = {"num1": values['num1'], "operador": values['operador'], "num2": values['num2']}
        response = requests.post(base_url_mat % values['operador'], payload)
        resultado = response.json()
        janela3 = janelaResultado() 