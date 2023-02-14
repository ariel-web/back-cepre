<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body style="font-family: 'Gill Sans Extrabold', Helvetica, sans-serif">
    <div style="height:400px;">
        <table style="width:100%;">
            <tr>
                <td rowspan="1">
                    <img src="{{ public_path('imagenes/logo_unap.jpg')}}" alt="" width="85">
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
                <td align="center" valign="center" style="font-size:17pt; font-weight:700;"></td>
                <td align="right" style="width:130px;"> 
                    <span style="font-size:8pt;"><?php echo DNS1D::getBarcodeHTML($codigo,'C128');?> </span>
                    <div> {{$codigo}} </div>
                </td> 
            </tr>
        </table>
        <table style="width:100%; bakcground:orange; font-size:13pt; ">
            <tr>
            <td>
                <div style="text-align:center; font-weight:700;">
                    <span style="font-size: 2.4rem">CONSTANCIA DE EXAMEN VOCACIONAL</span>
                </div>
                <div style="text-align:center; font-weight:700; margin-top:30px;">
                    <span style="font-size: 2.2rem">NOTA: {{$nota}}</span>
                </div>
            </td>
            </tr>
            <tr>
                <td align="center"><div style="margin-top:10px;">Puno, {{$ldate}} de Febrero de 2023</div></td>
            </tr>
        </table>

    </div>
    <!-- <div style="height:30px;">

    </div> -->
</body>
</html>