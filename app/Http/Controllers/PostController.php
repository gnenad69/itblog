<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * Funkcija PAGINATE paginira strane a u zagradi je broj postova nakon kojih ide nova strana.
     * Ako je kliknut link kategorije, $post dobija upit da za postove odredjene kategorije (kliknute), prosledi post
     */
    public function index()
    {
        $posts=Post::paginate(4);
        if(isset(request()->category)) {
            $posts = Post::where('category_id', request()->category)->paginate(4);
        }
        $categories=Category::all();
        return view('blog',compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
       return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data=$request->all();
//      promenjiva dodaje user_id
        //auth() je funkcija koja vraca objekat
        //user() je metoda koja sadrzi sve podatke o korisniku (email, id, name, etc)
        //$data['index'] = value na odredjeni (novi ili vec postojeci) dodajemo vrednost
      $data['user_id'] = auth()->user()->id;
      // Model Post poziva staticku metodu create i prosledjuje joj podatke.
     $post= Post::create($data);
      $post->save();
      return redirect(route('home'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * SINGLE POST ZAJEBANCIJA
     */
    public function show(Post $post)
    {
       return view('single_post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
