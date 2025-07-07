<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            text-decoration: none;
            font-family: "Open Sans", sans-serif;
        }

        header {
            height: 90px;
            border-bottom: 3px solid #E0E0E0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        main {
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 20px;
            background-color: #F0EBF8;
            min-height: calc(100vh - 90px);
            padding-top: 10px;
            position: relative;
        }

        main>.forms {
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 20px;
            position: relative;
        }

        main>.forms>.form-side-toolbar {
            padding: 15px 0;
            width: 50px;
            height: auto;
            background-color: #fff;
            position: absolute;
            top: 0px;
            right: -60px;
            border-radius: 8px;
            border: 2px solid #E0E0E0;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            transition: top 0.3s ease;
        }

        main>.forms>.form-side-toolbar>i:hover {
            background-color: #E0E0E0;
        }

        main>.forms>.form-side-toolbar>i {
            color: #5F6368;
            padding: 8px;
            font-size: 19px;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            cursor: pointer;
            border-radius: 50%;
        }

        main>.forms>section {
            width: 700px;
            height: 120px;
            position: relative;
        }

        main>.forms>section>.top-line {
            height: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            width: 100%;
            background-color: #673AB7;
        }

        main>.forms>section>.form {
            height: 100%;
            border: 2px solid #E0E0E0;
            border-top: none;
            border-bottom-right-radius: 8px;
            border-bottom-left-radius: 8px;
            padding: 17px;
            background-color: #ffffff;
        }

        main>.forms>section>.form>.form-header {
            width: 100%;
            font-weight: 400;
            font-size: 31px;
            outline: none;
            padding: 12px 0;
            position: relative;
        }

        main>.forms>section>.form>.form-header:focus::before {
            background-color: #673AB7;
            width: 100%;
        }

        main>.forms>section>.form>.form-header::after {
            content: "";
            position: absolute;
            bottom: 0px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            height: 0.8px;
            background-color: #E0E0E0;
        }

        main>.forms>section>.form>.form-header::before {
            content: "";
            position: absolute;
            bottom: -1.4px;
            left: 50%;
            transform: translateX(-50%);
            width: 0%;
            height: 2px;
            background-color: transparent;
            transition: 0.3s ease width;
            z-index: 1;
        }
    </style>
</head>

<body>
    <header>
        <h2>SmartLab Form Builder Header</h2>
    </header>
    <main>
        <div class="forms">
            <div class="form-side-toolbar">
                <i class="bi bi-plus-circle"></i>
                <i class="bi bi-file-earmark-arrow-down"></i>
                <i class="bi bi-fonts"></i>
                <i class="bi bi-pen"></i>
            </div>
            <section>
                <div class="top-line"></div>
                <div class="form">
                    <h1 contenteditable="true" class="form-header">
                        Untitled form
                    </h1>
                </div>
            </section>
            <section>
                <div class="top-line"></div>
                <div class="form">
                    <h1 contenteditable="true" class="form-header">
                        Untitled form
                    </h1>
                </div>
            </section>
        </div>
    </main>

    <script>
        document.addEventListener("click", function(e) {
            const section = e.target.closest("section");
            const toolbar = document.querySelector(".form-side-toolbar");

            if (!section || !toolbar) return;

            if (section.querySelector(".form")) {
                const offsetTop = section.offsetTop;
                toolbar.style.top = `${offsetTop}px`;
            }
        });

        async function checkForUpdates() {
            try {
                const res = await fetch('/check-update');
                const html = await res.text();
                if (html.trim() !== '') {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    document.head.innerHTML = doc.head.innerHTML;
                    document.body.innerHTML = doc.body.innerHTML;
                    console.log("Tüm sayfa güncellendi!");
                }
            } catch (err) {
                console.error("Güncelleme hatası:", err);
            }
        }
        setInterval(checkForUpdates, 200);
    </script>

</body>

</html>