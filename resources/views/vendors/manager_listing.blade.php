

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table border = "5">
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>CREATED/UPDATED</th>
        <th>ACTION</th>
        </tr>


        @foreach($managers as $key => $data)
        <tr>
        <td>{{ $data['id'] }} </td>
          <td>{{ $data['name'] }} </td>
          <td>{{ $data['email'] }} </td>
          <td>{{ $data['updated_at'] }} </td>
          <td> </td>
          </tr>

       @endforeach



    </table>
  </body>
</html>