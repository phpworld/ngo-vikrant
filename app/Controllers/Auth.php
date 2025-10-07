<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        if ($this->session->get('isLoggedIn')) {
            $role = $this->session->get('user_role');
            return redirect()->to($role === 'admin' ? '/admin/dashboard' : '/member/dashboard');
        }

        $data = [
            'title' => 'लॉगिन',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/login', $data);
    }

    public function processLogin()
    {
        $rules = [
            'login' => 'required',
            'password' => 'required'
        ];

        $messages = [
            'login' => [
                'required' => 'ईमेल या उपयोगकर्ता नाम आवश्यक है'
            ],
            'password' => [
                'required' => 'पासवर्ड आवश्यक है'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return view('auth/login', [
                'title' => 'लॉगिन',
                'validation' => $this->validator
            ]);
        }

        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');

        $user = $this->userModel->getUserByEmailOrUsername($login);

        if ($user && $this->userModel->verifyPassword($password, $user['password'])) {
            if ($user['status'] === 'inactive') {
                return view('auth/login', [
                    'title' => 'लॉगिन',
                    'validation' => $this->validator,
                    'error' => 'आपका खाता निष्क्रिय है। कृपया एडमिन से संपर्क करें।'
                ]);
            }

            $sessionData = [
                'user_id' => $user['id'],
                'user_name' => $user['full_name'],
                'email' => $user['email'],
                'user_role' => $user['role'],
                'isLoggedIn' => true
            ];

            $this->session->set($sessionData);

            if ($user['role'] === 'admin') {
                return redirect()->to('/admin/dashboard')->with('success', 'स्वागत ' . $user['full_name']);
            } else {
                return redirect()->to('/member/dashboard')->with('success', 'स्वागत ' . $user['full_name']);
            }
        } else {
            return view('auth/login', [
                'title' => 'लॉगिन',
                'validation' => $this->validator,
                'error' => 'गलत ईमेल/उपयोगकर्ता नाम या पासवर्ड'
            ]);
        }
    }

    public function register()
    {
        if ($this->session->get('isLoggedIn')) {
            return redirect()->to('/member/dashboard');
        }

        $data = [
            'title' => 'पंजीकरण',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/register', $data);
    }

    public function processRegister()
    {
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
            'full_name' => 'required|min_length[3]|max_length[100]',
            'phone' => 'required|min_length[10]|max_length[15]',
            'address' => 'required|min_length[10]',
            'aadhar_number' => 'required|numeric|min_length[12]|max_length[12]'
        ];

        $messages = [
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
            'confirm_password' => [
                'required' => 'पासवर्ड पुष्टि आवश्यक है',
                'matches' => 'पासवर्ड मेल नहीं खाता'
            ],
            'full_name' => [
                'required' => 'पूरा नाम आवश्यक है'
            ],
            'phone' => [
                'required' => 'फोन नंबर आवश्यक है',
                'min_length' => 'फोन नंबर कम से कम 10 अंक का होना चाहिए',
                'max_length' => 'फोन नंबर 15 अंक से अधिक नहीं हो सकता'
            ],
            'address' => [
                'required' => 'पता आवश्यक है'
            ],
            'aadhar_number' => [
                'required' => 'आधार नंबर आवश्यक है',
                'numeric' => 'आधार नंबर केवल संख्या में होना चाहिए',
                'min_length' => 'आधार नंबर 12 अंक का होना चाहिए'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return view('auth/register', [
                'title' => 'पंजीकरण',
                'validation' => $this->validator
            ]);
        }

        $userData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'full_name' => $this->request->getPost('full_name'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'aadhar_number' => $this->request->getPost('aadhar_number'),
            'role' => 'member',
            'status' => 'active'
        ];

        if ($this->userModel->insert($userData)) {
            return redirect()->to('/login')->with('success', 'पंजीकरण सफल। कृपया लॉगिन करें।');
        } else {
            return view('auth/register', [
                'title' => 'पंजीकरण',
                'validation' => $this->validator,
                'error' => 'पंजीकरण में त्रुटि। कृपया पुनः प्रयास करें।'
            ]);
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login')->with('success', 'सफलतापूर्वक लॉगआउट हो गए');
    }

    public function forgotPassword()
    {
        $data = [
            'title' => 'पासवर्ड भूल गए',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/forgot_password', $data);
    }

    public function processForgotPassword()
    {
        $rules = [
            'email' => 'required|valid_email'
        ];

        $messages = [
            'email' => [
                'required' => 'ईमेल पता आवश्यक है',
                'valid_email' => 'कृपया सही ईमेल पता दर्ज करें'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return view('auth/forgot_password', [
                'title' => 'पासवर्ड भूल गए',
                'validation' => $this->validator
            ]);
        }

        $email = $this->request->getPost('email');
        $user = $this->userModel->getUserByEmail($email);

        if ($user) {
            // Here you would typically send an email with reset link
            // For now, we'll just show a success message
            return view('auth/forgot_password', [
                'title' => 'पासवर्ड भूल गए',
                'validation' => $this->validator,
                'success' => 'यदि यह ईमेल पंजीकृत है तो आपको पासवर्ड रीसेट लिंक भेजा गया है।'
            ]);
        } else {
            return view('auth/forgot_password', [
                'title' => 'पासवर्ड भूल गए',
                'validation' => $this->validator,
                'success' => 'यदि यह ईमेल पंजीकृत है तो आपको पासवर्ड रीसेट लिंक भेजा गया है।'
            ]);
        }
    }
}