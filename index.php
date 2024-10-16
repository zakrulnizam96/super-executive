<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Executive Podcast</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Body Styling */
        body {
            background-color: #1e1e1e;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        /* Main Container */
        .container {
            max-width: 800px;
            margin-top: 40px;
            border-radius: 10px;
            overflow: hidden;
            background-color: #292929;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Header Image */
        .header-image {
            width: 100%;
            height: 400px;
            background-image: url('se.png'); /* Replace with your podcast cover image URL */
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }

        /* Soundwave Overlay */
        .soundwave {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .soundwave::before {
            content: '';
            width: 100px;
            height: 100px;
            border: 5px solid #1db954;
            border-radius: 50%;
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(1.5);
                opacity: 0;
            }
        }

        /* Podcast Details */
        .details {
            padding: 20px;
        }

        .title {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .listeners {
            color: #7f7f7f;
            margin-bottom: 20px;
        }

        /* Play Button */
        .play-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 1em;
            color: #fff;
            background-color: #1db954;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .play-button:hover {
            background-color: #1aa34a;
        }

        /* Episode List */
        .episode-list {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        .episode-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-top: 1px solid #3a3a3a;
        }

        .episode-item:first-child {
            border-top: none;
        }

        .episode-title {
            font-size: 1.1em;
        }

        .episode-time {
            color: #7f7f7f;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #292929;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: #fff;
        }

        .modal-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #1db954;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .modal-button:hover {
            background-color: #1aa34a;
        }
        
        /* CSS for the pop-up */
        #buyerPopup {
            position: fixed;
            top: 10px;
            left: -300px; /* Start off-screen */
            background-color: yellow;
            color: black;
            padding: 10px;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            z-index: 1000;
            animation: slideIn 2s forwards;
            display: none;
        }

        /* Animation for sliding in */
        @keyframes slideIn {
            0% { left: -300px; }
            100% { left: 10px; }
        }
    </style>
</head>
<body>
    <div id="buyerPopup"></div>
    <div class="container">
        <!-- Header Image -->
        <div class="header-image">
            <div class="soundwave" id="soundwave"></div>
        </div>

        <!-- Podcast Details -->
        <div class="details">
            <h1 class="title">Super Executive Podcast</h1>
           <small class="listeners">⚡️Capai kejayaan dunia koperat sepantas kilat⚡️</small><br>
           <small class="listeners">By Boss Nizam</small>

            <!-- Episode List -->
            <ul class="episode-list">
                <li class="episode-item">
                    <span class="episode-title">Intro</span>
                    <span class="episode-time">02:01</span>
                </li>
                <li class="episode-item">
                    <span class="episode-title">Episode 1 : Pentingnya SPM</span>
                    <span class="episode-time">08:11</span>
                </li>
                <li class="episode-item">
                    <span class="episode-title">Episode 2 : Struggle Siswa</span>
                    <span class="episode-time">11:41</span>
                </li>
                <li class="episode-item">
                    <span class="episode-title">Episode 3 : Hala tuju Graduan</span>
                    <span class="episode-time">09:20</span>
                </li>
                <li class="episode-item">
                    <span class="episode-title">Episode 4 : Super Executive</span>
                    <span class="episode-time">12:27</span>
                </li>
                <li class="episode-item">
                    <span class="episode-title">Episode 5: Alpha Manager</span>
                    <span class="episode-time">12:37</span>
                </li>
            </ul>

            <!-- Play Buttons -->
            <button class="play-button" onclick="playDemo()">Play Demo</button>
            <a class="play-button" href="https://toyyibpay.com/Super-Executive-Podcast">Purchase Podcast</a>
        </div>
    </div>

    <!-- Audio Element -->
    <audio id="podcast-audio" src="intro.m4a"></audio> <!-- Replace with your audio file URL -->

    <!-- Modal Box -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <h2>Get Full Access</h2>
            <p>To continue listening, please purchase the full podcast.</p><br>
            <a href="https://toyyibpay.com/Super-Executive-Podcast" class="modal-button">Buy Now</a>
        </div>
    </div>

    <script>
        function playDemo() {
            const soundwave = document.getElementById('soundwave');
            const audio = document.getElementById('podcast-audio');
            const modal = document.getElementById('modal');

            // Toggle soundwave visibility
            soundwave.style.opacity = 1;

            // Play audio
            audio.play();

            // Stop audio after 30 seconds and show modal
            setTimeout(() => {
                audio.pause();
                soundwave.style.opacity = 0;
                modal.style.display = 'flex';
            }, 30000); // 30000 milliseconds = 30 seconds

            // When the audio ends, hide the soundwave
            audio.onended = () => {
                soundwave.style.opacity = 0;
            };
        }
    </script>
    <script>
    // List of random buyer names
    const buyerNames = ["S***l", "A***a", "M***i", "N***m", "Z***r", "F***h", "L***a", "D***a"];
    
    // Function to display a random buyer pop-up
    function showBuyerPopup() {
        const buyerPopup = document.getElementById("buyerPopup");
        const randomName = buyerNames[Math.floor(Math.random() * buyerNames.length)];
        buyerPopup.innerHTML = randomName + " telah membeli Super Executive Podcast";
        
        // Display the pop-up
        buyerPopup.style.display = "block";

        // Hide the pop-up after 5 seconds
        setTimeout(() => {
            buyerPopup.style.display = "none";
        }, 5000);
    }

    // Show the pop-up every 10 seconds
    setInterval(showBuyerPopup, 10000);
</script>
</body>
</html>
