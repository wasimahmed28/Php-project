<?php include 'inc/header.php'; ?>  

<?php
$sql= 'SELECT * FROM feedback';
$result = mysqli_query($conn, $sql);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<h2>Dashboard</h2>

<?php if(empty($feedback)):?>
  <p class="lead mt3"> There is no feedback</p>
  <?php endif;?>

  <?php foreach($feedback as $item): ?>
    <div class="card my-3 w-75">
     <div class="card-body text-center">
      <?php ?> First Name: <?php echo  $item['name']; ?>
  </br>
      <?php ?> Last Name: <?php echo  $item['lname']; ?>
      </br>
      <?php ?> Date of Birth: <?php echo  $item['dob']; ?>
      </br>
      <?php ?> Gender: <?php echo  $item['gender']; ?>
      </br>
      <?php ?> Email: <?php echo  $item['email']; ?>
      </br>
      <?php ?> Telephone Number: <?php echo  $item['phone']; ?>
      
      <div class="text-secondary mt-2"></div>
      <?php ?> ON <?php echo $item['date']; ?>
      </div>
   </div>
   <?php endforeach; ?>

   <?php include 'inc/footer.php'; ?>