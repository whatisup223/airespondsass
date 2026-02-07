<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ 
          darkMode: localStorage.getItem('darkMode') === 'true',
          rtl: localStorage.getItem('rtl') === 'true',
          toggleDark() { 
              this.darkMode = !this.darkMode; 
              localStorage.setItem('darkMode', this.darkMode); 
              if (this.darkMode) {
                  document.documentElement.classList.add('dark');
              } else {
                  document.documentElement.classList.remove('dark');
              }
          },
          toggleRtl() { 
              this.rtl = !this.rtl; 
              localStorage.setItem('rtl', this.rtl); 
              document.documentElement.dir = this.rtl ? 'rtl' : 'ltr';
          },
          scrollTo(id) {
              const el = document.getElementById(id);
              if (el) el.scrollIntoView({ behavior: 'smooth' });
          }
      }" x-init="
          if (darkMode) document.documentElement.classList.add('dark');
          document.documentElement.dir = rtl ? 'rtl' : 'ltr';
      ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AutoReply Pro - AI Automation for Facebook & Instagram</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=Outfit:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }

        html {
            scroll-behavior: smooth;
        }

        .bg-grid {
            background-image: radial-gradient(circle, #4f46e5 1px, transparent 1px);
            background-size: 40px 40px;
            opacity: 0.1;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }

        .dark .glass-dark {
            background: transparent;
            backdrop-filter: blur(40px);
            -webkit-backdrop-filter: blur(40px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 0 50px -10px rgba(79, 70, 229, 0.4);
        }
    </style>
</head>

<body
    class="antialiased bg-gray-50 dark:bg-slate-900 text-slate-800 dark:text-slate-200 transition-colors duration-300 selection:bg-indigo-500 selection:text-white"
    :class="rtl ? 'font-arabic' : 'font-sans'">

    <!-- Decorative Background Components -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 bg-grid dark:opacity-[0.05]"></div>
        <div
            class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-indigo-500/30 rounded-full blur-[100px] mix-blend-multiply filter opacity-50 animate-blob">
        </div>
        <div
            class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-purple-500/20 rounded-full blur-[100px] mix-blend-multiply filter opacity-50 animate-blob animation-delay-2000">
        </div>
        <div
            class="absolute bottom-0 left-1/2 w-[600px] h-[600px] bg-blue-500/20 rounded-full blur-[100px] mix-blend-multiply filter opacity-50 animate-blob animation-delay-4000">
        </div>
    </div>

    <!-- Navbar -->
    <nav class="fixed w-full z-50 transition-all duration-300"
        :class="scrollY > 20 ? 'bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border-b border-gray-200/50 dark:border-slate-800/50 shadow-lg' : 'bg-transparent'"
        x-data="{ scrollY: 0, mobileMenuOpen: false }" @scroll.window="scrollY = window.scrollY">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="#"
                        class="text-2xl font-black bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 dark:from-indigo-400 dark:to-pink-400">
                        <span x-text="rtl ? 'أوتوـريبلاي' : 'AutoReply'"></span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden lg:block">
                    <div class="flex items-center space-x-8 rtl:space-x-reverse">
                        <a @click.prevent="scrollTo('hero')" href="#hero"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition"
                            x-text="rtl ? 'الرئيسية' : 'Home'">Home</a>
                        <a @click.prevent="scrollTo('features')" href="#features"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition"
                            x-text="rtl ? 'المميزات' : 'Features'">Features</a>
                        <a @click.prevent="scrollTo('testimonials')" href="#testimonials"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition"
                            x-text="rtl ? 'آراء العملاء' : 'Testimonials'">Testimonials</a>
                        <a @click.prevent="scrollTo('faq')" href="#faq"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition"
                            x-text="rtl ? 'الأسئلة الشائعة' : 'FAQ'">FAQ</a>

                        <a @click.prevent="scrollTo('contact')" href="#contact"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition"
                            x-text="rtl ? 'اتصل بنا' : 'Contact Us'">Contact Us</a>

                        <!-- Toggles -->
                        <div
                            class="flex items-center space-x-4 rtl:space-x-reverse border-l rtl:border-r rtl:border-l-0 border-gray-200 dark:border-slate-700 pl-4 rtl:pr-4">
                            <button @click="toggleDark()"
                                class="p-2 rounded-xl bg-gray-100 dark:bg-slate-800 hover:bg-indigo-100 dark:hover:bg-indigo-900/50 transition-colors">
                                <svg x-show="!darkMode" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                </svg>
                                <svg x-show="darkMode" x-cloak class="w-5 h-5 text-yellow-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </button>
                            <button @click="toggleRtl()"
                                class="flex items-center justify-center w-10 h-10 rounded-xl bg-gray-100 dark:bg-slate-800 font-bold text-gray-700 dark:text-gray-300 hover:bg-indigo-100 dark:hover:bg-indigo-900/50 transition-colors">
                                <span class="text-sm" x-text="rtl ? 'En' : 'ع'"></span>
                            </button>
                        </div>

                        <a href="#"
                            class="px-6 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold shadow-lg shadow-indigo-600/25 transition-all transform hover:-translate-y-1 active:scale-95"
                            x-text="rtl ? 'ابدأ الآن' : 'Get Started'">Get Started</a>
                    </div>
                </div>

                <!-- Mobile Toggle -->
                <div class="lg:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 text-gray-600 dark:text-gray-300">
                        <svg x-show="!mobileMenuOpen" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-cloak x-transition
            class="lg:hidden absolute top-20 inset-x-0 bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 p-4 space-y-4 shadow-2xl">
            <a @click="mobileMenuOpen = false; scrollTo('hero')" href="#hero"
                class="block py-2 text-lg font-medium border-b border-gray-100 dark:border-slate-800"
                x-text="rtl ? 'الرئيسية' : 'Home'">Home</a>
            <a @click="mobileMenuOpen = false; scrollTo('features')" href="#features"
                class="block py-2 text-lg font-medium border-b border-gray-100 dark:border-slate-800"
                x-text="rtl ? 'المميزات' : 'Features'">Features</a>
            <a @click="mobileMenuOpen = false; scrollTo('testimonials')" href="#testimonials"
                class="block py-2 text-lg font-medium border-b border-gray-100 dark:border-slate-800"
                x-text="rtl ? 'آراء العملاء' : 'Testimonials'">Testimonials</a>
            <a @click="mobileMenuOpen = false; scrollTo('faq')" href="#faq"
                class="block py-2 text-lg font-medium border-b border-gray-100 dark:border-slate-800"
                x-text="rtl ? 'الأسئلة الشائعة' : 'FAQ'">FAQ</a>
            <a @click="mobileMenuOpen = false; scrollTo('contact')" href="#contact"
                class="block py-2 text-lg font-medium border-b border-gray-100 dark:border-slate-800"
                x-text="rtl ? 'اتصل بنا' : 'Contact Us'">Contact Us</a>
            <div class="flex justify-between items-center py-4">
                <button @click="toggleDark()" class="px-4 py-2 rounded-lg bg-gray-100 dark:bg-slate-800"
                    x-text="darkMode ? (rtl ? 'وضع نهارى' : 'Light Mode') : (rtl ? 'وضع ليلى' : 'Dark Mode')"></button>
                <button @click="toggleRtl()" class="px-4 py-2 rounded-lg bg-indigo-100 dark:bg-indigo-900/50"
                    x-text="rtl ? 'English' : 'العربية'"></button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2 text-center lg:text-left rtl:lg:text-right">
                <div
                    class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-100/50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 text-sm font-bold mb-6 animate-bounce">
                    <span class="mr-2 rtl:ml-2 rtl:mr-0">✨</span>
                    <span x-text="rtl ? 'آداة الرد الآلي الأكثر ذكاءً' : 'The Smartest AI Automation Tool'"></span>
                </div>

                <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight mb-8 leading-tight">
                    <span class="text-slate-900 dark:text-white block"
                        x-text="rtl ? 'حوّل تفاعلاتك إلى' : 'Turn Your Social Path to'"></span>
                    <span
                        class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 animate-gradient"
                        x-text="rtl ? 'نجاح رقمي تلقائي' : 'Automated Digital Success'">Automated Digital Success</span>
                </h1>

                <p class="text-xl text-gray-600 dark:text-gray-400 mb-10 leading-relaxed max-w-2xl mx-auto lg:mx-0"
                    x-text="rtl ? 'إدارة ذكية لتعليقات ورسائل فيسبوك وانستجرام. ردود تلقائية، تحليل للمشاعر، إخفاء التعليقات المسيئة، ومنشن للعملاء بضغطة واحدة.' : 'Smart management for FB & IG. Auto-replies, sentiment analysis, offensive comment hiding, and bulk mentioning—all in one place.'">
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#"
                        class="px-8 py-4 rounded-2xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-lg shadow-2xl shadow-indigo-600/30 transition-all transform hover:-translate-y-1"
                        x-text="rtl ? 'ابدأ تجربتك المجانية' : 'Start Free Trial'">Start Free Trial</a>
                    <a href="#features"
                        class="px-8 py-4 rounded-2xl bg-white dark:bg-slate-800 text-gray-700 dark:text-white border border-gray-200 dark:border-slate-700 font-bold text-lg hover:shadow-xl transition-all transform hover:-translate-y-1"
                        x-text="rtl ? 'اكتشف المميزات' : 'Discover Features'">Discover Features</a>
                </div>

                <div class="mt-8 flex items-center justify-center lg:justify-start gap-4">
                    <div class="flex -space-x-2 rtl:space-x-reverse">
                        <div
                            class="w-10 h-10 rounded-full border-2 border-white dark:border-slate-900 bg-blue-100 flex items-center justify-center text-xs font-bold">
                            JD</div>
                        <div
                            class="w-10 h-10 rounded-full border-2 border-white dark:border-slate-900 bg-pink-100 flex items-center justify-center text-xs font-bold">
                            AS</div>
                        <div
                            class="w-10 h-10 rounded-full border-2 border-white dark:border-slate-900 bg-green-100 flex items-center justify-center text-xs font-bold">
                            MR</div>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <span class="font-bold text-indigo-600 dark:text-indigo-400">10,000+</span>
                        <span x-text="rtl ? 'نشاط تجاري يثق بنا' : 'trusting users worldwide'"></span>
                    </p>
                </div>
            </div>

            <!-- Interactive Hero Image / Mockup -->
            <div class="lg:w-1/2 relative group">
                <div
                    class="absolute -inset-10 bg-gradient-to-r from-indigo-600/40 via-purple-600/40 to-pink-600/40 rounded-full blur-3xl opacity-0 dark:opacity-40 animate-pulse pointer-events-none">
                </div>
                <div
                    class="relative glass dark:glass-dark rounded-3xl p-3 shadow-[0_0_60px_-15px_rgba(79,70,229,0.6)] backdrop-blur-3xl transition-all duration-700">
                    <div class="bg-white dark:bg-slate-900 rounded-2xl overflow-hidden shadow-inner font-sans"
                        :class="rtl ? 'font-arabic' : 'font-sans'">
                        <div class="h-10 border-b border-gray-100 dark:border-slate-800 flex items-center px-4 gap-2">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-24 h-2 bg-gray-100 dark:bg-slate-800 rounded-full"></div>
                            <div class="ml-auto rtl:mr-auto rtl:ml-0 flex gap-2">
                                <span class="h-2 w-2 rounded-full bg-green-500 animate-pulse"></span>
                                <div class="w-12 h-2 bg-gray-100 dark:bg-slate-800 rounded-full"></div>
                            </div>
                        </div>
                        <div class="flex h-[400px]">
                            <div class="w-20 border-r dark:border-slate-800 p-4 space-y-4">
                                <div
                                    class="w-12 h-12 rounded-xl bg-indigo-50 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                        <path d="m22 6-10 7L2 6" />
                                    </svg>
                                </div>
                                <div
                                    class="w-12 h-12 rounded-xl bg-gray-50 dark:bg-slate-900 flex items-center justify-center text-gray-400">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 1 1-7.6-11.3 8.38 8.38 0 0 1 3.8.9L21 3z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1 p-6 space-y-6">
                                <!-- Incoming Comment -->
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-tr from-yellow-400 to-pink-500 flex-shrink-0">
                                    </div>
                                    <div
                                        class="p-4 rounded-r-2xl rounded-bl-2xl bg-gray-50 dark:bg-slate-900 border dark:border-slate-800 max-w-xs shadow-sm">
                                        <p class="text-sm font-bold mb-1"><span
                                                x-text="rtl ? 'أحمد كامل' : 'Ahmed Kamel'"></span><span
                                                class="ml-2 rtl:mr-2 text-[10px] text-red-500 font-bold"
                                                x-text="rtl ? '🤬 سلبي' : '🤬 Negative'"></span></p>
                                        <p class="text-sm"
                                            x-text="rtl ? 'هذا المنتج سيء جداً ولا أنصح به أحد!!' : 'This product is very bad, I don\'t recommend it!'">
                                        </p>
                                        <div class="mt-2 flex gap-2 text-[10px] text-gray-400">
                                            <span x-text="rtl ? 'انستغرام' : 'Instagram'"></span> • <span
                                                x-text="rtl ? 'الآن' : 'Now'"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- AI Action -->
                                <div class="flex items-start flex-row-reverse gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold flex-shrink-0">
                                        PRO</div>
                                    <div
                                        class="p-4 rounded-l-2xl rounded-br-2xl bg-indigo-600 text-white max-w-xs shadow-lg relative">
                                        <p class="text-xs font-bold mb-1"><span
                                                x-text="rtl ? 'ذكاء أوتوـريبلاي' : 'AutoReply AI'"></span> <span
                                                class="ml-2 rtl:mr-2 text-[10px] bg-white/20 px-1 rounded"
                                                x-text="rtl ? 'إجراء مكتمل' : 'Action Taken'"></span></p>
                                        <p class="text-sm"
                                            x-text="rtl ? 'تم إخفاء التعليق تلقائياً. إرسال تنبيه للخاص.' : 'Comment Hidden automatically. User Inbox notified.'">
                                        </p>
                                        <div class="mt-2 flex gap-1">
                                            <span class="px-2 py-0.5 rounded-full bg-white/20 text-[9px]"
                                                x-text="rtl ? 'لغة مسيئة' : 'Bad Language'"></span>
                                            <span class="px-2 py-0.5 rounded-full bg-white/20 text-[9px]"
                                                x-text="rtl ? 'مخفي' : 'Hidden'"></span>
                                            <span class="px-2 py-0.5 rounded-full bg-white/20 text-[9px]"
                                                x-text="rtl ? 'شراء' : 'Purchase Intent'"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4 border-t dark:border-slate-800">
                                    <div class="flex items-center justify-between">
                                        <div class="h-2 w-32 bg-gray-100 dark:bg-slate-800 rounded-full"></div>
                                        <div
                                            class="h-8 w-max px-3 bg-green-500/10 text-green-500 rounded-lg flex items-center justify-center text-xs font-bold">
                                            <span
                                                x-text="rtl ? 'تحليل المشاعر: 89% إيجابي' : 'Sentiment: 89% Pos'"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Company Logos Row (Real Logos) -->
        <div
            class="mt-24 max-w-7xl mx-auto px-4 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-700">
            <div class="flex flex-wrap justify-center gap-12 lg:gap-20 items-center">
                <!-- Facebook -->
                <div class="flex flex-col items-center gap-3 group">
                    <div
                        class="w-12 h-12 flex items-center justify-center text-[#1877F2] transform group-hover:scale-110 transition duration-300">
                        <svg class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </div>
                    <span
                        class="text-[10px] uppercase tracking-[0.2em] font-bold text-gray-500 dark:text-gray-400 group-hover:text-indigo-500 transition"
                        x-text="rtl ? 'فيسبوك' : 'Facebook'"></span>
                </div>
                <!-- Instagram -->
                <div class="flex flex-col items-center gap-3 group">
                    <div
                        class="w-12 h-12 flex items-center justify-center text-[#E4405F] transform group-hover:scale-110 transition duration-300">
                        <svg class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 1.17.054 1.805.249 2.227.412.56.216.96.474 1.38.894.42.42.678.82.894 1.38.163.422.358 1.057.412 2.227.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.054 1.17-.249 1.805-.412 2.227-.216.56-.474.96-.894 1.38-.42.42-.82.678-1.38.894-.422.163-1.057.358-2.227.412-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.054-1.805-.249-2.227-.412-.56-.216-.96-.474-1.38-.894-.42-.42-.678-.82-.894-1.38-.163-.422-.358-1.057-.412-2.227C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.85c.054-1.17.249-1.805.412-2.227.216-.56.474-.96.894-1.38.42-.42.82-.678 1.38-.894.422-.163 1.057-.358 2.227-.412 1.266-.058 1.646-.07 4.85-.07zM12 0C8.741 0 8.333.014 7.053.072 5.775.131 4.903.333 4.146.627c-.783.304-1.447.712-2.108 1.373C1.377 2.66 .969 3.324.665 4.107c-.294.757-.496 1.629-.555 2.907C.014 8.333 0 8.741 0 12s.014 3.667.072 4.947c.059 1.278.261 2.15.555 2.907.304.783.712 1.447 1.373 2.108.661.661 1.325 1.069 2.108 1.373.757.294 1.629.496 2.907.555 1.28.058 1.688.072 4.947.072s3.667-.014 4.947-.072c1.278-.059 2.15-.261 2.907-.555.783-.304 1.447-.712 2.108-1.373.661-.661 1.069-1.325 1.373-2.108.294-.757.496-1.629.555-2.907.058-1.28.072-1.688.072-4.947s-.014-3.667-.072-4.947c-.059-1.278-.261-2.15-.555-2.907-.304-.783-.712-1.447-1.373-2.108-.661-.661-1.325-1.069-2.108-1.373-.757-.294-1.629-.496-2.907-.555C15.667.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z" />
                        </svg>
                    </div>
                    <span
                        class="text-[10px] uppercase tracking-[0.2em] font-bold text-gray-500 dark:text-gray-400 group-hover:text-indigo-500 transition"
                        x-text="rtl ? 'انستغرام' : 'Instagram'"></span>
                </div>
                <!-- Messenger -->
                <div class="flex flex-col items-center gap-3 group">
                    <div
                        class="w-12 h-12 flex items-center justify-center text-[#00B2FF] transform group-hover:scale-110 transition duration-300">
                        <svg class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 0C5.373 0 0 4.974 0 11.111c0 3.498 1.744 6.614 4.469 8.654V24l4.088-2.242c1.092.303 2.246.464 3.443.464 6.627 0 12-4.974 12-11.111C24 4.974 18.627 0 12 0zm1.31 14.507l-3.056-3.264-5.965 3.264 6.551-6.963 3.13 3.264 5.89-3.264-6.55 6.963z" />
                        </svg>
                    </div>
                    <span
                        class="text-[10px] uppercase tracking-[0.2em] font-bold text-gray-500 dark:text-gray-400 group-hover:text-indigo-500 transition"
                        x-text="rtl ? 'ماسنجر' : 'Messenger'"></span>
                </div>
                <!-- WhatsApp -->
                <div class="flex flex-col items-center gap-3 group">
                    <div
                        class="w-12 h-12 flex items-center justify-center text-[#25D366] transform group-hover:scale-110 transition duration-300">
                        <svg class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.72.94 3.659 1.437 5.634 1.437h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                    </div>
                    <span
                        class="text-[10px] uppercase tracking-[0.2em] font-bold text-gray-500 dark:text-gray-400 group-hover:text-pink-500 transition"
                        x-text="rtl ? 'واتساب قريباً' : 'Official WhatsApp Partner'"></span>
                </div>
            </div>
        </div>

    </section>

    <!-- Features (The Big Features) -->
    <section id="features" class="py-24 bg-white dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <h2 class="text-indigo-600 dark:text-indigo-400 font-bold uppercase tracking-widest text-sm mb-4"
                    x-text="rtl ? 'لماذا تختارنا؟' : 'Why Choose Us?'"></h2>
                <h3 class="text-3xl lg:text-5xl font-black mb-6 dark:text-white"
                    x-text="rtl ? 'كل ما تحتاجه لإدارة وجودك الاجتماعي باحترافية' : 'Everything you need to dominate social media'">
                </h3>
                <p class="text-lg text-gray-500 dark:text-gray-400"
                    x-text="rtl ? 'نحن نجمع لك بين قوة البرمجة وذكاء الذكاء الاصطناعي لنوفر لك الوقت ونزود أرباحك' : 'We blend programming power with AI intelligence to save your time and boost your profits'">
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Cards -->
                <template x-for="(feature, index) in [
                        {title: rtl ? 'الرد الآلي الذكي' : 'Smart Auto Reply', desc: rtl ? 'ردود فورية على التعليقات والرسائل مبرمجة لزيادة التفاعل.' : 'Instant replies to comments and messages programmed to boost engagement.'},
                        {title: rtl ? 'إخفاء التعليقات المسيئة' : 'Auto Hide Comments', desc: rtl ? 'بناءً على الكلمات المفتاحية أو تحليل الذكاء الاصطناعي لإخفاء التنمر والمنافسين.' : 'Based on keywords or AI analysis to hide bullying and competitors.'},
                        {title: rtl ? 'تحليل المشاعر' : 'Sentiment Analysis', desc: rtl ? 'معرفة نية العميل (شراء، استفسار، غضب) عبر تحليل محتوى تعليقه.' : 'Understand customer intent (buy, inquiry, anger) by analyzing their content.'},
                        {title: rtl ? 'الإعجاب التلقائي' : 'Auto Like', desc: rtl ? 'عمل لايك تلقائي لكل تعليق جديد لتبدو صفحتك حيوية ونشطة.' : 'Automated likes for every new comment to keep your page looking alive.'},
                        {title: rtl ? 'المنشن الجماعي' : 'Bulk Mention', desc: rtl ? 'عمل منشن للعملاء في تعليق واحد حتى يصلهم تنبيه بآخر تحديثاتك.' : 'Mention customers in a single comment to notify them of your updates.'},
                        {title: rtl ? 'صندوق وارد موحد' : 'Unified Inbox', desc: rtl ? 'كل محادثات انستجرام وفيسبوك في صفحة واحدة سهلة الاستخدام.' : 'All IG and FB conversations in one easy-to-use page.'}
                    ]" :key="index">
                    <div
                        class="p-8 rounded-3xl bg-gray-50 dark:bg-slate-900 border border-transparent hover:border-indigo-500/30 transition-all group hover:shadow-2xl hover:-translate-y-2">
                        <div
                            class="w-14 h-14 rounded-2xl bg-indigo-600 text-white flex items-center justify-center mb-6 shadow-xl shadow-indigo-600/20 group-hover:scale-110 transition duration-500">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" x-show="index == 0" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"
                                    x-show="index == 1" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" x-show="index == 2" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                    x-show="index == 3" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    x-show="index == 4" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                                    x-show="index == 5" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-black mb-4 dark:text-white" x-text="feature.title"></h4>
                        <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed" x-text="feature.desc"></p>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-indigo-600 dark:text-indigo-400 font-bold mb-4"
                    x-text="rtl ? 'آراء شركاء النجاح' : 'What Our Clients Say'"></h2>
                <h3 class="text-3xl lg:text-4xl font-black dark:text-white"
                    x-text="rtl ? 'لماذا يثق بنا كبار المعلنين؟' : 'Join thousands of happy users'"></h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <template x-for="i in 3" :key="i">
                    <div
                        class="bg-white dark:bg-slate-900 p-8 rounded-3xl border border-gray-100 dark:border-slate-800 shadow-xl transition-all duration-300 hover:shadow-indigo-500/10 hover:-translate-y-1">
                        <div class="flex text-yellow-400 mb-6 font-sans">
                            <template x-for="star in 5">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </template>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 italic mb-8 leading-relaxed text-sm"
                            x-text="rtl ? 'هذه الآداة وفرت عليّ موظفي خدمة كاملين. الرد سريع جداً والذكاء الاصطناعي يفهم العملاء ببراعة.' : 'This tool saved me 2 full-time employees. The responses are super fast and the AI understands customers perfectly.'">
                        </p>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center font-bold text-indigo-600 dark:text-indigo-400 text-[10px]"
                                x-text="i == 1 ? 'MA' : (i == 2 ? 'SK' : 'AE')"></div>
                            <div>
                                <h5 class="text-xs font-black dark:text-white"
                                    x-text="rtl ? (i == 1 ? 'محمد علي' : (i == 2 ? 'سارة كريم' : 'أحمد السيد')) : (i == 1 ? 'Mohamed Ali' : (i == 2 ? 'Sarah Karim' : 'Ahmed Elsayed'))">
                                </h5>
                                <p class="text-[10px] text-gray-500"
                                    x-text="rtl ? 'صاحب متجر إلكتروني' : 'E-commerce Owner'"></p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-24 relative overflow-hidden bg-white dark:bg-slate-900 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-indigo-600 dark:text-indigo-400 font-bold uppercase tracking-widest text-sm mb-4"
                    x-text="rtl ? 'خطط الأسعار' : 'Pricing Plans'"></h2>
                <h3 class="text-3xl lg:text-5xl font-black dark:text-white"
                    x-text="rtl ? 'اختر الخطة المناسبة لنمو تجارتك' : 'Choose the perfect plan for growth'"></h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
                <!-- Basic Plan -->
                <div
                    class="bg-gray-50/50 dark:bg-slate-900 p-10 rounded-[2.5rem] border border-gray-100 dark:border-slate-800 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 flex flex-col">
                    <h4 class="text-xl font-bold mb-2 dark:text-white" x-text="rtl ? 'الأساسية' : 'Basic'"></h4>
                    <div class="flex items-baseline gap-1 mb-8">
                        <span class="text-4xl font-black text-indigo-600 dark:text-indigo-400">$29</span>
                        <span class="text-gray-500 text-sm" x-text="rtl ? '/شهرياً' : '/month'"></span>
                    </div>
                    <ul class="space-y-4 mb-10 flex-grow">
                        <template
                            x-for="feature in [rtl ? 'حساب واحد' : '1 Account', rtl ? '1,000 رد تلقائي' : '1,000 Auto Replies', rtl ? 'دعم فني عالي' : 'Priority Support']">
                            <li class="flex items-center gap-3 text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span x-text="feature"></span>
                            </li>
                        </template>
                    </ul>
                    <a href="#"
                        class="block w-full py-4 text-center rounded-2xl bg-indigo-600/10 dark:bg-indigo-400/10 text-indigo-600 dark:text-indigo-400 font-bold hover:bg-indigo-600 hover:text-white transition-all"
                        x-text="rtl ? 'اختر الخطة' : 'Choose Plan'"></a>
                </div>

                <!-- Pro Plan (Featured) -->
                <div class="relative group">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-[2.5rem] blur-xl opacity-20 group-hover:opacity-40 transition duration-500">
                    </div>
                    <div
                        class="relative h-full bg-white dark:bg-slate-900 p-10 rounded-[2.5rem] border-2 border-indigo-600 dark:border-indigo-500 shadow-2xl scale-105 lg:scale-110 flex flex-col z-10 transition-all duration-300 hover:-translate-y-2">
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest whitespace-nowrap"
                            x-text="rtl ? 'الأكثر طلباً' : 'MOST POPULAR'"></div>
                        <h4 class="text-2xl font-black mb-2 dark:text-white" x-text="rtl ? 'الاحترافية' : 'Pro'"></h4>
                        <div class="flex items-baseline gap-1 mb-10">
                            <span
                                class="text-5xl font-black bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">$79</span>
                            <span class="text-gray-500 text-sm font-bold" x-text="rtl ? '/شهرياً' : '/month'"></span>
                        </div>
                        <ul class="space-y-5 mb-12 flex-grow">
                            <template
                                x-for="feature in [rtl ? '5 حسابات متصلة' : '5 Linked Accounts', rtl ? 'ردود غير محدودة' : 'Unlimited Replies', rtl ? 'تحليل مشاعر فائق' : 'Deep Sentiment AI', rtl ? 'إخفاء ذكي للمنافسين' : 'Smart Hide Competitors']">
                                <li class="flex items-center gap-3 text-gray-700 dark:text-gray-200">
                                    <svg class="w-6 h-6 text-indigo-500 font-bold" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="font-bold" x-text="feature"></span>
                                </li>
                            </template>
                        </ul>
                        <a href="#"
                            class="block w-full py-5 text-center rounded-2xl bg-indigo-600 text-white font-black text-lg shadow-xl shadow-indigo-600/30 hover:bg-indigo-700 transition-all active:scale-95"
                            x-text="rtl ? 'ابدأ الآن' : 'Get Started Now'"></a>
                    </div>
                </div>

                <!-- Agency Plan -->
                <div
                    class="bg-gray-50/50 dark:bg-slate-900 p-10 rounded-[2.5rem] border border-gray-100 dark:border-slate-800 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 flex flex-col">
                    <h4 class="text-xl font-bold mb-2 dark:text-white" x-text="rtl ? 'الوكالات' : 'Agency'"></h4>
                    <div class="flex items-baseline gap-1 mb-8">
                        <span class="text-4xl font-black text-indigo-600 dark:text-indigo-400">$199</span>
                        <span class="text-gray-500 text-sm" x-text="rtl ? '/شهرياً' : '/month'"></span>
                    </div>
                    <ul class="space-y-4 mb-10 flex-grow">
                        <template
                            x-for="feature in [rtl ? '20 حساب متصل' : '20 Linked Accounts', rtl ? 'كل المميزات الحالية' : 'All Current Features', rtl ? 'دعم VIP على مدار الساعة' : '24/7 VIP Support', rtl ? 'علامة تجارية مخصصة' : 'Custom Branding']">
                            <li class="flex items-center gap-3 text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span x-text="feature"></span>
                            </li>
                        </template>
                    </ul>
                    <a href="#"
                        class="block w-full py-4 text-center rounded-2xl bg-gray-100 dark:bg-slate-800 text-gray-700 dark:text-white font-bold hover:bg-indigo-600 hover:text-white transition-all"
                        x-text="rtl ? 'تواصل معنا' : 'Contact Sales'"></a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="py-24 bg-gray-50 dark:bg-slate-900 transition-colors">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-black dark:text-white"
                    x-text="rtl ? 'الأسئلة الشائعة' : 'Frequently Asked Questions'"></h2>
            </div>
            <div class="space-y-4" x-data="{ activeFaq: 0 }">
                <template x-for="(faq, fIndex) in [
                        {q: rtl ? 'هل الآداة آمنة على حساباتي؟' : 'Is it safe for my accounts?', a: rtl ? 'نعم، نستخدم واجهات برمجية رسمية (APIs) ومعتمدة من Meta لضمان أمان حسابك.' : 'Yes, we use official Meta APIs to ensure your account security.'},
                        {q: rtl ? 'ما هي اللغات التي يدعمها الذكاء الاصطناعي؟' : 'Which languages are supported?', a: rtl ? 'ندعم العربية، الإنجليزية، وأكثر من 50 لغة أخرى بذكاء عالي.' : 'We support Arabic, English, and over 50 other languages with high intelligence.'},
                        {q: rtl ? 'هل يمكنني تجربة الآداة مجاناً؟' : 'Can I try it for free?', a: rtl ? 'بالطبع! نوفر نسخة تجريبية كاملة لمدة 7 أيام لتختبر كل المميزات.' : 'Of course! We offer a full 7-day trial to experience all features.'}
                    ]" :key="fIndex">
                    <div
                        class="bg-white dark:bg-slate-800 rounded-2xl overflow-hidden shadow-sm border dark:border-slate-700">
                        <button @click="activeFaq = (activeFaq === fIndex ? -1 : fIndex)"
                            class="w-full p-6 text-left rtl:text-right flex justify-between items-center bg-transparent active:bg-gray-100 transition-colors">
                            <span class="text-lg font-bold dark:text-white" x-text="faq.q"></span>
                            <svg class="w-6 h-6 transform transition-transform"
                                :class="activeFaq === fIndex ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="activeFaq === fIndex" x-collapse>
                            <div class="p-6 pt-0 text-gray-500 dark:text-gray-400 leading-relaxed" x-text="faq.a"></div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section id="contact" class="py-24 relative overflow-hidden bg-white dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row gap-12 lg:gap-20 items-stretch">

                <!-- Contact Info Side -->
                <div class="lg:w-5/12 flex flex-col justify-center">
                    <div
                        class="inline-flex items-center px-3 py-1 rounded-full bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 text-xs font-bold mb-6 w-max">
                        <span x-text="rtl ? 'تواصل معنا' : 'GET IN TOUCH'"></span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-black mb-8 leading-tight dark:text-white"
                        x-text="rtl ? 'نحن هنا للإجابة على جميع تساؤلاتك' : 'We\'re here to answer your questions'">
                    </h2>

                    <p class="text-lg text-gray-500 dark:text-gray-400 mb-12 leading-relaxed"
                        x-text="rtl ? 'فريقنا متاح دائماً لمساعدتك في الحصول على أفضل تجربة مع أوتوـريبلاي. لا تتردد في مراسلتنا في أي وقت.' : 'Our team is always ready to help you get the best experience with AutoReply. Feel free to message us anytime.'">
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-center gap-5 group">
                            <div
                                class="w-12 h-12 rounded-2xl bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-0.5"
                                    x-text="rtl ? 'اتصل بنا' : 'Call Us'"></h4>
                                <p
                                    class="text-lg font-semibold text-slate-700 dark:text-slate-200 tracking-wide font-sans">
                                    +20 123 456 789</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-5 group">
                            <div
                                class="w-12 h-12 rounded-2xl bg-pink-50 dark:bg-pink-900/30 text-pink-500 flex items-center justify-center group-hover:bg-pink-500 group-hover:text-white transition-all duration-300 flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-0.5"
                                    x-text="rtl ? 'بريدنا الإلكتروني' : 'Email Support'"></h4>
                                <p
                                    class="text-lg font-semibold text-slate-700 dark:text-slate-200 tracking-wide font-sans">
                                    hello@autoreplypro.com</p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Form Side (Mockup Style) -->
                <div class="lg:w-7/12 mt-12 lg:mt-0 relative group">
                    <div
                        class="absolute -inset-12 bg-gradient-to-tr from-indigo-600/30 to-purple-600/30 rounded-full blur-3xl opacity-0 dark:opacity-40 animate-pulse pointer-events-none">
                    </div>

                    <div
                        class="relative glass dark:glass-dark rounded-[2.5rem] p-3 shadow-[0_0_60px_-20px_rgba(79,70,229,0.5)] backdrop-blur-3xl transition-all duration-700">
                        <div
                            class="bg-white dark:bg-slate-900 rounded-[2rem] overflow-hidden shadow-inner border border-gray-100 dark:border-slate-800">
                            <!-- Window Header -->
                            <div
                                class="h-12 border-b border-gray-100 dark:border-slate-800 flex items-center px-6 gap-3 bg-gray-50/50 dark:bg-slate-900/50">
                                <div class="flex gap-1.5">
                                    <div class="w-3 h-3 rounded-full bg-red-400 shadow-sm"></div>
                                    <div class="w-3 h-3 rounded-full bg-yellow-400 shadow-sm"></div>
                                    <div class="w-3 h-3 rounded-full bg-green-400 shadow-sm"></div>
                                </div>
                                <div class="flex-1 flex justify-center">
                                    <div
                                        class="w-1/2 h-6 bg-white dark:bg-slate-800 rounded-lg border border-gray-100 dark:border-slate-700 flex items-center px-3 gap-2">
                                        <svg class="w-3 h-3 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        <div class="w-full h-1 bg-gray-100 dark:bg-slate-700 rounded-full"></div>
                                    </div>
                                </div>
                                <div class="flex gap-2 opacity-50">
                                    <div class="w-4 h-4 rounded bg-gray-200 dark:bg-slate-800"></div>
                                    <div class="w-4 h-4 rounded bg-gray-200 dark:bg-slate-800"></div>
                                </div>
                            </div>

                            <!-- Form Body -->
                            <div class="p-8 lg:p-10">
                                <form action="#" class="space-y-8">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                        <!-- Full Name -->
                                        <div class="space-y-2">
                                            <label
                                                class="px-2 text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest"
                                                x-text="rtl ? 'الاسم بالكامل' : 'Full Name'"></label>
                                            <input type="text"
                                                class="w-full h-14 bg-gray-50 dark:bg-slate-900 border-2 border-transparent focus:border-indigo-500/30 focus:bg-white dark:focus:bg-slate-800 px-6 rounded-2xl outline-none transition-all dark:text-white shadow-sm placeholder:font-normal"
                                                :class="rtl ? 'font-normal' : 'font-semibold'"
                                                :placeholder="rtl ? 'مثال: محمد علي' : 'e.g. John Doe'">
                                        </div>
                                        <!-- Email -->
                                        <div class="space-y-2">
                                            <label
                                                class="px-2 text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest"
                                                x-text="rtl ? 'البريد الإلكتروني' : 'Email Address'"></label>
                                            <input type="email"
                                                class="w-full h-14 bg-gray-50 dark:bg-slate-900 border-2 border-transparent focus:border-indigo-500/30 focus:bg-white dark:focus:bg-slate-800 px-6 rounded-2xl outline-none transition-all dark:text-white shadow-sm placeholder:font-normal"
                                                :class="rtl ? 'font-normal' : 'font-semibold'"
                                                :placeholder="rtl ? 'email@example.com' : 'email@example.com'">
                                        </div>
                                    </div>

                                    <!-- Subject Selection -->
                                    <div class="space-y-2">
                                        <label
                                            class="px-2 text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest"
                                            x-text="rtl ? 'موضوع الرسالة' : 'Subject'"></label>
                                        <div class="relative">
                                            <select
                                                class="w-full h-14 bg-gray-50 dark:bg-slate-900 border-2 border-transparent focus:border-indigo-500/30 focus:bg-white dark:focus:bg-slate-800 px-6 rounded-2xl outline-none transition-all dark:text-white shadow-sm appearance-none"
                                                :class="rtl ? 'font-normal' : 'font-semibold'">
                                                <option x-text="rtl ? 'استفسار عام' : 'General Inquiry'"></option>
                                                <option x-text="rtl ? 'دعم فني' : 'Technical Support'"></option>
                                                <option x-text="rtl ? 'مبيعات' : 'Sales'"></option>
                                            </select>
                                            <div
                                                class="absolute inset-y-0 right-0 rtl:left-0 rtl:right-auto flex items-center px-4 pointer-events-none text-gray-400">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Message -->
                                    <div class="space-y-2">
                                        <label
                                            class="px-2 text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest"
                                            x-text="rtl ? 'كيف يمكننا مساعدتك؟' : 'Message'"></label>
                                        <textarea rows="4"
                                            class="w-full bg-gray-50 dark:bg-slate-900 border-2 border-transparent focus:border-indigo-500/30 focus:bg-white dark:focus:bg-slate-800 p-6 rounded-2xl outline-none transition-all dark:text-white shadow-sm resize-none placeholder:font-normal"
                                            :class="rtl ? 'font-normal' : 'font-semibold'"
                                            :placeholder="rtl ? 'اكتب رسالتك هنا بالتفصيل...' : 'Tell us more about your needs...'"></textarea>
                                    </div>

                                    <!-- Submit Button (Hero Action Style) -->
                                    <button type="submit"
                                        class="w-full h-16 bg-indigo-600 hover:bg-indigo-700 text-white font-black text-lg rounded-2xl shadow-2xl shadow-indigo-600/30 transition-all transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3">
                                        <span x-text="rtl ? 'إرسال الرسالة' : 'Send Message'"></span>
                                        <svg class="w-6 h-6 rtl:rotate-180" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-white dark:bg-slate-900 border-t border-gray-200 dark:border-slate-800 pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-4 flex flex-col items-center">
            <!-- Logo & Name -->
            <div class="mb-8 text-center text-center">
                <div
                    class="text-3xl font-black bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-pink-600 mb-2">
                    <span x-text="rtl ? 'أوتوـريبلاي' : 'AutoReply'"></span>
                </div>
            </div>

            <!-- Description -->
            <p class="max-w-2xl text-center text-gray-500 dark:text-gray-400 mb-10 leading-relaxed"
                x-text="rtl ? 'الخيار الأول للمسوقين والشركات لإدارة التفاعل الاجتماعي. اترك الأعمال اليدوية لنا وركز على نمو تجارتك.' : 'The #1 choice for marketers and companies to manage social engagement. Leave manual tasks to us and focus on your business growth.'">
            </p>

            <!-- Social Icons -->
            <div class="flex justify-center gap-6 mb-12">
                <template x-for="social in ['Facebook', 'Twitter', 'Instagram', 'LinkedIn', 'YouTube']">
                    <a href="#"
                        class="w-12 h-12 rounded-full border border-gray-100 dark:border-slate-800 flex items-center justify-center hover:bg-indigo-600 hover:text-white dark:hover:bg-indigo-600 transition-all transform hover:-translate-y-1">
                        <span class="sr-only" x-text="social"></span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path x-show="social == 'Facebook'"
                                d="M18.77,7.46H14.5v-1.9c0-.9.6-1.1,1-1.1h3V.5h-4.33C10.24.5,9.5,3.44,9.5,5.32v2.14h-3v4h3v12h5v-12h3.85Z" />
                            <path x-show="social == 'Instagram'"
                                d="M12,2.16c3.2,0,3.58,0,4.85.07,1.17.05,1.81.25,2.23.41a3.73,3.73,0,0,1,1.38.9,3.73,3.73,0,0,1,.9,1.38c.16.42.36,1.06.41,2.23.06,1.27.07,1.65.07,4.85s0,3.58-.07,4.85c-.05,1.17-.25,1.81-.41,2.23a3.73,3.73,0,0,1-.9,1.38,3.73,3.73,0,0,1-1.38.9c-.42.16-1.06.36-2.23.41-1.27.06-1.65.07-4.85.07s-3.58,0-4.85-.07c-1.17-.05-1.81-.25-2.23-.41a3.73,3.73,0,0,1-1.38-.9,3.73,3.73,0,0,1-.9-1.38c-.16-.42-.36-1.06-.41-2.23C2.17,15.58,2.16,15.2,2.16,12s0-3.58.07-4.85c.05-1.17.25-1.81.41-2.23a3.73,3.73,0,0,1,.9-1.38,3.73,3.73,0,0,1,1.38-.9c.42-.16,1.06-.36,2.23-.41C8.42,2.17,8.8,2.16,12,2.16M12,0C8.74,0,8.33,0,7.05.07c-1.28.06-2.15.26-2.91.56a5.52,5.52,0,0,0-2,1.3A5.52,5.52,0,0,0,.85,3.95,7.59,7.59,0,0,0,.3,6.86C0,8.14,0,8.55,0,11.81s0,3.67.07,4.95a7.59,7.59,0,0,0,.56,2.91,5.52,5.52,0,0,0,1.3,2,5.52,5.52,0,0,0,2,1.3,7.59,7.59,0,0,0,2.91.56c1.28.06,1.69.07,4.95.07s3.67,0,4.95-.07a7.59,7.59,0,0,0,2.91-.56,5.52,5.52,0,0,0,2-1.3,5.52,5.52,0,0,0,1.3-2,7.59,7.59,0,0,0,.56-2.91C24,15.48,24,15.07,24,11.81s0-3.67-.07-4.95a7.59,7.59,0,0,0-.56-2.91,5.52,5.52,0,0,0-1.3-2,5.52,5.52,0,0,0-2-1.3,7.59,7.59,0,0,0-2.91-.56C15.67,0,15.26,0,12,0Zm0,5.84A6.16,6.16,0,1,0,18.16,12,6.16,6.16,0,0,0,12,5.84Zm0,10.16A4,4,0,1,1,16,12,4,4,0,0,1,12,16Zm6.41-11.57a1.44,1.44,0,1,1-1.44-1.44A1.44,1.44,0,0,1,18.41,4.43Z" />
                            <path x-show="social == 'Twitter'"
                                d="M23.95,4.57a10,10,0,0,1-2.82.77,4.96,4.96,0,0,0,2.16-2.72,9.9,9.9,0,0,1-3.12,1.19,4.92,4.92,0,0,0-8.39,4.49A14,14,0,0,1,1.67,3.15,4.93,4.93,0,0,0,3.19,9.72,4.86,4.86,0,0,1,1,9.11v.06a4.93,4.93,0,0,0,3.95,4.83,4.94,4.94,0,0,1-2.22.08,4.93,4.93,0,0,0,4.6,3.42A9.87,9.87,0,0,1,0,19.54,13.94,13.94,0,0,0,7.55,21.75c9.06,0,14-7.5,14-14,0-.21,0-.43,0-.64A10,10,0,0,0,24,4.58Z" />
                            <path x-show="social == 'LinkedIn'"
                                d="M19,0H5A5,5,0,0,0,0,5V19a5,5,0,0,0,5,5H19a5,5,0,0,0,5-5V5A5,5,0,0,0,19,0ZM8,19H5V8H8ZM6.5,6.73A1.73,1.73,0,1,1,8.23,5,1.73,1.73,0,0,1,6.5,6.73ZM19,19H16V13.39c0-1.34-0.03-3.06-1.87-3.06s-2.15,1.46-2.15,2.97V19H9V8h2.88v1.5h0.04a3.15,3.15,0,0,1,2.84-1.56c3.04,0,3.6,2,3.6,4.6V19Z" />
                            <path x-show="social == 'YouTube'"
                                d="M23.5,6.19a3.02,3.02,0,0,0-2.12-2.12C19.5,3.5,12,3.5,12,3.5s-7.5,0-9.38.57A3.02,3.02,0,0,0,.5,6.19C0,8.07,0,12,0,12s0,3.93.5,5.81a3.02,3.02,0,0,0,2.12,2.12C4.5,20.5,12,20.5,12,20.5s7.5,0,9.38-.57a3.02,3.02,0,0,0,2.12-2.12C24,15.93,24,12,24,12S24,8.07,23.5,6.19ZM9.5,15.5V8.5l6.5,3.5Z" />
                        </svg>
                    </a>
                </template>
            </div>

            <!-- Contact Info (Synced Style) -->
            <div class="flex flex-col sm:flex-row gap-8 mb-12">
                <div class="flex items-center gap-4 group">
                    <div
                        class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-slate-700 dark:text-slate-300 tracking-wide font-sans">+20 123
                        456 789</p>
                </div>
                <div class="flex items-center gap-4 group">
                    <div
                        class="w-10 h-10 rounded-xl bg-pink-50 dark:bg-pink-900/30 text-pink-500 flex items-center justify-center group-hover:bg-pink-500 group-hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-slate-700 dark:text-slate-300 tracking-wide font-sans">
                        hello@autoreplypro.com</p>
                </div>
            </div>

            <!-- Copyright (Full Localization) -->
            <div
                class="w-full flex flex-col items-center py-8 border-t border-gray-100 dark:border-slate-900 gap-4 text-center">
                <p class="text-xs text-gray-400"
                    x-text="rtl ? '© 2026 أوتوـريبلاي ذكاء اصطناعي. جميع الحقوق محفوظة.' : '© 2026 AutoReply AI. All Rights Reserved.'">
                </p>
                <div class="flex gap-6 text-xs text-gray-400 justify-center">
                    <a href="#" class="hover:text-indigo-600 transition"
                        x-text="rtl ? 'سياسة الخصوصية' : 'Privacy Policy'"></a>
                    <a href="#" class="hover:text-indigo-600 transition"
                        x-text="rtl ? 'الشروط والأحكام' : 'Terms & Conditions'"></a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>