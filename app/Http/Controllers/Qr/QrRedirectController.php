<?php

namespace App\Http\Controllers\Qr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QrRedirectController extends Controller
{

    public $code = [
        '240924' => 'https://yvanzim.com',
        '30092401' => 'https://www.billetreduc.com/356358/evt.htm', // Spectacle au repaire de la comedie
        'avis' => 'https://g.page/r/Cbh2nQt2pK-HEBM/review', // general review cards
        // 'avis' => 'https://www.billetreduc.com/spectacle/yvan-zim-dans-le-delire-des-illusions-356358/avis#reviewContent', // general review cards
        'day6' => 'https://www.youtube.com/watch?v=xjo3PIABpVQ&list=RDxjo3PIABpVQ&start_radio=1' // day6
    ];


    public function __invoke(String $slug)
    {
        if(array_key_exists($slug, $this->code)){
            return redirect($this->code[$slug]);
        }
        else {
            return redirect('https://yvanzim.com/fr/contact');
        }
    }
}
