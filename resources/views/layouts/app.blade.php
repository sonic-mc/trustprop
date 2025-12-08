<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="@yield('metaDescription', 'TrustProp Aluminium - Professional glass and aluminium services. Built in Trust. Framed in Perfection.')">
    <meta name="keywords" content="aluminium, glass, windows, doors, pergolas, balustrades, garage doors, zimbabwe">
    <meta name="author" content="TrustProp Aluminium">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="TrustProp Aluminium | @yield('title', 'Home')">
    <meta property="og:description" content="@yield('metaDescription', 'Professional glass and aluminium services')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/trustprop1.png') }}">

    
    <title>@yield('title', 'Home') | TrustProp Aluminium</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <style>
        /* ===== CSS Variables - Updated Theme ===== */
        :root {
            --primary-blue: #1E40AF;
            --dark-blue: #1E3A8A;
            --royal-blue: #2563EB;
            --accent-yellow: #FCD34D;
            --bright-yellow: #FBBF24;
            --text-dark: #1F2937;
            --text-medium: #4B5563;
            --text-light: #6B7280;
            --text-white: #ffffff;
            --bg-white: #ffffff;
            --bg-light: #F9FAFB;
            --bg-lighter: #F3F4F6;
            --border-light: #E5E7EB;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            --transition-speed: 0.3s;
            --header-height: 90px;
            --max-width: 1320px;
            --border-radius: 12px;
        }

        /* ===== Global Resets & Base Styles ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            font-size: 16px;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: var(--bg-white);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* ===== Header & Navigation ===== */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: var(--bg-white);
            box-shadow: var(--shadow-sm);
            z-index: 1000;
            transition: all var(--transition-speed) ease;
            border-bottom: 1px solid var(--border-light);
        }

        header.scrolled {
            box-shadow: var(--shadow-md);
        }

        .header-container {
            max-width: var(--max-width);
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: var(--header-height);
        }

        /* Logo */
        .logo {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            color: var(--text-dark);
            transition: transform var(--transition-speed) ease;
        }

        .logo:hover {
            transform: translateY(-1px);
        }

        .logo-icon {
            width: 55px;
            height: 55px;
            background: transparent !important;
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: none !important;
            transition: all var(--transition-speed) ease;
            padding: 0;
        }

        .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            background: transparent !important;
        }

        .logo:hover .logo-icon {
            box-shadow: none !important;
            transform: scale(1.05);
        }

        .logo-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo-text h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 22px;
            font-weight: 700;
            line-height: 1.2;
            margin: 0;
            color: var(--primary-blue);
            letter-spacing: -0.5px;
        }

        .logo-text p {
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 1.2px;
            margin: 0;
            color: var(--text-medium);
            text-transform: uppercase;
            line-height: 1.3;
        }

        /* Navigation */
        nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        nav a {
            position: relative;
            color: var(--text-medium);
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all var(--transition-speed) ease;
            letter-spacing: -0.2px;
        }

        nav a i {
            font-size: 14px;
            margin-right: 6px;
            opacity: 0.8;
        }

        nav a:hover {
            background: var(--bg-lighter);
            color: var(--primary-blue);
        }

        nav a.active {
            background: var(--primary-blue);
            color: var(--text-white);
            box-shadow: 0 2px 8px rgba(30, 64, 175, 0.2);
        }

        nav a.active i {
            opacity: 1;
        }

        /* CTA Button in Nav */
        .nav-cta {
            background: linear-gradient(135deg, var(--bright-yellow) 0%, var(--accent-yellow) 100%);
            color: var(--text-dark) !important;
            font-weight: 600;
            margin-left: 8px;
            box-shadow: 0 2px 8px rgba(252, 211, 77, 0.3);
        }

        .nav-cta:hover {
            background: var(--bright-yellow);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(252, 211, 77, 0.4);
        }

        /* Mobile Menu Toggle */
        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 10px;
            background: transparent;
            border: none;
            z-index: 1001;
        }

        .menu-toggle span {
            display: block;
            width: 26px;
            height: 2.5px;
            background: var(--primary-blue);
            border-radius: 3px;
            transition: all var(--transition-speed) ease;
        }

        .menu-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(7px, 7px);
        }

        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        /* ===== Main Container ===== */
        main {
            margin-top: var(--header-height);
            min-height: calc(100vh - var(--header-height) - 200px);
        }

        .container {
            max-width: var(--max-width);
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Alert Styles */
        .alert {
            padding: 16px 20px;
            border-radius: var(--border-radius);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            font-weight: 500;
            animation: slideDown 0.4s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: #D1FAE5;
            color: #065F46;
            border: 1px solid #10B981;
        }

        .alert-error {
            background: #FEE2E2;
            color: #991B1B;
            border: 1px solid #EF4444;
        }

        .alert i {
            font-size: 18px;
        }

        /* ===== Footer with Background ===== */
        footer {
            background: var(--primary-blue);
            color: var(--text-white);
            padding: 80px 0 0;
            margin-top: 120px;
            position: relative;
            overflow: hidden;
        }

        /* Footer Background Image */
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset("pics/trust4.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            opacity: 0.12;
            filter: brightness(0.8);
            z-index: 0;
        }

        /* Footer Gradient Overlay */
        footer::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(
                    ellipse at center,
                    rgba(30, 64, 175, 0.92) 0%,
                    rgba(30, 58, 138, 0.96) 100%
                );
            z-index: 1;
        }

        .footer-wave {
            position: relative;
            top: -2px;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            z-index: 2;
        }

        .footer-wave svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 60px;
        }

        .footer-container {
            position: relative;
            z-index: 2;
            max-width: var(--max-width);
            margin: 0 auto;
            padding: 0 24px;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 60px;
            margin-bottom: 60px;
        }

        .footer-section {
            position: relative;
            z-index: 2;
        }

        .footer-section h3 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 24px;
            color: var(--text-white);
            position: relative;
            padding-bottom: 12px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--accent-yellow);
            border-radius: 2px;
        }

        .footer-section p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 12px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .footer-section a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 14px;
            transition: all var(--transition-speed) ease;
            display: inline-block;
        }

        .footer-section a:hover {
            color: var(--accent-yellow);
            transform: translateX(4px);
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 12px;
        }

        .footer-section ul li a {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-section ul li i {
            font-size: 12px;
            width: 16px;
            color: var(--accent-yellow);
        }

        /* Social Links */
        .social-links {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            transition: all var(--transition-speed) ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .social-links a:hover {
            background: var(--accent-yellow);
            color: var(--primary-blue);
            transform: translateY(-4px);
            border-color: var(--accent-yellow);
        }

        /* Contact Info Styling */
        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 16px;
        }

        .contact-item i {
            color: var(--accent-yellow);
            font-size: 16px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .contact-item a,
        .contact-item span {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            line-height: 1.6;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .contact-item a:hover {
            color: var(--accent-yellow);
        }

        /* Footer Bottom */
        .footer-bottom {
            background: var(--dark-blue);
            padding: 24px 0;
            text-align: center;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.7);
            position: relative;
            z-index: 2;
        }

        .footer-bottom-container {
            max-width: var(--max-width);
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        .footer-bottom a {
            color: var(--accent-yellow);
            text-decoration: none;
            transition: opacity var(--transition-speed) ease;
        }

        .footer-bottom a:hover {
            opacity: 0.8;
        }

        .footer-links {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        /* ===== Floating Contact Buttons ===== */
        .floating-contact-buttons {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 999;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .floating-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: white;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            animation: pulse-button 2s infinite;
        }

        .floating-btn:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        .whatsapp-btn {
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
        }

        .whatsapp-btn:hover {
            background: linear-gradient(135deg, #128C7E 0%, #075E54 100%);
        }

        .phone-btn {
            background: linear-gradient(135deg, var(--bright-yellow) 0%, var(--accent-yellow) 100%);
            color: var(--text-dark);
        }

        .phone-btn:hover {
            background: linear-gradient(135deg, var(--accent-yellow) 0%, #F59E0B 100%);
        }

        /* Pulse Animation */
        @keyframes pulse-button {
            0%, 100% {
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            }
            50% {
                box-shadow: 0 4px 20px rgba(37, 211, 102, 0.5);
            }
        }

        .phone-btn {
            animation: pulse-button-phone 2s infinite;
        }

        @keyframes pulse-button-phone {
            0%, 100% {
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            }
            50% {
                box-shadow: 0 4px 20px rgba(252, 211, 77, 0.5);
            }
        }

        /* Ripple Effect on Click */
        .floating-btn:active {
            transform: scale(0.95);
        }

        /* ===== Responsive Design ===== */
        @media screen and (max-width: 1200px) {
            .footer-container {
                grid-template-columns: 2fr 1fr 1fr;
                gap: 40px;
            }

            .footer-section:last-child {
                grid-column: 1 / -1;
            }
        }

        @media screen and (max-width: 992px) {
            :root {
                --header-height: 80px;
            }

            nav {
                gap: 4px;
            }

            nav a {
                padding: 8px 14px;
                font-size: 14px;
            }
        }

        @media screen and (max-width: 768px) {
            :root {
                --header-height: 70px;
            }

            .header-container {
                padding: 0 16px;
            }

            .menu-toggle {
                display: flex;
            }

            .logo {
                gap: 10px;
            }

            .logo-icon {
                width: 45px;
                height: 45px;
            }

            .logo-text h1 {
                font-size: 18px;
            }

            .logo-text p {
                font-size: 9px;
            }

            nav {
                position: fixed;
                top: var(--header-height);
                left: -100%;
                width: 100%;
                height: calc(100vh - var(--header-height));
                background: var(--bg-white);
                flex-direction: column;
                align-items: stretch;
                padding: 24px 16px;
                gap: 8px;
                transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                overflow-y: auto;
                box-shadow: var(--shadow-xl);
            }

            nav.active {
                left: 0;
            }

            nav a {
                width: 100%;
                padding: 16px 20px;
                border-radius: 12px;
                font-size: 16px;
                text-align: left;
            }

            nav a i {
                font-size: 16px;
            }

            .nav-cta {
                margin-left: 0;
                margin-top: 16px;
            }

            .container {
                padding: 0 16px;
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 40px;
                padding: 0 16px;
            }

            .footer-bottom-container {
                flex-direction: column;
                text-align: center;
            }

            footer {
                margin-top: 80px;
                padding: 60px 0 0;
            }

            footer::before {
                background-attachment: scroll;
            }

            .floating-contact-buttons {
                bottom: 20px;
                right: 20px;
                gap: 12px;
            }

            .floating-btn {
                width: 56px;
                height: 56px;
                font-size: 26px;
            }
        }

        @media screen and (max-width: 480px) {
            .logo {
                gap: 8px;
            }

            .logo-icon {
                width: 40px;
                height: 40px;
            }

            .logo-text h1 {
                font-size: 16px;
            }

            .logo-text p {
                font-size: 8px;
                letter-spacing: 0.8px;
            }

            .floating-contact-buttons {
                bottom: 15px;
                right: 15px;
                gap: 10px;
            }

            .floating-btn {
                width: 50px;
                height: 50px;
                font-size: 24px;
            }
        }

        /* ===== Accessibility ===== */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Focus Styles for Accessibility */
        a:focus-visible,
        button:focus-visible {
            outline: 3px solid var(--accent-yellow);
            outline-offset: 2px;
        }

        .floating-btn:focus-visible {
            outline: 3px solid var(--accent-yellow);
            outline-offset: 3px;
        }

        /* ===== Print Styles ===== */
        @media print {
            header,
            footer,
            .menu-toggle,
            .social-links,
            .floating-contact-buttons {
                display: none;
            }

            main {
                margin-top: 0;
            }

            .container {
                box-shadow: none;
                padding: 0;
            }
        }

        /* ===== Loading Animation ===== */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--bg-white);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.5s ease;
        }

        .page-loader.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid var(--bg-lighter);
            border-top-color: var(--primary-blue);
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* ===== Utility Classes ===== */
        .text-center {
            text-align: center;
        }

        .mt-1 { margin-top: 8px; }
        .mt-2 { margin-top: 16px; }
        .mt-3 { margin-top: 24px; }
        .mt-4 { margin-top: 32px; }
        .mt-5 { margin-top: 40px; }

        .mb-1 { margin-bottom: 8px; }
        .mb-2 { margin-bottom: 16px; }
        .mb-3 { margin-bottom: 24px; }
        .mb-4 { margin-bottom: 32px; }
        .mb-5 { margin-bottom: 40px; }
    </style>

    @stack('styles')
</head>
<body>

<!-- Page Loader -->
<div class="page-loader" id="pageLoader">
    <div class="loader-spinner"></div>
</div>

<!-- Header -->
<header id="header">
    <div class="header-container">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
            <div class="logo-icon">
                <img src="{{ asset('images/trustprop1.png') }}" 
                     alt="TrustProp Aluminium Logo">
            </div>
            <div class="logo-text">
                <h1>TrustProp Aluminium</h1>
                <p>Built in Trust. Framed in Perfection.</p>
            </div>
        </a>

        <!-- Navigation -->
        <nav id="mainNav">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Home
            </a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
                <i class="fas fa-info-circle"></i> About
            </a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">
                <i class="fas fa-tools"></i> Services
            </a>
            <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> Projects
            </a>
            <a href="{{ route('contact') }}" class="nav-cta {{ request()->routeIs('contact') ? 'active' : '' }}">
                <i class="fas fa-paper-plane"></i> Get Quote
            </a>
        </nav>

        <!-- Mobile Menu Toggle -->
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle navigation menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>

<!-- Main Content -->
<main>
    @if(session('success'))
        <div class="container" style="padding-top: 24px; padding-bottom: 0;">
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="container" style="padding-top: 24px; padding-bottom: 0;">
            <div class="alert alert-error" role="alert">
                <i class="fas fa-exclamation-circle"></i>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    @yield('content')
</main>

<!-- Footer -->
<footer>
    <div class="footer-wave">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#1E40AF"></path>
        </svg>
    </div>

    <div class="footer-container">
        <!-- Company Info -->
        <div class="footer-section">
            <h3>TrustProp Aluminium</h3>
            <p>Zimbabwe's leading provider of premium aluminium and glass solutions for residential, commercial, and industrial properties.</p>
            <p style="margin-top: 20px; font-style: italic; color: var(--accent-yellow);">
                "Built in Trust. Framed in Perfection."
            </p>
            <div class="social-links">
                <a href="https://www.facebook.com/truspropzw" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   aria-label="Facebook" 
                   title="Follow us on Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/truspropzw" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   aria-label="Twitter" 
                   title="Follow us on Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.instagram.com/truspropzw" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   aria-label="Instagram" 
                   title="Follow us on Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.linkedin.com/company/trustprop-aluminium" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   aria-label="LinkedIn" 
                   title="Connect on LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="https://wa.me/+263781150517?text=Hello%20TrustProp%20Aluminium,%20I%20would%20like%20to%20inquire%20about%20your%20services" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   aria-label="WhatsApp" 
                   title="Chat with us on WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-angle-right"></i> Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}">
                        <i class="fas fa-angle-right"></i> About Us
                    </a>
                </li>
                <li>
                    <a href="{{ route('services') }}">
                        <i class="fas fa-angle-right"></i> Our Services
                    </a>
                </li>
                <li>
                    <a href="{{ route('projects') }}">
                        <i class="fas fa-angle-right"></i> Portfolio
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}">
                        <i class="fas fa-angle-right"></i> Contact Us
                    </a>
                </li>
            </ul>
        </div>

        <!-- Services -->
        <div class="footer-section">
            <h3>Our Services</h3>
            <ul>
                <li>
                    <a href="{{ route('services') }}#glass-replacement">
                        <i class="fas fa-angle-right"></i> Glass Replacement
                    </a>
                </li>
                <li>
                    <a href="{{ route('services') }}#aluminium-pergolas">
                        <i class="fas fa-angle-right"></i> Aluminium Pergolas
                    </a>
                </li>
                <li>
                    <a href="{{ route('services') }}#garage-doors">
                        <i class="fas fa-angle-right"></i> Garage Doors
                    </a>
                </li>
                <li>
                    <a href="{{ route('services') }}#windows-doors">
                        <i class="fas fa-angle-right"></i> Windows & Doors
                    </a>
                </li>
                <li>
                    <a href="{{ route('services') }}#balustrades">
                        <i class="fas fa-angle-right"></i> Balustrades
                    </a>
                </li>
            </ul>
        </div>

        <!-- Contact Info -->
        <div class="footer-section">
            <h3>Contact Us</h3>
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>17B Lomagundi Road<br>Mt. Pleasant, Harare<br>Zimbabwe</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-industry"></i>
                <span style="color: rgba(255, 255, 255, 0.9); font-size: 13px;">
                    <strong style="color: var(--accent-yellow);">Plant:</strong> Pokugara, Harare
                </span>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <div style="display: flex; flex-direction: column; gap: 4px;">
                    <a href="tel:+263778141191">+263 78 115 0517</a>
                    {{-- <a href="tel:+263788479546">+263 78 847 9546</a> --}}
                </div>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <div style="display: flex; flex-direction: column; gap: 4px;">
                    <a href="mailto:sales@trustprop.co.zw">sales@trustprop.co.zw</a>
                    <a href="mailto:admin@trustprop.co.zw">admin@trustprop.co.zw</a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-bottom-container">
            <p>
                &copy; {{ date('Y') }} <a href="{{ route('home') }}">TrustProp Aluminium</a>. All Rights Reserved.
            </p>
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Sitemap</a>
            </div>
        </div>
    </div>
</footer>

<!-- Floating Contact Buttons -->
<div class="floating-contact-buttons">
    <!-- WhatsApp Button -->
    <a href="https://wa.me/263781150517" 
       class="floating-btn whatsapp-btn" 
       target="_blank" 
       aria-label="Chat on WhatsApp"
       title="Chat on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
    
    <!-- Phone Call Button -->
    <a href="tel:+263781150517" 
       class="floating-btn phone-btn" 
       aria-label="Call Us"
       title="Call Us">
        <i class="fas fa-phone-alt"></i>
    </a>
</div>

<!-- JavaScript -->
<script>
    // Page Loader
    window.addEventListener('load', function() {
        const loader = document.getElementById('pageLoader');
        setTimeout(() => {
            loader.classList.add('hidden');
        }, 300);
    });

    // Header scroll effect
    const header = document.getElementById('header');
    let lastScroll = 0;

    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > 20) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        lastScroll = currentScroll;
    });

    // Mobile menu toggle
    const menuToggle = document.getElementById('menuToggle');
    const mainNav = document.getElementById('mainNav');
    const body = document.body;

    menuToggle.addEventListener('click', function() {
        this.classList.toggle('active');
        mainNav.classList.toggle('active');
        body.style.overflow = mainNav.classList.contains('active') ? 'hidden' : '';
    });

    // Close mobile menu when clicking a link
    const navLinks = mainNav.querySelectorAll('a');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            menuToggle.classList.remove('active');
            mainNav.classList.remove('active');
            body.style.overflow = '';
        });
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const isClickInsideNav = mainNav.contains(event.target);
        const isClickOnToggle = menuToggle.contains(event.target);
        
        if (!isClickInsideNav && !isClickOnToggle && mainNav.classList.contains('active')) {
            menuToggle.classList.remove('active');
            mainNav.classList.remove('active');
            body.style.overflow = '';
        }
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const headerHeight = document.getElementById('header').offsetHeight;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // Alert auto-dismiss
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.3s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 300);
        }, 5000);
    });

    // Add scroll reveal animation
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe elements with animation class
    document.addEventListener('DOMContentLoaded', function() {
        const animatedElements = document.querySelectorAll('[data-animate]');
        animatedElements.forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    });
</script>

@stack('scripts')

</body>
</html>