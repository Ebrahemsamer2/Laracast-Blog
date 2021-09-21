<x-layout>
    <section class="px-6 py-8">

        <main class='max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl'>
            <h1 class='text-center text-xl font-bold'>Register!</h1>
            <form action="/register" method='POST' autocomplete='off' class='mt-10'>
                @csrf 

                <x-form.input name='username' autocomplete='username' />

                <x-form.input name='name' autocomplete='username' />

                <x-form.input name='email' type='email' autocomplete='username' />

                <x-form.input name='password' type='password' autocomplete='new-password' />

                <x-form.button>Register</x-form.button>

                @if( $errors->any() )
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class='text-red-500 text-xs'>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

            </form>
        </main>

    </section>
</x-layout>
