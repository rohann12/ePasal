<nav class="px-6 lg:px-28 py-6 bg-white shadow md:flex md:items-center md:justify-between z-0 overflow-hidden">
    <div
        class="flex items-center justify-center h-20 border-b border-gray-200 bg-gradient-to-r from-green-400 to-teal-600">
        <span class="text-3xl font-semibold text-white tracking-widest cursor-pointer">
            ePasal
        </span>
    </div>

    <ul
        class="md:flex md:items-center justify-center  z-[-1] md:z-0 md:static absolute bg-white w-full left-0 md:w-auto md:py-0 py-4 capitalize md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in">
        <li class="mx-5 my-6 md:my-0 hover:text-teal-500">
            <a href="{{ route('index') }}" class="text-base flex items-center justify-center">Home</a>
        </li>
        <li class="mx-5 my-6 md:my-0 hover:text-teal-500">
            <a href="{{ route('categories') }}" class="text-base flex items-center justify-center">Categories</a>
        </li>
        <li class="mx-5 my-6 md:my-0 hover:text-teal-500">
            <a href="{{ route('cart') }}" class="text-base flex items-center justify-center">Cart</a>
        </li>
        <li class="mx-5 my-6 md:my-0 hover:text-teal-500">
            <a href="{{ route('checkout') }}" class="text-base flex items-center justify-center">Checkout</a>
        </li>
        <li class="mx-5 my-6 md:my-0 hover:text-teal-500">
            <a href="{{ route('contact') }}" class="text-base flex items-center justify-center">Contact</a>
        </li>
        @auth
        <li class="mx-5 my-6 md:my-0 hover:text-teal-500">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </li>
        @else
        <li class="mx-5 my-6 md:my-0 hover:text-teal-500">
            <a href="{{ route('login') }}" class="text-base flex items-center justify-center">Login</a>
        </li>
        @endauth
    </ul>
</nav>