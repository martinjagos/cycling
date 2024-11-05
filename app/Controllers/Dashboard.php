<?php

namespace App\Controllers;

use App\Models\RaceYearModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Dashboard extends BaseController
{

    var $raceYearModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->raceYearModel = new RaceYearModel();
    }

    public function deleteRace($id): RedirectResponse {
        $this->raceYearModel->where("id", $id)->delete();
        return redirect()->route('/');
    }
}
