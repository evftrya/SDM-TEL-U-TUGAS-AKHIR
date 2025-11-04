<!-- DUPAK Sidebar Component -->
<aside class="fixed left-0 z-50 flex flex-col w-64 m-12 text-white transition-transform duration-300 ease-in-out rounded shadow-lg top-20 bg-blue-950">

	<!-- Navigation Links -->
	<nav class="flex-1 mt-5 overflow-y-auto">
		<div class="px-4 py-2">
			<a href="{{ route('dupak.dashboard') }}"
				class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('dupak.dashboard') ? 'bg-blue-800' : 'hover:bg-blue-800' }}">
				<div class="flex items-center space-x-3">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
					</svg>
					<span>Dashboard</span>
				</div>
			</a>
		</div>

		<div class="px-4 py-2">
			<a href="{{ route('dupak.pengajuan.index') }}"
				class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('dupak.pengajuan.*') ? 'bg-blue-800' : 'hover:bg-blue-800' }}">
				<div class="flex items-center space-x-3">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
					</svg>
					<span>Pengajuan DUPAK</span>
				</div>
			</a>
		</div>

		<div class="px-4 py-2">
			<a href="{{ route('dupak.riwayat.index') }}"
				class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('dupak.riwayat.*') ? 'bg-blue-800' : 'hover:bg-blue-800' }}">
				<div class="flex items-center space-x-3">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
					</svg>
					<span>Riwayat DUPAK</span>
				</div>
			</a>
		</div>

		@if (auth()->user()->isAdmin)
		<div class="px-4 py-2">
			<a href="{{ route('dupak.validasi.index') }}"
				class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('dupak.validasi.*') ? 'bg-blue-800' : 'hover:bg-blue-800' }}">
				<div class="flex items-center space-x-3">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
					</svg>
					<span>Validasi DUPAK</span>
				</div>
			</a>
		</div>
		@endif
	</nav>

	<!-- User Profile Section -->
	<div class="mt-auto border-t border-blue-800">
		<div class="p-4">
			<div class="flex items-center space-x-3">
				<div class="flex-shrink-0">
					<svg class="w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
						<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
					</svg>
				</div>
				<div class="flex-1 min-w-0">
					<p class="text-sm font-medium text-gray-300 truncate">
						{{ Auth::user()->nama_lengkap }}
					</p>
				</div>
			</div>
		</div>
	</div>
</aside>

<!-- Toggle Button for Mobile -->
<div class="fixed z-30 bottom-4 right-4 md:hidden">
	<button onclick="toggleSidebar()" class="p-3 text-white rounded-full shadow-lg bg-blue-950">
		<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
		</svg>
	</button>
</div>

<script>
	function toggleSidebar() {
		const sidebar = document.querySelector('aside');
		sidebar.classList.toggle('-translate-x-full');
	}

	// Hide sidebar by default on mobile
	if (window.innerWidth < 768) {
		const sidebar = document.querySelector('aside');
		sidebar.classList.add('-translate-x-full');
	}
</script>