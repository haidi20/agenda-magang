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
          <th>Nama</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($agenda as $agendaa)
          <tr>
            @if (Auth::user()->level == 'admin')
              <td>{{$agendaa->user->name}}</td>
            @endif
            <td>{{$agendaa->kegiatan}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
