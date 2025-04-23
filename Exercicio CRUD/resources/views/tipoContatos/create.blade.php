<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('tipocontatos.index') }}" class="mr-4 bg-white p-2 rounded-full shadow-md hover:shadow-lg transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 hover:text-purple-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h2 class="font-bold text-2xl text-purple-800 leading-tight">
                {{ __('Nova Categoria de Contato') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-gray-50 to-gray-100">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-2xl">
                <div class="p-8">
                    @if ($errors->any())
                    <div class="mb-8 bg-red-50 border-l-4 border-red-500 text-red-700 p-5 rounded-lg">
                        <div class="flex items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="font-bold text-lg">Por favor, corrija os seguintes erros:</span>
                        </div>
                        <ul class="list-disc ml-10 space-y-1">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('tipocontatos.store') }}" method="POST" class="space-y-8">
                        @csrf
                        
                        <div class="space-y-2">
                            <label for="nome" class="block text-lg font-medium text-purple-800">Nome da Categoria <span class="text-red-500">*</span></label>
                            <input type="text" name="nome" id="nome"
                                class="w-full px-4 py-3 rounded-xl border-2 border-purple-200 focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50 transition-all duration-300"
                                value="{{ old('nome') }}" required placeholder="Ex: Cliente, Fornecedor, Parceiro...">
                            <p class="text-sm text-gray-500 mt-1">O nome deve ser único e ter no máximo 80 caracteres.</p>
                        </div>
                        
                        <div class="space-y-2">
                            <label for="descricao" class="block text-lg font-medium text-purple-800">Descrição</label>
                            <textarea name="descricao" id="descricao" rows="5"
                                class="w-full px-4 py-3 rounded-xl border-2 border-purple-200 focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50 transition-all duration-300"
                                placeholder="Descreva o propósito desta categoria...">{{ old('descricao') }}</textarea>
                            <p class="text-sm text-gray-500 mt-1">Forneça uma descrição detalhada para esta categoria (opcional).</p>
                        </div>
                        
                        <div class="flex items-center justify-between pt-6">
                            <a href="{{ route('tipocontatos.index') }}"
                                class="inline-flex items-center px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold rounded-xl transition-all duration-300 transform hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Cancelar
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Salvar Categoria
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>