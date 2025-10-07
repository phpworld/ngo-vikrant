<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SampleUsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'rajesh_kumar',
                'email' => 'rajesh.kumar@gmail.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'full_name' => 'राजेश कुमार',
                'phone' => '9876543210',
                'address' => 'गली नंबर 5, सेक्टर 15, नोएडा, उत्तर प्रदेश',
                'aadhar_number' => '123456789012',
                'role' => 'member',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'priya_sharma',
                'email' => 'priya.sharma@gmail.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'full_name' => 'प्रिया शर्मा',
                'phone' => '9876543211',
                'address' => 'हाउस नंबर 45, कमला नगर, दिल्ली',
                'aadhar_number' => '123456789013',
                'role' => 'member',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'amit_verma',
                'email' => 'amit.verma@gmail.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'full_name' => 'अमित वर्मा',
                'phone' => '9876543212',
                'address' => 'फ्लैट नंबर 101, रॉयल पैलेस, गुड़गांव, हरियाणा',
                'aadhar_number' => '123456789014',
                'role' => 'member',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'sunita_devi',
                'email' => 'sunita.devi@gmail.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'full_name' => 'सुनीता देवी',
                'phone' => '9876543213',
                'address' => 'मोहल्ला नया गांव, लखनऊ, उत्तर प्रदेश',
                'aadhar_number' => '123456789015',
                'role' => 'member',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'deepak_singh',
                'email' => 'deepak.singh@gmail.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'full_name' => 'दीपक सिंह',
                'phone' => '9876543214',
                'address' => 'वार्ड नंबर 12, जयपुर, राजस्थान',
                'aadhar_number' => '123456789016',
                'role' => 'member',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'kavita_gupta',
                'email' => 'kavita.gupta@gmail.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'full_name' => 'कविता गुप्ता',
                'phone' => '9876543215',
                'address' => 'ब्लॉक सी, सेक्टर 22, चंडीगढ़',
                'aadhar_number' => '123456789017',
                'role' => 'member',
                'status' => 'inactive',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'manish_jain',
                'email' => 'manish.jain@gmail.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'full_name' => 'मनीष जैन',
                'phone' => '9876543216',
                'address' => 'पुराना शहर, इंदौर, मध्य प्रदेश',
                'aadhar_number' => '123456789018',
                'role' => 'member',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'neha_agarwal',
                'email' => 'neha.agarwal@gmail.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'full_name' => 'नेहा अग्रवाल',
                'phone' => '9876543217',
                'address' => 'नेहरू नगर, भोपाल, मध्य प्रदेश',
                'aadhar_number' => '123456789019',
                'role' => 'member',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'rahul_yadav',
                'email' => 'rahul.yadav@gmail.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'full_name' => 'राहुल यादव',
                'phone' => '9876543218',
                'address' => 'कृष्णा नगर, पटना, बिहार',
                'aadhar_number' => '123456789020',
                'role' => 'member',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'pooja_mishra',
                'email' => 'pooja.mishra@gmail.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'full_name' => 'पूजा मिश्रा',
                'phone' => '9876543219',
                'address' => 'आशियाना कॉलोनी, कानपुर, उत्तर प्रदेश',
                'aadhar_number' => '123456789021',
                'role' => 'member',
                'status' => 'inactive',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'vinod_tiwari',
                'email' => 'vinod.tiwari@gmail.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'full_name' => 'विनोद तिवारी',
                'phone' => '9876543220',
                'address' => 'सिविल लाइन्स, इलाहाबाद, उत्तर प्रदेश',
                'aadhar_number' => '123456789022',
                'role' => 'member',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'meera_pandey',
                'email' => 'meera.pandey@gmail.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'full_name' => 'मीरा पांडे',
                'phone' => '9876543221',
                'address' => 'गोमती नगर, लखनऊ, उत्तर प्रदेश',
                'aadhar_number' => '123456789023',
                'role' => 'member',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'suresh_maurya',
                'email' => 'suresh.maurya@gmail.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'full_name' => 'सुरेश मौर्य',
                'phone' => '9876543222',
                'address' => 'राजा बाजार, वाराणसी, उत्तर प्रदेश',
                'aadhar_number' => '123456789024',
                'role' => 'member',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        // Using Query Builder to insert data
        $this->db->table('users')->insertBatch($data);
        
        echo "13 sample users have been added successfully!\n";
        echo "All users have password: password123\n";
        echo "2 users (kavita_gupta, pooja_mishra) are set as inactive for testing purposes.\n";
    }
}