<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ruang Perantara studio') }}
        </h2><br>
        <td class="title">
            <img src="{{ asset('images/RP1.png') }}" alt="Company logo" style="width: 100%; max-width: 200px" />
        </td><br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transaksi Pembelian Produk: ID Konsumen {{ $transaction->id }}
        </h2>
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
                    // { data: 'product.name', name: 'product.name' },
                    // { data: 'product.price',  name: 'product.price' },
                    // { data: 'quantity', name: 'quantity' },
                ],
            });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Cetak Invoice Pembelian Konsumen</h2>

            {{-- <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                 <div class="p-6 bg-white border-b border-gray-200"> --}}
                    <a class="inline-block border border-gray-700 bg-red-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"  href="/dashboard/invoice/{{ $transaction->id }}" class="btn btn-primary" target="_blank">CETAK INVOICE</a>
                    <br>
                    <br>
                    <br>
                {{-- </div>
            </div> --}}

            <h2 class="font-bold text-lg text-gray-800 leading-tight mb-5">Produk Pembelian Konsumen</h2>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable" class="text-left">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                        </tr>
                        </thead>
                       <tbody>
                        @foreach ($data as $d)
                    <tr class="text-left">
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $d->product->name}}</td>
                        <td>Rp {{ number_format ($d->product->price) }}</td>
                        <td>{{ $d->quantity}}</td>   
                    </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
