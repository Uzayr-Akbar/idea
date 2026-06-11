<x-layout>
    <x-form title="Register am account" description="Track your ideas today">
        <form method="POST" action="/register" class="mt-10 flex flex-col gap-y-3">
            @csrf
            @method('POST')
            <x-form.field name="name" label="Name" placeholder="Name" type="text" />
            <x-form.field name="email" label="Email" placeholder="example@example.com" type="email" />
            <x-form.field name="password" label="Password" placeholder="Password" type="password" />
            <button data-test="register" type="submit" class="btn mt-6">Register</button>
        </form>
    </x-form>
</x-layout>


