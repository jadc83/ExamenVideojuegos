<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Título
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Año
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('videojuegos.index', ['order' => 'desarrolladoras.nombre', 'order_dir' => order_dir($order == 'desarrolladoras.nombre', $order_dir)]) }}" class="font-medium text-blue-600 hover:underline">
                            Desarrolladora {{ order_dir_arrow($order == 'desarrolladoras.nombre', $order_dir) }}
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('videojuegos.index', ['order' => 'distribuidoras.nombre', 'order_dir' => order_dir($order == 'distribuidoras.nombre', $order_dir)]) }}" class="font-medium text-blue-600 hover:underline">
                            Distribuidora {{ order_dir_arrow($order == 'distribuidoras.nombre', $order_dir) }}
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3" colspan="2">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videojuegos as $videojuego)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $videojuego->titulo }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $videojuego->anyo }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $videojuego->desarrolladora->nombre }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $videojuego->desarrolladora->distribuidora->nombre }}
                        </th>
                        <td class="px-6 py-4">
                            <a href="{{ route('videojuegos.edit', ['videojuego' => $videojuego]) }}" class="font-medium text-blue-600 hover:underline">
                                <x-primary-button>
                                    Editar
                                </x-primary-button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ url('/videojuegos/poseo') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500">Comprar nuevo juego</x-primary-button>
        </a>
    </div>
</x-app-layout>
