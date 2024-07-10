<!-- resources/views/components/sidebar.blade.php -->
<div x-data="{ open: true }" class="flex flex-col h-screen bg-gray-800 text-white vh-100">
    <div class="flex items-center justify-between h-16 px-4 bg-gray-900">
        <button @click="open = !open" class="text-gray-300 hover:text-white">
            <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>
    <nav :class="open ? 'block' : 'hidden'" class="flex-1 px-4 py-8">
        <a href="{{ route('admin/products') }}" class="flex items-center px-4 py-2 mt-5 text-gray-300 hover:bg-gray-700 hover:text-white">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4V3H3v7zm0 4v7h4v-7H3zm7-4h4V3h-4v7zm0 4v7h4v-7h-4zm7-4h4V3h-4v7zm0 4v7h4v-7h-4z"></path>
            </svg>
            <span>Dashboard</span>
        </a>
        <a href="{{ url('admin/orders') }}" class="flex items-center px-4 py-2 mt-5 text-gray-300 hover:bg-gray-700 hover:text-white">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4V3H3v7zm0 4v7h4v-7H3zm7-4h4V3h-4v7zm0 4v7h4v-7h-4zm7-4h4V3h-4v7zm0 4v7h4v-7h-4z"></path>
            </svg>
            <span>Orders</span>
        </a>
        <a href="{{ url('admin/products') }}" class="flex items-center px-4 py-2 mt-5 text-gray-300 hover:bg-gray-700 hover:text-white">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4V3H3v7zm0 4v7h4v-7H3zm7-4h4V3h-4v7zm0 4v7h4v-7h-4zm7-4h4V3h-4v7zm0 4v7h4v-7h-4z"></path>
            </svg>
            <span>Products</span>
        </a>
        <a href="{{ url('admin/customers') }}" class="flex items-center px-4 py-2 mt-5 text-gray-300 hover:bg-gray-700 hover:text-white">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4V3H3v7zm0 4v7h4v-7H3zm7-4h4V3h-4v7zm0 4v7h4v-7h-4zm7-4h4V3h-4v7zm0 4v7h4v-7h-4z"></path>
            </svg>
            <span>Customers</span>
        </a>
    </nav>
</div>