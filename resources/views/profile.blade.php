<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Card - Cool Blue</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: #0b132b;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            overflow: hidden;
            position: relative;
        }

        .bg-shape {
            position: absolute;
            filter: blur(60px);
            border-radius: 50%;
            z-index: 0;
            animation: floatShape 8s infinite alternate ease-in-out;
        }

        .shape-1 {
            width: 320px;
            height: 320px;
            background: rgba(0, 180, 216, 0.35);
            top: -60px;
            left: -60px;
        }

        .shape-2 {
            width: 280px;
            height: 280px;
            background: rgba(112, 144, 255, 0.25);
            bottom: -60px;
            right: -60px;
            animation-delay: -4s;
        }

        @keyframes floatShape {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(35px, 45px) scale(1.1); }
        }

        .card-container {
            perspective: 1000px;
            z-index: 1;
            width: 100%;
            max-width: 370px;
        }

        .profile-card {
            background: rgba(23, 42, 69, 0.65);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-radius: 30px;
            padding: 35px 28px;
            border: 1px solid rgba(144, 224, 239, 0.25);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.4),
                inset 0 0 0 1px rgba(255, 255, 255, 0.1);
            text-align: center;
            position: relative;
            cursor: pointer;
            transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.4s ease;
            transform-style: preserve-3d;
        }

        .profile-card:hover {
            transform: translateY(-10px) rotateX(4deg) rotateY(-2deg);
            box-shadow: 0 30px 60px rgba(0, 180, 216, 0.25);
        }

        .tag-status {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(0, 180, 216, 0.15);
            color: #90e0ef;
            border: 1px solid rgba(144, 224, 239, 0.3);
            font-size: 0.7rem;
            font-weight: 800;
            padding: 6px 14px;
            border-radius: 20px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .avatar-wrapper {
            position: relative;
            width: 110px;
            height: 110px;
            margin: 10px auto 20px;
        }

        .avatar-wrapper::before {
            content: '';
            position: absolute;
            top: -6px; left: -6px; right: -6px; bottom: -6px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0077b6, #00b4d8);
            z-index: -1;
            animation: pulseGlow 3s infinite alternate;
        }

        @keyframes pulseGlow {
            0% { transform: scale(0.98); opacity: 0.7; }
            100% { transform: scale(1.05); opacity: 1; }
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ffffff;
            background: #0b132b;
        }

        .info-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 20px;
        }

        .info-box {
            background: rgba(11, 19, 43, 0.6);
            border: 1px solid rgba(144, 224, 239, 0.2);
            padding: 14px 18px;
            border-radius: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .info-box:hover {
            background: rgba(11, 19, 43, 0.85);
            border-color: #00b4d8;
            transform: scale(1.02);
        }

        .info-box::after {
            content: 'Salin';
            position: absolute;
            right: -50px;
            background: #0077b6;
            color: #fff;
            font-size: 0.65rem;
            font-weight: 700;
            padding: 4px 8px;
            border-radius: 8px;
            transition: right 0.3s ease;
        }

        .info-box:hover::after {
            right: 12px;
        }

        .info-text {
            text-align: left;
        }

        .info-label {
            display: block;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #90e0ef;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .info-value {
            font-size: 1rem;
            color: #ffffff;
            font-weight: 800;
        }

        .badge-kelas {
            background: linear-gradient(135deg, #0077b6, #00b4d8);
            color: #ffffff;
            padding: 4px 12px;
            border-radius: 10px;
            font-size: 0.85rem;
            box-shadow: 0 4px 10px rgba(0, 180, 216, 0.3);
        }

        #toast {
            visibility: hidden;
            min-width: 200px;
            background-color: #0077b6;
            color: #fff;
            text-align: center;
            border-radius: 20px;
            padding: 10px 16px;
            position: fixed;
            z-index: 10;
            bottom: 30px;
            font-size: 0.85rem;
            font-weight: 600;
            opacity: 0;
            transition: opacity 0.3s, bottom 0.3s;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }

        #toast.show {
            visibility: visible;
            opacity: 1;
            bottom: 50px;
        }
    </style>
</head>
<body>

    <div class="bg-shape shape-1"></div>
    <div class="bg-shape shape-2"></div>

    <div class="card-container">
        <div class="profile-card" id="card">
            <span class="tag-status"> Tugas 2 :> </span>

            <div class="avatar-wrapper">
                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $nama ?: 'Irma' }}&backgroundColor=0b132b" alt="Avatar" class="avatar-img">
            </div>

            <div class="info-container">
                <div class="info-box" onclick="copyText('{{ $nama ?: 'Irma Nurhayati' }}')">
                    <div class="info-text">
                        <span class="info-label">Nama Lengkap</span>
                        <span class="info-value">{{ $nama ?: 'Irma Nurhayati' }}</span>
                    </div>
                </div>

                <div class="info-box" onclick="copyText('{{ $kelas ?: 'A' }}')">
                    <div class="info-text">
                        <span class="info-label">Kelas Praktikum</span>
                        <span class="info-value">
                            <span class="badge-kelas">Kelas {{ $kelas ?: 'A' }}</span>
                        </span>
                    </div>
                </div>

                <div class="info-box" onclick="copyText('{{ $NPM ?: '2417052001' }}')">
                    <div class="info-text">
                        <span class="info-label">NPM</span>
                        <span class="info-value">{{ $NPM ?: '2417052001' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="toast">Data berhasil disalin! 📋</div>

    <script>
        function copyText(text) {
            navigator.clipboard.writeText(text);
            var toast = document.getElementById("toast");
            toast.className = "show";
            setTimeout(function(){ toast.className = toast.className.replace("show", ""); }, 2000);
        }

        const card = document.getElementById('card');
        document.addEventListener('mousemove', (e) => {
            let xAxis = (window.innerWidth / 2 - e.pageX) / 25;
            let yAxis = (window.innerHeight / 2 - e.pageY) / 25;
            card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
        });

        document.addEventListener('mouseleave', () => {
            card.style.transform = `rotateY(0deg) rotateX(0deg)`;
        });
    </script>

</body>
</html>