<x-layout>

    <div class="min-h-screen flex">
        <x-admin.sidebar />

        <main class="flex-1">
            <div class="flex justify-between border border-dashed border-gray-500 py-1 mb-4">
                <input type="text" placeholder="Search"
                    class="inter border border-dashed rounded-full px-4">
                @guest
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endguest
                @auth
                    <img src="{{ asset('../public/images/profile-ad.png') }}" alt="profile" class="w-10 h-10 rounded-full">
                @endauth
            </div>

            <div class="border border-dashed rounded-md">
                <div class="flex justify-between px-4 py-1">
                    <h1 class="poppins-semibold text-xl text-gray-700">Header</h1>
                    <input type="text" placeholder="Search"
                        class="border poppins border-dashed rounded-full px-4">
                </div>

                <div>
                    <table class="min-w-full border border-dashed border-gray-300 rounded-lg">
                        <thead>
                            <tr class="border border-gray-300">
                                <td class="px-4 py-2 poppins-medium text-center text-gray-700 border-b border-gray-300">Head 01</td>
                                <td class="px-4 py-2 poppins-medium text-center text-gray-700 border-b border-gray-300">Head 02</td>
                                <td class="px-4 py-2 poppins-medium text-center text-gray-700 border-b border-gray-300">Head 03</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border border-gray-300">
                                <td class="px-4 py-2 inter text-center text-gray-800">Data 01</td>
                                <td class="px-4 py-2 inter text-center text-gray-800">Data 02</td>
                                <td class="px-4 py-2 inter text-center text-gray-800">Data 03</td>
                            </tr>
                            <tr class="border border-gray-300">
                                <td class="px-4 py-2 inter text-center text-gray-800">Data 01</td>
                                <td class="px-4 py-2 inter text-center text-gray-800">Data 02</td>
                                <td class="px-4 py-2 inter text-center text-gray-800">Data 03</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-center py-2">
                    <h1>Footer</h1>
                </div>
            </div>

        </main>
    </div>

</x-layout>