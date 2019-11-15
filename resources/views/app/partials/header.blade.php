<header class="w-full border-b border-gray-400 shadow">
    <nav class="w-full flex items-stretch">
        <div class="w-1/4 px-4 py-2">
            {{-- Sidebar part --}}
        </div>

        <div class="w-full flex items-center justify-between px-4 py-2">
            <div></div>

            <div id="user-menu-container" class="relative">
                <button onclick="toggleUserMenu()">
                    {{ Auth::user()->name }}
                </button>

                <div id="user-menu" class="hidden absolute min-w-full p-4 mt-1 bg-gray-100 rounded-lg border border-gray-300 shadow">
                    <ul class="w-full text-center">
                        <li>
                            @livewire('logout')
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

@push('scripts')
    <script>
        function toggleUserMenu() {
            let userMenu = document.getElementById('user-menu');

            if (userMenu) {
                userMenu.classList.toggle('hidden');
            }
        }

        document.addEventListener('click', function (event) {
            let userMenu = document.getElementById('user-menu');
            let container = document.getElementById('user-menu-container');
            if (userMenu && !userMenu.classList.contains('hidden')
                && container && !container.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    </script>
@endpush
