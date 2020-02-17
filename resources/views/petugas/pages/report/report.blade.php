<h1 align="center">Laporan Data Pengaduan</h1>
<hr>
<br>
<table cellspacing="0" width="100%" border="1">
<thead>
  <tr>
    <th>Pelapor</th>
    <th>Tanggal</th>
    <th>Status</th>
    <th>Isi Pengaduan</th>
  </tr>
</thead>
<tbody>
@foreach($pengaduan as $pd)
  <tr>
  	<td>{{$pd->fullname}}</td>
  	<td>{{date('d F Y H:i',strtotime($pd->created_at))}}</td>
  	<td>{{$pd->status}}</td>
  	<td>{{$pd->isi_laporan}}</td>
  </tr>
  @endforeach
</tbody>
</table>