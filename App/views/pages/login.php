<!-- <!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
</head>
<body>
    <h1>Giriş Yap</h1>
    <?php if (!empty($_GET['error'])): ?>
        <p style="color: red;">Hatalı kullanıcı adı veya şifre!</p>
    <?php endif; ?>
    <form action="/login" method="POST">
        <label for="username">Kullanıcı Adı:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Şifre:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Giriş Yap</button>
    </form>
</body>
#F06D6D
#F06D6D
#F06D6D
#F06D6D
#F06D6D
#F06D6D
</html> -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartLab Form Builder</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap");

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            text-decoration: none;
            font-family: "Nunito", serif;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #F8F9FD;
        }

        .login-form-logo {
            width: 80px;
        }

        .logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 18px;
            margin-bottom: 30px;
        }

        .logo h1 {
            font-size: 18px;
            font-weight: 400;
        }

        .login-box {
            width: 80%;
            max-width: 400px;
            border-radius: 10px;
            padding: 30px 40px;
            background-color: #fff;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .input-units {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .input-units input {
            height: 50px;
            padding: 10px;
            font-size: 15px;
            border: 1px solid #E5E5E5;
            border-radius: 5px;
            outline: none;
        }

        .input-units input:focus {
            border-color: #1089FF;
        }

        .input-units button {
            background-color: #1089FF;
            border: none;
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
        }

        .input-units button:hover {
            background-color: rgb(63, 125, 186);
        }

        .login-box a {
            display: inline-block;
            margin: 20px 0 10px 0;
            color: #1089FF;
        }

        .login-box a:hover {
            color: rgb(63, 125, 186);
        }

        p {
            visibility: hidden;
            color: #F06D6D;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <div class="logo">
            <img class="login-form-logo" src="assets/images/smartlab-logo.webp" alt="Smartlab Form Builder">
            <h1>SmartLab Form Builder</h1>
        </div>
        <div class="input-units">
            <input type="text" id="username" placeholder="Username" />
            <input type="password" id="password" placeholder="Password" />
            <button class="login-button">Login</button>
        </div>
        <a href="/ask-the-ozgur">Forgot Password</a>
        <p>Username or password is incorrect.</p>
    </div>

    <script src="assets/js/login.js" type="module"></script>
</body>

</html>