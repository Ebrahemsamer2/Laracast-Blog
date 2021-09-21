<x-layout>
    <section class="px-6 py-8">

        <main class='max-w-lg mx-auto'>
            <h1 class='text-center text-xl font-bold'>Login!</h1>
            <x-panel>

            
                <form action="/login" method='POST' autocomplete='off' class='mt-10'>
                    @csrf

                    <x-form.input name='email' type='email' autocomplete='username'/>
                    
                    <x-form.input name='password' type='password' autocomplete='new-password'/>

                    <x-form.button>Log in</x-forn.button>

                    @if( $errors->any() )
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class='text-red-500 text-xs'>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                </form>

            </x-panel>


        </main>

    </section>
</x-layout>

