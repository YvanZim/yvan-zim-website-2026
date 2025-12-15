<?php
namespace App\Http\Controllers\Pages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Session;

class ShowPageController extends Controller
{

    public function __invoke(Request $request, $parent=null, $section=null, $child=null){

        // French pages
        if( $parent == 'fr' ){

            // Child
            if( isset($section) && isset($child) ){
                $page = Page::where('slug', $section . '/' . $child)->where('lang', 'fr');
            }
            // 1st level
            else if ( isset($section) && !isset($child) ){
                $page = Page::where('slug', $section)->where('lang', 'fr');
            }
            // Home
            else if ( !isset($section) && !isset($child) ){
                $page = Page::where('slug', '')->where('lang', 'fr');
            }

        }

        // English pages
        else if( !isset($child) ) {

            // child
            if( isset($parent) && isset($section) ){
                $page = Page::where('slug', $parent . '/' . $section);
            }
            // 1st level
            else if ( isset($parent) && !isset($section) ){
                $page = Page::where('slug', $parent)->where('lang', 'en');
            }
            // Home
            else if ( !isset($parent) && !isset($section) ){
                $page = Page::where('slug', '')->where('lang', 'en');
            }
        }


        // Return page
        if( isset($page) && $page->exists() ){
//            $page = $page->with(['sections', 'sections.template', 'sections.reviews'])->first();
            //            $page = $this->pageData->handle($page);
            $page = $page->first();
            if($page->live == 1 ){
                //     $request()->session()->put('locale', $page->lang);
                return view('pages.show')->with('page', $page);
            }

        }

        abort(404);

    }
}
