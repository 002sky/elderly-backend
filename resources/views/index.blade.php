<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="./css/fontawesome-free/css/all.min.css">

    <!--==================== Owl-Carousel ====================-->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

    <!--==================== Data table ====================-->


    <!-- ------------ AOS Library --------------------------->
    <link rel="stylesheet" href="./css/aos.css">

    <!--==================== Custom style ====================-->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

</body>

</html>
<div class="login-section">
    <div class="layer"></div>
    <div class="container">
        <div class="top-section">
            <h1 class="page-title">Login</h1>
        </div>
        <div class="left-section">
            <!-- <img src="./images/logo.png" alt=""> -->
            <img src="./images/WeCare-logos_black.png" alt="">

        </div>
        <div class="right-section">
            <form>

                <div class="form-row">
                    <div class="input">
                        <div class="icon">
                            <i class="fas fa-user-circle"></i>
                        </div>

                        <input type="text" id="email" name="email" placeholder="Email">
                    </div>
                    <!--error message-->

                    <!-- <div class="message">
                        @error('email')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> -->
                </div>
                <div class="form-row">
                    <div class="input">
                        <div class="icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                    <!--error message-->
                    <!-- <div class="message">
                        @error('password')
                        <span class="" role="">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> -->
                </div>
                <div class="form-row">
                    <button type="submit" class="btn-login">Login</button>
                </div>
                <!-- <div class="form-row">
                    <span>Do not have an account? <a href="#">Click here</a> </span>
                </div> -->
            </form>
        </div>
    </div>
</div>