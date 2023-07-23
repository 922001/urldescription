<?php
$conn = mysqli_connect("localhost", "root", "", "creslms");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>
    <title>Hello, world!</title>

    <style>
        @keyframes growProgressBar {

            0%,
            33% {
                --pgPercentage: 0;
            }

            100% {
                --pgPercentage: var(--value);
            }
        }

        @property --pgPercentage {
            syntax: '<number>';
            inherits: false;
            initial-value: 0;
        }

        div[role="progressbar"] {
            --size: 12rem;
            --fg: #369;
            --bg: #def;
            --pgPercentage: var(--value);
            animation: growProgressBar 3s 1 forwards;
            width: var(--size);
            height: var(--size);
            border-radius: 50%;
            display: grid;
            place-items: center;
            background:
                radial-gradient(closest-side, white 80%, transparent 0 99.9%, white 0),
                conic-gradient(var(--fg) calc(var(--pgPercentage) * 1%), var(--bg) 0);
            font-family: Helvetica, Arial, sans-serif;
            font-size: calc(var(--size) / 5);
            color: var(--fg);
        }

        div[role="progressbar"]::before {
            counter-reset: percentage var(--value);
            content: counter(percentage);
        }

        /* demo */
        body {
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .chart-container {
            box-sizing: border-box;
            width: 950px;
            margin: 50px;
            padding: 20px;
            border: 2px solid black;
        }

        .chart-box {
            display: inline-block;
            box-sizing: border-box;
            margin: 20px;
            width: 250px;
            height: 350px;
            padding: 20px;
            box-shadow: 2px 2px 10px white;
            align-items: center;
            background-color: white;
            box-shadow: 2px 2px 20px black;
            align-items: center;
        }

        .chart-box p {
            font-size: large;
            margin-left: 20px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="chart-container">
        <div class="chart-box">
            <div class="chart" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"
                style="--value:11"></div>
            <p>Student registered</p>

        </div>
        <div class="chart-box">
            <div class="chart" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"
                style="--value:95"></div>
            <p>Student registered</p>
        </div>
        <div class="chart-box">
            <div class="chart" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"
                style="--value:65"></div>
            <p>Student registered</p>
        </div>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>