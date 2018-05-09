<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <center><h3>Data Campaign di <a href="#">Kitamampu.org</a></h3></center>
    <div>
      <h4>Invoice : {{ date('l d M Y') }}</h4>
    </div>
      <table class="table table-hover" border="1px">
      <thead>
          <tr>
            <th>No</th>
            <th style="width: 300px">Judul</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Dana Terkumpul</th>
            <th>Target Dana</th>
            <th>Batas Akhir</th>
        </tr>
      </thead>
      <tbody>
        {{!$no = 1}}
        @foreach($data as $dt)
        <tr>
          <td>{{ $no++}}</td>
            <td>{{ $dt->judul }}</td>
            <td>{{ $dt->kategori }}</td>
            <td>{{ $dt->lokasi }}</td>
              <!-- cek -->
              <div style="display: none;">
                {{! $tb = (App\Donasi::where('galang_id', $dt->id)->where('status', 'Confirmed'))->get()->sum('nominal') }}
              </div>
              <!-- end -->
              <td>Rp. {{number_format($tb,0, ",", ".")}}</td>
            <td>Rp. {{$dt->target}}</td>
            <td>{{ date('d M Y', strtotime($dt->tgl_akhir)) }}</td>
          </tr>
        @endforeach
      </tbody>
  </table>
  </body>
</html>