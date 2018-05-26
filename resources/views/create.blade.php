<!DOCTYPE html>
<html lang="en">
<head>
    <title>GenioTeam Test Assignment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Contact</h2>
    <p>GenioTeam Test Assignment (<a href="{{ url('/') }}">Home</a>)</p>
    <form action="{{ url('/create/insert') }}" method="POST">
        <label>First Name:</label>
        <input type="text" name="first_name" class="form-control" required>
        <label>Last Name:</label>
        <input type="text" name="last_name" class="form-control" required>
        <label>Email:</label>
        <input type="email" name="email" class="form-control" required>
        <label>Fill Percentage:</label>
        <input type="number" step="any" name="fill_percentage" class="form-control" required>
        <div class="text-right">
            <br/><input type="submit" class="btn btn-primary" value="Create contact">
        </div>
    </form>
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>

</body>
</html>
