<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $module->title }}</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }


        body {
            background: #eef6fb;
            padding: 40px;
            color: #0f172a;
        }


        .container {
            max-width: 1200px;
            margin: auto;
        }


        /* =========================
           GENERAL CARD
        ========================= */

        .module-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 25px;

            box-shadow:
                0 10px 25px rgba(0, 0, 0, 0.08);

            border: 1px solid #e2e8f0;

            margin-bottom: 30px;
        }


        /* =========================
           TOP MODULE CARD
        ========================= */

        .module-header-card {
            background:
                linear-gradient(
                    135deg,
                    #ffffff 0%,
                    #f0f9ff 100%
                );

            padding: 42px;
        }


        .module-title-row {
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }


        .module-icon {
            width: 60px;
            height: 60px;

            display: flex;
            justify-content: center;
            align-items: center;

            background:
                linear-gradient(
                    135deg,
                    #38bdf8,
                    #0284c7
                );

            border-radius: 16px;

            font-size: 30px;

            flex-shrink: 0;

            box-shadow:
                0 8px 18px rgba(2, 132, 199, 0.20);
        }


        .module-title-content {
            flex: 1;
        }


        h1 {
            font-size: 38px;
            margin-bottom: 15px;
            color: #0f172a;
            line-height: 1.2;
        }


        h2 {
            font-size: 27px;
            margin-bottom: 22px;
            color: #0f172a;
        }


        h3 {
            font-size: 22px;
            margin-bottom: 15px;
        }


        p {
            color: #475569;
            line-height: 1.8;
            font-size: 16px;
        }


        .module-description {
            max-width: 950px;
        }


        /* =========================
           SECTION TITLE
        ========================= */

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;

            margin-bottom: 22px;
        }


        .section-title h2 {
            margin: 0;
        }


        .section-icon {
            font-size: 25px;
        }


        /* =========================
           ABOUT CARD
        ========================= */

        .about-card p {
            margin-bottom: 18px;
        }


        .about-card p:last-child {
            margin-bottom: 0;
        }


        /* =========================
           VIDEO CARD
        ========================= */

        .video-section {
            width: 100%;
        }


        .video-wrapper {
            width: 100%;
            overflow: hidden;

            border-radius: 18px;

            background: #000;

            box-shadow:
                0 8px 20px rgba(0, 0, 0, 0.10);
        }


        video {
            width: 100%;
            display: block;
            border-radius: 18px;
        }


        /* =========================
           EQUIPMENT SECTION
        ========================= */

        .equipment-section {
            width: 100%;
        }


        .equipment-grid {
            display: grid;

            grid-template-columns:
                repeat(auto-fit, minmax(300px, 1fr));

            gap: 30px;

            margin-top: 25px;
        }


        /* =========================
           EQUIPMENT CARD
        ========================= */

        .equipment-card {

            background:
                linear-gradient(
                    145deg,
                    #ffffff,
                    #f1f8fd
                );

            padding: 25px;

            border-radius: 25px;

            border: 1px solid #dbeafe;

            box-shadow:
                0 10px 25px rgba(14, 116, 144, .12);

            display: flex;
            flex-direction: column;

            transition: .3s ease;
        }


        .equipment-card:hover {

            transform: translateY(-8px);

            box-shadow:
                0 15px 35px rgba(14, 116, 144, .25);
        }


        /* =========================
           EQUIPMENT IMAGE
        ========================= */

        .equipment-image {

            width: 100%;
            height: 210px;

            object-fit: contain;

            background: #ffffff;

            padding: 15px;

            border-radius: 20px;

            margin-bottom: 20px;

            box-shadow:
                inset 0 0 15px rgba(0, 0, 0, .05);
        }


        .equipment-card h3 {

            font-size: 22px;

            color: #0f172a;

            margin-bottom: 18px;
        }


        .equipment-content {
            flex: 1;
        }


        .equipment-content h4 {

            color: #0369a1;

            font-size: 15px;

            margin-top: 17px;
            margin-bottom: 7px;

            text-transform: uppercase;

            letter-spacing: .4px;
        }


        .equipment-content h4:first-child {
            margin-top: 0;
        }


        .equipment-content p {

            font-size: 14px;

            color: #475569;

            line-height: 1.7;
        }


        /* =========================
           AR BUTTON
        ========================= */

        .btn-ar {

            display: block;

            width: max-content;

            margin: 25px auto 0;

            padding: 12px 30px;

            background:
                linear-gradient(
                    135deg,
                    #0284c7,
                    #0369a1
                );

            color: #ffffff;

            text-decoration: none;

            border-radius: 30px;

            font-weight: 700;

            text-align: center;

            box-shadow:
                0 5px 15px rgba(2, 132, 199, .3);

            transition: .3s ease;
        }


        .btn-ar:hover {

            transform: scale(1.05);

            background: #075985;
        }


        /* =========================
           EMPTY EQUIPMENT
        ========================= */

        .empty-equipment {

            grid-column: 1 / -1;

            text-align: center;

            background: #f8fafc;

            padding: 35px;

            border-radius: 18px;

            border: 1px dashed #cbd5e1;
        }


        /* =========================
           BACK BUTTON
        ========================= */

        .back-section {
            margin-top: 5px;
            margin-bottom: 30px;
        }


        .back-btn {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            background:
                linear-gradient(
                    135deg,
                    #0284c7,
                    #0369a1
                );

            color: #ffffff;

            padding: 13px 27px;

            border-radius: 12px;

            text-decoration: none;

            font-weight: 600;

            box-shadow:
                0 5px 15px rgba(2, 132, 199, .20);

            transition: .3s ease;
        }


        .back-btn:hover {

            transform: translateX(-4px);

            background: #075985;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            body {
                padding: 20px;
            }


            .module-card {
                padding: 25px;
                border-radius: 20px;
            }


            .module-header-card {
                padding: 28px;
            }


            .module-title-row {
                flex-direction: column;
                gap: 15px;
            }


            .module-icon {
                width: 52px;
                height: 52px;
                font-size: 26px;
            }


            h1 {
                font-size: 29px;
            }


            h2 {
                font-size: 23px;
            }


            .equipment-grid {
                grid-template-columns: 1fr;
            }


            .equipment-image {
                height: 190px;
            }
        }


        @media (max-width: 480px) {

            body {
                padding: 12px;
            }


            .module-card {
                padding: 20px;
            }


            .module-header-card {
                padding: 22px;
            }


            h1 {
                font-size: 25px;
            }


            h2 {
                font-size: 21px;
            }


            p {
                font-size: 15px;
            }
        }

    </style>

</head>


<body>


<div class="container">


    <!-- =========================
         TOP MODULE CARD
    ========================== -->

    <div class="module-card module-header-card">

        <div class="module-title-row">

            <div class="module-icon">
                📘
            </div>


            <div class="module-title-content">

                <h1>
                    {{ $module->title }}
                </h1>


                <p class="module-description">
                    {{ $module->description }}
                </p>

            </div>

        </div>

    </div>



    <!-- =========================
         ABOUT CARD
    ========================== -->

    <div class="module-card about-card">

        <div class="section-title">

            <span class="section-icon">
                📖
            </span>

            <h2>
                About {{ $module->title }}
            </h2>

        </div>


        <p>
            {{ $module->function }}
        </p>


        <p>
            This module provides users with a comprehensive understanding
            of maritime safety equipment, their purposes, functions and
            applications in real working environments.
        </p>


        <p>
            Through interactive learning and Augmented Reality technology,
            users can explore three-dimensional equipment models and
            understand how each equipment contributes to safety operations
            onboard ships.
        </p>

    </div>



    <!-- =========================
         LEARNING VIDEO CARD
    ========================== -->

    @if($module->video)

        <div class="module-card video-section">

            <div class="section-title">

                <span class="section-icon">
                    🎬
                </span>

                <h2>
                    Learning Video
                </h2>

            </div>


            <div class="video-wrapper">

                <video controls>

                    <source
                        src="{{ asset('uploads/videos/'.$module->video) }}"
                        type="video/mp4">

                    Your browser does not support the video tag.

                </video>

            </div>

        </div>

    @endif



    <!-- =========================
         EQUIPMENT CARD
    ========================== -->

    <div class="module-card equipment-section">


        <div class="section-title">

            <span class="section-icon">
                ⚓
            </span>

            <h2>
                Equipment
            </h2>

        </div>



        <div class="equipment-grid">


            @forelse($module->equipments as $equipment)


                <div class="equipment-card">


                    @if($equipment->image)

                        <img
                            src="{{ asset('uploads/equipment/'.$equipment->image) }}"
                            alt="{{ $equipment->name }}"
                            class="equipment-image">

                    @endif



                    <h3>
                        ⚓ {{ $equipment->name }}
                    </h3>



                    <div class="equipment-content">


                        <h4>
                            Description
                        </h4>


                        <p>
                            {{ $equipment->description }}
                        </p>



                        <h4>
                            Function
                        </h4>


                        <p>
                            {{ $equipment->function }}
                        </p>


                    </div>



                    @if($equipment->model_file)

                        <a
                            href="/ar-model/{{ $equipment->model_file }}"
                            class="btn-ar">

                            📱 Open AR Model

                        </a>

                    @endif


                </div>


            @empty


                <div class="empty-equipment">

                    <p>
                        No equipment available for this module.
                    </p>

                </div>


            @endforelse


        </div>

    </div>


    <!-- =========================
         BACK BUTTON
    ========================== -->

    <div class="back-section">

<a href="{{ route('dashboard') }}" class="back-btn">
    ← Back
</a>

    </div>


</div>


</body>

</html>