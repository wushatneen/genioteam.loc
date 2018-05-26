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
    <h2>Contacts</h2>
    <p>GenioTeam Test Assignment</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Fill Percentage</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($records as $record)
            <tr>
                <td>{{ $record->getData()['First Name'] }}</td>
                <td>{{ $record->getData()['Last Name'] }}</td>
                <td>{{ $record->getData()['Email'] }}</td>
                <td>{{ $record->getData()['Fill Percentage'] }}</td>
                <td>
                    <a href="{{ url('/edit/'.$record->getData()['CONTACTID']) }}" title="Edit Contact"><span class="glyphicon glyphicon-edit"></span></a>
                    <a href="{{ url('/delete/'.$record->getData()['CONTACTID']) }}" title="Delete Contact"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-right">
        <a href="{{ url('/create') }}" class="btn btn-primary">Create new contact</a>
    </div>
</div>

</body>
</html>
