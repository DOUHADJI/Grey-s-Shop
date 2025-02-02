<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\ProductLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleLivewireComponent extends Component
{
    public $article;
    public $likes;
    public $isLikedByUser;
    public $haveLike;
    public $haveDisLike;


    public function mount()
    {

        $this->likes = $this->article->likes->count();
        $this->isLikedByUser = $this->chechIfHasAlreadyLike();
        $this->haveLike = false;
        $this->haveDisLike = false;
    }

    public function likeAnArticle()
    {

        if (!$this->chechIfHasAlreadyLike()) {

            $like = new ProductLike();
            $like->type = 'yes';
            $like->product_id = $this->article->id;
            $like->user_id = Auth::check() ? Auth::id() : null;
            $like->ip_address = request()->ip();
            $like->save();

            unset($this->isLikedByUser);
            $this->isLikedByUser = true;

            $this->likes = $this->likes + 1;

            unset($this->haveLike);
            $this->haveLike = true;
        } else {
            $like = ProductLike::whereNotNull("ip_address")->where("ip_address", request()->ip())->orWhereNotNull("user_id")->where("user_id", Auth::id())->where("product_id", $this->article->id)->first();
            $like->delete();

            $this->likes = $this->likes - 1;

            unset($this->isLikedByUser);
            $this->isLikedByUser = false;

            unset($this->haveDisLike);
            $this->haveDisLike = true;
        }
    }

    private function chechIfHasAlreadyLike()
    {
        $hasAlreadyLike = ProductLike::where(function ($query) {
            $query->whereNotNull('ip_address')
                ->where('ip_address', request()->ip())
                ->orWhere(function ($subQuery) {
                    $subQuery->whereNotNull('user_id')
                        ->where('user_id', Auth::id());
                });
        })
            ->where('product_id', $this->article->id)
            ->exists();

        //dd(["article" => $this->article->id, "like" => $hasAlreadyLike]);

        return $hasAlreadyLike;
    }


    public function render()
    {
        return view('livewire.article-livewire-component');
    }
}
