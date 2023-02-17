<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body style="font-family: 'Gill Sans Extrabold', Helvetica, sans-serif">
    <div style="height:590px;">
        <table style="width:100%;">
            <tr>
                <td rowspan="1">
                    <img src="{{ public_path('imagenes/logotiny.png')}} " alt="" width="85">
                </td>
                <td align="center" style="font-size:14pt; font-weight:700;">
                    <div>UNIVERSIDAD NACIONAL DEL ALTIPLANO</div>
                    <div>DIRECCIÓN DE ADMISIÓN</div>
                    <div>EXAMEN CEPREUNA 2023-I</div>
                </td>
                <td align="center" rowspan="1"> <img src="{{ public_path('imagenes/logoDAD.jpg')}}"  width="85"></td>
            </tr>
        </table>
        <table style="width:100%; bakcground:orange;">
            <tr>
                <td width="130"></td>
                <td align="center" valign="center" style="font-size:17pt; font-weight:700;">CONSTANCIA</td>
                <td align="right" style="width:130px;"> 
                    <span style="font-size:8pt;"><?php echo DNS1D::getBarcodeHTML($codigo,'C128');?> </span>
                    <div> {{$codigo}} </div>
                </td>
            </tr>
        </table>
        <table style="width:100%; bakcground:orange; font-size:13pt; ">
            <tr>
                <td><div style="text-align:justify; font-weight:700;">EL JEFE DE LA SUB UNIDAD DE SERVICIO MÉDICO PRIMARIO DE LA UNIVERSIDAD NACIONAL DEL ALTIPLANO</div></td>
            </tr>
            <tr>
                <td><div style="font-weight:700; margin-top:-4px;"> HACER CONSTAR: </div></td>
            </tr>
            <tr>
                <td><div style="text-align:justify; margin-top:5px;">
                    Que el Sr(a): <span style="font-weight:400; text-transform: uppercase;">____________________________________________</span>, identificado con D.N.I. 
                    N°: <span style="">_____________</span>, postulante al programa de Estudios de 
                    <span style="font-weight:700;">{{$programa}}</span>, ha cumplido con el 
                    <span style="font-weight:700;">EXAMEN MÉDICO</span> quedando <span style="font-weight:700;">APTO</span> para continuar su inscripción.</div></td>
            </tr>
            <tr>
                <td align="right"><div style="margin-top:10px;">Puno, _____ de Febrero de {{$lanio}}</div></td>
            </tr>
        </table>

        <table style="width:100%; font-size:13pt; margin-top:70px;">
            <tr>
                <td align="center"><div style="padding-left:50px; padding-right:30px; width:80%; text-align:center;"><div style="text-align:center; border-top: solid 1px black; width:250px;">Medico</div></div></td>
                <td align="center"><div style="padding-left:30px; padding-right:30px; width:80%;"><div style="text-align:center; border-top: solid 1px black; width:250px;">Jefe</div></div></td>
            </tr>

        </table>
    </div>
    <!-- <div style="height:30px;">

    </div> -->

    <div style="height:440px;">
        <table style="width:100%;">
            <tr>
                <td rowspan="1">
                    <img src="{{ public_path('imagenes/logotiny.png')}} " alt="" width="85">
                </td>
                <td align="center" style="font-size:14pt; font-weight:700;">
                    <div>UNIVERSIDAD NACIONAL DEL ALTIPLANO</div>
                    <div>DIRECCIÓN DE ADMISIÓN</div>
                    <div>EXAMEN EXTRAORDINARIO 2023</div>
                </td>
                <td align="center" rowspan="1"> <img src="{{ public_path('imagenes/logoDAD.jpg')}}"  width="85"></td>
            </tr>
        </table>
        <table style="width:100%; bakcground:orange;">
            <tr>
                <td width="130"></td>
                <td align="center" valign="center" style="font-size:17pt; font-weight:700;">CONSTANCIA</td>
                <td align="right" style="width:130px;" > 
                    <span style="font-size:8pt;"><?php echo DNS1D::getBarcodeHTML($codigo,'C128');?> </span>
                    <div> {{$codigo}} </div>
                </td>
            </tr>
        </table>
        <table style="width:100%; bakcground:orange; font-size:13pt; ">
            <tr>
                <td><div style="text-align:justify; font-weight:700;">EL JEFE DE LA OFICINA DE SERVICIO MÉDICO PRIMARIO DE LA UNIVERSIDAD NACIONAL DEL ALTIPLANO</div></td>
            </tr>
            <tr>
                <td><div style="font-weight:700; margin-top:-4px;"> HACER CONSTAR: </div></td>
            </tr>
            <tr>
                <td><div style="text-align:justify; margin-top:5px;">
                    Que el Sr(a): <span style="font-weight:400; text-transform: uppercase;">_________________________________________</span>, identificado con D.N.I. 
                    N°: <span>______________</span>, postulante al programa de Estudios de 
                    <span style="font-weight:700;">{{$programa}}</span>, ha cumplido con el 
                    <span style="font-weight:700;">EXAMEN MÉDICO</span> quedando <span style="font-weight:700;">APTO</span> para continuar su inscripción.</div></td>
            </tr>
            <tr>
                <td align="right"><div style="margin-top:10px;">Puno, ______ de Febrero de 2023</div></td>
            </tr>
        </table>

        <table style="width:100%; bakcground:orange; font-size:13pt; margin-top:70px;">
            <tr>
                <td align="center"><div style="padding-left:50px; padding-right:30px; width:80%; text-align:center;"><div style="text-align:center; border-top: solid 1px black; width:250px;">Medico</div></div></td>
                <td align="center"><div style="padding-left:30px; padding-right:30px; width:80%;"><div style="text-align:center; border-top: solid 1px black; width:250px;">Jefe</div></div></td>
            </tr>

        </table>
    </div>
</body>
</html>