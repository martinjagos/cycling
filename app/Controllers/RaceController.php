<?php

namespace App\Controllers;

use App\Models\RacesModel;
use App\Models\RaceTypeModel;
use CodeIgniter\HTTP\RedirectResponse;
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

    public function index(): string|RedirectResponse
    {
        $countries = $this->racesModel->select('country')->distinct()->paginate(15);

        $amount = [];
        foreach ($countries as $country) {
            // Count occurrences of each country and assign to the associative array
            $amount[$country->country] = $this->racesModel->where('country', $country->country)->countAllResults();
        }

        arsort($amount);

        return view('races/index', ['title' => 'Races', 'pager' => $this->racesModel->pager, 'data' => $amount]);
    }

    public function showRaces($id): string|RedirectResponse
    {
        return view('races/data', ['title' => 'Races | ' . $id, 'data' => $this->racesModel->where('country', $id)->paginate(20), 'pager' => $this->racesModel->pager]);
    }
}
