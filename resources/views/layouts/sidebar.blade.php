<div class="sidebar w-72 h-full  border-r border-gray-200">
    <div class="flex items-center justify-center h-20 border-b border-gray-200 bg-gradient-to-r from-green-400 to-teal-600">
        <span class="text-3xl font-semibold text-white  tracking-widest cursor-pointer">
            ePasal
        </span>
    </div>
    
    <div class="flex flex-row items-center h-20 ps-8">
        <div class=" h-10 w-10 rounded-full bg-red-200">
            <img src="{{ asset('logos/profile.svg') }}" alt="Profile Photo" class="rounded-full"
                style="height:100%;width:100%;object-fit:cover;">
        </div>
        <div class="flex flex-col ml-4">
            <h3 class="font-bold text-sm ">{{ Auth::user()->name }}</h3>
            <span class="text-gray-300 text-sm">@ {{ Auth::user()->email }}</span>
        </div>
    </div>

    <div id="sidebar" class="flex flex-col gap-y-3 mt-4 sidebar-links text-gray-500 ">
        <div class="flex items-center  h-12">
            <a href="#" class="flex flex-row items-center gap-3 w-full py-4 px-8">
                <object type="image/svg+xml" data="{{ asset('logos/dashboard.svg') }}"></object>
                Dashboard</a>
        </div>

        <div class="flex items-center h-12">
            <a href="{{route('category.index')}}" class="flex flex-row items-center gap-3 w-full py-4 px-8">
                <object type="image/svg+xml" data="{{ asset('logos/category.svg') }}"></object>
                Categories</a>
        </div>
        <div class="flex items-center h-12">
            <a href="{{route('product.index')}}" class="flex flex-row items-center gap-3 w-full py-4 px-8">
                <object type="image/svg+xml" data="{{ asset('logos/product.svg') }}"></object>
                Product</a>
        </div>

        {{-- <div class="flex items-center h-12 ">
            <a href="#" class="flex flex-row items-center gap-3 w-full py-4 px-8">
                <object type="image/svg+xml" data="{{ asset('logos/orders.svg') }}"></object>
                Orders</a>
        </div>

        <div class="flex items-center  h-12">
            <a href="#" class="flex flex-row items-center gap-3 w-full py-4 px-8">
                <object type="image/svg+xml" data="{{ asset('logos/employees.svg') }}"></object>
                Employee Update</a>
        </div>

        <div class="flex items-center  h-12">
            <a href="#" class="flex flex-row items-center gap-3 w-full py-4 ps-8">
                <object type="image/svg+xml" data="{{ asset('logos/clients-and-partners.svg') }}"></object>
                Customers</a>
        </div>

        <div class="flex items-center  h-12">
            <a href="#" class="flex flex-row items-center gap-3 w-full py-4 px-8">
                <object type="image/svg+xml" data="{{ asset('logos/invoice.svg') }}"></object>
                Invoice</a>
        </div>--}}
    </div> 
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            // Get the current page URL
            const currentPageUrl = window.location.href;

            // Get all sidebar links
            const sidebarLinks = document.querySelectorAll('#sidebar a');

            // Loop through each link
            sidebarLinks.forEach(link => {
                if (currentPageUrl.startsWith(link.href)) {
                    link.classList.add('text-teal-500', 'font-bold', 'bg-gray-200',
                        'rounded-lg');
                    const svgObject = link.querySelector('object');
                    if (svgObject) {
                        if (svgObject.contentDocument && svgObject.contentDocument
                            .readyState === 'complete') {
                            // SVG content already loaded
                            applySVGColor(svgObject);
                        } else {
                            // Wait for SVG content to load
                            svgObject.addEventListener('load', function() {
                                applySVGColor(svgObject);
                            });
                        }
                    }
                }
            });
        }, 1000); // 3000 milliseconds = 3 seconds
    });

    function applySVGColor(svgObject) {
        const svgDoc = svgObject.contentDocument;
        if (svgDoc) {
            const svg = svgDoc.querySelector('svg');
            if (svg) {
                const paths = svg.querySelectorAll('path');
                paths.forEach(path => {
                    path.setAttribute('fill', '#10b981');
                });
            }
        }
    }
    function goBack() {
    window.history.back();
}
</script>