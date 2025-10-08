<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ApplicationModel;

class Admin extends BaseController
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

    private function checkAdminAuth()
    {
        if (!$this->session->get('isLoggedIn') || $this->session->get('user_role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'कृपया एडमिन के रूप में लॉगिन करें');
        }
        return true;
    }

    public function dashboard()
    {
        $auth = $this->checkAdminAuth();
        if ($auth !== true) return $auth;

        $data = [
            'title' => 'एडमिन डैशबोर्ड',
            'totalUsers' => $this->userModel->where('role', 'member')->countAllResults(),
            'totalApplications' => $this->applicationModel->countAllResults(),
            'pendingApplications' => $this->applicationModel->where('status', 'pending')->countAllResults(),
            'approvedApplications' => $this->applicationModel->where('status', 'approved')->countAllResults(),
            'rejectedApplications' => $this->applicationModel->where('status', 'rejected')->countAllResults(),
            'vivahApplications' => $this->applicationModel->where('application_type', 'vivah_help')->countAllResults(),
            'deathApplications' => $this->applicationModel->where('application_type', 'death_help')->countAllResults(),
            'educationApplications' => $this->applicationModel->where('application_type', 'education_help')->countAllResults(),
            'recentApplications' => $this->applicationModel->getApplicationsWithUserData(),
            'user_name' => $this->session->get('user_name')
        ];

        return view('admin/dashboard', $data);
    }

    public function users()
    {
        $auth = $this->checkAdminAuth();
        if ($auth !== true) return $auth;

        // Get pagination parameters
        $perPage = 10; // Number of users per page
        $page = (int) ($this->request->getGet('page') ?? 1);
        
        // Get filter parameters
        $status = $this->request->getGet('status');
        $search = $this->request->getGet('search');

        // Build query with filters
        $builder = $this->userModel->where('role', 'member');
        
        if ($status && in_array($status, ['active', 'inactive'])) {
            $builder->where('status', $status);
        }
        
        if ($search) {
            $builder->groupStart()
                   ->like('full_name', $search)
                   ->orLike('username', $search)
                   ->orLike('email', $search)
                   ->orLike('phone', $search)
                   ->groupEnd();
        }

        // Get paginated users
        $users = $builder->paginate($perPage, 'default', $page);
        $pager = $this->userModel->pager;

        // Get total counts for statistics
        $totalUsers = $this->userModel->where('role', 'member')->countAllResults(false);
        $activeUsers = $this->userModel->where('role', 'member')->where('status', 'active')->countAllResults(false);
        $inactiveUsers = $this->userModel->where('role', 'member')->where('status', 'inactive')->countAllResults(false);
        $todayUsers = $this->userModel->where('role', 'member')
                                      ->where('DATE(created_at)', date('Y-m-d'))
                                      ->countAllResults(false);

        $data = [
            'title' => 'उपयोगकर्ता प्रबंधन',
            'users' => $users,
            'pager' => $pager,
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'inactiveUsers' => $inactiveUsers,
            'todayUsers' => $todayUsers,
            'currentPage' => $page,
            'perPage' => $perPage,
            'filters' => [
                'status' => $status,
                'search' => $search
            ],
            'user_name' => $this->session->get('user_name')
        ];

        return view('admin/users', $data);
    }

    public function applications()
    {
        $auth = $this->checkAdminAuth();
        if ($auth !== true) return $auth;

        // Get pagination parameters
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = 10; // Applications per page
        $filter = $this->request->getGet('filter') ?? 'all';
        $search = $this->request->getGet('search') ?? '';

        // Build query based on filter
        $builder = $this->applicationModel->select('applications.*, users.full_name as user_name, users.email, users.phone as user_phone, users.aadhar_number as user_aadhar')
                                         ->join('users', 'users.id = applications.user_id');

        // Apply status filter
        switch ($filter) {
            case 'pending':
                $builder->where('applications.status', 'pending');
                break;
            case 'approved':
                $builder->where('applications.status', 'approved');
                break;
            case 'rejected':
                $builder->where('applications.status', 'rejected');
                break;
            case 'processing':
                $builder->where('applications.status', 'processing');
                break;
            case 'vivah':
                $builder->where('application_type', 'vivah_help');
                break;
            case 'death':
                $builder->where('application_type', 'death_help');
                break;
            case 'education':
                $builder->where('application_type', 'education_help');
                break;
            // 'all' - no additional filter
        }

        // Apply search filter
        if ($search) {
            $builder->groupStart()
                   ->like('applicant_name', $search)
                   ->orLike('users.full_name', $search)
                   ->orLike('users.email', $search)
                   ->orLike('applications.phone', $search)
                   ->orLike('application_reason', $search)
                   ->groupEnd();
        }

        // Order by latest first
        $builder->orderBy('applications.created_at', 'DESC');

        // Get paginated applications
        $applications = $builder->paginate($perPage, 'default', $page);
        $pager = $this->applicationModel->pager;

        // Get statistics for cards
        $totalApplications = $this->applicationModel->countAllResults(false);
        $pendingApplications = $this->applicationModel->where('status', 'pending')->countAllResults(false);
        $approvedApplications = $this->applicationModel->where('status', 'approved')->countAllResults(false);
        $rejectedApplications = $this->applicationModel->where('status', 'rejected')->countAllResults(false);
        $processingApplications = $this->applicationModel->where('status', 'processing')->countAllResults(false);
        $todayApplications = $this->applicationModel->where('DATE(created_at)', date('Y-m-d'))->countAllResults(false);

        $data = [
            'title' => 'आवेदन प्रबंधन',
            'applications' => $applications,
            'pager' => $pager,
            'totalApplications' => $totalApplications,
            'pendingApplications' => $pendingApplications,
            'approvedApplications' => $approvedApplications,
            'rejectedApplications' => $rejectedApplications,
            'processingApplications' => $processingApplications,
            'todayApplications' => $todayApplications,
            'currentPage' => $page,
            'perPage' => $perPage,
            'filters' => [
                'filter' => $filter,
                'search' => $search
            ],
            'user_name' => $this->session->get('user_name')
        ];

        return view('admin/applications', $data);
    }

    public function updateApplicationStatus()
    {
        $auth = $this->checkAdminAuth();
        if ($auth !== true) return $auth;

        $id = $this->request->getPost('application_id');
        $status = $this->request->getPost('status');
        $remarks = $this->request->getPost('admin_remarks');
        $approvedAmount = $this->request->getPost('approved_amount') ?? 0;
        $approvedBy = $this->session->get('user_id');

        if ($this->applicationModel->updateApplicationStatus($id, $status, $remarks, $approvedAmount, $approvedBy)) {
            return redirect()->to('/admin/applications')->with('success', 'आवेदन की स्थिति सफलतापूर्वक अपडेट की गई');
        } else {
            return redirect()->to('/admin/applications')->with('error', 'आवेदन अपडेट करने में त्रुटि');
        }
    }

    public function reports()
    {
        $auth = $this->checkAdminAuth();
        if ($auth !== true) return $auth;

        // Get basic statistics
        $totalUsers = $this->userModel->where('role', 'member')->countAllResults();
        $totalApplications = $this->applicationModel->countAllResults();
        $approvedApplications = $this->applicationModel->where('status', 'approved')->countAllResults();
        
        // Calculate total amount disbursed
        $totalAmountResult = $this->applicationModel->selectSum('approved_amount')
                                                   ->where('status', 'approved')
                                                   ->get()
                                                   ->getRow();
        $totalAmount = $totalAmountResult ? $totalAmountResult->approved_amount : 0;

        $data = [
            'title' => 'रिपोर्ट्स',
            'stats' => [
                'total_users' => $totalUsers,
                'total_applications' => $totalApplications,
                'approved_applications' => $approvedApplications,
                'total_amount' => $totalAmount
            ],
            'monthlyStats' => $this->getMonthlyStats(),
            'typeWiseStats' => $this->getTypeWiseStats(),
            'statusWiseStats' => $this->getStatusWiseStats(),
            'user_name' => $this->session->get('user_name')
        ];

        return view('admin/reports', $data);
    }

    public function settings()
    {
        $auth = $this->checkAdminAuth();
        if ($auth !== true) return $auth;

        $data = [
            'title' => 'सेटिंग्स',
            'user_name' => $this->session->get('user_name')
        ];

        return view('admin/settings', $data);
    }

    private function getMonthlyStats()
    {
        return $this->applicationModel->select("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as count")
                                     ->groupBy('month')
                                     ->orderBy('month', 'DESC')
                                     ->limit(12)
                                     ->findAll();
    }

    private function getTypeWiseStats()
    {
        return $this->applicationModel->select('application_type, COUNT(*) as count')
                                     ->groupBy('application_type')
                                     ->findAll();
    }

    private function getStatusWiseStats()
    {
        return $this->applicationModel->select('status, COUNT(*) as count')
                                     ->groupBy('status')
                                     ->findAll();
    }

    public function deleteUser($id)
    {
        $auth = $this->checkAdminAuth();
        if ($auth !== true) return $auth;

        if ($this->userModel->delete($id)) {
            return redirect()->to('/admin/users')->with('success', 'उपयोगकर्ता सफलतापूर्वक हटाया गया');
        } else {
            return redirect()->to('/admin/users')->with('error', 'उपयोगकर्ता हटाने में त्रुटि');
        }
    }

    public function applicationDetails($id)
    {
        $auth = $this->checkAdminAuth();
        if ($auth !== true) return $auth;

        // Get application with user data
        $application = $this->applicationModel->select('applications.*, users.full_name as user_name, users.email, users.username, users.phone as user_phone, users.address as user_address, users.aadhar_number as user_aadhar')
                                             ->join('users', 'users.id = applications.user_id')
                                             ->where('applications.id', $id)
                                             ->first();

        if (!$application) {
            return redirect()->to('/admin/applications')->with('error', 'आवेदन नहीं मिला');
        }

        $data = [
            'title' => 'आवेदन विवरण',
            'application' => $application,
            'user_name' => $this->session->get('user_name')
        ];

        return view('admin/application_details', $data);
    }

    public function processApplicationAction()
    {
        $auth = $this->checkAdminAuth();
        if ($auth !== true) return $auth;

        $rules = [
            'application_id' => 'required|numeric',
            'action' => 'required|in_list[approved,rejected,processing,pending]',
            'admin_remarks' => 'required|min_length[20]'
        ];

        $messages = [
            'application_id' => [
                'required' => 'आवेदन ID आवश्यक है',
                'numeric' => 'गलत आवेदन ID'
            ],
            'action' => [
                'required' => 'कार्रवाई का चयन आवश्यक है',
                'in_list' => 'गलत कार्रवाई चुनी गई'
            ],
            'admin_remarks' => [
                'required' => 'टिप्पणी आवश्यक है',
                'min_length' => 'टिप्पणी कम से कम 10 अक्षर की होनी चाहिए'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $applicationId = $this->request->getPost('application_id');
        $action = $this->request->getPost('action');
        $adminRemarks = $this->request->getPost('admin_remarks');
        $approvedAmount = $this->request->getPost('approved_amount') ?: 0;

        // Get application details
        $application = $this->applicationModel->find($applicationId);
        if (!$application) {
            return redirect()->to('/admin/applications')->with('error', 'आवेदन नहीं मिला');
        }

        // Update application status
        $updateData = [
            'status' => $action,
            'admin_remarks' => $adminRemarks,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($action === 'approved') {
            $updateData['approved_amount'] = $approvedAmount ?: $application['application_amount'];
            $updateData['approved_by'] = $this->session->get('user_id');
            $updateData['approved_date'] = date('Y-m-d H:i:s');
        }

        if ($this->applicationModel->update($applicationId, $updateData)) {
            $statusText = match($action) {
                'approved' => 'स्वीकृत',
                'rejected' => 'अस्वीकृत',
                'processing' => 'प्रक्रियाधीन',
                'pending' => 'लंबित',
                default => 'अपडेट'
            };
            
            return redirect()->to('/admin/application-details/' . $applicationId)
                           ->with('success', 'आवेदन की स्थिति ' . $statusText . ' में अपडेट की गई');
        } else {
            return redirect()->back()->with('error', 'आवेदन अपडेट करने में त्रुटि हुई');
        }
    }

    public function toggleUserStatus($id)
    {
        $auth = $this->checkAdminAuth();
        if ($auth !== true) return $auth;

        $user = $this->userModel->find($id);
        if ($user) {
            $newStatus = $user['status'] === 'active' ? 'inactive' : 'active';
            $this->userModel->update($id, ['status' => $newStatus]);
            return redirect()->to('/admin/users')->with('success', 'उपयोगकर्ता की स्थिति अपडेट की गई');
        }
        
        return redirect()->to('/admin/users')->with('error', 'उपयोगकर्ता नहीं मिला');
    }

    public function viewDocument($filename)
    {
        $auth = $this->checkAdminAuth();
        if ($auth !== true) return $auth;

        $filepath = WRITEPATH . 'uploads/applications/' . $filename;
        
        if (!file_exists($filepath)) {
            return redirect()->back()->with('error', 'दस्तावेज नहीं मिला');
        }

        // Check file type and set appropriate headers
        $mime = mime_content_type($filepath);
        
        return $this->response
                    ->setHeader('Content-Type', $mime)
                    ->setHeader('Content-Disposition', 'inline; filename="' . $filename . '"')
                    ->setBody(file_get_contents($filepath));
    }

    public function downloadDocument($filename)
    {
        $auth = $this->checkAdminAuth();
        if ($auth !== true) return $auth;

        $filepath = WRITEPATH . 'uploads/applications/' . $filename;
        
        if (!file_exists($filepath)) {
            return redirect()->back()->with('error', 'दस्तावेज नहीं मिला');
        }

        return $this->response->download($filepath, null);
    }
}