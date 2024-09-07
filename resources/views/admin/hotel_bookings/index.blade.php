<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
                {{ __('Manage Hotel Bookings') }}
            </h2>
            <a href="{{ route('admin.hotel_bookings.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse ($hotel_bookings as $booking)
                <div class="item-card flex flex-row justify-between items-center">
                    <div  class="flex md:flex flex-row items-center w-80 ">
                        <img src="{{ Storage::url($booking->hotel->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[100px] h-[90px] mr-2">
                        <div class="flex flex-col">
                            <h5 class="text-indigo-950 text-md font-bold">{{ $booking->hotel->name }}</h5>
                            <p class="text-slate-600">{{ $booking->hotel->city->name }}, {{ $booking->hotel->country->name }}</p>
                        </div>
                    </div>
                    <div class="flex md:flex flex-col">
                        <p class="text-slate-500 text-sm">Name</p>
                        <h3 class="text-indigo-950 text-md font-bold w-40">
                            {{ $booking->customer->name }}
                        </h3>
                    </div>
                     <div  class="flex md:flex flex-col">
                        <p class="text-slate-500 text-sm">Total Days</p>
                        <h3 class="text-indigo-950 text-md font-bold">
                            {{ $booking->total_day }}
                        </h3>
                    </div>
                    <div  class="flex md:flex flex-col">
                        <p class="text-slate-500 text-sm">Price</p>
                        <h3 class="text-indigo-950 text-md font-bold">
                            Rp. {{ number_format($booking->total_amount, 0, ',', '.') }}/Night
                        </h3>
                    </div>
                    <a href="{{ route('admin.hotel_bookings.show', $booking) }}" class="font-bold py-3 px-4 bg-green-700 text-white rounded-full">
                        Manage
                    </a>
                </div>
                @empty
                    <p class="text-2xl text-red-700 text-center">
                        Data Not Found!
                    </p>
                @endforelse

                <div class="mt-5">
                    {{ $hotel_bookings->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
