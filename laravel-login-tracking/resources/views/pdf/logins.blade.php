<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Logins PDF</title>
</head>
<body>
    <h1>User Login Records</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th> User Id</th>
                <th>Login Time</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($logins as $login)
                <tr>
                    <td>{{ $login->id }}</td>
                    <td>{{ $login->user_id }}</td>
                    <td>{{ $login->login_at }}</td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
