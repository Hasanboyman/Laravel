<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form with Modal</title>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300' rel='stylesheet' type='text/css'>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #1f293a;
        }
        .container {
            position: relative;
            width: 256px;
            height: 256px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container span {
            position: absolute;
            left: 0;
            width: 32px;
            height: 6px;
            background: #2c4766;
            border-radius: 8px;
            transform-origin: 128px;
            transform: scale(2.2) rotate(calc(var(--i) * (360deg / 50)));
            animation: animateBlink 3s linear infinite;
            animation-delay: calc(var(--i) * (3s / 50));
        }
        @keyframes animateBlink {
            0% {
                background: #0ef;
            }
            25% {
                background: #2c4766;
            }
        }
        .login-box {
            position: absolute;
            width: 400px;
        }
        .login-box form {
            width: 100%;
            padding: 0 50px;
        }
        h2 {
            font-size: 2em;
            color: #0ef;
            text-align: center;
        }
        .input-box {
            position: relative;
            margin: 25px 0;
        }
        .input-box input {
            width: 100%;
            height: 50px;
            background: transparent;
            border: 2px solid #2c4766;
            outline: none;
            border-radius: 40px;
            font-size: 1em;
            color: #fff;
            padding: 0 20px;
            transition: .5s ease;
        }
        .input-box input:focus,
        .input-box input:valid {
            border-color: #0ef;
        }
        .input-box label {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            font-size: 1em;
            color: #fff;
            pointer-events: none;
            transition: .5s ease;
        }
        .input-box input:focus ~ label,
        .input-box input:valid ~ label {
            top: 1px;
            font-size: .8em;
            background: #1f293a;
            padding: 0 6px;
            color: #0ef;
        }
        .forgot-pass {
            margin: -15px 0 10px;
            text-align: center;
        }
        .forgot-pass a {
            font-size: .85em;
            color: #fff;
            text-decoration: none;
        }
        .forgot-pass a:hover {
            text-decoration: underline;
        }
        .btn {
            width: 100%;
            height: 45px;
            background: #0ef;
            border: none;
            outline: none;
            border-radius: 40px;
            cursor: pointer;
            font-size: 1em;
            color: #1f293a;
            font-weight: 600;
        }
        .signup-link {
            margin: 20px 0 10px;
            text-align: center;
        }
        .signup-link a {
            font-size: 1em;
            color: #0ef;
            text-decoration: none;
            font-weight: 600;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }

        /* Sign-In Button and Modal Styles */
        #mainButton {
            color: white;
            border: none;
            outline: none;
            font-size: 24px;
            font-weight: 200;
            overflow: hidden;
            position: relative;
            border-radius: 2px;
            letter-spacing: 2px;
            text-transform: uppercase;
            background-color: #00a7ee;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.2s ease-in;
            margin-bottom: -280px;
        }  #mainButton {
               color: white;
               border: none;
               outline: none;
               font-size: 24px;
               font-weight: 200;
               overflow: hidden;
               position: relative;
               border-radius: 2px;
               letter-spacing: 2px;
               text-transform: uppercase;
               background-color: #1f293a;
               box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
               transition: all 0.2s ease-in;
               margin-bottom: -280px;
           }
        #mainButton .btn-text {
            z-index: 2;
            display: block;
            padding: 10px 20px;
            position: relative;
        }
        #mainButton:after {
            top: -50%;
            z-index: 1;
            content: '';
            width: 150%;
            height: 200%;
            position: absolute;
            left: calc(-150% - 40px);
            background-color: rgba(255,255,255,0.2);
            transform: skewX(-40deg);
            transition: all 0.2s ease-out;
        }
        #mainButton:hover {
            cursor: default;
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        }
        #mainButton:hover:after {
            transform: translateX(100%) skewX(-30deg);
        }
        #mainButton.active {
            box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
        }
        #mainButton .modal {
            top: 0;
            left: 0;
            z-index: 3;
            width: 100%;
            height: 100%;
            padding: 20px;
            display: flex;
            position: fixed;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background-color: inherit;
            transform-origin: center center;
            background-image: linear-gradient(to top left, #00a7ee 10%, lighten(#00a7ee, 20%) 65%, white 200%);
            transform: scale(0.000001,0.00001);
            transition: all 0.2s ease-in;
        }
        #mainButton .close-button {
            top: 20px;
            right: 20px;
            position: absolute;
            transition: opacity 0.2s ease-in;
        }
        #mainButton .close-button:hover {
            opacity: 0.5;
            cursor: pointer;
        }
        #mainButton .form-title {
            margin-bottom: 15px;
        }
        #mainButton .form-button {
            width: 100%;
            padding: 10px;
            color: #00a7ee;
            margin-top: 10px;
            max-width: 400px;
            text-align: center;
            border: solid 1px white;
            background-color: white;
            transition: color 0.2s ease-in, background-color 0.2s ease-in;
        }
        #mainButton .form-button:hover {
            color: white;
            cursor: pointer;
            background-color: transparent;
        }
        #mainButton .input-group {
            width: 100%;
            font-size: 16px;
            max-width: 400px;
            padding-top: 20px;
            position: relative;
            margin-bottom: 15px;
        }
        #mainButton .input-group input {
            width: 100%;
            color: white;
            border: none;
            outline: none;
            padding: 5px 0;
            line-height: 1;
            font-size: 16px;
            font-family: 'Raleway';
            border-bottom: solid 1px white;
            background-color: transparent;
            transition: box-shadow 0.2s ease-in;
        }
        #mainButton .input-group input:focus {
            box-shadow: 0 1px 0 0 white;
        }
        #mainButton .input-group input:focus,
        #mainButton .input-group input:active {
            + label {
                font-size: 12px;
                transform: translateY(-20px);
            }
        }
        #mainButton .input-group input:not(:placeholder-shown) {
            + label {
                font-size: 12px;
                transform: translateY(-20px);
            }
        }
        #mainButton .input-group label {
            left: 0;
            top: 20px;
            position: absolute;
            pointer-events: none;
            transition: all 0.2s ease-in;
        }
    </style>


<body>

<div class="container">
    <!-- Animated Sign-In Button with Modal -->
    <div id="mainButton">
        <div class="btn-text" onclick="openForm()">Sign Up</div>
        <form class="modal" action="{{ url('/') }}" method="post">
            @csrf
            @method('POST')
            <div class="close-button" onclick="closeForm()">x</div>
            <div class="form-title">Sign Up</div>

            <div class="input-group">
                <input type="text" id="name" name="name" onblur="checkInput(this)" placeholder=" " />
                <label for="name">Username</label>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" onblur="checkInput(this)" placeholder=" " />
                <label for="password">Password</label>
            </div>
            <div class="input-group">
                <input type="number" id="age" name="age" onblur="checkInput(this)" placeholder=" " />
                <label for="age">Age</label>
            </div>

            <div class="input-group">
                <input type="email" id="email" name="email" onblur="checkInput(this)" placeholder=" " />
                <label for="email">Email</label>
            </div>
            <button  type="submit" style="font-size: 28px" class="form-button" onclick="closeForm()">Go</button>
        </form>

    </div>

    <!-- Animated Background with Login Form -->
    <div class="login-box">
        <h2>Login</h2>
        <form action="{{url('/login')}}" method="Post">
            <div class="input-box">
                <input type="text" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="signup-link">
                <a href="#">.</a>
            </div>
        </form>
    </div>

    <!-- Background Animation -->
    <span style="--i:0;"></span>
    <span style="--i:1;"></span>
    <span style="--i:2;"></span>
    <span style="--i:3;"></span>
    <span style="--i:4;"></span>
    <span style="--i:5;"></span>
    <span style="--i:6;"></span>
    <span style="--i:7;"></span>
    <span style="--i:8;"></span>
    <span style="--i:9;"></span>
    <span style="--i:10;"></span>
    <span style="--i:11;"></span>
    <span style="--i:12;"></span>
    <span style="--i:13;"></span>
    <span style="--i:14;"></span>
    <span style="--i:15;"></span>
    <span style="--i:16;"></span>
    <span style="--i:17;"></span>
    <span style="--i:18;"></span>
    <span style="--i:19;"></span>
    <span style="--i:20;"></span>
    <span style="--i:21;"></span>
    <span style="--i:22;"></span>
    <span style="--i:23;"></span>
    <span style="--i:24;"></span>
    <span style="--i:25;"></span>
    <span style="--i:26;"></span>
    <span style="--i:27;"></span>
    <span style="--i:28;"></span>
    <span style="--i:29;"></span>
    <span style="--i:30;"></span>
    <span style="--i:31;"></span>
    <span style="--i:32;"></span>
    <span style="--i:33;"></span>
    <span style="--i:34;"></span>
    <span style="--i:35;"></span>
    <span style="--i:36;"></span>
    <span style="--i:37;"></span>
    <span style="--i:38;"></span>
    <span style="--i:39;"></span>
    <span style="--i:40;"></span>
    <span style="--i:41;"></span>
    <span style="--i:42;"></span>
    <span style="--i:43;"></span>
    <span style="--i:44;"></span>
    <span style="--i:45;"></span>
    <span style="--i:46;"></span>
    <span style="--i:47;"></span>
    <span style="--i:48;"></span>
    <span style="--i:49;"></span>
</div>

<script>
    function openForm() {
        document.querySelector('#mainButton .modal').style.transform = 'scale(1,1)';
    }

    function closeForm() {
        document.querySelector('#mainButton .modal').style.transform = 'scale(0.000001,0.00001)';
    }
</script>
</body>

