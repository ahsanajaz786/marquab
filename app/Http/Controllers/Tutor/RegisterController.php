<?php

namespace App\Http\Controllers\Tutor;

use App\Credit;
use App\TutorInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{

    public function register(){
       
        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
        $languages = [
            'ab' => 'Abkhazian',
            'aa' => 'Afar',
            'af' => 'Afrikaans',
            'ak' => 'Akan',
            'sq' => 'Albanian',
            'am' => 'Amharic',
            'ar' => 'Arabic',
            'an' => 'Aragonese',
            'hy' => 'Armenian',
            'as' => 'Assamese',
            'av' => 'Avaric',
            'ae' => 'Avestan',
            'ay' => 'Aymara',
            'az' => 'Azerbaijani',
            'bm' => 'Bambara',
            'ba' => 'Bashkir',
            'eu' => 'Basque',
            'be' => 'Belarusian',
            'bn' => 'Bengali',
            'bh' => 'Bihari languages',
            'bi' => 'Bislama',
            'bs' => 'Bosnian',
            'br' => 'Breton',
            'bg' => 'Bulgarian',
            'my' => 'Burmese',
            'ca' => 'Catalan, Valencian',
            'km' => 'Central Khmer',
            'ch' => 'Chamorro',
            'ce' => 'Chechen',
            'ny' => 'Chichewa, Chewa, Nyanja',
            'zh' => 'Chinese',
            'cu' => 'Church Slavonic, Old Bulgarian, Old Church Slavonic',
            'cv' => 'Chuvash',
            'kw' => 'Cornish',
            'co' => 'Corsican',
            'cr' => 'Cree',
            'hr' => 'Croatian',
            'cs' => 'Czech',
            'da' => 'Danish',
            'dv' => 'Divehi, Dhivehi, Maldivian',
            'nl' => 'Dutch, Flemish',
            'dz' => 'Dzongkha',
            'en' => 'English',
            'eo' => 'Esperanto',
            'et' => 'Estonian',
            'ee' => 'Ewe',
            'fo' => 'Faroese',
            'fj' => 'Fijian',
            'fi' => 'Finnish',
            'fr' => 'French',
            'ff' => 'Fulah',
            'gd' => 'Gaelic, Scottish Gaelic',
            'gl' => 'Galician',
            'lg' => 'Ganda',
            'ka' => 'Georgian',
            'de' => 'German',
            'ki' => 'Gikuyu, Kikuyu',
            'el' => 'Greek (Modern)',
            'kl' => 'Greenlandic, Kalaallisut',
            'gn' => 'Guarani',
            'gu' => 'Gujarati',
            'ht' => 'Haitian, Haitian Creole',
            'ha' => 'Hausa',
            'he' => 'Hebrew',
            'hz' => 'Herero',
            'hi' => 'Hindi',
            'ho' => 'Hiri Motu',
            'hu' => 'Hungarian',
            'is' => 'Icelandic',
            'io' => 'Ido',
            'ig' => 'Igbo',
            'id' => 'Indonesian',
            'ia' => 'Interlingua (International Auxiliary Language Association)',
            'ie' => 'Interlingue',
            'iu' => 'Inuktitut',
            'ik' => 'Inupiaq',
            'ga' => 'Irish',
            'it' => 'Italian',
            'ja' => 'Japanese',
            'jv' => 'Javanese',
            'kn' => 'Kannada',
            'kr' => 'Kanuri',
            'ks' => 'Kashmiri',
            'kk' => 'Kazakh',
            'rw' => 'Kinyarwanda',
            'kv' => 'Komi',
            'kg' => 'Kongo',
            'ko' => 'Korean',
            'kj' => 'Kwanyama, Kuanyama',
            'ku' => 'Kurdish',
            'ky' => 'Kyrgyz',
            'lo' => 'Lao',
            'la' => 'Latin',
            'lv' => 'Latvian',
            'lb' => 'Letzeburgesch, Luxembourgish',
            'li' => 'Limburgish, Limburgan, Limburger',
            'ln' => 'Lingala',
            'lt' => 'Lithuanian',
            'lu' => 'Luba-Katanga',
            'mk' => 'Macedonian',
            'mg' => 'Malagasy',
            'ms' => 'Malay',
            'ml' => 'Malayalam',
            'mt' => 'Maltese',
            'gv' => 'Manx',
            'mi' => 'Maori',
            'mr' => 'Marathi',
            'mh' => 'Marshallese',
            'ro' => 'Moldovan, Moldavian, Romanian',
            'mn' => 'Mongolian',
            'na' => 'Nauru',
            'nv' => 'Navajo, Navaho',
            'nd' => 'Northern Ndebele',
            'ng' => 'Ndonga',
            'ne' => 'Nepali',
            'se' => 'Northern Sami',
            'no' => 'Norwegian',
            'nb' => 'Norwegian Bokmål',
            'nn' => 'Norwegian Nynorsk',
            'ii' => 'Nuosu, Sichuan Yi',
            'oc' => 'Occitan (post 1500)',
            'oj' => 'Ojibwa',
            'or' => 'Oriya',
            'om' => 'Oromo',
            'os' => 'Ossetian, Ossetic',
            'pi' => 'Pali',
            'pa' => 'Panjabi, Punjabi',
            'ps' => 'Pashto, Pushto',
            'fa' => 'Persian',
            'pl' => 'Polish',
            'pt' => 'Portuguese',
            'qu' => 'Quechua',
            'rm' => 'Romansh',
            'rn' => 'Rundi',
            'ru' => 'Russian',
            'sm' => 'Samoan',
            'sg' => 'Sango',
            'sa' => 'Sanskrit',
            'sc' => 'Sardinian',
            'sr' => 'Serbian',
            'sn' => 'Shona',
            'sd' => 'Sindhi',
            'si' => 'Sinhala, Sinhalese',
            'sk' => 'Slovak',
            'sl' => 'Slovenian',
            'so' => 'Somali',
            'st' => 'Sotho, Southern',
            'nr' => 'South Ndebele',
            'es' => 'Spanish, Castilian',
            'su' => 'Sundanese',
            'sw' => 'Swahili',
            'ss' => 'Swati',
            'sv' => 'Swedish',
            'tl' => 'Tagalog',
            'ty' => 'Tahitian',
            'tg' => 'Tajik',
            'ta' => 'Tamil',
            'tt' => 'Tatar',
            'te' => 'Telugu',
            'th' => 'Thai',
            'bo' => 'Tibetan',
            'ti' => 'Tigrinya',
            'to' => 'Tonga (Tonga Islands)',
            'ts' => 'Tsonga',
            'tn' => 'Tswana',
            'tr' => 'Turkish',
            'tk' => 'Turkmen',
            'tw' => 'Twi',
            'ug' => 'Uighur, Uyghur',
            'uk' => 'Ukrainian',
            'ur' => 'Urdu',
            'uz' => 'Uzbek',
            've' => 'Venda',
            'vi' => 'Vietnamese',
            'vo' => 'Volap_k',
            'wa' => 'Walloon',
            'cy' => 'Welsh',
            'fy' => 'Western Frisian',
            'wo' => 'Wolof',
            'xh' => 'Xhosa',
            'yi' => 'Yiddish',
            'yo' => 'Yoruba',
            'za' => 'Zhuang, Chuang',
            'zu' => 'Zulu'
        ];
        $languageLavels = [
            'Beginner',
            'B1',
            'B2',
            'C2',
            'Native',
        ];
        $subjects = [
            'Math',
            'Physics',
            'English',
            'Chemistry',
            'Biology',
            'Economics',
            'Pak Study',
            'Islamiat'
        ];
        $timezones = [
            'Asia/Almaty',
            'Asia/Dhaka',
            'Asia/Riyadh',
            'Asia/Karachi',
            'Asia/Famagusta'
        ];
        return view('tutor.profile',
            compact(
                'countries', 'languages',
                'subjects', 'timezones',
                'languageLavels'
            ));
    }
    public function registerPost(Request $request){
     
        $request->validate([
           
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
           
        ]);
        $user = User::create([
            'first_name' =>'',
            'last_name' =>'',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'time_zone' => '',
            'step'=>1,
            'role' => 'Teacher',
        ]);

        return response(['success' => 'success'],200);

        
    }
    public function updateTimeZone(Request $request){
       
      
        User::where('id',Auth::user()->id)->update(['time_zone'=>$request->time_zone]);
             
     
        return response(['success' => 'success'],200);
    }
    

    public function updatePersonalInfo(Request $request){
        User::where('id',Auth::user()->id)->update(array('first_name'=>$request->first_name,'last_name'=>$request->last_name,'step'=>2
    ));    
       $t=TutorInfo::where('user_id',Auth::user()->id)->get();
       if($t->count()==0)
       {

        TutorInfo::create(['user_id'=>Auth::user()->id,'language_spoken'=>$request->language_spoken,
        'language_spoken_lavel'=>$request->language_spoken_lavel,'subject_taught'=>
        $request->subject_taught,'hourly_rate'=>$request->hourly_rate,'phone_number'=>
        $request->phone_number,'country'=>$request->country,'profile_photo'=>'','headline'=>'','about'=>'','recorded_video'=>'','youtube_url'=>'']);
       }else{
        TutorInfo::where('user_id',Auth::user()->id)->update(['user_id'=>Auth::user()->id,'language_spoken'=>$request->language_spoken,
        'language_spoken_lavel'=>$request->language_spoken_lavel,'subject_taught'=>
        $request->subject_taught,'hourly_rate'=>$request->hourly_rate,'phone_number'=>
        $request->phone_number,'country'=>$request->country,'profile_photo'=>'','headline'=>'','about'=>'','recorded_video'=>'','youtube_url'=>'']);
       
       }
        return response(['success' => 'success'],200);
    }
    public function updateUserDescrtion(Request $request){
       
        if(Auth::user()->step>1)
        {
        TutorInfo::where('user_id',Auth::user()->id)->update(['headline'=>$request->title,'about'=>$request->desc]);
        }
        return response(['success' => 'success'],200);
    }
    public function getUserDescrtion(Request $request){
        
       $data= TutorInfo::where('user_id',Auth::user()->id)-select('headline','about');
        return response(['desc' => $data],200);
    }
    public function loadPersonalInfo(Request $request){
        
            $user=User::find(Auth::user()->id);
            $tutor=TutorInfo::where('user_id',Auth::user()->id)->first();
            return response(['user' => $user,'tutor'=>$tutor],200);
    
    }
    public function processRegistrationStep1(Request $request){
        return redirect(route('tutor.register'));
    }
    public function processRegistrationStep2(Request $request){
        $request->validate([
        ]);
    	return redirect(route('tutor.register'));
    }
    public function processRegistrationStep3(Request $request){

        return redirect(route('tutor.register'));
    }
    

    public function Uploads(Request $request){
        if($request->hasFile('img') && $request->hasFile('video'))
        {   $url='';
            if(!$request->url==null)
            {

             $url=$request->url;
            }
            $user=TutorInfo::where('user_id',Auth::user()->id)->first();

            if (File::exists(Auth::user()->id.'/'.$user->profile_photo)) {
                
               if( Storage::delete(Auth::user()->id.'/'.$user->profile_photo)){
                   
               }
              
            }
            if (File::exists(Auth::user()->id.'/'.$user->recorded_video)) {
                Storage::delete(Auth::user()->id.'/'.$user->profile_photo);
              
            }
            $name = $request->file('img')->getClientOriginalName();
            $video = $request->file('video')->getClientOriginalName();
            if (!File::exists(Auth::user()->id)) {

                File::makeDirectory(Auth::user()->id);
            }
            Storage::disk('users')->putFileAs(
                Auth::user()->id.'/', $request->file('img'), $name
            );
            Storage::disk('users')->putFileAs(
                Auth::user()->id.'/', $request->file('video'), $video
            );

            TutorInfo::where('user_id',Auth::user()->id)->update(['profile_photo'=>Auth::user()->id.'/'.$name,'recorded_video'=>Auth::user()->id.'/'.$video,'youtube_url'=>$url]);
       

            return response(['success' => 'success'],200);
        }
        return $request;

       
    }
}