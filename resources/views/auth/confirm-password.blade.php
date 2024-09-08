<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Password</title>
    <style>
        /* Center the form on the page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Form container styling */
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        /* Form elements styling */
        label, input {
            display: block;
            width: 100%;
            margin-bottom: 15px;
        }

        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <!-- Form Container -->
    <div class="form-container">
        <h2>Confirm Password</h2>
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <!-- Password Input Field -->
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>
            
            <!-- Submit Button -->
            <button type="submit">Confirm Password</button>
        </form>
    </div>

</body>
</html>
