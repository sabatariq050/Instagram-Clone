<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent text-white rounded-md font-semibold text-xs uppercase tracking-widest 
        hover:bg-black hover:scale-105 focus:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 
        focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-300'
    ]) }}>
    {{ $slot }}
</button>
