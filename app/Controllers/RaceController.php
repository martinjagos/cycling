<?php

namespace App\Controllers;

use App\Models\RacesModel;
use App\Models\RaceTypeModel;
use App\Models\RaceYearModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use League\ISO3166\ISO3166 as IS;

class RaceController extends BaseController
{
    var $racesModel;
    var $raceTypeModel;
    var $raceYearModel;
    var $IS;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->IS = new IS();
        $this->racesModel = new RacesModel();
        $this->raceTypeModel = new RaceTypeModel();
        $this->raceYearModel = new RaceYearModel();
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

        $fullName = $this->IS->alpha2(strtoupper($id))['name'];
        $race_year = $this->raceYearModel->where('country', $id)->select("year")->distinct()->findAll();


        return view('races/data', ['title' => 'Races | ' . $fullName, 'data' => $race_year, 'name' => $fullName, 'short' => $id, 'pager' => $this->racesModel->pager]);
    }

    public function showRacesInformation($countryId, $year): string|RedirectResponse
    {
        $races_of_year = $this->raceYearModel->where('country', $countryId)->where('year', $year)
            ->join('uci_tour_type', 'race_year.uci_tour = uci_tour_type.id')->findAll();

        return view('races/countryRaces', ['title' => 'Races | ' . $this->IS->alpha2(strtoupper($countryId))['name'], 'data' => $races_of_year]);
    }
}
