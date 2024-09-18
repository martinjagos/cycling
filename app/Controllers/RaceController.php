<?php

namespace App\Controllers;

use App\Models\RacesModel;
use App\Models\RaceTypeModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class RaceController extends BaseController
{
    var $racesModel;
    var $raceTypeModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->racesModel = new RacesModel();
        $this->raceTypeModel = new RaceTypeModel();
    }

    public function index()
    {
        return view('teams/index', ['title' => 'Races','data' => $this->racesModel->findAll()]);
    }
}
