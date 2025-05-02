<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student and Course Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iN8U8k8Knujsf1t7sHnlhd7pfkXjWv5arRj0jcRj4GGbX2ZlF9s18c8go" crossorigin="anonymous">

    <!-- Custom CSS for Layout Styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            padding: 30px;
        }

        h2 {
            font-size: 26px;
            color: #333;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 16px;
            font-weight: 600;
            color: #555;
        }

        .form-control {
            padding: 10px 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-warning {
            background-color: #ffc107;
            color: black;
        }

        .btn-info {
            background-color: #17a2b8;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .table {
            margin-top: 20px;
            border-radius: 8px;
        }

        .table th, .table td {
            padding: 12px 15px;
            text-align: center;
        }

        .alert-success {
            background-color: #28a745;
            color: white;
            border-radius: 5px;
        }

        /* Table Styling */
        table thead th {
            background-color: #007bff;
            color: white;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Create and Edit page specific styling */
        .form-container {
            max-width: 700px;
            margin: 0 auto;
            padding: 30px;
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-container form .form-group {
            margin-bottom: 25px;
        }
    </style>
</head>
<body>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kaZnH/0LsZYadksd9pzGbK3cOQ5ZT01UB9XmoBBz02rM3sdZT2dbdCjjXwX7YWzR" crossorigin="anonymous"></script>
</body>
</html>
