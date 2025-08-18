<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'password_show',
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

    //Models Information Data
    /********
     * 
     * 
     *  ------------------------
     *  Status==0=Inactive, 1=Active, 2=draft
     * ------------------------
     * 
     * Column:
     * 
     * id               =bigint(20):None,
     * permission_id    =int(11):null,
     * name             =varchar(100):null,
     * email            =varchar(100):null,
     * mobile           =varchar(20):null,
     * profile          =text:null,
     * full_address     =text:null,
     * address_line1    =text:null,
     * address_line2    =text:null,
     * postal_address   =varchar(250):null,
     * postal_code      =varchar(20):null,
     * city             =int(4):null,
     * district         =int(4):null,
     * division         =int(4):null,
     * country          =int(4):null,
     * dob              =timestamp:null,
     * gender           =varchar(10):null,
     * status           =tinyint(1):1,
     * fetured          =tinyint(1):0,
     * email_verified_at=tinyint(1):0,
     * password         =varchar(255):none,
     * password_show    =varchar(191):null,
     * remember_token   =varchar(100):null,
     * api_token        =varchar(100):null,
     * device_key       =varchar(255):null,
     * verify_code      =varchar(100):null,
     * verify_code_status=tinyint(1):0,
     * balance          =float(10,2):0.00,
     * subscriber       =tinyint(1):0,
     * customer         =tinyint(1):1,
     * business         =tinyint(1):0,
     * admin            =tinyint(1):0,
     * addedby_id       =bigint(20):0,
     * addedby_at       =timestamp:null,
     * created_at       =timestamp:null
     * updated_at       =timestamp:null
     * 
     * 
     * 
     ****/

     public function identities() {
        return $this->hasMany(SocialIdentity::class);
     }
 
     public function permission(){
         return $this->belongsTo(Permission::class);
     }
 
     public function addedBy(){
         return $this->belongsTo(User::class,'addedby_id');
     }
 
     public function comments(){
         return $this->hasMany(Review::class,'addedby_id')->where('type',1);
     }
     
     public function reviews(){
         return $this->hasMany(ProductReview::class);
     }
     
     public function imageFile(){
         return $this->hasOne(Media::class,'src_id')->where('src_type',6)->where('use_Of_file',1);
     }
 
     public function image($type=null){
         
         if($this->imageFile){
             if($type=='sm'){
                return $this->imageFile->file_url_sm; 
             }elseif($type=='md'){
                return $this->imageFile->file_url_md;
             }elseif($type=='lg'){
                return $this->imageFile->file_url_lg;
             }else{
                return $this->imageFile->file_url; 
             }
         }else{
             return 'medies/profile.png';
         }
     }
 
 
     public function bannerFile(){
         return $this->hasOne(Media::class,'src_id')->where('src_type',6)->where('use_Of_file',2);
     }
 
     public function banner(){
         
         if($this->bannerFile){
             return $this->bannerFile->file_url;
         }else{
             return 'app-assets/images/carousel/22.jpg';
         }
     }
     
     public function countryN(){
         return $this->belongsTo(Country::class,'country');
     }
     
     public function divitionN(){
         return $this->belongsTo(Country::class,'division');
     }
 
     public function districtN(){
         return $this->belongsTo(Country::class,'district');
     }
     
     
     public function cityN(){
         return $this->belongsTo(Country::class,'city');
     }
 
 
     public function user(){
         return $this->belongsTo(User::class,'id');
     }
 
     public function fullAddress(){
 
         $addr =$this->address_line1;
 
         if($this->cityN){
            $addr .=', '.$this->cityN->name;
         }
 
         if($this->districtN){
            $addr .=', '.$this->districtN->name;
         }
 
         if($this->postal_code){
            $addr .=' - '.$this->postal_code;
         }
 
         if($this->divitionN){
            $addr .=', '.$this->divitionN->name;
         }
 
         return $addr;
         
     }
     
     public function posts(){
         return $this->hasMany(Post::class,'addedby_id')->where('type',1);;
     }
     







}
