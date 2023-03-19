@extends('layouts.app')
@section('title')
@endsection
@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Lista de exámenes</h1>

        <div class="w-full overflow-x-auto">
            <table class="min-w-full bg-white divide-y divide-gray-200 shadow-md">
                <thead class="bg-teal-500 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold">#</th>
                        <th class="px-6 py-3 text-left font-semibold">Nivel</th>
                        <th class="px-6 py-3 text-left font-semibold">Reading</th>
                        <th class="px-6 py-3 text-left font-semibold">Listening</th>
                        <th class="px-6 py-3 text-left font-semibold">Writing</th>
                        <th class="px-6 py-3 text-left font-semibold">Speaking</th>
                        <th class="px-6 py-3 text-left font-semibold">Fecha</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 divide-y divide-gray-200">
                    @foreach ($exams as $key => $exam)
                        <tr class="hover:bg-gray-100 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap"><a href="{{ route('exam.show', $exam) }}"><i
                                        class="fa-solid fa-eye"></i></a></td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $exam->level }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ substr($exam->reading, 0, 50) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $exam->listening }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $exam->writing }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $exam->speaking }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $exam->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
