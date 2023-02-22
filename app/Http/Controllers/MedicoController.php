<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Constancia;
use App\Models\Postulante;
use PDF;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MedicoController extends Controller
{

    public function generPDFS(){
        $codigos = 
        [
        'TnrMrh','TSYYRB','YKztiu','ENaXDj','yHxuwU','LEeyFi','JVUWmr','cDVcgD','xiTgjn','WjRQYY','PyUptQ','akgRvp','fphezf','AAxyKJ','rbtXUF','PYWvqP','hphihW','VhBmdX','YpNeBr','CzjuKC',
        'FuwhCK','QKdUUC','SxykMG','TTyzvw','uWcJNG','VQpQna','cXxefg','HkuQwr','iwdfyc','BShwCi','FjpAxP','xJSPnk','tLTBXp','uTmnDb','BnEzBE','JrdcZK','MurxdX','zLAQkM','YiSXtU','uNPNCb',
        'vQwPKq','AjGFdB','LBquqE','HZbguL','BPVmfu','dwAwhz','ygQbNT','eQcmHZ','AMSrLA','pWmhQh','utvrxZ','QDWUEp','Aiymrv','NaThaU','bukAxW','vmgAur','JcxbYC','QmyLLn','HUCcXc','LKhJAZ',
        'aTKcMF','PCnMNF','AxPaKa','BFQkvA','PyPkDT','MpTbkq','kkpACf','jhtaCE','EgjLcH','BnnKzf','JFxaxN','TEpGaZ','gdCQay','cAdPvc','HuxGMh','FTWyPu','LmLDjQ','DxexaD','WEitcU','WYCuBW',
        'pGJmkP','GxVJEm','BXhPEQ','MyXVqt','TgmBLm','UKpfLz','pGreLW','ymKaGQ','wnmDQn','gyveeF','WqdqkZ','CcVPkz','SASgVb','AkDZjx','KGieqr','BacwVu','zFxHLm','qWYMkg','VRHSkD','efSzLn',
        'qdYvCR','xvUBYM','RYFTUb','etiBgi','pbguvw','kwZCKR','HNRRHu','NGaQJT','ZRnfMJ','DqHqzb','fiTayJ','vNHhRG','uJKnDz','mKBxnv','YqtrpE','RNxMDW','JtYjJJ','dUQGTq','AdSJPp','ySjwiP',
        'rYcped','nkczWK','tBWnqG','iAPmCX','WgSXHb','RVymty','JGFnVc','ZSKwYy','GdqQBZ','FkQVRf','ctGxTY','YwKTSR','avBrwf','rhSYLa','EAAuPL','aHRkSp','wASXGw','FtwquW','TAJTYn','BdwEfW',
        'fXahPr','dhgfeR','ZwuUbb','fNAFBB','jTYQnK','YGBaHa','dMqjfS','fvvPNT','aVvFXr','yVeCPm','UgQzBT','RHdzfh','GgqEPz','wFGibf','NEnfPx','EuBeEb','GDWHeW','aYKUuR','JabhLZ','MUPkVi',
        'WgcACk','DxqPhQ','kkVvWC','wpqvKT','wKPAHp','RwRnCW','egjmLw','DvPxqx','QXgFhy','yMnivZ','evjbGP','aDYege','nkVreK','REFaaP','jPAcPV','uEXpmd','yzxxgJ','BVMVZM','tpgBQS','SVaPQH',
        'rkYujr','ieAUGg','jjNYTa','eqJqpV','vcwiWb','hRBCjZ','AegCpN','zTefrb','ZmhJJq','RWCffj','feMTJv','RRDTjm','HuyVRe','axwhaK','wDnbhf','AQYKct','QDNzSd','nnYNHQ','NGjYma','ixeebk',
        'gWAfur','LpatDL','cUkLWM','ujgVCf','gwSACR','HEaVba','GbndBG','CvPmHT','zfWCXq','SVQrzP','xkbiqe','HGXuek','XiggTy','CJfBNK','iMMrPX','ntGTiW','bbeAdV','qnWhZt','vmhewh','DFPXSx',
        'Hbthwm','KBNfJw','icAcUk','iYRZky','eRXfEn','fPGdMq','SJNHiq','CDSLCz','UmvWmh','NxxJhQ','WyqMAG','jRHqJm','QTyVrN','qGBZZE','UKwzjV','BxDZug','UnHYSJ','SEEraz','RGBqLM','BgzecZ',
        'ZFygqL','idjiqh','EPbmWi','myZxZR','AueYZA','hXtGdF','QKeCMt','VpUrji','WFdKWw','WvLbXV','yJCvLT','TjqvKT','gkwytg','qEuufC','AGSdrT','EfNwFw','MnWFaC','CpYpZu','yJbdFd','nzTZNZ',
        'hWYVvU','PhdxHL','vMVeKa','AAhBtS','KSpYEt','ZMzGta','KCaxhN','gRqWex','dTUSUG','Fahirw','vtfLMr','fRgLiq','QSvudZ','VYezYr','LPVjnT','Cghbmk','HtfKuH','gQWaeV','fLBnyT','BZjhXd',
        'ixxSwi','bBqpmn','hNbbkG','BptWMJ','wjbieR','ibUeWj','VNHKAE','jnTZMi','RnzzpK','hjPaBp','uhqWLv','TfXHJf','dwbkka','jRRHxg','HDUbEq','NZyuQk','hRaZTu','wAXvGQ','WCTDzD','jCkiDA'
        ];

        $codigosF = 
        [
        
        'SQDFSJ','PANKJL','aahdzc','XCgdfV','itqyQU','bEmVuv','jkLVHr','QCqCYS','tpXmpG','kPnLzc','zBNSSY','WWqwgA','SvuCWN','DetnRL','XcnYeu','gaupxY','CGxwDk','NtxfvR','TGwBCJ','DCPxJG',
        'tnAFfB','bFqfwr','VrfFqp','iDVmrr','qmZTRd','PNiudw','uKbwGm','XxfnWP','cLDwgK','DjeQKC','AvPwUj','hjYQra','HmwZFg','nNgLAK','fBEmcv','GQSaxT','uWFgwY','gbDFVG','bdgFyy','Qvhnqy',
        'PCiNMU','RPZCrj','NDNCgp','MLTuMF','cUTXJu','iQpbDH','mXMqmx','muRCjZ','FeEWxk','baRakk','wSLmnk','PmqXuC','iMQwZJ','LXzXWe','MjWtTK','hqdVHZ','QYNbTC','nxVYte','VzamUZ','AXbAGa',
        'QUQbvx','xXLRGS','vKvHie','cBtUvU','GEDNcS','SRtvPA','uFEBtt','nPKMaw','hYpiNg','YkkMKu','jrribf','BCjxmW','bWxSAm','mfvbpd','dcMEyv','AtzuVr','FRChju','UvxpTE','XpjKYM','NTgUwd',
        'ZaUnUE','YPLYFZ','JcVxuY','VbmJES','Umxhny','KZTXfz','CGeKhj','aCQyYC','VThJyp','kqvLvc','SnueeE','eQCefR','zhcYha','cTqgLQ','iMRjhg','xxvRrM','kTfTDV','FqXxGV','FNWLUM','VWYQUv',
        'xTmycT','ZmaJPM','PBXLAg','HCwwCe','SSYVDi','jkwqBi','qQdDWV','nEUTUr','xBwTPH','SYDgay','DZCMUq','ukZVUc','dNuFDr','UieTCY','uvkEPc','CPPtcr','BwzEqj','XRPWWD','remNHN','FutkQn',
        'DSwxSb','RAEuMu','jedRfN','HxPLHa','nLRHQF','UDerdi','uHPrGp','HSYWrN','UmEHgd','YrmPjk','CytfcS','nkznvK','kExWPW','XGmYje','kSUJcX','YxFniz','AjRyNK','uEQkMh','rPeANk','xBZzwF',
        'CUhtTB','ecJihT','AXXeKE','zESFWM','khmpcq','wSQpHd','FjcJQF','VgLFgU','cuwaCP','xhYLpB','WdpcXp','KrTMEt','VNCbRj','Wbbtmf','xRyzwi','mSwpWh','nRwThd','qBmVdJ','pVZUBN','AxRtAV',
        'dwJEmU','hhMnNL','rFBrvv','fYczQC','dUYuHF','mHAPFL','ZhxSYv','gvHyaP','bEHgnX','WzJLCi','MxWQpD','tuQxSZ','hDRWHU','EjmGeG','uGMhpG','AMihZZ','zKfAYZ','wbZxKy','TRcfzB','TUmWrD',
        'cihHMn','AXaTdN','vrZrWv','avWMXV','LJHMNk','SRQDDT','qPdrcT','jYjUZz','PkrYhE','ZKWxGb','KSvzeg','EYWgua','LhkDuy','eRUWCz','ARzfGK','Sbmwhf','ifSMMD','MbPJPZ','JdhwfE','ufwizr',
        ];

        foreach($codigosF as $item){
            $this->guardar2($item);
        }   

    }



    public function constanciaVocacional($codigo,$dni,$nombre){

        $codigo = $codigo; 
        $id_programa = Str::substr($dni,8);
        $sql_programa = DB::select('select nombre FROM programa_de_estudios WHERE id = '.$id_programa);
        $programa = $sql_programa[0];

        $dni_p = Str::substr($dni, 0, 8);
        $nombre_completo = $nombre;

        $ldate = date('d');
        $lanio = date('Y');
        $pdf = PDF::loadView('Medico/constanciavocacional2', compact('codigo','ldate','lanio','dni_p', 'programa', 'nombre_completo'));
        // $pdf->stream($codigo);
        // $pdf->output();
        $pdf->setPaper('A5', 'landscape');

        $pdf->output();
        $output = $pdf->output();
        file_put_contents(public_path().'/documentos/constancias/nuevos/'.$dni."-".$nombre.'.pdf', $output);

//        $output = $pdf->output();
        return $pdf->download('mi-constancia-vocacional.pdf');

    }



    public function guardar2($codigo)
    {

        $nom = $codigo.date('Y'); 
        $url = public_path().'/documentos/constancias/'.$nom.'.pdf';

        // $position = Constancia::create([
        //     'codigo' => $codigo,
        //     'nombre' => $nom,
        //     'url' => $url,
        // ]);


        // $dni = $request->dni;
        $programa = 'EDUCACIÓN FÍSICA';
        //$programa = 'EDUCACIÓN FISICA';

        // $codigo = $request->constancia['codigo'];
        $ldate = date('d');
        $lanio = date('Y');
        $url = 'http://sistema-admision-back.test'.'/documentos/constancias/'.$nom.'.pdf';
        $pdf = PDF::loadView('Medico/constancia2', compact('programa','codigo','nom','ldate','lanio'));
        $pdf->output();
        $output = $pdf->output();
        file_put_contents(public_path().'/documentos/constancias/'.$nom.'.pdf', $output);

        $this->response['url'] = $url;
        $this->response['estado'] = true;
        return response()->json($this->response, 200);

    }
    public function guardar(Request $request)
    {
        try {
            $trans = DB::transaction(function () use ($request) {
                $pos = new Postulante();
                $pos->tipo_doc = 1;
                $pos->dni =  $request->dni;
                $pos->paterno = $request->postulante['paterno'];
                $pos->materno = $request->postulante['materno'];
                $pos->nombres = $request->postulante['nombres'];
                $pos->save();

                $nom = 'CM-'.$request->dni.'-'.date('Y'); 
                $url = public_path().'/documentos/constancias/'.$nom.'.pdf';

                $position = Constancia::create([
                    'codigo' => $request->constancia['codigo'],
                    'nombre' => $nom,
                    'url' => $url,
                    'id_postulante' => $pos->id,
                ]);

                // $this->response['url'] = $url;
                // $this->response['estado'] = true;
                // return response()->json($this->response, 200);

            });
        } catch (\Throwable $th) {
            $this->response['mensaje'] = 'Ocurrió un error, vuelva a intentarlo. ' .  $th->getMessage();
            $this->response['estado'] = false;
            return response()->json($this->response, 200);
        }

        $nom = 'CM-'.$request->dni.'-'.date('Y'); 
        $dni = $request->dni;
        $programa = $request->programa;
        $paterno = $request->postulante['paterno'];
        $materno = $request->postulante['materno'];
        $nombres = $request->postulante['nombres'];
        $codigo = $request->constancia['codigo'];
        $ldate = date('d');
        $lanio = date('Y');
        $url = 'http://sistema-admision-back.test'.'/documentos/constancias/'.$nom.'.pdf';
        $pdf = PDF::loadView('Medico/constancia', compact('programa','codigo','nom','ldate','lanio','dni','nombres','paterno','materno','nombres'));
        $pdf->output();
        $output = $pdf->output();
        file_put_contents(public_path().'/documentos/constancias/'.$nom.'.pdf', $output);

        $this->response['url'] = $url;
        $this->response['estado'] = true;
        return response()->json($this->response, 200);

    }



    public function genConstancias2(){

        $res = DB::select('SELECT pre_inscripcion.id, pre_inscripcion.codigo_seguridad, postulantes.nro_doc, postulantes.nombres, postulantes.primer_apellido, postulantes.segundo_apellido FROM pre_inscripcion 
        JOIN postulantes ON pre_inscripcion.id_postulante = postulantes.id
        LIMIT 300');

        foreach($res as $item){
            $this->constanciaVocacional($item->codigo_seguridad, $item->nro_doc."01", $item->nombres." ".$item->primer_apellido." ".$item->segundo_apellido);
        }
        
        return "FAult";

    }

}



        // 'UGjUdh','wjbiGg','EjVGLp','KxFEeN','vTWiHv','eXeVGR','PdJaHP','LMJjfk','ZWdWBm','FiTnHf','TGGNUJ','STjwAY','nHGnyc','cftMch','fZMzCV','fSKujT','JWWQiS','aedJQH','cCqTMR','dbvqev',
        // 'WrdtJt','XpSurx','PurPSy','VKqwfT','KwAeQG','xmYgVj','hybNfK','yjJAQP','SjrDUH','hhfpXB','GWJMfK','jfGxqv','hQJqZy','vxLpUJ','PuLDwn','HCQQUN','wZmSBn','LabQva','TUtXLD','zEhhBe',
        // 'ciGCTn','DXmyxc','URmeSz','TCrNEn','ESjytV','uPEXdj','RajtdD','CTWvbi','eZCfcX','zbvMyF','NcnzKi','uzSnCN','TDJtaN','UYNzKK','pyquLT','VfLBwr','UyVkMp','uxqfmH','qbmYUg','kFXbxN',
        // 'SxqhQD','tDkNNm','udXiic','yWXSbu','yPvTAi','JFMnph','cUZtQW','DiKnYf','LKRqFv','NwZFqr','xSggcP','wNfUbk','pfXRCq','tLGQZt','CpAgkH','rqKunV','dMXDzN','MidTuN','tRdQbZ','thuWeh',
        // 'tEbLLV','KTxekr','KLQYLU','mcHymk','UcHYUD','RMxUfj','TbMkhQ','fwgSVE','LtpijB','nqMyDG','znZzTB','DumQiS','wMPUKA','WtVCvP','EgtCYD','FWNYvX','qvzhaK','DTyECv','RFmEBH','AztNWS',
        // 'JmiJkD','UVfBUF','VFTDax','KTYzwZ','ZayRtF','XNQmdP','tuPnDU','HezwXT','iHYSey','jrzWjq','RPdPuf','eVMedR','Lupwxp','GVVavC','GHQnSK','vppJXA','NFrAef','TZQpNK','XSkcES','XwMQvf',
        // 'ugqaPK','USExbM','hhJhpQ','HvbbwG','RBzavN','PUpcfg','UzFKvU','gbrjqc','iGEjXa','xdDwJW','aauawy','rwBGzY','cCGeqF','UfvLmP','uQJHQx','tEUaQt','MjEBEQ','JSKwkR','yihVbG','EgKDkW',
        // 'xvdirc','ZWmuWu','MiWMmd','xfJMuk','ptCEDY','Nzicrb','eaVXud','aRJEna','LCZtnT','quCuUa','ihBJvn','XgMKJE','YXYDmj','HJhDpj','cZSvpZ','XYgBcH','xxjbQw','TWWSyQ','KhnVym','rMbnaL',
        // 'vnDTxn','vazErD','HASfdT','GCwiAY','LueCSD','SAvJJA','ZxwDYA','JkvCBF','AzCniS','qxGEhb','LPryjz','BmTHue','LzJFZJ','hfkwrY','UWKaBq','CfVnwm','exEjXt','RhGHuq','tKQpkB','JFKSNS',
        // 'jgbeuz','pUrLmH','pKqZWn','fAKeqa','jLUixa','qkbhZU','TLPTzU','RBpxUQ','hcRSMh','QkYaBW','KBfALD','bvfdVU','xpJZBW','JxBVay','UyLteS','zgBhHa','HxdCDD','nWHzue','PDYtxi','QeHQER',
        // 'mYbDmm','qDCRcg','NkgYGx','PGJRBa','PUFuMP','JaPzPy','edAHuU','LGTMQX','pZKLkX','GTcDhm','BXQtGu','bJdpPy','aERDYm','qGBYpC','SLzAVA','HrjvUS','xuryhb','pHepHu','gKEnhz','DAHBPw',
        // 'Kfrccx','BJfgHD','kSGXKE','uvVUca','jPqfwP','DXFXCR','eSniAM','ZYYxuH','gDbTXk','BZFdjy','bkZNtV','UtenjA','xyKNhC','ywiSYM','bqZnpn','ULiXBc','kkZxtn','jptEhD','jjmfDg','WEpXNg',
        // 'KgaiTr','tkMbcu','hGikzX','CUthWH','PkqjYr','BYtxRU','CkbeSb','muVWyG','DpPejg','cKdaXB','dbRJFG','uqXMJE','wmeeZV','HeLcAY','JWEFEz','DukARK','KphRKr','WrTcVY','ymwGBw','JYSzkv',
        // 'VnuePv','himDjA','GSTznn','vtFBMS','wXUjQK','yYrukr','BpRMXD','fJgrgu','PyxpwK','wyKeqB','jkfhVN','yQUHVH','qcTWeF','JcnQzP','SbbyRU','UDxnpW','AirJSu','DQnPJk','xPGTKt','aTVJYH',
        // 'YUHgUV','DuJUAE','jDQWKi','pYNdQZ','XXnJfZ','uYQFXK','ZiPFMr','zJACQy','CZzNct','htcqvS','GyPCLg','eunNDJ','prDKzb','fSfcwb','NjeTVN','VtUQij','ZvxrkD','NBxeEC','ZEPkBN','tayBSR',
        // 'tapFpW','LTQdjF','MiYgfV','gqyNtX','AuCRuk','DrZfCf','wSUYAi','hzYNje','tfefyb','iWZyES','pCLNnx','GpNLEx','XKxedw','yXzGEH','VrmJqY','ZCbueD','YpqgBt','CrKwwj','MAafTq','tJLnXJ',
        // 'ZvJtvg','KruNEZ','EVDWKf','UutVPM','xScbhU','UxacTg','VNNFdC','fYdjaG','NqHZWj','SryPXi','aajuPM','vLeFXz','CQptmL','JDiHHi','fXMygA','pRwWvS','FYhRmq','qTpyAP','cnjtKr','kfZDCz',
        // 'UcBQHZ','GNLVKV','hjpNdp','VfPQzM','gPBGVu','xYbQRj','PPjwkp','ViQNrt','xcFbRv','yAQBtV','gvFkYn','mrcedS','hiLzCh','bSLBuz','HkHdgp','mAgUSL','zZKnJL','Yykywa','NVmXhi','wqJuNU',
        // 'zchuNV','nrxiBS','UmxNMS','ZXhAPi','AerqcX','PwXrLp','HdhBcx','qNvKXg','rYQaaK','hhQBDS','rerpmS','xqwPrT','pqSWTY','zUqAry','AzDVzd','LcTDPC','vXxyiB','hKrPgR','XCwNEZ','HKBCUW',
        // 'ZwTScu','HfqTcX','ZiBbqq','ZGHjbx','dwSJHc','ZbcNmR','iBPtEk','FYSdeY','kDNSir','QgCYmw','TryHzF','DEtMKt','BbUUcr','UvpUYW','fDRVxj','PKPCVL','Dfzrtr','UTHiUx','HpvQLb','CXtKCf',
        // 'kScWiv','Wygtxu','QuTaTJ','vGxWPj','nkJRyr','hKyXPQ','xiGgmJ','tjKAkA','vcwxgG','dmPmhk','RwHjpL','cxWRXp','FdLunG','CFLKqD','TZGcPF','ETawQe','biCFTn','XprVNL','VXcqSB','dNjDFe',
        // 'cNJCLQ','jtVCBW','ZqfYzV','WjbUfm','NqZRrb','xyufJK','RWDDXi','EkbCQu','qENEja','XpcJqu','TPHtUp','krvNPN','VnqvJD','MihVef','iQDxiE','vvbqSR','TAvqag','PBDKkM','pMfcWb','mNrjet',
        // 'cgdzVz','UXJzhk','aDavZX','DjaQaT','LywEUG','rTBiAV','BVDqAb','QiMqCm','mMCyJp','LuSRqB','EGbcdm','CvRxnN','ZWJaTQ','TgpSvg','eyvJHm','KyfThT','EuzfXE','iJaKtN','PgAAYV','rUYeRi',
        // 'hNtDdP','NwbVde','nzeVui','PuEyHk','pGWNxb','ECgPnn','ZJxiUy','tnQdjz','aWtzCc','qyyyai','QjYMqb','hkcHPj','wkJcfP','ETFVeg','WZAXkq','xVjuqz','bexkUV','nBwTMx','QmApRh','LuQTcr',
        // 'LXPhLv','teHNeU','PmHcxC','fyvxEP','EyvQGv','wkqKFV','gTrqST','YmBcbS','dcaXjx','hxrbAL','ECTFaN','jWWkHJ','NuZEHL','kcYfYt','kBdzFS','VDAvyr','QxwkPy','MGtjux','PCLqfM','KYpPRx'
    
        //


        // 'cTmWcj','ucYrMk','GeMLqp','YKmLLR','tSnnvf','knArgJ','rQvGzH','mZAthW','xcjTjm','egvaif','aYSFVw','BThXrB','BaQLai','EYvxVD','ewKbpZ','tJkKYe','hyMwuF','LUPJmp','ZzLcLR','XAaUDG',
        // 'PPAnKQ','rBPxMJ','FqHbqV','tRQGuX','FbCmhn','RtbHPU','daSxfu','eKrtdD','hyJWtV','VMpDgc','WyBCye','teKBYb','eyMuHK','QZPSDB','cqFJqS','maRpKS','ZrnRST','epChJH','hrpKye','SgGKBV',
        // 'WDNYez','JSzwpe','iSFXSi','kFiBfz','KHXMFz','hwrXGR','tNuQVZ','xKTTPH','AfgCQD','RcYxHP','ZgKTqV','NAGNMU','ekvitn','tKFTAf','MDfuMc','gBQjHK','WYTSFV','cAiVUt','MYHfZA','YgfNSM',
        // 'feKgwB','DXPKnd','TnnVbJ','BnwKtt','PWpRUz','JUPWKT','fDXuyx','aYhbBR','juHAwe','PbNRne','ypJDSg','jPuAjd','bHXXvz','vdZMiL','hzYZjt','KUXUKy','PvTNqq','BvRuLf','qnrBKp','WRmFSm',
        // 'cdjBqM','QbKBzM','DxrheF','PuSyXH','ZnfLMk','HugyYF','qpZBjD','LvUiXZ','wqewaE','RbaBTk','tWkeMZ','gBMDVd','dbkXMW','tBrkDm','kvMDXn','dWHdWa','dZFLhM','JNDaNz','SUUXeY','GKBPYB',
        // 'ZWDALH','tBHucA','bfVDpN','vnUWFA','AQkqVa','XWfqKW','vBckrh','KzhLpV','eRKwCJ','VfBhcy','HbGfuP','PMSDMW','vUpxjv','xvuWpR','cJcXZk','eyKdQH','PKKNLg','xaNcgN','bwPhmH','uxkLzd',
        // 'hzWmMM','BydwYp','xPdUNe','kzPdGh','fqkvdc','tFNuDX','RyqWmM','XKMKVJ','xEmhcz','mJTajz','vhccRG','zEHzBt','rVhDRj','tEiALN','aTvbwg','yADhgz','bpQVZn','KYbNHW','GDfkhG','ATjLaC',
        // 'HxgGJL','QjWBcR','qQPvNj','FmUnkn','GMBudw','JtpFUx','aamYBL','XfjDSL','PdzZDu','bkZdYc','bQWCHn','cYMZtb','bgcdUV','iYECeA','vfCgKe','GhrpcK','DyZutm','eGXpbQ','eaaUYZ','LPamXN',
        // 'uyvrQU','APnBSC','SpQLTc','HqXRbG','DADLGr','eAUPJh','CGnLcw','btnqEu','rDeSgu','LpnLhW','hJPHSK','rvERHf','mAXSfc','zNJWEz','PpjGfi','NtdXFX','xhkLUC','iAMBhi','bNyQkh','jbBFbT',
        // 'aQUALy','bHWAue','QjZAzU','DEgEEB','JtHJPz','Nkjjwx','rbpquk','MWSnLM','drSMLU','YmrWTr','erevqX','yeGgeT','ZdyMLu','zDBXZv','RJEkiS','Pzhvhw','PWDdcY','yGCaRP','VbfwwR','QMXGTe',
        // 'uBjbLY','uAxdUE','pvXHqd','rtSBME','XuEBWw','kAKxaL','JbVPSb','VrSizH','RkuVWg','pVDPFu','fjfpun','uQhnRP','upeYxw','rhihSS','xEAVNT','TceBuM','jgcHPc','VVcYeV','gZfagA','EjPBVQ',
        // 'GRcXSK','rCMQkh','NBqTXz','fevYCC','EGZzAf','cKWHpy','gbFmeN','kUhnHK','mXQnBj','XzppUC','PpUPjx','qydeeq','ixYUhR','xJbCKe','rSWKVa','juBrKB','KDKPax','wdMxwr','dacTuM','mNUrMG',
        // 'QGDmGj','mSVKDn','pwPvAU','TRrEge','mqGrMd','Jebngi','dcXJKf','mzXhrd','MjRECB','JZqpCC','EHPeQH','VZMuXJ','ByQwuV','wGUMiU','QJyAvr','wDBzrJ','zVMpEt','MdZMFv','QekKUP','mUeFPR',
        // 'HBuKta','DRhGPF','xkKGgw','Rgpbbm','xBzDBf','hGBmEZ','hXwuBC','feLhGh','vqCftJ','GxCJAG','PmFGZQ','ZSPkPD','fAALte','ujNVmZ','demUWL','TjSRkU','bceiMN','icVMyR','fRPHSp','CLXwxY',
        // 'BfDprA','uAUYGP','KYWtim','SSZzvf','nMFuQk','TAkjkf','QKEXif','AMPMGh','PWZxhN','dgVfvP','DHGFcm','xQTSbU','cRyjtQ','ehHdHK','ybpETu','ZFtAgY','ySWHXf','imAjAK','NyvXSQ','LDfAcD',
        // 'YJWKbq','bVrYQj','JRGTTk','mBzJAj','MwmHTr','ZAzhrb','mcMkQN','htmPCW','WMhEUS','Ctyirj','CvfKmB','gRLjDe','rkhRfZ','uPJMtR','eqqKpY','FNxSnn','nBDhTM','JtxEDW','HVyFVW','GdHbph',
        // 'EmWGeM','XWGqNK','jYUwhh','rBVZqt','AWjYjU','cmawrb','zvGNmy','YBqjqQ','CUpcBW','WFxbSZ','TVpdgR','ukwSdU','SiHqCY','jyJrLM','vkBrjE','TPLgBT','pVETwa','CVtMXz','NzWrVa','mTgCPh',
        // 'bBTKkY','FnktZh','GPZejT','txcgQP','YwAgBG','JwqwfJ','dTCJTC','QDRChf','PSYRwA','yTnHfY','NcMUXm','JYPUwM','mTTRpX','rYtNwe','XxQQcC','txBHFm','iyXvhx','vpFRmH','HdiRAr','EWQKQX',
        // 'QmyLmQ','jSAqFu','faxjuX','XcALQt','cYavzk','tnYkAK','qPTphR','evCtKw','yayBdr','CPYDnJ','qEvgEP','fVkkng','ddYPxW','dVhRLR','amKTnm','iYeaTM','nPrbXB','TcDTGi','LxAheB','tZbLKN',
        // 'TXLWAY','twHGnw','YkwcSR','VvCeNF','eqGjiN','qJHLzt','CicpwL','jVcZvW','mwwNUy','GEYfTP','yAFuup','uNJxuz','NRCUym','Nvcdne','MzndJF','pVkrNt','enjXRe','LMhWkY','dZGZtA','ekHJYd',
        // 'xELbCR','DEkTxd','VqSThg','XfUXTr','FZQKGA','DBFKwD','KeJdkz','KjRhkQ','PzErNU','GMAJVK','tBJrwe','AizAey','SZGybn','wBCYNt','XwEJXY','gDjPja','GNSyHd','xTZmjv','rPUjzH','BmaXqc',
        // 'WzqpbD','gGqCmK','JThYgZ','HzEqje','iZUYFW','DJkjvq','MTvxur','YQeTjj','LbXEkm','nHdRNq','iwUdEt','hzgvTZ','NnhbdX','RSJzfn','gXriMw','WKXGYr','aGinim','xZfNuF','zQNiZe','dYccTj',
        // 'eiUHnD','QMEdgL','Sgnaaa','XAQYSd','rAqbQH','bnSNAr','RTaJHV','KmKRxi','NfQJCH','QpQTpH','mauNMk','MFgyqi','AyTYKh','CHfpji','EUkinM','vURqHN','LGHASR','xKKTAQ','HifRSj','LNDnSL',
        // 'DfeZXD','NgRnGN','PBfVWq','ufyTay','pjUTpX','RWnrxm','jMQKbQ','RFBdVP','BCxfCk','eENRTi','kvRMTj','HufNnV','ZymGZX','jBRNdC','PwSEEB','RURjLf','YqrGgf','NVcUKY','wNbDxe','wjwHAN',
        // 'kQpJHz','pxVBtf','HHUCmM','vmwwfn','kwGCBV','xCiDft','UcBidT','RBBGXB','aGHGZS','GBAmqY','DpDQkf','vbXaAN','NrqVGr','JXwEun','PuDwfD','mxCGkK','HhVSQa','PtYQKQ','qwkRVE','ndbVEW',
        // 'YeerGh','GRDUUS','fUYjZA','vgKdqt','hXQfLh','pEiKfr','xiGhMY','xjWhpc','DYFFXt','TadRjE','XJzEEE','njpYHj','BVkdiK','rnmjGy','EWEJFU','VuMXSy','acZQvD','QFARte','qeyMNC','eENEZL',
        // 'QcALmy','KeQdXi','CSLWvP','HzjVak','MRWcvF','uDBKew','rkfhxY','kzqXGe','CCdFYK','nrztnh','MFuYPw','cAVNJp','CNnaUt','nPQLKz','jVcbEk','JhZWGg','hDUGaF','wzyYXh','TkfEHV','aVtQef',
        // 'vgSZEr','NjRBjF','XexVbC','PVtLXW','vNFcvw','RQEdDz','KQwGdK','SpxKgg','gDyfCZ','vKuWpw','YruPLK','EkyTWu','ntZzqb','vRJYrk','MfUJQt','NFRTAz','DGctDu','xmgVni','dUTZWJ','GirMKr',
        // 'BPMmkp','YVkEJF','fGMBkJ','iVVJeg','cKmDtW','mDkvHm','hyREct','gadKKj','ipKVyH','CPCHqQ','TqCuZM','Sbjgxx','XQPnvq','gZwruE','wurcna','gQGYUH','nnemMK','ySFmht','yXWdVW','zjdruY',
        // 'VuFaXD','XASKQG','FuxMck','gtuZVf','JDFHyP','yqHPzF','RaEFfF','ZBVYSk','FSHuqz','fNvJLv','wuNfpA','fkTqqK','JpJdDu','NwKAhq','KKPQeD','pVuSME','BSMQAJ','UGryeX','fJKFPh','aRkztK',
        // 'NXveHQ','ijMCKg','PvmgrY','jVZnyR','YSSrTF','anSGzS','UGrivu','MyDQXL','gxgYmh','xCkDKn','hcTUJW','JSHUDg','LwfJHS','SBqGKq','errnZm','reGkML','VxFFzR','qvTiYa','AYDkaW','fiYRaz',
        // 'GGJant','BVdwAF','KjBjHu','tJnUkP','ihrFSF','nrxZUj','gWJdzb','dLrGeA','DVjZrY','bDFuLW','xzuBTh','mLAgGK','yDwGkJ','gNuJqz','MzhMaH','jkddrM','makkUZ','pmbfua','qQfHPv','bHytTc',
        // 'eVdecJ','GADjTf','hCvanR','QhvqYc','UbYPrQ','vRrejY','dTebYp','DnXddP','KkULxZ','YRqXDR','zTPfUt','kyVTVc','cwpKUP','bQFTCj','BRBhix','hPuBVa','jZHxtt','gBYMFi','JevMJp','aSaqmd',
        // 'XaGnpn','znHpxq','tKKDnK','naDcad','xMZkta','wfgYbk','ptfAeY','LJWchS','wjrZkb','zLACxB','DVChnJ','ANgBBV','SBczcG','LiQAhN','DdcguQ','FzESAE','dCtURF','BGhZjA','pRkjkJ','qEGYYJ',
        // 'QXzGVi','wRYMmF','SYxuuX','Bvwxxm','nyJJvG','DRyWrZ','ctybbd','jGJtfx','XAqzQB','JcvLvH','xbfbMp','rwfWKQ','vewSFX','enEJym','QiwkYA','ZvVZdY','rNCaJd','StuBFC','UKTedc','qBrvyt',
        // 'AfKecz','FYchvU','PiqhWU','ciDjRH','jBBaqp','DCpTND','KRLdVu','aXBfJi','ZCHGai','iWyyMj','KddevP','VKbXaQ','YizXke','NUvftL','bncMpp','FcmchY','UPqVzV','BjNPYM','PDXeGG','GrVJjb',
        // 'KFgTLE','SEnyQN','eXVxnc','ESyvBW','AVdkyF','EHCDVx','ZSEvqp','ndgwJK','jBGGgH','uwAGxq','mqMKtk','gtjUkz','GDCiqK','WaLEDe','vjSgup','gAetYb','SynUtA','pdGQyQ','SZveGe','qtTqjE',
        // 'uBZpga','FFBzjj','dxSDtZ','zabBtK','ykqMLv','DUSqcJ','SwvHYS','efvqia','zqYUHp','hbMLWd','LmpbhE','ibbwnm','GDhPYd','vazhvA','JHmEBZ','CjzQWh','niZrPv','EuvSyW','AhwBeG','PehYaX',
        // 'Zkzqrc','iRgPzX','NkPpHu','rJjQXP','KneEGk','xvAVKz','qDMCSc','wwJMrD','wrJMDS','DfNpCc','gpJbqH','gJHtbC','rgbnww','LHvVDH','zNjBRt','JtJqDW','MCuCxr','azjexL','jpKgEM','ENDRkN',
        // 'hjdeKq','wXGVrJ','BcFSLV','pBgZNL','ZbEZkU','tVgnNh','nbdjNE','dXdEiT','FGJMAD','eJqHND','jRqHEL','bqRtpV','eafbiK','nugaqB','jeGLad','iFJhWm','BSFjEZ','RQfXKK','hUZJzv','gavvcm',
        // 'KJiLEi','AYkjpN','JSCPTq','jRbZje','RypjLH','XcxCLr','DWJBvc','KAPmUb','vMUtmg','rawQJk','ZAYUhN','vJtixN','VaXhJz','UnJcbr','CqUaRi','LvvQZU','iGgDrt','iHPBTP','efwYiU','pKEbJx',
        // 'xFPwdu','jvgrMG','VQcaSj','HfbhXN','GahfqD','LKQFXc','XeUgki','kNzEAT','iDXiuU','pxFUyd','KjBCKr','bVjEUj','HGuADd','eeWnRB','ynnPMM','SGQyCh','gXBTAg','pwjzGG','YWGWfW','jyFKjj',
        // 'QxjHay','TRzwrX','zdKWQi','bmyKtx','ejKrEn','Bbjtvi','NNrNuA','EbhPgn','uyGdXY','TAckMJ','KXNQke','EbQWci','WCctkV','ekBbBa','VxjptA','tVEWKz','TrwwEz','bJtxBz','ERZkrL','cDqTdc',
        // 'QANHNV','nwKyUf','jrYrmA','gfYjxh','yHLEjA','NdgBVS','XrxDtY', 'wcjfZn','EgQDNA','uXWqRW','heydXy','SMXryZ','HdnSNj','bNvYQT','pSSCWf','GDZVyV','RanPCa','eHdkat','zAPDCU','yQyQaa',
        // 'cHtuCi','cSvSCU','qqXhdW','BtAJVu','ErvGJb','LUmQEi','gWDDZK','Zpjhfv','iCRUVh','vRcAAS','eGGAkf','jLFcAN','HtvRNw','Nfmcyb','NwSaja','vDBtTz','mrWAZQ','imqiAn','xTfgpG','xJydiB',
        // 'qkXNLv','BwcAQE','DAaNcj','zwwMAa','bmtKWe','XjUjkK','qKeXUh','tgiDiv','eMzQeQ','umhApm','GkPKtm','cZYPgP','bRzDCz','uxLmPV','YrgTzW','fZtALa','bcXBvV','MzKnGF','CbXrQp','FDBbrL',
        // 'nvLYnH','JzdrMQ','weAgZu','xgtwJM','KpAgph','avQhXU','DTSxKe','tbuwZL','wnjnrG','AJCVyy','JubQrT','JXeLaD','qZCqrS','LpgSBq','ptaUHb','KmMgrf','KGtBLL','mBZZcw','qRZhtp','xZPWMu',
        // 'Gbaqef','YSrNJp','jhLuuH','qygbPu','TENLjR','ecPkEJ','wDjHVL','EnvYTb','YhytHt','adfuTm','AqSccS','XjbeAe','zyZgSt','CptJtQ','bmDmeY','ReFxYC','iHBxNu','bLfyYx','JfgHAL','nNSmpK',
        // 'fAUkxH','AtBrJP','ncyiyC','JLkgfG','iehbrx','YVmxrm','mHFxBe','SBeqJz','NSxBSb','CxLMwr','XPBxzd','KTcGwR','GjacQS','qDCLUj','JvaLKw','ZRWFgY','emGSQV','hXwbPa','jVhjyB','NgDYNA',
        // 'eUnKgA','BzXhgi','DCdJLD','NmnKRN','ZpLHYp','LduaWC','bYhUCA','kPUFRR','XTaVig','yzkREr','BVpvDS','ESqMzQ','MKwvbu','JbMMhD','YKaWik','BcXFnh','KReRMJ','tZcgyz','KcAYLd','GtfRPU',
        // 'qqCPAu','wBYhaZ','KecBHU','QZpazY','yEtSBd','ebpuLt','GRvEqV','XREDYM','TJdued','mrBMnr','CPtGUh','hpYhmM','jWGdRe','ayaRpz','yVnEdB','BEFrhr','vNveXm','vTaSHQ','evWJwp','nKmpAz',
        // 'ZiJmZx','KgXMVq','aVavdA','BmNuch','DERycQ','zWpBvW','RcuRbd','rJmiXi','yTXxaa','vpjPyE','TzuDgf','YUmfNV','UznpWA','jBCQPw','mwLKEH','pJDbWb','wSueYb','riBAAC','fFXaLJ','jiLHKr',
        // 'hWGfUQ','AAuGfz','UxDdHd','XyYjqZ','rGjGGd','rpTJJk','zWtRkJ','TypXJx','VrzDCV','VMatXD','qCJZqq','EqQPDT','ycBNZd','ugFevF','AWTjSG','uLMtSr','eREqKU','bzWymH','MabuPW','nPkuNd',
        // 'MxtwNp','naXPmh','yRJyap','UWpapz','WrnMma','pFTtVK','AiMQTe','urmHtM','bCkxgE','GHyUCD','yQNQak','apEqWK','ZXMLRz','wTwwEB','wCVuru','HcpuFf','vRChZA','VfDryA','WEHYSX','ggicJW',
        // 'mAZDnj','TxwFQA','JBWnSw','ggKUtv','mhdTUY','SXFzZP','SdjvTN','rTYRdc','ruMGGq','TbBTbG','JrwHZK','gHiEMm','WWqRKV','FYzCRa','FxXhHR','CaHBMY','KLWkWN','DDpxZT','ExrQwb','qqqNYV',
        // 'WtNKuy','YUjRUC','tbNwMC','Hkijuy','kYKydX','ayLmEN','cKRMUp','NBcLEd','XhVAVY','AAeYeV','jfpevt','qzZHXP','PZPPXP','vuqNHt','QuvANv','eZnSKq','AATkhK','uvkwFz','yRMThB','SJuTHT',
        // 'WzSjuZ','PhnNQP','KUvDQW','YQiHRi','BYHKWX','FBTCib','hfTmcA','acjhxW','yBAZBv','kykPxR','wveYCY','MwTzCU','xwpHwv','dNdyYX','RMYEaz','JfYbtf','pveBUT','Zizpvq','TNyVpX','FcpQKz',
        // 'bggkBy','AEmuhL','WPykTN','NiZrSq','mrEFar','zQzfDq','JxAjTB','grPemY','dudEcH','bYPdHu','BMAEQW','ukgdXQ','Fucxmz','fHcryM','bYAJMd','mYdeqt','YBGHxm','ywSXUK','uhHzpH','SLWuEV',
        // 'NQXEQy','SzXYWL','beRHhV','MVcWUf','zSayZu','EFQJGV','CFTmPf','GhwczN','RcmfxR','FtykBi','SGgxfE','fhHMaQ','JCmUuW','dUZZMb','WMzfKH','TUpGTp','AvXMeF','MzpkDB','GNKDqq','HMkijx',
        // 'hDBQnv','Gnipud','RaDVUK','XyQwnC','YgRjDP','yVgqwz','wCYDaU','ZKQzrW','UEdYvt','geJPwZ','GdrXfk','BmfccC','WmyAgr','UPhXDT','hpMBzT','CpGQPq','vdCPnX','qkbBud','bgSpvn','vLTcBD',
        // 'veXXGU','DftvpM','VZSNTY','gypmEM','SaKBfP','eimwHZ','hqqKCm','LRRWTb','euqfaL','LHSFYd','YJBvcd','uPUqzU','tWhWTC','KuQxSU','qcdQBD','RrxxWm','VbPSgA','WuWLJk','YHqKZg','RfLmKU',
        // 'pizUNX','deQTea','XUWLLA','AkEqfq','DSedTA','vidAZH','mJfEZH','cGDGhj','wKwbwp','UevzJN','CxYxXT','bHnbEj','AHFYGY','QTngmW','jykEzm','qZzJnZ','gqGtNg','kyZBxQ','SFYPUz','EXfEwj',
        // 'KBcmeK','VAdvGL','mqCgcK','RUfCKH','GSZvNN','NHUnKV','deXzYm','YyqKNX','EKuGwP','BeyWPV','CLFLpN','VriXau','vYZQRC','tBNqXj','hKeeBi','nehHdK','TJEXAD','tFFiKc','FwXGFN','ffAWEd',
        // 'GaQveW','EqqEdg','pGveyM','uWtAbW','XRvitM','nXYBcA','FgvPbU','ZNiJTr','eTtLFP','ZFtxHc','qKwFQX','iXPTLv','zrHWGY','JAiiYw','SPmeGa','qbBvDV','JGVGzf','LBkUNk','YvHNYf','DyWCre',
        // 'CrGZeG','Ngzcrg','uzBgNn','FjAkmA','NZyENP','bZzAuY','iCUfTm','dJXHfA','FgBpCq','HwQwud','qveArf','DFkXCf','MfenPT','JXSYTF','eAEiQL','YNGcFq','RwWKch','QQKzBk','tVfJNE','MXMzAw',
        // 'PfKzai','PcvHzp','hGhdbg','pDqRRp','wRaNJm','ngQTXH','fyZije','aSBDFj','CQpkFv','iPnTiN','PEmaVu','HqbteU','gKaNwi','rDRpYF','CFCdvM','kNvScr','EzGmem','eQaHZK','KhvcDh','PGvgzf',
        // 'wLWWeJ','CcEqMk','BVYxyS','Htynqu','KzgZWJ','CkXEmV','AKEgAV','ffCuKy','GgyDTK','GeMkhS','PDckmK','aJDkdU','rtdKMZ','ydShgv','RpbPqc','FJMCjX','YxchqJ','gaSRmZ','LXUASf','zTivEB',
        // 'guNHXL','tKJmSE','PYJpCg','qFtXHN','dhhnhT','NEhdUA','aYaRNf','xXVhcT','LrZQjG','NeDxdP','XjHdgb','wavnyC','CHbXqe','HnRkuS','NiHGhf','cuxNBY','aTvJyZ','DRTjXC','EQfemE','wyBeuY',
        // 'EdwyeK','geNDRU','hJCVph','zcRcbr','EbXbqY','UQahXp','QqJrWh','WxwpBe','pKZiEu','iQWzPP','HaMwNC','Vzwhvz','LejhgD','ARLHnT','PnyxJF','mUAYYp','PAurfj','JznSmW','SJyFAJ','hvPVep',
        // 'EBdAKF','UazGLi','JuLpCG','yTKEMr','DYLReq','evQqXr','iukzPw','VipcSe','VXSFbL','PWCYNj','bvnmKQ','UhRQvh','jkVkPK','vtZgRm','DBkcNk','xyhrzA','CQbGSt','pSycmK','bkZgYn','SiaKTS',
        // 'vAunZT','YDjiJa','LgMJLt','YEpdLB','ySbZSc','RGSiKH','ffwEWC','WEeapd','yJAYeH','HKdrGh','ZbHXCU','KumtTU','wFqMkJ','TNahkv','rTuyWN','wcKGTZ','AdUFUA','wRFxtX','hNWAfA','YmdnzX',
        // 'wJZzJX','tdXgDS','EcPhLe','tXJXCG','JpYxNU','FhKUaP','inKKgH','EXQmJQ','JjEtHU','SFiLGK','kybUFd','AwukkR','yJRVrQ','vYgEtg','APGPAF','KQEYJd','TqiFZu','HkQzcR','dCMqrL','SHbFcX',
        // 'GxjVWq','STAAVC','jjpyzq','NcGJQt','EMynui','MaRWka','hgpFST','cpJYhh','JapNYb','emZbvF','HVEHyN','AepMjt','PjaRRf','gmaAab','Gvtkfg','Jfkccz','ZYUwYx','YpwBgV','LHBFaX','CLmTbJ',
        // 'ZArmmZ','nEYWdG','XWmLUD','pLUSDN','rWiWZx','kdfqDK','WMcKAj','YeaXTj','DGwcji','FxTdif','YcVwFj','EJUNTH','NHqJWT','KqdUHF','rqkSqc','MtxEEi','Jydcnb','AZbLKx','JrXpgn','SwLbfj',
        // 'pyxzCW','pyhnGh','tveyAQ','dBEKwL','DDSEcP','fSdPvT','jcvNmY','gHKNTT','YCQfEr','cRyhnw','HxjVLm','kcaALc','vNQECA','UmqQUN','WhdaDc','nAEzWB','EBFrEd','KDaGiC','wELDTC','BqfJxk',
        // 'vKGMtD','qzuqzx','pVJgSk','PtJPfy','KwDDqQ','qLCyMN','efXYwd','ipECtx','xUHbqR','gfXXSM','dgdkey','YMBknF','WdqNnL','MXcgUN','YBeUYq','EkAtQS','XGcJxT','UkLqVp','Fjiivd','xCDjwQ',
        // 'hngXuk','BWcpvH','RDcntj','updFGT','SFNnJv','UGrNwz','MPcQDM','iHxnxf','KgJaUj','nJDvDc','vjmEAD','Mknqze','DHFcva','PTuAGd','Fkjwpw','tYEFdG','QBfYqa','ytmXNY','nGnMWQ','JXZavZ',
        // 'iGimrk','dnYZEe','NhmwBB','wkaeJF','VAtycE','ifPbug','TiAMaf','VhAYNS','HXcEvE','BXTQzq','RSESNj','dkePvg','mXveix','FUegBF','CYAkqL','gLBWmt','czwFmK','ZLVEaS','rwfyQP','GiYFeS',
        // 'qeQdKC','SptUfk','bSUCrR','bgziWk','hbnCWF','DHhBpE','AFECRS','kHgeaJ','VTZtGG','axLXjN','FbBMed','SryVZv','CStLGT','ThBeJS','WaSdiV','MGYUEn','kFufzj','HXNpFR','kEJLkz','xJDUKp',
        // 'rVpRgE','xUbbBY','zAJAue','RqnCvw','ENkAMg','gHRGcJ','TLVbZP','FVuHAT','BSmZhL','DUTQaf','UuEzzS','QmBpvd','YcBqGP','CJtzuB','MzpgNS','kCiyjV','SaTaeP','UuGLHc','JBPrHh','jTkuVG',
        // 'NAppuQ','nFfgnF','qWRjvF','unjATp','nUgmGJ','emzHba','ZWSBqU','uVppkz','vJhGvV','aCptrX','NDvSAk','LhfzXX','rNTceJ','mFBfxD','edVkWh','rXmCBD','VeyRzK','ehDCWc','YPFtzn','qbqTgr',
        // 'EvYumU','ZnXFPG','nJSZxm','UZdQmr','xHEfDv','rfPGhn','wPZUPU','Efqzpe','LyafLy','vZyFEb','AuEtrj','ShSuJJ','xvCfEH','tEPDfj','zxmdVf','yNDqWi','pJFNRt','cNgtGU','vxyxTx','VkhLea',
        // 'qhbpiS','TecXiU','wvyiTa','YDNUHd','icySCX','afkNum','kcAqwN','fnuEtw','ikyMDX','MjhWwf','cmGprt','GykCrS','bFLXqp','GfiWNb','bhETmY','SvRwBx','EwpmAY','JKaKLG','ZqJuEH','XuBYSD',
        // 'quPgEy','XtzgKe','ieitbK','VrPWdA','zjbMGb','BPTgbE','ZCuRGH','WjBKAm','jyNquj','SzkkfQ','JyEVbt','frVhTF','pzzBUz','NcaCyu','mkZHMv','DaxFLb','ziVmgM','DdMzeY','MyGJgY','vgqhBG',
        // 'iLziPc','CaNEba','SqrZLg','pjgRuJ','aEpPAk','TAUzpg','Pgxtqq','NvHqcX','QGrBqF','deFNjU','mzEzMf','zfpYMN','CkKFKN','LyUSjx','DKPNMM','ZQgbBf','KTVvTR','zxkhiU','CNErqN','anvFrw',
        // 'NyWxxz','rUMrcL','kSVRvq','rpmKct','PDXNqn','mZQpgb','JqTkWY','CynRGy','vPuCnD','jaLBgi','hRWNgJ','xipSRC','Zahczb','LnWSiS','UhyCVy','KruXHR','mqEFrm','jdyype','KBBVym','tvSRTh','rAMBEe','uceLWf','SBENdV','RRcViN','LTjmCd','mCWwDX','QQqZUF','PBSiHh','XjFNSN','xkPyzb','cyngEi','BDVnzv','EGfDSD','vVSEiH','iGEzbe','ABaYXu','gzXPnm','pVKFLn','mKwUWn','bkPpGu','yDPJHm','kUceaa','XtFiFB','tqAwqH','FyeYaZ','kHSBYp','gnmzLc','JERfAL','VPdMdV','wTSbZF','zVaCdy','pDKPhD','GAKMSF','PNJJct','dSWZUP','bCANgb','vDeKtL','fcdbVK','pcqdHp','QieAWR','hRrFqZ','zNRSMT','ygrfPH','SHLYHj','maWgjA','iMTZTK','QAduYb','yaUrCA','Jdrudq','xxWGdx','irFArf','WUVSkr','tTRYTE','BzYwqD','SeMhFf','cnyvRC','MLCFji','CKWqce','RvZvuv','yeWWYW','JrURdk','ZqTPRM','NibFBm','pNEVLW','RcPBZH','RZKqpE','gxWYUY','vuDnnM','BHADfA','mjdcnc','fvNFJR','LyqLxw','JhrEkE','iZWujE','hUyndX','JnZvht','CCVjif','TphpMj','xucPiQ','igyagW','ZeKzEF','jbhigh','xknQiz','XAVyfP','ahcLgw','NiQvLQ','iLBkXg','MmJDrQ','WVquCd','UVymVu','dnGLEj','GCkkXV','ntrLCJ','TNYpuv','VjYzPy','dXYCDn','zSkGBF','LQHdyP','MNcGgY','VijaAN','ZyrykQ','gjAShT','xyHiHH','xWQLyw','aJbXAQ','NWgnCb','PSyZJA','qgnMUe','eyZpvK','zDZnDV','CPzmyS','tepFWk','EkvxNG','vvcHzB','QYAACb','vxPpSS','HMwUbt','hDUKxD','uevhgU','BXDFbF','nDFKJZ','CLrpVB','cXRZdc','JJNqhq','yqSwxc','DqRYXK','NDJViV','EPSurc','gbkUKi','ehjaJr','mGyhqQ','PqmjDR','QMJYCA','SYwPer','eVFWUb','qLJwWi','yULFMB','gBWeah','dJRztq','SPqUwh','GDSxct','YFpFTP','vYFbkH','BLuzyV','NLimxt','XtvWSt','SSrqnv','EVUran','AnLZEe','igqDjk','tqPXTP','fVJZxz','uPdPet','irzRPw','qCBaeN','NjwggP','WLexFJ','mpiVbm','dYChKD','kKLGMm','EDFffv','dMwqZZ','XriuUR','rTTVLM','jBmCgb','ydRjQR','PRiidQ','wAtYRT','ggTvTV','qHtBpu','uipBet','CjtRuE','PbVBBd','ZEKEvb','jASYuT','RbLECG','txtWaH','yNdTBb','NUBBUy','tdCiDC','gepmLf','tPznjr','LuApne','GghhFU','KxivAg','zQvEHm','eMxKYi','YQBJBA','caRKcF','TjEwfP','UgKdaQ','acmyjh','ckKZWt','biWeCL','HDNkDQ','UYVdLB','hDnvCc','pCadLa','rDkgdR','hNPSEQ','RQJCjE','nKXSWv','XUXWNC','fEdikR','YrbXTH','jwrpNH','UUxNhC','cZBHqm','CPdxEt','kHQVTc','fWeKSq','ezKaTE','XgdPWc','kuaKJM','vgBXgq','DNAQrK','FdVBgd','ErLxAt','kuyYBF','XcvHTu','FrYiRZ','dutDJj','wZzGmu','wjGAVe','aUZiap','fdZSmm','nzLSYm','CaAVTS','JuepuK','Nwdxqa','BYgFmm','mrfkYF','pMhUPh','KnuFzy','uvutyR','KzXutJ','YcrHLM','JQcVZy','KXfXjm','fMqgVj','apeYyb','KSUEYn','fiSPyd','PPUCRi','ULBuTP','yJnaub','RvVzTU','VDEayu','EyftQc','ANhmbw','mUjJic','pnBFaz','wSTtwD','hSKdaC','KhAedY','iGydTv','QYTQSQ','gqZFuv','VGMKwj','PvuLSE'

