<?php
use League\ISO3166\ISO3166 as IS;

echo $this->extend("layout/master");
echo $this->section("content");

?>

<div class="col-lg-4 col-md-6 col-12 offset-lg-4 offset-md-3 text-center">

    <h1>Races</h1>
    <?php

    $iso = new IS();
    foreach($data as $country => $value) {
        $country_name = $country;
        if(!empty($country)) {
            $country_name = $iso->alpha2(strtoupper($country))['name'];
        } else $country_name = "Global";

        echo anchor('/races/'.$country, '<span class="fi fi-'.$country.'"></span> '.$country_name. ' ('.$value.')', ['class' => 'text-center text-decoration-none']);
        echo '<br>';
    }

    ?>


    <?php

    if($pager->getPageCount() > 1) echo $pager->links();
    ?>

</div>

<?php echo $this->endSection();