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
            'application_reason' => 'required|min_length[20]',
            'aadhar_document' => 'max_size[aadhar_document,2048]|ext_in[aadhar_document,jpg,jpeg,png,pdf]',
            'income_document' => 'max_size[income_document,2048]|ext_in[income_document,jpg,jpeg,png,pdf]',
            'bank_document' => 'max_size[bank_document,2048]|ext_in[bank_document,jpg,jpeg,png,pdf]',
            'other_documents' => 'max_size[other_documents,2048]|ext_in[other_documents,jpg,jpeg,png,pdf]'
        ];

        if (!$this->validate($rules)) {
            return view('member/apply_vivah', [
                'title' => 'विवाह सहायता आवेदन',
                'user_name' => $this->session->get('user_name'),
                'validation' => $this->validator
            ]);
        }

        // Handle document uploads
        $documents = [];
        $uploadPath = WRITEPATH . 'uploads/applications/';
        
        // Create directory if it doesn't exist
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Process each uploaded file
        $fileFields = ['aadhar_document', 'income_document', 'bank_document', 'other_documents'];
        
        foreach ($fileFields as $field) {
            $file = $this->request->getFile($field);
            
            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Generate unique filename
                $fileName = time() . '_' . $field . '_' . $file->getRandomName();
                
                // Move file to upload directory
                if ($file->move($uploadPath, $fileName)) {
                    $documents[$field] = $fileName;
                }
            }
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
            'documents' => !empty($documents) ? json_encode($documents) : null,
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
            'application_reason' => 'required|min_length[20]',
            'death_certificate' => 'uploaded[death_certificate]|max_size[death_certificate,2048]|ext_in[death_certificate,jpg,jpeg,png,pdf]',
            'aadhar_document' => 'max_size[aadhar_document,2048]|ext_in[aadhar_document,jpg,jpeg,png,pdf]',
            'income_document' => 'max_size[income_document,2048]|ext_in[income_document,jpg,jpeg,png,pdf]',
            'bank_document' => 'max_size[bank_document,2048]|ext_in[bank_document,jpg,jpeg,png,pdf]'
        ];

        if (!$this->validate($rules)) {
            return view('member/apply_death', [
                'title' => 'मृत्यु सहायता आवेदन',
                'user_name' => $this->session->get('user_name'),
                'validation' => $this->validator
            ]);
        }

        // Handle document uploads
        $documents = [];
        $uploadPath = WRITEPATH . 'uploads/applications/';
        
        // Create directory if it doesn't exist
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Process each uploaded file
        $fileFields = ['death_certificate', 'aadhar_document', 'income_document', 'bank_document'];
        
        foreach ($fileFields as $field) {
            $file = $this->request->getFile($field);
            
            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Generate unique filename
                $fileName = time() . '_' . $field . '_' . $file->getRandomName();
                
                // Move file to upload directory
                if ($file->move($uploadPath, $fileName)) {
                    $documents[$field] = $fileName;
                }
            }
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
            'documents' => !empty($documents) ? json_encode($documents) : null,
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

    public function deleteApplication()
    {
        $auth = $this->checkMemberAuth();
        if ($auth !== true) return $auth;

        $applicationId = $this->request->getPost('application_id');
        $userId = $this->session->get('user_id');

        if (!$applicationId) {
            return redirect()->to('/member/applications')->with('error', 'अमान्य आवेदन ID');
        }

        // Get the application to verify ownership and status
        $application = $this->applicationModel->where('id', $applicationId)
                                               ->where('user_id', $userId)
                                               ->first();

        if (!$application) {
            return redirect()->to('/member/applications')->with('error', 'आवेदन नहीं मिला या आप इसे रद्द करने के अधिकारी नहीं हैं');
        }

        // Check if application can be deleted (only pending applications)
        if ($application['status'] !== 'pending') {
            $statusText = match($application['status']) {
                'approved' => 'स्वीकृत',
                'rejected' => 'अस्वीकृत',
                'processing' => 'प्रक्रियाधीन',
                default => $application['status']
            };
            return redirect()->to('/member/applications')
                           ->with('error', "आप {$statusText} आवेदन को रद्द नहीं कर सकते। केवल लंबित आवेदन ही रद्द किए जा सकते हैं।");
        }

        // Delete associated documents if any
        if (!empty($application['documents'])) {
            $documents = json_decode($application['documents'], true);
            if (is_array($documents)) {
                $uploadPath = WRITEPATH . 'uploads/applications/';
                foreach ($documents as $filename) {
                    $filepath = $uploadPath . $filename;
                    if (file_exists($filepath)) {
                        unlink($filepath);
                    }
                }
            }
        }

        // Delete the application
        if ($this->applicationModel->delete($applicationId)) {
            return redirect()->to('/member/applications')->with('success', 'आवेदन सफलतापूर्वक रद्द किया गया');
        } else {
            return redirect()->to('/member/applications')->with('error', 'आवेदन रद्द करने में त्रुटि हुई');
        }
    }
}