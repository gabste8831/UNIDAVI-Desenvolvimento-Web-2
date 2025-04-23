<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-purple-800 leading-tight">
                {{ __('Categorias de Contato') }}
            </h2>
            <a href="{{ route('tipocontatos.create') }}" class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold py-3 px-6 rounded-full shadow-lg transform transition-all duration-300 hover:scale-105 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Nova Categoria
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-gray-50 to-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
            <div id="success-message" class="mb-8 bg-green-100 border-l-4 border-green-500 text-green-700 p-5 rounded-lg shadow-md transform transition-all duration-500 animate-pulse">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
            <script>
                setTimeout(() => {
                    const successMessage = document.getElementById('success-message');
                    if (successMessage) {
                        successMessage.classList.add('opacity-0');
                        setTimeout(() => {
                            successMessage.style.display = 'none';
                        }, 500);
                    }
                }, 4000);
            </script>
            @endif

            @if (session('error'))
            <div id="error-message" class="mb-8 bg-red-100 border-l-4 border-red-500 text-red-700 p-5 rounded-lg shadow-md">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            </div>
            <script>
                setTimeout(() => {
                    const errorMessage = document.getElementById('error-message');
                    if (errorMessage) {
                        errorMessage.classList.add('opacity-0');
                        setTimeout(() => {
                            errorMessage.style.display = 'none';
                        }, 500);
                    }
                }, 4000);
            </script>
            @endif

            <div class="bg-white overflow-hidden shadow-xl rounded-2xl">
                <div class="p-8">
                    @if(count($tipocontatos) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($tipocontatos as $tipocontato)
                        <div class="bg-white rounded-xl shadow-md hover:shadow-xl border border-purple-100 transition-all duration-300 overflow-hidden transform hover:-translate-y-1">
                            <div class="p-6 border-b border-purple-100 bg-gradient-to-r from-purple-50 to-indigo-50">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-xl font-bold text-purple-800 cursor-pointer hover:text-purple-600 transition-colors"
                                        onclick="toggleDescription('descricao-{{ $tipocontato->id }}')">
                                        {{ $tipocontato->nome }}
                                    </h3>
                                    <div class="flex space-x-3">
                                        <a href="{{ url("tipocontatos") }}/{{ $tipocontato->id }}/edit"
                                            class="bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-bold py-2 px-3 rounded-lg transition duration-300 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <button onclick="confirmDelete('{{ $tipocontato->id }}')"
                                            class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-2 px-3 rounded-lg transition duration-300 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                        <form id="form-tipocontatos-excluir-{{$tipocontato->id}}"
                                            action="{{route('tipocontatos.destroy',$tipocontato->id)}}"
                                            method="POST" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="descricao-{{ $tipocontato->id }}" class="p-6 bg-white descricao hidden">
                                <p class="text-gray-700 mb-4">
                                    {{ $tipocontato->descricao ?: 'Nenhuma descrição disponível.' }}
                                </p>
                                <div class="mt-3 text-xs text-gray-500 flex justify-between">
                                    <div>
                                        <span class="inline-block bg-purple-100 text-purple-800 rounded-full px-3 py-1 text-xs font-semibold mr-2">
                                            Criado: {{ $tipocontato->created_at->format('d/m/Y') }}
                                        </span>
                                    </div>
                                    <div>
                                        <span class="inline-block bg-indigo-100 text-indigo-800 rounded-full px-3 py-1 text-xs font-semibold">
                                            Atualizado: {{ $tipocontato->updated_at->format('d/m/Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-16">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-purple-300 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <p class="text-xl text-gray-600 mb-4">Nenhuma categoria de contato encontrada</p>
                        <p class="text-gray-500 mb-8">Crie sua primeira categoria para organizar seus contatos</p>
                        <a href="{{ route('tipocontatos.create') }}" class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transform transition-all duration-300 hover:scale-105">
                            Criar primeira categoria
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function toggleDescription(id) {
            const element = document.getElementById(id);
            if (element.classList.contains('hidden')) {
                element.classList.remove('hidden');
                element.classList.add('animate-fadeIn');
            } else {
                element.classList.add('animate-fadeOut');
                setTimeout(() => {
                    element.classList.add('hidden');
                    element.classList.remove('animate-fadeOut');
                }, 300);
            }
        }

        function confirmDelete(id) {
            Swal.fire({
                title: 'Tem certeza?',
                text: "Esta ação não poderá ser revertida!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#6D28D9',
                cancelButtonColor: '#EF4444',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-tipocontatos-excluir-' + id).submit();
                }
            });
        }
    </script>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</x-app-layout>