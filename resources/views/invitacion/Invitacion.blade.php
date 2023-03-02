<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
    <style>
        *{margin:0;padding:0}
    </style>
</head>
<body style="font-family: 'Gill Sans Extrabold', Helvetica, sans-serif; margin:15px; border:solid 1px #00000075; padding:10px 10px;">
    <div style="">
        <table style="width:100%; padding:0px 10px;" >
            <tr>
                <td rowspan="1" style="width: 70px">
                    <div style="">
                        <img src="{{ public_path('imagenes/logotiny.png')}} " alt="" width="60">
                    </div>
                </td>
                <td align="left" style="font-size:12pt;">
                    <div>UNIVERSIDAD NACIONAL DEL ALTIPLANO</div>
                    <div>VICERRECTORADO ACADÉMICO</div>
                    <div>DIRECCIÓN DE ADMISIÓN</div>
                </td>
                <td align="right" rowspan="1"> <img src="{{ public_path('imagenes/logoDAD.jpg')}}"  width="70"></td>
            </tr>
        </table>
        <table style="width:100%; bakcground:orange; margin-top:15px;">
            <tr>
                <td width="130"></td>
                <td align="center" valign="center" style="font-size:34pt; font-weight:700;">INVITACIÓN</td>
                <td align="right" style="width:130px;"> 
                    {{-- <span style="font-size:8pt;"><?php echo DNS1D::getBarcodeHTML('01232242','C128');?> </span>
                    <div> 01232242 </div> --}}
                </td>
            </tr>
        </table>
        <table style="width:100%; bakcground:orange; margin-top:10px;">
            <tr>
                <td>
                    <div style="text-align:center; font-size:19pt; padding:0px 20px; font-style: italic;">
                        El director de la Dirección de Admisión, 
                        Dr. Héctor Velázquez Sagua, se complace en invitarle 
                        al sorteo de docentes nombrados 
                        para la participación el proceso de examen
                    </div>
                    <div style="text-align:center; font-size:19pt; padding:0px 20px; font-style: italic;">
                        CEPREUNA 2023-I
                    </div>
                </td>
            </tr>
        </table>

        <table style="width:100%; bakcground:orange; margin-top:15px;">
            <tr>
                <td align="left">
                    <div style="font-size:17pt; padding:0px 20px; font-style: italic;">
                        <div><span style="font-weight:bold;">Fecha de sorteo: </span>viernes, 3 de marzo de 2023 </div>
                        <div><span style="font-weight:bold;">Hora: </span> 5:30 am a 6:00 am </div>
                        <div><span style="font-weight:bold;">Lugar de Sorteo</span>Auditorio Magno</div>
                    </div>
                </td>
            </tr>
        </table>

        </table>

        <table style="width:100%; bakcground:orange; margin-top:10px;">
            <tr>
                <td style="width: 400px;">
                    <div style="font-size:15pt; padding:0px 20px; font-style: italic;">
                        <div><span style="font-weight:bold;">Para: </span><span style="text-transform: uppercase;">{{$nombre}}</span></div>
                        <div><span style="font-weight:bold;">Escuela: </span>{{$escuela}}</div>
                    </div>
                </td>
                <td align="right" style="margin-right: 15px;"> 
                    <span style="font-size:45pt;"><?php echo DNS1D::getBarcodeHTML($dni,'C128',4,95);?> </span>

                </td>
            </tr>
        </table>

    </div>



</body>
</html>