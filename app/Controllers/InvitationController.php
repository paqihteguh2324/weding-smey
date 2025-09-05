<?php

namespace App\Controllers;

use App\Models\InvitationModel;

class InvitationController extends BaseController
{
    public function index($tamu)
    {
        $model = new InvitationModel();
        $data = [
            'title'        => 'The Wedding of Fariz & Maya',
            'groom'        => 'F',
            'bride'        => 'M',
            'guest_name'   => $tamu,
            'wedding_date' => '2025-09-15',
            'venue'        => 'Grand Ballroom Hotel Mulia',
            'address'      => 'Jl. Asia Afrika No. 8, Bandung',
            'rsvpList' => $model->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('invitation_view', $data);
    }

    public function saveRsvp()
    {
        if ($this->request->getMethod() === 'POST') {
            $model = new InvitationModel();

            $dataSave = [
                'name'     => $this->request->getPost('name'),
                'message'  => $this->request->getPost('message'),
                'attended' => $this->request->getPost('attended'),
            ];

            $model->insert($dataSave);

            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Pesan berhasil dikirim',
                'data'    => $dataSave
            ]);
        }

        return $this->response->setJSON(['status' => 'error']);
    }

    public function getRsvpList()
    {
        $model = new InvitationModel();
        return $this->response->setJSON($model->orderBy('created_at', 'DESC')->findAll());
    }
}
