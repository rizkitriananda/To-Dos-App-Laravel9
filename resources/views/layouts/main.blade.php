<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Feather Icons end -->
    <title>To-Do List</title>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar bg-base-100 border-b border-[#9e9e9e]">
        <div class="flex-none">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52" data-theme="dim">
                    <li>
                        <a href="/posts"><i data-feather="home" style="width: 18px"></i>Home</a>
                    </li>
                    <li>
                        <details class="dropdown-bottom">
                            <summary class="font-semibold">
                                <i data-feather="grid" style="width: 18px"></i>Category
                            </summary>
                            <ul class="p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-52">
                                <li><a href="{{ route('categories.index',['categoryName' => 'All']) }} ">All</a></li>
                                <li>
                                    <a href="{{ route('categories.index',['categoryName' => 'Study']) }}">Study</a>
                                </li>
                                <li><a href="{{ route('categories.index',['categoryName' => 'All']) }}">Work</a></li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <a href="{{ route('categories.index', ['categoryName' => 'Completed']) }}"><i data-feather="check-square" style="width: 18px"></i>Completed</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex-1 navbar-start md:ml-[5rem]">
            <p class="ml-2 text-xl font-semibold">To-Do List</p>
        </div>

        <!-- Navbar Large  -->
        <ul class="-mr-[15.5%] hidden md:flex gap-8">
            <li class="">
                <a href="/posts" class="hover:text-white hover:border-b transition-all duration-150 pb-1 ease-in">Home</a>
            </li>
            <li class="">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="m-1">
                        Categories
                    </div>
                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52" data-theme="dim">
                        <li><a href="{{ route('categories.index',['categoryName' => 'All']) }}">All</a></li>
                        <li><a href="{{ route('categories.index', ['categoryName' => 'Study']) }}">Study</a></li>
                        <li><a href="{{ route('categories.index', ['categoryName' => 'Work']) }}">Work</a></li>
                    </ul>
                </div>
            </li>
            <li class="">
                <a href="{{ route('categories.index', ['categoryName' => 'Completed']) }}" class="hover:text-white hover:border-b transition-all duration-150 pb-1 ease-in">Completed</a>
            </li>
        </ul>
        <!-- Navbar Large End -->
        <div class="flex-none"></div>
        <form action="/logout" method="post" class="navbar-end md:mr-[5rem]">
            @csrf
            <button type="submit" class="btn">LOGOUT</button>
        </form>
    </div>
    <!-- Navbar End -->
    {{-- Alert --}}
    @if(session()->has('success'))
    <div role="alert" class="alert alert-success mt-10 w-[87%] mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('success') }} succes </span>
        <button class="btn-alert"><i data-feather="x" style="width: 18px"></i></button>
    </div>
    @endif
    {{-- Alert end --}}

    @yield('heading')

    <main class="p-5 pt-10 flex flex-col gap-5 md:flex-row flex-wrap justify-center md:justify-center  ">

        @yield('container')

    </main>
    <script>
        feather.replace();
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

    <script>
        const alertDeletedSuccess = document.querySelector('.alert');
        const btnAlertDeletSuccess = document.querySelector('.btn-alert');

        btnAlertDeletSuccess.addEventListener('click', function() {
            alertDeletedSuccess.classList.add('hidden');
        })

        function handleCheckboxChange(event) {
            const checkboxStatus = document.querySelector('#checkbox')
            const taskText = document.querySelector('#taskText')
            console.log(event)
            const isChecked = event.target.checked
            const postId = event.target.dataset.postId

            if (isChecked) {
                fetch('/posts/' + 'check/' + postId, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token
                        },
                        body: JSON.stringify({
                            checked: true
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response wa not oke')
                        }
                    })
                    .catch(error => {
                        console.log('There was a problem with the fetch operation:', error)
                    })
            } else {
                fetch('/posts/' + 'check/' + postId, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token
                        },
                        body: JSON.stringify({
                            checked: false
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response wa not oke')
                        }
                    })
                    .catch(error => {
                        console.log('There was a problem with the fetch operation:', error)
                    })
            }
        }
    </script>
</body>

</html>