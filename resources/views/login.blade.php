<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        /* Container styling */
        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        /* Title styling */
        form h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Error styling */
        .error {
            color: #ff3333;
            font-size: 14px;
            margin-bottom: 15px;
            text-align: center;
        }

        /* Label styling */
        form label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        /* Input styling */
        form input[type="text"],
        form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Input focus */
        form input[type="text"]:focus,
        form input[type="password"]:focus {
            border-color: #888;
            outline: none;
        }

        /* Button styling */
        form button {
            width: 100%;
            padding: 10px;
            background-color: #888;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <h2>Login</h2>

        <!-- Display error message -->
      @if ($errors->has('login_error'))
    <div style="color: red; text-align: center; margin-bottom: 10px;">
        {{ $errors->first('login_error') }}
    </div>
@endif


        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
