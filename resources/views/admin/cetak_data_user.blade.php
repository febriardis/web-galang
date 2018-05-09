<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <center><h3>Data Partisipan <a href="#">Kitamampu.org</a></h3></center>
    <div>
      <h4>Invoice : {{ date('l d M Y') }}</h4>
    </div>
     <table class="table" border="1px">
      <thead>
          <tr>
            <th>No</th>
            <th style="width: 70px">ID User</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Jenis Kelamin</th>
            <th>No Telp</th>
            <th>E-mail</th>
            <th>Alamat</th>
        </tr>
      </thead>
      <tbody>
        {{! $no = 0 }}
        @foreach($data as $dt)
        <tr>
          <td style="text-align: center;">{{ $no++ }}</td>
          <td style="text-align: center;">{{ $dt->id }}</td>
          <td>{{ $dt->nama }}</td>
          <td>{{ $dt->username }}</td>
          <td>{{ $dt->jenkel }}</td>
          <td>{{ $dt->no_telp }}</td>
          <td>{{ $dt->email }}</td>
          <td>{{ $dt->alamat }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>