<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Dancing+Script:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Playfair Display', serif;
            background: '#fff';
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .invitation-card {
            width: 580px;
            height: 100vh;
            min-height: 100vh;
            max-height: 100vh;
            background: '#fff';
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .floral-container {
            position: absolute;
            inset: 0;
            /* full parent */
            display: flex;
            flex-direction: column;
            /* atas ke bawah */
            justify-content: space-between;
            /* mojok atas & bawah */
            pointer-events: none;
            min-height: 100vh;
            height: auto;
            z-index: 1;
        }

        .floral-top {
            background-image: url('<?= base_url('image/flower.png') ?>');
            background-repeat: no-repeat;
            background-position: top center;
            background-size: 100%;
            height: 250px;
            /* sesuaikan tinggi floral */
        }

        .floral-bottom {
            background-image: url('<?= base_url('image/flower.png') ?>');
            background-repeat: no-repeat;
            background-position: bottom center;
            position: absolute;
            bottom: 0;
            width: 100%;
            left: 0;
            background-size: 100%;
            transform: rotate(180deg);
            height: 180px;
        }

        .content {
            position: relative;
            z-index: 10;
            text-align: center;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }

        .wedding-title {
            font-size: 16px;
            color: #6c757d;
            margin-top: 10px;
            margin-bottom: 10px;
            font-weight: 400;
            font-style: italic;
        }

        .couple-names {
            font-size: 36px;
            font-weight: 700;
            background-image: url('<?= base_url('image/title.png') ?>');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            margin-bottom: 30px;
            line-height: 1.2;
            width: auto;
            height: auto;
            min-height: 120px;
            min-width: 100%;
        }

        .couple-names .ampersand {
            font-family: 'Dancing Script', cursive;
            font-size: 32px;
            color: #a8b8d8;
            margin: 0 10px;
        }

        .guest-section {
            margin: 40px 0;
        }

        .dear {
            font-size: 16px;
            color: #6c757d;
            margin-bottom: 10px;
            font-style: italic;
        }

        .guest-name {
            font-family: 'Dancing Script', cursive;
            font-size: 24px;
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .apology {
            font-size: 12px;
            color: #9ca3af;
            font-style: italic;
            line-height: 1.4;
        }

        .open-button {
            background-image: url('<?= base_url('image/button.png') ?>');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: auto;
            height: auto;
            min-height: 60px;
            min-width: 100%;
            /* biar fleksibel */
            box-shadow: 0 5px 15px rgba(168, 184, 216, 0.4);
        }

        .open-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(168, 184, 216, 0.6);
        }

        .open-button::before {
            margin-right: 8px;
            font-size: 16px;
        }

        .decorative-divider {
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, #a8b8d8 50%, transparent 100%);
            margin: 20px auto;
        }

        .cover-page {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
            background: '#fff';
            transition: transform 1s ease-out, opacity 1s ease-out;
        }

        .cover-page.slide-out {
            transform: translateY(-100%);
            opacity: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .content>* {
            animation: fadeIn 0.8s ease-out forwards;
        }

        .content>*:nth-child(2) {
            animation-delay: 0.2s;
        }

        .content>*:nth-child(3) {
            animation-delay: 0.4s;
        }

        .content>*:nth-child(4) {
            animation-delay: 0.6s;
        }

        .content>*:nth-child(5) {
            animation-delay: 0.8s;
        }

        .main-page {
            min-height: 100vh;
            height: 100%;
            background: linear-gradient(135deg, #f8f9fc 0%, #e9ecef 100%);
            opacity: 0;
            transform: translateY(50px);
            transition: all 1s ease-out;
            display: none;
        }

        .main-page.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .main-container {
            width: 580px;
            position: relative;
            background: white;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            overflow-x: hidden;
            overflow-y: auto;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .main-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: -25px;
            /* jarak dari container */
            width: 50px;
            /* lebar gambar dekor */
            height: 100%;
            background: url("image/decor-left.png") repeat-y center;
            background-size: contain;
            z-index: 0;
        }

        /* Dekor kanan */
        .main-container::after {
            content: "";
            position: absolute;
            top: 0;
            right: -25px;
            /* jarak dari container */
            width: 50px;
            height: 100%;
            background: url("image/decor-right.png") repeat-y center;
            background-size: contain;
            z-index: 0;
        }

        .header-section {
            background: linear-gradient(135deg, #a8b8d8, #d4a574);
            color: white;
            padding: 60px 40px;
            text-align: center;
            position: relative;
        }

        .main-couple-names {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .main-couple-names .ampersand {
            font-family: 'Dancing Script', cursive;
            font-size: 40px;
            margin: 0 15px;
        }

        .wedding-date {
            font-size: 20px;
            font-weight: 400;
            opacity: 0.9;
        }

        .details-section {
            padding: 50px 40px;
        }

        .event-detail {
            margin-bottom: 40px;
            text-align: center;
            padding: 30px;
            border-radius: 15px;
            background: linear-gradient(135deg, #f8f9fc, #ffffff);
            border: 1px solid #e9ecef;
        }

        .event-title {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .event-time {
            font-size: 18px;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .event-location {
            font-size: 16px;
            color: #495057;
            line-height: 1.5;
        }

        .map-button {
            background: linear-gradient(135deg, #a8b8d8, #d4a574);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 20px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 15px;
            transition: all 0.3s ease;
        }

        .map-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(168, 184, 216, 0.4);
        }

        .rsvp-section {
            background: linear-gradient(135deg, #f8f9fc, #ffffff);
            padding: 40px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }

        .rsvp-title {
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .rsvp-message {
            font-size: 16px;
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .rsvp-button {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .rsvp-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
        }

        .footer-message {
            text-align: center;
            padding: 30px;
            font-style: italic;
            color: #6c757d;
            background: #f8f9fc;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .invitation-card {
                width: 100vw;
                height: auto;
                min-height: 100vh;
            }

            .content {
                padding: 40px 30px;
            }

            .couple-names {
                font-size: 28px;
            }

            .guest-name {
                font-size: 20px;
            }

            .main-container {
                border-radius: 0;
                width: 100vw;
                overflow-x: hidden;
            }
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* SECTION 1 */

        .section-title {
            display: inline-block;
            font-size: 18px;
            font-weight: bold;
            padding: 4px 10px;
            color: #665d4a;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .groom,
        .bride {
            font-size: 20px;
            font-weight: bold;
            margin: 10px 0;
        }

        .parents {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }

        .ampersand {
            font-size: 32px;
            font-family: cursive;
            color: #444;
            margin: 20px 0;
        }

        .divider {
            margin: 25px auto;
            width: 40px;
            height: 40px;
            position: relative;
        }

        .divider::before,
        .divider::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #7a6f5d;
            margin: auto;
        }

        .divider::before {
            left: 12px;
        }

        .divider::after {
            right: 12px;
        }

        .quote {
            font-size: 14px;
            font-style: italic;
            margin: 20px auto;
            max-width: 320px;
            line-height: 1.6;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .source {
            margin-top: 10px;
            font-weight: bold;
            font-size: 13px;
        }

        .header-section1 {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-block: 20px;
            gap: 10px;
            flex-direction: column;
            min-height: 95vh;
            max-height: 95vh;
        }

        /* SECTION 2 */
        h3 {
            font-family: 'Dancing Script', cursive;
            font-size: 28px;
            color: #2f4f4f;
            margin-bottom: 10px;
        }

        .divider {
            width: 80px;
            height: 2px;
            background: #aaa;
            margin: 0 auto 20px auto;
        }

        .date {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 5px;
            letter-spacing: 2px;
        }

        .date-sub {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .events {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-bottom: 10px;
        }

        .event {
            text-align: center;
        }

        .event-title {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .event-time {
            font-size: 14px;
            color: #555;
        }

        .countdown {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin: 10px 0 20px 0;
        }

        .time-box {
            text-align: center;
        }

        .time-box .num {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 3px;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            border: 1px solid #a084ca;
            border-radius: 6px;
            background: #fff;
            color: #2c2c2c;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #a084ca;
            color: #fff;
        }

        .location {
            margin: 40px 0 20px;
        }

        .location-title {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .location-address {
            font-size: 14px;
            color: #555;
        }

        /* Scroll Animations */
        .scroll-animate {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease-out;
        }

        .scroll-animate.animate-in {
            opacity: 1;
            transform: translateY(0);
        }

        .scroll-animate-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.8s ease-out;
        }

        .scroll-animate-left.animate-in {
            opacity: 1;
            transform: translateX(0);
        }

        .scroll-animate-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.8s ease-out;
        }

        .scroll-animate-right.animate-in {
            opacity: 1;
            transform: translateX(0);
        }

        .scroll-animate-scale {
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.8s ease-out;
        }

        .scroll-animate-scale.animate-in {
            opacity: 1;
            transform: scale(1);
        }

        .scroll-animate-fade {
            opacity: 0;
            transition: all 1s ease-out;
        }

        .scroll-animate-fade.animate-in {
            opacity: 1;
        }

        .texture-layer {
            position: absolute;
            inset: 0;
            background: url("image/bgtexture.png") repeat-y center;
            opacity: 0.8;
            /* atur kepudaran */
            pointer-events: none;
            z-index: 0;
        }

        .bubble-container {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
            /* biar gak ganggu klik */
            z-index: 1;
            /* taruh di belakang */
        }

        .bubble {
            position: absolute;
            bottom: -60px;
            background: rgba(173, 216, 230, 0.6);
            /* biru transparan */
            border-radius: 50%;
            animation: rise 16s linear infinite;
        }

        /* animasi naik */
        @keyframes rise {
            0% {
                transform: translateY(0) scale(1);
                opacity: 0.5;
            }

            20% {
                opacity: 0.8;
            }

            100% {
                transform: translateY(-100vh) scale(1.3);
                opacity: 0;
            }
        }

        /* Variasi ukuran, posisi, dan delay */
        .bubble:nth-child(1) {
            width: 20px;
            height: 20px;
            left: 10%;
            animation-duration: 12s;
            animation-delay: 0s;
        }

        .bubble:nth-child(2) {
            width: 15px;
            height: 15px;
            left: 30%;
            animation-duration: 10s;
            animation-delay: 2s;
        }

        .bubble:nth-child(3) {
            width: 25px;
            height: 25px;
            left: 50%;
            animation-duration: 14s;
            animation-delay: 4s;
        }

        .bubble:nth-child(4) {
            width: 10px;
            height: 10px;
            left: 70%;
            animation-duration: 9s;
            animation-delay: 6s;
        }

        .bubble:nth-child(5) {
            width: 18px;
            height: 18px;
            left: 90%;
            animation-duration: 11s;
            animation-delay: 1s;
        }

        .section-rsvp {
            padding: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #648cac;
        }

        .dresscode-card {
            background: transparent;
            padding: 15px 25px;
            border-radius: 10px;
            text-align: center;
            animation: fadeInUp 1s ease;
            max-width: 320px;
        }

        .dresscode-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .dresscode-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #444;
        }

        .dresscode-text {
            font-size: 16px;
            margin-bottom: 15px;
            color: #666;
        }

        .dresscode-palette {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .color-box {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .rsvp-card {
            background: #648cac;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            color: white;
            font-family: Roboto, sans-serif;

        }

        .rsvp-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .rsvp-name {
            font-size: 18px;
            font-weight: 600;
            margin: 0;
            font-family: Roboto, sans-serif;
            color: #2d3748;
        }

        .rsvp-badge {
            padding: 4px 12px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .badge-hadir {
            background-color: #038a20ff;
            color: #fff;
        }

        .badge-tidak-hadir {
            background-color: rgba(239, 68, 68, 0.9);
            color: white;
        }

        .rsvp-message {
            font-size: 14px;
            line-height: 1.5;
            color: #4a5568;
            font-weight: 400;
            margin: 0;
            font-family: Roboto, sans-serif;
        }

        /* Styling untuk container */
        #chatBox {
            max-width: 600px;
            margin: 0 auto;
            padding: 10px;
        }

        .gift-section {
            padding: 60px 0;
            color: white;
        }

        .gift-card {
            margin-bottom: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            color: #333;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 10px;
        }

        .gift-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }


        .account-number {
            font-family: 'Courier New', monospace;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
            margin: 10px 0;
        }

        .copy-btn {
            background: linear-gradient(135deg, #363a37ff, #414443ff);
            border: none;
            border-radius: 20px;
            padding: 8px 20px;
            color: white;
            font-size: 12px;
            transition: all 0.3s ease;
        }

        .copy-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 300;
            margin-bottom: 20px;
        }

        .section-title p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .gift-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.1;
        }

        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }
    </style>
</head>

<body>
    <div class="cover-page" id="coverPage">
        <div class="invitation-card">
            <div class="texture-layer"></div>
            <div class="floral-container">
                <div class="floral-top"></div>
                <div class="floral-bottom"></div>
            </div>
            <div class="content">
                <div>
                    <img src="<?= base_url('/image/flowermid.png') ?>" style="height: 100px; background-color: transparent" alt="Wedding Invitation" class="wedding-invitation">
                    <div class="wedding-title">The Wedding of</div>
                    <div class="couple-names"></div>
                </div>

                <div class="guest-section">
                    <div class="decorative-divider"></div>
                    <div class="dear">Dear</div>
                    <div class="guest-name"> <?= $guest_name ?></div>
                    <div class="apology">We apologize if there is any misspelling of name or title</div>
                    <div class="decorative-divider"></div>
                </div>

                <div>
                    <button class="open-button" onclick="openInvitation()"></button>
                </div>
            </div>
        </div>
    </div>
    <!-- MAIN INVITATION PAGE -->
    <button style="width:20px; height:20px; position:fixed; bottom:80px; right:20px; border-radius:50%; border: none; background-color: #fff; cursor: pointer; display: flex; align-items: center; justify-content: center; padding: auto; z-index: 9999" id="music-button" onclick="toggleMusic()"></button>
    <div class="main-page" id="mainPage">
        <div class="main-container">
            <div class="bubble-container">
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
            </div>

            <div class="texture-layer"></div>
            <div class="floral-container">
                <div class="floral-top"></div>
                <div class="floral-bottom"></div>
            </div>

            <!-- SECTION 1 -->
            <div class="header-section1">
                <div class="section-title scroll-animate">The Wedding of</div>

                <div class="groom scroll-animate-left">FARIZ KHOIRUL MU'ATZ, S.T.</div>
                <div class="parents scroll-animate-fade">Putra Bapak Marsudi Aman dan Ibu Hadijah</div>

                <div class="ampersand scroll-animate-scale">&</div>

                <div class="bride scroll-animate-right">MAYA TRI RAHAYU</div>
                <div class="parents scroll-animate-fade">Putri Bapak Maman Paiman dan Ibu Yayah Rokayah</div>

                <div class="divider scroll-animate"></div>

                <div class="quote scroll-animate">
                    <center>
                        And one of His signs is that He created mates for you from yourselves
                        that you may find rest in them, and He put between you love and compassion;
                        most surely there are signs in this for a people who reflect.
                    </center>
                </div>

                <div class="source scroll-animate">– QS. AR-RUM 21 –</div>
            </div>
            <div style="display: flex; justify-content: center;">
                <img src="<?= base_url('/image/flowermid.png') ?>" style="height: 100px; background-color: transparent;" alt="Wedding Invitation" class="wedding-invitation scroll-animate-scale">
            </div>

            <!-- SECTION 2 -->
            <div class="header-section1">
                <h3 class="scroll-animate">Our Special Day</h3>
                <div class="divider scroll-animate"></div>

                <div class="date scroll-animate-left">SUNDAY, 12 OCT 2025</div>
                <div class="date-sub scroll-animate-right">Minggu, 12 Oktober 2025</div>

                <div class="events scroll-animate">
                    <div class="event">
                        <div class="event-title">Solemnization of Marriage</div>
                        <div class="event-time">08.00 - 10.00 WIB</div>
                    </div>
                    <div class="event">
                        <div class="event-title">Wedding Reception</div>
                        <div class="event-time">10.00 - 15.00 WIB</div>
                    </div>
                </div>

                <div class="countdown scroll-animate-scale">
                    <div class="time-box">
                        <div class="num" id="days">91</div>
                        <div class="label">Days</div>
                    </div>
                    <div class="time-box">
                        <div class="num" id="hours">12</div>
                        <div class="label">Hours</div>
                    </div>
                    <div class="time-box">
                        <div class="num" id="minutes">26</div>
                        <div class="label">Minutes</div>
                    </div>
                    <div class="time-box">
                        <div class="num" id="seconds">20</div>
                        <div class="label">Seconds</div>
                    </div>
                </div>
                <div class="location scroll-animate">
                    <center>
                        <div class="location-title">GD. SKB TANJUNGSARI</div>
                        <div class="location-address">Jl. Raya Tanjungsari KM 18, Sumedang</div>
                    </center>
                </div>
                <button onclick="openMap()" class="btn scroll-animate">Open Maps</button>
                <div class="dresscode-section scroll-animate">
                    <div class="dresscode-card">
                        <h2 class="dresscode-title">Dress Code</h2>
                        <p class="dresscode-text">Ivory • Cream • White</p>
                        <div class="dresscode-palette">
                            <span class="color-box" style="background:#FFFFF0"></span>
                            <span class="color-box" style="background:#FFF5E1"></span>
                            <span class="color-box" style="background:#FFFFFF; border:1px solid #ddd;"></span>
                        </div>
                    </div>
                </div>

            </div>
            <!-- SECTION 3 -->
        </div>
        <div class="section-rsvp">
            <section id="rsvp" class="scroll-animate">
                <center>
                    <h2>RSVP</h2>
                    <p>Konfirmasi kehadiran Anda. Silakan isi formulir RSVP dibawah ini:</p>
                </center>
                <form id="rsvpForm">
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <input type="text" name="name" class="form-control" placeholder="Nama Anda" required>
                        <textarea type="text" name="message" class="form-control" placeholder="Ucapan" required rows="3"></textarea>
                        <select class="form-select" name="attended" required>
                            <option selected value="Hadir">Hadir</option>
                            <option value="Tidak Hadir">Tidak Hadir</option>
                        </select>
                        <button class="btn btn-primary" type="submit">Kirim</button>
                    </div>
                </form>
            </section>


            <!-- Gift Card -->
            <section style="margin-top: 20px" id="gift" class="scroll-animate">
                <center>
                    <h2>Gift</h2>
                    <p>Doa restu dari Bapak/Ibu/Saudara/i sudah lebih dari cukup bagi kami.
                        Namun jika ingin memberikan hadiah, kami menyediakan amplop digital berikut:</p>
                </center>


                <section class="gift-section ">
                    <div class="container">
                        <div class="row justify-content-center scroll-animate">
                            <?php
                            $bankAccounts = [
                                [
                                    'bank' => 'Seabank',
                                    'account' => '901490222090',
                                    'name' => 'Maya Tri Rahayu',
                                    'logo_class' => 'seabank',
                                    'icon' => 'fas fa-university'
                                ],
                                [
                                    'bank' => 'BCA',
                                    'account' => '7405325829',
                                    'name' => 'Maya Tri Rahayu',
                                    'logo_class' => 'bca',
                                    'icon' => 'fas fa-landmark'
                                ],
                                [
                                    'bank' => 'Dana',
                                    'account' => '087760672546',
                                    'name' => 'Maya Tri Rahayu',
                                    'logo_class' => 'dana',
                                    'icon' => 'fas fa-mobile-alt'
                                ]
                            ];

                            foreach ($bankAccounts as $bank) {
                                echo '<div class="col-md-4 col-sm-6 mb-4">';
                                echo '<div class="gift-card text-center">';
                                echo '<h4 class="mb-3">' . $bank['bank'] . '</h4>';
                                echo '<div class="account-number">' . $bank['account'] . '</div>';
                                echo '<p class="mb-3"><strong>a.n ' . $bank['name'] . '</strong></p>';
                                echo '<button class="btn copy-btn" onclick="copyToClipboard(\'' . $bank['account'] . '\', \'' . $bank['bank'] . '\')">';
                                echo 'Salin Nomor';
                                echo '</button>';
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </section>
            </section>

        </div>
        <div id="thankyou" class="section-rsvp scroll-animate">
            <center>
                <h2>Thank You</h2>
                <p>It is a pleasure and honor for us, if you are willing to attend and give us your blessing.</p>
                <div style="max-height: 80vh; overflow-y: scroll; background-color: #fff; border-radius: 10px; width: 100%;">
                    <div class="chat-box" id="chatBox"></div>
                </div>
            </center>
        </div>
    </div>
    <div class="toast-container" id="toastContainer">
        <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Terima Kasih!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                RSVP Anda berhasil dikirim!
            </div>
        </div>
        <div id="copyToast" class="toast" role="alert">
            <div class="toast-header">
                <strong class="me-auto">Berhasil!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                Nomor rekening berhasil disalin ke clipboard
            </div>
        </div>
    </div>
    <audio id="backsound" autoplay loop>
        <source src="/music/backsound.mp3" type="audio/mpeg">
        Browser kamu tidak mendukung audio.
    </audio>
    <script>
        const audio = document.getElementById("backsound");

        function toggleMusic() {
            const musicButton = document.getElementById("music-button");
            if (audio.paused) {
                audio.play();
                musicButton.innerHTML = '<i class="bi bi-pause-fill" style="font-size: 1rem; color: purple; border-radius: 50%; border:1px solid purple; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;"></i>';
            } else {
                audio.pause();
                musicButton.innerHTML = '🎵';
            }
        }

        function copyToClipboard(accountNumber, bankName) {
            // Create temporary input element
            const tempInput = document.createElement('input');
            tempInput.value = accountNumber;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            // Show toast notification
            const toast = new bootstrap.Toast(document.getElementById('copyToast'));
            const toastBody = document.querySelector('#copyToast .toast-body');
            toastBody.textContent = `Nomor rekening ${bankName} (${accountNumber}) berhasil disalin`;
            toast.show();
        }

        // Add animation on scroll
        window.addEventListener('scroll', function() {
            const giftCards = document.querySelectorAll('.gift-card');
            giftCards.forEach(card => {
                const cardTop = card.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (cardTop < windowHeight * 0.8) {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }
            });
        });

        // Initialize cards with fade-in effect
        document.addEventListener('DOMContentLoaded', function() {
            const giftCards = document.querySelectorAll('.gift-card');
            giftCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';

                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });

        function loadRsvp() {
            fetch("/rsvp/list")
                .then(res => res.json())
                .then(data => {
                    let chatBox = document.getElementById("chatBox");
                    chatBox.innerHTML = "";

                    if (data.length === 0) {
                        chatBox.innerHTML = `<p style="color:#888; text-align:center;">Belum ada ucapan</p>`;
                        return;
                    }

                    data.forEach(rsvp => {
                        let msg = document.createElement("div");
                        msg.classList.add("rsvp-card");

                        // Menentukan warna badge berdasarkan status kehadiran
                        let attendedClass = "";
                        let attendedText = "";

                        if (rsvp.attended === "Hadir") {
                            attendedClass = "badge-hadir";
                            attendedText = "Hadir";
                        } else if (rsvp.attended === "Tidak Hadir") {
                            attendedClass = "badge-tidak-hadir";
                            attendedText = "Tidak Hadir";
                        } else {
                            attendedClass = "badge-ragu";
                            attendedText = "Ragu-ragu";
                        }

                        msg.innerHTML = `
        <div class="rsvp-header">
            <h3 class="rsvp-name">${rsvp.name}</h3>
            <span class="rsvp-badge ${attendedClass}">${attendedText}</span>
        </div>
        <div class="rsvp-message">
            ${rsvp.message}
        </div>
        `;

                        chatBox.appendChild(msg);
                    });
                })
                .catch(err => console.error("Gagal load RSVP:", err));
        }

        loadRsvp();

        document.getElementById("rsvpForm").addEventListener("submit", function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            fetch("/rsvp/save", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(res => {
                    console.log(res);
                    if (res.status === "success") {
                        this.reset();
                        loadRsvp();
                        const toast = new bootstrap.Toast(document.getElementById('successToast'));
                        toast.show();
                        document.getElementById("thankyou").scrollIntoView({
                            behavior: "smooth",
                            block: "start"
                        });
                    } else {
                        alert("Gagal mengirim pesan");
                    }
                });
        });

        function openInvitation() {
            // Add scale effect to button
            document.querySelector('.open-button').style.transform = 'scale(0.95)';
            toggleMusic();

            setTimeout(() => {
                // Slide out cover page
                document.getElementById('coverPage').classList.add('slide-out');

                // Show main page after cover page slides out
                setTimeout(() => {
                    document.getElementById('coverPage').style.display = 'none';
                    document.getElementById('mainPage').classList.add('show');

                    // Initialize scroll animations after main page is shown
                    setTimeout(() => {
                        initScrollAnimations();
                    }, 100);
                }, 1000);
            }, 200);
        }

        function openMap(location) {
            window.open(`https://maps.app.goo.gl/SRTr8stZAY1QdJbQ8`, '_blank');
        }

        // Particle effect
        document.addEventListener('DOMContentLoaded', function() {
            createFloatingParticles();
        });

        function createFloatingParticles() {
            const container = document.body;

            for (let i = 0; i < 15; i++) {
                const particle = document.createElement('div');
                particle.style.cssText = `
            position: fixed;
            width: 4px;
            height: 4px;
            background: #a8b8d8;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0;
            animation: float 8s infinite linear;
            left: ${Math.random() * 100}%;
            animation-delay: ${Math.random() * 8}s;
            z-index: 1;
            `;

                container.appendChild(particle);
            }
        }

        // Smooth scrolling for better UX
        document.addEventListener('DOMContentLoaded', function() {
            document.body.style.overflow = 'hidden';

            setTimeout(() => {
                document.body.style.overflow = 'auto';
            }, 2000);
        });

        // Scroll Animation Functions
        function initScrollAnimations() {
            const animateElements = document.querySelectorAll('.scroll-animate, .scroll-animate-left, .scroll-animate-right, .scroll-animate-scale, .scroll-animate-fade');

            // Create intersection observer
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            // Observe all elements with scroll animation classes
            animateElements.forEach(element => {
                observer.observe(element);
            });

            // Add staggered animation delays for grouped elements
            const sections = document.querySelectorAll('.header-section1');
            sections.forEach((section, sectionIndex) => {
                const animatedElements = section.querySelectorAll('.scroll-animate, .scroll-animate-left, .scroll-animate-right, .scroll-animate-scale, .scroll-animate-fade');
                animatedElements.forEach((element, index) => {
                    element.style.transitionDelay = `${index * 0.1}s`;
                });
            });

            startCountdown();
        }

        // Alternative scroll listener for browsers that don't support IntersectionObserver
        function handleScrollAnimation() {
            const elements = document.querySelectorAll('.scroll-animate, .scroll-animate-left, .scroll-animate-right, .scroll-animate-scale, .scroll-animate-fade');
            const windowHeight = window.innerHeight;

            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;

                if (elementTop < windowHeight - elementVisible) {
                    element.classList.add('animate-in');
                }
            });
        }

        // Fallback for browsers without IntersectionObserver support
        if (!('IntersectionObserver' in window)) {
            window.addEventListener('scroll', handleScrollAnimation);
        }

        function startCountdown() {
            // Wedding date: October 5, 2025 at 08:00 WIB (GMT+7)
            const weddingDate = new Date('2025-10-12T08:00:00+07:00');

            function updateCountdown() {
                const now = new Date();
                const timeDifference = weddingDate - now;

                if (timeDifference > 0) {
                    const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                    // Update display with animation
                    updateTimeDisplay('days', days);
                    updateTimeDisplay('hours', hours);
                    updateTimeDisplay('minutes', minutes);
                    updateTimeDisplay('seconds', seconds);
                } else {
                    // Wedding day has arrived!
                    document.getElementById('days').textContent = '0';
                    document.getElementById('hours').textContent = '0';
                    document.getElementById('minutes').textContent = '0';
                    document.getElementById('seconds').textContent = '0';

                    // Could show "Wedding Day!" message
                    const countdownContainer = document.querySelector('.countdown');
                    if (countdownContainer) {
                        countdownContainer.innerHTML = '<div style="font-size: 24px; color: #a084ca; font-weight: bold;">🎉 Wedding Day! 🎉</div>';
                    }
                }
            }

            function updateTimeDisplay(elementId, value) {
                const element = document.getElementById(elementId);
                if (element && element.textContent !== value.toString()) {
                    element.textContent = value;
                    element.classList.add('update');
                    setTimeout(() => {
                        element.classList.remove('update');
                    }, 300);
                }
            }

            // Update immediately
            updateCountdown();

            // Update every second
            setInterval(updateCountdown, 1000);
        }
    </script>
</body>

</html>