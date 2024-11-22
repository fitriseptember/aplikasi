<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Designers</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #fdfbff;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            width: 100%;
            background-color: #fff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .content {
            max-width: 500px;
        }

        /* Efek Fade In */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .content h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 15px;
            line-height: 1.3;
            font-weight: 700;
            animation: fadeIn 2s ease-in-out;
        }


        .content p {
            font-size: 1rem;
            color: #666;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .content .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #695CFE;
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .content .cta-button:hover {
            background-color: #7e73f8;
            transform: translateY(-5px);
        }

        .image-container {
            max-width: 400px;
        }

        .image-container img {
            width: 100%;
            border-radius: 10px;
        }

        .credit {
            margin-top: 20px;
            font-size: 0.8rem;
            color: #aaa;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Content Section -->
        <div class="content">
            <h1>Monitoring PKL Siswa pengembangan perangkat lunak dan GIM</h1>
            <p>Program Praktik Kerja Lapangan (PKL) bertujuan memberikan pengalaman nyata kepada siswa di dunia kerja, mengembangkan keterampilan dan disiplin untuk menghadapi tantangan karier di masa
            depan.</p>
            <a href="{{ route('login') }}" class="cta-button">Masuk</a>
        </div>
        <!-- Image Section -->
        <div class="image-container">
        <img src="{{ asset('storage/images/fotohome.jpeg') }}" alt="Logo" class="logo-img">
        </div>
    </div>
</body>

</html>
