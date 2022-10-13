<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ruang Perantara studio') }}
        </h2><br>
        <td class="title">
            <img src="{{ asset('images/RP1.png') }}" alt="Company logo" style="width: 100%; max-width: 200px" />
        </td><br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bukti Transfer') }}
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
                    // { data: 'items.total_price', name: 'items.total_price' },
                    // { data: 'image', name: 'image' },
                    // { data: 'date', name: 'date' },
                    
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
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                        <tr class="text-left">
                            <th>ID</th>
        
                            <th>Gambar</th>
                            <th>Tanggal</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $d)
                    <tr class="text-left">
                        <th scope="row">{{ $loop->iteration}}</th>
                       
                        <td><img src="{{ asset ('storage/transfer/'.$d->image)}}" width="200pc"/></td>
                        <td>{{ $d->date}}</td>
                       
                    </tr>
                         @endforeach

                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

