<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Error - Page Not Found</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
        crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .error-container {
            text-align: center;
        }

        .error-heading {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .error-message {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .error-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .btn-home {
            padding: 10px 30px;
            font-size: 1.2rem;
        }
    </style>
</head>

<body>

    <div class="container error-container">
        <h1 class="error-heading">404 Error</h1>
        <p class="error-message">Oops! The page you're looking for could not be found.</p>
        <img src="/404.png" width="400" height="400" alt="404 Error Image" class="error-image">
        <a href="/" class="btn btn-primary btn-home">Go to Homepage</a>
    </div>

</body>

</html>
