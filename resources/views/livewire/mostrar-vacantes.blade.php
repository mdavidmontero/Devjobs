<div>
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div class="p-6 bg-white border-b border-gray-200 md:justify-between md:flex md:items-center">
                <div class="space-y-3">
                    <a class="text-xl font-bold" href="{{ route('vacantes.show', $vacante->id) }}">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm font-bold text-gray-600">{{ $vacante->empresa }}</p>
                    <p class="text-sm text-gray-500">Ultimo día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                </div>
                <div class="flex flex-col gap-3 mt-5 text-center md:flex-row items-strech md:mt-0">
                    <a href="{{ route('candidatos.index', $vacante->id) }}"
                        class="px-4 py-2 text-xs font-bold text-white uppercase rounded-lg bg-slate-800">Candidatos</a>
                    <a href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="px-4 py-2 text-xs font-bold text-white uppercase bg-blue-800 rounded-lg">Editar</a>
                    <button type="button" wire:click="$dispatch('mostrarAlerta', {{ $vacante->id }})"
                        class="px-4 py-2 text-xs font-bold text-center text-white uppercase bg-red-800 rounded-lg dark:bg-red-600">
                        Eliminar

                    </button>
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('mostrarAlerta', (vacanteId) => {
                Swal.fire({
                    title: '¿Eliminar Vacante?',
                    text: "Una Vacante eliminada no se puede recuperar:(",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ELiminar vacante
                        @this.call('eliminarVacante', vacanteId);
                        Swal.fire(
                            'Se eliminó la Vacante',
                            'Eliminado correctamente',
                            'success'
                        )
                    }
                })

            });
        });
    </script>
@endpush
