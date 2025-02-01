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
    private $ipAddress;

    public function mount(Request $request)
    {

        $this->ipAddress = $request->ip();
        $this->likes = $this->article->likes->count();
        $this->isLikedByUser = $this->getUserHasLikeProduct();
        $this->haveLike = false;
        $this->haveDisLike = false;
    }

    private function getUserHasLikeProduct(): bool
    {
        $hasLike = ProductLike::whereNotNull("ip_address")->where("ip_address", $this->ipAddress)->orWhereNotNull("user_id")->where("user_id", Auth::id())->where("product_id", $this->article->id)->exists();
        // dd( ["hasLike" => $hasLike, "product id" => $this->article->id]);
        return $hasLike;
    }


    public function likeAnArticle()
    {
        // dd($this->ipAddress);
        if (!$this->chechIfHasAlreadyLike()) {
            $like = new ProductLike();
            $like->type = 'yes';
            $like->product_id = $this->article->id;
            $like->user_id = Auth::check() ? Auth::id() : null;
            $like->ip_address = $this->ipAddress;
            $like->save();

            unset($this->isLikedByUser);
            $this->isLikedByUser = true;

            $this->likes = $this->likes + 1;

            unset($this->haveLike);
            $this->haveLike = true;
          //  sleep(5);
         //   unset($this->haveLike);
         //   $this->haveLike = false;

        } else {
            $like = ProductLike::whereNotNull("ip_address")->where("ip_address", $this->ipAddress)->orWhereNotNull("user_id")->where("user_id", Auth::id())->where("product_id", $this->article->id)->first();
            $like->delete();

            $this->likes = $this->likes - 1;

            unset($this->isLikedByUser);
            $this->isLikedByUser = false;

            unset($this->haveDisLike);
            $this->haveDisLike = true;
          //  sleep(5);
          //  unset($this->haveDisLike);
          //  $this->haveDisLike = false;
        }
    }

    private function chechIfHasAlreadyLike()
    {
        $hasAlreadyLike = ProductLike::whereNotNull("ip_address")->where("ip_address", $this->ipAddress)->orWhereNotNull("user_id")->where("user_id", Auth::id())->where("product_id", $this->article->id)->exists();
        return $hasAlreadyLike;
    }


    public function render()
    {
        return view('livewire.article-livewire-component');
    }
}
