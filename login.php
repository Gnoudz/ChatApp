<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="#">
                <div class="error-txt">This is error message!</div>
                <div class="filed input">
                    <label for="">Email Address</label>
                    <input type="text" placeholder="Enter your email" name="email" required>
                </div>
                <div class="filed input">
                    <label for="">Password</label>
                    <input type="password" placeholder="Enter your password" name="password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="filed button">
                    <input type="submit" value="Continue to Chat">
                </div>
                <div class="link">Not yet signed up? <a href="#">Signup now</a></div>
            </form>
        </section>
    </div>

    <script src="./javascript/pass-show-hide.js"></script>
    <script src="./javascript/login.js"></script>
</body>

</html>