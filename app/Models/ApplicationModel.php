<?php

namespace App\Models;

use CodeIgniter\Model;

class ApplicationModel extends Model
{
    protected $table = 'applications';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'user_id',
        'application_type',
        'applicant_name',
        'father_name',
        'mother_name',
        'phone',
        'address',
        'aadhar_number',
        'income_certificate',
        'bank_account',
        'ifsc_code',
        'application_amount',
        'application_reason',
        'documents',
        'status',
        'admin_remarks',
        'approved_amount',
        'approved_by',
        'approved_date',
        'created_at',
        'updated_at'
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'user_id' => 'required|numeric',
        'application_type' => 'required|in_list[vivah_help,death_help,education_help]',
        'applicant_name' => 'required|min_length[3]|max_length[100]',
        'father_name' => 'required|min_length[3]|max_length[100]',
        'phone' => 'required|numeric|min_length[10]|max_length[10]',
        'address' => 'required|min_length[10]',
        'aadhar_number' => 'required|numeric|min_length[12]|max_length[12]',
        'bank_account' => 'required|numeric|min_length[10]',
        'ifsc_code' => 'required|min_length[11]|max_length[11]',
        'application_amount' => 'required|numeric',
        'application_reason' => 'required|min_length[20]'
    ];

    protected $validationMessages = [
        'applicant_name' => [
            'required' => 'आवेदक का नाम आवश्यक है'
        ],
        'father_name' => [
            'required' => 'पिता का नाम आवश्यक है'
        ],
        'mother_name' => [
            'required' => 'माता का नाम आवश्यक है'
        ],
        'phone' => [
            'required' => 'फोन नंबर आवश्यक है',
            'numeric' => 'फोन नंबर केवल संख्या में होना चाहिए'
        ],
        'address' => [
            'required' => 'पता आवश्यक है'
        ],
        'aadhar_number' => [
            'required' => 'आधार नंबर आवश्यक है',
            'numeric' => 'आधार नंबर केवल संख्या में होना चाहिए'
        ],
        'bank_account' => [
            'required' => 'बैंक खाता संख्या आवश्यक है'
        ],
        'ifsc_code' => [
            'required' => 'IFSC कोड आवश्यक है'
        ],
        'application_amount' => [
            'required' => 'आवेदन राशि आवश्यक है'
        ],
        'application_reason' => [
            'required' => 'आवेदन का कारण आवश्यक है'
        ]
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getApplicationsByUser($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }

    public function getApplicationsByType($type)
    {
        return $this->where('application_type', $type)->findAll();
    }

    public function getApplicationsByStatus($status)
    {
        return $this->where('status', $status)->findAll();
    }

    public function getPendingApplications()
    {
        return $this->where('status', 'pending')->findAll();
    }

    public function getApprovedApplications()
    {
        return $this->where('status', 'approved')->findAll();
    }

    public function getRejectedApplications()
    {
        return $this->where('status', 'rejected')->findAll();
    }

    public function getApplicationsWithUserData()
    {
        return $this->select('applications.*, users.full_name as user_name, users.email')
                   ->join('users', 'users.id = applications.user_id')
                   ->findAll();
    }

    public function updateApplicationStatus($id, $status, $adminRemarks = '', $approvedAmount = 0, $approvedBy = null)
    {
        $data = [
            'status' => $status,
            'admin_remarks' => $adminRemarks
        ];

        if ($status === 'approved') {
            $data['approved_amount'] = $approvedAmount;
            $data['approved_by'] = $approvedBy;
            $data['approved_date'] = date('Y-m-d H:i:s');
        }

        return $this->update($id, $data);
    }
}