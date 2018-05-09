<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <center><h3>Data Donatur <a href="#">Kitamampu.org</a></h3></center>
    <div>
      <h4>Invoice : {{ date('l d M Y') }}</h4>
    </div>
     <table class="table" border="1px">
      <thead>
        <tr>
          <th style="width: 20px;">No</th>
          <th style="width: 60px">ID User</th>
          <th>Nama</th>
          <th>Judul</th>
          <th>Nominal</th>
          <th>Metode Transfer</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        {{! $no = 1 }}
        @foreach($data as $dt)
        <tr>
          <td style="text-align: center">{{ $no++ }}</td>
          <td style="text-align: center">{{ $dt->user_id }}</td>
          <td>{{ (App\User::find($dt->user_id))->nama }}</td>
          <td>{{ $dt->judul }}</td>
          <td>{{ $dt->nominal }}</td>
          <td>{{ $dt->no_rek }}</td>
          <td>{{ $dt->status }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>