<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'username',
        'email',
        'password',
        'full_name',
        'phone',
        'address',
        'aadhar_number',
        'role',
        'status',
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
        'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]',
        'full_name' => 'required|min_length[3]|max_length[100]',
        'phone' => 'required|min_length[10]|max_length[15]',
        'aadhar_number' => 'required|numeric|min_length[12]|max_length[12]'
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'उपयोगकर्ता नाम आवश्यक है',
            'min_length' => 'उपयोगकर्ता नाम कम से कम 3 अक्षर का होना चाहिए',
            'is_unique' => 'यह उपयोगकर्ता नाम पहले से मौजूद है'
        ],
        'email' => [
            'required' => 'ईमेल पता आवश्यक है',
            'valid_email' => 'कृपया सही ईमेल पता दर्ज करें',
            'is_unique' => 'यह ईमेल पहले से पंजीकृत है'
        ],
        'password' => [
            'required' => 'पासवर्ड आवश्यक है',
            'min_length' => 'पासवर्ड कम से कम 6 अक्षर का होना चाहिए'
        ],
        'full_name' => [
            'required' => 'पूरा नाम आवश्यक है'
        ],
        'phone' => [
            'required' => 'फोन नंबर आवश्यक है',
            'min_length' => 'फोन नंबर कम से कम 10 अंक का होना चाहिए',
            'max_length' => 'फोन नंबर 15 अंक से अधिक नहीं हो सकता'
        ],
        'aadhar_number' => [
            'required' => 'आधार नंबर आवश्यक है',
            'numeric' => 'आधार नंबर केवल संख्या में होना चाहिए',
            'min_length' => 'आधार नंबर 12 अंक का होना चाहिए'
        ]
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function getUserByEmailOrUsername($emailOrUsername)
    {
        return $this->orWhere('email', $emailOrUsername)
                    ->orWhere('username', $emailOrUsername)
                    ->first();
    }

    public function verifyPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }
}