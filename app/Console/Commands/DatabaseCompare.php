<?php

namespace App\Console\Commands;

use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\CustomerCarPaymentTransaction;
use App\Models\CustomerCarPhoto;
use App\Models\CustomerCarValuation;
use App\Models\Page;
use App\Models\Valuation;
use Illuminate\Console\Command;
use  \DB;
use Illuminate\Support\Str;

class DatabaseCompare extends Command
{

    protected $signature = 'database:compare';

    protected $description = 'Command description';

    public function handle()
    {
        /*
     $x = DB::connection('mysql2')->table('customers')->get();
       foreach ($x as $item) {
           $customera = Customer::find($item->id);

           if(!$customera) {
               $customer = new Customer();
               $customer->id = $item->id;
               $customer->firstname = $item->firstname;
               $customer->lastname = $item->lastname;
               $customer->identity = $item->identity;
               $customer->phone = $item->phone;
               $customer->email = $item->email;
               $customer->password = $item->password;
               $customer->gender = $item->gender;
               $customer->birthday = $item->birthday;
               $customer->smscode = $item->smscode;
               $customer->city_id = ($item->city == 0) ? 82 : $item->city;
               $customer->town_id = ($item->state == 0) ? 974 : $item->state;
               $customer->freecar = $item->freecar;
               $customer->date_login = $item->date_login;
               $customer->status = $item->status;
               $customer->save();
           }
         }



      $x = DB::connection('mysql2')->table('customers_cars')->get();
      foreach ($x as $item)
        {
            $customer_cars = CustomerCar::find($item->id);

            if(!$customer_cars)
            {
                $customer_cars = new CustomerCar();
                $customer_cars->id = $item->id;
                $customer_cars->customer_id = ($item->customer_id == 0) ? 1 : $item->customer_id;
                $customer_cars->car_id = ($item->car_id == 0) ? 22027 : $item->car_id;
                $customer_cars->custom_version = $item->custom_version;
                $customer_cars->expert_id = ($item->agent_id == 0) ? 14 : $item->agent_id;
                $customer_cars->car_city = $item->car_city ?? 82;
                $customer_cars->car_state = $item->car_state ?? 974;
                $customer_cars->car_neighbourhood = $item->car_mahalle ?? 73281;
                $customer_cars->title= $item->title;
                $customer_cars->description= $item->description;
                $customer_cars->caryear= $item->caryear;
                $customer_cars->plate= $item->plate;
                $customer_cars->sasi= $item->sasi;
                $customer_cars->ownorder= $item->ownorder;
                $customer_cars->sebep= $item->sebep;
                $customer_cars->score= $item->score;
                $customer_cars->km= $item->km;
                $customer_cars->kmPhoto= $item->kmPhoto;
                $customer_cars->body= $item->body;
                $customer_cars->gear= $item->gear;
                $customer_cars->fuel= $item->fuel;
                $customer_cars->color= $item->color;
                $customer_cars->damage= $item->damage;
                $customer_cars->maintenance_history= $item->bakim_gecmisi;
                $customer_cars->status_frame= ($item->durum_sasi == 'Yok') ? 0 : 1;
                $customer_cars->status_pole= ($item->durum_direk == 'Yok') ? 0 : 1;
                $customer_cars->status_podium= ($item->durum_podye == 'Yok') ? 0 : 1;
                $customer_cars->status_airbag= ($item->durum_airbag == 'Yok') ? 0 : 1;
                $customer_cars->status_triger= ($item->durum_triger == 'Yok') ? 0 : 1;
                $customer_cars->status_oppression= ($item->durum_baski == 'Yok') ? 0 : 1;
                $customer_cars->status_brake= ($item->durum_fren == 'Yok') ? 0 : 1;
                $customer_cars->status_tyre= ($item->durum_lastik == 'Hayır') ? 0 : 1;
                $customer_cars->status_km= ($item->durum_km == 'Yok') ? 0 : 1;
                $customer_cars->status_unrealizable= ($item->durum_satilamaz == 'Yok') ? 0 : 1;
                $customer_cars->status_onArkaBagaj= ($item->durum_onArkaBagaj == 'Yok') ? 0 : 1;
                $customer_cars->specs= $item->specs;
                $customer_cars->tramer= $item->tramer;
                $customer_cars->tramerValue= $item->tramerValue;
                $customer_cars->tramer_photo= $item->tramer_photo;
                $customer_cars->car_notwork= $item->car_notwork;
                $customer_cars->car_exterior_faults= $item->car_exterior_faults;
                $customer_cars->car_interior_faults= $item->car_interior_faults;
                $customer_cars->gal_price_1= ($item->gal_fiyat_1 == NULL) ? '0.00' : $item->gal_fiyat_1;
                $customer_cars->gal_price_2= ($item->gal_fiyat_2 == NULL) ? '0.00' : $item->gal_fiyat_2;
                $customer_cars->gal_price_3= ($item->gal_fiyat_3 == NULL) ? '0.00' : $item->gal_fiyat_3;
                $customer_cars->valuation= $item->degerleme;
                $customer_cars->suggested= $item->onerilen;
                $customer_cars->suggested_accept= $item->onerilen_kabul;
                $customer_cars->shows= $item->shows;
                $customer_cars->date_end= $item->date_end;
                $customer_cars->date_inspection= $item->date_inspection;
                $customer_cars->laststep= $item->laststep;
                $customer_cars->complete= $item->complete;
                $customer_cars->notcomplete_mail= $item->notcomplete_mail;
                $customer_cars->status= $item->status;
                $customer_cars->save();
            }

        }
*/
        /*  $x = DB::connection('mysql2')->table('valuations')->get();
          foreach ($x as $item) {
              $valuatons = new CustomerCarValuation();
              $valuatons->uuid = $item->uuid;
              $valuatons->customers_car_id  = $item->customers_car_id;
              $valuatons->comment =   $item->comment;
              $valuatons->link1 = $item->link1;
              $valuatons->link1_comment = $item->link1_comment;
              $valuatons->link2 = $item->link2;
              $valuatons->link2_comment = $item->link2_comment;
              $valuatons->link3 = $item->link3;
              $valuatons->link3_comment = $item->link3_comment;
              $valuatons->link4 = $item->link4;
              $valuatons->link4_comment = $item->link4_comment;
              $valuatons->link5 = $item->link5;
              $valuatons->link5_comment = $item->link5_comment;
              $valuatons->offer_price = $item->offer_price;
              $valuatons->earning = $item->earning;
              $valuatons->date_sendconfirm = $item->date_sendconfirm;
              $valuatons->date_customer_open = $item->date_customer_open;
              $valuatons->date_confirm = $item->date_confirm;
              $valuatons->is_confirm = $item->is_confirm;
              $valuatons->status = $item->status;
              $valuatons->save();
          }

        */

        /*   $x = DB::connection('mysql2')->table('staticpages')->get();
           foreach ($x as $item) {
               $page = new Page();
               $page->id_parent = 0;
               $page->type = "page";
               $page->title = $item->title;
               $page->content = $item->content;
               $page->images = "";
               $page->slug = Str::slug( $item->title);
               $page->meta_key = $item->title;
               $page->meta_description = $item->title;
               $page->labels = "";
               $page->save();
           }


           $x = DB::connection('mysql2')->table('customers_cars_photos')->get();
           foreach ($x as $item) {
               $pages = CustomerCarPhoto::where('id',$item->id)->first();
               if(!$pages)
               {
                   $page = new CustomerCarPhoto();
                   $page->id = $item->id;
                   $page->customer_car_id = $item->customers_car_id;
                   $page->image = $item->photo;
                   $page->active = $item->primary;
                   $page->save();
               }
          }
    */


       /* $x = DB::connection('mysql2')->table('payments')->get();
        foreach ($x as $item) {
            $pages = CustomerCarPaymentTransaction::where('id', $item->id)->first();
            if (!$pages) {
                $page = new CustomerCarPaymentTransaction();
                $page->id = $item->id;
                $page->customer_car_id = $item->customers_cars_id;
                $page->payment_type = 'rapor';
                $page->order_total = $item->order_total;
                $page->response_auth = $item->response_auth;
                $page->response_payment = $item->response_payment;
                $page->status = $item->status;
                $page->save();
            }
        }
       */
    }
}