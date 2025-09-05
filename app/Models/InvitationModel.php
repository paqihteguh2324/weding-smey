<?php

namespace App\Models;

use CodeIgniter\Model;

class InvitationModel extends Model
{
    protected $table = 'rsvp_messages';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'message', 'created_at', 'updated_at', 'attended'];
    protected $useTimestamps = true;
}
?>