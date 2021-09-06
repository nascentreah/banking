<?php

namespace App\Http\Controllers;

use App\Mail\Tickets\SetTicketMail;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Settings;
use App\Models\Logo;
use App\Models\Save;
use App\Models\Branch;
use App\Models\Loan;
use App\Models\Bank;
use App\Models\Currency;
use App\Models\Alerts;
use App\Models\Transfer;
use App\Models\Int_transfer;
use App\Models\Plans;
use App\Models\Adminbank;
use App\Models\Gateway;
use App\Models\Deposits;
use App\Models\Banktransfer;
use App\Models\Withdraw;
use App\Models\Withdrawm;
use App\Models\Merchant;
use App\Models\Profits;
use App\Models\Ticket;
use App\Models\Reply;
use Carbon\Carbon;
use Session;
use Image;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $withdraws = Withdraw::query()
            ->select(['amount'])
            ->where('user_id', Auth::user()->id)
            ->get();

        $savings = Save::query()
            ->select(['amount'])
            ->where('user_id', Auth::user()->id)
            ->get();

        $methods = Withdrawm::where('status', 1)->get();

        return view('user.index', [
            'title' => 'Dashboard',
            'withdraws' => $withdraws,
            'savings' => $savings,
            'methods' => $methods
        ]);
    }

    public function save()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }

        $save = Save::whereUser_id(Auth::user()->id)->get();

        return view('user.save', [
            'title' => 'Save 4 Me',
            'save' => $save
        ]);
    }

    public function branch()
    {
        $branches = Branch::all();
        return view('user.branch', [
            'title' => 'Bank branches',
            'branch' => $branches
        ]);
    }

    public function merchant()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }

        $merchant = Merchant::whereUser_id(Auth::user()->id)->get();

        return view('user.merchant', [
            'title' => 'Merchant',
            'merchant' => $merchant
        ]);
    }

    public function ticket()
    {
        $ticket = Ticket::whereUser_id(Auth::user()->id)->get();

        return view('user.ticket', [
            'title' => 'Tickets',
            'ticket' => $ticket
        ]);
    }

    public function loan()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }

        $loan = Loan::whereUser_id(Auth::user()->id)->get();

        $bank = Bank::whereUser_id(Auth::user()->id)->first();

        return view('user.loan', [
            'title' => 'Loan management',
            'loan' => $loan,
            'bank' => $bank
        ]);
    }

    public function statement()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $data['title'] = 'Transaction history';
        return view('user.statement', $data);
    }

    public function addmerchant()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $data['title'] = 'Add merchant';
        return view('user.add-merchant', $data);
    }

    public function plans()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }

        $plan = Plans::whereStatus(1)->orderBy('min_deposit', 'DESC')->get();
        $profit = Profits::whereUser_id(Auth::user()->id)->orderBy('id', 'DESC')->get();
        $datetime = Carbon::now();

        return view('user.plans', [
            'title' => 'PY scheme',
            'plan' => $plan,
            'profit' => $profit,
            'datetime' => $datetime
        ]);
    }

    public function fund()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $data['title'] = 'Fund account';
        $data['adminbank'] = Adminbank::whereId(1)->first();
        $data['gateways'] = Gateway::whereStatus(1)->orderBy('id', 'DESC')->get();
        $data['deposits'] = Deposits::whereUser_id(Auth::user()->id)->latest()->get();
        $data['bank_transfer'] = Banktransfer::whereUser_id(Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('user.fund', $data);
    }

    public function withdraw()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $data['title'] = 'Withdraw';
        $data['method'] = Withdrawm::whereStatus(1)->get();
        $data['withdraw'] = Withdraw::whereUser_id(Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('user.withdraw', $data);
    }

    public function bank_transfer()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }

        $bank = Adminbank::whereId(1)->first();

        return view('user.bank_transfer', [
            'title' => 'Bank transfer',
            'bank' => $bank
        ]);
    }

    public function changePassword()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $data['title'] = "Change Password";
        return view('user.password', $data);
    }

    public function changePin()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $data['title'] = "Change Pin";
        return view('user.pin', $data);
    }

    public function profile()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $data['title'] = "Profile";
        return view('user.profile', $data);
    }

    public function ownbank()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $data['title'] = "Own bank";
        return view('user.own_bank', $data);
    }

    public function Replyticket($id)
    {
        $ticket = $ticket = Ticket::find($id);
        $title = '#' . $ticket->ticket_id;
        $reply = Reply::whereTicket_id($ticket->ticket_id)->get();
        return view('user.reply-ticket', [
            'title' => $title,
            'ticket' => $ticket,
            'reply' => $reply
        ]);
    }

    public function otherbank()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $data['title'] = "Other bank";
        return view('user.other_bank', $data);
    }

    public function authCheck()
    {
        if (Auth()->user()->status == '0' && Auth()->user()->email_verify == '1' && Auth()->user()->sms_verify == '1') {
            return redirect()->route('user.dashboard');
        } else {
            $data['title'] = "Authorization";
            return view('user.authorization', $data);
        }
    }

    public function sendVcode(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (Carbon::parse($user->phone_time)->addMinutes(1) > Carbon::now()) {
            $time = Carbon::parse($user->phone_time)->addMinutes(1);
            $delay = $time->diffInSeconds(Carbon::now());
            $delay = gmdate('i:s', $delay);
            session()->flash('alert', 'You can resend Verification Code after ' . $delay . ' minutes');
        } else {
            $code = strtoupper(Str::random(6));
            $user->phone_time = Carbon::now();
            $user->sms_code = $code;
            $user->save();
            send_sms($user->phone, 'Your Verification Code is ' . $code);

            session()->flash('success', 'Verification Code Send successfully');
        }
        return back();
    }

    public function smsVerify(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user->sms_code == $request->sms_code) {
            $user->phone_verify = 1;
            $user->save();
            session()->flash('success', 'Your Profile has been verfied successfully');
            return redirect()->route('user.dashboard');
        } else {
            session()->flash('alert', 'Verification Code Did not matched');
        }
        return back();
    }

    public function sendEmailVcode(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (Carbon::parse($user->email_time)->addMinutes(1) > Carbon::now()) {
            $time = Carbon::parse($user->email_time)->addMinutes(1);
            $delay = $time->diffInSeconds(Carbon::now());
            $delay = gmdate('i:s', $delay);
            session()->flash('alert', 'You can resend Verification Code after ' . $delay . ' minutes');
        } else {
            $code = strtoupper(Str::random(6));
            $user->email_time = Carbon::now();
            $user->verification_code = $code;
            $user->save();
            send_email($user->email, $user->username, 'Verificatin Code', 'Your Verification Code is ' . $code);
            session()->flash('success', 'Verification Code Send successfully');
        }
        return back();
    }

    public function postEmailVerify(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user->verification_code == $request->email_code) {
            $user->email_verify = 1;
            $user->save();
            session()->flash('success', 'Your Profile has been verfied successfully');
            return redirect()->route('user.dashboard');
        } else {
            session()->flash('alert', 'Verification Code Did not matched');
        }
        return back();
    }

    public function bank_transfersubmit(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $user = $data['user'] = User::find(Auth::user()->id);
        $currency = Currency::whereStatus(1)->first();
        $set = Settings::first();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $user->username . '.jpg';
            $location = 'asset/screenshot/' . $filename;
            Image::make($image)->resize(800, 800)->save($location);
            $sav['user_id'] = Auth::user()->id;
            $sav['amount'] = $request->amount;
            $sav['details'] = $request->details;
            $sav['image'] = $filename;
            $sav['status'] = 0;
            Banktransfer::create($sav);
            if ($set['email_notify'] == 1) {
                send_email(
                    $user->email,
                    $user->username,
                    'Deposit request under review',
                    'We are currently reviewing your deposit of ' . $request->amount . $currency->name . ', once confirmed your balance will be credited automatically.<br>Thanks for working with us.'
                );
            }
            return back()->with('success', 'Deposit request under review');
        } else {
            return back()->with('warning', 'An error occured, please try again later');
        }
    }

    public function submitmerchant(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $user = $data['user'] = User::find(Auth::user()->id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $user->username . '_business.jpg';
            $location = 'asset/profile/' . $filename;
            Image::make($image)->resize(800, 800)->save($location);
            $sav['user_id'] = Auth::user()->id;
            $sav['merchant_key'] = str_random(16);
            $sav['site_url'] = $request->merchant_site_link;
            $sav['success_link'] = $request->merchant_success_link;
            $sav['fail_link'] = $request->merchant_fail_link;
            $sav['logo'] = $filename;
            $sav['name'] = $request->merchant_name;
            $sav['description'] = $request->merchant_description;
            $sav['status'] = 0;
            Merchant::create($sav);
            return back()->with('success', 'Successfully created, please wait for admin approval');
        } else {
            return back()->with('warning', 'An error occured, please try again later');
        }
    }

    public function submitownbank(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $set = Settings::first();
        $currency = Currency::whereStatus(1)->first();
        $amountx = $request->amount + $set->transfer_charge;
        $token = round(microtime(true));
        $user = $data['user'] = User::find(Auth::user()->id);
        $loan = $data['loan'] = Loan::where('user_id', Auth::user()->id)->where('status', 1)->count();
        if ($loan < 1) {
            if ($user->pin == $request->pin) {
                if ($user->acct_no != $request->acct_no) {
                    $count = User::whereAcct_no($request->acct_no)->get();
                    if (count($count) > 0) {
                        $trans = User::whereAcct_no($request->acct_no)->first();
                        if ($user->balance > $amountx || $user->balance == $amountx) {
                            $a = $trans->balance + $request->amount;
                            $b = $user->balance - $amountx;
                            $trans->balance = $a;
                            $trans->save();
                            $user->balance = $b;
                            $user->save();

                            $sav['ref_id'] = $token;
                            $sav['amount'] = $request->amount;
                            $sav['sender_id'] = Auth::user()->id;
                            $sav['receiver_id'] = $trans->id;
                            $sav['status'] = 1;
                            $sav['type'] = 1;
                            Transfer::create($sav);

                            $contentx = 'Acct:' . $trans->acct_no . ', Date:' . Carbon::now() . ', CR Amt:' . $request->amount . ',
                             Bal:' . $trans->balance . ', Ref:' . $token . ', Desc: Bank transfer';
                            $credit['user_id'] = $trans->id;
                            $credit['amount'] = $request->amount;
                            $credit['details'] = $contentx;
                            $credit['type'] = 2;
                            $credit['seen'] = 0;
                            $credit['status'] = 1;
                            $credit['reference'] = $token;
                            Alerts::create($credit);
                            if ($set->sms_notify == 1) {
                                send_sms($trans->phone, $contentx);
                            }
                            if ($set['email_notify'] == 1) {
                                send_email($user->email, $user->username, 'Credit alert', $contentx);
                            }

                            $content = 'Acct:' . $user->acct_no . ', Date:' . Carbon::now() . ', DR Amt:' . $request->amount . ',
                             Bal:' . $user->balance . ', Ref:' . $token . ', Desc: Bank transfer';
                            $debit['user_id'] = Auth::user()->id;
                            $debit['amount'] = $amountx;
                            $debit['details'] = $content;
                            $debit['type'] = 1;
                            $debit['seen'] = 0;
                            $debit['status'] = 1;
                            $debit['reference'] = $token;
                            Alerts::create($debit);
                            if ($set->sms_notify == 1) {
                                send_sms($user->phone, $content);
                            }
                            if ($set['email_notify'] == 1) {
                                send_email($user->email, $user->username, 'Debit alert', $content);
                            }

                            return back()->with('success', 'Transaction was successful');
                        } else {
                            return back()->with('alert', 'Account balance is insufficient');
                        }
                    } else {
                        return back()->with('alert', 'Invalid account number.');
                    }
                } else {
                    return back()->with('alert', 'You cant transfer money to thesame account.');
                }
            } else {
                return back()->with('alert', 'Invalid pin.');
            }
        } else {
            return back()->with('alert', 'Request failed, you have an unpaid loan.');
        }
    }

    public function submitotherbank(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $set = Settings::first();
        $amountx = $request->amount + $set->transfer_chargex;
        $token = round(microtime(true));
        $user = $data['user'] = User::find(Auth::user()->id);
        $loan = $data['loan'] = Loan::where('user_id', Auth::user()->id)->where('status', 1)->count();
        if ($loan < 1) {
            if ($user->pin == $request->pin) {
                if ($user->acct_no != $request->acct_no) {
                    if ($user->balance > $amountx || $user->balance == $amountx) {
                        $b = $user->balance - $amountx;
                        $user->balance = $b;
                        $user->save();
                        $sav['details'] = 'Acct name:' . $request->name . ', Bank name:' . $request->bank . ', Address:' . $request->address . ', Swift:' . $request->swift . ', Iban:' . $request->iban;
                        $sav['ref_id'] = $token;
                        $sav['amount'] = $request->amount;
                        $sav['user_id'] = Auth::user()->id;
                        $sav['status'] = 0;
                        $sav['type'] = 1;
                        Int_transfer::create($sav);

                        $content = 'Acct:' . $user->acct_no . ', Date:' . Carbon::now() . ', DR Amt:' . $request->amount . ',
                            Bal:' . $user->balance . ', Ref:' . $token . ', Desc: Bank transfer';
                        $debit['user_id'] = Auth::user()->id;
                        $debit['amount'] = $amountx;
                        $debit['details'] = $content;
                        $debit['type'] = 1;
                        $debit['seen'] = 0;
                        $debit['status'] = 0;
                        $debit['reference'] = $token;
                        Alerts::create($debit);
                        if ($set->sms_notify == 1) {
                            send_sms($user->phone, $content);
                        }
                        if ($set['email_notify'] == 1) {
                            send_email($user->email, $user->username, 'Debit alert', $content);
                        }

                        return back()->with('success', 'Transaction was successful');
                    } else {
                        return back()->with('alert', 'Account balance is insufficient');
                    }
                } else {
                    return back()->with('alert', 'You cant transfer money to thesame account.');
                }
            } else {
                return back()->with('alert', 'Invalid pin.');
            }
        } else {
            return back()->with('alert', 'Request failed, you have an unpaid loan.');
        }
    }

    public function bankupdate(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $user = $data['user'] = User::find(Auth::user()->id);
        $count = Bank::whereUser_id(Auth::user()->id)->count();
        if ($count > 0) {
            $bank = Bank::whereUser_id(Auth::user()->id)->first();
            $bank->name = $request->name;
            $bank->address = $request->address;
            $bank->iban = $request->iban;
            $bank->swift = $request->swift;
            $bank->acct_no = $request->acct_no;
            $bank->acct_name = $request->acct_name;
            $bank->save();
            return back()->with('success', 'Bank details was successfully updated');
        } else {
            $sav['user_id'] = Auth::user()->id;
            $sav['name'] = $request->name;
            $sav['address'] = $request->address;
            $sav['iban'] = $request->iban;
            $sav['swift'] = $request->swift;
            $sav['acct_no'] = $request->acct_no;
            $sav['acct_name'] = $request->acct_name;
            Bank::create($sav);
            return back()->with('success', 'Bank details was successfully created');
        }
    }

    public function submitsave(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $user = $data['user'] = User::find(Auth::user()->id);
        $date1 = strtotime($request->end_date);
        $date2 = strtotime(Carbon::now());
        $loan = $data['loan'] = Loan::where('user_id', Auth::user()->id)->where('status', 1)->count();
        if ($loan < 1) {
            if ($date1 > $date2) {
                if ($user->balance > $request->amount || $user->balance == $request->amount) {
                    $a = $user->balance - $request->amount;
                    $token = round(microtime(true));
                    $user->balance = $a;
                    $user->save();
                    $sav['user_id'] = Auth::user()->id;
                    $sav['amount'] = $request->amount;
                    $sav['target'] = $request->target;
                    $sav['end_date'] = $request->end_date;
                    $sav['reference'] = $token;
                    $sav['status'] = 0;
                    Save::create($sav);
                    return back()->with('success', 'Operation was succesfully, you wont have access to this funds till ' . date("Y/m/d", strtotime($request->end_date)));
                } else {
                    return back()->with('warning', 'Insufficient Funds, please fund your account');
                }
            } else {
                return back()->with('alert', 'Wrong date entered, end date must be greater than todays date');
            }
        } else {
            return back()->with('alert', 'Request failed, you have an unpaid loan.');
        }
    }

    public function loansubmit(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $set = $data['set'] = Settings::first();
        $amountx = ($request->amount * $set->collateral_percent) / 100;
        $amountp = ($request->amount * $set->loan_interest) / 100;
        $amountp = $request->amount + $amountp;
        $user = $data['user'] = User::find(Auth::user()->id);
        $loan = $data['loan'] = Loan::where('user_id', Auth::user()->id)->where('status', 1)->count();
        if ($loan < 1) {
            if ($user->balance > $amountx || $user->balance == $amountx) {
                $sav['user_id'] = Auth::user()->id;
                $sav['amount'] = $amountp;
                $sav['status'] = 0;
                $sav['reference'] = round(microtime(true));
                $sav['details'] = $request->details;
                Loan::create($sav);
                return back()->with('success', 'Loan proposal has been submitted, you will be updated shortly.');
            } else {
                return back()->with('alert', 'Account balance must exceed or equal to 50% of loaned amount as collateral.');
            }
        } else {
            return back()->with('alert', 'Proposal failed, you currently have an unpaid loan.');
        }
    }

    public function Destroyticket($id)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $data = Ticket::findOrFail($id);
        $res = $data->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    }

    public function submitticket(Request $request)
    {

        $user = User::find(Auth::user()->id);

        $ticket = new Ticket();
        $ticket->user_id = Auth::user()->id;
        $ticket->subject = $request->subject;
        $ticket->priority = $request->category;
        $ticket->message = $request->details;
        $ticket->ticket_id = round(microtime(true));
        $ticket->status = 0;
        $ticket->save();

        $mail = Mail::to('support@godigitalbank.com');

        $mail->send(new SetTicketMail($ticket));

        return back()->with('success', 'Ticket Submitted Successfully.');
    }

    public function submitreply(Request $request)
    {
        $sav['reply'] = $request->details;
        $sav['ticket_id'] = $request->id;
        $sav['status'] = 1;
        Reply::create($sav);
        $data = Ticket::whereTicket_id($request->id)->first();
        $data->status = 0;
        $data->save();
        return back()->with('success', 'Message sent!.');
    }

    public function withdrawsubmit(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $set = $data['set'] = Settings::first();
        $currency = Currency::whereStatus(1)->first();
        $user = $data['user'] = User::find(Auth::user()->id);
        $amount = $request->amount + $set->withdraw_charge;
        $loan = $data['loan'] = Loan::where('user_id', Auth::user()->id)->where('status', 1)->count();
        if ($loan < 1) {
            if ($user->balance > $amount || $user->balance == $amount) {
                $sav['user_id'] = Auth::user()->id;
                $sav['amount'] = $amount;
                $sav['status'] = 0;
                $sav['coin_id'] = $request->coin;
                $sav['details'] = $request->details;
                Withdraw::create($sav);
                $a = $user->balance - ($amount);
                $user->balance = $a;
                $user->save();
                if ($set->email_notify == 1) {
                    send_email(
                        $user->email,
                        $user->username,
                        'Withdraw Request currently being Processed',
                        'We are currently reviewing your withdrawal request of ' . $request->amount . $currency->name . '.<br>Thanks for working with us.'
                    );
                }
                return back()->with('success', 'Withdrawal request has been submitted, you will be updated shortly.');
            } else {
                return back()->with('alert', 'Insufficent balance.');
            }
        } else {
            return back()->with('alert', 'Request failed, you have an unpaid loan.');
        }
    }

    public function fundsubmit(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $gate = Gateway::where('id', $request->gateway)->first();
        $user = User::find(Auth::user()->id);
        if ($gate->minamo <= $request->amount && $gate->maxamo >= $request->amount) {
            $charge = $gate->fixed_charge + ($request->amount * $gate->percent_charge / 100);
            $usdamo = ($request->amount + $charge) / $gate->rate;
            $usdamo = round($usdamo, 2);
            $trx = round(microtime(true));
            $depo['user_id'] = Auth::id();
            $depo['gateway_id'] = $gate->id;
            $depo['amount'] = $request->amount;
            $depo['charge'] = $charge;
            $depo['usd'] = round($usdamo, 2);
            $depo['btc_amo'] = 0;
            $depo['btc_wallet'] = "";
            $depo['trx'] = str_random(16);
            $depo['try'] = 0;
            $depo['status'] = 0;
            Deposits::create($depo);
            Session::put('Track', $depo['trx']);
            return redirect()->route('user.preview');
        } else {
            return back()->with('alert', 'Please Follow Deposit Limit');
        }
    }

    public function depositpreview()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $track = Session::get('Track');
        $data['title'] = 'Deposit Preview';
        $data['gate'] = Deposits::where('status', 0)->where('trx', $track)->first();
        return view('user.preview', $data);
    }

    public function payloan($id)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $loan = Loan::find($id);
        $user = User::where('id', $loan->user_id)->first();
        if ($user->balance > $loan->amount || $user->balance == $loan->amount) {
            $a = $user->balance - $loan->amount;
            $loan->status = 2;
            $loan->save();
            $user->balance = $a;
            $user->save();
            return back()->with('success', 'Loan was successfully paid.');
        } else {
            return back()->with('alert', 'Account balance must exceed loaned amount.');
        }
    }

    public function calculate(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $currency = Currency::whereStatus(1)->first();
        $plan = Plans::find($request->plan_id);
        $duration = $plan->duration . ' ' . $plan->period;
        $profit = $request->amount * ($plan->percent / 100) * castrotime($duration);
        if ($request->amount > $plan->min_deposit || $request->amount == $plan->min_deposit) {
            if ($request->amount < $plan->amount || $request->amount == $plan->amount) {
                return back()->with('success', number_format($profit) . $currency->name);
            } else {
                return back()->with('alert', 'value is greater than maximum deposit');
            }
        } else {
            return back()->with('alert', 'value is less than minimum deposit');
        }
    }

    public function buy(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $plan = $data['plan'] = Plans::Where('id', $request->plan)->first();
        $user = User::find(Auth::user()->id);
        $loan = $data['loan'] = Loan::where('user_id', Auth::user()->id)->where('status', 1)->count();
        if ($loan < 1) {
            if ($user->upgrade != 0) {
                if ($user->balance > $request->amount || $user->balance == $request->amount) {
                    if ($request->amount > $plan->min_deposit || $request->amount == $plan->min_deposit) {
                        if ($request->amount < $plan->amount || $request->amount == $plan->amount) {
                            $sav['user_id'] = Auth::user()->id;
                            $sav['plan_id'] = $request->plan;
                            $sav['amount'] = $request->amount;
                            $sav['profit'] = 0;
                            $sav['status'] = 1;
                            $sav['end_date'] = 0;
                            $sav['date'] = Carbon::now();
                            $sav['trx'] = str_random(16);
                            Profits::create($sav);
                            $a = $user->balance - $request->amount;
                            $user->balance = $a;
                            $user->save();
                            return back()->with('success', 'Plan was successfully purchased, click track earnings to watch your monthly earnings');
                        } else {
                            return back()->with('alert', 'value is greater than maximum deposit');
                        }
                    } else {
                        return back()->with('alert', 'value is less than minimum deposit');
                    }
                } else {
                    return back()->with('alert', 'Insufficient Funds, please fund your account');
                }
            } else {
                return back()->with('alert', 'Upgrade your account to have exclusive access to PY scheme');
            }
        } else {
            return back()->with('alert', 'Request failed, you have an unpaid loan.');
        }
    }


    public function read()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $alert = Alerts::where('user_id', Auth::user()->id)->get();
        foreach ($alert as $alerts) {
            $alerts->seen = 1;
            $alerts->save();
        }
        return back()->with('success', 'Notifications have been cleared.');
    }

    public function upgrade()
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $user = User::where('id', Auth::user()->id)->first();
        $set = Settings::first();
        if ($user->balance > $set->upgrade_fee || $user->balance == $set->upgrade_fee) {
            $a = $user->balance - $set->upgrade_fee;
            $user->upgrade = 1;
            $user->balance = $a;
            $user->save();
            return back()->with('success', 'Welcome to PY scheme.');
        } else {
            return back()->with('alert', 'Insufficient balance, add more funds..');
        }
    }

    public function logout()
    {
        Auth::guard()->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect('/login');
    }

    public function submitPin(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $this->validate($request, [
            'current_pin' => 'required',
            'pin' => 'required|max:4|confirmed'
        ]);
        try {

            $c_pin = Auth::user()->pin;
            $c_id = Auth::user()->id;
            $user = User::findOrFail($c_id);
            if ($request->current_pin == $c_pin) {
                if ($request->pin == $request->pin_confirmation) {
                    $user->pin = $request->pin;
                    $user->save();
                    return back()->with('success', 'Pin Changed Successfully.');
                } else {
                    return back()->with('alert', 'New Pin Does Not Match.');
                }
            } else {
                return back()->with('alert', 'Current Pin Not Match.');
            }
        } catch (\PDOException $e) {
            return back()->with('alert', $e->getMessage());
        }
    }

    public function submitPassword(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {

            $c_password = Auth::user()->password;
            $c_id = Auth::user()->id;
            $user = User::findOrFail($c_id);
            if (Hash::check($request->current_password, $c_password)) {
                if ($request->password == $request->password_confirmation) {
                    $password = Hash::make($request->password);
                    $user->password = $password;
                    $user->save();
                    return back()->with('success', 'Password Changed Successfully.');
                } else {
                    return back()->with('alert', 'New Password Does Not Match.');
                }
            } else {
                return back()->with('alert', 'Current Password Not Match.');
            }
        } catch (\PDOException $e) {
            return back()->with('alert', $e->getMessage());
        }
    }

    public function avatar(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $user = User::findOrFail(Auth::user()->id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $user->username . '.jpg';
            $location = 'asset/profile/' . $filename;
            if ($user->image != 'user-default.png') {
                $path = './asset/profile/';
                File::delete($path . $user->image);
            }
            Image::make($image)->resize(800, 800)->save($location);
            $user->image = $filename;
            $user->save();
            return back()->with('success', 'Avatar Updated Successfully.');
        } else {
            return back()->with('success', 'An error occured, try again.');
        }
    }

    public function kyc(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $user = User::findOrFail(Auth::user()->id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $user->username . '.jpg';
            $location = 'asset/profile/' . $filename;
            if ($user->image != 'user-default.png') {
                $path = './asset/profile/';
                $link = $path . $user->kyc_link;
                if (file_exists($link)) {
                    @unlink($link);
                }
            }
            Image::make($image)->resize(800, 800)->save($location);
            $user->kyc_link = $filename;
            $user->save();
            return back()->with('success', 'Kyc document Upload was successful.');
        } else {
            return back()->with('success', 'An error occured, try again.');
        }
    }

    public function account(Request $request)
    {
        $s = Auth::user()->suspend;
        $m = Auth::user()->suspend_msg;
        if ($s) {
            return redirect()->action([UserController::class, "dashboard"])->with('alert', "Account Suspended: " . $m);
        }
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->zip_code = $request->zip_code;
        $user->address = $request->address;
        $user->pin = $request->pin;
        $user->save();
        return back()->with('success', 'Profile Updated Successfully.');
    }
}
