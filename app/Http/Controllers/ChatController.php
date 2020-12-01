<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ChatController extends Controller{
        public function chat(Request $request){
            $user_login = $request->session()->get('user-login');
            foreach($user_login as  $user){
                if ($user_login->id_user == "admin"){
                    $chatroom = DB::select('select * from chatroom');
                    return view('chat.chatAdmin', ["chatroom" => $chatroom]);
                }else{
                    $idchat = DB::select("select * from chatroom where id_user = ?", [$user_login['id_user']]);
                    if ($idchat!=null){
                        foreach($idchat as $chat){
                            $request->session()->put('target-chatroom', $chat->id_chatroom);
                            $chat = DB::select("select * from chat where id_chatroom = ?", [$chat->id_chatroom]);
                            return view('templates.chat', ['chat'=>$chat, "user" => $user_login]);
                        }
                    }else{
                        $id = "CR";
                        $row = DB::select('select nvl(max(substr(id_chatroom,3,3)),0) + 1 as num from chatroom where substr(id_chatroom, 1, 2) = ?', [$id]);
                        if ($row[0]->num < 10) {
                            $id .= '00' . $row[0]->num;
                        }
                        else if ($row[0]->num <100) {
                            $id .= '0' . $row[0]->num;
                        }
                        else {
                            $id .= $row[0]->num;
                        }
                        $row = DB::table('chatroom')
                        ->insert(['id_chatroom' => $id, 'id_user' => $user_login['id_user'], 'status' => 1]);
                        if ($row){
                            $chat = DB::select("select * from chat where id_chatroom = ?", [$row['id_chatroom']]);
                            $request->session()->put('target-chatroom', $row['id_chatroom']);
                            return view('templates.chat', ['chat'=>$chat, "user" => $user_login]);
                        }
                    }
                }
            }
        }

        public function insertChat(Request $request, $chat){
            $pesan = $request->input('pesan');
            $user_login = $request->session()->get('user-login');
            if ($user_login->id_user == "admin"){

            }else{
                $idchat = DB::select("select * from chatroom where id_user = ?", [$user_login->id_user]);
                foreach ($idchat as $idchatroom){
                    $id = "CH";
                    $row = DB::select('select nvl(max(substr(id_chat,3,3)),0) + 1 as num from chat where substr(id_chat, 1, 2) = ?', [$id]);
                    if ($row[0]->num < 10) {
                        $id .= '00' . $row[0]->num;
                    }
                    else if ($row[0]->num <100) {
                        $id .= '0' . $row[0]->num;
                    }
                    else {
                        $id .= $row[0]->num;
                    }
                    $chat = DB::table('chat')
                    ->insert(['id_chat' => $id, 'id_chatroom' => $idchatroom->id_chatroom, 'pesan' => $pesan, 'sender' => $user_login->id_user, 'tanggal'=>Carbon::now(), 'status'=>1]);
                    if ($chat){
                        foreach($idchat as $chat){
                            $chat = DB::select("select * from chat where id_chatroom = ?", [$chat->id_chatroom]);
                            return back();
                        }
                    }
                }
            }
        }

        public function chatAdmin(Request $request, $idchatroom){
            $user_login = $request->session()->get('user-login');
            $chat = DB::select("select * from chat where id_chatroom = ?", [$idchatroom]);
            $request->session()->put('target-chatroom', $idchatroom);
            return view('templates.chat', ['chat'=>$chat, "user" => $user_login]);
        }

        public function insertAdmin(Request $request, $idchatroom){
            $user_login = $request->session()->get('user-login');
            $pesan = $request->input('pesan');
            echo $idchatroom;
            $idchat = DB::select("select * from chatroom where id_chatroom = ?", [$idchatroom]);
            $id = "CH";
            $row = DB::select('select nvl(max(substr(id_chat,3,3)),0) + 1 as num from chat where substr(id_chat, 1, 2) = ?', [$id]);
            if ($row[0]->num < 10) {
                $id .= '00' . $row[0]->num;
            }
            else if ($row[0]->num <100) {
                $id .= '0' . $row[0]->num;
            }
            else {
                $id .= $row[0]->num;
            }
            $chat = DB::table('chat')
            ->insert(['id_chat' => $id, 'id_chatroom' => $idchatroom, 'pesan' => $pesan, 'sender' => $user_login->id_user, 'tanggal'=> Carbon::now(), 'status'=>1]);
            if ($chat){
                foreach($idchat as $chat){
                    $chat = DB::select("select * from chat where id_chatroom = ?", [$chat->id_chatroom]);
                    return back();
                }
            }
        }

        public function showChat(Request $request){
            $user_login = $request->session()->get('user-login');
            $idchatroom = $request->session()->get('target-chatroom');
            $chat = DB::select("select * from chat where id_chatroom = ?", [$idchatroom]);
            return view('chat.chat-display', ['chat'=>$chat, "user" => $user_login]);
        }
    }
?>
