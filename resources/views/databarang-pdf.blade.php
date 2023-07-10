<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Barang</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Harga Barang</th>
  </tr>
  @php
    $no=1;
  @endphp
  @foreach ($data as $row)
    <tr>
    <td>{{ $no++ }}</td>
      <td>{{ $row->kode_barang }}</td>
      <td>{{ $row->nama_barang }}</td>
      <td>Rp.{{ $row->harga_barang }}</td>
    </tr>
  @endforeach  
</table>

</body>
</html>


