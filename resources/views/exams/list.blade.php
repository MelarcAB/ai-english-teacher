@extends('layouts.app')
@section('title')
@endsection
@section('content')
    <div class="container mx-auto p-6">







        <h1 class="text-3xl font-bold  text-teal-700">Tus exámenes</h1>
        <div class="container mx-auto p-2">
            <a href="{{ route('home') }}"
                class="
        bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded-lg inline-flex items-center mb-4">
                <i class="fas fa-arrow-left mr-2"></i>
                Volver
            </a>
        </div>


        <div class="w-full overflow-x-auto shadow-md">
            <table class="min-w-full bg-white divide-y divide-gray-200  ">
                <thead class="bg-teal-500 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold uppercase">#</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase">Nivel</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase">Reading</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase">Listening</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase">Writing</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase">Speaking</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase">Fecha</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 divide-y divide-gray-200">
                    @foreach ($exams as $key => $exam)
                        <tr class="hover:bg-gray-100 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($exam->status > 0)
                                    <a href="{{ route('exam.show', $exam) }}"
                                        class="        bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded-lg inline-flex items-center">
                                        <i class="fa-solid fa-eye mr-2"></i> Ver</a>
                                @endif
                                @if ($exam->status == 0)
                                    <i class="fas fa-circle-notch fa-spin fa-lg text-gray-800"></i>
                                    <span class="ml-2 text-gray-800">Generando</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $exam->level }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ substr($exam->reading, 0, 30) }}...</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $exam->listening }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ substr($exam->writing, 0, 25) }}... </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $exam->speaking }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-teal-600">{{ $exam->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
