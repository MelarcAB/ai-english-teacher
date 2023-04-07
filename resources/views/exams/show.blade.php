@extends('layouts.app')
@section('title')
@endsection
@section('content')
    <div class="container mx-auto p-2">
        <a href="{{ route('exam.list') }}"
            class="
    
    bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Volver al listado
        </a>
    </div>


    <div class="container mx-auto px-4 py-5">
        <div class="bg-white p-5 rounded shadow-lg w-full lg:w-3/4 mx-auto">
            <h1 class="text-3xl font-bold mb-5">Examen - Nivel {{ $exam->level }}</h1>
            @if ($exam_correction_generator->id)
                <div>
                    NOTA: {{ $exam_correction_generator->getFinalScore10() }} / 10
                </div>
            @endif

            <form action="{{ route('exam.store') }}" method="POST">
                @csrf
                <input type="hidden" name="exam_id" value="{{ $exam->id }}">

                <div class="mb-5">
                    <h2 class="text-2xl font-semibold mb-3">1. Reading</h2>
                    <div class="mb-5 mt-10">
                        @include('exams.partials.reading_text')
                        @include('exams.partials.reading_1')
                        @include('exams.partials.reading_2')
                    </div>
                    <div class="mb-5 mt-10">
                        <h2 class="text-2xl font-semibold mb-3">2. Gramática</h2>
                        @include('exams.partials.grammar_1')
                        @include('exams.partials.grammar_2')
                    </div>
                    <div class="mb-5 mt-10">
                        @include('exams.partials.writing')
                    </div>

                    <button type="submit" value="save" name="submit"
                        class="bg-indigo-500  text-white font-bold py-2 px-4 rounded-lg focus:outline-none hover:bg-indigo-600">Guardar
                        respuestas</button>
                    @if ($exam->can_be_corrected())
                        <button type="submit" value="correct" name="submit"
                            class="bg-indigo-500 mt-2 text-white font-bold py-2 px-4 rounded-lg focus:outline-none hover:bg-indigo-600">Corregir</button>
                    @endif
            </form>

        </div>
        </form>
    </div>
    </div>
@endsection
