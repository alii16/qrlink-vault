<!-- CDN TailwindCSS -->
<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-tachometer-alt text-indigo-600 pr-2"></i> {{ __('Dashboard') }}
            </h2>
            <a href="{{ route('profile.edit') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">
                <i class="fas fa-user pr-2"></i> Lihat Profil
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-6 animate-fadeIn">
                <div class="text-center">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">
                        <i class="fas fa-smile-beam text-green-500 pr-2"></i> Selamat Datang di Dashboard!
                    </h3>
                    <p class="text-gray-600">Halo, {{ Auth::user()->name }}! Anda berhasil masuk.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <!-- Card 1 -->
                    <div class="bg-indigo-100 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                        <h4 class="text-indigo-700 font-semibold text-lg mb-2">
                            <i class="fas fa-chart-line pr-2"></i> Statistik Pengguna
                        </h4>
                        <p class="text-gray-700">Lihat statistik aktivitas akun Anda.</p>
                        <a href="#" class="text-indigo-600 mt-3 inline-block hover:text-indigo-800">
                            Lihat Detail →
                        </a>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-green-100 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                        <h4 class="text-green-700 font-semibold text-lg mb-2">
                            <i class="fas fa-cogs pr-2"></i> Pengaturan Akun
                        </h4>
                        <p class="text-gray-700">Kelola informasi akun Anda dengan mudah.</p>
                        <a href="#" class="text-green-600 mt-3 inline-block hover:text-green-800">
                            Ubah Pengaturan →
                        </a>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-red-100 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                        <h4 class="text-red-700 font-semibold text-lg mb-2">
                            <i class="fas fa-sign-out-alt pr-2"></i> Keluar
                        </h4>
                        <p class="text-gray-700">Klik di sini untuk keluar dari akun Anda.</p>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-red-600 mt-3 inline-block hover:text-red-800">
                                Logout →
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Animasi -->
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.8s ease-in-out;
        }
    </style>
</x-app-layout>
