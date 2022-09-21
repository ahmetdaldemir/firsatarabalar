@extends('layouts.view')
@section('content')


    <?php
    use Illuminate\Support\Facades\Auth;
    ?>
    <div class="dlab-bnr-inr overlay-primary-dark" style="background-image: url(images/banner/bnr1.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">İhaleye Katıl</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>


    <div class="content-inner" style="background-image: url(images/background/bg1.png);padding-top: 20px">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 m-b30">
                    @include('account.leftmenu')
                </div>
                <div class="col-xl-9 col-lg-9 m-b30">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <form class="form-group" ng-submit="TenderSave()" id="Tender" action="#" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div style="height:300px;overflow: scroll">
                                              <p align="center"><strong>AÇIK ARTIRMA ÜYELİK SÖZLEŞMESİ</strong></p>

<p>İşbu “Açık Artırma Üyelik Sözleşmesi” bir tarafta merkezi adresi VATAN MAHALLESİ 236. CAD. NO:2/1 MERKEZ / ISPARTA adresinde mukim <strong>FIRSAT ARABALAR</strong> (Bundan böyle kısaca <strong>“firsat arabalarihale”</strong> olarak anılacaktır.) ile diğer tarafta <strong>www.firsat arabalarihale.com internet sitesine</strong> (Bundan böyle kısaca <strong>“Site”</strong> olarak anılacaktır.) üye olan internet kullanıcısı (Bundan böyle kısaca <strong>“Üye veya Alıcı”</strong> olarak anılacaktır.) arasında üye olma aşamasında akdedilmiştir. Bundan böyle firsat arabalarihale ve Üye ayrı ayrı <strong>“Taraf”</strong> ve birlikte <strong>“Taraflar”</strong> olarak anılacaktır.</p>

<p>Üye, Site’ye üye olmakla, Sözleşme’nin tamamını okuduğunu, anladığını ve Sözleşme hükümlerini hür iradesiyle onayladığını gayrikabili rücu kabul, beyan ve taahhüt eder.</p>

<p><strong>1. SÖZLEŞMENİN KONUSU :</strong></p>

<p>1.1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; İşbu Sözleşmenin konusu;&nbsp; mülkiyeti firsat arabalarihale’ye ait araçların internet sitesi üzerinden çevrimiçi olarak &nbsp;firsat arabalarihale tarafından açık artırma yolu ile tüzel kişilere satışa sunulmasına dair usul ve esaslar ile &nbsp;Tarafların karşılıklı hak ve yükümlülüklerinin belirlenmesidir. &nbsp;Satışa esas olmak üzere yapılacak işlemler firsat arabalarihale tarafından www.firsat arabalarihale.com adresi üzerinden sanal platform aracılığıyla düzenlenecek ve yürütülecektir.</p>

<p>İşbu Açık Artırma Şartları Sözleşme Tarafları arasındaki bir çerçeve sözleşme niteliğindedir.&nbsp; Üye; her bir satışın kendine özgü gereklilikleri olabileceğini, bu gerekliliklere riayet etmesi ve yasal şartları yerine getirmesi halinde mülkiyetin kendisine geçeceğini, bu gerekliliklerin yerine getirilmesinin tamamen kendi inhisarında olduğunu bildiğini kabul ve taahhüt eder.</p>

<p><strong>1.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yükümlülükten Muafiyet</strong></p>

<p>1.2.1&nbsp;&nbsp;&nbsp; Üye &nbsp;(duruma göre Alıcı) firsatarabalar ihale’yi, diğer üyeler veya üçüncü tarafların haklarının üyelerin internet sitesine koyduğu teklifler ve her türlü içerik yoluyla ihlal edilmesinden dolayı veya üyelerin &nbsp;firsat arabalarihale internet sitesini başka amaçlarla kullanmasından dolayı firsat arabalarihale’ye karşı ileri sürebilecekleri tüm taleplerden beri tutar. Böyle bir halin vukuunda Üye aynı zamanda firsat arabalarihale’nin katlanmak durumunda kalabileceği tüm mahkeme ve avukat masrafları da dahil olmak üzere her tür yasal savunmanın maliyetlerini karşılayacaktır. Anlaşmanın ihlalinden Üyenin sorumlu olmadığı durumlarda, bu madde uygulanmayacaktır.</p>

<p><strong>2 Kayıt, İnternet Platformunun Kullanılması</strong></p>

<p><strong>2.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kayıt Prosedürü</strong></p>

<p>2.1.1&nbsp;&nbsp;&nbsp;</p>

<p>Bir Kullanıcı firsat arabalarihale’nin sunduğu tüm hizmetleri kullanmak için Kullanıcı hesabı açmalı ve kayıt yaptırmalıdır. Kimse firsat arabalarihale’ye kayıt olmakla açık artırmalara katılmaya hak kazanmaz. Kayıt sırasında firsat arabalarihale hiçbir ücret talep etmez. Sadece ihalelere katılabilmek için kredi kartı üzerinden 1500 (binbeşyüz) TL, tutar aktivasyon bedeli alınmaktadır. Bu tutar ihaleden bir aracın tüm hukuki şartları sağlayarak satın &nbsp;alınması halinde araç bedelinden düşülmektedir, araç alımı yapılmadığında sistemden iade talebine basılarak,tutar kredi kartına iade edilir. Aktivasyon bedeli ile bir ihaleden bir araç için işlem yapılabilir. Satıştan cayma durumunda bu 1500 (binbeşyüz )TL lik bu tutar ceza bedeli olarak firsat arabalarihale tarafından alınır. Üye’un bir kullanıcı hesabı açması, bu Açık Artırma Şartlarını kabul etmesi ve firsat arabalarihale’nin Kullanıcıyı ;Üye olarak onaylaması ile gerçekleşir. Kayıt ile firsat arabalarihale ve Üye arasında www.firsat arabalarihale.com internet platformunun kullanımı üzerine bir sözleşme yapılmış olunur.</p>

<p>Kayıt sırasında Üye tarafından firsat arabalarihale’ye verilen bilgiler doğru ve eksiksiz olmalıdır. Kayıt sonrası kullanıcı bilgilerinde bir değişiklik olması halinde, Kullanıcı bu değişikliği en kısa zamanda firsat arabalarihale’ye yazılı olarak bildirmekle yükümlüdür. Üye, üyelik işlemlerinde belirtmiş olduğu kimlik, adres ve iletişim bilgilerinin eksiksiz ve doğru olduğunu, bilgilerinde değişiklik olması halinde bu bilgileri derhal firsat arabalarihale’ye ileteceğini, eksik, güncel olmayan veya yanlış bilgi vermesi nedeniyle ortaya çıkabilecek her türlü hukuki uyuşmazlık ve zarardan sadece kendisinin sorumlu olacağını kabul, beyan ve taahhüt eder. firsat arabalarihale’ye bu ya da benzeri nedenlerle hiçbir sorumluluk izafe edilemez.</p>

<p>Kullanıcı hesabı açarken, üye bir isim ve şifre seçmelidir. Üye, Site'yi kullanırken başkaları tarafından kolay tahmin edilemeyecek bir şifre kullanacağını, kullanıcı adı, şifre vs. bilgilerini başkalarıyla paylaşmayacağını ve bu bilgilerin güvenliğinden bizzat ve sadece kendisinin sorumlu olacağını, bunların ele geçirilmesinden ve bunun zararlarından hiçbir şekilde firsat arabalarihale’nin sorumlu olmayacağını kabul ve beyan eder.</p>

<p>firsat arabalarihale, kontrol ve denetimi altındaki kişisel kimlik, adres, iletişim bilgilerinin kaybolmasını, suistimal edilmesini ve değiştirilmesini engellemek amacıyla makul güvenlik önlemleri almaktadır. Ancak firsat arabalarihale bu bilgilerin güvenliğini hiçbir şekilde garanti etmez. Üye’nin Site’ye aktardığı bilgi ve verileri kendi rızası ile paylaşmakta olup, bu bilgiler gizli bilgi şeklinde yorumlanmayacaktır.</p>

<p>firsat arabalarihale, güvenlik nedeniyle Üye’nin site üzerindeki her türlü aktivitesini izleyebilir, kayda alabilir ve gerekli gördüğünde Site’den uzaklaştırma, üyelik dondurma, üyelik iptal etme ve benzeri her türlü müdahalede bulunabilir. Kullanıcı hesabı dondurulduğunda, Kullanıcı firsat arabalarihale internet sitesini kullanamaz veya firsat arabalarihale’nin açık izni olmadan yeniden kayıt yaptıramaz.</p>

<p>firsat arabalarihale önceden Üye’ye bildirimde bulunmaksızın Site’nin biçim ve içeriğini kısmen veya tamamen değiştirebileceği gibi Site’nin yayın yaptığı alan adını değiştirebilir, farklı alt alan adları kullanabilir, alan adı yönlendirmesi yapabilir veya alan adını kapatabilir.</p>

<p>firsat arabalarihale, dilediği zamanda ve sebep göstermeksizin önceden Üye’ye bilgi vermeksizin Site’de sunduğu hizmetlerin kapsam ve çeşitlerini değiştirebileceği gibi Site’de sunulan hizmetleri kısmen veya tamamen dondurabilir, sona erdirebilir veya tamamen iptal edebilir.</p>

<p>firsat arabalarihale, sözleşmede belirtilen iş ve işlemlerin daha etkin gerçekleştirilebilmesi açısından dilediği zaman hizmet, firsat arabalarihale şartları ve işleyişte değişiklikler ve/veya güncellemeler yapabilir. Üye, bu değişiklikleri kabul ettiğini, bu değişikliklere uygun davranacağını şimdiden kabul ve beyan eder.</p>

<p>İşbu sözleşme firsat arabalarihale’nin online ihale yoluyla satışa sunacağı araç adedi, araç özellikleri, lokasyonu, hizmet ve sair hususlarda hiçbir taahhüt içermez.&nbsp; Üye, bu ve sair nedenlerle firsat arabalarihale’den hiçbir ad altında hak ve alacak talep edemez. firsat arabalarihale üyeliğin tamamlanması için alıcıdan şirket evraklarını isteyebilir, bu evraklar başvurudan sonra bildirilecektir.</p>

<p><strong>2.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; İnternet Platformunun Kullanılması</strong></p>

<p>2.2.1&nbsp;&nbsp;&nbsp; Üyelik, Site’de belirtilen üyelik prosedürünün üye olmak isteyen kişi tarafından yerine getirilerek kayıt işleminin yapılması ile tamamlanır. Üye, üye olmakla, işbu sözleşme hükümlerini, üyeliğe, hizmetlere ve www.firsat arabalarihale.com uygulaması yoluyla ihaleye katılarak aracın satılmak üzere ayrılması şartlarına ilişkin firsat arabalarihale tarafından açıklanan/açıklanacak her türlü beyanı da kabul etmiş olmaktadır.</p>

<p><a name="page3"></a>Üye, Site’de belirtilen hizmetlerden faydalanırken mer’i mevzuata ve genel ahlak kurallarına uygun hareket edeceğini, hakaret, tehdit, iftira, taciz vb. eylemlerde bulunmayacağını, siyasi veya ideolojik propaganda yapmayacağını, diğer üyeleri rahatsız edici davranışlar içine girmeyeceğini, kişi veya kurumları lekeleyici her türlü davranıştan uzak duracağını ve Site'de verilen hizmetlerin aksamasına ya da kesilmesine neden olabilecek her türlü hareketten kaçınacağını aksi halde oluşacak her türlü zarardan bizzat sorumlu olacağını kabul ve taahhüt eder.</p>

<p>Üye, üçüncü şahısların fikri mülkiyet hukuku kapsamındaki haklarını ihlal etmeyeceğini, üçüncü kişilerin telif haklarına saygılı olacağını, haksız rekabette bulunmayacağını ve üçüncü şahısların ticari sırlarına ve özel hayatlarına saygılı olacağını kabul ve taahhüt eder.</p>

<p>Üye, üyelik hesabını üçüncü kişilere devredemez. Ayrıca Üye, firsat arabalarihale’den satın aldığı araçları kendi adına tescil edilmeden kısmen veya tamamen üçüncü kişilere devredemez, devredilmesini talep edemez, araç yalnızca ilgili Üye adına tescil edilecektir.</p>

<p>Üye, başkalarının Site’yi kullanımını kısıtlayamaz, engel olamaz ve Site’nin veya Site’yi kullanılabilir hale getirmek için kullanılan sunucu veya ağların işletimine müdahale edemez.</p>

<p>Üye’nin, bilgisayar donanımını etkileyen virüs saldırılarından ve/veya Site’den edindiği bilgilerden kaynaklanan kayıp ve hasarlar dâhil olmak üzere ancak bunlarla sınırlı olmamak kaydıyla Site’ye erişimine ve kullanımına ilişkin olarak doğrudan veya dolaylı olarak meydana gelebilecek zararlardan firsat arabalarihale sorumlu değildir.</p>

<p>Üye, Site çalışmasına müdahale etmek veya müdahaleye teşebbüs etmek amacıyla herhangi bir alet, yazılım veya araç kullanmayacağını, Site’ye yetkisiz olarak bağlanmayacağını ve işlem yapmayacağını, diğer üye ve internet kullanıcılarının yazılımlarına ve verilerine izinsiz olarak ulaşmayacağını veya bunları kullanmayacağını kabul eder.</p>

<p>Sitede, bu siteden tamamen bağımsız ve firsat arabalarihale’nin kendi kontrolünde olmayan üçüncü kişilere ait başka web sitelerine ait linkler bulunabilir. firsat arabalarihale bu sitelerde bulunan bilgilerin doğruluğu garanti etmez. Bu linkler vasıtasıyla erişilen web sitelerinden sunulan hizmetler/ürünler, işlenen bilgiler veya bunların içeriği hakkında firsat arabalarihale herhangi bir sorumluluğu bulunmamaktadır. Üye’nin bu web sitelerine erişimi tamamen kendi sorumluluğunda ve firsat arabalarihale’nin izni dışındadır.</p>

<p>firsat arabalarihale internet sitelerini kullanırken, Kullanıcı İnternet platformunun işlevini etkileyebilecek herhangi bir cihaz, yazılım veya diğer uygulamalar kullanamaz. Kullanıcı makul olmayan veya aşırı altyapı yüklerine neden olabilecek herhangi müdahalede bulunamaz. firsat arabalarihale İnternet platformunda yer alan içerik, kopyalanamaz, aktarılamaz, kullanılamaz veya çoğaltılamaz. Bu hüküm ayrıca "robot/gezgin"(robot/crawler) arama motoru kopyaları, "ekran kazıyıcı" (screen scraping) ve diğer otomatik cihazlar için de geçerlidir.</p>

<p>firsat arabalarihale internet sitelerinin sayfa yerleşimi sadece firsat arabalarihale’nin önceden yazılı izni ile çoğaltılabilir ve/veya diğer sitelerde kullanılabilir.</p>

<p><strong>2.3 Cezai Şartlar</strong></p>

<p>Üye, ihaleye katılım sonucunda, ihaleyi kazanması neticesinde kendisine ayrılan aracın satın alma&nbsp; ve devir işlemlerini yürütmek üzere kanunen yerine getirmesi gereken işlemleri yerine getirmekten vazgeçmesi veya sözleşmede belirtilen süre içinde bu yükümlülüklerini yerine getirmemesi, &nbsp;veya kanuni yükümlülüklerini yerine getirmek suretiyle satın alacağı ürünün bedelini Sözleşmede belirtilen süreler içinde ödememesi veya eksik ödemesi ve/veya sayılanlarla sınırlı olmamak üzere sair nedenlerle Sözleşme’de belirtilen yükümlülüklerine uymaması hallerinde, firsat arabalarihale’nin uğradığı tüm zararları ve masrafları talep ve dava hakkı saklı kalmak üzere, Üye, KDV dahil 1.500 TL (binbeşyüztürklirası) ceza bedelini daha önce kredi kartıyla ödemiş olduğu ihaleye katılım bedelinden düşmek suretiyle&nbsp; firsat arabalarihale’ye ödemekle yükümlü olduğunu kabul, beyan ve taahhüt eder. Otofirsat arabalarihale, belirtilen cezai şartın yanında Üye’nin Üyeliğini iptal veya askıya alma gibi gerekli gördüğü tedbirleri re’sen almaya yetkilidir. Üye, bu hususa itiraz etmeyeceğini kabul eder. İşbu hükümdeki cezai şart Üye’ye karşı Otofirsat arabalarihale’nin sözleşmeden kaynaklanan tüm haklarına ek olarak uygulanabileceği gibi münferiden de uygulanabilir. Otofirsat arabalarihale sözleşme süresi içerisinde madde içeriğinde, cezai şart bedelinde tek taraflı tasarrufu ile değişiklik yapabilir. İşbu değişiklik internet sitesinde yayınlandığı tarihten itibaren Üye’ye başkaca bir bildirimde bulunmaya gerek olmaksızın kendiliğinden yürürlüğe girecektir.</p>

<p>&nbsp;</p>

<p><strong>3 Bir Açık Artırmada Sözleşme Akdetmek</strong></p>

<p><strong>3.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; firsat arabalarihale Açık Artırma Koşulları</strong></p>

<p>3.1.1&nbsp;&nbsp;&nbsp; Kullanıcılar başka bir kullanıcı hesabı üzerinde teklifler vererek veya üçüncü bir tarafın açık müdahalesi ile bir açık artırmanın gidişini yönlendiremezler. &nbsp;Üye, bu ve benzeri hileli davranışlar ile firsat arabalarihale’nin zararına sebebiyet vermesi halinde, bundan sorumlu olacağını bilir ve taahhüt eder.</p>

<p><strong>3.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Açık Artırma Prosedürü</strong></p>

<p>3.2.1&nbsp;&nbsp;&nbsp; Açık artırmanın başlangıcı, bitişi ve süreci firsat arabalarihale tarafından kontrol edilir. firsat arabalarihale planlanmış açık artırmaları herhangi bir bildirimde bulunmaksızın iptal edebilir veya şartlarını dilediği yönde değiştirebilir. &nbsp;firsat arabalarihale herhangi bir neden öne sürmeksizin tek taraflı olarak satış gerçekleşene kadar her zaman açık artırmayı iptal etme hakkına sahiptir, böyle bir durumda Üye her ne nam altında olursa olsun firsat arabalarihale’den bir talepte bulunmayacaktır.</p>

<p><strong>3.6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Teklif Verme Kuralları, Bağlayıcı Süre</strong></p>

<p>3.6.1&nbsp;&nbsp;&nbsp; Teklif Veren teklif süresi içinde bir para tutarı girerek ya da ekrandaki portallarda yer alan butonları kullanarak teklif yapmalıdır. Tüm teklifler net tutarlar olmak zorundadır. İki teklif veren aynı fiyatı teklif ederse, girilen ilk teklif daha yüksek olarak kabul edilir.</p>

<p>Teklif verenin teklifi daha yüksek bir teklif tarafından geçersiz kılınana kadar bağlayıcıdır. Teklif verenin teklifinin üzerine çıkılmazsa ve minimum fiyat karşılanmazsa, başka bir kural kabul edilmediği sürece, teklif açık artırmanın bitişinden itibaren 48 (kırksekiz) saat boyunca (iş günleri) geçerli kalacaktır.</p>

<p>Sunulan tüm teklifler kaydedilecek ve firsat arabalarihale tarafından saklanacaktır. firsat arabalarihale, tekliflerden kaynaklanan belirsizlikleri, sözleşmenin tüm taraflarını bağlayıcı bir şekilde çözümler, ve bu durumda firsat arabalarihale’nin verdiği kararın bağlayıcı olduğunu Üye kabul, beyan ve taahhüt eder.</p>

<p><strong>3.7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Online ihale yolu ile Satış Anlaşması</strong></p>

<p>3.7.1&nbsp;&nbsp;&nbsp; Açık artırmanın bitiminde ihaleyi kazanan Üye’ye bu husus <strong>e-mail</strong> vasıtasıyla bildirilecektir. Üye’nin üyelik işlemi esnasında belirttiği e-mail hesabına bildirim gönderilmekle, bildirimin Üye’ye ulaştığı kabul edilir. Üye, işbu hususa itiraz edemez.&nbsp;İhaleyi kazandığı bildirilen Üye’ye firsat arabalarihale, Satış Sözleşmesini gönderir. firsat arabalarihale’nin gönderdiği sözleşmeler Üye tarafından baştan sona okunmalı, anlaşılmalı ve içeriğindeki bilgilerin doğruluğu kontrol edilmelidir. Gönderilen bu sözleşmeler aynı zamanda, firsat arabalarihale üzerindeki ilgili kullanıcı hesaplarına da yerleştirilir. Satış anlaşması Üye tarafından ayrı ayrı imzalanır ancak her ikisi birlikte bir tane anlaşma sayılır.</p>

<p>Açık artırma sonucunda ihaleyi kazanan Üye, kendisine faks veya elektronik posta yoluyla gönderilen sözleşme, form ve belgeleri, 2 (iki) gün içinde usulünce imzalamak ve imzalı asıllarını güncel imza sirkülerleri ile birlikte firsat arabalarihale’ye teslim etmek zorundadır. Aksi takdirde 2.3 Cezai Koşullar uygulanır.</p>

<p><strong>4 Teslim Alma ve Alıcının Denetim Hakkı</strong></p>

<p><strong>4.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yer</strong></p>

<p>4.1.1&nbsp;&nbsp;&nbsp; İhaleye konu olan ve Üye tarafından kazanılan ihale sonrasında sözleşmedeki şartları ve yürürlükteki mevzuatın gereklilikleri yerine getirilerek satış ve devir işlemi tamamlanan ürünler Üye tarafından firsat arabalarihale’nin internet sitesinde belirttiği yerden masrafları Alıcı tarafından karşılanacak şekilde teslim alınmalıdır.</p>

<p><strong>4.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Son Teslim Alma Tarihi / Tazminat</strong></p>

<p>4.2.1&nbsp;&nbsp;&nbsp; Üye’ye yazılı olarak ürünü belirtilen yerden teslim alabileceğine dair yapılacak yazılı ihbarın Üye tarafından tebliğ alınmasından itibaren 5 (beş) iş günü içinde ihale ile araç Üye tarafından teslim alınmalıdır. Bu bildirim genellikle &nbsp;satın alma fiyatının tamamının ödemesinin alınmasından sonraki 1 (bir) işgünü içinde verilir.</p>

<p><strong>4.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Üye’nin Kusurlar için Garanti Talepleri</strong></p>

<p><strong>4.3.1&nbsp;&nbsp;&nbsp; Koşullar / Denetim</strong></p>

<p>İkinci el ürünlerin satışı "olduğu gibi satın alma" kuralıyla, başka bir deyişle herhangi bir garanti olmadan yapılır. Bu nedenle aracın açık artırmada açıklanan ürün ile uyumlu olduğunu tespit etmek için, Üye kabul öncesinde aracı tamamen incelemek zorundadır. Araçların varsa ekspertiz bilgileri ve fotoğrafları Site’de yer almakta olup, araç çalışır ve halihazır mevcut durumları ile ihaleye sunulduğundan Üye’nin araca ilişkin bu bilgiler ile araç ile ilgili resmi kayıtlar dahil her türlü incelemeyi yaparak ihaleye katıldığı kabul edilmektedir.Online İhale’den sonra Üye’nin aracı satın alacağı online ihaleye konu araçlar ekspertiz raporuna uygun, olduğu gibi mevcut fiili ve hukuki durumları ile ihaleye çıkarılmıştır. Üye, aracın ekspertiz raporunda belirtilen hususlar ile ilgili olarak Otofirsat arabalarihale’ye karşı araçta eksiklik, ayıp vs. sebeplerden dolayı herhangi bir itiraz, şikayet, iptal, tazminat ve/veya herhangi bir talepte bulunmayacağını gayri kabili rücu olarak kabul, beyan ve taahhüt eder. Üye, aracın adına tescil edilerek kendisine teslim edildiği tarihten itibaren <strong>7 (yedi) gün veya 500 (beş yüz) KM (hangisi önce dolarsa)</strong> içerisinde aracı kontrol ve muayene etmekle yükümlüdür. Araçta ekspertiz raporunda yer almayan arıza/sorunun bulunması durumunda üye arıza/sorunu, aracın adına tescil edilerek kendisine teslim edildiği tarihten itibaren<strong> 7 (yedi) gün veya 500 (beş yüz) KM (hangisi önce dolarsa)</strong> içerisinde ve her hâlde ayıbı öğrenmesini takip eden 8 (sekiz) gün içerisinde, firsat arabalarihale’ye ulaşacak şekilde yazılı olarak bildirmekle yükümlüdür. Bu süre içerisinde firsat arabalarihale’ye ulaşacak şekilde yazılı olarak bildirilmeyen/ulaşmayan arıza/sorunlardan firsat arabalarihale sorumlu değildir. firsat arabalarihale’ye yapılacak bildirimlerin ulaşmasının ardından iddianın yerinde olup olmadığı konusunda tarafların ortak mutabakatı ile belirlenecek bağımsız bir ekspertiz firmasından rapor alacaktır. Üye’nin iddiasının iki taraf tarafından yazılı mutabakat ile tespit edilen ekspertiz firmasının raporu ile ispatlanması ve aracın satıldığı mevcut haline uygun olarak iade edilmesi kaydıyla, Araç firsat arabalarihale tarafından iade alınarak Üye’nin ödemiş olduğu toplam satış bedeli ve belgelenmek kaydıyla resmi alım satım masrafı Üye’ye iade edilecektir. İade nedeniyle firsat arabalarihale’den faiz de dahil olmak üzere ancak bununla sınırlı olmaksızın başkaca hiçbir ad altında hak ve alacak talep edilemez. Belirlenen ekspertiz firmasının tanzim edeceği rapora taraflar itiraz edemez. İadeden kaynaklanan alım satım masrafları firsat arabalarihale’ye aittir. Üye, aracı firsat arabalarihale’nin <strong>aracın teslim alınacağı</strong> işyeri adresinde veya firsat arabalarihale tarafından belirlenecek adreste iade etmekle yükümlüdür. Ayrıca olağan kullanımdan kaynaklanan eskimeler haricinde araçta hasar oluşmuş olması durumunda, firsat arabalarihale aracı iade almakla yükümlü değildir. İade alım yükümlülüğü, aracın alıcı üye adına kayıtlı olması kaydıyla geçerli olup, aracın satılması/el değiştirmesi durumunda firsat arabalarihale aracı iade almakla yükümlü değildir.&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>Vekâleten satılan Araçlar hakkında ayıba ve sair her türlü taleplere ilişkin tüm ihtilaflar Araç maliki ile Üye arasında çözümlenecek olup, firsat arabalarihale’nin vekilin kusur sorumluluğuna ilişkin mevzuat hükümleri dışında bir sorumluluk ve/veya taahhüdü bulunmadığı Taraflar’ca bilinmekte ve kabul edilmektedir.</p>

<p><br>
Aracın online ihale yoluyla rezervasyona sunulduğu mevcut kilometre itibarıyla gelmiş veya gelecek periyodik servis bakımlarından (ekspertiz raporlarında belirtilsin veya belirtilmesin) Üye sorumlu olup, firsat arabalarihale’nin herhangi bir sorumluluğu bulunmamaktadır. Üye, bu nedenle firsat arabalarihale’den herhangi bir ad altında hak ve ödeme talep edemez.&nbsp;<br>
Online İhale ile ihaleyi kazanan Üye’ye rezervasyona sunulan araçların Tramer kaydı sorgulamaları firsat arabalarihale tarafından yapılmamakta olup, firsat arabalarihale’nin bu konuda herhangi bir taahhüdü ve sorumluluğu bulunmamaktadır. Tramer kaydının incelenmesi ve sorgulamasından Üye sorumlu olup, Üye, bu nedenle firsat arabalarihale’den herhangi bir ad altında hak ve ödeme talep edemez. Ayrıca Tramer kayıtlarının eksik/yanlış/hatalı olması durumunda bundan firsat arabalarihale sorumlu tutulamaz.&nbsp;</p>

<p>&nbsp;</p>

<p>Online ihale sonuçlanmış olsa dahi, online ihale sonucunun kesinleşmesi her koşulda firsat arabalarihale’nin onaylaması şartına bağlıdır.<br>
<br>
&nbsp;</p>

<p><strong>Sözleşmenin Taraflarının Diğer Hakları ve Yükümlülükleri</strong></p>

<p><strong>5.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Risk Aktarımı</strong></p>

<p>5.1.1&nbsp;&nbsp;&nbsp; Bir ürün teslim alındığında, ilgili araca ilişkin her türlü zarar ve ziyan riski Üye’ye geçer.</p>

<p><strong>6.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Satın Alma</strong> <strong>Fiyatı ve Vergi</strong></p>

<p>6.1.1&nbsp;&nbsp;&nbsp; Üye için satış fiyatı aksi açıkça belirtilmedikçe ilgili ürünün satışına ilişkin Türkiye Cumhuriyeti’nde geçerli yasal vergi oranını içerir.</p>

<p><strong>6.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ödeme</strong></p>

<p>6.2.1&nbsp;&nbsp;&nbsp; Üye satış fiyatını, ilgili devir masrafları ve hizmet bedelleri (6.3 maddesinde belirtilenler de dahil olmak üzere) ile birlikte ihale bitiş tarihinden itibaren 3(üç) işgünü içinde ve her durumda ilgili Satış Sözleşmesini imzaladıktan sonra ve ürün teslim alınmadan önce, banka transferi yoluyla tam olarak firsat arabalarihale’ye ödemelidir. Ödemenin nasıl yapılacağı ile ilgili gerekli yönlendirmeler sitede yer alan Ödeme İşlemleri başlığı altında yer almaktadır. firsat arabalarihale bu süre içinde ödemesi yapılmayan ürünleri başka bir yerde satışa koyabilir. Bu durumda 2.3 Cezai Şartlar maddesi uygulanır. Bu şartlara uyulmaması halinde, firsat arabalarihale ek zarar ziyan talebinde bulunabilir.</p>

<p>Tam ödeme gerçekleşene kadar ürünler firsat arabalar Otomotiv’in mülkiyetinde kalacaktır. Ödemeler yapıldıktan sonra mülkiyetin Üye üzerine geçmesi için Üye tarafından yasal mevzuat kapsamında yapılması gereken noter devir işlemlerinden de kendisi sorumludur.</p>

<p>Araçların Üye adına devir ve tescili ile ilgili her türlü vergi, resim, harç ve yükümlülükler <strong>Üye’ye </strong>aittir.</p>

<p><strong>6.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hizmet Bedeli</strong></p>

<p>firsat arabalarihale’nin ihaleye sunulan araca ilişkin olarak talep ettiği hizmet bedelleri aşağıdaki şekildedir.&nbsp; Bu hizmetler aşağıdaki maddeleri kapsamaktadır. firsat arabalarihale bu tutarları gerekli gördüğü durumlarda tek taraflı olarak değiştirme hakkını saklı tutar.</p>

<p>Noter ve Müşavirlik ve Sistem Kullanım Bedeli (KDV Dahil): 1.000₺</p>

<p>Plaka Değişikliği ile Noter ve Müşavirlik ve Sistem Kullanım Bedeli (KDV Dahil): 1.200₺</p>

<p>Yanlış anlaşılmaya mahal vermemek üzere; söz konusu ihalenin kazanılması, firsat arabalarihale’nin bu hususta Üye’ye bilgi vermesi, firsat arabalarihale’ye Üye tarafından söz konusu hizmet bedelinin ödenmesi firsat arabalarihale ile Üye arasında satış sözleşmesi kurulduğu anlamını taşımaz, aracın mülkiyetinin Üye’ye geçmesini sağlamaz. Karayolları Trafik Kanunu’nun ilgili maddesi gereğince, tescil edilmiş araçların her çeşit satış ve devirleri, noterler tarafından yapılır. Bu nedenle, konu aracın satış sözleşmesi ve/veya devri, tarafların veya vekillerin bir araya gelmesi suretiyle<u> noter huzurunda yapılmaktadır.</u> Araç satış ve devir işlemlerinin yapılması için <strong>Üye</strong> bizzat kendisi veya usulüne göre yetkilendirilmiş vekili firsat arabalarihale tarafından bildirilecek tarihte ve noterlikte hazır bulunacaktır.</p>

<p>&nbsp;<br>
Noter satışı ve trafik tescil işlemlerinin tamamlanmasının ardından araç, Site’de yer alan teslimat ekranında Üye’nin seçeceği tarihler içerisinde, aracın bulunduğu adreste (ilan sayfasında belirtilmektedir) alıcı Üye’ye teslim edilecektir. Üye’den kaynaklanan gecikmelerden firsat arabalarihale sorumlu değildir. Noter satışı ve trafik tescil işlemleri sonuçlanmadan araçlar alıcı Üyelere teslim edilmezler.&nbsp;<br>
<br>
Vekaleten satılan araçlar ile ilgili, araç sahibi müşterinin alım satım işlemlerinin gerçekleştirilebilmesi için gerekli yükümlülüklerini yerine getirmemesi ve/veya gerek online ihale aşamasında gerekse online ihale sonuçlandıktan sonra satıştan kaçınması/cayması ve/veya vekaletname vermemesi veya vekaletnameyi kısmen veya tamamen iptal etmesi, azletmesi vb. gibi hallerden firsat arabalarihale sorumlu tutulamaz. Bu durumda firsat arabalarihale online ihale gerçekleşmiş/onaylanmış olsa dahi &nbsp;ihaleyi tek taraflı olarak iptal etme hakkına sahiptir. Üye, bu sebeplerden dolayı firsat arabalarihale’den herhangi bir hak, alacak, tazminat ve/veya herhangi bir talepte bulunamaz; ancak Hizmet Bedeli talep halinde iade edilir.&nbsp;</p>

<p><strong>7. FİKRİ MÜLKİYET HAKLARI</strong></p>

<p><br>
7.1.Site’nin sunumu ve tüm içeriği T.C. Mevzuatı ve fikri mülkiyet mevzuatı tarafından korunmakta olup, bu sitedeki tüm ticari markalar, logolar ve hizmet işaretleri başta olmak üzere, yayınlanan tüm bilgi ve veriler firsat arabalarihale ve/veya lisans verenlere aittir. Üye, firsat arabalarihale’nin yazılı onayı olmadan, doğrudan veya dolaylı olarak aynen ya da başka bir şekilde Site’nin içeriği dağıtamaz, iletemez, değiştiremez, kopyalayamaz, görüntüleyemez, çoğaltamaz, yayınlayamaz, işleyemez veya başka bir şekilde kullanamaz veya başkasının Site'nin hizmetlerine erişmesine veya kullanmasına izin veremez. Aksi takdirde, firsat arabalarihale’nin uğradığı/uğrayacağı her türlü zarar ile lisans verenler de dahil ancak bunlarla sınırlı olmaksızın, üçüncü kişilerin uğradıkları zararlardan dolayı firsat arabalarihale’den talep edilen her türlü tazminat tutarını, Üye firsat arabalarihale’ye ödemekle sorumlu olacaktır.&nbsp;<br>
<br>
7.2. firsat arabalarihale’nin, Site hizmetleri, Site bilgileri, Site'nin telif haklarına tabi çalışmaları, Site'nin ticari markaları, Site'nin ticari görünümü veya Site'ye ilişkin her türlü maddi ve fikri mülkiyet hakları da dahil tüm malvarlığı, ayni ve şahsi hakları, ticari bilgi ve know-how'a yönelik tüm hakları saklıdır.</p>

<p>&nbsp;</p>

<p>7.3. Sitede yer alan bütün yazıların, grafiklerin, görsellerin ve tüm resimlerin her hakkı saklıdır, izinsiz tasarruf edilemez.</p>

<p>&nbsp;</p>

<p>7.4. Site içeriğine, tasarımına ve yazılımına ilişkin tüm mali hakların izinsiz kullanımı (işleme, çoğaltma, yayma, temsil ve umuma arz) bunlarla sınırlı olmamak üzere her türlü izinsiz ifşa ve kullanım, fikri ve sınai mülkiyet haklarının ihlali anlamına gelecektir.&nbsp;<br>
<br>
7.5.Üye’ler, Site'nin kullanımında Türk Borçlar Kanunu, Türk Ceza Kanunu, Fikir ve Sanat Eserleri Kanunu, Türk Ticaret Kanunu, Sınai Mülkiyet Kanunu ve cari ve/veya ileride yürürlüğe girecek olan her türlü mevzuat hükümlerine uygun davranacaklarını kabul ve taahhüt ederler. Aksi kullanım sebebiyle doğabilecek hukuki, idari, cezai ve mali her türlü sorumluluk Üye’ye ait olup firsat arabalarikinciel.com 'un rücu hakkı saklıdır.&nbsp;<br>
<br>
<strong>8. SORUMLULUK&nbsp;</strong></p>

<p><br>
8.1. Üye, Site’de sunulan/yayınlanan bilgi ve hizmetlerde eksiklik, iletişim sorunları, teknik problemler, altyapı ve internet arızaları, elektrik kesintisi, siber saldırılar, bağlantı hızı, sunucu, veri tabanı problemleri ve/veya sayılanlarla sınırlı olmaksızın başkaca problemler olabileceğini kabul etmekte olup, bu tür problemler/arızalar oluşması durumunda ve/veya Üye’nin işbu sözleşmede belirtilen yükümlülüklerden herhangi birine aykırı davrandığının tespiti halinde ve/veya herhangi bir sebebe dayanmaksızın firsat arabalarihale gerek online ihale başlamadan önce, gerek online ihale esnasında veya online ihale sonuçlanmış olsa dahi Üye’ye herhangi bir bildirimde bulunmaya gerek olmaksızın ve sebep göstermeksizin Online İhale yoluyla yapılan Rezervasyon’u durdurmaya veya sona erdirmeye veya iptal etmeye veya online ihale sonucunu onaylamamaya yetkilidir.</p>

<p><br>
8.2.Online ihale sonucunun firsat arabalarihale tarafından onaylanmış olması, firsat arabalarihale tarafından daha sonra tespit edilecek aykırılıklar bakımından, Üye’nin sorumluluğunu ortadan kaldırmaz. firsat arabalarihale bu nedenle uğradığı zararlarını Üye’den talep etmeye yetkilidir.&nbsp;<br>
<br>
8.3. firsat arabalarihale, Üye’nin sitede yer alan herhangi bir ürün ya da hizmeti kullanmasından kaynaklanacak doğrudan ve/veya dolaylı hasarlardan sorumlu tutulamaz. Üye, hizmeti ya da siteyi kullanması sonucunda ortaya çıkabilecek her türlü hasar ve zarardan bizzat kendisinin sorumlu olduğunu kabul ve beyan eder.</p>

<p><br>
<strong>9. MÜCBİR SEBEPLER</strong></p>

<p><br>
Doğal afet, isyan, savaş, grev, iletişim sorunları, teknik problemler, altyapı ve internet arızaları, elektrik kesintisi, siber saldırılar, bağlantı hızı, sunucu, veri tabanı problemleri ve kötü hava koşulları da dâhil ve fakat bunlarla sınırlı olmamak kaydıyla, firsat arabalarihale’nin makul kontrolü haricinde ve gerekli özeni göstermesine rağmen önleyemediği, kaçınılamayacak haller olan "Mücbir Sebep" durumlarında; firsat arabalarihale, işbu sözleşme ile belirlenen yükümlülüklerinden herhangi birini geç veya eksik ifa etme veya hiç ifa etmeme hakkına sahiptir. Zira işbu Mücbir Sebep süresince firsat arabalarihale’nin yükümlülükleri askıya alınır. Bu ve bunun gibi durumlarda, firsat arabalarihale’ye gecikme, eksik ifa etme veya ifa etmeme veya temerrüt addedilmeyecektir. Bu durumlar için firsat arabalarihale’den her ne nam altında olursa olsun herhangi bir tazminat talep edilemeyecektir. Mücbir sebep halinin 7 (yedi) günden fazla sürmesi halinde firsat arabalarihale, dilerse işbu Sözleşme'yi herhangi bir bildirime gerek olmaksızın tazminatsız ve tek taraflı olarak feshetmeye yetkilidir.&nbsp;</p>

<p><br>
<strong>10. HÜKÜMLERDE DEĞİŞİKLİK</strong></p>

<p><br>
firsat arabalarihale, sözleşmede belirtilen iş ve işlemlerin daha etkin gerçekleştirilebilmesi açısından yapacağı değişiklikler ile hizmet kapsamında yapacağı değişiklikler nedeniyle ve ayrıca gördüğü lüzum üzerine Üye’ye bildirimde bulunmaya gerek olmaksızın ve sebep göstermeksizin üyelik ve ihale şartlarında tek taraflı olarak değişiklik yapma hakkına sahiptir. Üye, &nbsp;bahse konu değişiklikleri Site’de yayınlandığı andan itibarenüyeliğinin başladığı andan itibaren katılacağı her ihalede firsat arabalarihale sitesinde yer alan üyelik ve ihale şartlarına ilişkin bilgilendirmeleri en baştan okuyup kontrol ederek ihaleye katılacağını, her ihaleye katılım işleminde bu bilgilendirmeleri okuyup varsa değişiklikleri kabul ederek ihaleye katıldığının kabul edileceğini, değişikliklerin uygun olmaması halinde üyelik işlemini sona erdirebileceğini veya ihaleye katılım sağlamaması gerektiğini bildiğini, ihaleye katılım işleminden sonra bu değişikliklerden haberdar olmadığına dair itiraz ileri süremeyeceğini gayri kabili rücu olarak kabul, beyan ve taahhüt eder.&nbsp;<br>
<br>
<strong>11. SÖZLEŞMENİN SÜRESİ, FESİH VE ÜYELİK İPTALİ</strong></p>

<p><br>
11.1. İşbu sözleşme Site’de onaylandığı andan itibaren yürürlüğe girer ve firsat arabalarihale’nin Üye’nin üyeliğini iptal etmesi ve/veya Site’de sunulan hizmetleri sona erdirmesi ile birlikte başkaca bildirime gerek olmaksızın kendiliğinden sona erer.&nbsp;<br>
<br>
11.2. Üye'nin işbu sözleşmeden kaynaklanan yükümlülüklerinden herhangi biri veya tamamına kısmen veya tamamen aykırı davranması durumunda firsat arabalarihale, herhangi bir bildirime gerek olmaksızın ve gerekçe göstermeksizin tek taraflı olarak işbu sözleşmeyi feshederek Üye'nin üyeliğini iptal edebilir ve Üye'nin siteden aldığı, almakta olduğu ya da alacağı hizmetleri, verdiği teklifleri, kazandığı Online ihale’yi kısmen veya tamamen dondurulabilir veya iptal edebilir. Bu nedenle fesih durumunda Üye firsat arabalarihale’den hiçbir hak ve talepte bulunamaz. firsat arabalarihale doğmuş/doğacak her türlü zararını Üye’den talep etmeye yetkilidir. firsat arabalarihale işbu zararlarını Üye’nin vermiş olduğu Hizmet Bedeli’ni herhangi bir bildirime gerek olmaksızın irat kaydederek tazmin etmeye yetkilidir. Üye, bu hususa itiraz edemez. Üye’nin sorumluluğu Hizmet Bedeli miktarıyla sınırlı değildir.&nbsp;</p>

<p><br>
<strong>12. GİZLİLİK ve KİŞİSEL VERİLER’İN KORUNMASI</strong></p>

<p><br>
12.1 Üye, işbu Sözleşme’nin ifası tahtında Ookoçihale ile ilgili olarak doğrudan veya dolaylı olarak edindiği, ticari, mali, hukuki veya teknik nitelikte, ticari sır ya da diğer yasal korumaya konu olan ya da olmayan her türlü bilgiyi gizli tutacak ve firsat arabalarihale’nin izni olmaksızın herhangi bir kişiye ifşa etmeyecektir. Aksi halde Üye firsat arabalarihale’nin uğradığı zararlardan sorumludur. Ayrıca firsat arabalarihale, kullanıcı profili ve pazar araştırmaları yapmak, rezervasyon ve site kullanım istatistikleri oluşturmak gibi amaçlar dahil ancak bunlarla sınırlı olmamak üzere tüm yasal amaçlar için, Üye'nin kimlik, adres, iletişim, IP ve site kullanım bilgilerini bir veri tabanında toplayabilir ve bu bilgileri herhangi bir kısıtlama olmaksızın kullanabilir. firsat arabalarihale, Üye’ye ilişkin bilgileri sitede sunulan hizmetler ile ilgili sigorta şirketi, banka ile ayrıca gerek gördüğü üçüncü kişi/kurumlarla paylaşmaya yetkilidir. Ayrıca firsat arabalarihale bu bilgileri, yasaların getirdiği zorunluluklara uyma amacıyla veya yetkili adli veya idari otoritenin yürüttüğü soruşturma veya araştırma açısından talep edilmesi durumunda veya kullanıcıların hak ve güvenliklerinin korunması amacıyla üçüncü kişi/kurumlarla paylaşabilir. İşbu gizlilik hükmü sözleşme süresi sona erdikten sonra dahi süresiz olarak geçerlidir.&nbsp;</p>

<p>&nbsp;</p>

<p>12.2 firsat arabalarihale, Kişisel Verilerin Korunması ve Elektronik Ticaretin Düzenlenmesi mevzuatına uygun hareket edecektir. Üye, firsat arabalarihale’nin hizmet sağlayabilme ve hizmetlerini geliştirebilme amaçları doğrultusunda yürüttüğü operasyonları kapsamında mevzuatın istisna kıldığı haller haricinde kişisel verilerinin işlenmesi ve aktarılması ve ticari elektronik ileti gönderilebilmesi hususunda açık rızasını vermektedir.</p>

<p>&nbsp;</p>

<p>Üye’nin Kişisel verileri, otomatik veya otomatik olmayan yollarla sözleşmesel ilişkinin ifası gereğince veya kanunlarda öngörülen sair sebeplerle hizmetlerin işleyişi ve geliştirilmesi çerçevesinde toplanacaktır. firsat arabalarihale tarafından söz konusu kişisel veriler rezervasyon ve araç satışı gibi hizmetlerin sağlanması, duyuru/kutlama ve sair içeriklerle gönderilecek hediye ve iletilerle şirket tanınırlığını arttırmak ve hizmetlerin tanıtımına, pazarlanmasına yönelik genel veya kişiye özel reklam, duyuru, kampanya bilgilerinin sağlanması, daha iyi hizmet sağlamak amacıyla müşteri memnuniyet veya şikâyetlerinin yönetilebilmesi suretiyle müşterilere daha iyi hizmet verebilmek ve sadakat programı çerçevesinde müşteri anketleri yapılabilmesi ve geri bildirim yapılabilmesi gibi sair amaçlarla işlenecektir; Üye bu hususlarda açıkça onay vermiştir. Sözleşmenin ifası, veri güvenliği, Ford Otosan ve Tofaş başta olmak üzere firsat arabalarihale’nin bağlı bulunduğu şirketler topluluğu bünyesindeki şirketlere ve onlarla ortak kullanılan veri tabanlarına, başvurularının onayının alınacağı kurum ve kuruluşlara, resmi kurumlara, yetkili temsilcilere, sigorta şirketlerine, bilgi teknolojileri hizmet sağlayıcılarına, çağrı merkezi hizmeti veren şirketlere, nakliye ve kargo gönderimi için aracı olarak kullanılan şirketlere, bilcümle hizmetlerinden faydalanılan veya işbirliği içerisinde olunan üçüncü kişilere aynı şekilde sözleşmenin ifası ve hizmetlerin görülmesi maksadıyla aktarılacaktır; Üye bu hususlarda açıkça rıza göstermiştir.</p>

<p>&nbsp;</p>

<p>Kişisel Verilerin Korunması mevzuatı çerçevesinde kişisel verilerin; işlenip işlenmediğini öğrenme, işlenmişse buna ilişkin bilgi talep etme; işlenme amacını ve tarafımızca bu amaçlara uygun olarak kullanıp kullanılmadığını öğrenme, yurt içinde veya yurt dışında aktarıldığı üçüncü kişileri öğrenme; eksik veya yanlış işlenmesi halinde düzeltilmesi talep etme; işlenmesini gerektiren sebeplerin ortadan kalkması halinde silinmesi veya yok edilmesini ya da anonim haline getirilmesini talep etme; bu hallerde ya da düzeltme halinde bunların veri aktarılan üçüncü kişilere bildirilmesini isteme; işlenen verilerin münhasıran otomatik sistemler vasıtasıyla analiz edilmesi suretiyle Üye aleyhine bir sonucun ortaya çıktığının düşünülmesi halinde bu duruma itiraz etme; kanuna aykırı olarak işlenmesi sebebiyle bir zarara uğraması halinde bu zararın giderilmesini talep etme; hakları vardır.</p>

<p>&nbsp;</p>

<p>Üye, Kişisel verilerin, yasa gereği sözleşmenin ifası için gerektiği ölçüde işlenmesi ve aktarılması halleri haricinde, Üye’nin işbu onayı ile firsat arabalarihale’ye vereceği kişisel verilerin yukarıda belirtilen bilgiler kapsamında işleneceğine, yurtiçi veya yurtdışındaki üçüncü kişilere aktarılacağına rıza göstermiştir.</p>

<p>&nbsp;</p>

<p>Üye, Elektronik Ticaretin Düzenlenmesi Hakkında Kanun kapsamında hâlihazırda firsat arabalarihale uhdesinde bulunan ya da ileride vereceği iletişim adreslerine ticari elektronik iletiler gönderilmesine onay vermiştir. Temin edilen mal veya hizmetlere ilişkin değişiklik, kullanım ve bakıma yönelik ticari elektronik iletiler dâhil olmak ve fakat bunlarla sınırlı olmamak üzere her türlü ticari amaçla veri, ses ve görüntü içerikli ticari iletiler telefon, çağrı merkezleri, faks, otomatik arama makineleri, akıllı ses kaydedici sistemler, elektronik posta, kısa mesaj hizmeti gibi vasıtalar kullanılarak elektronik ortamda gönderilebilecektir.<br>
<br>
<strong>13. TEBLİGAT</strong></p>

<p><br>
Taraflar, üyelik işlemleri esnasında belirttiği adreslerinin kanuni tebligat adresleri olduğunu, adres değişikliğinin diğer tarafa yazılı olarak bildirilmediği sürece bu adreslere yapılacak bildirimlerin kanunen geçerli tebligatın bütün hukuki sonuçlarını doğuracağını kabul ve taahhüt ederler. Üye, sözleşme ve hizmetlerde yapılacak değişikliklerin, online ihale sonuçlarının, onayın, üyeliğin/online satın alnın iptalinin, işbu sözleşmenin feshinin, sona erdirilmesinin vs. her türlü bildirimin üyelik işlemleri esnasına belirttiği e-mail adresine yapılmasına muvafakat etmiş olup, e-mail ile yapılan bildirimler ulaşsın veya ulaşmasın bildirimin firsat arabalarihale tarafından gönderildiği andan itibaren tebellüğ edilmiş olduğunu ve hukuki sonuçlarını doğuracağını kabul ve taahhüt eder. Bildirimin üyeye geç ulaşması veya ulaşmamasından ve sonuçlarından firsat arabalarihale sorumlu değildir. Üye’nin firsat arabalarihale ile yapacağı yazışmalarda elektronik posta, faks kullanılamaz.</p>

<p><br>
<strong>14. YETKİ ve DELİL ANLAŞMASI</strong></p>

<p><br>
14.1. İşbu sözleşmenin uygulanmasından kaynaklanan sorunların çözümünde Türk Hukuku uygulanacak ve İstanbul Anadolu Mahkemeleri ile İcra Daireleri yetkili olacaktır.&nbsp;</p>

<p><br>
14.2. Üye, çıkabilecek ihtilaflarda, firsat arabalarihale’nin her türlü belge, kayıt, defterleri ile bilgisayar ve internet ortamındaki her türlü, bilgi, yazı ve kayıtlarının tek, münhasır ve kesin delil teşkil edeceğini ve bağlayıcı olacağını, bu maddenin HMK.193 maddesi kapsamında bir delil sözleşmesi olduğunu kabul eder.&nbsp;<br>
<br>
<strong>15. MUHTELİF&nbsp;HÜKÜMLER</strong></p>

<p><br>
15.1. İşbu Sözleşmenin herhangi bir hükmünün, herhangi bir nedenden dolayı geçersiz sayılması veya uygulanabilirliğinin kalmaması halinde, sözleşmenin diğer hükümleri yürürlükte kalacaktır.</p>

<p><br>
15.2. firsat arabalarihale’nin Sözleşme tahtında sahip olduğu herhangi bir hak veya yetkiyi kullanmaması ya da kullanmakta gecikmesi o hak veya yetkiden feragat ettiği anlamına gelmediği gibi, bir hak veya yetkinin tek başına veya kısmen kullanılması o veya başka bir hak veya yetkinin daha sonra kullanılmasını engellemez. Bu Sözleşme’nin herhangi bir koşul, madde veya hükmünden feragat edilmesi o koşul, madde veya hükümden daha sonra veya devamlı olarak feragat edildiği anlamına gelmez veya bu şekilde yorumlanamaz.&nbsp;<br>
<br>
15.3 İşbu sözleşme Üye tarafından Site’de onaylandığı andan itibaren, varsa daha önce Site’de onaylanan sözleşmenin yerine geçer. İhtilaf halinde, hangi sözleşmenin yürürlükte olduğu dönemden kaynaklandığına bakılmaksızın, bu sözleşme hükümleri uygulanır. Üye, varsa daha önce Site’de onaylanan sözleşme ve ticari işleyişten dolayı firsat arabalarihale’den hiçbir hak ve alacağı olmadığını, firsat arabalarihale’yi her türlü konuda en geniş manada gayri kabili rücu olarak ibra ettiğini, bahse konu sözleşme ve ticari ilişkiden dolayı firsat arabalarihale’ye karşı doğmuş ve/veya doğacak tüm sorumluluklarının devam ettiğini kabul, beyan ve taahhüt eder.&nbsp;<br>
<br>
15.4. Üye, sitede yer alan tüm uygulama ve kuralları okuyup anladığını ve kabul ettiğini, beyan eder. Üye, sözleşmenin tamamında yer alan menfaatlerine aykırı olabilecek düzenlemeleri de sonuçlarını bilerek ve anlayarak kabul ettiğini beyan eder.&nbsp;<br>
<br>
15.5. Üye, işbu sözleşmeden kaynaklanan hak, alacak ve yükümlülüklerini öncesinde firsat arabalarihale’ye yazılı iznini almaksızın üçüncü kişilere devir veya temlik edemez.</p>

<p>&nbsp;</p>

<p>15.6 Kanunlar tarafından izin verilen kapsamda firsat arabalarihale dolaylı, netice kabilinden doğan veya cezai tazminatlardan (sınırlı kalmamak kaydıyla kaybedilen kârlar dâhil) yükümlü olmayacaktır. firsat arabalarihale’nin Üye’yi tazmin etme yükümlülüğü dâhil olmak üzere herhangi bir yükümlülüğün veya garantinin ihlali nedeniyle ortaya çıkan zararlarla ilgili yükümlülüğü ve üçüncü kişileri tazmin etme yükümlülüğü, işbu Sözleşmeyle bağlantılı olarak firsat arabalarihale’ye ödenecek olan toplam ücretin tutarı ile sınırlıdır. Her hâlükârda firsat arabalarihale, Üye’nin uğradığı dolaylı zararlardan hiç bir şekilde sorumlu olmayacaktır.</p>

<p>&nbsp;</p>

<p><strong>16. YÜRÜRLÜLÜK ve KABUL</strong></p>

<p>&nbsp;</p>

<p>16.1.&nbsp;</p>

<p>İşbu Sözleşme firsat arabalarihale tarafından firsat arabalarihale içerisinde ilan edildiği tarihte yürürlük kazanır. Üye’ler, işbu sözleşme hükümlerini firsat arabalarihale’yi kullanmakla kabul etmiş olmaktadırlar. firsat arabalarihale dilediği zaman iş bu sözleşme hükümlerinde değişikliğe gidebilir ve değişiklikler versiyon numarası ve değişiklik tarihi belirtilerek firsat arabalarihale üzerinde yayınlandığı tarihte herhangi bir bildirim ve/veya kabule bağlı kalmaksızın doğrudan yürürlüğe girer.</p>

<p>&nbsp;</p>

<p>16.2.&nbsp;Üye, iş bu sözleşmeden doğabilecek ihtilaflarda "firsat arabalar OTOMOTİV" veri tabanlarında, sunucularında tuttuğu elektronik ve sistem kayıtlarının, ticari kayıtlarının, defter kayıtlarının, mikrofilm, mikrofiş ve bilgisayar kayıtlarının muteber bağlayıcı, kesin ve münhasır delil teşkil edeceğini, "firsat arabalar OTOMOTİV"i yemin teklifinden beri kıldığını ve bu maddenin 6100 Sayılı HMK 193. Madde anlamında delil sözleşmesi niteliğinde olduğunu kabul, beyan ve taahhüt eder.</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                             <div class="col-sm-12">
                                                <div>
                                                    <label for="card_holder">Kart Sahibi İsmi <span  class="text-danger">*</span></label>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="CardHolderName" id="card_holder"  class="form-control" placeholder="Kart üzerindeki isim..."  required="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div>
                                                    <label for="card_number">Kredi Kartı Numarası <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="input-group mb-2">
                                                    <input type="text" name="Pan" id="card_number" class="form-control"  placeholder="0000-0000-0000-0000" required="" maxlength="19">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <div class="col-md-10">
                                                        <div>
                                                            <label for="card_mo">Ay <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="input-group me-2">
                                                            <select name="ExpiryMo" id="card_mo" class="form-control"
                                                                    required>
                                                                <option value="">Ay</option>
                                                                @for($i = 1; $i < 12; $i++)
                                                                    <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div>
                                                            <label for="card_yr">Yıl <span
                                                                        class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="input-group me-2">
                                                            <select name="ExpiryYr" id="card_yr" class="form-control"
                                                                    required>
                                                                <option value="">Yıl</option>
                                                                @for($i = date('Y'); $i < (date('Y') + 20); $i++)
                                                                    <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <label for="card_cv2">CVV2 <span
                                                                    class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="text" name="Cvv2" id="card_cv2" class="form-control"
                                                               placeholder="000" style="width: 80px" required=""
                                                               maxlength="3">
                                                    </div>
                                                </div>
                                            </div>
                                     </div>
                                    <div class="form-group">
                                        <label> <input type="checkbox" name="is_check"> İhale'ye katılım şartlarını kabul ediyorum</label>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <style>
            .icon-bx-wraper.style-7 .icon-content .dlab-title {
                margin-bottom: 15px;
                width: 350px;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
        </style>
@endsection