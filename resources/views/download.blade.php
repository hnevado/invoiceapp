<html>
    <head>
        <title>Factura</title>
    </head>
    <body style="padding-top:50px;padding:15px;">
<!--
Pos 0: Nombre cliente
Pos 1: empresa
Pos 2: nif_cif
Pos 3: direccion 
Pos 4: ciudad
Pos 5: provincia
Pos 6: pais
Pos 7: importe 
Pos 8: iva, 
Pos 9: concepto
Pos 10: Nº Factura
-->
    
       <h2 style="margin-bottom:25px;text-align:center">FACTURA NÚMERO: {{$datos[10]}}</h2>
       <hr/>

      <div class="datos_emisor" style="width:46.5%;margin:1%;display:inline-block; vertical-align:top;margin-top:25px;"> 
        <p><strong>EMPRESA</strong></p>
        <p>{{$usuario->nombre}}<br/>
            {{$usuario->empresa}} <br/>
            {{$usuario->nif_cif}}<br/>
            {{$usuario->direccion}}<br/>
            {{$usuario->ciudad}}. {{$usuario->provincia}}, {{$usuario->pais}}
         </p>
       
        

      </div>

      <div class="datos_cliente" style="width:46.5%;margin:1%;display:inline-block; vertical-align:top; margin-top:25px;">
           <p><strong>CLIENTE</strong></p>
           <p>  {{$datos[0]}} <br/>
                {{$datos[1]}} <br/>
                {{$datos[2]}} <br/>
                {{$datos[3]}} <br/>
                {{$datos[4]}}, {{$datos[5]}}, {{$datos[6]}}
           </p>
      
       </div>
       <hr/>

       <div class="concepto" style="width:46.5%;margin:1%;display:inline-block; vertical-align:top; margin-top:25px;">
         <p><strong>CONCEPTO:</strong></p>
         
         <p> {{$datos[9]}} </p>
       </div>

       <hr/>

       <div class="datos_factura" style="margin-top:50px;margin:1%">


         <p style="text-align:right"><strong>IMPORTE:</strong> {{$datos[7]}} &euro;</p>
         <p style="text-align:right"><strong>IVA:</strong> {{$datos[8]}} %</p>
         <p style="text-align:right"><strong>IMPORTE FINAL:</strong>   {{ ($datos[7] * ($datos[8]/100)) + $datos[7]  }}&euro;</p>
        </div>

        <hr/>

        <div class="footer" style="text-align:right;margin-top:50px">
            <h4>{{date("d-m-Y")}}</h4>
        </div>
    </body>
 </html>

