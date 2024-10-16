<?php
use League\ISO3166\ISO3166 as IS;

echo $this->extend("layout/master");
echo $this->section("content");

?>

    <div class="col-lg-4 col-md-6 col-12 offset-lg-4 offset-md-3 text-center">

        <h1>Races of <?= $name ?></h1>
        <?php

        $iso = new IS();

        foreach($data as $race) {
            echo '<p>'.$race->default_name.'</p>';
        }

        ?>


        <?php

        if($pager->getPageCount() > 1) echo $pager->links();
        ?>

    </div>

<?php echo $this->endSection();