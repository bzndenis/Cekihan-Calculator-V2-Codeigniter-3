<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #000;
            font-family: 'Poppins', sans-serif;
            color: #fff;
        }
        .card {
            background: #1a1a1a;
            border-radius: 25px;
            border: none;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .card-header {
            background: #1a1a1a;
            border-bottom: 1px solid #333;
            border-radius: 25px 25px 0 0 !important;
            padding: 20px;
        }
        .btn {
            border-radius: 15px;
            padding: 12px 25px;
            font-weight: 500;
        }
        .btn-primary {
            background: linear-gradient(45deg, #ff2d55, #ff2d92);
            border: none;
        }
        .form-control {
            background: #2a2a2a;
            border: none;
            border-radius: 15px;
            padding: 15px;
            color: #fff;
        }
        .form-control:focus {
            background: #2a2a2a;
            color: #fff;
            box-shadow: none;
        }
        .list-group-item {
            background: #2a2a2a;
            border: none;
            border-radius: 15px;
            margin-bottom: 10px;
            color: #fff;
        }
        .nav-bottom {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #1a1a1a;
            padding: 20px;
            border-radius: 25px 25px 0 0;
            box-shadow: 0 -8px 16px rgba(0,0,0,0.2);
        }
        .chart-container {
            background: #2a2a2a;
            border-radius: 20px;
            padding: 20px;
            margin: 20px 0;
        }
        .score-card {
            background: linear-gradient(45deg, #2196F3, #4CAF50);
            border-radius: 20px;
            padding: 20px;
            color: white;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>