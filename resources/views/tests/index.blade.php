@extends('layouts.app')
@section('title')
@endsection
@section('content')
    <div id="responses-container"
        class="w-full md:flex md:gap-5 h-96  pr-5 pl-5 bg-white shadow-lg rounded-md flex flex-col items-start p-1 overflow-y-auto">
    </div>

    <div class="flex w-full text-center mt-2">
        <p class="uppercase text-gray-500 font-bold">Respondiendo: <span id="actual-search"></span></p>
    </div>







    <div id="loading-spinner" class="fixed top-0 right-0 m-4">
        <div class="bg-black bg-opacity-75 rounded-lg shadow-lg p-4 flex items-center backdrop-blur-lg">
            <i class="fas fa-circle-notch fa-spin fa-lg text-gray-200"></i>
            <span class="ml-2 text-gray-200">Cargando...</span>
        </div>
    </div>

    <nav class="fixed bottom-0 left-0 w-full bg-gray-400 md:h-20 h-1/6 text-white p-4 align-middle">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center md:justify-between items-center">

                <div class="flex flex-wrap items-center md:w-auto w-full">
                    <input id="ta_question" type="text" class="bg-slate-100 rounded-sm p-2 text-black w-5/6 md:w-72 " />
                    <button id="b_send_question"
                        class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
             
            </div>
        </div>
    </nav>
@endsection
