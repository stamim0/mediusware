<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function rate(){
        $currentDay = Carbon::now()->format('l');
        $total_transaction = Transaction::where('user_id',$this->id)->sum('amount') ;
        $month_transaction = Transaction::where('user_id',$this->id)->whereBetween('created_at',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])->sum('amount') ;
        if ($currentDay == 'Firday' || $total_transaction < 5000 || $total_transaction < 1000) {
           return 0 ;
        }
        $fee = 0 ;
        if($this->account_type == 0){
            $fee = 0.015 ;
        }else{
            if($total_transaction > 50000){
                $fee = 0.015 ;
            }else {
                $fee = 0.025 ;
            }
        }

        return $fee ;
    }
}
