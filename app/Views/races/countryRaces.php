<?php

use CodeIgniter\View\Table;
use League\ISO3166\ISO3166 as IS;
use IonAuth\Libraries\IonAuth;

$ionAuth = new IonAuth();

echo $this->extend("layout/master");
echo $this->section("content");

?>

<div class="col-12 text-center">

    <?php
    $iso = new IS();
    $value = $data[0];

    if(!empty($value->country)) {
        $country_name = $iso->alpha2(strtoupper($value->country))['name'];
    } else $country_name = "Global";

    echo '<h1 class="uppercase">Races of '.$country_name. ' from '. $value->year . '</h1>';
    echo '<div class="pt-5"></div>';

    $table = new Table();
    if($ionAuth->isAdmin()) $table->setHeading('ID', 'NAME', 'START DATE', 'LAST DATE', 'YEAR', 'GENDER', 'UCI TOUR', '');
    else $table->setHeading('ID', 'NAME', 'START DATE', 'LAST DATE', 'YEAR', 'GENDER', 'UCI TOUR');
    $template = array('table_open' => '<table class="table">', 'thead_open' => '<thead>', 'thead_close' => '</thead>', 'heading_row_start' => '<tr>', 'heading_row_end' => ' </tr>', 'heading_cell_start' => '<th class="fw-bold text-center">', 'heading_cell_end' => '</th>', 'tbody_open' => '<tbody>', 'tbody_close' => '</tbody>', 'row_start' => '<tr class="text-center align-middle">', 'row_end' => '</tr>', 'cell_start' => '<td>', 'cell_end' => '</td>', 'row_alt_start' => '<tr class="text-center align-middle">', 'row_alt_end' => '</tr>', 'cell_alt_start' => '<td>', 'cell_alt_end' => '</td>', 'table_close' => '</table>');

    $table->setTemplate($template);

    foreach($data as $race) {
        $editBtn = anchor('dashboard/edit-race/' . $value->country . '/' . $value->year, 'Edit', 'class="btn btn-outline-primary"');
        $deleteBtn = "<button type=\"button\" class=\"btn btn-outline-danger ms-3\" data-bs-toggle=\"modal\" data-bs-target=\"#modal" . $value->country . "\">Delete</button>";


        if($ionAuth->isAdmin()) $table->addRow($race->id, $race->real_name, $race->start_date, $race->end_date, $race->year, empty($race->sex) ? "--" : $race->sex, $race->name, $deleteBtn);
        else $table->addRow($race->id, $race->real_name, $race->start_date, $race->end_date, $race->year, empty($race->sex) ? "--" : $race->sex, $race->name);

        echo form_modal("modal" . $value->country, $value->country, "Delete Race", "Do you really want to delete race \"" . $value->real_name . "\"?", "dashboard/delete-race/" . $value->id);
    }

    echo $table->generate();
    ?>

</div>

<?php echo $this->endSection();