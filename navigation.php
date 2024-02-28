
<body>
<!-- <?php 
    session_start();
    if(!isset( $_SESSION['user_id'])){
        header("location: login.php");
    }
?>  -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
<?php 
                    include_once "php/config.php";
                    $sql = mysqli_query($conn, "SELECT *FROM users WHERE user_id = {$_SESSION['user_id']}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
    <div class="container-fluid">
      <a class="brand"  href="#">Be(e) active
      <img src="./images/Bee.svg"/>
      </a>
     
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
          <i class="fa-solid fa-bars"></i>
        </span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="./home.php">Home</a>
          <a class="nav-link" href="./chat.php">Chat</a>
          <a class="nav-link" href="./workout.php">Workout</a>
          <!-- <a class="nav-link" href="#">Chat</a> -->
        
        </div>
      </div>
     
      <div class="d-none d-lg-block">
        <div class="content">
                    <img src="./php/images/<?php echo $row['image']?>" alt="profile"  class="profile-picture"/>
                    <div class="details">
                        <span class="user-details"><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                        <p><?php echo $row['status']?></p>
                    </div>
                  </div>
    </div>
  </nav> 
</body>