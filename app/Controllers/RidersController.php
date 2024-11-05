<?php

namespace App\Controllers;

use App\Models\RiderModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class RidersController extends BaseController
{
    var $riderModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->riderModel = new RiderModel();
    }

    public function index(): string|RedirectResponse
    {

        $riders = $this->riderModel->orderBy('id', 'RANDOM')->paginate(10);

        return view('riders/index', ['title' => 'Riders', 'pager' => $this->riderModel->pager, 'riders' => $riders]);
    }
}
