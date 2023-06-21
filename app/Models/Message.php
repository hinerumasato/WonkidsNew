<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $fillable = ['title', 'content', 'send_id', 'receive_id'];

    public function findById($id) {
        return $this->find($id);
    }

    public function checkValidMessage($user, $message) {
        $receiveId = $message->receive_id;
        return $user->id === $receiveId;
    }

    public function markRead($id) {
        $message = $this->findById($id);
        $message->read = 1;
        $message->save();
    }

    public function markAnswered($id) {
        $message = $this->findById($id);
        $message->answered = 1;
        $message->save();
    }
}
