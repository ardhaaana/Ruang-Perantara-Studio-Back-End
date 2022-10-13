<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ruang Perantara studio') }}
        </h2><br>
        <td class="title">
            <img src="{{ asset('images/RP1.png') }}" alt="Company logo" style="width: 100%; max-width: 200px" />
        </td><br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mengelola Data Transaksi Penjualan Produk') }}
        </h2><br>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX DataTable
            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [
                    // { data: 'id', name: 'id', width: '5%'},
                    // { data: 'user.name', name: 'user.name' },
                    // { data: 'total_price', name: 'total_price' },
                    // { data: 'payment', name: 'payment' },
                    // { data: 'created_at', name: 'created_at' },
                    // { data: 'status', name: 'status' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '25%'
                    },
                ],
            });
        </script>
    </x-slot>
            
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden sm:rounded-md">
             <div class="container mt-4">
            <!-- form filter data berdasarkan range tanggal  -->
            {{-- <form action="index.blade.php" method="get">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label class="col-form-label">Periode</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="dari" required>
                    </div>
                    <div class="col-auto">
                        -
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="ke" required>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form> --}}
    
                <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Cetak Invoice All Report Pembelian Produk</h2>
                {{-- <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10"> --}}
                    
                    {{-- <div class="p-6 bg-white border-b border-gray-200"> --}}
                     <a class="inline-block border border-gray-700 bg-red-700 text-white rounded-md px-5 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"  href="/dashboard/print_all" class="btn btn-primary" target="_blank">CETAK INVOICE</a>
                    <br>
                    <br>
                    <br>
                {{-- </div> --}}
            {{-- </div> --}}
             <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Cari Tanggal Transaksi Konsumen</h2>
            <div class="my-2">
                    <form action="/dashboard/transaction" method="GET">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="getdate"><br>
                            <button class="inline-block border border-gray-700 bg-red-700 text-white rounded-md px-5 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
                <div class="px-4 py-5 bg-white sm:p-6">

                    <table id="crudTable">
                        <thead>
                        <tr class="text-left">
                            <th>ID</th>
                            <th>Nama Konsumen</th>
                            <th>Email Konsumen</th>
                            <th>Total Harga Pembelian</th>
                            <th>Pembayaran</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Fitur</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $d)
                    <tr class="text-left">
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $d->user->name}}</td>
                        <td>{{ $d->user->email}}</td>
                        <td>Rp. {{number_format ($d->total_price)}}</td>
                        <td>{{ $d->payment}}</td>
                        <td>{{ $d->created_at->format('d/n/y')}}</td>
                        <td> {{ $d->status}}</td>
                        <td>
                        <a class="inline-block border border-blue-700 bg-blue-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-blue-800 focus:outline-none focus:shadow-outline" 
                            href="/dashboard/transaction/{{$d->id}}">
                            Lihat
                        </a>
                        <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline" 
                            href="{{route('dashboard.transaction.edit', $d->id) }} ">
                            Edit
                        </a>
                    </td>   
                </tr>
                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


