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

        $data = [
            'title' => 'उपयोगकर्ता प्रबंधन',
            'users' => $this->userModel->where('role', 'member')->findAll(),
            'user_name' => $this->session->get('user_name')
        ];

        return view('admin/users', $data);
    }

    public function applications()
    {
        $auth = $this->checkAdminAuth();
        if ($auth !== true) return $auth;

        $filter = $this->request->getGet('filter') ?? 'all';
        
        switch ($filter) {
            case 'pending':
                $applications = $this->applicationModel->getPendingApplications();
                break;
            case 'approved':
                $applications = $this->applicationModel->getApprovedApplications();
                break;
            case 'rejected':
                $applications = $this->applicationModel->getRejectedApplications();
                break;
            case 'vivah':
                $applications = $this->applicationModel->getApplicationsByType('vivah_help');
                break;
            case 'death':
                $applications = $this->applicationModel->getApplicationsByType('death_help');
                break;
            case 'education':
                $applications = $this->applicationModel->getApplicationsByType('education_help');
                break;
            default:
                $applications = $this->applicationModel->getApplicationsWithUserData();
        }

        $data = [
            'title' => 'आवेदन प्रबंधन',
            'applications' => $applications,
            'filter' => $filter,
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
        
        // Calculate total amount (assuming we have amount_approved field)
        $totalAmountResult = $this->applicationModel->selectSum('amount_requested')
                                                   ->where('status', 'approved')
                                                   ->get()
                                                   ->getRow();
        $totalAmount = $totalAmountResult ? $totalAmountResult->amount_requested : 0;

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
}