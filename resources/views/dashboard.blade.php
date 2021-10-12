<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{url("urls")}}">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <b>{{Auth::user()->name}}, {{__('click here to list your URLs')}} </b>
                    </div>
                </a>
                <a href="{{url("urls/create")}}">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <b>{{Auth::user()->name}}, {{__('click here to enter your URLs')}} </b>
                    </div>
                </a>
        </div>
    </div>
</x-app-layout>
