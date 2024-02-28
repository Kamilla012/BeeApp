<?php include_once 'header.php'; ?>
<body>
<section class="wrapper-section"> 
    <div class="wrapper">
        <div class="form login">
            <header>Be(e) Login</header>
            <form action="#">
                <div class="error-txt">This is a error message!</div>
            

                    <div class="field input">
                    
                        <input type="email" name="email" placeholder="Email"/>
                    </div>

                    <div class="field input">
                 
                        <input type="password" name="password" placeholder="Password"/>
                        <i class="fa-solid fa-eye"></i>
                    </div>

                    <div class="field button">
                        <input type="submit" value="Login"/>
                    </div>


                    


                
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
</div>
    </div>
</section>
    <script src="./javascript/password-show-hide.js"></script>
    <script src="./javascript/login.js"></script>
</body>
</html>