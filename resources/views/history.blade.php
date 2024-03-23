<!DOCTYPE html>
<html lang="en" data-theme="dark">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <script src="https://unpkg.com/feather-icons"></script>
        <title>To-Do List</title>
    </head>
    <style>
        h1 {
            background-color: #9e9e9e;
        }
    </style>
    <body>
        <!-- Navbar -->
        <div class="navbar bg-base-100 border-b border-[#9e9e9e]">
            <div class="flex-none">
                <div class="dropdown">
                    <div
                        tabindex="0"
                        role="button"
                        class="btn btn-ghost md:hidden"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h8m-8 6h16"
                            />
                        </svg>
                    </div>
                    <ul
                        tabindex="0"
                        class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52"
                        data-theme="dim"
                    >
                        <li>
                            <a href="index.html"
                                ><i data-feather="home" style="width: 18px"></i
                                >Home</a
                            >
                        </li>
                        <li>
                            <details class="dropdown-bottom">
                                <summary class="font-semibold">
                                    <i
                                        data-feather="grid"
                                        style="width: 18px"
                                    ></i
                                    >Category
                                </summary>
                                <ul
                                    class="p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-52"
                                >
                                    <li><a>All</a></li>
                                    <li><a>Learning</a></li>
                                    <li><a>Work</a></li>
                                    <li><a>Personal</a></li>
                                    <li><a>Favourite</a></li>
                                </ul>
                            </details>
                        </li>
                        <li>
                            <a href="#"
                                ><i data-feather="clock" style="width: 18px"></i
                                >History</a
                            >
                        </li>
                        <li>
                            <a href="#"
                                ><i
                                    data-feather="check-square"
                                    style="width: 18px"
                                ></i
                                >Completed</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex-1 navbar-start md:ml-[5rem]">
                <p class="ml-2 text-xl font-semibold">To-Do Lists</p>
            </div>
            <!-- Navbar Large  -->

            <ul class="-mr-[18.5%] hidden md:flex gap-8">
                <li class="">
                    <a
                        href="index.html"
                        class="hover:text-white hover:border-b transition-all duration-150 pb-1 ease-in"
                        >Home</a
                    >
                </li>
                <li class="">
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="m-1">
                            Categories
                        </div>
                        <ul
                            tabindex="0"
                            class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52"
                            data-theme="dim"
                        >
                            <li><a href="category.html">All</a></li>
                            <li><a href="category.html">Study</a></li>
                            <li><a href="category.html">Work</a></li>
                        </ul>
                    </div>
                </li>
                <li class="">
                    <a
                        href="#"
                        class="hover:text-white hover:border-b transition-all duration-150 pb-1 ease-in"
                        >History</a
                    >
                </li>
                <li class="">
                    <a
                        href="#"
                        class="hover:text-white hover:border-b transition-all duration-150 pb-1 ease-in"
                        >Completed</a
                    >
                </li>
            </ul>
            <!-- Navbar Large End -->
            <div class="flex-none"></div>
            <div class="navbar-end md:mr-[5rem]">
                <a class="btn">LOGIN</a>
            </div>
        </div>
        <!-- Navbar End -->

        <header class="p-5 pt-10 flex md:justify-center">
            <h1 class="bg-transparent font-bold text-2xl text-white">
                History
            </h1>
        </header>

        <main class="p-5 flex flex-col gap-5 md:flex-row justify-center">
            <div
                id="card"
                class="bg-[#cddafd] relative text-black p-4 rounded md:w-96 flex flex-col gap-1"
            >
                <a href="" class="absolute right-2 top-1"
                    ><i data-feather="x" style="width: 18px"></i
                ></a>
                <div class="flex justify-between">
                    <div class="mb-2">
                        <span class="badge badge-error text-white font-semibold"
                            >Deleted</span
                        >
                        <small
                            class="date font-semibold text-[#4d4d4d] ml-1 text-xs"
                            >27 Maret 2022</small
                        >
                    </div>
                </div>
                <div class="content text-[#585858]">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Molestiae, ullam!
                </div>
                <small class="mt-2 text-[#292929]"
                    >Created on March 27, 2007</small
                >
            </div>

            <div
                id="card"
                class="bg-[#cddafd] relative text-black p-4 rounded md:w-96 flex flex-col gap-1"
            >
                <a href="" class="absolute right-2 top-1"
                    ><i data-feather="x" style="width: 18px"></i
                ></a>
                <div class="flex justify-between">
                    <div class="mb-2">
                        <span
                            class="badge bg-green-500 border-none text-white font-semibold"
                            >Deleted</span
                        >
                        <small
                            class="date font-semibold text-[#4d4d4d] ml-1 text-xs"
                            >27 Maret 2022</small
                        >
                    </div>
                </div>
                <div class="content text-[#585858]">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Molestiae, ullam!
                </div>
                <small class="mt-2 text-[#292929]"
                    >Created on March 27, 2007</small
                >
            </div>
        </main>
        <script>
            feather.replace();
        </script>
    </body>
</html>
