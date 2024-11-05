<?php

namespace App\Controllers;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\RiderModel;
use Dompdf\Dompdf;

class PdfController extends BaseController
{
    var $riderModel;
    
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->riderModel = new RiderModel();
    }
    public function pdf($id) {
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf->setOptions($options);
        $rider = $this->riderModel->orderBy('id', 'RANDOM')->where('id', $id)->findAll()[0];
        if ($rider["photo"] == NULL){
            $code = '<img src="'.base_url("/assets/no-image.jpg").'" class="img-fluid rounded border border-1" alt="...">';
        }else{$code = '<img src="'.base_url("/assets/riders/".$rider["photo"]).'" class="img-fluid rounded border border-1" alt="...">';}
        $riderAge = date_diff(date_create($rider["date_of_birth"]), date_create(date("Y-m-d")));
        $html = '<body style="font-family: Helvetica Neue, sans-serif;"><div>'.$code.'</div><div><h1>'.$rider["first_name"]." ".$rider["last_name"].'</h1><table><tr><td style="font-family: Helvetica Neue, sans-serif;">Age</td><td style="font-family: Helvetica Neue, sans-serif;">'.$riderAge->format("%Y").'</td></tr>';
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
        
    }
    public function secret(){
        return view('secret', ['title' => 'Secret']);
    }
}