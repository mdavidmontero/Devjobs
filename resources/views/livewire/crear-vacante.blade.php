<form class="space-y-5 md:w-1/2" wire:submit.prevent='crearVacante'>

    <!-- Titulo Vacante -->
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input id="titulo" class="block w-full mt-1" type="text" wire:model="titulo" {{-- old es un a funcion de laravel para que sellenen los campos si pasaron la validacion --}}
            :value="old('titulo')" placeholder="Titulo Vacante" />

        @error('titulo')
            <livewire:mostrar-alerta :message="$message">
            @enderror
    </div>

    <!-- Salario Vacante -->
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select id="salario" wire:model="salario"
            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 ">
            {{-- --}}
            <option value="">--Seleccione--</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}"> {{ $salario->salario }}</option>
            @endforeach
        </select>
        @error('salario')
            <livewire:mostrar-alerta :message="$message">
            @enderror
    </div>

    <!-- Categoria Vacante -->
    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select id="categoria" wire:model="categoria"
            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 ">
            {{-- --}}
            <option value="">--Seleccione--</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}"> {{ $categoria->categoria }}</option>
            @endforeach
        </select>
        @error('categoria')
            <livewire:mostrar-alerta :message="$message">
            @enderror
    </div>

    {{-- Empresa Vacante --}}
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block w-full mt-1" type="text" wire:model="empresa" :value="old('empresa')"
            placeholder="Empresa: ej. Netflix, Uber, Shopify" />
        @error('empresa')
            <livewire:mostrar-alerta :message="$message">
            @enderror
    </div>

    {{-- Ultimo dia de Postulación --}}
    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo dia para Postularse')" />
        <x-text-input id="ultimo_dia" class="block w-full mt-1" type="date" wire:model="ultimo_dia"
            :value="old('ultimo_dia')" />
        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message">
            @enderror
    </div>

    {{-- Descripcion del puesto --}}
    <div>
        <x-input-label for="descripcion" :value="__('Ultimo dia para Postularse')" />
        <textarea class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 h-72"
            wire:model="descripcion" id="descripcion" placeholder="Descripcion general del puesto, experiencia">
        {{-- --}}
        </textarea>
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message">
            @enderror
    </div>
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block w-full mt-1" type="file" wire:model="imagen" accept="image/*" />
        <div class="my-5 w-80">
            @if ($imagen)
                Imagen:
                <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen Temporal">
            @endif
        </div>
        @error('imagen')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    {{-- Boton --}}
    <x-primary-button>
        Crear Vacante
    </x-primary-button>
</form>
