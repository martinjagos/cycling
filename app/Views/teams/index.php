<?php

echo $this->extend("layout/master");
echo $this->section("content");


foreach($data as $test) {
    echo '<p>'.$test->default_name.'</p>';

}

?>



<?php

echo $this->endSection();
