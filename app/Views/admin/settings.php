<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-cog me-2"></i>सेटिंग्स
            </h1>
            <p class="text-muted mb-0">सिस्टम सेटिंग्स और कॉन्फ़िगरेशन प्रबंधित करें</p>
        </div>
    </div>
</div>

<div class="row">
    <!-- General Settings -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-building me-2"></i>सामान्य सेटिंग्स
                </h6>
            </div>
            <div class="card-body">
                <form id="generalSettingsForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">संगठन का नाम</label>
                                <input type="text" class="form-control" name="organization_name" value="एनजीओ विक्रांत">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">संपर्क ईमेल</label>
                                <input type="email" class="form-control" name="contact_email" value="admin@ngovikrant.com">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">संपर्क फोन</label>
                                <input type="tel" class="form-control" name="contact_phone" value="1234567890">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">वेबसाइट URL</label>
                                <input type="url" class="form-control" name="website_url" value="https://ngovikrant.com">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">संगठन का पता</label>
                            <textarea class="form-control" name="organization_address" rows="3">एनजीओ विक्रांत कार्यालय, मुख्य मार्ग, शहर - 123456</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">सेटिंग्स अपडेट करें</button>
                    </form>
                </div>
            </div>

            <!-- Application Settings -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">आवेदन सेटिंग्स</h6>
                </div>
                <div class="card-body">
                    <form id="applicationSettingsForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">विवाह सहायता राशि (₹)</label>
                                    <input type="number" class="form-control" name="vivah_help_amount" value="25000">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">मृत्यु सहायता राशि (₹)</label>
                                    <input type="number" class="form-control" name="death_help_amount" value="15000">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">आवेदन की अंतिम तिथि (दिन)</label>
                                    <input type="number" class="form-control" name="application_deadline_days" value="30">
                                    <small class="text-muted">घटना के बाद कितने दिन तक आवेदन स्वीकार करें</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">प्रोसेसिंग समय (दिन)</label>
                                    <input type="number" class="form-control" name="processing_time_days" value="15">
                                    <small class="text-muted">आवेदन की समीक्षा के लिए समय</small>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="autoApprove" name="auto_approve_applications" checked>
                                <label class="form-check-label" for="autoApprove">
                                    योग्य आवेदनों को स्वचालित रूप से स्वीकृत करें
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">आवेदन सेटिंग्स अपडेट करें</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Security & Admin Settings -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">सिक्योरिटी सेटिंग्स</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">पासवर्ड बदलें</label>
                        <button class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                            <i class="fas fa-key me-2"></i>पासवर्ड बदलें
                        </button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">दो-कारक प्रमाणीकरण</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="twoFactorAuth">
                            <label class="form-check-label" for="twoFactorAuth">सक्षम करें</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">लॉगिन अटेम्प्ट सीमा</label>
                        <input type="number" class="form-control" name="login_attempt_limit" value="5">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">सेशन टाइमआउट (मिनट)</label>
                        <input type="number" class="form-control" name="session_timeout" value="30">
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">सिस्टम जानकारी</h6>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <strong>सिस्टम वर्जन:</strong> 1.0.0
                    </div>
                    <div class="mb-2">
                        <strong>PHP वर्जन:</strong> <?= phpversion() ?>
                    </div>
                    <div class="mb-2">
                        <strong>डेटाबेस:</strong> MySQL 8.0
                    </div>
                    <div class="mb-2">
                        <strong>अंतिम अपडेट:</strong> 06/10/2025
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">बैकअप और रिस्टोर</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-success" onclick="createBackup()">
                            <i class="fas fa-download me-2"></i>बैकअप बनाएं
                        </button>
                        <button class="btn btn-outline-warning" onclick="restoreBackup()">
                            <i class="fas fa-upload me-2"></i>बैकअप रिस्टोर करें
                        </button>
                        <button class="btn btn-outline-info" onclick="downloadLogs()">
                            <i class="fas fa-file-text me-2"></i>लॉग्स डाउनलोड करें
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">पासवर्ड बदलें</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="changePasswordForm">
                    <div class="mb-3">
                        <label class="form-label">वर्तमान पासवर्ड</label>
                        <input type="password" class="form-control" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">नया पासवर्ड</label>
                        <input type="password" class="form-control" name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">नया पासवर्ड पुष्टि</label>
                        <input type="password" class="form-control" name="confirm_password" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">रद्द करें</button>
                <button type="button" class="btn btn-primary" onclick="changePassword()">पासवर्ड बदलें</button>
            </div>
        </div>
    </div>
</div>

<script>
// General Settings Form
document.getElementById('generalSettingsForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    // Submit form data
    fetch('/admin/settings/general', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('सामान्य सेटिंग्स सफलतापूर्वक अपडेट हो गईं');
        } else {
            alert('सेटिंग्स अपडेट करने में त्रुटि हुई');
        }
    });
});

// Application Settings Form
document.getElementById('applicationSettingsForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    // Submit form data
    fetch('/admin/settings/applications', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('आवेदन सेटिंग्स सफलतापूर्वक अपडेट हो गईं');
        } else {
            alert('सेटिंग्स अपडेट करने में त्रुटि हुई');
        }
    });
});

function changePassword() {
    const form = document.getElementById('changePasswordForm');
    const formData = new FormData(form);
    
    if (formData.get('new_password') !== formData.get('confirm_password')) {
        alert('नए पासवर्ड मेल नहीं खाते');
        return;
    }
    
    fetch('/admin/change-password', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('पासवर्ड सफलतापूर्वक बदल गया');
            document.getElementById('changePasswordModal').modal('hide');
            form.reset();
        } else {
            alert('पासवर्ड बदलने में त्रुटि हुई');
        }
    });
}

function createBackup() {
    if (confirm('क्या आप डेटाबेस का बैकअप बनाना चाहते हैं?')) {
        window.location.href = '/admin/backup/create';
    }
}

function restoreBackup() {
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = '.sql';
    fileInput.onchange = function() {
        if (this.files[0]) {
            const formData = new FormData();
            formData.append('backup_file', this.files[0]);
            
            fetch('/admin/backup/restore', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('बैकअप सफलतापूर्वक रिस्टोर हो गया');
                } else {
                    alert('बैकअप रिस्टोर करने में त्रुटि हुई');
                }
            });
        }
    };
    fileInput.click();
}

function downloadLogs() {
    window.location.href = '/admin/logs/download';
}
</script>

<?= $this->endSection() ?>