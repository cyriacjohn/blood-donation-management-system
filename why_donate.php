<!DOCTYPE html>
<html lang="en">

<head>
  <title>Why Donate?</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<style>
  .card {
    transition: transform 0.3s;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    border-radius: 0;
  }

  .card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
  }
</style>

<body>
  <div>
    <?php
    $active = "why_donate";
    include('head.php');
    ?>
  </div>
  <div class="container mt-5">
    <h1 class="text-center mb-4">Benefits of Blood Donation</h1>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Reduced Risk of Heart Disease and Stroke</h5>
            <p class="card-text">Regular blood donation helps lower the risk of heart disease and stroke. By donating blood, you contribute to maintaining healthy blood viscosity and reducing the chances of cardiovascular issues.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Improved Blood Cell Production</h5>
            <p class="card-text">Donating blood stimulates the production of new blood cells in the body. This helps in replenishing the blood supply, improving overall health, and supporting the immune system's functioning.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Maintained Iron Levels</h5>
            <p class="card-text">Blood donation helps maintain healthy iron levels, reducing the risk of iron overload. This is particularly beneficial for individuals with conditions like hemochromatosis, as it aids in regulating iron levels and preventing associated complications.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Life-Saving Impact</h5>
            <p class="card-text">By donating blood, you can save lives and make a positive impact on others. Blood transfusions are vital for individuals undergoing surgeries, recovering from accidents, or living with conditions like cancer or blood disorders. Your donation can provide them with a chance for recovery and a better quality of life.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Community Support</h5>
            <p class="card-text">Blood donation helps in strengthening the community by providing a vital resource that can save lives during emergencies, surgeries, and medical treatments.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">National Health</h5>
            <p class="card-text">Blood donation plays a crucial role in maintaining the overall health of the nation by ensuring an adequate supply of blood for various medical procedures and treatments.</p>
          </div>
        </div>
      </div>
    </div>

    <center><p>&nbsp;</p><iframe width="560" height="315" src="https://www.youtube.com/embed/opariZWbuCY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <br><br><br><br>
  </div>
  <?php include('footer.php');?>
</body>

</html>
