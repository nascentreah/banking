<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use App\Models\Settings;
use App\Models\Blog;
use App\Models\Logo;
use App\Models\Currency;
use App\Models\Social;
use App\Models\Faq;
use App\Models\Category;
use App\Models\Page;
use App\Models\Design;
use App\Models\About;
use App\Models\Review;
use App\Models\User;
use App\Models\Plans;
use App\Models\Profits;
use App\Models\Alerts;
use App\Models\Save;
use App\Models\Services;
use App\Models\Brands;
use Illuminate\Support\Facades\View;
use Session;
use Image;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){
            if (Auth::check()){
                $alert=Alerts::whereUser_id(Auth::user()->id)->orderBy('id', 'DESC')->get();
                $user=User::find(Auth::user()->id);
                $currency=Currency::whereStatus(1)->first();
                if(empty($user->image)){
                    $cast="react.jpg";
                }else{
                    $cast=$user->image;
                }
                $seen=Alerts::where('user_id', Auth::user()->id)->where('seen', 0)->get();
                $save=$data['save']=Save::where('user_id', Auth::user()->id)->get();
                $profit=$data['profit']=Profits::whereUser_id(Auth::user()->id)->orderBy('id', 'DESC')->get();
                foreach($profit as $xpro){
                    $profits=Profits::whereId($xpro->id)->first();
                    $date1=date_create(Carbon::now());
                    $date2=date_create($xpro->date);
                    $date_diff=date_diff($date2, $date1);
                    $start_date=date_create($xpro->date);
                    date_add($start_date, date_interval_create_from_date_string('1 year'));
                    $ndate=date_format($start_date, "Y-m-d H:i:s");   
                    $profits->end_date=$ndate;
                    $profits->save();
                    if (Carbon::now()<$ndate){
                        $fdate=($xpro->plan->percent*$xpro->amount)/100 * (12*$date_diff->format('%R%a')/365);   
                        $profits->profit=$fdate;
                        $profits->status=1;
                        $profits->save();
                    }else{
                        $fdate=($xpro->plan->percent*$xpro->amount)/100 * 12;  
                        $profits->profit=$fdate;
                        $profits->save();
                        if($xpro->status==1){
                            $val1=$user->balance+$fdate;
                            $user->balance=$val1;
                            $user->save();   
                            $profits->status=2;
                            $profits->save();
                        }
                    }
                }
                foreach($save as $xsave){
                    $date1=strtotime(date('Y-m-d'));
                    $date2=strtotime($xsave->end_date);
                    if(($xsave->status==0 && $date1>$date2) || ($xsave->status==0 && $date1==$date2)){
                        $save_amo=$user->balance+$xsave->amount;
                        $user->balance=$save_amo;
                        $user->save();
                        foreach ($save as $ss){
                            $ss->status=1;
                            $ss->save();  
                        }                   
                    } 
                }

                $view->with('alert', $alert );
                $view->with('seen', $seen );
                $view->with('user', $user );
                $view->with('cast', $cast );
                $view->with('currency', $currency );
            }
        });
        $data['set']=Settings::first();
        $data['blog']=Blog::whereStatus(1)->get();
        $data['logo']=Logo::first();
        $data['social']=Social::all();
        $data['faq']=Faq::all();
        $data['cat']=Category::all();
        $data['pages']=Page::whereStatus(1)->get();
        $data['ui']=Design::first();
        $data['about']=About::first();
        $data['trending'] = Blog::whereStatus(1)->orderBy('views', 'DESC')->limit(5)->get();
        $data['posts'] = Blog::whereStatus(1)->orderBy('views', 'DESC')->limit(5)->get();
        $data['currency']=Currency::whereStatus(1)->first();
        $data['review'] = Review::whereStatus(1)->get();
        $data['service'] = Services::all();
        $data['brand'] = Brands::whereStatus(1)->get();

        
        view::share($data);
    }
}
