<x-layout>
    <div class="flex min-h-[calc(100dvh-4rem)] items-center justify-center px-4">
        <div class="w-full max-w-md">
            <div class="text-center">
                <h1 class="text-3-xl font-bold tracking-tight">Register Now</h1>
                <p class="text-muted-foreground mt-1">Track your ideas today!</p>
            </div>
            <form method="POST" action="/register" class="mt-10 flex flex-col gap-y-3">
                @csrf
                <div class="space-y-2">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="input mt-3" placeholder="Name">
                </div>
                <div class="space-y-2">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="input  mt-3" placeholder="Email">
                </div>
                <div class="space-y-2">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="input  mt-3" placeholder="Password">
                </div>
                <button type="submit" class="btn mt-6">Register</button>
            </form>
        </div>
    </div>
</x-layout>
