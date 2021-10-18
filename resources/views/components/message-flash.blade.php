@if(session()->has('success'))
    <div x-data="{show:true}" x-init="setTimeout(() => show = false, 4000)" x-show="show"
         class="fixed bottom-5 right-5 bg-blue-500 text-white text-sm p-4 rounded-2xl">
        <p>{{session('success')}}</p>
    </div>
@endif
