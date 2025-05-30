<x-layout>
    <div class="h-screen flex justify-center items-center">
        <div class="bg-slate-200 flex shadow shadow-slate-500/80">
            <div class="w-1/2 bg-[url('/public/images/flower.jpg')] bg-cover bg-center flex justify-center items-center">
                <span class="border-y-2 border-slate-100 border-dashed backdrop-blur-sm poppins-bold text-slate-100 text-5xl text-center py-4">
                    HATMA WEDDING <span class="text-teal-500">ORGANIZER</span>
                </span>
            </div>
    
            <div class="w-1/2 px-12 py-6">
                <x-form.form action="{{ route('login.store') }}">
                    <div class="flex flex-col gap-12">
                        <span class="poppins-semibold text-teal-500 text-center text-4xl">Log In</span>
    
                        <div class="flex flex-col gap-3">
                            <div>
                                <x-form.input type="email" name="email" id="email" :value="old('email')" placeholder="Email..." required />
                                <x-form.error errorFor="email" />
                            </div>
        
                            <div>
                                <x-form.input type="password" name="password" id="password" placeholder="Password..." required />
                                <x-form.error errorFor="password" />
                            </div>
                        </div>
        
                        <div class="flex flex-col gap-1">
                            <a href="{{ route('register') }}" class="poppins text-teal-500 italic underline transition delay-50 duration:300 hover:text-teal-700">Belum punya akun?</a>
                            <button type="submit" class="w-full poppins-semibold bg-teal-500 text-slate-100 text-lg px-3 py-1 transition delay-50 duration:300 hover:bg-teal-700">Log In</button>
                        </div>
                    </div>
                </x-form.form>
            </div>
        </div>
    </div>
</x-layout>