<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #2e8b57;
            color: white;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: 600;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .navbar .brand {
            font-size: 24px;
            font-weight: 700;
        }

        .navbar .dropdown {
            position: relative;
        }

        .navbar .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            background-color: #ffffff;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 10px;
            border-radius: 4px;
        }

        .navbar .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-item {
            color: #333;
            text-decoration: none;
            display: block;
            padding: 8px 12px;
        }

        .dropdown-item:hover {
            background-color: #f5f5f5;
        }

        .main-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .py-4 {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar a {
                margin: 5px 0;
            }

            .dropdown-menu {
                position: static;
                box-shadow: none;
                border-radius: 0;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="brand">Admin Dashboard</div>
        <div class="dropdown">
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Profile</a>
                <a href="#" class="dropdown-item">Settings</a>
                <a href="#" class="dropdown-item btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="main-container py-4">
        <!-- Main content goes here -->
        @yield('content')
    </div>
</body>
</html>
