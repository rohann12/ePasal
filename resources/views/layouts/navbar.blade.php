<nav class="px-6 lg:px-28 py-6 bg-white shadow md:flex md:items-center md:justify-between z-0 overflow-hidden">
    <div
        class="flex items-center justify-center h-20 border-b border-gray-200 bg-gradient-to-r from-green-400 to-teal-600">
        <span class="text-3xl font-semibold text-white  tracking-widest cursor-pointer">
            ePasal
        </span>
    </div>

    <ul
        class="md:flex md:items-center justify-center z-[-1] md:z-0 md:static absolute bg-white w-full left-0 md:w-auto md:py-0 py-4 capitalize md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in">
        <li class="mx-5 my-6 md:my-0">
            <a href="{{ route('index') }}" class="text-base flex items-center justify-center">Home</a>
        </li>
        <li class="mx-5 my-6 md:my-0">
            <a href="#about" class="text-base flex items-center justify-center">About Us</a>
        </li>
        <li class="mx-5 my-6 md:my-0">
            <a href="{{ route('cart') }}" class="text-base flex items-center justify-center">Cart</a>
        </li>
        <li class="mx-5 my-6 md:my-0">
            <a href="{{ route('checkout') }}" class="text-base flex items-center justify-center">Checkout</a>
        </li>
        <li class="mx-5 my-6 md:my-0">
            <a href="#contact" class="text-base flex items-center justify-center">Contact</a>
        </li>
        @auth
        <li class="mx-5 my-6 md:my-0">
            <a href="{{ route('logout') }}" class="text-base flex items-center justify-center">Logout</a>
        </li>
        @else
        <li class="mx-5 my-6 md:my-0">
            <a href="{{ route('login') }}" class="text-base flex items-center justify-center">Login</a>
        </li>
        @endauth
    </ul>
</nav>

<script>
    function Menu(e) {
        let list = document.querySelector('ul');
        if (e.name === 'menu') {
            e.name = "close";
            list.classList.add('top-[70px]', 'opacity-100');
            list.style.backgroundColor = '#01A6DE';
            list.style.zIndex = '9999';
        } else {
            e.name = "menu";
            list.classList.remove('top-[70px]', 'opacity-100');
            list.style.backgroundColor = 'transparent';
            list.style.zIndex = '';
        }
    }
</script>