<link href="/resources/css/api.css" rel="stylesheet">
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    </h2>
    <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded btn-left">
    <a href="{{ url('/ajout') }}" class="">AjoutUser</a>
    </button>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl md:block">
        <table class="w-full shadow-xl">
          <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Id</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Name</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Email</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Role</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr class="bg-white">
              <td class="p-3 font-bold text-blue-500">{{$user->id}}</td>
              <td class="p-3 text-sm text-gray-700">{{$user->name}}</td>
              <td class="p-3 text-sm text-gray-700">{{$user->email}}</td>
              <td class="p-3 text-sm text-gray-700">{{$user->role}}</td>
              <td class="p-3 text-sm text-gray-700">
                <button class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded btn-left">
                Archiver
                </button>
                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded btn-left">
                Valider
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div> 
    </div>
  </div>
</x-app-layout>