<?php

namespace App\Http\Controllers;

use App\Credit;
use App\NotificationSetting;
use App\TutorBackground;
use App\TutorInfo;
use App\User;
use App\UserAvailabilitySettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function profile(){
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
        $user = auth()->user();
        $info = [];
        if(auth()->user()->role == 'Teacher')
            $info = $user->tutorInfo;
        else
            $info = $user->studentInfo;
        $subjectsSelected = [];
        $languagesSelected = [];
        $lavelSelected = [];
        $profilePhoto = null;
        $introVideo = '';

        if($info->subject_taught)
            $subjectsSelected = json_decode($info->subject_taught);

        if($info->language_spoken)
            $languagesSelected = json_decode($info->language_spoken);

        if($info->language_spoken_lavel)
            $lavelSelected = json_decode($info->language_spoken_lavel);

        if($info->profile_photo && Storage::disk('users')->exists($user->id.'/'.$info->profile_photo))
            $profilePhoto = Storage::disk('users')->url($user->id.'/'.$info->profile_photo);

        if($info->youtube_url){
            $introVideo = $this->getIframe($info->youtube_url);
        }elseif($info->recorded_video && Storage::disk('users')->exists($user->id.'/recorded-video.webm')){
            $url = url(Storage::disk('users')->url($user->id.'/recorded-video.webm'));
            $introVideo = '<video src="'.$url.'" controls width="500"></video>';
        }
        $background = TutorBackground::where('user_id', auth()->user()->id)->get();
        $certification = [];
        $education = [];
        $experience = [];
        $profile = [];
        foreach ($background as $data){
            if($data->type == 'certificate'){
                $certification = json_decode($data->data);
            }else if($data->type == 'education'){
                $education = json_decode($data->data);
            }else if($data->type == 'experience'){
                $experience = json_decode($data->data);
            }else if($data->type == 'profile'){
                $profile = json_decode($data->data);
            }
        }
        return view('profile',
            compact(
                'countries', 'languages',
                'subjects', 'timezones', 'user',
                'info', 'subjectsSelected', 'languagesSelected',
                'languageLavels','lavelSelected','profilePhoto',
                'introVideo', 'certification', 'education', 'experience', 'profile'
            )
        );
    }

    public function aboutUpdate(Request $request){

        if(auth()->user()->role != 'Teacher')
            return;

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'language_spoken' => 'required|array|min:1',
            'language_spoken_lavel' => 'required|array|min:1',
            'subject_taught' => 'required|array|min:1',
            'hourly_rate' => 'required|string',
            'phone_number' => 'nullable|integer',
            'time_zone' => 'required|string',
            'country' => 'required|string',
        ]);
            $user = auth()->user();
            $info = TutorInfo::find($user->TutorInfo->id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->time_zone = $request->time_zone;
            $user->save();
        try {
            $langLevels = [];
            for ($i = 0; $i < count($request->language_spoken); $i++){
                $langLevels[] = $request->language_spoken_lavel[$i];
            }
            $info->language_spoken = json_encode($request->language_spoken);
            $info->language_spoken_lavel = json_encode($langLevels);
            $info->subject_taught = json_encode($request->subject_taught);
            $info->hourly_rate = $request->hourly_rate;
            $info->phone_number = $request->phone_number;
            $info->country = $request->country;
            $info->save();
        }catch(\Exception $e){
            User::find($user->id)->delete();
        }
        return redirect()->back()->with(['message' => 'key']);
    }

    public function photoUpdate(Request $request){
        $request->validate([
            'profile_photo' => 'required|image',
        ]);
        $user = auth()->user();
        $info = [];
        if(auth()->user()->role == 'Teacher')
            $info = $user->tutorInfo;
        else
            $info = $user->studentInfo;
        if($info->profile_photo){
            if(Storage::disk('users')->exists($user->id.'/'.$info->profile_photo))
                Storage::disk('users')->delete($user->id.'/'.$info->profile_photo);
        }
        $profilePhotoName = $request->file('profile_photo')->getClientOriginalName();
        $request->file('profile_photo')->storeAs($user->id, $profilePhotoName, 'users');
        $info->profile_photo = $profilePhotoName;
        $info->save();
        return redirect()->back()->with(['message' => 'key']);
    }

    public function descriptionUpdate(Request $request){
        if(auth()->user()->role != 'Teacher')
            return;
        $request->validate([
            'headline' => 'required|string',
            'about' => 'required|string'
        ]);
        $info = auth()->user()->tutorInfo;
        $info->headline = $request->headline;
        $info->about = $request->about;
        $info->save();
        return redirect()->back()->with(['message' => 'key']);
    }

    public function videoUpdate(Request $request){
        if(auth()->user()->role != 'Teacher')
            return;
        if($request->exists('recorded_video')){
            if(Storage::disk('users')->exists(auth()->user()->id.'/recorded-video.webm'))
                Storage::disk('users')->delete(auth()->user()->id.'/recorded-video.webm');
            $request->file('recorded_video')->storeAs(auth()->user()->id, 'recorded-video.webm', 'users');
            $info = auth()->user()->tutorInfo;
            $info->recorded_video = 'recorded-video.webm';
            $info->save();
        }
        if($request->exists('youtube_url') && $request->youtube_url !== ''){
            $info = auth()->user()->tutorInfo;
            $info->youtube_url = $request->youtube_url;
            $info->save();
        }
        return redirect()->back()->with(['message' => 'key']);
    }

    public function settings(){
        $notifications = NotificationSetting::where('user_id', auth()->user()->id)->first();
        if($notifications){
            $notifications->email_notifications = json_decode($notifications->email_notifications);
            $notifications->sms_notifications = json_decode($notifications->sms_notifications);
            $notifications->insights = json_decode($notifications->insights);
        }
        $availabiltySettings = UserAvailabilitySettings::where('user_id', \auth()->user()->id)->first();
        return view('settings')->withNotifications($notifications)->withAvailabiltySettings($availabiltySettings);
    }
    public function passwordChange(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        if(!Hash::check($request->current_password, Auth::user()->password))
            return redirect()->back()->withErrors(['current_password' => 'Invalide old password']);
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->withSuccess('Password changed');
    }

    public function addCardPayment(Request $request){
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $source = \Stripe\Source::retrieve($request->event_id);

        if($source->metadata->status == 'pending') {
            $charge = \Stripe\Charge::create([
                'amount' => $source->amount,
                'currency' => $source->currency,
                'source' => $source->id,
            ]);


            if($charge->status == 'succeeded') {
                $credit = Credit::where('user_id', $source->metadata->user_id)->first();
                $credit->credit += $source->amount / 100;
                $credit->save();
                \Stripe\Source::update(
                    $request->event_id,
                    ['metadata' => ['status' => 'updated']]
                );
                return response(['message' => 'Payment added successfully'], 200);
            }else{
                return response(['error' => $charge], 406);
            }
        }
        return response(['error' => 'Already Added'],406);
    }

    public function availabilitySettingsPost(Request $request){
        $request->validate([
            'min_time_booking' => 'required',
            'max_time_booking' => 'required',
        ]);
        UserAvailabilitySettings::create([
            'user_id' => auth()->user()->id,
            'min_time_booking' => $request->min_time_booking,
            'max_time_booking' => $request->max_time_booking,
        ]);
        return redirect()->back()->withSuccess('Calendar Settings Saved');
    }

    public function availabilitySettingsUpdate(Request $request ,$id){
        UserAvailabilitySettings::find($id)->update([
            'user_id' => auth()->user()->id,
            'min_time_booking' => $request->min_time_booking,
            'max_time_booking' => $request->max_time_booking,
        ]);
        return redirect()->back()->withSuccess('Calendar Settings Saved');
    }

    private function getIframe($url){
        $id= '';
        $iframe = '';
        if(strpos($url,'youtu')) {
            if (strpos($url, 'https://youtu.be/')) {
                $id = explode('https://youtu.be/', $url)[1];
            } elseif(strpos($url, 'embed')){
                $id = explode('https://www.youtube.com/embed/', $url)[1];
            }elseif (strpos($url, '=')) {
                $id = explode('=', $url)[1];
            }
            if($id){
                $iframe = '<iframe width="560" height="315" src="//www.youtube.com/embed/'
                    . $id . '" frameborder="0" allowfullscreen></iframe>';
                return $iframe;
            }
        }
        return false;
    }


}
