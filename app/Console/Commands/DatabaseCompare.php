<?php

namespace App\Console\Commands;

use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\CustomerCarExper;
use App\Models\CustomerCarPaymentTransaction;
use App\Models\CustomerCarPhoto;
use App\Models\CustomerCarValuation;
use App\Models\Page;
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
         *
         * Yeni sistemden eskiye aktarma
         *
         */

        $customer_car = CustomerCar::find("13464");

        $customer = Customer::find($customer_car->customer_id);
        $array1 = array(
            'firstname' => $customer->firstname,
            'lastname' => $customer->lastname,
            'identity' => 00,
            'phone' => $customer->phone,
            'email' => $customer->email,
            'password' => md5('123456'),
            'gender' => $customer->gender,
            'birthday' => $customer->birthday,
            'smscode' => 1,
            'city' => $customer->city_id,
            'state' => $customer->town_id,
            'freecar' => 0,
            'date_created' => $customer->created_at,
            'date_update' => $customer->created_at,
            'date_login' => $customer->created_at,
        );
        $lastcustomer = DB::connection('mysql2')->table('customers')->insertGetId($array1);
        $data = array(
            'customer_id' => $lastcustomer,
            'brand_id' => $customer_car->car->brand_id,
            'car_id' => $customer_car->car_id,
            'custom_version' => $customer_car->custom_version,
            'agent_id' => 0,
            'car_city' => $customer_car->car_city,
            'car_state' => $customer_car->car_state,
            'car_mahalle' => $customer_car->car_neighbourhood,
            'title' => "Yeni Sistem",
            'description' => $customer_car->description ?? "NULL",
            'caryear' => $customer_car->caryear,
            'plate' => $customer_car->plate,
            'sasi' => $customer_car->sasi,
            'ownorder' => $customer_car->ownorder,
            'sebep' => $customer_car->sebep,
            'score' => 1,
            'km' => $customer_car->km,
            'kmPhoto' => "NULL",
            'body' => $customer_car->body,
            'gear' => $customer_car->gear,
            'fuel' => $customer_car->fuel,
            'color' => $customer_car->color,
            'damage' => $customer_car->damage,
            'bakim_gecmisi' => $customer_car->maintenance_history,
            'durum_sasi' => $customer_car->status_frame,
            'durum_direk' => $customer_car->status_pole,
            'durum_podye' => $customer_car->status_podium,
            'durum_airbag' => $customer_car->status_airbag,
            'durum_triger' => $customer_car->status_triger,
            'durum_baski' => $customer_car->status_oppression,
            'durum_fren' => $customer_car->status_brake,
            'durum_lastik' => $customer_car->status_tyre,
            'durum_km' => $customer_car->status_km,
            'durum_satilamaz' => $customer_car->status_unrealizable,
            'durum_onArkaBagaj' => $customer_car->status_onArkaBagaj,
            'specs' => $customer_car->specs,
            'tramer' => $customer_car->tramer,
            'tramerValue' => $customer_car->tramerValue,
            'tramer_photo' => $customer_car->tramer_photo,
            'car_notwork' => $customer_car->car_notwork,
            'car_exterior_faults' => $customer_car->car_exterior_faults,
            'car_interior_faults' => $customer_car->car_interior_faults,
            'gal_fiyat_1' => $customer_car->gal_price_1,
            'gal_fiyat_2' => $customer_car->gal_price_2,
            'gal_fiyat_3' => $customer_car->gal_price_3,
            'degerleme' => $customer_car->id,
            'onerilen' => $customer_car->id,
            'onerilen_kabul' => 0,
            'shows' => 0,
            'date_created' => $customer_car->created_at,
            'date_updated' => $customer_car->created_at,
            'date_end' => $customer_car->created_at,
            'date_inspection' => $customer_car->date_inspection,
            'sessid' => $customer_car->session_id,
            'laststep' => $customer_car->laststep,
            'complete' => 1,
            'notcomplete_mail' => 0,
            'status' => 0,
            'deleted' => 0,
        );
        $customerCarId = DB::connection('mysql2')->table('customers_cars')->insertGetId($data);

        $customer_car_expers = CustomerCarExper::where('customer_car_id', '13464')->get();
        if ($customer_car_expers) {
            foreach ($customer_car_expers as $customer_car_exper) {
                $array2 = array(
                    'customer_id' => $lastcustomer,
                    'customers_car_id' => $customerCarId,
                    'expert' => $customer_car_exper->image,
                    'date_created' => $customer_car_exper->created_at,
                );
                $customerCarExperId = DB::connection('mysql2')->table('customers_cars_experts')->insertGetId($array2);

            }

        }


        $customer_car_photos = CustomerCarPhoto::where('customer_car_id', '13464')->get();
        if ($customer_car_photos) {
            foreach ($customer_car_photos as $customer_car_photo) {
                $array2 = array(
                    'customer_id' => $lastcustomer,
                    'customers_car_id' => $customerCarId,
                    'photo' => $customer_car_photo->image,
                    'date_created' => $customer_car_photo->created_at,
                    'deleted' => 0,
                    'primary' => 0,
                );
                $customerCarPhotosId = DB::connection('mysql2')->table('customers_cars_photos')->insertGetId($array2);
            }

            $customer_car_photos = CustomerCarPhoto::where('customer_car_id', '13464')->get();


        }


        /*
         *
         * Eskiden yeniye aktarma
         *
         */


        /*  $x = DB::connection('mysql2')->table('customers')->orderBy('id','desc')->get()->take(100);
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
                   $customer->password = bcrypt('123456');
                   $customer->city_id = ($item->city == 0) ? 82 : $item->city;
                   $customer->town_id = ($item->state == 0) ? 974 : $item->state;
                   $customer->freecar = $item->freecar;
                   $customer->status = $item->status;
                   $customer->save();
               }

           }
    */

        /*
                    $xd = DB::connection('mysql2')->table('customers_cars')->where('id','<','13106')->orderBy('id','desc')->get()->take(2000);
                    foreach ($xd as $itemd)
                      {
                          $customer_cars = CustomerCar::find($itemd->id);

                          if(!$customer_cars)
                          {
                              $customer_cars = new CustomerCar();
                              $customer_cars->id = $itemd->id;
                              $customer_cars->customer_id = ($itemd->customer_id == 0) ? 1 : $itemd->customer_id;
                              $customer_cars->car_id = ($itemd->car_id == 0) ? 22027 : $itemd->car_id;
                              $customer_cars->custom_version = $itemd->custom_version;
                              $customer_cars->user_id = ($itemd->agent_id == 0) ? 14 : $itemd->agent_id;
                              $customer_cars->car_city = $itemd->car_city ?? 82;
                              $customer_cars->car_state = $itemd->car_state ?? 974;
                              $customer_cars->car_neighbourhood = $itemd->car_mahalle ?? 73281;
                              $customer_cars->description= $itemd->description;
                              $customer_cars->caryear= $itemd->caryear;
                              $customer_cars->plate= $itemd->plate;
                              $customer_cars->sasi= $itemd->sasi;
                              $customer_cars->ownorder= $itemd->ownorder;
                              $customer_cars->sebep= $itemd->sebep;
                              $customer_cars->score= $itemd->score;
                              $customer_cars->km= $itemd->km;
                              $customer_cars->kmPhoto= $itemd->kmPhoto;
                              $customer_cars->body= $itemd->body;
                              $customer_cars->gear= $itemd->gear;
                              $customer_cars->fuel= $itemd->fuel;
                              $customer_cars->color= $itemd->color;
                              $customer_cars->damage= $itemd->damage;
                              $customer_cars->maintenance_history= $itemd->bakim_gecmisi;
                              $customer_cars->status_frame= ($itemd->durum_sasi == 'Yok') ? 0 : 1;
                              $customer_cars->status_pole= ($itemd->durum_direk == 'Yok') ? 0 : 1;
                              $customer_cars->status_podium= ($itemd->durum_podye == 'Yok') ? 0 : 1;
                              $customer_cars->status_airbag= ($itemd->durum_airbag == 'Yok') ? 0 : 1;
                              $customer_cars->status_triger= ($itemd->durum_triger == 'Yok') ? 0 : 1;
                              $customer_cars->status_oppression= ($itemd->durum_baski == 'Yok') ? 0 : 1;
                              $customer_cars->status_brake= ($itemd->durum_fren == 'Yok') ? 0 : 1;
                              $customer_cars->status_tyre= ($itemd->durum_lastik == 'Hayır') ? 0 : 1;
                              $customer_cars->status_km= ($itemd->durum_km == 'Yok') ? 0 : 1;
                              $customer_cars->status_unrealizable= ($itemd->durum_satilamaz == 'Yok') ? 0 : 1;
                              $customer_cars->status_onArkaBagaj= ($itemd->durum_onArkaBagaj == 'Yok') ? 0 : 1;
                              $customer_cars->specs= $itemd->specs;
                              $customer_cars->tramer= $itemd->tramer;
                              $customer_cars->tramerValue= $itemd->tramerValue;
                              $customer_cars->tramer_photo= $itemd->tramer_photo;
                              $customer_cars->car_notwork= $itemd->car_notwork;
                              $customer_cars->car_exterior_faults= $itemd->car_exterior_faults;
                              $customer_cars->car_interior_faults= $itemd->car_interior_faults;
                              $customer_cars->gal_price_1= ($itemd->gal_fiyat_1 == NULL) ? '0.00' : $itemd->gal_fiyat_1;
                              $customer_cars->gal_price_2= ($itemd->gal_fiyat_2 == NULL) ? '0.00' : $itemd->gal_fiyat_2;
                              $customer_cars->gal_price_3= ($itemd->gal_fiyat_3 == NULL) ? '0.00' : $itemd->gal_fiyat_3;
                              $customer_cars->valuation= $itemd->degerleme;
                              $customer_cars->suggested= $itemd->onerilen;
                              $customer_cars->suggested_accept= $itemd->onerilen_kabul;
                              $customer_cars->shows= $itemd->shows;
                              $customer_cars->date_end= $itemd->date_end;
                              $customer_cars->date_inspection= $itemd->date_inspection;
                              $customer_cars->laststep= $itemd->laststep;
                              $customer_cars->status= $itemd->status;
                              $customer_cars->save();

                              $x = DB::connection('mysql2')->table('customers_cars_photos')->where('customers_car_id',$itemd->id)->get();
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

                              $x = DB::connection('mysql2')->table('payments')->where('customers_cars_id',$itemd->id)->get();
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

                              $x = DB::connection('mysql2')->table('valuations')->where('customers_car_id',$itemd->id)->get();
                              foreach ($x as $item) {
                                  $valuatons = new CustomerCarValuation();
                                  $valuatons->uuid = $item->uuid;
                                  $valuatons->customer_car_id  = $item->customers_car_id;
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

                          }

                          $x = DB::connection('mysql2')->table('customers_cars_experts')->where('customers_car_id',$itemd->id)->get();
                          foreach ($x as $item) {
                              $pages = CustomerCarExper::where('id',$item->id)->first();
                              if(!$pages)
                              {
                                  $page = new CustomerCarExper();
                                  $page->id = $item->id;
                                  $page->customer_car_id = $item->customers_car_id;
                                  $page->image = $item->expert;
                                  $page->save();
                              }
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


        /*
        */
    }
}