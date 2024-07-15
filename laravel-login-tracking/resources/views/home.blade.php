
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Logins</title>
</head>
<body>
    <div style="    display: flex; justify-content: flex-end; margin: 10px;">
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button class="btn btn-outline-dark" type="submit">Logout</button> 
        </form>
    </div>
    <h1 style="text-align: center;">Your Login Records</h1>
    
    <label>Total Logins: {{ $logins->count() }}</label> 
    <div>
    <table class="table table-striped" >
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
</div>
    
    <a href="{{ route('export.excel') }}">Export to Excel</a>
    <a href="{{ route('export.pdf') }}">Export to PDF</a>

   
</body>
</html>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
