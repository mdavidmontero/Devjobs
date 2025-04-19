<div>
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div class="p-6 bg-white border-b border-gray-200 md:justify-between md:flex md:items-center">
                <div class="space-y-3">
                    <a class="text-xl font-bold" href="#">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm font-bold text-gray-600">{{ $vacante->empresa }}</p>
                    <p class="text-sm text-gray-500">Ultimo día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                </div>
                <div class="flex flex-col gap-3 mt-5 text-center md:flex-row items-strech md:mt-0">
                    <a href="#"
                        class="px-4 py-2 text-xs font-bold text-white uppercase rounded-lg bg-slate-800">Candidatos</a>
                    <a href="#"
                        class="px-4 py-2 text-xs font-bold text-white uppercase bg-blue-800 rounded-lg">Editar</a>
                    <a href="#"
                        class="px-4 py-2 text-xs font-bold text-white uppercase bg-red-600 rounded-lg">Eliminar</a>
                </div>
            </div>
        @empty
            <p class="p-3 text-sm text-center text-gray-600">No hay vacantes publicados</p>
        @endforelse
    </div>
    <div class="mt-10">
        {{ $vacantes->links() }}

    </div>
</div>
