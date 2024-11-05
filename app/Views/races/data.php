<?php

echo $this->extend("layout/master");
echo $this->section("content");

?>

    <div class="col-lg-4 col-md-6 col-12 offset-lg-4 offset-md-3 text-center">

        <h1>Races of <?= $name ?></h1>
        <?php

        foreach($data as $race) {
            echo anchor('/races-info/'.$short.'/'.$race->year, '<p>' . $race->year . '</p>', ['class' => 'text-center text-decoration-none']);
        }

        ?>

    </div>

<?php echo $this->endSection();