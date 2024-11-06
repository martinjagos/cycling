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

    public function addRace() {
        return view("races/countryRaceAdd", ['title' => "Add Race"]);
    }

    public function createRace()
    {
        $logo = $this->request->getFile('logo');
        $logoName = $logo->getFilename() . '-' . rand(1, 100) . '.' . $logo->getExtension();

        if ($logo && $logo->isValid()) {
            $logo->store('assets/logos');  // Change to your preferred directory
        }

        // Insert the form data into the database
        $entryModel = new EntryModel();
        $data = [
            'real_name'  => $this->request->getPost('real_name'),
            'year'       => $this->request->getPost('year'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date'   => $this->request->getPost('end_date'),
            'sex'        => $this->request->getPost('sex'),
            'logo'       => $logoName,
            'country'    => $this->request->getPost('country'),
            'uci_tour'   => $this->request->getPost('uci_tour'),
        ];

        $entryModel->save($data);

        return redirect()->to('/');
    }

    public function deleteRace($id): RedirectResponse {
        $this->raceYearModel->where("id", $id)->delete();
        return redirect()->route('/');
    }
}
