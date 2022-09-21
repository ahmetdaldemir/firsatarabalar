 <div class="stepwizard mb-5">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="javascript:;" type="button" class="btn @if($url == "form1") btn-primary @else btn-default  @endif btn-default btn-circle"
              @if($url != "form1") disabled="disabled" @endif>1</a>
            <p>Yeni Araç Seçimi</p>
        </div>
        <div class="stepwizard-step">
            <a href="javascript:;" type="button" class="btn  @if($url == "form2") btn-primary @else btn-default  @endif btn-default btn-circle"
               @if($url != "form2") disabled="disabled" @endif>2</a>
            <p>Boya & Değişen & İşlem</p>
        </div>
        <div class="stepwizard-step">
            <a href="javascript:;" type="button" class="btn @if($url == "form3") btn-primary @else btn-default  @endif btn-default btn-circle"
               @if($url != "form3") disabled="disabled" @endif>3</a>
            <p>Araç Özel Bilgileri</p>
        </div>
        <div class="stepwizard-step">
            <a href="javascript:;" type="button" class="btn @if($url == "form4") btn-primary @else btn-default  @endif btn-default btn-circle"
               @if($url != "form4") disabled="disabled" @endif>4</a>
            <p>Araç Fotoğrafları</p>
        </div>
        <div class="stepwizard-step">
            <a href="javascript:;" type="button" class="btn @if($url == "form5") btn-primary @else btn-default  @endif  btn-circle"  @if($url != "form5") disabled="disabled" @endif>5</a>
            <p>Ödeme Bilgileri</p>
        </div>
    </div>
</div>