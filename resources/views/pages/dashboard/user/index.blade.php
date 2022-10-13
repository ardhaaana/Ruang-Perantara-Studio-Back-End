<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ruang Perantara studio') }}
        </h2><br>
        <td class="title">
            <img src="{{ asset('images/RP1.png') }}" alt="Company logo" style="width: 100%; max-width: 200px" />
        </td><br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data User Terdaftar') }}
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
                    // { data: 'name', name: 'name' },
                    // { data: 'email', name: 'email' },
                    // { data: 'roles', name: 'roles' },
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
                            <th>Nama Konsumen</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Fitur</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                    <tr class="text-left">
                        <th scope="row">{{ $loop->iteration}}</th>
                        
                        <td>{{ $d->name}}</td>
                        <td>{{ $d->email}}</td>
                        <td>{{ $d->roles}}</td>

                        <td>
                         <a class="inline-block border border-gray-700 bg-blue-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline" 
                            href="{{route('dashboard.user.edit', $d->id) }}">
                             Edit
                         </a>
                        
                        <form class="inline-block" action="{{ route('dashboard.user.destroy', $d->id) }} " method="POST" >
                        @csrf
                        @method('delete')
                        <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                             Hapus
                        </button>
                            
                        </form>
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
