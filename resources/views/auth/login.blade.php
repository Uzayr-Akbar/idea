<x-layout>
    <x-form title="Login" description="Track your ideas today">
        <form method="POST" action="/login" class="mt-10 flex flex-col gap-y-3">
            @csrf
            @method('POST')
            <x-form.field name="email" label="Email" placeholder="example@example.com" type="email"
                value="{{ old('email') }}" />
            <x-form.field name="password" label="Password" placeholder="Password" type="password" />
            <button data-test="Log in" type="submit" class="btn mt-6">Register</button>
        </form>
    </x-form>
</x-layout>
