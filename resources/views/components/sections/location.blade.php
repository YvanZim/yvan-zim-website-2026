<div>

    <div class="md:h-[calc(100vh-100px)]">

        <div class="main_height flex flex-wrap h-full items-center md:mt-0 p-0 bg-white">

            <div class="h-96 w-full md:w-6/12 lg:w-7/12 xl:w-8/12 md:h-full bg_show_image" style="background:url('{{$section->image}}')">
                &nbsp;
            </div>

            <div class="w-full p-8 mt-0 md:flex md:w-6/12 lg:w-5/12  md:h-full  xl:w-4/12 xl:px-16 bg-white items-center">
                <div class="pt-0 mt-0">
                    <x-utils.titles.dynamic :section="$section" :isFirstSection="$isFirstSection ?? false"/>
                    <p> Yvan Zim offre une expérience de magie unique et mémorable pour une variété d'événements et d'occasions spéciales. </p>
                    <p> Il ajoute une dose de mystère et d'émerveillement à toutes les occasions, que ce soit un mariage, une fête d'entreprise ou une soirée privée. </p>
                    <p> Yvan combine magie, mentalisme et humour dans ses performances pour vous offrir une expérience captivante. </p>
                    <p> Si vous recherchez un magicien à {{ $section->location }} pour éblouir votre public, Yvan Zim est à votre disposition pour créer une expérience unique et mémorable. </p>
                </div>
            </div>

        </div>

    </div>

    <!--  -->
    <div class="min-h-full bg-gray-100">
        <div class="flex flex-wrap items-center md:mt-0 p-8">
            <div class="w-full" >
                <h3 class="text-xl pb-2 font-medium"> Prendre Contact </h3>
                <p> Pour réserver Yvan pour un spectacle de magie a {{ $section->location }}, ou pour toute information complémentaire, merci de remplir le formulaire, ou d'envoyer un email. </p>
                <x-forms.two-column />
            </div>
        </div>
    </div>
    <!--  -->

    @php
        $reviews = !empty($section->review_ids)
            ? \App\Models\Review::whereIn('id', $section->review_ids)->get()
            : collect();
    @endphp

    <div class="flex flex-wrap mt-0 text-left brand_blue text-white">

        <div class="w-full text-left p-8 lg:px-16">
            <x-utils.titles.h2 content="Témoignages"/>
        </div>

        @foreach($reviews as $review)
            <x-utils.reviews.review :review="$review" />
        @endforeach

    </div>

    <!--  -->
    <div class="flex flex-wrap items-stretch">

        <div class="md:w-7/12">
            <img src="https://assets.yvanzim.com/images/shows/wedding-show.jpeg" alt="Yvan Zim | Mariage" class="object-cover min-h-full">
        </div>

        <div class="md:w-5/12 p-8">
            <h2 class="text-2xl pt-0 mt-0 pb-3"> Magicien mariage {{ $section->location }} </h2>
            <p>Embauchez Yvan Zim pour ajouter une touche de magie à votre mariage à {{ $section->location }} rendra votre journée encore plus inoubliable.</p>
            <p>Avec son expertise en magie close-up et sa capacité à captiver les invités de tous âges, Yvan créera une atmosphère de mystère et d'émerveillement qui animera votre réception de mariage. </p>
            <p>Que ce soit lors du cocktail, du dîner ou de la soirée dansante, son style sympathique et comique garantit que chaque invité se sentira ébloui et divertissement. </p>
            <p>Faites de votre mariage à {{ $section->location }} un événement inoubliable en engageant Yvan Zim, un magicien professionnel qui transformera vos rêves de magie en réalité pour ce jour spécial.</p>
            <x-utils.buttons.primary :url="'/fr/spectacles/mariages'" :label="'En savoir plus'"/>
        </div>

    </div>
    <!--  -->

    <!-- Corporate -->
    <div class="flex flex-wrap-reverse items-stretch">

        <div class="md:w-5/12 p-8 my-0">
            <h2 class="text-2xl pt-0 mt-0 pb-3"> Événements d'Entreprises {{ $section->location }} </h2>
            <p>Embauchez Yvan Zim pour animer un événement d'entreprise à {{ $section->location }} est la clé pour transformer une occasion professionnelle en un moment inoubliable.</p>
            <p>Avec ses compétences en magie close-up et son expérience en animation d'événements d'entreprise, Yvan apporte une dose de mystère et d'émerveillement à vos réunions, fêtes de fin d'année, pots de départ, ou activités de team building.</p>
            <p>Sa magie interactive crée un lien unique entre les collègues, encourageant la camaraderie et l'interaction tout en apportant une touche de divertissement à votre événement.</p>
            <p>Qu'il s'agisse de la magie de proximité pendant le cocktail, d'un spectacle de magie sur scène ou d'une combinaison des deux, Yvan s'adapte aux besoins spécifiques de votre entreprise pour garantir une expérience inoubliable.</p>
            <x-utils.buttons.primary :url="'/fr/spectacles/entreprises'" :label="'En savoir plus'"/>
        </div>

        <div class="md:w-7/12">
            <img src="https://assets.yvanzim.com/images/shows/corporate-show.jpg" alt="Yvan Zim | Événements d'Entreprises" class="object-cover min-h-full">
        </div>

    </div>
    <!--  -->

    <!-- Privés -->
    <div class="flex flex-wrap items-stretch">

        <div class="md:w-7/12">
            <img src="https://assets.yvanzim.com/images/shows/private-show.jpg" alt="Yvan Zim | Événements privés" class="object-cover min-h-full">
        </div>

        <div class="md:w-5/12 p-8">
            <h2 class="text-2xl pt-0 mt-0 pb-3"> Événements privés {{ $section->location }} </h2>
            <p>Embauchez Yvan Zim pour animer un événement privé à {{ $section->location }}, que ce soit un anniversaire, une soirée de départ à la retraite, ou toute autre réunion intime, est la garantie de créer des souvenirs magiques et inoubliables.</p>
            <p>Avec sa magie close-up, Yvan offre une expérience intime qui émerveillera vos invités en les plongeant dans un monde de mystère et d'illusion. </p>
            <p>Sa présence chaleureuse et son sens de l'humour créent une ambiance conviviale et divertissante, transformant votre événement en une expérience unique et personnalisée. </p>
            <p>Que vous souhaitiez une performance de magie pendant le dîner ou des tours de magie de proximité pour un mélange d'interactions intimes, Yvan s'adapte à vos besoins pour rendre votre événement privé inoubliable. </p>
            <x-utils.buttons.primary :url="'/fr/spectacles/privees'" :label="'En savoir plus'"/>
        </div>

    </div>
    <!--  -->

    <!-- Famille -->
    <div class="flex flex-wrap-reverse items-stretch">

        <div class="md:w-5/12 p-8">
            <h2 class="text-2xl pt-0 mt-0 pb-3"> Événements de famille {{ $section->location }} </h2>
            <p>Embauchez Yvan Zim pour animer un événement de famille à {{ $section->location }} est la garantie de créer des souvenirs inestimables pour vous et vos proches.</p>
            <p>Que ce soit pour un anniversaire, une première communion, un départ à la retraite ou toute autre occasion spéciale, Yvan apporte une touche de magie qui ravira les invités de tous âges.</p>
            <p>Sa magie interactive et ses tours de dextérité captivent l'attention de chacun, créant une atmosphère d'émerveillement et de rires.</p>
            <p>Yvan s'adapte aux besoins spécifiques de votre événement, que vous souhaitiez une performance sur scène pour l'ensemble de la famille ou des tours de magie de proximité pour des interactions plus intimes.</p>
            <p>Faites de votre occasion spéciale un moment inoubliable en engageant Yvan Zim, qui saura enchanter vos invités à {{ $section->location }}, et rendre votre évènement inoubliable!</p>
            <x-utils.buttons.primary :url="'/fr/spectacles/familles'" :label="'En savoir plus'"/>
        </div>

        <div class="md:w-7/12">
            <img src="https://assets.yvanzim.com/images/shows/bm-family-show.jpg" alt="Yvan Zim | Événements de famille" class="object-cover min-h-full">
        </div>

    </div>
    <!--  -->


    <!--  -->
    <x-sections.logos section.title="Quelques clients d'Yvan"  />
    <!--  -->


    <!--  -->
    <div class="p-8">

        <div class="md:flex">

            <div class="md:w-3/12 md:px-8">
                <h2 class="text-2xl pt-0 mt-0 pb-2"> Services </h2>
                <p>Yvan Zim propose une variété de services pour répondre aux besoins spécifiques de chaque événement. </p>
            </div>

            <div class="md:w-9/12 md:px-8">

                <x-utils.displays.accordion title="Magic Close-up à {{$section->location}}" tabId="closeUpSection">
                    <p> Embauchez Yvan Zim pour de la magie close-up à {{ $section->location }} est la promesse d'une expérience magique et immersive qui éblouira vos invités.</p>
                    <p> Ce format permet une expérience plus intime et rapprochée. Yvan pourra créer des moments de stupéfaction et d'émerveillement en les plaçant directement entre les mains de votre public. </p>
                    <p> Ses tours de magie impressionnants et sa dextérité incroyable laissent les spectateurs sans voix, créant une ambiance intime et interactive qui rend chaque événement mémorable. </p>
                    <p> Que ce soit lors d'un cocktail, d'un mariage, d'un événement d'entreprise ou d'une soirée privée, Yvan Zim sait comment captiver et divertir, laissant vos invités avec des souvenirs magiques gravés dans leur esprit. </p>
                    <p> Offrez à vos convives une expérience unique en engageant Yvan Zim, le magicien professionnel de à {{ $section->location }} qui apportera une touche d'émerveillement en rapprochant la magie de près.</p>
                </x-utils.displays.accordion>

                <x-utils.displays.accordion title="Magie de scene à {{$section->location}}" tabId="stageSection">
                    <slot name="content">
                        <p> Embauchez Yvan Zim pour de la magie de scène à {{ $section->location }} est la promesse d'un spectacle spectaculaire qui enchantera votre public. </p>
                        <p> La durée du spectacle varie en fonction de vos besoins. Mais en général, Yvan propose des spectacles de 30, 45 ou 1h selon vos besoins. </p>
                        <p> Avec son charisme sur scène et sa maîtrise des illusions, Yvan crée un spectacle captivant qui transporte les spectateurs dans un monde de mystère et d'émerveillement.</p>
                        <p> Que ce soit pour un grand événement d'entreprise, un mariage élégant ou une soirée privée, Yvan Zim sait comment créer une expérience magique inoubliable pour des grandes salles.</p>
                        <p> Ses performances de magie de scène sont soigneusement chorégraphiées pour susciter l'admiration et l'étonnement, laissant une impression durable sur tous ceux qui assistent à son spectacle. </p>
                        <p> Faites de votre événement à {{ $section->location }} une occasion spéciale en engageant Yvan Zim, le magicien professionnel qui apportera une dose de grandeur et d'enchantement à votre soirée.</p>
                    </slot>
                </x-utils.displays.accordion>

                <x-utils.displays.accordion title="Spectacle sur meusure" tabId="customSection">
                    <slot name="content">
                        <p> Si vous avez besoin d’un spectacle personnalisé a vos besoins, n’hésitez pas contactez Yvan qui peut créer des performances sur mesure pour répondre aux besoins et aux préférences spécifiques de chaque client. </p>
                        <p> Que vous organisiez un mariage, un événement d'entreprise, une fête de famille ou une soirée privée, Yvan travaille en étroite collaboration avec vous pour comprendre l'atmosphère que vous souhaitez créer et les éléments que vous aimeriez inclure. </p>
                        <p> Il peut adapter son répertoire de tours, son style de présentation et même les thèmes de ses spectacles pour correspondre à l'essence de votre événement. </p>
                        <p> La personnalisation permet à chaque performance d'être unique et de créer une expérience magique véritablement sur mesure qui laisse une impression durable sur vos invités.</p>
                    </slot>
                </x-utils.displays.accordion>

            </div>

        </div>

    </div>
    <!--  -->


    <!-- Pictures -->
    <x-sections.tile />
    <!--  -->


    <!--  -->
    <div class="md:flex p-8">

        <div class="md:w-4/12 p-8">
            <h2 class="text-2xl pt-0 mt-0 pb-3"> À propos </h2>
            <p>Avec plus de 7 ans d'expérience en tant que magicien professionnel, Yvan Zim a émerveillé des publics en Irlande et en Angleterre avant de déménager en France en 2023.</p>
            <p>Yvan Zim a remporté le titre de meilleur artiste familial d'Irlande en 2022 et a été finaliste du meilleur artiste familial en Angleterre en 2022. Son spectacle "Tangled d'Illusion" été complet au Fringe Festival en Écosse en 2023.</p>
        </div>

        <div class="md:w-4/12 p-8">
            <h2 class="text-2xl pt-0 mt-0 pb-3"> Pour Réserver </h2>
            <p>Le processus de réservation est simple : il suffit de contacter Yvan Zim pour discuter des besoins spécifiques de l'événement, et il peut ensuite proposer une offre personnalisée.</p>
            <p>Le Jour de l’évènement, Yvan arrive généralement 30 minutes avant le début de ses spectacles pour s'assurer que tout est prêt. La préparation pour un spectacle de scène prend environ 15 minutes, tandis que le close-up est prêt presque instantanément.</p>
            <p>Les tarifs de Yvan Zim varie en fonction des besoins spécifiques de l'événement.</p>
        </div>

        <div class="md:w-4/12 p-8">
            <h2 class="text-2xl pt-0 mt-0 pb-3"> {{ $section->location }} et et ces alentours </h2>
            {!! $section->content_two !!}
        </div>

    </div>
    <!--  -->


    <!--  -->
    <div class="flex flex-wrap items-center p-8 lg:px-16 lg:py-8 bg-white">

        <div class="w-full md:w-8/12 lg:w-9/12 xl:w-10/12">
            <h3 class="text-xl font-medium"> Prenez contact </h3>
            <p>Pour réserver Yvan pour votre événement, ou pour toute information complémentaire, merci de remplir le formulaire de contact, ou d'envoyer un email.</p>
        </div>

        <div class="w-full md:w-4/12 lg:w-3/12 xl:w-2/12 md:text-right">
            <x-utils.buttons.primary :url="'/fr/contact'" :label="'Contactez Yvan'"/>
        </div>

    </div>
    <!--  -->


</div>
