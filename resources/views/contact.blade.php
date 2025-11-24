@extends('layouts.app')

@section('title', 'Contact Us')

@section('metaDescription', 'Get in touch with TrustProp Aluminium for professional aluminium and glass solutions in Zimbabwe. Visit us in Harare or contact us for a free consultation.')

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
        background: radial-gradient(circle at 50% 50%, rgba(252, 211, 77, 0.1) 0%, transparent 60%);
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

    /* Contact Grid */
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 48px;
        margin-bottom: 80px;
    }

    /* Contact Form */
    .contact-form-section {
        background: white;
        padding: 48px;
        border-radius: 16px;
        border: 1px solid var(--border-light);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    .contact-form-section h2 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 2rem;
        color: var(--text-dark);
        margin-bottom: 12px;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .contact-form-section p {
        color: var(--text-medium);
        margin-bottom: 32px;
        line-height: 1.6;
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .form-group label span {
        color: #EF4444;
    }

    .form-control {
        width: 100%;
        padding: 14px 16px;
        border: 1.5px solid var(--border-light);
        border-radius: 10px;
        font-size: 15px;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s ease;
        background: var(--bg-white);
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 140px;
    }

    .form-button {
        width: 100%;
        padding: 16px 32px;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .form-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(30, 64, 175, 0.3);
    }

    .form-button:active {
        transform: translateY(0);
    }

    /* Contact Info */
    .contact-info-section {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .info-card {
        background: white;
        padding: 32px;
        border-radius: 16px;
        border: 1px solid var(--border-light);
        transition: all 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(30, 64, 175, 0.12);
        border-color: var(--primary-blue);
    }

    .info-icon {
        width: 56px;
        height: 56px;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        margin-bottom: 20px;
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.2);
    }

    .info-card h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.3rem;
        color: var(--text-dark);
        margin-bottom: 12px;
        font-weight: 700;
    }

    .info-card p {
        color: var(--text-medium);
        line-height: 1.7;
        margin-bottom: 8px;
    }

    .info-card a {
        color: var(--primary-blue);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .info-card a:hover {
        color: var(--royal-blue);
        text-decoration: underline;
    }

    /* Social Links */
    .social-links-section {
        background: var(--bg-light);
        padding: 32px;
        border-radius: 16px;
        text-align: center;
    }

    .social-links-section h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.3rem;
        color: var(--text-dark);
        margin-bottom: 20px;
        font-weight: 700;
    }

    .social-links-grid {
        display: flex;
        justify-content: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .social-link {
        width: 48px;
        height: 48px;
        background: white;
        border: 1px solid var(--border-light);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-blue);
        font-size: 20px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .social-link:hover {
        background: var(--primary-blue);
        color: white;
        transform: translateY(-4px);
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.2);
    }

    /* Map Section */
    .map-section {
        margin-top: 80px;
        background: var(--bg-light);
        padding: 48px;
        border-radius: 20px;
    }

    .map-section h2 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 2rem;
        color: var(--text-dark);
        text-align: center;
        margin-bottom: 32px;
        font-weight: 700;
    }

    .map-container {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid var(--border-light);
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-medium);
    }

    /* Office Hours */
    .hours-list {
        list-style: none;
    }

    .hours-list li {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid var(--border-light);
        font-size: 0.95rem;
    }

    .hours-list li:last-child {
        border-bottom: none;
    }

    .hours-list .day {
        font-weight: 600;
        color: var(--text-dark);
    }

    .hours-list .time {
        color: var(--text-medium);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .contact-grid {
            grid-template-columns: 1fr;
            gap: 32px;
        }

        .contact-form-section {
            padding: 36px 28px;
        }
    }

    @media (max-width: 768px) {
        .page-header {
            padding: 60px 16px 80px;
            margin: 0 -16px 60px;
        }

        .contact-form-section,
        .map-section {
            padding: 32px 24px;
        }

        .info-card {
            padding: 24px;
        }
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="page-header-content">
        <h1>Get in Touch</h1>
        <p>We'd love to hear from you. Let's discuss your project.</p>
    </div>
</div>

<div class="container">
    <!-- Contact Grid -->
    <div class="contact-grid">
        <!-- Contact Form -->
        <div class="contact-form-section" data-animate>
            <h2>Send Us a Message</h2>
            <p>Fill out the form below and we'll get back to you as soon as possible.</p>

            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="name">Full Name <span>*</span></label>
                    <input type="text" id="name" name="name" class="form-control" required placeholder="John Doe">
                </div>

                <div class="form-group">
                    <label for="email">Email Address <span>*</span></label>
                    <input type="email" id="email" name="email" class="form-control" required placeholder="john@example.com">
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="+263 77 123 4567">
                </div>

                <div class="form-group">
                    <label for="service">Service Interested In</label>
                    <select id="service" name="service" class="form-control">
                        <option value="">Select a service</option>
                        <option value="glass-replacement">Glass Replacement</option>
                        <option value="aluminium-pergolas">Aluminium Pergolas</option>
                        <option value="garage-doors">Garage Doors</option>
                        <option value="windows-doors">Aluminium Windows & Doors</option>
                        <option value="glass-balustrades">Glass Balustrades</option>
                        <option value="stainless-steel-balustrades">Stainless Steel Balustrades</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Message <span>*</span></label>
                    <textarea id="message" name="message" class="form-control" required placeholder="Tell us about your project..."></textarea>
                </div>

                <button type="submit" class="form-button">
                    <i class="fas fa-paper-plane"></i>
                    Send Message
                </button>
            </form>
        </div>

        <!-- Contact Info -->
        <div class="contact-info-section" data-animate>
            <!-- Office Location -->
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3>Our Offices</h3>
                <p><strong>Main Office:</strong><br>
                17B Lomagundi Road<br>
                Mt. Pleasant, Harare<br>
                Zimbabwe</p>
                <p><strong>Plant:</strong><br>
                Pokugara, Harare</p>
            </div>

            <!-- Phone -->
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <h3>Call Us</h3>
                <p>
                    <a href="tel:+263778141191">+263 77 814 1191</a><br>
                    <a href="tel:+263788479546">+263 78 847 9546</a>
                </p>
            </div>

            <!-- Email -->
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Email Us</h3>
                <p>
                    <strong>Sales:</strong><br>
                    <a href="mailto:sales@trustprop.co.zw">sales@trustprop.co.zw</a>
                </p>
                <p>
                    <strong>General Inquiries:</strong><br>
                    <a href="mailto:admin@trustprop.co.zw">admin@trustprop.co.zw</a>
                </p>
            </div>

            <!-- Business Hours -->
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Business Hours</h3>
                <ul class="hours-list">
                    <li>
                        <span class="day">Monday - Friday</span>
                        <span class="time">8:00 AM - 5:00 PM</span>
                    </li>
                    <li>
                        <span class="day">Saturday</span>
                        <span class="time">8:00 AM - 1:00 PM</span>
                    </li>
                    <li>
                        <span class="day">Sunday</span>
                        <span class="time">Closed</span>
                    </li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="social-links-section">
                <h3>Connect With Us</h3>
                <div class="social-links-grid">
                    <a href="https://facebook.com/truspropzw" class="social-link" target="_blank" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://instagram.com/truspropzw" class="social-link" target="_blank" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.trustprop.co.zw" class="social-link" target="_blank" aria-label="Website">
                        <i class="fas fa-globe"></i>
                    </a>
                    <a href="https://wa.me/263778141191" class="social-link" target="_blank" aria-label="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-section" data-animate>
        <h2>Find Us on the Map</h2>
        <div class="map-container">
            <div style="text-align: center;">
                <i class="fas fa-map-marked-alt" style="font-size: 64px; color: var(--primary-blue); margin-bottom: 16px;"></i>
                <p style="font-size: 1.1rem;"><strong>17B Lomagundi Road, Mt. Pleasant, Harare</strong></p>
                <p style="color: var(--text-light); margin-top: 8px;">Interactive map will be integrated here</p>
            </div>
        </div>
    </div>
</div>
@endsection
