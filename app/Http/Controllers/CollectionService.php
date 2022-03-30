<?php

    namespace App\Http\Controllers;

    use App\Models\Collection;
    use App\Models\Shared;
    use App\Models\User;
    use App\Models\Variable;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Str;

    class CollectionService extends Controller {


        //
        private RequestService $serviceRequest;

        public function __construct() {
            $this->serviceRequest = new RequestService();
        }

        private function createCollection($name, $user_id) {
            $collection = new Collection();
            $collection->name = $name;
            $collection->user_id = $user_id;
            $collection->save();

            return $collection->id;
        }

        public function checkIfUserExist($mail) {
            $user = User::where('email', $mail)->first();
            $password = null;
            if(empty($user)) {
                $user = new User();
                $user->name = explode('@', $mail)[0];
                $user->email = $mail;
                $password = Str::random(8);
                $user->password = Hash::make($password);
                $user->save();
            }
            return $password;
        }

        public function shareCollection($collection_id, $user_mail, $from, $password = null) {
            $user = User::where('email', $user_mail)->first();
            $already = Shared::where('collection_id', $collection_id)->where('user_id', $user->id)->first();
            if(!empty($already)) return false;

            Shared::create(['collection_id' => $collection_id, 'user_id' => $user->id]);

            Mail::send('emails.mail', ['mail' => $user_mail, 'password' => $password, 'from' => $from], function($message) use ($user_mail) {
                $message->to($user_mail, $user_mail)->subject('Share collection');
                $message->from('copy.session@gmail.com', 'Vla mailer');
            });

            return true;
        }

        public function renameCollection($id, $new_name) {
            $collection = Collection::find($id);
            $collection->name = $new_name;
            $collection->save();
            return true;
        }

        public function importFromPostman($content,$user_id) {
            $content = json_decode($content,true);
            if(empty($content)||empty($user_id)) return false;

            $collection = $content['info'];
            $collection_id = $this->createCollection($collection['name'],$user_id);


            $variables = $content['variable'] ?? [];
            foreach($variables as $variable) $this->createVariable($variable['key'],$variable['value'],$collection_id);

            $items = $content['item'] ?? [];
            foreach($items as $i=>$item){
                $body = $item['request']['body'] ?? [];
                $mode = $body['mode'] ?? 'none';
                if($mode==='formdata'){
                    $form_data = [];
                    foreach($body['formdata'] as $formdatum){
                        $type = $formdatum['type'] ?? 'text';
                        if($type==='file') continue;
                        $form_data[$formdatum['key']] = $formdatum['value'];
                    }
                    $body = $form_data;
                }else if($mode==='raw'){
                    $body = json_decode($body['raw'],true);
                }
                $url = $item['request']['url']['protocol'].'://'.implode('.',$item['request']['url']['host']).'/'.implode('/',$item['request']['url']['path']);

                $query = $item['request']['url']['query'] ?? [];
                $to_query = [];
                foreach($query as $q){
                    $to_query[] = ['name'=>$q['key'],'value'=>$q['value'],'description'=>$q['description']??null];
                }

                $headers = $item['request']['header'] ?? [];
                $to_header = [];
                foreach($headers as $header){
                    $to_header[] = ['name'=>$header['key'],'value'=>$header['value'],'description'=>$header['description']??null];
                }

                $this->serviceRequest->createRequest($collection_id, $item['name'], $item['request']['method'], $url, $to_query, $to_header, json_encode($body), $item['response']);
            }

            return true;
        }

        public function createVariable(mixed $key, mixed $value, mixed $collection_id) {
            $exist = Variable::where('collection_id',$collection_id)->where('name',$key)->where('initial_value',$value)->count();
            if($exist) return false;

            $variable = new Variable();
            $variable->collection_id = $collection_id;
            $variable->name = $key;
            $variable->initial_value = $value;
            $variable->current_value = $value;
            $variable->save();
            return true;
        }
    }
