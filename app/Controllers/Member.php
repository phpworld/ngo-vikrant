<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ApplicationModel;

class Member extends BaseController
{
    protected $userModel;
    protected $applicationModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->applicationModel = new ApplicationModel();
        $this->session = \Config\Services::session();
    }

    private function checkMemberAuth()
    {
        if (!$this->session->get('isLoggedIn') || $this->session->get('user_role') !== 'member') {
            return redirect()->to('/login')->with('error', 'कृपया सदस्य के रूप में लॉगिन करें');
        }
        return true;
    }

    public function dashboard()
    {
        $auth = $this->checkMemberAuth();
        if ($auth !== true) return $auth;

        $userId = $this->session->get('user_id');
        $applications = $this->applicationModel->getApplicationsByUser($userId);

        // Get statistics
        $total_applications = count($applications);
        $pending_applications = count(array_filter($applications, function($app) { return $app['status'] === 'pending'; }));
        $approved_applications = count(array_filter($applications, function($app) { return $app['status'] === 'approved'; }));
        $rejected_applications = count(array_filter($applications, function($app) { return $app['status'] === 'rejected'; }));

        // Get recent applications (last 5)
        $recent_applications = array_slice($applications, 0, 5);

        $data = [
            'title' => 'सदस्य डैशबोर्ड',
            'user_name' => $this->session->get('user_name'),
            'applications' => $applications,
            'total_applications' => $total_applications,
            'pending_applications' => $pending_applications,
            'approved_applications' => $approved_applications,
            'rejected_applications' => $rejected_applications,
            'recent_applications' => $recent_applications
        ];

        return view('member/dashboard', $data);
    }

    public function profile()
    {
        $auth = $this->checkMemberAuth();
        if ($auth !== true) return $auth;

        $userId = $this->session->get('user_id');
        $user = $this->userModel->find($userId);

        $data = [
            'title' => 'मेरी प्रोफ़ाइल',
            'user' => $user,
            'user_name' => $this->session->get('user_name')
        ];

        return view('member/profile', $data);
    }

    public function applications()
    {
        $auth = $this->checkMemberAuth();
        if ($auth !== true) return $auth;

        $userId = $this->session->get('user_id');
        $applications = $this->applicationModel->getApplicationsByUser($userId);

        $data = [
            'title' => 'मेरे आवेदन',
            'applications' => $applications,
            'user_name' => $this->session->get('user_name')
        ];

        return view('member/applications', $data);
    }

    public function applyVivahHelp()
    {
        $auth = $this->checkMemberAuth();
        if ($auth !== true) return $auth;

        $data = [
            'title' => 'विवाह सहायता आवेदन',
            'user_name' => $this->session->get('user_name'),
            'validation' => \Config\Services::validation()
        ];

        return view('member/apply_vivah', $data);
    }

    public function processVivahApplication()
    {
        $auth = $this->checkMemberAuth();
        if ($auth !== true) return $auth;

        $rules = [
            'applicant_name' => 'required|min_length[3]|max_length[100]',
            'father_name' => 'required|min_length[3]|max_length[100]',
            'mother_name' => 'required|min_length[3]|max_length[100]',
            'phone' => 'required|numeric|min_length[10]|max_length[10]',
            'address' => 'required|min_length[10]',
            'aadhar_number' => 'required|numeric|min_length[12]|max_length[12]',
            'bank_account' => 'required|numeric|min_length[10]',
            'ifsc_code' => 'required|min_length[11]|max_length[11]',
            'application_amount' => 'required|numeric',
            'application_reason' => 'required|min_length[20]'
        ];

        if (!$this->validate($rules)) {
            return view('member/apply_vivah', [
                'title' => 'विवाह सहायता आवेदन',
                'user_name' => $this->session->get('user_name'),
                'validation' => $this->validator
            ]);
        }

        $applicationData = [
            'user_id' => $this->session->get('user_id'),
            'application_type' => 'vivah_help',
            'applicant_name' => $this->request->getPost('applicant_name'),
            'father_name' => $this->request->getPost('father_name'),
            'mother_name' => $this->request->getPost('mother_name'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'aadhar_number' => $this->request->getPost('aadhar_number'),
            'bank_account' => $this->request->getPost('bank_account'),
            'ifsc_code' => $this->request->getPost('ifsc_code'),
            'application_amount' => $this->request->getPost('application_amount'),
            'application_reason' => $this->request->getPost('application_reason'),
            'status' => 'pending'
        ];

        if ($this->applicationModel->insert($applicationData)) {
            return redirect()->to('/member/applications')->with('success', 'विवाह सहायता आवेदन सफलतापूर्वक जमा किया गया');
        } else {
            return view('member/apply_vivah', [
                'title' => 'विवाह सहायता आवेदन',
                'user_name' => $this->session->get('user_name'),
                'validation' => $this->validator,
                'error' => 'आवेदन जमा करने में त्रुटि हुई'
            ]);
        }
    }

    public function applyDeathHelp()
    {
        $auth = $this->checkMemberAuth();
        if ($auth !== true) return $auth;

        $data = [
            'title' => 'मृत्यु सहायता आवेदन',
            'user_name' => $this->session->get('user_name'),
            'validation' => \Config\Services::validation()
        ];

        return view('member/apply_death', $data);
    }

    public function processDeathApplication()
    {
        $auth = $this->checkMemberAuth();
        if ($auth !== true) return $auth;

        $rules = [
            'applicant_name' => 'required|min_length[3]|max_length[100]',
            'father_name' => 'required|min_length[3]|max_length[100]',
            'mother_name' => 'required|min_length[3]|max_length[100]',
            'phone' => 'required|numeric|min_length[10]|max_length[10]',
            'address' => 'required|min_length[10]',
            'aadhar_number' => 'required|numeric|min_length[12]|max_length[12]',
            'bank_account' => 'required|numeric|min_length[10]',
            'ifsc_code' => 'required|min_length[11]|max_length[11]',
            'application_amount' => 'required|numeric',
            'application_reason' => 'required|min_length[20]'
        ];

        if (!$this->validate($rules)) {
            return view('member/apply_death', [
                'title' => 'मृत्यु सहायता आवेदन',
                'user_name' => $this->session->get('user_name'),
                'validation' => $this->validator
            ]);
        }

        $applicationData = [
            'user_id' => $this->session->get('user_id'),
            'application_type' => 'death_help',
            'applicant_name' => $this->request->getPost('applicant_name'),
            'father_name' => $this->request->getPost('father_name'),
            'mother_name' => $this->request->getPost('mother_name'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'aadhar_number' => $this->request->getPost('aadhar_number'),
            'bank_account' => $this->request->getPost('bank_account'),
            'ifsc_code' => $this->request->getPost('ifsc_code'),
            'application_amount' => $this->request->getPost('application_amount'),
            'application_reason' => $this->request->getPost('application_reason'),
            'status' => 'pending'
        ];

        if ($this->applicationModel->insert($applicationData)) {
            return redirect()->to('/member/applications')->with('success', 'मृत्यु सहायता आवेदन सफलतापूर्वक जमा किया गया');
        } else {
            return view('member/apply_death', [
                'title' => 'मृत्यु सहायता आवेदन',
                'user_name' => $this->session->get('user_name'),
                'validation' => $this->validator,
                'error' => 'आवेदन जमा करने में त्रुटि हुई'
            ]);
        }
    }

    public function updateProfile()
    {
        $auth = $this->checkMemberAuth();
        if ($auth !== true) return $auth;

        $userId = $this->session->get('user_id');
        
        $rules = [
            'full_name' => 'required|min_length[3]|max_length[100]',
            'phone' => 'required|numeric|min_length[10]|max_length[10]',
            'address' => 'required|min_length[10]'
        ];

        if ($this->request->getPost('password')) {
            $rules['password'] = 'min_length[6]';
            $rules['confirm_password'] = 'matches[password]';
        }

        if (!$this->validate($rules)) {
            $user = $this->userModel->find($userId);
            return view('member/profile', [
                'title' => 'मेरी प्रोफ़ाइल',
                'user' => $user,
                'user_name' => $this->session->get('user_name'),
                'validation' => $this->validator
            ]);
        }

        $updateData = [
            'full_name' => $this->request->getPost('full_name'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address')
        ];

        if ($this->request->getPost('password')) {
            $updateData['password'] = $this->request->getPost('password');
        }

        if ($this->userModel->update($userId, $updateData)) {
            $this->session->set('user_name', $updateData['full_name']);
            return redirect()->to('/member/profile')->with('success', 'प्रोफ़ाइल सफलतापूर्वक अपडेट की गई');
        } else {
            $user = $this->userModel->find($userId);
            return view('member/profile', [
                'title' => 'मेरी प्रोफ़ाइल',
                'user' => $user,
                'user_name' => $this->session->get('user_name'),
                'error' => 'प्रोफ़ाइल अपडेट करने में त्रुटि हुई'
            ]);
        }
    }
}