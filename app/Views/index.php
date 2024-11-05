<?php

echo $this->extend("layout/master");
echo $this->section("content");
echo '<div class="container px-5">';
echo '  <div class="row gx-5 justify-content-center">';
echo '    <div class="col-lg-8 col-xl-6">';
echo '      <div class="text-center">';
echo '        <h1 class="fw-bolder mb-3">CYCLING</h1>';
echo '      </div>';
echo '    </div>';
echo '  </div>';
echo '</div>';
echo '<div class="row d-flex justify-content-center mt-5">';
echo '<div class="px-5" style="max-width: 10rem">';
echo anchor('/races', "Races", 'class="btn border border-1" style="max-width: 10rem"');
echo '</div>';
echo '<div class="px-5" style="max-width: 10rem">';
echo anchor('/riders', "Riders", 'class="btn border border-1" style="max-width: 10rem"');
echo '</div>';
echo '<div class="px-5" style="max-width: 10rem">';
echo anchor('/secret', "Editor", 'class="btn border border-1" style="max-width: 10rem"');
echo '</div>';
echo '</div>';
?>
<div class="d-flex justify-content-center overflow-hidden my-5">
  <canvas id="myChart" style="max-width: 50rem; max-height:20rem"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Česko', 'Rakousko', 'Německo', 'Polsko', 'Litva', 'Estonsko', 'Rumunsko'],
      datasets: [{
        label: 'Spotřeba piva na cyklistu',
        data: [138, 105, 101, 97, 88, 82, 82],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<?php

echo $this->endSection();
