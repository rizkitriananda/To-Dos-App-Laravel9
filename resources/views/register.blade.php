<!DOCTYPE html>
<html lang="en" data-theme="dim">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Feather Icons end -->
    <title>Sign up</title>
</head>

<body>
    <main class="flex h-screen justify-evenly items-center gap-32">
        <div class="img w-fit hidden md:flex">
            <img src="/img/Login-amico.png" alt="" class="w-[500px]" />
        </div>

        <div class="hidden md:flex absolute top-0 bottom-0 right-0 w-[47%] rounded-s-[20rem] -z-10 bg-[#7E7F9A]"></div>

        <form action="/register" method="post" class="px-4 py-6 sm:px-8 md:px-8 rounded-lg flex flex-col gap-4 w-[90%] md:w-[28rem] sm:w-[28rem]" data-theme="dark">
            @csrf
            <h2 class="text-[28px] font-bold text-center text-[#f5f5f5] mb-7">
                Sign up
            </h2>
            <label class="input input-bordered  @error('email') input-error @enderror flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                    <path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                    <path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                </svg>
                <input type="text" class="grow" placeholder="Email" name="email" required />
            </label>
            @error('email')
            <div class="tooltip tooltip-open tooltip-bottom tooltip-error mb-6 -mt-3" data-tip="{{ $message }}"> </div>
            @enderror
            <label class="input input-bordered @error('username') input-error @enderror flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                </svg>
                <input type="text" class="grow" placeholder="Username" name="username" required />
            </label>
            @error('username')
            <div class="tooltip tooltip-open tooltip-bottom tooltip-error mb-6 -mt-3" data-tip="{{ $message }}"> </div>
            @enderror
            <label class="input input-bordered @error('password') input-error @enderror flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                    <path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" />
                </svg>
                <input type="password" class="grow" value="" placeholder="Password" name="password" required />
            </label>
            @error('password')
            <div class="tooltip tooltip-open tooltip-bottom tooltip-error mb-6 -mt-3" data-tip="{{ $message }}"> </div>
            @enderror
            <button type="submit" class="btn btn-primary mt-2 text-white bg-[#625cd1] tracking-wider">
                SIGN UP
            </button>
            <span class="text-center">Do you have an account?
                <a href="/" class="link link-primary">Sign in</a></span>
        </form>
    </main>

    <script>
        feather.replace();
    </script>
</body>

</html>