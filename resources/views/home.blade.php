@extends('layouts.app')

@section('title', 'Home')

@section('metaDescription', 'TrustProp Aluminium - Leading Zimbabwean provider of aluminium and glass solutions. Professional, reliable, and innovative designs for homes, businesses, and industries.')

@push('styles')
<style>
    /* Hero Section with Slider */
    .hero-section {
        position: relative;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        color: white;
        padding: 0;
        margin: 0 -24px 80px;
        overflow: hidden;
        height: 650px;
    }

    /* Slider Container */
    .hero-slider {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    .slider-track {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .slide.active {
        opacity: 1;
    }

    .slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* Overlay for better text readability */
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            135deg,
            rgba(30, 64, 175, 0.85) 0%,
            rgba(37, 99, 235, 0.75) 100%
        );
        z-index: 1;
    }

    .hero-overlay::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 50%, rgba(252, 211, 77, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(37, 99, 235, 0.2) 0%, transparent 50%);
        pointer-events: none;
    }

    /* Slider Controls */
    .slider-controls {
        position: absolute;
        bottom: 40px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 3;
        display: flex;
        gap: 12px;
    }

    .slider-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.4);
        border: 2px solid rgba(255, 255, 255, 0.6);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .slider-dot:hover {
        background: rgba(255, 255, 255, 0.6);
        transform: scale(1.2);
    }

    .slider-dot.active {
        background: var(--accent-yellow);
        border-color: var(--accent-yellow);
        width: 32px;
        border-radius: 6px;
    }

    /* Navigation Arrows */
    .slider-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 3;
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        color: white;
        font-size: 20px;
    }

    .slider-arrow:hover {
        background: var(--accent-yellow);
        border-color: var(--accent-yellow);
        color: var(--text-dark);
        transform: translateY(-50%) scale(1.1);
    }

    .slider-arrow.prev {
        left: 30px;
    }

    .slider-arrow.next {
        right: 30px;
    }

    /* Hero Content */
    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 1100px;
        margin: 0 auto;
        text-align: center;
        padding: 140px 24px 100px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(252, 211, 77, 0.25);
        border: 1px solid rgba(252, 211, 77, 0.5);
        padding: 10px 24px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 24px;
        animation: fadeInDown 0.8s ease;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .hero-badge i {
        color: var(--accent-yellow);
    }

    .hero-content h1 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 800;
        margin-bottom: 24px;
        animation: fadeInDown 0.8s ease 0.1s both;
        line-height: 1.1;
        letter-spacing: -2px;
        text-shadow: 2px 4px 12px rgba(0, 0, 0, 0.3);
    }

    .hero-content .tagline {
        font-size: clamp(1.1rem, 2vw, 1.5rem);
        font-weight: 400;
        margin-bottom: 20px;
        animation: fadeInUp 0.8s ease 0.2s both;
        letter-spacing: 0.5px;
        color: var(--accent-yellow);
        font-style: italic;
        text-shadow: 1px 2px 8px rgba(0, 0, 0, 0.3);
    }

    .hero-content .lead {
        font-size: clamp(1rem, 1.5vw, 1.15rem);
        line-height: 1.8;
        max-width: 750px;
        margin: 0 auto 40px;
        animation: fadeInUp 0.8s ease 0.3s both;
        opacity: 0.95;
        font-weight: 400;
        text-shadow: 1px 2px 6px rgba(0, 0, 0, 0.3);
    }

    .cta-buttons {
        display: flex;
        gap: 16px;
        justify-content: center;
        flex-wrap: wrap;
        animation: fadeInUp 0.8s ease 0.4s both;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 16px 32px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        letter-spacing: -0.2px;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--bright-yellow) 0%, var(--accent-yellow) 100%);
        color: var(--text-dark);
        box-shadow: 0 4px 20px rgba(252, 211, 77, 0.4);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(252, 211, 77, 0.5);
    }

    .btn-outline {
        background: rgba(255, 255, 255, 0.15);
        color: white;
        border-color: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(10px);
    }

    .btn-outline:hover {
        background: white;
        color: var(--primary-blue);
        border-color: white;
        transform: translateY(-3px);
    }

    /* Stats Section */
    .stats-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 24px;
        margin: -60px 0 80px;
        position: relative;
        z-index: 2;
    }

    .stat-card {
        text-align: center;
        padding: 36px 24px;
        background: white;
        border-radius: var(--border-radius);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border: 1px solid var(--border-light);
        transition: all 0.3s ease;
        animation: fadeInUp 0.6s ease both;
    }

    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.15s; }
    .stat-card:nth-child(3) { animation-delay: 0.2s; }
    .stat-card:nth-child(4) { animation-delay: 0.25s; }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(30, 64, 175, 0.15);
        border-color: var(--primary-blue);
    }

    .stat-icon {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 28px;
        color: white;
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.2);
        transition: transform 0.3s ease;
    }

    .stat-card:hover .stat-icon {
        transform: scale(1.1) rotate(-5deg);
    }

    .stat-number {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-blue);
        margin-bottom: 8px;
        line-height: 1;
    }

    .stat-label {
        font-size: 0.95rem;
        color: var(--text-medium);
        font-weight: 500;
    }

    /* Content Sections */
    .content-section {
        padding: 80px 0;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .section-badge {
        display: inline-block;
        background: rgba(30, 64, 175, 0.1);
        color: var(--primary-blue);
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 16px;
    }

    .section-header h2 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(2rem, 4vw, 2.75rem);
        color: var(--text-dark);
        margin-bottom: 16px;
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -1px;
    }

    .section-header p {
        font-size: 1.1rem;
        color: var(--text-medium);
        line-height: 1.7;
    }

    /* About Section */
    .about-content {
        background: var(--bg-light);
        padding: 60px;
        border-radius: 20px;
        border: 1px solid var(--border-light);
    }

    .about-content p {
        font-size: 1.05rem;
        line-height: 1.8;
        color: var(--text-medium);
        text-align: center;
    }

    /* Core Values Section */
    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 28px;
        margin-top: 48px;
    }

    .value-card {
        background: white;
        padding: 40px 32px;
        border-radius: var(--border-radius);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        border: 1px solid var(--border-light);
        transition: all 0.4s ease;
        animation: fadeInUp 0.6s ease both;
        position: relative;
    }

    .value-card:nth-child(1) { animation-delay: 0.1s; }
    .value-card:nth-child(2) { animation-delay: 0.15s; }
    .value-card:nth-child(3) { animation-delay: 0.2s; }
    .value-card:nth-child(4) { animation-delay: 0.25s; }

    .value-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 28px rgba(30, 64, 175, 0.15);
        border-color: var(--primary-blue);
    }

    .value-icon {
        width: 72px;
        height: 72px;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        font-size: 32px;
        color: white;
        box-shadow: 0 8px 16px rgba(30, 64, 175, 0.2);
        transition: transform 0.3s ease;
    }

    .value-card:hover .value-icon {
        transform: scale(1.1) rotate(-10deg);
    }

    .value-card h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.4rem;
        color: var(--text-dark);
        margin-bottom: 12px;
        text-align: center;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .value-card p {
        color: var(--text-medium);
        line-height: 1.7;
        text-align: center;
        font-size: 0.95rem;
    }

    /* Why Choose Us Section - Updated with More Visible Background */
    .why-choose-section {
        background: var(--primary-blue);
        padding: 80px 24px;
        margin: 100px -24px 80px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    /* Background Image Overlay - Increased Opacity */
    .why-choose-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('{{ asset('pics/trust6.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0.4;
        filter: brightness(0.85);
        z-index: 0;
    }

    /* Lighter Gradient Overlay - More transparency */
    .why-choose-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(
                ellipse at center,
                rgba(30, 64, 175, 0.65) 0%,
                rgba(30, 64, 175, 0.80) 100%
            );
        z-index: 1;
    }

    .why-choose-content {
        position: relative;
        z-index: 2;
        max-width: var(--max-width);
        margin: 0 auto;
    }

    .why-choose-section .section-header h2 {
        color: white;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
    }

    .why-choose-section .section-badge {
        background: rgba(252, 211, 77, 0.25);
        color: var(--accent-yellow);
        backdrop-filter: blur(8px);
    }

    .features-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin-top: 48px;
        list-style: none;
    }

    /* Enhanced Feature Cards for Better Contrast */
    .features-list li {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        padding: 24px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: var(--border-radius);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.25);
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .features-list li:hover {
        background: rgba(255, 255, 255, 0.22);
        transform: translateX(8px);
        border-color: rgba(252, 211, 77, 0.5);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
    }

    .features-list i {
        font-size: 24px;
        color: var(--accent-yellow);
        flex-shrink: 0;
        margin-top: 2px;
    }

    .features-list strong {
        display: block;
        font-size: 1.05rem;
        margin-bottom: 6px;
        color: white;
        font-weight: 600;
        font-family: 'Space Grotesk', sans-serif;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);
    }

    .features-list span {
        font-size: 0.9rem;
        opacity: 0.95;
        line-height: 1.6;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, var(--bg-light) 0%, var(--bg-lighter) 100%);
        padding: 80px 48px;
        border-radius: 24px;
        text-align: center;
        margin-top: 80px;
        border: 1px solid var(--border-light);
    }

    .cta-section h2 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(1.8rem, 3vw, 2.5rem);
        color: var(--text-dark);
        margin-bottom: 16px;
        font-weight: 700;
        letter-spacing: -1px;
    }

    .cta-section p {
        font-size: 1.1rem;
        color: var(--text-medium);
        margin-bottom: 32px;
        max-width: 650px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.7;
    }

    /* Animations */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-section {
            height: 550px;
            margin: 0 -16px 60px;
        }

        .hero-content {
            padding: 100px 16px 80px;
        }

        .slider-arrow {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }

        .slider-arrow.prev {
            left: 15px;
        }

        .slider-arrow.next {
            right: 15px;
        }

        .slider-controls {
            bottom: 20px;
        }

        .stats-section {
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 16px;
            margin: -50px 0 60px;
        }

        .stat-card {
            padding: 28px 16px;
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            font-size: 24px;
        }

        .stat-number {
            font-size: 2rem;
        }

        .content-section {
            padding: 60px 0;
        }

        .about-content {
            padding: 40px 24px;
        }

        .values-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .why-choose-section {
            padding: 60px 16px;
            margin: 60px -16px;
        }

        .features-list {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .features-list li:hover {
            transform: translateX(4px);
        }

        .cta-section {
            padding: 60px 24px;
            margin-top: 60px;
        }
    }

    @media (max-width: 480px) {
        .hero-section {
            height: 500px;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section with Slider -->
<div class="hero-section">
    <!-- Image Slider -->
    <div class="hero-slider">
        <div class="slider-track">
            <div class="slide active">
                <img src="{{ asset('slider/slider01.jpg') }}" alt="TrustProp Aluminium Project 1">
            </div>
            <div class="slide">
                <img src="{{ asset('pics/trust6.jpg') }}" alt="TrustProp Aluminium Project 2">
            </div>
            <div class="slide">
                <img src="{{ asset('pics/trust1.jpg') }}" alt="TrustProp Aluminium Project 3">
            </div>
            <div class="slide">
                <img src="{{ asset('pics/trust4.jpg') }}" alt="TrustProp Aluminium Project 4">
            </div>
            <div class="slide">
                <img src="{{ asset('pics/trust6.jpg') }}" alt="TrustProp Aluminium Project 5">
            </div>
        </div>
    </div>

    <!-- Overlay -->
    <div class="hero-overlay"></div>

    <!-- Navigation Arrows -->
    <div class="slider-arrow prev" onclick="changeSlide(-1)">
        <i class="fas fa-chevron-left"></i>
    </div>
    <div class="slider-arrow next" onclick="changeSlide(1)">
        <i class="fas fa-chevron-right"></i>
    </div>

    <!-- Hero Content -->
    <div class="hero-content">
        <div class="hero-badge">
            <i class="fas fa-award"></i>
            <span>Zimbabwe's Premier Aluminium & Glass Specialists</span>
        </div>
        <h1>Welcome to TrustProp Aluminium</h1>
        <p class="tagline">Built in Trust. Framed in Perfection.</p>
        <p class="lead">
            Zimbabwe's leading provider of premium aluminium and glass solutions. 
            We deliver modern, high-quality, durable, and aesthetic designs for homes, businesses, and industries.
        </p>
        <div class="cta-buttons">
            <a href="{{ route('services') }}" class="btn btn-primary">
                <i class="fas fa-tools"></i> Explore Our Services
            </a>
            <a href="{{ route('contact') }}" class="btn btn-outline">
                <i class="fas fa-paper-plane"></i> Get a Free Quote
            </a>
        </div>
    </div>

    <!-- Slider Controls -->
    <div class="slider-controls">
        <span class="slider-dot active" onclick="goToSlide(0)"></span>
        <span class="slider-dot" onclick="goToSlide(1)"></span>
        <span class="slider-dot" onclick="goToSlide(2)"></span>
        <span class="slider-dot" onclick="goToSlide(3)"></span>
        <span class="slider-dot" onclick="goToSlide(4)"></span>
    </div>
</div>

<div class="container">
    <!-- Stats Section -->
    <div class="stats-section">
        <div class="stat-card" data-animate>
            <div class="stat-icon">
                <i class="fas fa-award"></i>
            </div>
            <div class="stat-number" data-target="15">0</div>
            <div class="stat-label">Years Experience</div>
        </div>
        <div class="stat-card" data-animate>
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-number" data-target="500">0</div>
            <div class="stat-label">Happy Clients</div>
        </div>
        <div class="stat-card" data-animate>
            <div class="stat-icon">
                <i class="fas fa-project-diagram"></i>
            </div>
            <div class="stat-number" data-target="1000">0</div>
            <div class="stat-label">Projects Completed</div>
        </div>
        <div class="stat-card" data-animate>
            <div class="stat-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="stat-number" data-target="100">0</div>
            <div class="stat-label">Client Satisfaction</div>
        </div>
    </div>

    <!-- About Section -->
    <div class="content-section" data-animate>
        <div class="section-header">
            <span class="section-badge">About Us</span>
            <h2>Who We Are</h2>
        </div>
        <div class="about-content">
            <p>
                TrustProp Aluminium is dedicated to transforming spaces with innovative aluminium and glass solutions. 
                Our commitment to excellence and attention to detail sets us apart as Zimbabwe's trusted partner 
                in creating stunning, functional, and sustainable structures that stand the test of time.
            </p>
        </div>
    </div>

    <!-- Core Values Section -->
    <div class="content-section" data-animate>
        <div class="section-header">
            <span class="section-badge">Our Values</span>
            <h2>Core Principles That Guide Us</h2>
            <p>The fundamental values that drive everything we do and shape how we serve our clients</p>
        </div>

        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h3>Professionalism</h3>
                <p>
                    We uphold the highest standards of ethical conduct, transparency, and reliability in every project. 
                    Our team of experts ensures professional service from consultation to completion.
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Reliability</h3>
                <p>
                    Every installation is engineered for lasting perfection. We use premium materials and proven 
                    techniques to deliver solutions that stand the test of time.
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>Innovation</h3>
                <p>
                    We embrace modern techniques and cutting-edge technology to provide innovative solutions 
                    that meet contemporary design and functionality requirements.
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3>Sustainability</h3>
                <p>
                    Committed to environmental responsibility, we utilize eco-conscious materials and processes 
                    to minimize our ecological footprint while maximizing quality.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Why Choose Us Section -->
<div class="why-choose-section">
    <div class="why-choose-content">
        <div class="section-header">
            <span class="section-badge">Why Us</span>
            <h2>Why Choose TrustProp Aluminium?</h2>
            <p style="color: rgba(255, 255, 255, 0.95);">
                We combine expertise, quality, and customer satisfaction to deliver exceptional results every time
            </p>
        </div>

        <ul class="features-list">
            <li>
                <i class="fas fa-check-circle"></i>
                <div>
                    <strong>Expert Craftsmanship</strong>
                    <span>Skilled professionals with years of industry experience and technical expertise</span>
                </div>
            </li>
            <li>
                <i class="fas fa-check-circle"></i>
                <div>
                    <strong>Premium Materials</strong>
                    <span>Only the finest quality aluminium and glass products from trusted suppliers</span>
                </div>
            </li>
            <li>
                <i class="fas fa-check-circle"></i>
                <div>
                    <strong>Custom Solutions</strong>
                    <span>Tailored designs to match your unique requirements and vision</span>
                </div>
            </li>
            <li>
                <i class="fas fa-check-circle"></i>
                <div>
                    <strong>Timely Delivery</strong>
                    <span>Projects completed on schedule with efficient project management</span>
                </div>
            </li>
            <li>
                <i class="fas fa-check-circle"></i>
                <div>
                    <strong>Competitive Pricing</strong>
                    <span>Exceptional value without compromising on quality or service</span>
                </div>
            </li>
            <li>
                <i class="fas fa-check-circle"></i>
                <div>
                    <strong>Warranty Support</strong>
                    <span>Comprehensive warranties and after-sales support on all installations</span>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="container">
    <!-- CTA Section -->
    <div class="cta-section" data-animate>
        <h2>Ready to Transform Your Space?</h2>
        <p>
            Let's bring your vision to life with our premium aluminium and glass solutions. 
            Contact us today for a free consultation and personalized quote.
        </p>
        <div class="cta-buttons">
            <a href="{{ route('contact') }}" class="btn btn-primary">
                <i class="fas fa-envelope"></i> Contact Us Today
            </a>
            <a href="{{ route('projects') }}" class="btn btn-outline" style="border-color: var(--primary-blue); color: var(--primary-blue);">
                <i class="fas fa-images"></i> View Our Portfolio
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Slider functionality
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.slider-dot');
    let autoSlideInterval;

    function showSlide(index) {
        // Remove active class from all slides and dots
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        // Add active class to current slide and dot
        if (slides[index]) {
            slides[index].classList.add('active');
            dots[index].classList.add('active');
        }
        
        currentSlide = index;
    }

    function changeSlide(direction) {
        currentSlide += direction;
        
        if (currentSlide >= slides.length) {
            currentSlide = 0;
        } else if (currentSlide < 0) {
            currentSlide = slides.length - 1;
        }
        
        showSlide(currentSlide);
        resetAutoSlide();
    }

    function goToSlide(index) {
        showSlide(index);
        resetAutoSlide();
    }

    function autoSlide() {
        currentSlide++;
        if (currentSlide >= slides.length) {
            currentSlide = 0;
        }
        showSlide(currentSlide);
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(autoSlide, 5000); // Change slide every 5 seconds
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    // Start auto-sliding when page loads
    document.addEventListener('DOMContentLoaded', function() {
        startAutoSlide();
        
        // Pause auto-slide on hover
        const heroSection = document.querySelector('.hero-section');
        heroSection.addEventListener('mouseenter', () => {
            clearInterval(autoSlideInterval);
        });
        heroSection.addEventListener('mouseleave', () => {
            startAutoSlide();
        });
    });

    // Counter animation for stats
    document.addEventListener('DOMContentLoaded', function() {
        const statNumbers = document.querySelectorAll('.stat-number');
        
        const animateCounter = (element) => {
            const target = parseInt(element.getAttribute('data-target'));
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target + (target === 100 ? '%' : '+');
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current) + (target === 100 ? '%' : '+');
                }
            }, 16);
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statNumber = entry.target.querySelector('.stat-number');
                    if (statNumber) {
                        animateCounter(statNumber);
                    }
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });
        
        document.querySelectorAll('.stat-card').forEach(card => {
            observer.observe(card);
        });
    });
</script>
@endpush
{{-- @endsection --}}