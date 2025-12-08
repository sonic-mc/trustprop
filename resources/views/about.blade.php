@extends('layouts.app')

@section('title', 'About Us')

@section('metaDescription', 'Learn about TrustProp Aluminium - Zimbabwe\'s most trusted partner for aluminium and glass solutions, recognized for reliability, innovation, and architectural excellence.')

@push('styles')
<style>
    /* Page Header */
    .page-header {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        padding: 80px 24px 100px;
        margin: 0 -24px 80px;
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 30% 50%, rgba(252, 211, 77, 0.1) 0%, transparent 60%);
    }

    .page-header-content {
        position: relative;
        z-index: 1;
        max-width: 800px;
        margin: 0 auto;
    }

    .page-header h1 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(2.5rem, 5vw, 3.5rem);
        font-weight: 800;
        margin-bottom: 16px;
        letter-spacing: -1.5px;
    }

    .page-header p {
        font-size: 1.2rem;
        opacity: 0.95;
        line-height: 1.6;
    }

    /* Content Sections */
    .about-section {
        margin-bottom: 80px;
    }

    .section-intro {
        max-width: 900px;
        margin: 0 auto 80px;
        text-align: center;
    }

    .section-intro h2 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(2rem, 4vw, 2.75rem);
        color: var(--text-dark);
        margin-bottom: 20px;
        font-weight: 700;
        letter-spacing: -1px;
    }

    .section-intro p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--text-medium);
    }

    /* Two Column Layout */
    .two-column {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }

    .column-content h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.8rem;
        color: var(--primary-blue);
        margin-bottom: 20px;
        font-weight: 700;
    }

    .column-content p {
        font-size: 1.05rem;
        line-height: 1.8;
        color: var(--text-medium);
        margin-bottom: 16px;
    }

    .column-image {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(30, 64, 175, 0.15);
    }

    .column-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .placeholder-image {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 4rem;
    }

    /* Mission & Vision Cards */
    .mv-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 32px;
        margin-top: 60px;
    }

    .mv-card {
        background: white;
        padding: 48px 40px;
        border-radius: 16px;
        border: 2px solid var(--border-light);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .mv-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(90deg, var(--primary-blue), var(--accent-yellow));
    }

    .mv-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(30, 64, 175, 0.15);
        border-color: var(--primary-blue);
    }

    .mv-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 24px;
        font-size: 36px;
        color: white;
        box-shadow: 0 8px 20px rgba(30, 64, 175, 0.25);
    }

    .mv-card h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.8rem;
        color: var(--text-dark);
        margin-bottom: 16px;
        font-weight: 700;
    }

    .mv-card p {
        font-size: 1.05rem;
        line-height: 1.8;
        color: var(--text-medium);
    }

    /* Values Grid */
    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 28px;
        margin-top: 60px;
    }

    .value-item {
        background: white;
        padding: 40px 32px;
        border-radius: var(--border-radius);
        border: 1px solid var(--border-light);
        transition: all 0.3s ease;
        text-align: center;
    }

    .value-item:hover {
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
        margin: 0 auto 20px;
        font-size: 32px;
        color: white;
        box-shadow: 0 8px 16px rgba(30, 64, 175, 0.2);
    }

    .value-item h4 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.3rem;
        color: var(--text-dark);
        margin-bottom: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .value-item p {
        font-size: 0.95rem;
        line-height: 1.7;
        color: var(--text-medium);
    }

    /* Process Section */
    .process-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 32px;
        margin-top: 60px;
    }

    .process-step {
        position: relative;
        text-align: center;
    }

    .process-number {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--bright-yellow) 0%, var(--accent-yellow) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        font-family: 'Space Grotesk', sans-serif;
        font-size: 24px;
        font-weight: 700;
        color: var(--text-dark);
        box-shadow: 0 4px 12px rgba(252, 211, 77, 0.4);
    }

    .process-step h4 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.2rem;
        color: var(--text-dark);
        margin-bottom: 12px;
        font-weight: 700;
    }

    .process-step p {
        font-size: 0.95rem;
        line-height: 1.6;
        color: var(--text-medium);
    }

    /* CTA Section */
    .cta-banner {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        padding: 80px 48px;
        border-radius: 20px;
        text-align: center;
        color: white;
        margin-top: 100px;
        position: relative;
        overflow: hidden;
    }

    .cta-banner::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(252, 211, 77, 0.2) 0%, transparent 70%);
        border-radius: 50%;
    }

    .cta-banner-content {
        position: relative;
        z-index: 1;
        max-width: 700px;
        margin: 0 auto;
    }

    .cta-banner h2 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(2rem, 4vw, 2.8rem);
        margin-bottom: 20px;
        font-weight: 700;
        letter-spacing: -1px;
    }

    .cta-banner p {
        font-size: 1.15rem;
        margin-bottom: 32px;
        opacity: 0.95;
        line-height: 1.7;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header {
            padding: 60px 16px 80px;
            margin: 0 -16px 60px;
        }

        .two-column {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .mv-grid,
        .values-grid,
        .process-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .cta-banner {
            padding: 60px 24px;
            margin-top: 80px;
        }
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="page-header-content">
        <h1>About TrustProp Aluminium</h1>
        <p>Building Trust. Framing Perfection. Delivering Excellence.</p>
    </div>
</div>

<div class="container">
    <!-- Introduction -->
    <div class="section-intro" data-animate>
        <h2>Who We Are</h2>
        <p>
            TrustProp Aluminium is a leading Zimbabwean provider of aluminium and glass solutions, 
            offering design, supply, and expert installation for residential, commercial, and industrial projects. 
            We combine modern technology, high-quality imported systems, and skilled local expertise to deliver 
            solutions that meet the demands of contemporary architecture and environmental efficiency.
        </p>
    </div>

    <!-- About Content -->
    <div class="two-column about-section" data-animate>
        <div class="column-content">
            <h3>Excellence in Every Detail</h3>
            <p>
                Our focus is on precision, durability, and aesthetics, creating spaces that are functional, 
                visually striking, and energy-efficient. From luxury estates and corporate offices to hospitality 
                venues and industrial facilities, TrustProp Aluminium helps architects, developers, and contractors 
                turn visions into reality with professionalism and craftsmanship.
            </p>
            <p>
                We provide end-to-end solutions tailored to each client's needs, ensuring every project receives 
                the attention and expertise it deserves.
            </p>
        </div>
        <div class="column-image">
            <div class="placeholder-image">
                <img src="{{ asset('slider/image2.jpg') }}" alt="Slider Image" style="width:100%; height:auto; object-fit:cover;">
            </div>
        </div>
        
    </div>

    <!-- Mission & Vision -->
    <div class="about-section" data-animate>
        <div class="section-intro">
            <h2>Our Mission & Vision</h2>
        </div>
        
        <div class="mv-grid">
            <div class="mv-card">
                <div class="mv-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <h3>Vision</h3>
                <p>
                    To be Zimbabwe's most trusted partner for aluminium and glass solutions, recognized for 
                    reliability, innovation, and architectural excellence.
                </p>
            </div>

            <div class="mv-card">
                <div class="mv-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3>Mission</h3>
                <p>
                    To deliver elegant, high-quality, and technically superior aluminium and glass solutions 
                    that enhance modern architecture while exceeding client expectations.
                </p>
            </div>
        </div>
    </div>

    <!-- Core Values -->
    <div class="about-section" data-animate>
        <div class="section-intro">
            <h2>Our Core Values</h2>
            <p>The principles that define us and guide every decision we make</p>
        </div>

        <div class="values-grid">
            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h4>Professionalism</h4>
                <p>Ethical, transparent, and reliable in every project</p>
            </div>

            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4>Reliability</h4>
                <p>Every installation is engineered for lasting strength and perfection</p>
            </div>

            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h4>Innovation</h4>
                <p>Continuously adopting modern trends and techniques</p>
            </div>

            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <h4>Sustainability</h4>
                <p>Promoting eco-conscious practices and materials</p>
            </div>
        </div>
    </div>

    <!-- Our Process -->
    <div class="about-section" data-animate>
        <div class="section-intro">
            <h2>How We Work</h2>
            <p>End-to-end solutions tailored to each client's needs</p>
        </div>

        <div class="process-grid">
            <div class="process-step">
                <div class="process-number">1</div>
                <h4>Design & Consultation</h4>
                <p>Expert guidance from concept to detailed specifications</p>
            </div>

            <div class="process-step">
                <div class="process-number">2</div>
                <h4>Supply & Sourcing</h4>
                <p>High-quality imported systems and premium materials</p>
            </div>

            <div class="process-step">
                <div class="process-number">3</div>
                <h4>Installation & Project Management</h4>
                <p>Professional execution with skilled craftsmanship</p>
            </div>

            <div class="process-step">
                <div class="process-number">4</div>
                <h4>After-Sales Support</h4>
                <p>Ongoing support and maintenance services</p>
            </div>
        </div>
    </div>

    <!-- CTA Banner -->
    <div class="cta-banner" data-animate>
        <div class="cta-banner-content">
            <h2>Ready to Start Your Project?</h2>
            <p>
                Let's discuss how we can bring your architectural vision to life with our premium 
                aluminium and glass solutions.
            </p>
            <div class="cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> Get in Touch
                </a>
                <a href="{{ route('services') }}" class="btn btn-outline">
                    <i class="fas fa-tools"></i> View Services
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
