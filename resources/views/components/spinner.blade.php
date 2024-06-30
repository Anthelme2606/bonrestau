
    <div id="spinner">
        <div class="rounded-spin"></div>
        <img class="spin-img" src="../../assets/images/logo-bonr.png" alt="Loading...">
    </div>

   

    <script>
        // Show the spinner and start the timeout
        document.querySelector('.content-global').style.display='none';
        function spin() {
            document.getElementById("spinner").style.display = "block";
        }

        // Call the spin function initially to show the spinner
        spin();

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("spinner").style.display = "none";
            document.querySelector(".content-global").style.display = "block";
})
        
    </script>

    <style>
        #spinner {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 9999;
        }

        .rounded-spin {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(245, 251, 252, 1);
            position: absolute;
            top: 0;
            left: 0;
            animation: spin 1s linear infinite;
        }

        .spin-img {
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

