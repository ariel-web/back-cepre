<!DOCTYPE html>
<html>
<head>
    <title>CEPREUNA</title>
    <style> 

    </style>
</head>
<body style="font-family: 'Gill Sans Extrabold', Helvetica, sans-serif; *{margin:0;padding:0}" >
    <div style="">

        <div>
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
        </div>

        <div style="margin-top: 10px; margin-bottom:20px">  
            <table style="width: 100%">
                <tr>
                    <td align="center"><div style="text-align: center"><span style="font-size:14pt; font-weight:bold">PRE - INSCRIPCIÓN</span></div></td>
                </tr>
                <tr>
                    <td align="center"><div style="text-align: center"><span style="font-size:14pt; font-weight:bold">EXAMEN CEPREUNA 2023</span></div></td>
                </tr>
                {{-- <tr>
                    <td align="center"><div style="text-align: center"><span style="font-size:18pt; font-weight:bold">PRE - INSCRIPCIÓN</span></div></td>
                </tr> --}}
            </table>
        </div>


        <div style="margin-top:6px">
            <table style="font-size:11pt; font-weight:bold; width:100%;">
                <tr style="height:85px; padding:0;">
                    <td style="" width="195px" align="left" valign="top">MODALIDAD</td>
                    <td style="" width="5px" align="left" valign="top">:</td>
                    <td style="" align="left" valign="top"><div style="text-align: justify; font-weight: regular;"><span>&nbsp;</span></div></td>
                    <td style="" rowspan="7" align="right"  width="150px" valign="top">
                        <div style="border:solid 1px white; padding:5px; width:125px">
                            <div style="overflow: hidden; height:150px; width:125px;">
                                {{-- <img src="{{ "https://back-admi.arielluqu3.com/".$datos->foto_url }}" height="150"> --}}
                            </div>
                        </div>
                    </td>
                </tr>
                <tr style="margin-bottom:-12px;">
                    <td width="195px" align="left" valign="top"><div style="margin-top: -6px;">PROGRAMA DE ESTUDIOS</div></td>
                    <td width="5px" align="left" valign="top"><div style="margin-top: -6px;">:</div></td>
                    <td align="left" valign="top"><div style="text-align: justify; font-weight: regular; margin-top: -6px;"><span style="text-transform: capitalize;">{{$datos->programa}}</span></div></td>
                </tr>
                <tr>
                    <td width="195px" align="left" valign="top"><div style="margin-top: -12px;"> NRO. DE DOCUMENTO </div></td>
                    <td width="5px" align="left" valign="top"><div style="margin-top: -12px;">:</div></td>
                    <td align="left" valign="top"><div style="text-align: justify; font-weight: regular; margin-top: -12px;"><span style="text-transform: capitalize;">{{$datos->nro_doc}}</span></div></td>
                </tr>
                <tr>
                    <td width="195px" align="left" valign="top"><div style="margin-top: -18px;"> APELLIDO PATERNO </div></td>
                    <td width="5px" align="left" valign="top"><div style="margin-top: -18px;">:</div></td>
                    <td align="left" valign="top"><div style="text-align: justify; font-weight: regular; margin-top: -18px;"><span style="text-transform: capitalize;">{{$datos->primer_apellido}}</span></div></td>
                </tr>
                <tr>
                    <td width="195px" align="left" valign="top"><div style="margin-top: -24px;">APELLIDO MATERNO </div></td>
                    <td width="5px" align="left" valign="top"><div style="margin-top: -24px;">:</div></td>
                    <td align="left" valign="top"><div style="text-align: justify; font-weight: regular; margin-top: -24px;"><span style="text-transform: capitalize;">{{$datos->segundo_apellido}}</span></div></td>
                </tr>
                <tr>
                    <td width="195px" align="left" valign="top"><div style="margin-top: -30px;"> NOMBRES </div></td>
                    <td width="5px" align="left" valign="top"><div style="margin-top: -30px;">:</div></td>
                    <td align="left" valign="top"><div style="text-align: justify; font-weight: regular; margin-top: -30px;"><span style="text-transform: capitalize;">{{$datos->nombres}}</span></div></td>
                </tr>
                <tr>
                    <td width="195px" align="left" valign="top"><div style="margin-top: -36px;"> FECHA INSCRIPCIÓN </div></td>
                    <td width="5px" align="left" valign="top"><div style="margin-top: -36px;">:</div></td>
                    <td align="left" valign="top"><div style="text-align: justify; font-weight: regular; margin-top: -36px;"><span style="text-transform: capitalize;">{{$fecha}}</span></div></td>
                </tr>

            </table>
        </div>

        <div style="margin-top:-30px">
            <table style="font-size:11pt;  width:100%;">
                <tr style="height:85px; padding:0;">
                    <td>
                        <div>
                            <span style="font-weight:bold">
                                DECLARACIÓN JURADA
                            </span>
                        </div>
                        <div style="text-align: justify;">
                            <p style="line height:160%;">
                                EL QUE SUSCRIBE, DECLARA BAJO JURAMENTO QUE LA INFORMACIÓN CONSIGNADA EN EL PROCESO 
                                DE PRE INSCRIPCIÓN ES VERDADERO Y DE MI ENTERA RESPONSABILIDAD, CONOZCO Y ACEPTO LO 
                                DISPUESTO EN EL REGLAMENTO DEL <span style="font-weight:bold;">EXAMEN DE ADMISIÓN CEPREUNA PRESENCIAL 2023 - I</span>
                                , DEL MISMO MODO APERSONRME A LA OFICINA DE DIRECIÓN DE ADMISIÓN PARA LA INSCRIPCIÓN PRESENCIAL SEGÚN AL ÁREA QUE CORRESPONDA, 21 Y 22 
                                DE FEBRERO ÁREA BIOMEDICAS, 23 Y 24 DE FEBRERO ÁREA INGENIERÍA, 27 Y 28 DE FEBRERO ÁREA SOCIALES.
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div style="margin-top:0px">
            <table style="font-size:11pt;  width:100%;">
                <tr>
                    <td style="" valign="top">
                        <div>
                            <span style="font-weight:bold;">
                                DÍA DE LA INSCRIPCIÓN PRESENCIAL PRESENTAR LO SIGUIENTE:
                            </span>
                            <div style="margin-top: 16px">
                                <div><span>- </span><span>Comprobante de pago original y copia</span></div>
                                <div><span>- </span><span>Documento Nacional de Identidad original y copia</span></div>
                                <div><span>- </span><span>Constancia de examen vocacional</span></div>
                                <div><span>- </span><span>Carné de vacunación (tres dosis)</span></div>
                                <div style="text-align: justify"><span>- </span><span>Certificado de Estudios original o Constancia de Logros de AprendIzaje del primero al quinto grado de</span></div>
                                <div><span>&nbsp; </span><span>educación secundaria visado por la UGEL o DRE correspondiente.</span></div>
                                <div><span>- </span><span>Constancia de no adeudar a la CEPREUNA</span></div>
                                <div><span>- </span><span>Constancia de Examen Médico para (Postulantes a Medicina o Educación física)</span></div>
                                <div style="margin-top: 16px"><span style="font-weight:bold">Ojo: (de no presentar lo indicado no podrá registrar su inscripción)</span></div>                                
                            </div>
                        </div>
                    </td>

                </tr>

            </table>


            <table style="width:100%; bakcground:orange; margin-top:40px">
                <tr>
                    <td align="right"> 
                        <span style="font-size:8pt;"><?php echo DNS1D::getBarcodeHTML($datos->codigo,'C128');?> </span>
                    </td> 
                </tr>
                <tr>                    <td>
                    <div> {{$datos->codigo}}</div>
                </td>
</tr>
            </table>
        </div>

    </div>
</body>
</html>