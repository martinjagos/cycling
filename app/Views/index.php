<?php

echo $this->extend("layout/master");
echo $this->section("content");
?>





<?php

echo anchor('/races', "Races");

echo $this->endSection();
