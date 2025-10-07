<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SampleApplicationsSeeder extends Seeder
{
    public function run()
    {
        // First get some member user IDs from the users table
        $userModel = new \App\Models\UserModel();
        $users = $userModel->where('role', 'member')->findAll(10);
        
        if (empty($users)) {
            echo "No member users found! Please run SampleUsersSeeder first.\n";
            return;
        }

        $applications = [
            // Application 1 - Vivah Help (Approved)
            [
                'user_id' => $users[0]['id'],
                'application_type' => 'vivah_help',
                'applicant_name' => 'राजेश कुमार',
                'father_name' => 'रामप्रसाद कुमार',
                'mother_name' => 'सीता देवी',
                'phone' => '9876543210',
                'address' => 'गली नंबर 5, सेक्टर 15, नोएडा, उत्तर प्रदेश',
                'aadhar_number' => '123456789012',
                'income_certificate' => 'IC/2024/001',
                'bank_account' => '1234567890123456',
                'ifsc_code' => 'SBIN0001234',
                'application_amount' => 45000.00,
                'application_reason' => 'मेरी बेटी का विवाह आने वाले महीने में है। परिवार की आर्थिक स्थिति अच्छी नहीं है इसलिए विवाह के लिए सहायता की आवश्यकता है।',
                'documents' => json_encode(['aadhar_card' => 'doc1.pdf', 'income_cert' => 'doc2.pdf']),
                'status' => 'approved',
                'admin_remarks' => 'सभी दस्तावेज सत्यापित हैं। आवेदन स्वीकृत।',
                'approved_amount' => 40000.00,
                'approved_by' => 1,
                'approved_date' => date('Y-m-d H:i:s', strtotime('-5 days')),
                'created_at' => date('Y-m-d H:i:s', strtotime('-10 days')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('-5 days'))
            ],
            
            // Application 2 - Death Help (Pending)
            [
                'user_id' => $users[1]['id'],
                'application_type' => 'death_help',
                'applicant_name' => 'प्रिया शर्मा',
                'father_name' => 'विकास शर्मा',
                'mother_name' => 'सुनीता शर्मा',
                'phone' => '9876543211',
                'address' => 'हाउस नंबर 45, कमला नगर, दिल्ली',
                'aadhar_number' => '123456789013',
                'income_certificate' => 'IC/2024/002',
                'bank_account' => '2345678901234567',
                'ifsc_code' => 'HDFC0001235',
                'application_amount' => 20000.00,
                'application_reason' => 'मेरे पिता जी का हाल ही में निधन हो गया है। अंतिम संस्कार के लिए सहायता की आवश्यकता है।',
                'documents' => json_encode(['death_cert' => 'death1.pdf', 'aadhar_card' => 'aadhar1.pdf']),
                'status' => 'pending',
                'admin_remarks' => null,
                'approved_amount' => null,
                'approved_by' => null,
                'approved_date' => null,
                'created_at' => date('Y-m-d H:i:s', strtotime('-3 days')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('-3 days'))
            ],
            
            // Application 3 - Vivah Help (Processing)
            [
                'user_id' => $users[2]['id'],
                'application_type' => 'vivah_help',
                'applicant_name' => 'अमित वर्मा',
                'father_name' => 'सुरेश वर्मा',
                'mother_name' => 'गीता वर्मा',
                'phone' => '9876543212',
                'address' => 'फ्लैट नंबर 101, रॉयल पैलेस, गुड़गांव, हरियाणा',
                'aadhar_number' => '123456789014',
                'income_certificate' => 'IC/2024/003',
                'bank_account' => '3456789012345678',
                'ifsc_code' => 'ICIC0001236',
                'application_amount' => 35000.00,
                'application_reason' => 'मेरे छोटे भाई का विवाह निश्चित हो गया है। पारिवारिक आर्थिक समस्या के कारण सहायता चाहिए।',
                'documents' => json_encode(['aadhar_card' => 'doc3.pdf', 'bank_pass' => 'bank3.pdf']),
                'status' => 'processing',
                'admin_remarks' => 'दस्तावेज सत्यापन के लिए भेजे गए हैं।',
                'approved_amount' => null,
                'approved_by' => null,
                'approved_date' => null,
                'created_at' => date('Y-m-d H:i:s', strtotime('-7 days')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('-2 days'))
            ],
            
            // Application 4 - Death Help (Approved)
            [
                'user_id' => $users[3]['id'],
                'application_type' => 'death_help',
                'applicant_name' => 'सुनीता देवी',
                'father_name' => 'महेश प्रसाद',
                'mother_name' => 'कमला देवी',
                'phone' => '9876543213',
                'address' => 'मोहल्ला नया गांव, लखनऊ, उत्तर प्रदेश',
                'aadhar_number' => '123456789015',
                'income_certificate' => 'IC/2024/004',
                'bank_account' => '4567890123456789',
                'ifsc_code' => 'PUNB0001237',
                'application_amount' => 15000.00,
                'application_reason' => 'मेरी माता जी का दुखद निधन हो गया है। अंतिम क्रिया के लिए आर्थिक सहायता की आवश्यकता है।',
                'documents' => json_encode(['death_cert' => 'death2.pdf', 'income_cert' => 'income2.pdf']),
                'status' => 'approved',
                'admin_remarks' => 'दस्तावेज सत्यापित। राशि स्वीकृत।',
                'approved_amount' => 15000.00,
                'approved_by' => 1,
                'approved_date' => date('Y-m-d H:i:s', strtotime('-3 days')),
                'created_at' => date('Y-m-d H:i:s', strtotime('-8 days')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('-3 days'))
            ],
            
            // Application 5 - Vivah Help (Rejected)
            [
                'user_id' => $users[4]['id'],
                'application_type' => 'vivah_help',
                'applicant_name' => 'दीपक सिंह',
                'father_name' => 'राजू सिंह',
                'mother_name' => 'शांति देवी',
                'phone' => '9876543214',
                'address' => 'वार्ड नंबर 12, जयपुर, राजस्थान',
                'aadhar_number' => '123456789016',
                'income_certificate' => 'IC/2024/005',
                'bank_account' => '5678901234567890',
                'ifsc_code' => 'SBIN0001238',
                'application_amount' => 50000.00,
                'application_reason' => 'विवाह के लिए सहायता चाहिए।',
                'documents' => json_encode(['aadhar_card' => 'doc5.pdf']),
                'status' => 'rejected',
                'admin_remarks' => 'अपूर्ण दस्तावेज। आय प्रमाण पत्र गुम। पुनः आवेदन करें।',
                'approved_amount' => null,
                'approved_by' => 1,
                'approved_date' => null,
                'created_at' => date('Y-m-d H:i:s', strtotime('-12 days')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('-8 days'))
            ],
            
            // Application 6 - Education Help (Pending)
            [
                'user_id' => $users[5]['id'],
                'application_type' => 'education_help',
                'applicant_name' => 'कविता गुप्ता',
                'father_name' => 'अशोक गुप्ता',
                'mother_name' => 'रीता गुप्ता',
                'phone' => '9876543215',
                'address' => 'ब्लॉक सी, सेक्टर 22, चंडीगढ़',
                'aadhar_number' => '123456789017',
                'income_certificate' => 'IC/2024/006',
                'bank_account' => '6789012345678901',
                'ifsc_code' => 'HDFC0001239',
                'application_amount' => 25000.00,
                'application_reason' => 'मेरी बेटी की उच्च शिक्षा के लिए सहायता चाहिए। कॉलेज की फीस भरने में समस्या हो रही है।',
                'documents' => json_encode(['admission_letter' => 'admission1.pdf', 'fee_receipt' => 'fee1.pdf']),
                'status' => 'pending',
                'admin_remarks' => null,
                'approved_amount' => null,
                'approved_by' => null,
                'approved_date' => null,
                'created_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('-2 days'))
            ],
            
            // Application 7 - Vivah Help (Approved)
            [
                'user_id' => $users[6]['id'],
                'application_type' => 'vivah_help',
                'applicant_name' => 'मनीष जैन',
                'father_name' => 'अनिल जैन',
                'mother_name' => 'सुषमा जैन',
                'phone' => '9876543216',
                'address' => 'पुराना शहर, इंदौर, मध्य प्रदेश',
                'aadhar_number' => '123456789018',
                'income_certificate' => 'IC/2024/007',
                'bank_account' => '7890123456789012',
                'ifsc_code' => 'ICIC0001240',
                'application_amount' => 30000.00,
                'application_reason' => 'परिवार में दो शादियां एक साथ हैं। आर्थिक मदद की जरूरत है।',
                'documents' => json_encode(['aadhar_card' => 'doc7.pdf', 'income_cert' => 'income7.pdf']),
                'status' => 'approved',
                'admin_remarks' => 'आवेदन उचित है। राशि स्वीकृत।',
                'approved_amount' => 25000.00,
                'approved_by' => 1,
                'approved_date' => date('Y-m-d H:i:s', strtotime('-1 day')),
                'created_at' => date('Y-m-d H:i:s', strtotime('-6 days')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('-1 day'))
            ],
            
            // Application 8 - Death Help (Processing)
            [
                'user_id' => $users[7]['id'],
                'application_type' => 'death_help',
                'applicant_name' => 'नेहा अग्रवाल',
                'father_name' => 'राजेश अग्रवाल',
                'mother_name' => 'सरोज अग्रवाल',
                'phone' => '9876543217',
                'address' => 'नेहरू नगर, भोपाल, मध्य प्रदेश',
                'aadhar_number' => '123456789019',
                'income_certificate' => 'IC/2024/008',
                'bank_account' => '8901234567890123',
                'ifsc_code' => 'SBIN0001241',
                'application_amount' => 18000.00,
                'application_reason' => 'मेरे दादा जी का हाल ही में निधन हुआ है। परिवार की आर्थिक स्थिति कमजोर है।',
                'documents' => json_encode(['death_cert' => 'death3.pdf', 'bank_pass' => 'bank8.pdf']),
                'status' => 'processing',
                'admin_remarks' => 'दस्तावेज की जांच की जा रही है।',
                'approved_amount' => null,
                'approved_by' => null,
                'approved_date' => null,
                'created_at' => date('Y-m-d H:i:s', strtotime('-4 days')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('-1 day'))
            ],
            
            // Application 9 - Education Help (Approved)
            [
                'user_id' => $users[8]['id'],
                'application_type' => 'education_help',
                'applicant_name' => 'राहुल यादव',
                'father_name' => 'सुरेंद्र यादव',
                'mother_name' => 'अनीता यादव',
                'phone' => '9876543218',
                'address' => 'कृष्णा नगर, पटना, बिहार',
                'aadhar_number' => '123456789020',
                'income_certificate' => 'IC/2024/009',
                'bank_account' => '9012345678901234',
                'ifsc_code' => 'PUNB0001242',
                'application_amount' => 20000.00,
                'application_reason' => 'इंजीनियरिंग कॉलेज की फीस के लिए सहायता चाहिए। पहले वर्ष की फीस भरने में समस्या है।',
                'documents' => json_encode(['college_id' => 'college9.pdf', 'fee_structure' => 'fee9.pdf']),
                'status' => 'approved',
                'admin_remarks' => 'शिक्षा सहायता स्वीकृत। अच्छे अंक हैं।',
                'approved_amount' => 18000.00,
                'approved_by' => 1,
                'approved_date' => date('Y-m-d H:i:s', strtotime('-2 days')),
                'created_at' => date('Y-m-d H:i:s', strtotime('-9 days')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('-2 days'))
            ],
            
            // Application 10 - Vivah Help (Pending)
            [
                'user_id' => $users[9]['id'],
                'application_type' => 'vivah_help',
                'applicant_name' => 'पूजा मिश्रा',
                'father_name' => 'रामनाथ मिश्रा',
                'mother_name' => 'संगीता मिश्रा',
                'phone' => '9876543219',
                'address' => 'आशियाना कॉलोनी, कानपुर, उत्तर प्रदेश',
                'aadhar_number' => '123456789021',
                'income_certificate' => 'IC/2024/010',
                'bank_account' => '0123456789012345',
                'ifsc_code' => 'HDFC0001243',
                'application_amount' => 40000.00,
                'application_reason' => 'मेरी शादी अगले महीने तय है। पिता जी की नौकरी चली गई है इसलिए सहायता की आवश्यकता है।',
                'documents' => json_encode(['aadhar_card' => 'doc10.pdf', 'invitation' => 'invite10.pdf']),
                'status' => 'pending',
                'admin_remarks' => null,
                'approved_amount' => null,
                'approved_by' => null,
                'approved_date' => null,
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 day')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('-1 day'))
            ]
        ];

        // Insert data using Query Builder
        $this->db->table('applications')->insertBatch($applications);
        
        echo "10 sample applications have been added successfully!\n";
        echo "Applications breakdown:\n";
        echo "- Vivah Help: 5 applications (2 approved, 1 processing, 1 rejected, 1 pending)\n";
        echo "- Death Help: 3 applications (1 approved, 1 processing, 1 pending)\n";
        echo "- Education Help: 2 applications (1 approved, 1 pending)\n";
        echo "- Status distribution: 4 approved, 2 processing, 3 pending, 1 rejected\n";
    }
}