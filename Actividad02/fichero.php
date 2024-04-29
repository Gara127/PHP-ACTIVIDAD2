<?php
	
    if(isset($_POST['enviar1'])){
        $texto =($_POST["text"]); 
        
        $texto = trim($texto); // eliminamos espacios en blanco al principio y al final del texto.
        $texto= strtolower($texto); // convertimos todos los carácteres a mínusculas
        $texto= preg_replace('/[^a-z0-9]/',"",$texto); // queremos eliminar los carácteres que no sean letras minúsculas que no sean de la a-z. (^-> negación). dentro de la "" es por lo que lo queremos reemplazar pero como solo queremos eliminarla no escribirmos nada.
        
        if (empty($texto)){
            echo "<p style='color:red;'><strong>Rogamos por favor introducir texto válido.</strong></p>";
        }else{  
            $textoInvertido = strrev($texto); //invertir el texto

            if ($textoInvertido == $texto){
                echo "Existe un palíndromo en el texto introducido.";
            }else{
                echo"No existe un palíndromo en el texto introducido.";
            }
        }
    } 

    if(isset($_POST['enviar2'])){
        $dias = $_POST["dias"]; 

        $menu = array(
            "lunes" => "arroz y pechuga de pollo",
            "martes" => "lentejas",
            "miercoles" => "caldo de pescado",
            "jueves" => "salteado de verduras",
            "viernes"=> "ensalada",
            "sabado" => "pollo asado",
            "domingo" => "chuletas de cerdo"); 

        echo "El plato del día $dias es $menu[$dias].";
    }   
    
    if(isset($_POST['enviar3'])){
        $num1 = $_POST["num1"];
        $num1= preg_replace('/[^-0-9,.]/',"",$num1);
        $num1= str_replace(",",".",$num1);
        
        
        $num2= $_POST["num2"];
        $num2= preg_replace('/[^-0-9,.]/',"",$num2);
        $num2= str_replace(",",".",$num2);
       
        
        $operacion = $_POST["operacion"];
        
        if ($num1 == "" || $num2 == "" || $operacion == ""){
            echo "<p style='color:red;'><strong>Rogamos por favor introducir dígitos numéricos.</strong></p>";
        }else{  
       
            switch($operacion){

                case "sumar";
                    $rSuma = $num1 + $num2;
                    echo "El resultado de la suma es $rSuma.";
                    break;

                case "restar";
                    $rResta = $num1 - $num2;
                    echo "El resultado de la resta es $rResta.";
                    break;

                case "multiplicar";
                    $rMulti = $num1 * $num2;
                    echo "El resultado de la multiplicacion es $rMulti.";
                    break;

                case "dividir";
                    if ($num2 == 0){
                        echo "<p style='color:red;'><strong>Error inderterminación, no se puede dividir por 0.</strong></p>";    
                    }else{
                        $rDividir = $num1 / $num2;
                        echo "El resultado de la division es $rDividir.";
                    } 
                    break;   
                    
            }
        }        
    }

    if(isset($_POST['enviar4'])){
        $texto =($_POST["numeros"]);
        $texto = trim($texto, " ,"); // elimina los espacios en blanco y las comas delante y atrás 
        $texto = str_replace(" ", "", $texto);
        $texto= preg_replace('/[^0-7,]/',"", $texto);
        $cadena = explode(',',$texto); //  (',') es el delimitador. En este caso, estamos usando la coma como delimitador. Es un array.
        
        if(empty($texto)){
            echo "<p style='color:red;'><strong>Rogamos por favor introducir los números de interruptores que desea modificar.</strong></p>";
        }else{
            
            $valid = true;
            for ($i=0; $i< count($cadena); $i++){
                if($cadena[$i]<0 || $cadena[$i]> 7){
                    $valid = false;
                    break;
                }
            }

            if($valid){
                //print_r($cadena);

                $interruptor = array();
                $interruptor[0] = false;
                $interruptor[1] = false;
                $interruptor[2] = false;
                $interruptor[3] = false;
                $interruptor[4] = false;
                $interruptor[5] = false;
                $interruptor[6] = false;
                $interruptor[7] = false;
                
                for ($i=0; $i< count($cadena); $i++){
                    $interruptor[$cadena[$i]] = !$interruptor[$cadena[$i]];
                }

                for ($i=0; $i< count($interruptor); $i++){
                    if ($interruptor[$i]) {
                        echo "El interruptor ".$i." vale true. </br>";
                    } else {
                        echo "El interruptor ".$i." vale false. </br>";
                    }
                }
            }else {
                echo"Por favor introduce números entre el 0 y el 7.</br>";
            }
        }     
    }

    if(isset($_POST['enviar5'])){
        $numeroDNI =($_POST["dni"]);
        $numeroDNI= preg_replace('/[^0-9]/',"", $numeroDNI);
        $numeroDNI = substr($numeroDNI, 0, 8);
        
        if(empty($numeroDNI)){
            echo "<p style='color:red;'><strong>Rogamos por favor el número del DNI a consultar.</strong></p>";
        }else{
            $resto = $numeroDNI % 23;

            $listado = array(
                "0" => "T",
                "1" => "R",
                "2" => "W",
                "3" => "A",
                "4" => "G",
                "5" => "M",
                "6" => "Y",
                "7" => "F",
                "8" => "P",
                "9" => "D",
                "10" => "X",
                "11" => "B",
                "12" => "N",
                "13" => "J",
                "14" => "Z",
                "15" => "S",
                "16" => "Q",
                "17" => "V",
                "18" => "H",
                "19" => "L",
                "20" => "C",
                "21" => "K",
                "22" => "E"); 

            echo "La letra del numero de DNI introducido es $listado[$resto]";
        }   
    }

?>