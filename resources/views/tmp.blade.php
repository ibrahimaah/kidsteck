<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kid's Progress</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            text-align: center;
            background-color: #ffebcd;
            padding: 20px;
        }
        .progress-container, .points-container {
            padding: 20px;
            background: #fff8dc;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border: 4px solid #ffcc00;
            margin-bottom: 30px;
        }
        h2 {
            color: #ff6600;
            font-size: 24px;
        }
        h3 {
            color: #ff4500;
        }
        .progress-bar {
            height: 25px;
            background: #ffcc99;
            border-radius: 15px;
            overflow: hidden;
            border: 3px solid #ff6600;
        }
        .progress-fill {
            height: 100%;
            background: #ff4500;
        }
        .story-parts {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .part {
            width: 120px;
            height: 120px;
            background: #ffd700;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            margin: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            text-shadow: 2px 2px 2px #000;
            border: 3px solid #ff6600;
            position: relative;
        }
        .part.unlocked {
            background: #32cd32;
        }
        .part.locked {
            background: #d3d3d3;
            color: #777;
        }
        .part.locked::after {
            content: '\1F512';
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 24px;
        }
        .part.watched {
            background: #32cd32; /* Green for watched */
        }
        .part.quiz-completed {
            background: #ffd700; /* Gold for quiz completed */
        }
        .status-icons {
            font-size: 22px;
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="progress-container text-center">
            <h2>🎉 Kid's Progress 🎈</h2>
        </div>
        
        <div class="points-container text-center">
            ⭐ Points Earned: <span id="points">150</span>
        </div>

        <div class="progress-container">
            <h3>📖 Story 1</h3>
            <p>Story Progress 📖: <span id="story1-progress">60%</span></p>
            <p>Quiz Progress ✅: <span id="story1-quiz-progress">40%</span></p>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 60%;"></div>
            </div>
            <div class="story-parts">
                <div class="part watched">
                    🌟 Part 1 
                    <span class="status-icons">👀</span>
                </div>
                <div class="part quiz-completed">
                    🌟 Part 2 
                    <span class="status-icons">👀✔️</span>
                </div>
                <div class="part watched">
                    🌟 Part 3 
                    <span class="status-icons">👀</span>
                </div>
                <div class="part locked">🔒 Part 4</div>
                <div class="part locked">🔒 Part 5</div>
            </div>
        </div>

        <div class="progress-container">
            <h3>📖 Story 2</h3>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 40%;"></div>
            </div>
            <div class="story-parts">
                <div class="part unlocked">🌟 Part 1</div>
                <div class="part unlocked">🌟 Part 2</div>
                <div class="part locked">🔒 Part 3</div>
                <div class="part locked">🔒 Part 4</div>
                <div class="part locked">🔒 Part 5</div>
            </div>

            
        </div>

        <div class="progress-container">
            <h3>🕒 Session Details</h3>
            <p>Login Time: <span id="login-time">--:--:--</span></p>
            <p>Logout Time: <span id="logout-time">--:--:--</span></p>
            <p>Time Spent: <span id="time-spent">0</span> seconds</p>
        </div>
    </div>
    <script>
        let loginTime = new Date();
        document.getElementById("login-time").textContent = loginTime.toLocaleTimeString();
        
        let timeSpent = 0;
        setInterval(() => {
            timeSpent++;
            document.getElementById("time-spent").textContent = timeSpent;
        }, 1000);

        window.addEventListener("beforeunload", function() {
            let logoutTime = new Date();
            localStorage.setItem("logoutTime", logoutTime.toLocaleTimeString());
        });
        
        window.addEventListener("load", function() {
            let storedLogoutTime = localStorage.getItem("logoutTime");
            if (storedLogoutTime) {
                document.getElementById("logout-time").textContent = storedLogoutTime;
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
