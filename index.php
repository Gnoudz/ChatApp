<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>
            <form action="#" enctype="multipart/form">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="filed input">
                        <label for="">First Name</label>
                        <input type="text" name="fname" placeholder="First name" required>
                    </div>
                    <div class="filed input">
                        <label for="">Last Name</label>
                        <input type="text" name="lname" placeholder="Last name" required>
                    </div>
                </div>
                <div class="filed input">
                    <label for="">Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="filed input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter new password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="filed image">
                    <label for="">Select Image</label>
                    <input type="file" name="image" required>
                </div>
                <div class="filed button">
                    <input type="submit" value="Continue to Chat">
                </div>
                <div class="link">Already signed up? <a href="#">Login now</a></div>
            </form>
        </section>
    </div>
    <script src="./javascript/pass-show-hide.js"></script>
    <script src="./javascript/signup.js"></script>
</body>

</html>