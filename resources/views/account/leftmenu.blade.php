

<aside>
    <div class="card">
        <article class="card-group-item">
            <header class="card-header"><h6 class="title">{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->firstname}} {{\Illuminate\Support\Facades\Auth::guard('customer')->user()->lastname}}  {{\Illuminate\Support\Facades\Auth::guard('customer')->user()->id}}</h6></header>
            <div class="filter-content">
                <div class="list-group list-group-flush">
                         <a  class="list-group-item" href="{{route('account.customer.car')}}">Araçlarım</a></li>
                         <a  class="list-group-item" href="{{route('account.customer.follow')}}">Takip Ettiklerim</a></li>
                         <a  class="list-group-item" href="{{route('account.customer.buy')}}">Satın Aldıklarım</a></li>
                         <a  class="list-group-item" href="{{route('account.customer.affiliate')}}">Arkadaşına Öner</a></li>
                         <a class="list-group-item" href="{{route('account.customer.tender')}}">İhaleye Katıl</a></li>
                         <a class="list-group-item" href="{{route('account.customer.logout')}}">Oturumu Kapat</a></li>
                  </div>
            </div>
        </article>
    </div>
</aside>
