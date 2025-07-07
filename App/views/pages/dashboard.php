<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Smartlab Form Builder - Forms</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            text-decoration: none;
            font-family: "Open Sans", sans-serif;
        }

        .no-copy {
            user-select: none;
            -webkit-user-select: none;
            /* Safari */
            -moz-user-select: none;
            /* Firefox */
            -ms-user-select: none;
            /* Internet Explorer/Edge */
        }


        .container {
            margin: 0 185px;
        }

        header {
            position: sticky;
            background-color: #fff;
            top: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 25px;
            height: 64px;
            width: 100%;
            gap: 15px;
        }

        header .left {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        header .left .fa-bars {
            font-size: 18px;
            color: #1F1F1F;
            margin-right: 8px;
            cursor: pointer;
        }

        header .left .fa-file-lines {
            font-size: 36px;
            color: #7248B9;
            cursor: pointer;
        }

        header .left h1 {
            font-size: 22px;
            font-weight: 400;
            color: #1F1F1F;
            cursor: pointer;
        }

        header .center {
            display: flex;
            align-items: center;
            gap: 45px;
            padding: 7px 35px 7px 12px;
            border-radius: 35px;
            height: 48px;
            width: 720px;
            background-color: #F0F4F9;
            margin-right: 80px;
        }

        header .center .search-bar-wrapper {
            display: flex;
            align-items: center;
            flex-grow: 1;
            gap: 7px;
        }

        header .center .search-bar-wrapper .search-bar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.3s ease all;
            cursor: pointer;
        }

        header .center .search-bar-wrapper .search-bar:hover {
            background-color: #E2E7EB;
        }

        header .center .search-bar-wrapper input {
            background-color: transparent;
            flex-grow: 1;
            border: none;
            outline: none;
            color: #444746;
            font-size: 14px;
        }

        header .center .search-bar-wrapper input::-webkit-input-placeholder {
            color: #444746;
        }

        header .center:has(.search-bar-wrapper input:focus) {
            background-color: #fff;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 2px -1px;
        }

        header .right {
            display: flex;
            align-items: center;
            gap: 20px;
            position: relative;
        }

        /*! warning, pp ile degisecek */
        header .right>span {
            background-color: #004D40;
            color: #fff;
            height: 32px;
            width: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            cursor: pointer;
        }

        header .right svg {
            cursor: pointer;
        }

        .ready-forms-wrapper {
            padding: 23px 0 40px 0;
            height: auto;
            background-color: #F1F3F4;
        }

        .ready-forms-header p {
            font-size: 15px;
            font-weight: 400;
            margin-bottom: 22px;
            margin-left: 7px;
        }

        .ready-forms {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
            row-gap: 30px;
            column-gap: 20px;
        }

        .ready-forms section img {
            width: 173px;
            height: 130px;
            border: 1px solid #DADCE0;
            border-radius: 4px;
            cursor: pointer;
        }

        .ready-forms section img:hover {
            border-color: #7248B9;
        }

        .ready-forms section p {
            font-size: 13px;
            font-weight: 500;
            margin-left: 4px;
            margin-top: 3px;
            cursor: default;
        }

        .recent-forms-header {
            margin-top: 30px;
            margin-bottom: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        .recent-forms {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
            row-gap: 30px;
            column-gap: 20px;
        }

        .recent-forms section {
            width: 210px;
            border: 1px solid #DADCE0;
            border-radius: 5px;
            cursor: pointer;
        }

        .recent-forms section:hover {
            border: 1px solid #7248B9;
        }

        .recent-forms section img {
            width: 100%;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            border-bottom: 1px solid #DADCE0;
        }

        .recent-form-meta-data {
            padding: 15px;
        }

        .recent-form-meta-data p {
            font-size: 13px;
            font-weight: 500;
        }

        .recent-form-meta-data .operations {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .recent-form-meta-data .operations span {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .recent-form-meta-data .operations .bi-list-ul {
            width: 20px;
            height: 20px;
            background-color: #7248B9;
            color: #fff;
            border-radius: 3px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .recent-form-meta-data .operations .opening-date {
            font-size: 12px;
            color: #80868B;
        }


        .recent-form-meta-data .operations .bi-three-dots-vertical {
            font-size: 19px;
            color: #444746;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .recent-form-meta-data .operations .bi-three-dots-vertical:hover {
            background-color: #DADCE0;
        }

        .account-control-panel {
            position: absolute;
            right: 0;
            top: 50px;
            width: 412px;
            /* height: calc(100vh - 90px); */
            height: auto;
            background-color: #E9EEF6;
            border-radius: 25px;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
            padding: 15px;
            display: none;
            flex-direction: column;
            align-items: center;
            overflow-y: auto;
        }

        .account-control-panel .email {
            margin: 5px;
            text-align: center;
            font-size: 14px;
            font-weight: 600;
        }

        .account-control-panel .pp {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-top: 20px;
        }

        .account-control-panel .hello-user {
            font-size: 22px;
            font-weight: 400;
            margin-top: 10px;
        }

        .account-control-panel button {
            margin-bottom: 20px;
            margin-top: 15px;
            padding: 9px 23px;
            background-color: transparent;
            border: 1px solid #747775;
            font-size: 14px;
            border-radius: 20px;
            color: #0B57D0;
            cursor: pointer;
            font-weight: 600;
        }

        .account-control-panel button:hover {
            background-color: #D8E2F3;
        }

        .account-control-panel section {
            width: 100%;
            margin-bottom: 4px;
        }

        .account-control-panel .logout {
            padding: 15px 20px;
            width: 100%;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 20px;
            background-color: #F8FAFD;
            color: #444746;
            font-weight: 500;
        }

        .account-control-panel .logout:hover {
            background-color: #DCE1E8;
        }

        .account-control-panel .logout i {
            font-size: 19px;
        }


        .account-control-panel .logout span {
            font-size: 14px;
        }


        .account-control-panel::-webkit-scrollbar {
            width: 8px;
        }

        .account-control-panel::-webkit-scrollbar-track {
            background: transparent;
            border-radius: 10px;
            margin: 20px;
        }

        .account-control-panel::-webkit-scrollbar-thumb {
            background: rgb(207, 205, 205);
            border-radius: 10px;
        }

        .account-control-panel::-webkit-scrollbar-thumb:hover {
            background: rgb(150, 148, 148);
        }
    </style>
</head>

<body>
    <header>
        <div class="left">
            <i class="fa-solid fa-bars"></i>
            <i class="fa-solid fa-file-lines"></i>
            <h1>Forms</h1>
        </div>
        <div class="center">
            <div class="search-bar-wrapper">
                <div class="search-bar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#5D6166" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                </div>
                <input type="text" placeholder="Search">
            </div>
        </div>
        <div class="right">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-grid-3x3-gap-fill" viewBox="0 0 16 16">
                <path d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z" />
            </svg>
            <span id="head-user-pointer" class="no-copy">S</span>
            <div class="account-control-panel no-copy">
                <p class="email">ozgurvurgun35@gmail.com</p>
                <img class="pp" src="/assets/images/o-192x192.png" alt="">
                <p class="hello-user">Hello Özgür!</p>
                <button>Manage Smart account</button>
                <section>
                    <a class="logout" href="/logout">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                </section>
                <section>
                    <a class="logout" href="#">
                        <i class="bi bi-book"></i>
                        <span>Terms of service</span>
                    </a>
                </section>
                <section>
                    <a class="logout" href="#">
                        <i class="bi bi-lock"></i>
                        <span>Privacy policy</span>
                    </a>
                </section>
            </div>
        </div>
    </header>

    <div class="ready-forms-wrapper">
        <div class="container">
            <div class="ready-forms-header">
                <p>Start preparing a new form</p>
            </div>
            <div class="ready-forms">
                <section>
                    <a href="/forms/7456b96f-69c1-4a1a-9d22-21e52f23c8d7">
                        <img src="/assets/images/forms-blank-googlecolors.png">
                        <p>Blank Form</p>
                    </a>
                </section>
                <section>
                    <img src="https://ssl.gstatic.com/docs/templates/thumbnails/1kK-D_Syihl0av8BA-Z985uKvZuPV1R5L8Jp0g-Gt770_400_1.png">
                    <p>Contact Information</p>
                </section>
                <section>
                    <img src="https://ssl.gstatic.com/docs/templates/thumbnails/1bV8D98HLp_81olzEVBYSsuT1fOr7LOW-2gUB5bYvtEw_400_1.png">
                    <p>Event RSVP Form</p>
                </section>
                <section>
                    <img src="https://ssl.gstatic.com/docs/templates/thumbnails/1QyTZ8dC6QFSJvrUTppon-V2alvr00RdlC11LQvGUnbA_400_1.png">
                    <p>Party Invitation</p>
                </section>
                <section>
                    <img src="https://ssl.gstatic.com/docs/templates/thumbnails/1ydU1kMnIIVi8OxFdr_cO1crNO2W34tIPY5NsdnOcZ9s_400_1.png">
                    <p>T-Shirt Request Form</p>
                </section>
                <section>
                    <img src="https://ssl.gstatic.com/docs/templates/thumbnails/1lwQYxknXHbWnsNDynvGu01c9dwJ6ikPCRZh22Sq1sY0_400_1.png">
                    <p>Event Registration Form</p>
                </section>
            </div>
        </div>
    </div>

    <div class="recent-forms-wrapper">
        <div class="container">
            <div class="recent-forms-header">
                <p>Recent forms</p>
            </div>
            <div class="recent-forms">
                <section>
                    <img src="/assets/images/unnamed.png">
                    <div class="recent-form-meta-data">
                        <p class="form-name">Blank Form</p>
                        <div class="operations">
                            <span>
                                <i class="bi bi-list-ul"></i>
                                <p class="opening-date">Açılma 21:31</p>
                            </span>
                            <i class="bi bi-three-dots-vertical"></i>
                        </div>
                    </div>
                </section>
                <section>
                    <img src="/assets/images/unnamed (1).png">
                    <div class="recent-form-meta-data">
                        <p class="form-name">Blank Form</p>
                        <div class="operations">
                            <span>
                                <i class="bi bi-list-ul"></i>
                                <p class="opening-date">Açılma 21:31</p>
                            </span>
                            <i class="bi bi-three-dots-vertical"></i>
                        </div>
                    </div>
                </section>
                <section>
                    <img src="/assets/images/unnamed (2).png">
                    <div class="recent-form-meta-data">
                        <p class="form-name">Blank Form</p>
                        <div class="operations">
                            <span>
                                <i class="bi bi-list-ul"></i>
                                <p class="opening-date">Açılma 21:31</p>
                            </span>
                            <i class="bi bi-three-dots-vertical"></i>
                        </div>
                    </div>
                </section>
                <section>
                    <img src="/assets/images/unnamed (3).png">
                    <div class="recent-form-meta-data">
                        <p class="form-name">Blank Form</p>
                        <div class="operations">
                            <span>
                                <i class="bi bi-list-ul"></i>
                                <p class="opening-date">Açılma 21:31</p>
                            </span>
                            <i class="bi bi-three-dots-vertical"></i>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script src="/assets/js/components/ToggleVisibility.js"></script>
    <script>
        new ToggleVisibility([{
            selector: "#head-user-pointer",
            mode: "toggle"
        }], ".account-control-panel", [], "flex", []);
    </script>
</body>

</html>