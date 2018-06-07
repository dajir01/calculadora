@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col">
    </div>
    <div class="col-xs-16 col-sm-10 col-md-16 col-lg-16 col-xl-10" align="center">
      <body>
        <table id="calculadora">
            <tr>
                <td colspan="4">
                    <center><label for="">Calculadora</label></center>
                    <center><input type="text" id="valor_numero" maxlength="20" value="" class="cajita_valor " readonly="true"></center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="Button" id="potencia" value="exp" class="btn btn-outline-warning btn-lg btn-block" onclick="operar(5)">
                </td>
                <td>
                    <input type="Button" id="Dividir" value="/" class="btn btn-outline-warning btn-lg btn-block" onclick="operar(4)">
                </td>
                <td>
                    <input type="Button" id="Multiplicar" value="x" class="btn btn-outline-warning btn-lg btn-block" onclick="operar(3)">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="Button" id="7" value="7" class="btn btn-outline-primary btn-lg btn-block" onclick="darNumero('7')">
                </td>
                <td>
                    <input type="Button" id="8" value="8" class="btn btn-outline-primary btn-lg btn-block" onclick="darNumero('8')">
                </td>
                <td>
                    <input type="Button" id="9" value="9" class="btn btn-outline-primary btn-lg btn-block" onclick="darNumero('9')">
                </td>
                <td>
                    <input type="Button" id="Restar" value="-" class="btn btn-outline-warning btn-lg btn-block" onclick="operar(2)">
                </td>
                </tr>
            <tr>
                <td>
                    <input type="Button" id="4" value="4" class="btn btn-outline-primary btn-lg btn-block" onclick="darNumero('4')">
                </td>
                <td>
                    <input type="Button" id="5" value="5" class="btn btn-outline-primary btn-lg btn-block" onclick="darNumero('5')">
                </td>
                <td>
                    <input type="Button" id="6" value="6" class="btn btn-outline-primary btn-lg btn-block" onclick="darNumero('6')">
                </td>
                <td>
                    <input type="Button" id="Sumar" value="+" class="btn btn-outline-warning btn-lg btn-block" onclick="operar(1)">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="Button" id="1" value="1" class="btn btn-outline-primary btn-lg btn-block" onclick="darNumero('1')">
                </td>
                <td>
                    <input type="Button" id="2" value="2" class="btn btn-outline-primary btn-lg btn-block" onclick="darNumero('2')">
                </td>
                <td>
                    <input type="Button" id="3" value="3" class="btn btn-outline-primary btn-lg btn-block" onclick="darNumero('3')">
                </td>
                <td>
                    <input type="Button" id="igual" value="=" class="btn btn-outline-warning btn-lg btn-block" onclick="esIgual()">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="Button" id="0" value="0" class="btn btn-outline-primary btn-lg btn-block" onclick="darNumero('0')">
                </td>
            <td>
                    <input type="Button" id="," value="," class="btn btn-outline-primary btn-lg btn-block" onclick="darComa()">
                </td>
                <td>
                <input type="Button" id="C" value="C" class="btn btn-outline-danger btn-lg btn-block" onclick="darC()">
                </td>
            </tr>
        </table>
</body>
    </div>
    <div class="col">
    </div>
  </div>
    
</div>
@endsection
<script>
            //Declaracion de variables
	        var num1 = 0;
	        var num2 = 0;
	        var opera;

        //Función que coloca el número presionado
        function darNumero(numero){
            if(num1==0 && num1 !== '0.'){
                num1 = numero;
            }else{
                num1 += numero;
            }
            refrescar();
        }

        //Función que coloca la coma al presionar dicho botón
        function darComa(){
            if(num1 == 0) {
                num1 = '0.';
            } else if(num1.indexOf('.') == -1) {
                num1 += '.';
            }
            refrescar();
        }

        //Función que coloca la C al presionar dicho botón
        function darC(){
            num1 = 0;
            num2 = 0;
            refrescar();
        }


        //Esta función realiza las distintas operaciones aritméticas en función del botón pulsado
        function operar(valor){
            if (num1 == 0){
                num1 = parseFloat(document.getElementById("valor_numero").value);
            }
            num2 = parseFloat(num1);
            num1= 0;
            opera = valor;
        }

        //Función para pulsar igual
            /*
        	suma = 1
        	resta = 2
        	multiplicacion = 3
        	division = 4
        	potencia = 5
        */

        function esIgual(){
            num1 = parseFloat(num1);
            switch (opera){
                case 1:
                    num1 += num2;
                break;
                case 2:
                    num1 = num2 - num1;
                break;
                case 3:
                    num1 *= num2;
                break;
                case 4:
                    num1 = num2 / num1;
                break;
                case 5:
                    num1 = Math.pow(num2, num1);
                break;
            }
            refrescar();
            num2 = parseFloat(num1);
            num1 = 0;
        }

        function refrescar(){
            document.getElementById("valor_numero").value = num1;
        }
    </script>