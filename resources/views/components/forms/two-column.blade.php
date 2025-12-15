<form method="post" action="/send">

    @honeypot

    @if (session('success'))
        <div class="p-4 mb-4 bg-green-200 text-green-800 text-md text-center">
            @lang('forms.success')
        </div>
    @endif

    <div class="md:flex pt-3">
            
        <div class="md:w-6/12 md:pe-4" >

            @csrf

            <div class="mb-5">
                <label>@lang('forms.name')*</label>
                <input type="text" name="name" value="{{ old('name') }}" class="shadow appearance-none border-gray-200 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="@lang('forms.name')*"> 
                @error('name')
                    <p class="text-red-600"> {{ $message }} </p>
                @enderror
            </div>

            <div class="md:flex">

                <div class="md:w-6/12 mb-5 md:me-1">
                    <label>@lang('forms.email')*</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="shadow appearance-none border-gray-200 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="@lang('forms.email')*">
                    @error('email')
                        <p class="text-red-600"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="md:w-6/12 mb-5 md:ms-1">
                    <label>@lang('forms.phone')*</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="shadow appearance-none border-gray-200 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="@lang('forms.phone')">
                    @error('phone')
                        <p class="text-red-600"> {{ $message }} </p>
                    @enderror
                </div>

            </div>

            <div class="md:flex">

                <div class="md:w-6/12 mb-5 md:me-1">
                    <label>@lang('forms.date')*</label>
                    <input type="text" name="date" value="{{ old('date') }}" class="shadow appearance-none border-gray-200 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="@lang('forms.date')">
                    @error('date')
                        <p class="text-red-600"> {{ $message }} </p>
                    @enderror    
                </div>

                <div class="md:w-6/12 mb-5 md:ms-1">
                    <label>@lang('forms.location')*</label>
                    <input type="text" name="location" value="{{ old('location') }}" class="shadow appearance-none border-gray-200 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="@lang('forms.location')">
                    @error('location')
                        <p class="text-red-600"> {{ $message }} </p>
                    @enderror    
                </div>

            </div>

        </div>

        <div class="md:w-6/12 md:ps-4">

            <div class="mb-5">
                <label>@lang('forms.message')*</label>
                <textarea type="text"" name="message" value="{{ old('message') }}" rows="9" class="shadow appearance-none border-gray-200 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="@lang('forms.message')*"></textarea>
                @error('message')
                    <p class="text-red-600"> {{ $message }} </p>
                @enderror    
            </div>

        </div>

    </div>

    <button class="py-4 px-5 brand_yellow text-white inline-block uppercase"> @lang('forms.send') </button>

</form>