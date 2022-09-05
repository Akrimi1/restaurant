<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <table class="table table-bordered" width="100%">
        <thead>
        <tr>
            <th>Sr. No</th>
            <th>Restaurant Name</th>
            <th>Address</th>
			<th>Phone</th>
			<th>Information</th>
			<th>Admin Commission</th>
        </tr>
        </thead>
    <tbody>
    @foreach ($restaurant as $data)
      <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->address }}</td>
        <td>{{ $data->phone }}</td>
		<td>{{ $data->information }}</td>
		<td>{{ $data->admin_commission }}</td>
      </tr>
    @endforeach
  </tbody>
  </table>
  </body>
</html>