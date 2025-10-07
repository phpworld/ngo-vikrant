<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'सदस्य पैनल' ?> - एनजीओ विक्रांत</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --brand-start:#667eea; --brand-end:#764ba2; --brand:#667eea;
            --radius-lg:20px; --radius-md:14px; --radius-sm:10px;
            --shadow-card:0 8px 25px -8px rgba(102,126,234,.25);
            --shadow-hover:0 12px 35px -10px rgba(102,126,234,.35);
        }
        body {
            font-family: 'Noto Sans Devanagari', sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            line-height: 1.6;
        }
        .sidebar {
            background: linear-gradient(135deg, var(--brand-start) 0%, var(--brand-end) 100%);
            min-height: 100vh;
            box-shadow: 2px 0 15px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.85);
            padding: 16px 24px;
            border-radius: 0;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            font-weight: 500;
            display: flex;
            align-items: center;
            margin: 2px 0;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255,255,255,0.15);
            color: white;
            border-left: 4px solid #ffc107;
            transform: translateX(5px);
        }
        .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.2);
            color: white;
            border-left: 4px solid #ffc107;
            font-weight: 600;
        }
        .sidebar .nav-link i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }
        .main-content {
            margin-left: 280px;
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }
        .page-header {
            background: linear-gradient(135deg, var(--brand-start), var(--brand-end));
            color: #fff;
            padding: 2rem;
            margin: -20px -20px 30px -20px;
            border-radius: 0 0 var(--radius-lg) var(--radius-lg);
            box-shadow: var(--shadow-card);
        }
        .page-header h1 {
            font-weight: 600;
            margin: 0;
            font-size: 2rem;
        }
        .page-header .breadcrumb-item a {
            color: rgba(255,255,255,.8);
            text-decoration: none;
        }
        .page-header .breadcrumb-item.active {
            color: rgba(255,255,255,.9);
        }
        .sidebar-brand {
            padding: 24px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }
        .sidebar-brand h4 {
            color: white;
            margin: 0;
            font-weight: 700;
            font-size: 1.4rem;
        }
        .sidebar-brand p {
            color: rgba(255,255,255,0.7);
            margin: 5px 0 0;
            font-size: 0.9rem;
        }
        .user-info {
            padding: 20px 24px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            text-align: center;
        }
        .user-avatar {
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-size: 1.5rem;
            color: white;
        }
        .user-name {
            color: white;
            font-weight: 600;
            margin: 0;
            font-size: 1rem;
        }
        .user-role {
            color: rgba(255,255,255,0.7);
            font-size: 0.8rem;
            margin: 2px 0 0;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: #fff;
            border-radius: var(--radius-md);
            padding: 1.8rem;
            box-shadow: var(--shadow-card);
            transition: .3s;
            position: relative;
            overflow: hidden;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }
        .stat-card::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--brand-start), var(--brand-end));
            opacity: .1;
            border-radius: 50%;
            transform: translate(25px, -25px);
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            background: linear-gradient(90deg, var(--brand-start), var(--brand-end));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .stat-label {
            font-size: .9rem;
            color: #64748b;
            margin: .5rem 0 0;
        }
        .stat-icon {
            background: linear-gradient(135deg, var(--brand-start), var(--brand-end));
            color: #fff;
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        .card-modern {
            background: #fff;
            border: none;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-card);
            transition: .3s;
        }
        .card-modern:hover {
            box-shadow: var(--shadow-hover);
        }
        .card-header-modern {
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            border-bottom: 1px solid #e2e8f0;
            padding: 1.2rem 1.5rem;
            border-radius: var(--radius-md) var(--radius-md) 0 0;
        }
        .card-header-modern h5 {
            margin: 0;
            font-weight: 600;
            color: #1e293b;
        }
        .table-modern {
            margin: 0;
        }
        .table-modern th {
            background: #f8fafc;
            border: none;
            font-weight: 600;
            font-size: .8rem;
            text-transform: uppercase;
            letter-spacing: .5px;
            color: #64748b;
            padding: 1rem .75rem;
        }
        .table-modern td {
            border: none;
            padding: .9rem .75rem;
            border-bottom: 1px solid #f1f5f9;
        }
        .badge-status {
            padding: .4rem .7rem;
            border-radius: 20px;
            font-size: .7rem;
            font-weight: 500;
        }
        .badge-pending {
            background: #fef3c7;
            color: #92400e;
        }
        .badge-approved {
            background: #dcfce7;
            color: #166534;
        }
        .badge-rejected {
            background: #fee2e2;
            color: #991b1b;
        }
        .btn-gradient {
            background: linear-gradient(135deg, var(--brand-start), var(--brand-end));
            border: none;
            color: #fff;
            font-weight: 500;
            padding: .5rem 1rem;
            border-radius: var(--radius-sm);
            transition: .3s;
            font-size: .85rem;
        }
        .btn-gradient:hover {
            filter: brightness(1.1);
            transform: translateY(-2px);
            color: #fff;
        }
        .btn-outline-gradient {
            border: 2px solid var(--brand-start);
            color: var(--brand-start);
            background: transparent;
            font-weight: 500;
            padding: .45rem 1rem;
            border-radius: var(--radius-sm);
            transition: .3s;
            font-size: .85rem;
        }
        .btn-outline-gradient:hover {
            background: linear-gradient(135deg, var(--brand-start), var(--brand-end));
            color: #fff;
        }
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .action-card {
            background: #fff;
            border-radius: var(--radius-md);
            padding: 1.5rem;
            text-align: center;
            box-shadow: var(--shadow-card);
            transition: .3s;
            text-decoration: none;
            color: inherit;
        }
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
            color: inherit;
            text-decoration: none;
        }
        .action-icon {
            background: linear-gradient(135deg, var(--brand-start), var(--brand-end));
            color: #fff;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 1rem;
        }
        .alert-modern {
            border: none;
            border-radius: var(--radius-sm);
            padding: 1rem 1.2rem;
        }
        .alert-success {
            background: #f0fdf4;
            border-left: 4px solid #22c55e;
            color: #166534;
        }
        .alert-danger {
            background: #fef2f2;
            border-left: 4px solid #ef4444;
            color: #991b1b;
        }
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: var(--brand-start);
            color: white;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            font-size: 1.2rem;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .sidebar-toggle {
                display: block;
            }
            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1rem;
            }
            .quick-actions {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Mobile Toggle Button -->
    <button class="sidebar-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="sidebar" id="sidebar">
        <!-- Sidebar Brand -->
        <div class="sidebar-brand">
            <h4><i class="fas fa-hands-helping me-2"></i>एनजीओ विक्रांत</h4>
            <p>सदस्य पैनल</p>
        </div>

        <!-- User Info -->
        <div class="user-info">
            <div class="user-avatar">
                <i class="fas fa-user"></i>
            </div>
            <div class="user-name"><?= session()->get('user_name') ?? 'सदस्य' ?></div>
            <div class="user-role">सदस्य</div>
        </div>

        <!-- Navigation -->
        <nav class="nav flex-column">
            <a class="nav-link <?= (current_url(true)->getSegment(2) == 'dashboard' || current_url(true)->getSegment(2) == '') ? 'active' : '' ?>" href="/member/dashboard">
                <i class="fas fa-tachometer-alt"></i>डैशबोर्ड
            </a>
            <a class="nav-link <?= (current_url(true)->getSegment(2) == 'applications') ? 'active' : '' ?>" href="/member/applications">
                <i class="fas fa-file-alt"></i>मेरे आवेदन
            </a>
            <a class="nav-link <?= (current_url(true)->getSegment(2) == 'apply-vivah-help') ? 'active' : '' ?>" href="/member/apply-vivah-help">
                <i class="fas fa-heart"></i>विवाह सहायता
            </a>
            <a class="nav-link <?= (current_url(true)->getSegment(2) == 'apply-death-help') ? 'active' : '' ?>" href="/member/apply-death-help">
                <i class="fas fa-praying-hands"></i>मृत्यु सहायता
            </a>
            <a class="nav-link <?= (current_url(true)->getSegment(2) == 'profile') ? 'active' : '' ?>" href="/member/profile">
                <i class="fas fa-user-edit"></i>प्रोफ़ाइल
            </a>
            <hr style="border-color: rgba(255,255,255,0.2); margin: 1rem 0;">
            <a class="nav-link" href="/">
                <i class="fas fa-home"></i>मुख्य साइट
            </a>
            <a class="nav-link" href="/logout" onclick="return confirm('क्या आप वाकई लॉगआउट करना चाहते हैं?')">
                <i class="fas fa-sign-out-alt"></i>लॉगआउट
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1><i class="fas fa-tachometer-alt me-3"></i><?= $title ?? 'डैशबोर्ड' ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/">होम</a></li>
                            <li class="breadcrumb-item"><a href="/member/dashboard">सदस्य पैनल</a></li>
                            <li class="breadcrumb-item active"><?= $title ?? 'डैशबोर्ड' ?></li>
                        </ol>
                    </nav>
                </div>
                <div class="text-end">
                    <div class="text-white-50 small">स्वागत है</div>
                    <div class="text-white fw-bold"><?= session()->get('user_name') ?? 'सदस्य' ?></div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <?= $this->renderSection('content') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.sidebar-toggle');
            
            if (window.innerWidth <= 768 && !sidebar.contains(e.target) && !toggle.contains(e.target)) {
                sidebar.classList.remove('show');
            }
        });
    </script>
</body>
</html>