<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ingresantes</title>
</head>

<body style="font-family: 'Gill Sans Extrabold', Helvetica, sans-serif; margin-right: 1cm; margin-top:100px">
    <div >
        <table style="width: 90%;">
            <tr>
                <td  colspan="3">
                    <h2 align="center">CONSTANCIA DE INGRESANTE</h2>
                </td>
            </tr>
            <tr>
                <td  colspan="3">
                    <div style="text-align: justify;" >La Dirección de Admisión de la UNA - PUNO CERTIFICA que:
                        <b>{{$datos->paterno}} {{$datos->materno}}, {{$datos->nombres}}</b>
                        identificado con DNI N°<b> {{$datos->dni}}</b>, es ingresante al Programa de Estudios de
                       <spam style="text-transform: uppercase;"><b> {{$datos->pro_estudios}}</b></spam> , por
                        modalidad de<spam style="text-transform: uppercase;"> <b>CEPREUNA</b></spam>, realizado el 4 y 5 de marzo de 2023, con puntaje de
                        <b> {{$datos->puntaje}}</b>.
                    </div>
                </td>

            </tr>
        <table>
        <table style="width: 100%; margin-top:20px;" >
            <tr>
                <td align="center">
                    <div>
                        <img src="{{ public_path('imagenes/fotos/'.$datos->dni.'.jpg')}} " alt="" height="150">                        
                    </div>
                </td>
            </tr>
        </table>

        <table style="margin-top:-10px; margin-left:40px;">
            <tr>
                
                <td  width="34%" align="center">
                    <div style="width: 150px; height: 180px;  border: 1px solid #000;">
                        <img src="{{ public_path('imagenes/HUELLAS/'.$datos->dni.'.jpg')}} " alt="" height="175">
                    </div>
                </td>
              
                 <td></td>   

                <td  width="34%" align="center">
                    <div style="width: 150px; height: 180px;  border: 1px solid #000;">
                        <img src="{{ public_path('imagenes/HUELLAS/'.$datos->dni.'x.jpg')}} " alt="" height="175">
                    </div>
                </td>
        
            </tr>
            <tr>
                <td colspan="3" style="height: 50px;" align="center">índice derecho, indice de izquierdo</td>
            </tr>

            <tr>
                <td colspan="3"style="height: 100px;" width="33%" align="right"> Puno, 6 de marzo de 2023</td>
            </tr>
            <tr>
                <td style="height: 200px;" align="center"><p>_________________________</p>
                    Firma del ingresante    
                </td>
                <td style="height: 200px;" align="center"><p>_________________________</p>
                    V° B° DAD 2023    </td>
                <td style="height: 250px; margin-top: 20px;" align="center"><p>_________________________</p>
                   <p>  Firma docente validador</p> 
                <p>Apaza Cruz, Jorge Luis</p></td>
            </tr>
        </table>
        


    </div>



</body>

</html>