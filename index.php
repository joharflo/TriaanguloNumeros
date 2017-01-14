<!-- ***********************************************
     *                                             *
     *                                             *
     *                                             *
     *                                             *
     *       Hecho por Johnny Armando Florez       *
     *       Twitter: @joharflo                    *
     *       Faecbook: /joharflo                   *
     *       GitHub:  joharflo                     *
     *       correo:joharflo@hotmail.com           *
     *                                             *
     ***********************************************
     -->


//dibujamos un pequeño formulario para pedir el numero de filas.

<form action="index.php" method="post" name="filas" >
<table align="center">
  <tr><td align="center">Numero de Filas</td></tr>
  <tr><td align="center"> <select name="numFilas" id="numFilas">
             <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
             <option value="4">4</option>
             <option value="5">5</option>
             <option value="6">6</option>
             <option value="7">7</option>
             <option value="8">8</option>
             <option value="9">9</option>
             <option value="10">10</option>
             <option value="11" selected="selected">11</option>
             <option value="12">12</option>
             <option value="13">13</option>
             <option value="14">14</option>
             <option value="15">15</option>
             <option value="16">16</option>
             <option value="17">17</option>
             <option value="18">18</option>
             <option value="19">19</option>
             <option value="20">20</option>
            </select> 
  </td></tr>
  <tr><td align="center"><input type="submit" value="Enviar" name="enviar" id="enviar" /></td></tr>
 </table>
</form>

<?php 

//Si no se ha enviado le numero de filas da este mensaje
 if (!$_POST){
  echo "A la espera de numero de filas";      
    }

 // luego de de enviar el numero de filas entramos en esta condicion   
 if ($_POST){
  $vectorNumeros = array(0,1,2,3,4,5,6,7,8,9);// vector de ayuda para imprimir los numeros del triangulo
  $numeroFilas=$_POST['numFilas']; //recibimos el numero de filas
  $numeroColumnas=$numeroFilas*2-1; // calculamos el numero de columnas

// dibujamos la tabla sin borde en cada celda va un numero correspondiente

 echo "<table align='center' border='0'>"; 

  for ($i=1; $i < $numeroFilas+1; $i++) {
    
    echo "<tr>";// dibujamos la fila

    for ($j=1; $j <$numeroColumnas+1 ; $j++) { 

      //OJO aqui determinamos si la celda queda vacia o lleva un numero
      if ((($i+$j)>=($numeroColumnas-$numeroFilas+2)) and (($j-$i)<$numeroFilas)){
        $numMuestra=substr(($i*2-1), -1);
        
        if ($j==$numeroFilas) {
          echo "<td><h4>".$numMuestra."</h4></td>"; 
        }else{
          $movVector=substr(abs($numeroFilas-$j),-1);
          $indiceVector=$numMuestra-$movVector;
          if ($indiceVector<0){$indiceVector=$indiceVector+10;}
          $numMuestra=$vectorNumeros[$indiceVector];
          echo "<td><h4>".$numMuestra."</h4></td>";
        }               
      }else{
        echo "<td><h4></h4></td>";
      }
    }
    echo "</tr>"; 
  }
echo "</table>";

}
?>