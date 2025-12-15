<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Billetreduc</title>
	<link rel="stylesheet" href="/css/app.css">
    <meta name="robots" content="noindex,nofollow">
    <meta name="google-site-verification" content="-zSieRhDUbdPX8PohZwUx871zsBo1oxpxqim-68z_I0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap"> 
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-80Z7KH82E5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-80Z7KH82E5');
    </script>

    @routes
    
    @vite('resources/js/inertia.js')

</head>
<body>
    <div class="nav_height brand_blue px-5 md:flex z-10 justify-center items-center py-4">
        <img src="https://assets.yvanzim.com/images/yvanzim_logo.png" alt="Yvan Zim" class="object-contain max-h-24">
    </div>

	<div class="container mx-auto p-4">
        <h1 class="text-3xl py-4"> Laissez-moi un avis !</h1>
        <p> Votre avis m’aide énormément à faire découvrir le spectacle ! Voici la manière la plus simple pour y arriver : </p>

        <div class="mb-8">
            <h2 class="text-lg font-medium"> Étape 1 : Créez un compte </h2>
            <!-- <p class=""> Si vous êtes déjà connecté, cliquez directement sur “Laissez un Avis”. </p> -->
            <!-- <p> Le plus simple est de commencer par créer un compte ou de vous connecter. Revenez ensuite sur cette page pour continuer et laisser votre avis.</p> -->
            <a href="https://www.billetreduc.com/v2/clientarea#/Authentication?redirect=%2Fcommandes%3FtabSelectedName%3DEVENTS" target="_blank" rel="noopener noreferrer">
                <button class="brand_yellow hover:opacity-90 text-white font-bold py-2 px-4 rounded">
                    Créez un compte ou connectez-vous
                </button>
            </a>
        </div>

        <div class="mb-8">
            <h2 class="text-lg font-medium"> Étape 2: Revenir sur cette page </h2>
        </div>

        <div class="mb-8">
            <h2 class="text-lg font-medium"> Étape 3 : Laissez un avis </h2>
            <!-- <p> Une fois votre connecté, vous pouvez laisser un avis sur la page du spectacle « Le Délire des Illusions » en cliquant sur le lien ci-dessous :</p> -->
            <!-- <p class=""> Attention, vous ne pourrez pas laisser d'avis sans vous connecter! </p> -->
            <a href="https://www.billetreduc.com/spectacle/yvan-zim-dans-le-delire-des-illusions-356358" target="_blank" rel="noopener noreferrer">
                <button class="brand_blue hover:opacity-90 text-white font-bold py-2 px-4 rounded">
                    Laissez un Avis
                </button>
            </a>
        </div>
        <p>Merci beaucoup pour votre soutien !</p>
    </div>
</body>
</html>
