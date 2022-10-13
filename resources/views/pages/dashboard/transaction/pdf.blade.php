<!DOCTYPE html>
<html>
<head>
	{{-- <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title> --}}
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<br>
	<center>
		<h5>Data Semua Laporan Transaksi Pembelian Produk Desain Interior</h4>
			<td class="title">
			 <img src="{{ asset('images/RP1.png') }}" alt="Company logo" style="width: 100%; max-width: 300px"/>
			</td>
	</center>

 
	<table class='table table-bordered'>
		<thead>
			<tr>
			<th>ID</th>
            <th>Nama Konsumen</th>
            {{-- <th>Produk</th> --}}
            <th>Total Harga</th>
            {{-- <th>Produk</th> --}}
            <th>Tanggal pembelian</th>
            {{-- <th>Status</th> --}}
			</tr>
		</thead>
		<tbody>
		@foreach ($data as $d)
        <tr>
        	<th scope="row">{{ $loop->iteration}}</th>
            <td>{{ $d->user->name}}</td>	
			{{-- <td>
			@foreach ($item as $d) 	 
				{{ $d->product->name }}  
			@endforeach
			</td> --}}
            <td>RP. {{ number_format ($d->total_price)}}</td>
            <td>{{ $d->created_at->format('d-m-Y')}}</td>              
        </tr>
        @endforeach
		</tbody>
		<tr><td>
			</td>
		</tr>
	</table>
</body>
</html>
