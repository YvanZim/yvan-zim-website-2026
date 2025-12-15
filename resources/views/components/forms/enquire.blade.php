<form method="post" action="/send" class="p-8">

    @honeypot

    @if (session('success'))
        <div class="p-4 mb-4 bg-green-200 text-green-800 text-md text-center" id="form-success-alert">
            @lang('forms.success')
        </div>
    @endif

    <h3 class="text-xl pb-5 font-medium"> @lang('forms.enquire') </h3>

    @csrf

    <div class="mb-5">
        <input type="text" name="name" value="{{ old('name') }}" class="shadow appearance-none border-gray-200 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="@lang('forms.name')*"> 
        @error('name')
            <p class="text-red-600"> {{ $message }} </p>
        @enderror
    </div>

    <div class="mb-5">
        <input type="email" name="email" value="{{ old('email') }}" class="shadow appearance-none border-gray-200 rounded w-full py-2 px-3leading-tight focus:outline-none focus:shadow-outline" placeholder="@lang('forms.email')*">
        @error('email')
            <p class="text-red-600"> {{ $message }} </p>
        @enderror
    </div>

    <div class="mb-5">
        <input type="text" name="phone" value="{{ old('phone') }}" class="shadow appearance-none border-gray-200 rounded w-full py-2 px-3leading-tight focus:outline-none focus:shadow-outline" placeholder="@lang('forms.phone')">
        @error('phone')
            <p class="text-red-600"> {{ $message }} </p>
        @enderror
    </div>

    <div class="mb-5">
        <input type="text" name="date" value="{{ old('date') }}" class="shadow appearance-none border-gray-200 rounded w-full py-2 px-3leading-tight focus:outline-none focus:shadow-outline" placeholder="@lang('forms.date')">
        @error('date')
            <p class="text-red-600"> {{ $message }} </p>
        @enderror    
    </div>

    <div class="mb-5">
        <input type="text" name="location" value="{{ old('location') }}" class="shadow appearance-none border-gray-200 rounded w-full py-2 px-3leading-tight focus:outline-none focus:shadow-outline" placeholder="@lang('forms.location')">
        @error('location')
            <p class="text-red-600"> {{ $message }} </p>
        @enderror    
    </div>

    <div class="mb-5">
        <textarea type="text"" name="message" value="{{ old('message') }}" rows="6" class="shadow appearance-none border-gray-200 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="@lang('forms.message')*"></textarea>
        @error('message')
            <p class="text-red-600"> {{ $message }} </p>
        @enderror    
    </div>

    <div>
        <button class="py-4 px-5 brand_yellow text-white inline-block uppercase"> @lang('forms.send') </button>
    </div>

</form>


@pushOnce('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Get the success alert element by its ID
    const successAlert = document.getElementById('form-success-alert');

    // Check if the success alert element exists
    if (successAlert) {
        // Hide the alert after 5 seconds (5000 milliseconds)
        setTimeout(function () {
            successAlert.style.display = 'none';
        }, 5000);
    }
});
</script>
@endPushOnce