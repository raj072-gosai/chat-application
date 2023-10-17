<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Online Chat Application</header>
            <form action="#">
                <div class="error-txt"></div>
                    <div class="field input">
                        <label >email address</label>
                        <input type="text" name="email" placeholder="enter your email">
                    </div>
                    <div class="field input">
                        <label >password</label>
                        <input type="password" name="password" placeholder="enter new password">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Login in">
                    </div>
            </form>
            <div class="link">Not yet signed up? <a href="index.php">signup now</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
    
</body>
</html>