<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Miko R. Vargas — Full-Stack System Developer</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,400;0,500;1,400&family=Syne:wght@400;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet" />
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ['Syne', 'sans-serif'],
            body: ['DM Sans', 'sans-serif'],
            mono: ['DM Mono', 'monospace'],
          },
          colors: {
            bg: '#0a0a0f',
            surface: '#111118',
            card: '#16161f',
            border: '#1e1e2e',
            accent: '#6ee7b7',
            'accent-dim': '#34d399',
            muted: '#4b5563',
            subtle: '#9ca3af',
            text: '#e5e7eb',
            bright: '#f9fafb',
          },
          animation: {
            'float': 'float 6s ease-in-out infinite',
            'pulse-slow': 'pulse 4s ease-in-out infinite',
            'scan': 'scan 3s linear infinite',
          },
          keyframes: {
            float: {
              '0%, 100%': { transform: 'translateY(0px)' },
              '50%': { transform: 'translateY(-12px)' },
            },
            scan: {
              '0%': { transform: 'translateY(-100%)' },
              '100%': { transform: 'translateY(100vh)' },
            }
          },
          boxShadow: {
            'glow': '0 0 40px rgba(110, 231, 183, 0.08)',
            'glow-md': '0 0 60px rgba(110, 231, 183, 0.12)',
            'card': '0 4px 24px rgba(0,0,0,0.4)',
            'card-hover': '0 8px 48px rgba(0,0,0,0.6)',
          }
        }
      }
    }
  </script>
  <style>
    * { box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
      background-color: #0a0a0f;
      color: #e5e7eb;
      font-family: 'DM Sans', sans-serif;
      overflow-x: hidden;
    }

    /* Grid noise overlay */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image:
        linear-gradient(rgba(110,231,183,0.015) 1px, transparent 1px),
        linear-gradient(90deg, rgba(110,231,183,0.015) 1px, transparent 1px);
      background-size: 60px 60px;
      pointer-events: none;
      z-index: 0;
    }

    /* Ambient glow orbs */
    .orb {
      position: fixed;
      border-radius: 50%;
      filter: blur(120px);
      pointer-events: none;
      z-index: 0;
    }
    .orb-1 {
      width: 600px; height: 600px;
      background: radial-gradient(circle, rgba(110,231,183,0.06) 0%, transparent 70%);
      top: -200px; right: -200px;
    }
    .orb-2 {
      width: 500px; height: 500px;
      background: radial-gradient(circle, rgba(99,102,241,0.05) 0%, transparent 70%);
      bottom: 20%; left: -200px;
    }
    .orb-3 {
      width: 400px; height: 400px;
      background: radial-gradient(circle, rgba(110,231,183,0.04) 0%, transparent 70%);
      bottom: -100px; right: 20%;
    }

    /* Scroll-trigger animations */
    .reveal {
      opacity: 0;
      transform: translateY(32px);
      transition: opacity 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94),
                  transform 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .reveal.visible { opacity: 1; transform: translateY(0); }
    .reveal-delay-1 { transition-delay: 0.1s; }
    .reveal-delay-2 { transition-delay: 0.2s; }
    .reveal-delay-3 { transition-delay: 0.3s; }
    .reveal-delay-4 { transition-delay: 0.4s; }
    .reveal-left {
      opacity: 0;
      transform: translateX(-32px);
      transition: opacity 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94),
                  transform 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .reveal-left.visible { opacity: 1; transform: translateX(0); }

    /* Navbar */
    #navbar {
      transition: background 0.4s ease, backdrop-filter 0.4s ease, border-color 0.4s ease;
    }
    #navbar.scrolled {
      background: rgba(10, 10, 15, 0.92);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid rgba(110, 231, 183, 0.08);
    }
    .nav-link {
      position: relative;
      color: #9ca3af;
      font-family: 'DM Mono', monospace;
      font-size: 0.8rem;
      letter-spacing: 0.05em;
      transition: color 0.3s ease;
    }
    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -4px; left: 0;
      width: 0; height: 1px;
      background: #6ee7b7;
      transition: width 0.3s ease;
    }
    .nav-link:hover { color: #6ee7b7; }
    .nav-link:hover::after { width: 100%; }
    .nav-link.active { color: #6ee7b7; }
    .nav-link.active::after { width: 100%; }

    /* Hero terminal blink */
    .cursor-blink {
      display: inline-block;
      width: 3px;
      height: 1.2em;
      background: #6ee7b7;
      margin-left: 2px;
      vertical-align: middle;
      animation: blink 1s step-end infinite;
    }
    @keyframes blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0; }
    }

    /* Skill tags */
    .skill-tag {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 6px 14px;
      border: 1px solid rgba(110, 231, 183, 0.15);
      border-radius: 4px;
      font-family: 'DM Mono', monospace;
      font-size: 0.78rem;
      color: #9ca3af;
      background: rgba(110, 231, 183, 0.03);
      transition: all 0.3s ease;
      cursor: default;
    }
    .skill-tag:hover {
      border-color: rgba(110, 231, 183, 0.5);
      color: #6ee7b7;
      background: rgba(110, 231, 183, 0.06);
      transform: translateY(-2px);
    }
    .skill-tag::before {
      content: '';
      width: 6px; height: 6px;
      border-radius: 50%;
      background: #6ee7b7;
      opacity: 0.5;
    }

    /* Project card */
    .project-card {
      background: #16161f;
      border: 1px solid #1e1e2e;
      border-radius: 12px;
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      position: relative;
      overflow: hidden;
    }
    .project-card::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(110,231,183,0.03) 0%, transparent 60%);
      opacity: 0;
      transition: opacity 0.4s ease;
    }
    .project-card:hover {
      border-color: rgba(110, 231, 183, 0.25);
      transform: translateY(-6px);
      box-shadow: 0 20px 60px rgba(0,0,0,0.5), 0 0 40px rgba(110,231,183,0.06);
    }
    .project-card:hover::before { opacity: 1; }

    /* Feature pills */
    .feature-pill {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 5px 12px;
      border-radius: 100px;
      background: rgba(110, 231, 183, 0.06);
      border: 1px solid rgba(110, 231, 183, 0.12);
      font-size: 0.75rem;
      font-family: 'DM Mono', monospace;
      color: #6ee7b7;
    }

    /* Screenshot placeholder */
    .screenshot-placeholder {
      background: #111118;
      border: 1px solid #1e1e2e;
      border-radius: 8px;
      aspect-ratio: 16/9;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 12px;
      transition: border-color 0.3s ease;
      cursor: pointer;
    }
    .screenshot-placeholder:hover { border-color: rgba(110, 231, 183, 0.3); }

    /* Contact input */
    .contact-input {
      background: #16161f;
      border: 1px solid #1e1e2e;
      border-radius: 8px;
      padding: 12px 16px;
      color: #e5e7eb;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.9rem;
      width: 100%;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
      outline: none;
    }
    .contact-input:focus {
      border-color: rgba(110, 231, 183, 0.4);
      box-shadow: 0 0 0 3px rgba(110, 231, 183, 0.06);
    }
    .contact-input::placeholder { color: #4b5563; }

    /* CTA Button */
    .btn-primary {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 14px 32px;
      background: #6ee7b7;
      color: #0a0a0f;
      font-family: 'DM Mono', monospace;
      font-size: 0.85rem;
      font-weight: 500;
      letter-spacing: 0.05em;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .btn-primary:hover {
      background: #34d399;
      transform: translateY(-2px) scale(1.02);
      box-shadow: 0 8px 32px rgba(110, 231, 183, 0.25);
    }
    .btn-primary:active { transform: scale(0.98); }

    .btn-outline {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 13px 30px;
      background: transparent;
      color: #6ee7b7;
      font-family: 'DM Mono', monospace;
      font-size: 0.85rem;
      letter-spacing: 0.05em;
      border: 1px solid rgba(110, 231, 183, 0.35);
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .btn-outline:hover {
      background: rgba(110, 231, 183, 0.06);
      border-color: rgba(110, 231, 183, 0.7);
      transform: translateY(-2px);
    }

    /* Section label */
    .section-label {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      font-family: 'DM Mono', monospace;
      font-size: 0.75rem;
      color: #6ee7b7;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      margin-bottom: 16px;
    }
    .section-label::before {
      content: '';
      width: 24px; height: 1px;
      background: #6ee7b7;
    }

    /* Timeline connector */
    .timeline-dot {
      width: 10px; height: 10px;
      border-radius: 50%;
      background: #6ee7b7;
      box-shadow: 0 0 12px rgba(110, 231, 183, 0.5);
      flex-shrink: 0;
      margin-top: 5px;
    }

    /* Gradient text */
    .text-gradient {
      background: linear-gradient(135deg, #6ee7b7 0%, #34d399 40%, #a7f3d0 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* Mobile menu */
    #mobile-menu {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(10, 10, 15, 0.97);
      z-index: 998;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 32px;
    }
    #mobile-menu.open { display: flex; }
    .mobile-nav-link {
      font-family: 'Syne', sans-serif;
      font-size: 2rem;
      font-weight: 700;
      color: #4b5563;
      transition: color 0.3s ease;
    }
    .mobile-nav-link:hover { color: #6ee7b7; }

    /* Scrollbar */
    ::-webkit-scrollbar { width: 4px; }
    ::-webkit-scrollbar-track { background: #0a0a0f; }
    ::-webkit-scrollbar-thumb { background: #1e1e2e; border-radius: 2px; }
    ::-webkit-scrollbar-thumb:hover { background: rgba(110, 231, 183, 0.2); }

    /* Section divider */
    .divider {
      width: 100%;
      height: 1px;
      background: linear-gradient(90deg, transparent, #1e1e2e 30%, #1e1e2e 70%, transparent);
    }

    /* Code accent */
    .code-accent {
      font-family: 'DM Mono', monospace;
      font-size: 0.8rem;
      color: #6ee7b7;
      opacity: 0.6;
    }

    /* Challenge badge */
    .challenge-badge {
      background: rgba(251, 191, 36, 0.06);
      border: 1px solid rgba(251, 191, 36, 0.15);
      border-radius: 6px;
      padding: 12px 16px;
    }

    /* Glow line */
    .glow-line {
      width: 80px; height: 2px;
      background: linear-gradient(90deg, #6ee7b7, transparent);
      margin-bottom: 24px;
    }
  </style>
</head>
<body>
  <!-- Ambient orbs -->
  <div class="orb orb-1"></div>
  <div class="orb orb-2"></div>
  <div class="orb orb-3"></div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" role="dialog" aria-modal="true" aria-label="Mobile navigation">
    <button id="mobile-close" class="absolute top-6 right-6 text-subtle hover:text-accent transition-colors" aria-label="Close menu">
      <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg>
    </button>
    <a href="#hero" class="mobile-nav-link" data-mobile-link>Home</a>
    <a href="#about" class="mobile-nav-link" data-mobile-link>About</a>
    <a href="#skills" class="mobile-nav-link" data-mobile-link>Skills</a>
    <a href="#projects" class="mobile-nav-link" data-mobile-link>Projects</a>
    <a href="#contact" class="mobile-nav-link" data-mobile-link>Contact</a>
  </div>

  <!-- Navbar -->
  <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 px-6 md:px-12 py-5">
    <div class="max-w-6xl mx-auto flex items-center justify-between">
      <!-- Logo -->
      <a href="#hero" class="font-mono text-sm text-accent font-medium tracking-widest hover:opacity-80 transition-opacity" style="font-family:'DM Mono',monospace;">
        MRV<span class="text-muted">_dev</span>
      </a>

      <!-- Desktop nav -->
      <div class="hidden md:flex items-center gap-8">
        <a href="#about" class="nav-link" data-nav>about</a>
        <a href="#skills" class="nav-link" data-nav>skills</a>
        <a href="#projects" class="nav-link" data-nav>projects</a>
        <a href="#contact" class="nav-link">
          <span class="btn-primary" style="padding: 8px 20px; font-size: 0.78rem;">contact →</span>
        </a>
      </div>

      <!-- Mobile hamburger -->
      <button id="mobile-open" class="md:hidden text-subtle hover:text-accent transition-colors" aria-label="Open menu">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
      </button>
    </div>
  </nav>

  <!-- ===== HERO ===== -->
  <section id="hero" class="relative min-h-screen flex items-center justify-center px-6 md:px-12 pt-24">
    <div class="relative z-10 max-w-6xl mx-auto w-full">
      <div class="grid md:grid-cols-5 gap-12 items-center">

        <!-- Left: text -->
        <div class="md:col-span-3">
          <div class="reveal" style="margin-bottom:20px;">
            <span class="code-accent">// hello, world</span>
          </div>

          <div class="reveal reveal-delay-1">
            <h1 class="font-display text-5xl md:text-7xl font-extrabold leading-none mb-6" style="font-family:'Syne',sans-serif; letter-spacing:-0.02em;">
              <span class="text-gradient">Miko R.</span><br/>
              <span style="color:#f9fafb;">Vargas</span>
            </h1>
          </div>

          <div class="reveal reveal-delay-2 mb-6">
            <div class="flex items-center gap-3 font-mono text-sm text-subtle" style="font-family:'DM Mono',monospace;">
              <span class="text-accent">›</span>
              <span>Full-Stack System Developer</span>
              <span class="text-border">|</span>
              <span>Network Administration</span>
              <span class="cursor-blink"></span>
            </div>
          </div>

          <div class="reveal reveal-delay-3 mb-10">
            <p class="text-subtle leading-relaxed max-w-xl" style="font-size:1rem; line-height:1.8;">
              Building scalable, production-ready systems from database schema to server deployment.
              Former Team Lead on enterprise-level e-procurement infrastructure with LDAP integration
              and document workflow automation.
            </p>
          </div>

          <div class="reveal reveal-delay-4 flex flex-wrap gap-4">
            <a href="#projects" class="btn-primary">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 3l14 9-14 9V3z"/></svg>
              View Projects
            </a>
            <a href="#contact" class="btn-outline">Get in Touch</a>
          </div>

          <!-- Quick stats -->
          <div class="reveal reveal-delay-4 mt-12 flex flex-wrap gap-8">
            <div>
              <div class="font-display text-3xl font-bold text-bright" style="font-family:'Syne',sans-serif;">LAMP</div>
              <div class="text-xs text-muted font-mono" style="font-family:'DM Mono',monospace;">Stack expertise</div>
            </div>
            <div class="w-px bg-border"></div>
            <div>
              <div class="font-display text-3xl font-bold text-bright" style="font-family:'Syne',sans-serif;">LDAP</div>
              <div class="text-xs text-muted font-mono" style="font-family:'DM Mono',monospace;">Auth integration</div>
            </div>
            <div class="w-px bg-border"></div>
            <div>
              <div class="font-display text-3xl font-bold text-bright" style="font-family:'Syne',sans-serif;">Lead</div>
              <div class="text-xs text-muted font-mono" style="font-family:'DM Mono',monospace;">Team role</div>
            </div>
          </div>
        </div>

        <!-- Right: terminal card -->
        <div class="md:col-span-2 reveal reveal-delay-2" style="animation: float 6s ease-in-out infinite; animation-delay: 0.5s;">
          <div class="project-card p-0 overflow-hidden" style="animation: float 6s ease-in-out infinite;">
            <!-- Terminal bar -->
            <div class="flex items-center gap-2 px-4 py-3" style="background:#0d0d15; border-bottom:1px solid #1e1e2e;">
              <div class="w-3 h-3 rounded-full" style="background:#ff5f57;"></div>
              <div class="w-3 h-3 rounded-full" style="background:#ffbd2e;"></div>
              <div class="w-3 h-3 rounded-full" style="background:#28c840;"></div>
              <span class="ml-4 font-mono text-xs text-muted" style="font-family:'DM Mono',monospace;">~/miko — bash</span>
            </div>
            <!-- Terminal body -->
            <div class="p-6 font-mono text-sm space-y-2" style="font-family:'DM Mono',monospace; min-height:280px;">
              <div><span class="text-accent">~</span> <span class="text-text">whoami</span></div>
              <div class="text-subtle pl-2">Miko R. Vargas</div>
              <div class="mt-3"><span class="text-accent">~</span> <span class="text-text">cat role.txt</span></div>
              <div class="text-subtle pl-2">Full-Stack Developer<br/>Network Admin Background<br/>Team Lead @ ICT Unit</div>
              <div class="mt-3"><span class="text-accent">~</span> <span class="text-text">ls skills/</span></div>
              <div class="pl-2" style="color:#a78bfa;">PHP&nbsp;&nbsp;&nbsp;MySQL&nbsp;&nbsp;Python</div>
              <div class="pl-2" style="color:#a78bfa;">Nginx&nbsp;SSH&nbsp;&nbsp;&nbsp;Linux</div>
              <div class="pl-2" style="color:#a78bfa;">HTML&nbsp;&nbsp;LDAP&nbsp;&nbsp;LAMP</div>
              <div class="mt-3"><span class="text-accent">~</span> <span class="text-text">uptime</span></div>
              <div class="text-subtle pl-2">Passionate. Available. Ready.</div>
              <div class="mt-3 flex items-center gap-1">
                <span class="text-accent">~</span>
                <span class="text-text"> _</span>
                <span class="cursor-blink"></span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-40">
      <span class="font-mono text-xs text-muted" style="font-family:'DM Mono',monospace; font-size:0.7rem; letter-spacing:0.1em;">scroll</span>
      <div class="w-px h-8 bg-gradient-to-b from-muted to-transparent"></div>
    </div>
  </section>

  <div class="divider"></div>

  <!-- ===== ABOUT ===== -->
  <section id="about" class="relative z-10 py-28 px-6 md:px-12">
    <div class="max-w-6xl mx-auto">

      <div class="section-label reveal">About</div>
      <div class="glow-line reveal"></div>

      <div class="grid md:grid-cols-2 gap-16 items-start">
        <!-- Left: bio -->
        <div>
          <h2 class="font-display text-4xl md:text-5xl font-bold text-bright mb-6 reveal" style="font-family:'Syne',sans-serif; line-height:1.1;">
            Developer by design,<br/>
            <span class="text-gradient">problem-solver</span><br/>
            by nature.
          </h2>
          <div class="space-y-4 text-subtle leading-relaxed reveal reveal-delay-1" style="font-size:0.95rem; line-height:1.85;">
            <p>
              I'm a full-stack system developer with a strong foundation in network administration.
              My work focuses on building internal tools and enterprise systems that actually solve real-world
              operational problems — not just prototypes, but production systems people depend on.
            </p>
            <p>
              During my internship at the <span class="text-text">ICT Unit of the City Schools Division Office
              of Dasmariñas</span>, I was appointed as Team Lead for a cross-functional system development project,
              working under the guidance of <span class="text-text">Carlou Adao, LPT, MPA</span>.
            </p>
            <p>
              I take ownership from database schema design all the way through server deployment —
              comfortable with the full LAMP/LEMP stack, SSH access, and everything in between.
            </p>
          </div>
        </div>

        <!-- Right: experience card -->
        <div class="space-y-5 reveal reveal-delay-2">
          <!-- Experience item -->
          <div class="project-card p-6">
            <div class="flex gap-4">
              <div class="timeline-dot mt-1"></div>
              <div>
                <div class="font-mono text-xs text-accent mb-1" style="font-family:'DM Mono',monospace;">Internship · ICT Unit</div>
                <div class="font-display text-lg font-semibold text-bright mb-1" style="font-family:'Syne',sans-serif;">City Schools Division Office</div>
                <div class="text-sm text-subtle mb-3">Dasmariñas, Cavite</div>
                <ul class="space-y-2 text-sm text-subtle">
                  <li class="flex gap-2"><span class="text-accent mt-0.5">›</span> Appointed as Team Lead for system development projects</li>
                  <li class="flex gap-2"><span class="text-accent mt-0.5">›</span> Supervised by Carlou Adao, LPT, MPA</li>
                  <li class="flex gap-2"><span class="text-accent mt-0.5">›</span> Developed full-stack e-procurement solution</li>
                  <li class="flex gap-2"><span class="text-accent mt-0.5">›</span> Led team through architecture decisions and deployment</li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Value props -->
          <div class="grid grid-cols-2 gap-4">
            <div class="project-card p-5 text-center">
              <div class="text-accent mb-2">
                <svg class="mx-auto" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
              </div>
              <div class="font-display text-sm font-semibold text-text mb-1" style="font-family:'Syne',sans-serif;">Full-Stack</div>
              <div class="text-xs text-muted">Front-to-back ownership</div>
            </div>
            <div class="project-card p-5 text-center">
              <div class="text-accent mb-2">
                <svg class="mx-auto" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
              </div>
              <div class="font-display text-sm font-semibold text-text mb-1" style="font-family:'Syne',sans-serif;">LAMP Stack</div>
              <div class="text-xs text-muted">Production ready</div>
            </div>
            <div class="project-card p-5 text-center">
              <div class="text-accent mb-2">
                <svg class="mx-auto" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>
              </div>
              <div class="font-display text-sm font-semibold text-text mb-1" style="font-family:'Syne',sans-serif;">Team Lead</div>
              <div class="text-xs text-muted">Leadership experience</div>
            </div>
            <div class="project-card p-5 text-center">
              <div class="text-accent mb-2">
                <svg class="mx-auto" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>
              </div>
              <div class="font-display text-sm font-semibold text-text mb-1" style="font-family:'Syne',sans-serif;">Net Admin</div>
              <div class="text-xs text-muted">SSH & server ops</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="divider"></div>

  <!-- ===== SKILLS ===== -->
  <section id="skills" class="relative z-10 py-28 px-6 md:px-12">
    <div class="max-w-6xl mx-auto">

      <div class="section-label reveal">Technical Skills</div>
      <div class="glow-line reveal"></div>

      <h2 class="font-display text-4xl md:text-5xl font-bold text-bright mb-4 reveal" style="font-family:'Syne',sans-serif; line-height:1.1;">
        Tools I build with.
      </h2>
      <p class="text-subtle mb-14 reveal reveal-delay-1 max-w-xl" style="font-size:0.95rem; line-height:1.8;">
        A focused, battle-tested toolkit — each technology chosen for real projects,
        not resume padding.
      </p>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Backend -->
        <div class="project-card p-6 reveal">
          <div class="flex items-center gap-3 mb-5">
            <div class="w-8 h-8 rounded-md flex items-center justify-center" style="background:rgba(110,231,183,0.1);">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2"><path d="M3 12h18M3 6l9-3 9 3M3 18l9 3 9-3"/></svg>
            </div>
            <h3 class="font-display text-base font-semibold text-text" style="font-family:'Syne',sans-serif;">Backend</h3>
          </div>
          <div class="flex flex-wrap gap-2">
            <span class="skill-tag">PHP (Vanilla)</span>
            <span class="skill-tag">Python</span>
            <span class="skill-tag">LAMP Stack</span>
            <span class="skill-tag">LEMP Stack</span>
            <span class="skill-tag">REST API</span>
            <span class="skill-tag">LDAP Integration</span>
          </div>
        </div>

        <!-- Database -->
        <div class="project-card p-6 reveal reveal-delay-1">
          <div class="flex items-center gap-3 mb-5">
            <div class="w-8 h-8 rounded-md flex items-center justify-center" style="background:rgba(110,231,183,0.1);">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
            </div>
            <h3 class="font-display text-base font-semibold text-text" style="font-family:'Syne',sans-serif;">Database</h3>
          </div>
          <div class="flex flex-wrap gap-2">
            <span class="skill-tag">MySQL</span>
            <span class="skill-tag">MySQL Workbench</span>
            <span class="skill-tag">Schema Design</span>
            <span class="skill-tag">Query Optimization</span>
            <span class="skill-tag">Relational Modeling</span>
          </div>
        </div>

        <!-- Frontend -->
        <div class="project-card p-6 reveal reveal-delay-2">
          <div class="flex items-center gap-3 mb-5">
            <div class="w-8 h-8 rounded-md flex items-center justify-center" style="background:rgba(110,231,183,0.1);">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            </div>
            <h3 class="font-display text-base font-semibold text-text" style="font-family:'Syne',sans-serif;">Frontend</h3>
          </div>
          <div class="flex flex-wrap gap-2">
            <span class="skill-tag">HTML5</span>
            <span class="skill-tag">CSS3</span>
            <span class="skill-tag">JavaScript</span>
            <span class="skill-tag">Bootstrap</span>
            <span class="skill-tag">Responsive Design</span>
          </div>
        </div>

        <!-- Server & DevOps -->
        <div class="project-card p-6 reveal reveal-delay-1">
          <div class="flex items-center gap-3 mb-5">
            <div class="w-8 h-8 rounded-md flex items-center justify-center" style="background:rgba(110,231,183,0.1);">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"/><rect x="2" y="14" width="20" height="8" rx="2" ry="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>
            </div>
            <h3 class="font-display text-base font-semibold text-text" style="font-family:'Syne',sans-serif;">Server & DevOps</h3>
          </div>
          <div class="flex flex-wrap gap-2">
            <span class="skill-tag">Nginx</span>
            <span class="skill-tag">Apache</span>
            <span class="skill-tag">SSH</span>
            <span class="skill-tag">Linux</span>
            <span class="skill-tag">Server Deployment</span>
            <span class="skill-tag">System Admin</span>
          </div>
        </div>

        <!-- Tools & Libraries -->
        <div class="project-card p-6 reveal reveal-delay-2">
          <div class="flex items-center gap-3 mb-5">
            <div class="w-8 h-8 rounded-md flex items-center justify-center" style="background:rgba(110,231,183,0.1);">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
            </div>
            <h3 class="font-display text-base font-semibold text-text" style="font-family:'Syne',sans-serif;">Libraries & Tools</h3>
          </div>
          <div class="flex flex-wrap gap-2">
            <span class="skill-tag">PhpOffice</span>
            <span class="skill-tag">TemplateProcessor</span>
            <span class="skill-tag">Git</span>
            <span class="skill-tag">MySQL Workbench</span>
            <span class="skill-tag">Postman</span>
          </div>
        </div>

        <!-- Concepts -->
        <div class="project-card p-6 reveal reveal-delay-3">
          <div class="flex items-center gap-3 mb-5">
            <div class="w-8 h-8 rounded-md flex items-center justify-center" style="background:rgba(110,231,183,0.1);">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
            </div>
            <h3 class="font-display text-base font-semibold text-text" style="font-family:'Syne',sans-serif;">Concepts</h3>
          </div>
          <div class="flex flex-wrap gap-2">
            <span class="skill-tag">Role-Based Access</span>
            <span class="skill-tag">Workflow Automation</span>
            <span class="skill-tag">Doc Generation</span>
            <span class="skill-tag">Network Admin</span>
            <span class="skill-tag">MVC Pattern</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <div class="divider"></div>

  <!-- ===== PROJECTS ===== -->
  <section id="projects" class="relative z-10 py-28 px-6 md:px-12">
    <div class="max-w-6xl mx-auto">

      <div class="section-label reveal">Projects</div>
      <div class="glow-line reveal"></div>

      <h2 class="font-display text-4xl md:text-5xl font-bold text-bright mb-4 reveal" style="font-family:'Syne',sans-serif; line-height:1.1;">
        What I've shipped.
      </h2>
      <p class="text-subtle mb-14 reveal reveal-delay-1 max-w-xl" style="font-size:0.95rem; line-height:1.8;">
        Real systems, built for real organizations. Not toy projects.
      </p>

      <!-- Main project: E-Procurement -->
      <div class="project-card p-0 overflow-hidden reveal mb-8">
        <!-- Header bar -->
        <div class="px-8 py-5 flex flex-wrap gap-4 items-center justify-between" style="border-bottom:1px solid #1e1e2e; background:rgba(110,231,183,0.02);">
          <div class="flex items-center gap-4">
            <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background:rgba(110,231,183,0.1); border:1px solid rgba(110,231,183,0.2);">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
            </div>
            <div>
              <div class="font-mono text-xs text-accent mb-0.5" style="font-family:'DM Mono',monospace;">Featured Project · 2024</div>
              <h3 class="font-display text-xl font-bold text-bright" style="font-family:'Syne',sans-serif;">E-Procurement System</h3>
            </div>
          </div>
          <div class="flex flex-wrap gap-2">
            <span class="feature-pill">Full-Stack</span>
            <span class="feature-pill">Team Lead</span>
          </div>
        </div>

        <div class="p-8">
          <div class="grid lg:grid-cols-5 gap-10">

            <!-- Left: details -->
            <div class="lg:col-span-3 space-y-8">

              <!-- Description -->
              <div>
                <p class="text-subtle leading-relaxed" style="font-size:0.95rem; line-height:1.85;">
                  A complete internal e-procurement solution developed for the City Schools Division Office of Dasmariñas.
                  The system digitizes and automates the entire procurement workflow — from request submission and LDAP-authenticated
                  access to role-based document routing, status tracking, and automated Word document generation.
                  Built on a vanilla PHP + MySQL stack and deployed on a local Nginx server.
                </p>
              </div>

              <!-- Features -->
              <div>
                <h4 class="font-mono text-xs text-accent mb-4 tracking-widest uppercase" style="font-family:'DM Mono',monospace;">Core Features</h4>
                <div class="grid sm:grid-cols-2 gap-3">
                  <div class="flex gap-3 items-start">
                    <svg class="text-accent mt-0.5 flex-shrink-0" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    <div>
                      <div class="text-sm text-text font-medium">LDAP Authentication</div>
                      <div class="text-xs text-muted mt-0.5">Integrated with existing directory services</div>
                    </div>
                  </div>
                  <div class="flex gap-3 items-start">
                    <svg class="text-accent mt-0.5 flex-shrink-0" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    <div>
                      <div class="text-sm text-text font-medium">Role-Based Access Control</div>
                      <div class="text-xs text-muted mt-0.5">Granular permission system per role</div>
                    </div>
                  </div>
                  <div class="flex gap-3 items-start">
                    <svg class="text-accent mt-0.5 flex-shrink-0" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    <div>
                      <div class="text-sm text-text font-medium">Document Tracking</div>
                      <div class="text-xs text-muted mt-0.5">Status-based workflow progression</div>
                    </div>
                  </div>
                  <div class="flex gap-3 items-start">
                    <svg class="text-accent mt-0.5 flex-shrink-0" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    <div>
                      <div class="text-sm text-text font-medium">Workflow Automation</div>
                      <div class="text-xs text-muted mt-0.5">Automated procurement process routing</div>
                    </div>
                  </div>
                  <div class="flex gap-3 items-start">
                    <svg class="text-accent mt-0.5 flex-shrink-0" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    <div>
                      <div class="text-sm text-text font-medium">Dynamic Word Generation</div>
                      <div class="text-xs text-muted mt-0.5">PhpOffice TemplateProcessor automation</div>
                    </div>
                  </div>
                  <div class="flex gap-3 items-start">
                    <svg class="text-accent mt-0.5 flex-shrink-0" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    <div>
                      <div class="text-sm text-text font-medium">Office → Unit Hierarchy</div>
                      <div class="text-xs text-muted mt-0.5">Structured org data modeling</div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Responsibilities -->
              <div>
                <h4 class="font-mono text-xs text-accent mb-4 tracking-widest uppercase" style="font-family:'DM Mono',monospace;">My Responsibilities</h4>
                <div class="space-y-2">
                  <div class="flex gap-3 text-sm text-subtle">
                    <span class="text-accent font-mono" style="font-family:'DM Mono',monospace;">01.</span>
                    Designed and implemented the complete database schema from scratch using MySQL Workbench
                  </div>
                  <div class="flex gap-3 text-sm text-subtle">
                    <span class="text-accent font-mono" style="font-family:'DM Mono',monospace;">02.</span>
                    Developed all system logic in vanilla PHP — no frameworks
                  </div>
                  <div class="flex gap-3 text-sm text-subtle">
                    <span class="text-accent font-mono" style="font-family:'DM Mono',monospace;">03.</span>
                    Integrated LDAP authentication with the existing organizational directory
                  </div>
                  <div class="flex gap-3 text-sm text-subtle">
                    <span class="text-accent font-mono" style="font-family:'DM Mono',monospace;">04.</span>
                    Built automated document generation pipeline using PhpOffice TemplateProcessor
                  </div>
                  <div class="flex gap-3 text-sm text-subtle">
                    <span class="text-accent font-mono" style="font-family:'DM Mono',monospace;">05.</span>
                    Led team coordination, code review, and delivery milestones
                  </div>
                </div>
              </div>

              <!-- Challenges -->
              <div>
                <h4 class="font-mono text-xs text-accent mb-4 tracking-widest uppercase" style="font-family:'DM Mono',monospace;">Challenges & Solutions</h4>
                <div class="challenge-badge space-y-3">
                  <div class="flex gap-3">
                    <svg class="flex-shrink-0 mt-0.5" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fbbf24" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                    <div>
                      <div class="text-sm text-text font-medium">PhpOffice TemplateProcessor — First-time implementation</div>
                      <div class="text-xs text-subtle mt-1 leading-relaxed">
                        Had no prior experience with PhpOffice's TemplateProcessor. Navigated underdocumented behavior around
                        placeholder binding, nested data structures, and complex Word document formatting. Solved through
                        systematic testing, reading source code, and iterative placeholder design.
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tech stack badges -->
              <div>
                <h4 class="font-mono text-xs text-accent mb-4 tracking-widest uppercase" style="font-family:'DM Mono',monospace;">Tech Stack</h4>
                <div class="flex flex-wrap gap-2">
                  <span class="feature-pill">PHP</span>
                  <span class="feature-pill">MySQL</span>
                  <span class="feature-pill">Nginx</span>
                  <span class="feature-pill">HTML / CSS</span>
                  <span class="feature-pill">LDAP</span>
                  <span class="feature-pill">PhpOffice</span>
                  <span class="feature-pill">Bootstrap</span>
                  <span class="feature-pill">MySQL Workbench</span>
                </div>
              </div>
            </div>

            <!-- Right: screenshots -->
            <div class="lg:col-span-2 space-y-4">
              <h4 class="font-mono text-xs text-accent mb-4 tracking-widest uppercase" style="font-family:'DM Mono',monospace;">Screenshots</h4>

              <!-- Placeholder 1 -->
              <div class="screenshot-placeholder group">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(110,231,183,0.08); border:1px solid rgba(110,231,183,0.15);">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg>
                </div>
                <span class="text-xs text-muted font-mono" style="font-family:'DM Mono',monospace;">Dashboard Overview</span>
                <span class="text-xs" style="color:#1e1e2e;">[ screenshot placeholder ]</span>
              </div>

              <!-- Placeholder 2 -->
              <div class="screenshot-placeholder group">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(110,231,183,0.08); border:1px solid rgba(110,231,183,0.15);">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="1.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                </div>
                <span class="text-xs text-muted font-mono" style="font-family:'DM Mono',monospace;">Document Tracking View</span>
                <span class="text-xs" style="color:#1e1e2e;">[ screenshot placeholder ]</span>
              </div>

              <!-- Placeholder 3 -->
              <div class="screenshot-placeholder group">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(110,231,183,0.08); border:1px solid rgba(110,231,183,0.15);">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <span class="text-xs text-muted font-mono" style="font-family:'DM Mono',monospace;">Role-Based Access Panel</span>
                <span class="text-xs" style="color:#1e1e2e;">[ screenshot placeholder ]</span>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- More projects note -->
      <div class="text-center reveal">
        <p class="text-muted text-sm font-mono mb-4" style="font-family:'DM Mono',monospace;">// more projects coming soon</p>
      </div>

    </div>
  </section>

  <div class="divider"></div>

  <!-- ===== CONTACT ===== -->
  <section id="contact" class="relative z-10 py-28 px-6 md:px-12">
    <div class="max-w-4xl mx-auto">

      <div class="section-label reveal">Contact</div>
      <div class="glow-line reveal"></div>

      <h2 class="font-display text-4xl md:text-5xl font-bold text-bright mb-4 reveal" style="font-family:'Syne',sans-serif; line-height:1.1;">
        Let's build<br/>
        something <span class="text-gradient">together.</span>
      </h2>
      <p class="text-subtle mb-14 reveal reveal-delay-1 max-w-lg" style="font-size:0.95rem; line-height:1.8;">
        Open to full-time roles, internship extensions, or freelance projects.
        If you need a developer who owns the problem end-to-end — let's talk.
      </p>

      <div class="grid md:grid-cols-5 gap-10">

        <!-- Contact form -->
        <div class="md:col-span-3 reveal">
          <div class="project-card p-8">
            <div class="space-y-5">
              <div class="grid sm:grid-cols-2 gap-5">
                <div>
                  <label class="block text-xs text-muted mb-2 font-mono" style="font-family:'DM Mono',monospace;">Name</label>
                  <input type="text" class="contact-input" placeholder="Your name" />
                </div>
                <div>
                  <label class="block text-xs text-muted mb-2 font-mono" style="font-family:'DM Mono',monospace;">Email</label>
                  <input type="email" class="contact-input" placeholder="you@email.com" />
                </div>
              </div>
              <div>
                <label class="block text-xs text-muted mb-2 font-mono" style="font-family:'DM Mono',monospace;">Subject</label>
                <input type="text" class="contact-input" placeholder="What's this about?" />
              </div>
              <div>
                <label class="block text-xs text-muted mb-2 font-mono" style="font-family:'DM Mono',monospace;">Message</label>
                <textarea class="contact-input" rows="5" placeholder="Tell me about the project or opportunity..." style="resize:vertical;"></textarea>
              </div>
              <button class="btn-primary w-full justify-center" onclick="handleSend(this)">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                Send Message
              </button>
            </div>
          </div>
        </div>

        <!-- Contact info -->
        <div class="md:col-span-2 space-y-5 reveal reveal-delay-2">

          <div class="project-card p-5 group cursor-pointer" onclick="copyToClipboard('mikovargas@email.com', this)">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0" style="background:rgba(110,231,183,0.08); border:1px solid rgba(110,231,183,0.15);">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              </div>
              <div class="min-w-0">
                <div class="text-xs text-muted mb-0.5 font-mono" style="font-family:'DM Mono',monospace;">Email</div>
                <div class="text-sm text-text truncate">mikovargas@email.com</div>
              </div>
              <svg class="ml-auto flex-shrink-0 text-muted group-hover:text-accent transition-colors" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
            </div>
          </div>

          <div class="project-card p-5">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0" style="background:rgba(110,231,183,0.08); border:1px solid rgba(110,231,183,0.15);">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
              </div>
              <div>
                <div class="text-xs text-muted mb-0.5 font-mono" style="font-family:'DM Mono',monospace;">Location</div>
                <div class="text-sm text-text">Dasmariñas, Cavite, PH</div>
              </div>
            </div>
          </div>

          <div class="project-card p-5">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0" style="background:rgba(110,231,183,0.08); border:1px solid rgba(110,231,183,0.15);">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              </div>
              <div>
                <div class="text-xs text-muted mb-0.5 font-mono" style="font-family:'DM Mono',monospace;">Availability</div>
                <div class="text-sm text-text flex items-center gap-2">
                  <span class="w-2 h-2 rounded-full bg-accent inline-block" style="box-shadow:0 0 8px #6ee7b7;"></span>
                  Open to opportunities
                </div>
              </div>
            </div>
          </div>

          <!-- Social links -->
          <div class="pt-2">
            <div class="text-xs text-muted mb-3 font-mono" style="font-family:'DM Mono',monospace;">// find me online</div>
            <div class="flex gap-3">
              <a href="#" class="w-10 h-10 rounded-lg flex items-center justify-center border border-border text-muted hover:border-accent hover:text-accent transition-all duration-300 hover:-translate-y-1" aria-label="GitHub">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
              </a>
              <a href="#" class="w-10 h-10 rounded-lg flex items-center justify-center border border-border text-muted hover:border-accent hover:text-accent transition-all duration-300 hover:-translate-y-1" aria-label="LinkedIn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
              </a>
              <a href="#" class="w-10 h-10 rounded-lg flex items-center justify-center border border-border text-muted hover:border-accent hover:text-accent transition-all duration-300 hover:-translate-y-1" aria-label="Email">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- ===== FOOTER ===== -->
  <footer class="relative z-10 px-6 md:px-12 py-10 border-t border-border">
    <div class="max-w-6xl mx-auto flex flex-wrap items-center justify-between gap-4">
      <div>
        <div class="font-mono text-sm text-accent font-medium mb-1" style="font-family:'DM Mono',monospace;">Miko R. Vargas</div>
        <div class="text-xs text-muted">Full-Stack System Developer · Dasmariñas, PH</div>
      </div>
      <div class="text-xs text-muted font-mono" style="font-family:'DM Mono',monospace;">
        <span class="text-accent">©</span> 2024 · Built with HTML + Tailwind CSS
      </div>
    </div>
  </footer>

  <!-- Toast notification -->
  <div id="toast" class="fixed bottom-6 right-6 z-50 px-5 py-3 rounded-lg text-sm font-mono hidden" style="font-family:'DM Mono',monospace; background:#16161f; border:1px solid rgba(110,231,183,0.3); color:#6ee7b7; backdrop-filter:blur(10px); box-shadow:0 8px 32px rgba(0,0,0,0.4);"></div>

  <script>
    // ========== Navbar scroll behavior ==========
    const navbar = document.getElementById('navbar');
    const navLinks = document.querySelectorAll('[data-nav]');

    window.addEventListener('scroll', () => {
      if (window.scrollY > 40) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
      updateActiveNav();
    }, { passive: true });

    // ========== Active nav highlight ==========
    function updateActiveNav() {
      const sections = ['about', 'skills', 'projects', 'contact'];
      const scrollPos = window.scrollY + 120;

      sections.forEach(id => {
        const section = document.getElementById(id);
        const link = document.querySelector(`[data-nav][href="#${id}"]`);
        if (!section || !link) return;

        const top = section.offsetTop;
        const bottom = top + section.offsetHeight;

        if (scrollPos >= top && scrollPos < bottom) {
          link.classList.add('active');
        } else {
          link.classList.remove('active');
        }
      });
    }

    // ========== Mobile menu ==========
    const mobileMenu = document.getElementById('mobile-menu');
    document.getElementById('mobile-open').addEventListener('click', () => {
      mobileMenu.classList.add('open');
      document.body.style.overflow = 'hidden';
    });

    const closeMenu = () => {
      mobileMenu.classList.remove('open');
      document.body.style.overflow = '';
    };

    document.getElementById('mobile-close').addEventListener('click', closeMenu);
    document.querySelectorAll('[data-mobile-link]').forEach(link => {
      link.addEventListener('click', closeMenu);
    });

    // ========== Scroll-triggered reveals ==========
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.reveal, .reveal-left').forEach(el => {
      observer.observe(el);
    });

    // ========== Copy to clipboard ==========
    function copyToClipboard(text, el) {
      navigator.clipboard.writeText(text).then(() => {
        showToast('Email copied to clipboard!');
      }).catch(() => {
        showToast('Unable to copy — ' + text);
      });
    }

    // ========== Toast ==========
    function showToast(msg) {
      const toast = document.getElementById('toast');
      toast.textContent = msg;
      toast.classList.remove('hidden');
      toast.style.opacity = '1';
      setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => toast.classList.add('hidden'), 300);
      }, 2500);
    }

    // ========== Contact form send ==========
    function handleSend(btn) {
      const orig = btn.innerHTML;
      btn.innerHTML = `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="animate-spin"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg> Sending...`;
      btn.disabled = true;
      setTimeout(() => {
        btn.innerHTML = `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Message Sent!`;
        showToast('Message sent successfully!');
        setTimeout(() => {
          btn.innerHTML = orig;
          btn.disabled = false;
        }, 3000);
      }, 1500);
    }

    // ========== Smooth scroll ==========
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (!target) return;
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    });
  </script>
</body>
</html>