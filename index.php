<?php include_once 'header.php'; ?>
<body>
    <section  class="wrapper-section">
        <div class="wrapper">
        <div class="form signup">
            <header>Be(e) Active</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt">This is a error message!</div>
                <div class="name-details">

                    <div class="field input">
                        
                        <input type="text" name="fname" placeholder="First Name" required/>
                    </div>

              
                    
                    <div class="field input">
                     
                        <input type="text"  name="lname" placeholder="First Last" required />
                    </div>
                </div>

                    <div class="field input">
                    
                        <input type="email"  name="email" placeholder="Email" required/>
                    </div>

                    <div class="field input">
                      
                        <input type="password"  name="password" placeholder="Password" required/>
                        <i class="fa-solid fa-eye"></i>
                    </div>

                    <div class="field image">
                  
                        <input type="file"  name="image" required/>
                    </div>

                    <div class="field button">
                        <input type="submit" value="Next"/>
                    </div>


                    


                
            </form>
            <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </div>
    </div>
</section>
    <script src="./javascript/password-show-hide.js"></script>
    <script src="./javascript/signup.js"></script>
    
</body>
</html>