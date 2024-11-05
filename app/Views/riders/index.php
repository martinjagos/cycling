<?php

echo $this->extend("layout/master");
echo $this->section("content");
?>
<?php
echo '<div class="container px-5">';
echo '  <div class="row gx-5 justify-content-center">';
echo '    <div class="col-lg-8 col-xl-6">';
echo '      <div class="text-center">';
echo '        <h1 class="fw-bolder mb-3">Riders</h1>';
echo '      </div>';
echo '    </div>';
echo '  </div>';
echo '</div>';
echo '<div class="row d-flex justify-content-center mt-5">';
foreach ($riders as $rider) {
    if ($rider["photo"] == NULL){
        $code = '<img src="'.base_url("/assets/no-image.jpg").'" class="img-fluid rounded border border-1" alt="...">';
    }else{$code = '<img src="'.base_url("/assets/riders/".$rider["photo"]).'" class="img-fluid rounded border border-1" alt="...">';}
    $riderAge = date_diff(date_create($rider["date_of_birth"]), date_create(date("Y-m-d")));
    echo '
                    <div class="card border-1 m-3" style="max-width: 30rem;">
                    <div class="row g-0 my-auto mx-3">
                    <div class="col-3 my-auto">
                    '.$code.'
                    </div>
                    <div class="col-8 p-3">
                    <div class="card-body">
                        <h5 class="card-title h4 text-dark fw-bolder">'.$rider["first_name"]." ".$rider["last_name"].'</h5>
                        <p class="card-text text-muted fw-bolder"><span class="text-muted fw-normal">Age: '.$riderAge->format("%Y").'</span></p>
                    </div>
                    <div class="card-footer mb-3 bg-transparent border-0">' . anchor('/pdf/'.$rider["id"], 'Make PDF', 'class="btn btn-outline-primary"') . '</div>
                    </div></div></div>';
}


echo '</div></div>';

echo '<div class="d-flex justify-content-center my-5">';
if ($pager->getPageCount() > 1) echo $pager->links();
echo '</div>';
?>
<?php
echo $this->endSection();