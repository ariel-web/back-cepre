<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body style="font-family: 'Gill Sans Extrabold', Helvetica, sans-serif">
    <div style="height:450px;">
        <table style="width:100%;">
            <tr>
                <td rowspan="1">
                    <td align="center" rowspan="1"> <img src="{{ public_path('imagenes/logotiny.png')}}"  width="65"></td>
                </td>
                <td align="center" style="font-size:14pt; font-weight:700;">
                    <div>UNIVERSIDAD NACIONAL DEL ALTIPLANO</div>
                    <div>VICERECTORADO ACADÉMICO</div>
                    <div>DIRECCIÓN DE ADMISIÓN</div>
                </td>
                <td align="center" rowspan="1"> <img src="{{ public_path('imagenes/logoDAD.jpg')}}"  width="85"></td>
            </tr>
        </table>
        <table style="width:100%; bakcground:orange;">
            <tr>
                <td width="130"></td>
                <td align="center" valign="center" style="font-size:14pt; font-weight:700;">EXAMEN DE ADMISION GENERAL 2023-I</td>
                <td align="right" style="width:130px;"> 
                    <span style="font-size:8pt;"><?php echo DNS1D::getBarcodeHTML($codigo,'C128');?> </span>
                    <div> {{$codigo}} </div>
                </td>
            </tr>
        </table>
        <table style="width:100%; bakcground:orange;">
            <tr>
                <td align="center" valign="center" style="font-size:17pt; font-weight:700;">CONSTANCIA DE EXAMEN VOCACIONAL</td>
            </tr>
        </table>
        <table style="width:100%; bakcground:orange; font-size:13pt; margin-top:10px;">
            <tr>
                <td><div style="text-align:justify; font-weight:700;">LA DIRECCIÓN DE ADMISIÓN DE LA UNIVERSIDAD NACIONAL DEL ALTIPLANO</div></td>
            </tr>
            <tr>
                <td><div style="font-weight:700; margin-top:-4px;"> HACE CONSTAR: </div></td>
            </tr>
            <tr>
                <td><div style="text-align:justify; margin-top:5px;">
                    Que el Sr(a): <span style="font-weight:700; text-transform: uppercase;">{{ $nombre_completo }}</span>, identificado con D.N.I. 
                    N° <span style="font-weight:700;">{{$dni_p}}</span>, ha cumplido con RENDIR EL 
                        <span style="font-weight:700;">EXAMEN VOCACIONAL </span> quedando <span style="font-weight:700;">APTO</span> para continuar su inscripción.</div></td>
            </tr>
            <tr>
                <td align="right"><div style="margin-top:0px;">Puno, {{$ldate}} de febrero de {{$lanio}}</div></td>
            </tr>
        </table>

        <table style="width:100%; font-size:13pt; margin-top:5px;">
            <tr>
                <td align="center">
                    <div style="padding-left:50px; padding-right:30px; width:80%; text-align:center;">
                        <div style="z-index:2; margin-bottom:-20px; margin-left:-80px;" >
                            <img src="{{ public_path('imagenes/firma_doctor.png')}}"  width="85">
                        </div>
                        <div style="z-index:1; text-align:center; border-top: solid 1px black; width:250px;">DIRECTOR DE ADMISIÓN</div>
                    </div>
                </td>
                <div style="z-index:2; margin-bottom:0px; margin-left:80px; margin-top:5px" >
                    <img src="{{ public_path('imagenes/firma_ariel.png')}}"  width="95">
                </div>
                <div style="z-index:1; text-align:center; border-top: solid 1px black; width:250px;">JEFE DE CÓMPUTO</div>
            </tr>
        </table>
    </div>
</body>
</html>