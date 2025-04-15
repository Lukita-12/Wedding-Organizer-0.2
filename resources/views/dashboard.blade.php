<x-layout>

    <x-container.admin-page>
        <x-sidebar.sidebar />

        <x-container.main class="flex flex-col space-y-4">
            <x-header.header />

            <!-- Cards -->
            <div class="border-sketch flex gap-4">

                <x-card-small.container>
                    <x-card-small.icon>handshake</x-card-small.icon>
                    <div class="flex flex-col">
                        <x-card-small.title>PAKET PERNIKAHAN</x-card-small.title>
                        <x-card-small.number>10</x-card-small.number>
                    </div>
                </x-card-small.container>
                <x-card-small.container>
                    <x-card-small.icon>handshake</x-card-small.icon>
                    <div class="flex flex-col">
                        <x-card-small.title>KERJASAMA</x-card-small.title>
                        <x-card-small.number>10</x-card-small.number>
                    </div>
                </x-card-small.container>
                <x-card-small.container>
                    <x-card-small.icon>handshake</x-card-small.icon>
                    <div class="flex flex-col">
                        <x-card-small.title>PERMINTAAN</x-card-small.title>
                        <x-card-small.number>10</x-card-small.number>
                    </div>
                </x-card-small.container>
                <x-card-small.container>
                    <x-card-small.icon>handshake</x-card-small.icon>
                    <div class="flex flex-col">
                        <x-card-small.title>PEMBAYARAN</x-card-small.title>
                        <x-card-small.number>10</x-card-small.number>
                    </div>
                </x-card-small.container>
                
            </div>

            <!-- Content-table -->
            <div class="border-sketch rounded-lg">
                <x-header.container class="px-4">
                    <div class="flex items-center gap-3">
                        <x-header.span-dot />
                        <x-header.h1>PESANAN</x-header.h1>
                        <x-header.button-link href="#">+ Baru</x-header.button-link>
                    </div>
                    <div>
                        <x-header.search type="text" placeholder="Search.." />
                    </div>
                </x-header.container>

                <x-table.table>
                    <x-table.thead>
                        <tr>
                            <x-table.td>Title</x-table.td>
                            <x-table.td>Title</x-table.td>
                            <x-table.td>Title</x-table.td>
                            <x-table.td>Title</x-table.td>
                        </tr>
                    </x-table.thead>
                    <x-table.tbody>
                        <tr>
                            <x-table.td>Data</x-table.td>
                            <x-table.td>Data</x-table.td>
                            <x-table.td>Data</x-table.td>
                            <x-table.td>Data</x-table.td>
                        </tr>
                    </x-table.tbody>
                </x-table.table>

                <div class="px-4 py-2 flex justify-between">
                    <button type="submit" class="bg-sketch-primary w-30 px-3 py-1 poppins-medium text-lg rounded-lg">< Previous</button>
                    <button type="submit" class="bg-sketch-primary w-30 px-3 py-1 poppins-medium text-lg rounded-lg">Next ></button>
                </div>
            </div>

            <!-- Two content table -->
            <div class="flex w-full gap-4">

                <!-- Content-table -->
                <div class="border-sketch w-full rounded-lg">
                    <x-header.container class="px-4">
                        <div class="flex items-center gap-3">
                            <x-header.span-dot />
                            <x-header.h1>PESANAN</x-header.h1>
                            <x-header.button-link href="#">+ Baru</x-header.button-link>
                        </div>
                        <div>
                            <x-header.search type="text" placeholder="Search.." />
                        </div>
                    </x-header.container>

                    <x-table.table>
                        <x-table.thead>
                            <tr>
                                <x-table.td>Title</x-table.td>
                                <x-table.td>Title</x-table.td>
                                <x-table.td>Title</x-table.td>
                                <x-table.td>Title</x-table.td>
                            </tr>
                        </x-table.thead>
                        <x-table.tbody>
                            <tr>
                                <x-table.td>Data</x-table.td>
                                <x-table.td>Data</x-table.td>
                                <x-table.td>Data</x-table.td>
                                <x-table.td>Data</x-table.td>
                            </tr>
                        </x-table.tbody>
                    </x-table.table>

                    <div class="px-4 py-2 flex justify-between">
                        <button type="submit" class="bg-sketch-primary w-30 px-3 py-1 poppins-medium text-lg rounded-lg">< Previous</button>
                        <button type="submit" class="bg-sketch-primary w-30 px-3 py-1 poppins-medium text-lg rounded-lg">Next ></button>
                    </div>
                </div>
                <!-- Content-table -->
                <div class="border-sketch w-full rounded-lg">
                    <x-header.container class="px-4">
                        <div class="flex items-center gap-3">
                            <x-header.span-dot />
                            <x-header.h1>PESANAN</x-header.h1>
                            <x-header.button-link href="#">+ Baru</x-header.button-link>
                        </div>
                        <div>
                            <x-header.search type="text" placeholder="Search.." />
                        </div>
                    </x-header.container>

                    <x-table.table>
                        <x-table.thead>
                            <tr>
                                <x-table.td>Title</x-table.td>
                                <x-table.td>Title</x-table.td>
                                <x-table.td>Title</x-table.td>
                                <x-table.td>Title</x-table.td>
                            </tr>
                        </x-table.thead>
                        <x-table.tbody>
                            <tr>
                                <x-table.td>Data</x-table.td>
                                <x-table.td>Data</x-table.td>
                                <x-table.td>Data</x-table.td>
                                <x-table.td>Data</x-table.td>
                            </tr>
                        </x-table.tbody>
                    </x-table.table>

                    <div class="px-4 py-2 flex justify-between">
                        <button type="submit" class="bg-sketch-primary w-30 px-3 py-1 poppins-medium text-lg rounded-lg">< Previous</button>
                        <button type="submit" class="bg-sketch-primary w-30 px-3 py-1 poppins-medium text-lg rounded-lg">Next ></button>
                    </div>
                </div>

            </div>

        </x-container.main>
    </x-container.admin-page>

</x-layout>