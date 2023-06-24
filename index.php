  <?php include 'inc/header.php'; ?>

  <?php 
  $name=$lname=$email=$phone=$gender=$date=$dob='';
  $nameErr=$lnameErr=$emailErr=$phoneErr=$genderErr=$dateErr=$dobErr='';

  if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
      $nameErr = 'First Name is required';
    }else{
      $name = filter_input(INPUT_POST,'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    if(!empty($_POST['lname'])){
      $lname = filter_input(INPUT_POST,'lname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    if(empty($_POST['dob'])){
      $dobErr = 'Date is required';
    }else{
      $dob = filter_input(INPUT_POST,'dob', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    if(empty($_POST['gender'])){
      $genderErr = 'Gender is required';
    }else{
      $gender = filter_input(INPUT_POST,'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    } if(empty($_POST['email'])){
      $emailErr = 'Email is required';
    }else{
      $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
    } if(empty($_POST['phone'])){
      $phoneErr = 'Telephone Number is required';
    }else{
      $phone = filter_input(INPUT_POST,'phone', FILTER_SANITIZE_NUMBER_INT);
    }
  
    if(empty($nameErr)&& empty($emailErr)&& empty($phoneErr) && empty($genderErr) && empty($dobErr)){
     $sql = "INSERT INTO feedback (name,lname,dob, gender,phone, email) VALUES('$name','$lname','$dob','$gender','$phone','$email')";
      if(mysqli_query($conn, $sql)){
        header('Location:feedback.php');
      }else{
        echo 'Error: ' . mysqli_error($conn);
      }
    }
  }

  ?>

  <img src="/php-crash-main/_starter_files/feedback/img/logo.png" class="w-25 mb-3" alt="">
    <h2>Home</h2>
   
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
      <div class="mb-3">
        <label for="name" class="form-label">First Name</label>
        <input type="text" class="form-control <?php echo $nameErr ?'is-invalid':null; ?>" id="name" name="name" placeholder="Enter first name">
        <div class="invalid-feedback">
          <?php echo $nameErr ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="lname" class="form-label">Last Name</label>
        <input type="text" class="form-control <?php echo $lnameErr ?'is-invalid':null; ?>" id="lname" name="lname" placeholder="Enter last name">
      </div>
      <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" class="form-control <?php echo $dateErr ?'is-invalid':null; ?>" id="dob" name="dob" > 
        <div class="invalid-feedback">
          <?php echo $dobErr ?>
        </div>
      </div>
      
        <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select type="gender" class="form-control <?php echo$genderErr?'is-invalid':null; ?>" id="gender" name="gender" >
    <option selected ></option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
  </select>
        <div class="invalid-feedback">
          <?php echo $genderErr ?>
        </div>
  
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo$emailErr?'is-invalid':null; ?>" id="email" name="email" placeholder="Enter your email">
        <div class="invalid-feedback">
          <?php echo $emailErr ?>
        </div>     
        <div class="mb-3">
        <label for="phone" class="form-label">Telephone Number</label>
        <input  class="form-control <?php echo$phoneErr?'is-invalid':null; ?>" id="phone" name="phone" placeholder="Enter your Telephone Number">
        <div class="invalid-feedback">
          <?php echo $phoneErr ?>
        </div>     
      </div>

      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>
    <?php include 'inc/footer.php'; ?>