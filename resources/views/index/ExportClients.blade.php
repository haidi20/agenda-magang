<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan</title>
  </head>
  <body>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($agenda as $index => $item)
          <tr>
            <td>{{ $index + 1}}</td>
            <td>{{ array_get($item, 'name') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
