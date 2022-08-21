<aside class="side-bar sticky-top">
    <div class="widget widget_categories">
        <h3 class="widget-title">
            <a href="{{route('profil')}}">
            {{\Illuminate\Support\Facades\Auth::guard('customer')->user()->firstname}} {{\Illuminate\Support\Facades\Auth::guard('customer')->user()->lastname}}</h3>
        </a>
        <ul>
            <li class="cat-item cat-item-26"><a href="{{route('account.customer.car')}}">Araçlarım</a></li>
            <li class="cat-item cat-item-36"><a href="{{route('account.customer.follow')}}">Takip Ettiklerim</a></li>
            <li class="cat-item cat-item-43"><a href="{{route('account.customer.buy')}}">Satın Aldıklarım</a></li>
            <li class="cat-item cat-item-43"><a href="{{route('account.customer.affiliate')}}">Arkadaşına Öner</a></li>
            <li class="cat-item cat-item-27"><a href="#">Mesaj Gönder</a></li>
            <li class="cat-item cat-item-27"><a href="{{route('account.customer.tender')}}">İhaleye Katıl</a></li>
            <li class="cat-item cat-item-27"><a href="{{route('account.customer.logout')}}">Oturumu Kapat</a></li>
        </ul>
    </div>

</aside>