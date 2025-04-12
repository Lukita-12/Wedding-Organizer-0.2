<x-layout>

    <div class="min-h-screen bg-gray-100 flex">
        <div>
            <aside class="w-64 h-screen bg-white shadow-lg px-6 py-8 space-y-6">
                <div class="flex justify-center border border-dashed rounded-lg">
                    <h1 class="text-2xl font-bold text-gray-800">LOGO</h1>
                </div>
    
                <!-- nav-link -->
                 <nav class="flex flex-col space-y-1">
                     <a href="#" class="poppins text-gray-700 border border-dashed px-4 py-2 rounded-full transition">Dashboard</a>
                     <a href="#" class="poppins text-gray-700 border border-dashed px-4 py-2 rounded-full transition">Accouns</a>
                     <a href="#" class="poppins text-gray-700 border border-dashed px-4 py-2 rounded-full transition">Customer</a>
                 </nav>
    
                 <form method="post" action="#">
                    <button type="submit"
                        class="w-full px-4 py-2 bg-red-500 text-white rounded-lg">
                        Log out
                    </button>
                 </form>
            </aside>
        </div>
    
        <main class="flex-1 p-10 grid place-items-center">

            <div class="w-full">
                <!-- Table Header-->
                <div class="flex justify-between items-center border border-dashed border-slate-300 px-4 py-1">
                    <div class="flex items-center gap-3">
                        <span class="bg-slate-500 w-3 h-3 focus:outline-none rounded-full"></span>
                        <h1 class="poppins-semibold text-xl text-slate-700">Header</h1>
                    </div>

                    <div>
                        <input type="text" placeholder="Search"
                            class="bg-white inter rounded-full px-3 py-1">
                        <label for="filter">Filter: </label>
                        <select name="none" id="none">
                            <option value="">None</option>
                            <option value="All">All</option>
                        </select>
                    </div>
                </div>
                <!-- Table content-->
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-300 rounded-lg">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b border-gray-300">
                                Header 01
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b border-gray-300">
                                Header 02
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-2 text-gray-800">Content 01</td>
                            <td class="px-4 py-2 text-gray-800">Content 02</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-2 text-gray-800">Content 03</td>
                            <td class="px-4 py-2 text-gray-800">Content 04</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Table footer -->
                <div class="flex justify-center items-center border border-dashed border-slate-300 px-4 py-1">
                    links
                </div>
            </div>

                <!-- Form -->
            <div class="w-1/2 space-y-4 border border-dashed rounded-xl px-4 py-2">
                <!-- No name -->
                <div>
                    <label for=""
                        class="block poppins-semibold text-slate-700 text-lg px-3 mb-1">
                        No Name
                    </label>
                    <input type="text"
                        placeholder="No name"
                        class="w-full inter text-slate-900 border border-slate-500/70 rounded-full px-4 py-1">
                </div>
    
                <!-- No last name -->
                <div>
                    <label for=""
                        class="block poppins-semibold text-slate-700 text-lg px-3 mb-1">
                        No last Name
                    </label>
                    <input type="text"
                        placeholder="No last name"
                        class="w-full inter text-slate-900 border border-slate-500/70 rounded-full px-4 py-1">
                </div>
    
                <!-- Select -->
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for=""
                            class="block poppins-semibold text-slate-700 text-lg px-3 mb-1">
                            Select
                        </label>
                        <select type="text"
                            class="w-full inter text-slate-900 border border-slate-500/70 rounded-full px-4 py-1">
                            <option value="">None</option>
                            <option value="Cute!">Cute!</option>
                        </select>
                    </div>
    
                    <div class="w-1/2">
                        <label for=""
                            class="block poppins-semibold text-slate-700 text-lg px-3 mb-1">
                            Select 2.0
                        </label>
                        <select type="text"
                            class="w-full inter text-slate-900 border border-slate-500/70 rounded-full px-4 py-1">
                            <option value="">None</option>
                            <option value="Cute!">Cute!</option>
                        </select>
                    </div>
                </div>
                
                <!-- Textarea -->
                <div>
                    <label for=""
                        class="block poppins-semibold text-slate-700 text-lg px-3 mb-1">
                        Text area
                    </label>
                    <textarea type="text"
                        rows="4"
                        placeholder="Text area"
                        class="w-full inter border border-slate-500/70 rounded-xl px-4 py-1 resize-none">
                    </textarea>
                </div>
    
                <div class="flex justify-end gap-2">
                    <a href="#"
                        class="inline-block w-24 poppins-semibold text-center text-red-500/90 text-lg border border-red-500/90 rounded-lg px-4 py-1">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-teal-500 w-24 poppins-semibold text-center text-slate-100 text-lg rounded-lg px-4 py-1">
                        Simpan
                    </button>
                </div>
    
            </div>

        </main>
    </div>

<div class="flex justify-center" hidden>
    <div class="w-1/2 space-y-4">
        <div>
            <label for="name_test" class="block text-lg poppins-semibold text-gray-700 px-1">
                Name test:
            </label>
            <input type="text"
                name="name_test" id="name_test"
                placeholder="Name test"
                class="w-full text-base px-4 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500/50 focus:border-blue-500">
        </div>

        <div>
            <label for="message" class="block text-lg poppins-semiboldj text-teal-500 px-1">
                Message:
            </label>
            <textarea
                name="message"
                id="message"
                rows="4"
                placeholder="Type your message..."
                class="w-full px-4 py-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500/50 focus:border-blue-500 resize-none"
            ></textarea>
        </div>

        <!-- Button -->
        <div>
            <a href="#"
                class="inline-block w-26 py-1 bg-transparent poppins-medium text-base text-red-500/80 text-center border border-red-500/80 rounded-lg shadow-md
                    focus:outline-none focus:ring-2 focus:ring-red-500/90 focus:ring-offset-1 focus:border-none
                    hover:bg-red-500/80 hover:text-slate-100 transition duration-300 ease-in-out">
                Batal
            </a>
            <button type="submit"
                class="w-26 py-1 bg-blue-600 poppins-medium text-base text-white border border-blue-500 rounded-lg shadow-md
                    hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1
                    transition duration-150 ease-in-out dark:bg-blue-500 dark:hover:bg-blue-600">
                Simpan
            </button>
            <button type="submit"
                class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg
                    hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-100 dark:hover:bg-gray-600">
                Secondary
            </button>
        </div>

        <!-- Name -->
        <div class="space-y-1">
            <label for=""
                class="block poppins-semibold text-lg text-gray-700 px-3">
                Name testing
            </label>
            <input type="text"
                placeholder="Name testing"
                class="w-full border border-gray-300 px-4 py-2 rounded-full
                    focus:shadow-sm focus:shadow-cyan-500/50 focus:outline-none focus:border-teal-500/50">
        </div>

        <div class="space-y-1">
            <label for=""
                class="block poppins-semibold text-lg text-gray-700 px-2">
                Date
            </label>
            <input type="date"
                class="w-full border border-gray-300 px-3 py-2 rounded-xl focus:shadow-md focus:shadow-cyan-500/50 focus:outline-none focus:border-teal-500/50">
        </div>

        <div class="flex flex-row md:flex-col gap-4">
            <div class="space-y-1 w-full">
                <label for=""
                    class="block poppins-semibold text-lg text-gray-700 px-2">
                    Select
                </label>
                <select
                    class="w-full border border-gray-300 px-3 py-2 rounded-xl focus:shadow-md focus:shadow-cyan-500/50 focus:outline-none focus:border-teal-500/50">
                    <option value="">Hello</option>
                    <option value="Cute!">Cute!</option>
                </select>
            </div>
            <div class="space-y-1 w-full">
                <label for=""
                    class="block poppins-semibold text-lg text-gray-700 px-2">
                    Select
                </label>
                <select
                    class="w-full border border-gray-300 px-3 py-2 rounded-xl focus:shadow-md focus:shadow-cyan-500/50 focus:outline-none focus:border-teal-500/50">
                    <option value="">Hello</option>
                    <option value="Cute!">Cute!</option>
                </select>
            </div>
        </div>

        <div class="space-y-1">
            <label for=""
                class="block poppins-semibold text-lg text-gray-700 px-2">
                Address
            </label>
            <textarea
                rows="4"
                placeholder="Your address"
                class="w-full border border-gray-300 px-3 py-2 rounded-xl focus:shadow-md focus:shadow-cyan-500/50 focus:outline-none focus:border-teal-500/50 resize-none">
            </textarea>
        </div>

        <!-- Button/dark -->
        <div>
            <a href="#"
                class="inline-block w-28 py-2 bg-blue-600 poppins-medium text-white text-center rounded-lg shadow-md
                    hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-red-500/60 focus:ring-offset-1
                    transition duration-150 ease-in-out dark:bg-blue-500 dark:hover:bg-blue-600">
                Batal
            </a>
            <button type="submit"
                class="w-28 py-2 bg-blue-600 poppins-medium text-white rounded-lg shadow-md
                    hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1
                    transition duration-150 ease-in-out dark:bg-blue-500 dark:hover:bg-blue-600">
                Simpan
            </button>
            <button type="submit"
                class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg
                    hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-100 dark:hover:bg-gray-600">
                Secondary
            </button>
        </div>

    </div>
</div>

</x-layout>