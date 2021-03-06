@auth 

<form method='POST' action="/posts/{{ $post->slug }}/comments" class='border border-gray-200 p-6 rounded-xl'>
    @csrf

    <header class='flex items-center'>
        <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" width='40' height='40' alt="avatar" class='rounded-xl'>
    
        <h2 class='ml-4'>Want to participate</h2>
    </header>
    
    <div class='mt-6'>
        <textarea 
            class='w-full text-sm focus:outline-none focus:ring' 
            placeholder="What're you thinking of?" 
            name="body" 
            id=""
            required
            rows="5"></textarea>

            @error('body')
                <span class='text-xs text-red-500'>{{ $message }}</span>
            @enderror
    </div>
    <div class='flex justify-end mt-6 pt-6 border-t border-gray-200'>
        <x-form.button>Post</x-form.button>
    </div>
</form>
@else
<p class='font-semibold'>
    <a class='hover:underline' href='/login'>Login</a> in to leave a comment
</p>
@endauth