<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Code Verification</title>
    <style type="text/css">
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
            box-sizing: border-box;
            text-align: center;
        }

        h3 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .otc {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .otc fieldset {
            border: none;
            padding: 0;
            margin: 0;
        }

        .otc legend {
            color: #333;
            font-size: 25px;
            margin-bottom: 20px;
        }

        /* Style for input fields */
        input[type="number"] {
            width: 30px;
            height: 30px;
            margin: 5px;
            font-size: 24px;
            text-align: center;
            border: 2px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            outline: none;
            transition: border 0.3s ease;
        }

        input[type="number"]:focus {
            border-color: #007BFF;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Animation for inputs */
        input[type="number"] {
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        /* Media query for small devices */
        @media (max-width: 600px) {
            .otc div {
                display: flex;
                justify-content: space-between; /* Align inputs horizontally */
                flex-wrap: wrap; /* Allow inputs to wrap to next line on very small screens */
                gap: 10px; /* Add some space between inputs */
            }

            input[type="number"] {
                width: 30px; /* Slightly smaller width for small devices */
                height: 30px;
            }

            button {
                width: 100%; /* Make the button full-width on small devices */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ URL::to('/') }}/mainHomePage/img/new_logo.png" alt="cool" style="width:200px;height: 50px;margin-bottom: 20px;">
        <form class="otc" method="POST" action="{{ url('/verify_code') }}/{{ $email }}/{{ $code }}">
            @csrf
            <fieldset>
                <legend>Validation Code</legend>
                <div>
                    <input type="number" name="code[]" required maxlength="1" autofocus>
                    <input type="number" name="code[]" required maxlength="1">
                    <input type="number" name="code[]" required maxlength="1">
                    <input type="number" name="code[]" required maxlength="1">
                    <input type="number" name="code[]" required maxlength="1">
                    <input type="number" name="code[]" required maxlength="1">
                </div>
                @if(session('error'))
                    <div class="error-message">{{ session('error') }}</div>
                @endif
            </fieldset>
            <button type="submit">Verify</button>
        </form>
    </div>

    <script type="text/javascript">
        let in1 = document.getElementById('otc-1'),
            ins = document.querySelectorAll('input[type="number"]'),
            splitNumber = function(e) {
                let data = e.data || e.target.value;
                if (!data) return;
                if (data.length === 1) return;
                
                popuNext(e.target, data);
            },
            popuNext = function(el, data) {
                el.value = data[0];
                data = data.substring(1);
                if (el.nextElementSibling && data.length) {
                    popuNext(el.nextElementSibling, data);
                }
            };

        ins.forEach(function(input) {
            input.addEventListener('keyup', function(e){
                if (e.keyCode === 16 || e.keyCode == 9 || e.keyCode == 224 || e.keyCode == 18 || e.keyCode == 17) {
                     return;
                }

                if ((e.keyCode === 8 || e.keyCode === 37) && this.previousElementSibling && this.previousElementSibling.tagName === "INPUT") {
                    this.previousElementSibling.select();
                } else if (e.keyCode !== 8 && this.nextElementSibling) {
                    this.nextElementSibling.select();
                }

                if (e.target.value.length > 1) {
                    splitNumber(e);
                }
            });

            input.addEventListener('focus', function(e) {
                if (this === in1) return;

                if (in1.value == '') {
                    in1.focus();
                }

                if (this.previousElementSibling.value == '') {
                    this.previousElementSibling.focus();
                }
            });
        });

        in1.addEventListener('input', splitNumber);
    </script>
</body>
</html>
