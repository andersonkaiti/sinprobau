@extends("layouts.system")

@section("title", "SINPROBAU - Sistema")

@section("content")
    <div class="max-w-7xl mx-auto w-full h-full flex flex-col justify-center gap-8 p-10 md:px-20 md:py-20">
        <h1 class="text-3xl font-bold text-center">Atualizar Convenção</h1>
        <form method="POST" action="/system/convention-update/{{ $convention->id }}" enctype="multipart/form-data" class="w-full md:px-4 py-4">
            @csrf
            @method("POST")
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col gap-2">
                    <x-input
                        :name="'title'"
                        :type="'text'"
                        :label="'Título'"
                        :placeholder="'Digite o título da convenção'"
                        :value="$convention->title"
                    />
                    @error("title")
                        <x-error :message="$message" />
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <div class="flex items-center gap-2">
                        <p class="text-sm font-medium text-gray-900">Arquivo atual:</p>
                        <a href="{{ $convention->document_url }}" target="_blank" class="text-sm text-blue-500 hover:underline">
                            {{ $convention->document_path }}
                        </a>
                    </div>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                        id="file_input"
                        name="file"
                        type="file"
                    >
                    @error("file")
                        <x-error :message="$message" />
                    @enderror
                </div>
                <input
                    type="hidden"
                    name="type"
                    value="{{ $convention->type }}"
                >
            </div>
            <button type="submit" class="text-white bg-[#138942] hover:bg-[#1B5E1F] focus:ring-4 focus:outline-none focus:ring-[#A5D6A7] font-medium rounded text-base w-full px-5 py-2.5 text-center">Atualizar convenção</button>
        </form>
    </div>
@endsection