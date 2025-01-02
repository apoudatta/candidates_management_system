<nav class="flex-1">
      <ul class="space-y-2 mt-4">
        <li>
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </li>
        <li>
          <a href="{{ route('candidate.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700"  :active="request()->routeIs('xlupload')">
            XL Upload
          </a>
        </li>
        <li>
          <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">
            Settings
          </a>
        </li>
        <li>
          <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">
            Notifications
          </a>
        </li>
      </ul>
    </nav>