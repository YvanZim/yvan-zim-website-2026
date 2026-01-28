<div class="h-[calc(100vh-100px)]">

    <div class="main_height p-0">

        <div class="md:flex h-full">

            <div class="md:h-full w-full md:w-6/12 bg-white md:flex">
                <div class="inline-block p-8 md:pt-16 md:mt-16">

                    <x-utils.titles.dynamic :section="$section" :isFirstSection="$isFirstSection ?? false"/>

                    {!! $section->content !!}

                    <ul class="color_yellow font-medium">
                        <li class="py-4">
                            <vue-feather type="mail" size="20" class="py-0 pr-2 align-text-top"></vue-feather> <a href="mailto:contact@yvanzim.com">contact@yvanzim.com</a></li>
                        <li class="py-4 ">
                            <vue-feather type="phone" size="20" class="py-0 pr-2 align-text-top"></vue-feather> <a href="tel:+33781564849">07 81 56 48 49</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="h-full w-full md:w-6/12 bg-gray-100">
                <x-forms.enquire />
            </div>

        </div>

    </div>

</div>
