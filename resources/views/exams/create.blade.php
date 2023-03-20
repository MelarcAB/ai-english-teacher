@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-5">

        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-5" role="alert">
                <strong class="font-bold">¡Éxito!</strong>
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
        @endif
        @if (session('error'))
            <strong class="font-bold">ERROR!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        @endif


        <div class="bg-white p-5 rounded shadow-lg w-full lg:w-3/4 mx-auto">
            <h1 class="text-2xl font-bold mb-5">Generar Examen</h1>

            <form action="{{ route('exam.generate') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2" for="level">Nivel de Examen</label>
                    <select name="level" id="level"
                        class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500">
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="B1">B1</option>
                        <option value="B2">B2</option>
                        <option value="C1">C1</option>
                        <option value="C2">C2</option>
                    </select>
                </div>
                <div class="bg-yellow-100 border border-yellow-300 text-yellow-900 px-4 py-3 rounded relative mb-5"
                    role="alert">
                    <strong class="font-bold">¡Importante!</strong>
                    <span class="block sm:inline">El proceso de generación del examen puede tardar unos minutos.</span>
                    <span class="block sm:inline mt-2">Una vez generado, podrás ver el examen en la lista de
                        exámenes.</span>
                </div>


                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-indigo-500 text-white font-bold py-2 px-4 rounded-lg focus:outline-none hover:bg-indigo-600">Generar
                        Examen</button>
                </div>
            </form>
        </div>
    </div>
@endsection
